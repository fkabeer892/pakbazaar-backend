<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Build success response
     * @param  string|array $data
     * @param  int $code
     * @return \Illuminate\Http\Response
     */
    public function successResponse($data, $message, $code = Response::HTTP_OK)
    {
        if(is_object($data) && $data instanceof \Illuminate\Http\Resources\Json\AnonymousResourceCollection){
            $data->additional([
                'success' => true,
                "code" => $code,
                "message" => $message
            ]);
            return $data;
        }
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'code' => $code
        ], $code);
        //$data->additional

    }
       /**
     * Build valid response
     * @param  string|array $message
     * @param  int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successMessage($message, $code)
    {
        return response()->json(['success'=>true,'message' =>$message,'code'=> $code], $code);
    }


    /**
     * Build error responses
     * @param  string|array $error
     * @param  int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($error,$message,$code)
    {
        return response()->json(['success'=>false,'error' => $error,'message'=>$message,'code' => $code], $code);
    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param  int $code
     * @return \Illuminate\Http\Response
     */
    public function errorMessage($message, $code = 500)
    {
        return response()->json(['success'=>false,'message' =>$message,'code'=> $code], $code);
    }
}
