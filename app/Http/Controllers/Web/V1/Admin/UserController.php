<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Forms\Web\V1\UserWebForm;
use App\Http\Requests\Web\V1\QuizEditWebRequest;
use App\Http\Requests\Web\V1\QuizWebRequest;
use App\Http\Requests\Web\V1\UserEditWebRequest;
use App\Models\Entities\Core\User;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function edit(UserEditWebRequest $request) {
        $user = User::find($request->id);
        $user_web_form = UserWebForm::inputGroups($user);
        return $this->adminPagesView('userEdit', compact( 'user_web_form', 'user'));
    }

    public function update(QuizWebRequest $request)
    {
        $user = User::find($request->id);
        $old_path = $user->profile_photo_path;
        $path = null;
        if($request->image) {
            $path = $this->fileService->updateWithRemoveOrStore($request->image, User::AVATAR_DIRECTORY, $old_path);
        }
        try {
            $user->update([
                'name' => $request->name,
                'profile_photo_path' => $path
            ]);
            $this->edited();
            return redirect()->route('admin.index');
        } catch (\Exception $exception) {
            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }

    }
}
