<?php 
namespace App\Services;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Str;
use App\Models\User;
use App\Helpers\Verification;
class AuthService 
{
    public function __construct(User $user,Verification $verification){
        $this->user = $user;
        $this->verification=$verification;
    }

    public function register($data)
    {
        $password = $data['password'];
        $data['user_name'] = Str::slug($data['first_name'].''.  $data['last_name']);
        $user =$this->user->create($data);
        //  Assign Role to User
        $user->assignRole('User');
         return new UserResource($user);
    }

    public function authenticate($request)
    {
        $credentials = ['email'=>$request->email, 'password'=>$request->password];

        if (!$token = auth()->attempt($credentials)) {
            return false;
        }
        return ['user'=>new UserResource(auth()->user()),'token'=>$token];
    }

    public function sendVerificationEmail($email)
    {
        $code = $this->verification->sendVerificationCode($email);
        
        return $code;
    }
    public function forgotPassword(forgotPasswordRequest $request)
    {
        $credentials = ['email'=>$request->email, 'password'=>$request->password];

        if (!$token = auth()->attempt($credentials)) {
            return false;
        }
        return ['user'=>new UserResource(auth()->user()),'token'=>$token];
    }

    public function currentUser(){
        return auth()->user();
    }

    public function invalidateToken(){
        return  auth()->logout();
    }
    
    public function refreshToken()
    {
       return auth()->refresh();
    }
}