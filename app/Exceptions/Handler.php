<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            if ($request->expectsJson()) {
                return response()->json([], 401);
            }

            view()->replaceNamespace('errors', [
                resource_path('views/errors')]);

            return response()->view("errors::tokenMismatch");
        }

        if ($exception instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
            $langs = \Lang::get('passwords');
            return redirect()->back()->withErrors([
                'email' => $langs['throttled'],
            ]);
        }

        return parent::render($request, $exception);
    }
}
