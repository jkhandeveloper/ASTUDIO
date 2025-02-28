<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;

class Handler extends Exception
{

public function render($request, Throwable $exception)
{
    if ($exception instanceof ValidationException) {
        return response()->json([
            'errors' => $exception->errors()
        ], 422);
    }

    return parent::render($request, $exception);
}
}
