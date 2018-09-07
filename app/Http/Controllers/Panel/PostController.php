<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePost;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('panel.post.all');
    }

    public function create()
    {
        return view('panel.post.create');
    }

    public function edit($id)
    {
        $data['post'] = Post::find($id);
        return (isset($data['post'])) ? view('panel.post.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }

    public function store(CreatePost $request)
    {
        $post = Post::create($request->all());
        if (isset($request->images)){
            $images = collect(json_decode($request->images))->pluck('id');
            $post->updateImages($images);
        }
        return (isset($post)) ? $this->response_api(true, 'تم إضافة الخبر بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function update($id, CreatePost $request)
    {
        $album = Post::updateOrCreate(['id' => $id], $request->all());
        if (isset($request->images)){
            $images = collect(json_decode($request->images))->pluck('id');
            $album->updateImages($images);
        }
        return (isset($album)) ? $this->response_api(true, 'تم تعديل الخبر بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete($id)
    {
        $item = Post::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function get_data_table(Post $items)
    {
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->editColumn('category_id', function ($item) {
                return $item->getCategoryName();
            })->editColumn('description', function ($item) {
                return string_limit($item->description,100);
            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' . lang_route('panel.post.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('post/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }


    public function categories()
    {
        return view('panel.post.categories');
    }

    public function categories_data(PostCategory $items)
    {
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                return '<div class="row">
                          <button title="Edit" style="margin-right: 10px" data-id="' . $item->id . '" data-toggle="modal" data-target="#edit_modal"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</button>
                          <button  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00"  data-url="' . admin_url('post/categories/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </button>
                        </div>';
            })->rawColumns(['icon_class', 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false,'Failed');
        }
    }


    public function get_category_data($id)
    {
        $item = PostCategory::find($id);
        return (isset($item)) ? $this->response_api(true, 'success', $item) : $this->response_api(false, 'success');
    }

    public function store_category(Request $request)
    {
        $item = PostCategory::create(['text' => $request->text, 'text_en' => $request->text_en,]);
        return (isset($item)) ? $this->response_api(true, 'تم حفظ التصنيف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function edit_category(Request $request, $id)
    {
        $item = PostCategory::find($id);
        return (isset($item) && $item->update(['text' => $request->text, 'text_en' => $request->text_en,])) ? $this->response_api(true, 'تم تعديل التصنيف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete_category($id)
    {
        $item = PostCategory::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }
}
