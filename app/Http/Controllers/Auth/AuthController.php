<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;

class AuthController extends Controller
{
    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }
   /**
     * Register a new user.
     *
     * @return Response
     */
    public function register(RegisterUserRequest $request)
    {
        if($request->has('email') && $request->is_verify == false){
           $code = $this->authService->sendVerificationEmail($request->email);
           return $this->successResponse(['code'=> $code],'Verification code send on your email', 200);
        }
        
        try {
            $data = $request->all();
            $data['password'] = app('hash')->make($data['password']);
            $user = $this->authService->register($data); // User Service 
            return $this->successResponse(['user'=>$user],'CREATED', 201);
        } catch (\Exception $e) {
            return $this->errorMessage('User Registration Failed!',409);
        }

    }
    /**
     * authenticated User.
     *
     * @return successResponse
     */
    public function login(LoginUserRequest $request)
    {
        if (!$user = $this->authService->authenticate($request)) {
            return $this->errorMessage('INVALID_CREDENTIALS', 401);
        }
        return $this->successResponse($user,'LOGIN', 200);
    }
    /**
     * Get the authenticated User.
     *
     * @return successResponse
     */
        public function me()
        {
            return $this->successResponse($this->authService->currentUser(),'CURRENT_USER',200);
        }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return successMessage
     */
        public function logout()
        {
            $this->authService->invalidateToken();
            return  $this->successMessage('Successfully logged out',200);
        }
     /**
     * Refresh a token.
     *
     * @return successResponse
     */
    public function refresh()
    {
        return  $this->successResponse(['refresh_token'=>$this->authService->refreshToken()],'Refresh Token',200);
    }
}
