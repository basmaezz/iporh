<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_validation_errors($type, $message_text, $errors, $is_array = null)
    {
        $error = [];
        $data['errors'] = [];
        foreach ($errors->getMessages() as $k => $message) {
            $error['key'] = $k;
            $error['message'] = $message[0];
            $data['errors'] [] = $error;
        }
        $view = ajax_render_view('layout.errors', $data);
        if (isset($is_array)) {
            return ['message' => $message_text, 'errors_object' => $view];
        }
        return $this->response_api(false, $message_text, ($type) ? $view : $data['errors']);
    }

    function response_api($status, $message, $items = null)
    {
        $response = ['status' => $status, 'message' => $message];
        if ($status && isset($items)) {
            $response['item'] = $items;
        } else {
            $response['errors_object'] = $items;
        }
        return response()->json($response);
    }



}
