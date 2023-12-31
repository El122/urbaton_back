<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, $e): \Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        if($e instanceof AuthenticationException)
            return response()->json([
                'status' => Response::HTTP_UNAUTHORIZED,
                'message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

        return parent::render($request, $e);
    }
}
