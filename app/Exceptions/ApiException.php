<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public $data;

    public function __construct($message, $statusCode = 400, $data = [])
    {
        parent::__construct($message, $statusCode);
        $this->data = $data;
    }

    public function render()
    {
        return response()->json([
            'error' => true,
            'message' => $this->getMessage(),
            'data' => $this->data,
        ], $this->getCode());
    }
}
