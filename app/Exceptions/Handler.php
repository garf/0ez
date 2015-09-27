<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $e
     *
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $e
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if (config('app.debug')) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => $e->getMessage().' in "'.$e->getFile().'" on line '.$e->getLine(),
                ], 500);
            } else {
                return parent::render($request, $e);
            }
        }

        if ($this->isHttpException($e)) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'Page not found',
                ], 404);
            } else {
                return \Response::make(view('errors.404', ['title' => '404 Not Found'])->render(), 404);
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'error' => 'Internal Server Error',
            ], 500);
        } else {
            return \Response::make(view('errors.500', ['title' => '500 Server Error'])->render(), 500);
        }
    }
}
