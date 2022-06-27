<?php

namespace App\Exceptions;

use App\Helpers\ResponseFormatter;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        $error = $exception->getMessage();
        $errors = [$error];

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
            Log::info("coba coba");
            return $this->responseFormat("route not found", 404);
        }else if($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException){
            return $this->responseFormat("data not found", 404);
        }else if ($exception instanceof JWTException) {
            return $this->responseFormat($exception->getMessage(), 401);
        }
        //do your stuff with the error message
        //return $this->responseFormat($error);

        return parent::render($request, $exception);
    }

    private function responseFormat($message = null, $code = 500){
        return ResponseFormatter::error([
            'errors' => [$message],
        ], $message, $code);
    }
}
