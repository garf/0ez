<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use GrahamCampbell\Exceptions\ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($this->isResponseException($e)) {
            return parent::render($request, $e);
        }

        if ($this->isNotFountException($e)) {
            if ($request->ajax() || $request->wantsJson()) {
                return new JsonResponse(['404: ' . $e->getMessage()], 404);
            }

            return response()->view('errors.404', ['exception' => $e], 404);
        }

        if (config('app.debug')) {
            return $this->handleInDebugMode($request, $e);
        }

        return $this->handleInProductionMode($request, $e);
    }

    private function handleInDebugMode(Request $request, Exception $e)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return new JsonResponse(
                [
                    'success' => false,
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'code' => $e->getCode(),
                    'statusCode' => $this->getStatusCode($e),
                ],
                $this->getStatusCode($e)
            );
        }

        return $this->renderExceptionWithWhoops($e);
    }

    private function handleInProductionMode(Request $request, Exception $e)
    {
        if ($this->isQueryException($e)) {
            \Notifications::add('Update not allowed', 'danger', '0');

            return redirect()->back();
        }

        if ($request->ajax() || $request->wantsJson()) {
            return new JsonResponse([$this->getStatusCode($e) . ': ' . $e->getMessage()], $this->getStatusCode($e));
        }

        return response()->view('errors.500', ['exception' => $e], $this->getStatusCode($e));
    }

    private function renderExceptionWithWhoops(Exception $e)
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());

        return new \Illuminate\Http\Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }

    private function isNotFountException($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    private function isResponseException($e)
    {
        return $e instanceof HttpResponseException;
    }

    private function isQueryException($e)
    {
        return $e instanceof QueryException;
    }

    private function getStatusCode(Exception $e)
    {
        $statusCode = 500;

        if ($this->isHttpException($e)) {
            /** @var HttpException $e */
            $statusCode = $e->getStatusCode();
        }

        return $statusCode;
    }
}
