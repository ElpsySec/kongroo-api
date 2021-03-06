<?php

namespace App\Http\Controllers\Auth\Login\Password;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Login\LoginController;
use App\Models\Access\User\User;
use App\Jobs\Auth\SendAuthEmailToUser;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PasswordTokenController extends LoginController
{

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateLoginRequest($request);

        $oldToken = $this->jwt->getToken();

        try {
            $user = $this->resolveUserFromToken();
        } catch (ModelNotFoundException $e) {
            return $this->onBadRequest();
        }

        // authenticate password

        $token = $this->makeNewVerifiedTokenForUser($user, ['credential']);

        return $this->onGoodRequest($token);
    }



    protected function dispatchLoginToUser($user)
    {
        // $this->dispatch(new SendAuthEmailToUser($user));
    }
    /**
     * Validate authentication request.
     *
     * @param  Request $request
     * @return void
     * @throws HttpResponseException
     */
    protected function validateLoginRequest(Request $request)
    {
        $rules = ['email' => 'required|email|max:255|exists:users,email', 'password' => 'required'];

        $credentials = $request->only(['email']);

        $validator = $this->getValidationFactory()
            ->make($credentials, $rules, [], []);

        if ($validator->fails()) {
            $this->onBadRequest();
        }
    }
}
