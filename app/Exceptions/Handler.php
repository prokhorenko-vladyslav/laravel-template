<?php

namespace App\Exceptions;

use App\Enums\ResponseAlias;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        ValidationException::class,
        ThrowableResponse::class,
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (ThrowableResponse $e) {
            return $e->response;
        });

        $this->renderable(function (ValidationException $e) {
            return failedResponse(422, ResponseAlias::VALIDATION_ERRORS, $e->errors());
        });

        $this->renderable(function (ThrottleRequestsException $e) {
            return failedResponse(429, ResponseAlias::TOO_MANY_REQUESTS);
        });

        $this->renderable(function (AuthenticationException $e) {
            return failedResponse(401, ResponseAlias::NOT_AUTHENTICATED);
        });
    }
}
