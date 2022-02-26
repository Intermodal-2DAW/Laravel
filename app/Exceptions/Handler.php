<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Throwable;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $exception) {
            //
            if (request()->is('api*'))
            {
                if ($exception instanceof ModelNotFoundException)
                    return response()->json(
                        ['error' => 'Item not found'], 404);
                else if ($exception instanceof AuthenticationException)
                    return response()->json(
                        ['error' => 'User not authenticated'], 401);
                else if ($exception instanceof ValidationException)
                        return response()->json(
                    ['error' => 'Invalid data'], 400);
                else if (isset($exception))
                    return response()->json(
                        ['error' => 'Application error (' .
                            get_class($exception). '):' .
                            $exception->getMessage()], 500);
            }
        });

    }
}
