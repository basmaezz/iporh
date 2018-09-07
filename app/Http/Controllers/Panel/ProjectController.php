<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\CreateProject;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('panel.project.all');
    }

    public function create()
    {
        return view('panel.project.create');
    }

    public function edit($id)
    {
        $data['project'] = Project::find($id);
        return (isset($data['project'])) ? view('panel.project.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }

    public function store(CreateProject $request)
    {
        $item = Project::create($request->all());
        if (isset($request->images)){
            $images = collect(json_decode($request->images))->pluck('id');
            $item->updateImages($images);
        }
        return (isset($item)) ? $this->response_api(true, 'تم إضافة المشروع بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function update($id, CreateProject $request)
    {
        $album = Project::updateOrCreate(['id' => $id], $request->all());
        if (isset($request->images)){
            $images = collect(json_decode($request->images))->pluck('id');
            $album->updateImages($images);
        }
        return (isset($album)) ? $this->response_api(true, 'تم تعديل المشروع بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function delete($id)
    {
        $item = Project::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function get_data_table(Project $items)
    {
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->editColumn('text', function ($item) {
                return string_limit($item->text,100);
            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' . lang_route('panel.project.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('project/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }
}
