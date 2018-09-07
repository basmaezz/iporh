<?php

namespace App\Http\Controllers\Panel;

use App\Donation;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('panel.donation.all');
    }

    public function show(Donation $donation)
    {
        return (isset($donation->id)) ? view('panel.donation.show',['item'=>$donation]) : redirect()->route(get_current_locale().'panel.dashboard');
    }

    public function get_data_table(Donation $items)
    {
        $items = $items->orderBy('created_at', 'DESC')->get();
        try {
            return DataTables::of($items)->addColumn('name', function ($item) {
                return $item->getName();
            })->editColumn('is_active', function ($item) {
                return ($item->is_active == 1) ? 'Active' : 'Inactive';
            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                return '<div class="row">
                           <a title="Show" style="margin-right: 10px" href="' . lang_route('panel.donation.show', ['id' => $item->id]) . '"  class="btn btn-sm btn-warning " >Show  <i style="margin-left: 2px" class="fa fa-share"></i>  </a>
                        </div>';
            })->rawColumns(['action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }


}
