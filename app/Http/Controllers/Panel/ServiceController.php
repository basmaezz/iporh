<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\CreateProject;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('panel.service.all');
    }

    public function create()
    {
        return view('panel.service.create');
    }

    public function edit($id)
    {
        $data['service'] = Service::find($id);
        return (isset($data['service'])) ? view('panel.service.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }

    public function store(CreateProject $request)
    {
        $item = Service::create($request->all());
        return (isset($item)) ? $this->response_api(true, 'تم إضافة الخدمة بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function update($id, CreateProject $request)
    {
        $item = Service::updateOrCreate(['id' => $id], $request->all());
        return (isset($item)) ? $this->response_api(true, 'تم تعديل الخدمة بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function delete($id)
    {
        $item = Service::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function get_data_table(Service $items)
    {
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->editColumn('text', function ($item) {
                return string_limit($item->text,100);
            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' . lang_route('panel.service.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('service/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }

}
