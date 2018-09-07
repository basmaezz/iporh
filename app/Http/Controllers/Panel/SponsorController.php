<?php

namespace App\Http\Controllers\Panel;

use App\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('panel.sponsor.all');
    }

    public function all_data_table(Sponsor $items)
    {
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->editColumn('link', function ($item) {
                return '<a target="_blank" href="' . $item->link . ' ">' . $item->link . '</a>';
            })->editColumn('photo', function ($item) {
                return '<img style="max-height:200px;width:100%" src="' . image_url($item->photo,'200x100') . '">';
            })->addColumn('action', function ($item) {
//                return '<div class="row">
//                            <button title="ُEdit" style="margin-right: 10px" data-id="' . $item->id . '" data-toggle="modal" data-target=".bs-example-modal-photo" class="btn btn-sm btn-success edit" ><i style="margin-left: 5px" class="fa fa-check-square-o"></i>Edit</button>
//                            <button  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00"  data-url="' . lang_route('panel.sponsors.delete', ['id' => $item->id]) . '"   class="btn btn-sm btn-danger delete"><i class="glyphicon glyphicon-remove"></i> Delete</button>
//                        </div>';
                return '<div class="row">
                          <button title="Edit" style="margin-right: 10px"  data-edit="' . lang_route('panel.sponsors.item', [$item->id]) . '" data-id="' . $item->id . '" data-toggle="modal" data-target="#edit_modal"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</button>
                          <button  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00" data-url="' . lang_route('panel.sponsors.delete', ['id' => $item->id]) . '"    class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </button>
                        </div>';
            })->rawColumns(['link', 'photo', 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false,'');
        }
    }

    public function get_item_data($id)
    {
        $item = Sponsor::find($id);
        return (isset($item)) ? $this->response_api(true, 'success', $item) : $this->response_api(false, 'success');
    }

    public function store(Request $request)
    {
        $item = Sponsor::create(['link' => $request->link, 'photo' => $request->photo]);
        return (isset($item)) ? $this->response_api(true, 'تمت الإضافة بنجاح') : $this->response_api(false, 'Unknown Error Occurred');
    }

    public function edit(Request $request, $id)
    {
        $item = Sponsor::find($id);
        return (isset($item) && $item->update(['link' => $request->link, 'photo' => $request->photo])) ? $this->response_api(true, 'تم التعديل بنجاح') : $this->response_api(false, 'Unknown Error Occurred');
    }

    public function delete($id)
    {
        $item = Sponsor::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تم الحذف بنجاح') : $this->response_api(false, 'Unkown Error Ocurred');
    }

}
