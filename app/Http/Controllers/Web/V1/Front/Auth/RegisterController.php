<?php

namespace App\Http\Controllers\Web\V1\Front\Auth;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Area;
use App\Models\Entities\City;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use App\Models\Entities\Region;
use App\Models\Entities\School;
use App\Models\Entities\Subject;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    protected $redirectTo = RouteServiceProvider::WELCOME;


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
        $this->added();
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->route('welcome');
    }


    public function showRegistrationForm()
    {
        $regions = Region::all();
        $subjects = Subject::all();
        return $this->frontPagesView('auth.register', compact('regions', 'subjects'));
    }

    protected function validator(array $data)
    {
        $data['phone'] = preg_replace("/[^0-9]/", "", $data['phone']);
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', '', 'max:11', 'min:11'],
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'father_name' => ['string', 'nullable'],
            'сlass_number' => ['numeric'],
            'сlass_letter' => ['string'],
            'city_area' => ['string', 'required'],
            'school' => ['string', 'required'],
            'subject_id' => ['numeric', 'exists:subjects,id', 'nullable'],
            'region_id' => ['numeric', 'exists:regions,id', 'required'],
            'role_id' => ['required', Rule::in([Role::LEARNER_ID, Role::TEACHER_ID])],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $data['phone'] = preg_replace("/[^0-9]/", "", $data['phone']);
        $subject_id = $data['role_id'] == Role::TEACHER_ID ? $data['subject_id'] : null;
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'father_name' => $data['father_name'],
            'phone' => $data['phone'],
            'avatar_path' => null,
            'class_number' => $data['class_number'],
            'class_letter' => $data['class_letter'],
            'subject_id' => $subject_id,
            'school' => $data['school'],
            'region_id' => $data['region_id'],
            'city_area' => $data['city_area'],
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
