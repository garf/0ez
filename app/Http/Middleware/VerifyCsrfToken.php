<?php

namespace app\Http\Middleware;

use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Notifications;
use Redirect;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function __construct(Encrypter $encrypter)
    {
        $routes = [
            'root-upload-image-ajax',
        ];

        foreach ($routes as $route) {
            $this->except[] = trim(route($route, [], false), '/');
        }

        parent::__construct($encrypter);
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @throws \Illuminate\Session\TokenMismatchException
     *
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($this->isReading($request) || $this->shouldPassThrough($request) || $this->tokensMatch($request)) {
            return $this->addCookieToResponse($request, $next($request));
        }

        Notifications::add('Token Expired', 'warning');

        return Redirect::back()->withInput($request->except(['_token']));
    }
}
