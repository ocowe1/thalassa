<?php

namespace App\Http\Controllers;

use App\Libraries\Filters;
use App\Models\Importador;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseSuccessJson($data = null, $message = null)
    {
        $result['status'] = 'success';

        if($message){
            $result['message'] = $message;
        }

        if($data){
            $result['data'] = $data;
        }

        return response()->json($result, 200);
    }

    public function responseExceptionJson($exception)
    {
        return response()->json([
            'status' => "exception",
            'message' => $exception->getCode()." - ".$exception->getMessage()
        ],200);
    }

    public function responseErrorJson($message, $code, $data = null)
    {
        $result['status'] = 'error';

        $result['message'] = $message;

        if($data){
            $result['data'] = $data;
        }

        return response()->json($result, $code);
    }

    public function encodeFile64($filePath): string
    {
        $fileData = file_get_contents($filePath);
        return base64_encode($fileData);
    }

    private function base64UrlEncode(string $data)
    {
        $base64UrlEncode = strtr(base64_encode($data), '+/', '-_');

        return rtrim($base64UrlEncode, '=');
    }

    private function base64UrlDecode(string $data)
    {
        $base64UrlDecode = strtr($data, '-_', '+/');

        $base64UrlDecode = str_pad($base64UrlDecode, strlen($data) % 4, '=', STR_PAD_RIGHT);

        return base64_decode($base64UrlDecode);
    }
}
