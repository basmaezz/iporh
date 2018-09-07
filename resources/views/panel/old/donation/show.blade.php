@extends('panel.layouts.index')
@section('main')
    @push('panel_css')
    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span> Donation / Show </span></h2>
    </div>
    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-alt widget-messaging">
                    <div class="panel-body">
                        <ul>
                            <li>
                                <h4 class="sender trainer-row">ID</h4>
                                <small  style="font-size: 17px"> {{$item->id}}  </small>
                            </li>
                            <li>
                                <h4 class="sender trainer-row">Charge ID</h4>
                                <small style="font-size: 17px"> {{$item->charge_id}}  </small>
                            </li>
                            <li>
                                <h4 class="sender trainer-row">Donor Name</h4>
                                <small style="font-size: 17px"> {{$item->getName()}}  </small>
                            </li>
                            <li>
                                <h4 class="sender trainer-row">Email</h4>
                                <small  style="font-size: 17px">{{$item->email}}</small>
                            </li>
                            @if(isset($item->phone))
                            <li>
                                <h4 class="sender trainer-row">Phone</h4>
                                <small  style="font-size: 17px">{{$item->phone}}</small>
                            </li>
                            @endif
                            @if(isset($item->address))
                                <li>
                                    <h4 class="sender trainer-row">Address</h4>
                                    <small  style="font-size: 17px">{{$item->address}}</small>
                                </li>
                            @endif
                            <li>
                                <h4 class="sender trainer-row">Amount</h4>
                                <small  style="font-size: 17px">{{$item->amount.'$'}}</small>
                            </li>

                            <li>
                                <h4 class="sender trainer-row">Created At</h4>
                                <small  style="font-size: 17px">{{diff_for_humans($item->created_at) .'   At   '.get_date_from_timestamp($item->created_at)}}</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('panel_js')

    @endpush
@stop