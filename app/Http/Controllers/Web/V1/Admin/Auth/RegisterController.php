<?php

namespace App\Http\Controllers\Web\V1\Admin\Auth;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\RegisterWebForm;
use App\Http\Forms\Web\V1\Auth\UserRegisterWebForm;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use App\Models\Entities\Support\AppFile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Rules\YearRule;

class RegisterController extends WebBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RedirectsUsers;


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();


        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->route('profile.profile');
    }


    public function showRegistrationForm()
    {
        $register_web_form = RegisterWebForm::inputGroups();
        return $this->adminView('core.auth.register',compact('register_web_form'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => Role::CLIENT_ID,
            'avatar_file_id' => AppFile::DEFAULT_IMAGE_ID,
            'avatar_path' => 'images/avatar.png'
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
