<?php

namespace App\Http\Controllers\Panel;

use App\AlbumCategory;
use App\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class PhotoAlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('panel.album.all');
    }

    public function create()
    {
        return view('panel.album.create');
    }

    public function edit($id){
        $data['album'] = PhotoGallery::find($id);
        return (isset($data['album'])) ?  view('panel.album.edit',$data) : redirect()->route(get_current_locale().'.panel.dashboard');
    }

    public function store(Request $request){
        $images = collect(json_decode($request->images))->pluck('id');
        $album = PhotoGallery::create($request->all());
        $album->updateImages($images);
        return (isset($album)) ? $this->response_api(true, 'تم إضافة الألبوم بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function update($id,Request $request){
        $images = collect(json_decode($request->images))->pluck('id');
        $album = PhotoGallery::updateOrCreate(['id'=>$id],$request->all());
        $album->updateImages($images);
        return (isset($album)) ? $this->response_api(true, 'تم تعديل الألبوم بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function delete($id){
        $item = PhotoGallery::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function get_data_table(PhotoGallery $items){
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->editColumn('category_id', function ($item) {
                return $item->getCategoryName();
            })->editColumn('is_active', function ($item) {
                return ($item->is_active == 1) ? 'active' : 'Inactive';
            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' . lang_route('panel.album.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('album/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns(['icon_class', 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false,'failed');
        }
    }




    public function categories()
    {
        return view('panel.album.categories');
    }

    public function categories_data(AlbumCategory $items)
    {
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->editColumn('created_at',function ($item){
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                return
                    '<div class="row">
                      <button title="Edit" style="margin-right: 10px" data-id="' . $item->id . '" data-toggle="modal" data-target="#edit_modal"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</button>
                      <button  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00"  data-url="' . admin_url('album/categories/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </button>
                    </div>';
            })->rawColumns(['icon_class', 'action'])->make(true);
        } catch (\Exception $e) {
        }
    }


    public function get_category_data($id)
    {
        $item = AlbumCategory::find($id);
        return (isset($item)) ? $this->response_api(true, 'success', $item) : $this->response_api(false, 'success');
    }

    public function store_category(Request $request)
    {
        $item = AlbumCategory::create(['text' => $request->text,'text_en' => $request->text_en,]);
        return (isset($item)) ? $this->response_api(true, 'تم إضافة التصنيف بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function edit_category(Request $request, $id)
    {
        $item = AlbumCategory::find($id);
        return (isset($item) && $item->update(['text' => $request->text,'text_en' => $request->text_en,])) ? $this->response_api(true, 'تم تعديل التصنيف بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }

    public function delete_category($id)
    {
        $item = AlbumCategory::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ أثناء المعالجة');
    }


}
