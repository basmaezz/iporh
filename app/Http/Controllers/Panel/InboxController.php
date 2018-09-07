<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\MessageRequest;
use App\Mail\ReplayMail;
use App\VisitorMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class InboxController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(VisitorMessage $messages)
    {
        $data['messages'] = $messages->orderBy('created_at', 'DESC')->paginate(10);
        return view('panel.inbox.all', $data);
    }

    public function view_msg($id)
    {
        $data['msg'] = VisitorMessage::find($id);
        return (isset($data['msg']) && $data['msg']->markAsRead()) ? view('panel.inbox.view', $data) : redirect()->to('/dashboard');
    }

    public function replay_msg(Request $request)
    {
        Mail::to($request->email, 'Nafes')->send(new  ReplayMail('رد على الرسالة المرسلة من طرفك لموقع دراية', $request->text, $request->email));
        if ((count(Mail::failures()) > 0)) {
            return response()->json(['status' => false, 'message' => 'حدث خطأ أثناء الإرسال .. ']);
        }
        return response()->json(['status' => true, 'message' => 'تم إرسال ردك بنجاح ..']);
    }

    public function delete(Request $request, VisitorMessage $messages)
    {
        if (!(isset($request->delete) && count($request->delete) > 0)) {
            return $this->response_api(false, 'يجب عليك تحديد رسالة واحدة على الأقل');
        }
        $array = array_map('intval', $request->delete);
        $messages = $messages->whereIn('id', $array);
        return (isset($messages) && $messages->delete()) ? $this->response_api(true, 'تم حذف الرسائل المحددة بنجاح') : $this->response_api(false, 'Unknown Error Occurred');
    }

    public function delete_msg($id)
    {
        $msg = VisitorMessage::find($id);
        return (isset($msg) && $msg->delete()) ? $this->response_api(true, 'تم حذف الرسالة بنجاح') : $this->response_api(false, 'Unknown Error Occurred');
    }

}
