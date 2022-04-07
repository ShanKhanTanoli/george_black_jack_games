<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        /*If not found*/
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                return response()->view('errors.' . 'errorPage', [], 404);
            }
        }

        /*If the Internal Server Error*/
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 500) {
                return response()->view('errors.' . 'errorPage', [], 500);
            }
        }

        /*If have Bad Request*/
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 400) {
                return response()->view('errors.' . 'errorPage', [], 400);
            }
        }

        /*If have Unauthorized Action*/
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 403) {
                return response()->view('errors.' . 'errorPage', [], 403);
            }
        }

        /*If the Session Expired*/
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 419) {
                return response()->view('errors.' . 'loginAgain', [], 419);
            }
        }

        return parent::render($request, $exception);
    }
}
