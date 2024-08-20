<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        // Add any exceptions here that you don't want to report
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
        $this->reportable(function (Throwable $e) {
            // Custom reporting logic, if needed
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        // Handle database connection errors
        if ($exception instanceof QueryException) {
            // Error code 2002 indicates a connection failure
            if ($exception->getCode() == 2002) {
                return response()->json([
                    'message' => 'Could not connect to the database. Please check your database connection settings.'
                ], 500);
            }
        }

        // Fallback to the parent implementation for all other exceptions
        return parent::render($request, $exception);
    }

    /**
     * Handle unauthenticated exceptions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if (!$request->expectsJson()) {
            if ($request->is('api/*')) {
                $notify[] = 'Unauthorized request';
                return response()->json([
                    'remark' => 'unauthenticated',
                    'status' => 'error',
                    'message' => ['error' => $notify]
                ]);
            } else {
                return redirect()->route('user.login');
            }
        }
    }
}
