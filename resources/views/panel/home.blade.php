@extends('panel.layouts.index')
@section('main')
    @push('panel_css')

    @endpush

    <div class="content">
        <div class="row">
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>Total Balance</p>
                                <h2 class="font-weight-bold">$15,859</h2>
                                <a href="#">View Statement</a> </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-bar"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-aqua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>Online Revenue</p>
                                <h2 class="font-weight-bold">$8,859</h2>
                                <a href="#">View Statement</a> </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-line"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>Total Profit</p>
                                <h2 class="font-weight-bold">$85,085</h2>
                                <a href="#">View Statement</a> </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-pie"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="info-box">
                    <div class="col-12">
                        <h5>Revenue Statistics</h5>
                        <div class="row m-t-2 m-b-2">
                            <div class="col-md-6">
                                <h1 class="font-weight-500">$23,743</h1>
                                <p>Total Revenue</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="text-blue font-weight-bold">Organic Traffic</h6>
                                <p class="f-13">+ 40% this month</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="text-green font-weight-bold">Page Views</h6>
                                <p class="f-13">+ 25% this month</p>
                            </div>
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card m-b-3">
                    <div class="card-body">
                        <div class="m-b-3 font-weight-bold">
                            <h5>New Clients
                                <button type="button" class="btn btn-sm btn-rounded btn-info pull-left">250</button>
                            </h5>
                        </div>
                        <div class="m-b-2 f-25">09.5% <i class="ti-bar-chart pull-right f-30"></i> </div>
                        <div><i class="f-20 ti-upload text-aqua"></i> 35% Increase in 30 Days</div>
                    </div>
                </div>
                <div class="card bg-info m-b-3">
                    <div class="card-body text-white">
                        <div class="m-b-1 font-weight-500">
                            <h5><span class="text-white">This Year Income</span>
                                <button type="button" class="btn btn-sm btn-rounded btn-danger pull-right">View more</button>
                            </h5>
                        </div>
                        <div class="f-40 font-weight-500">$58,869</div>
                        <div class="m-t-1"><span id="spa-pie-1" class="m-t-3 pull-right"></span> <span class="f-13">New Orders</span>
                            <h3>$32,535</h3>
                            <span class="f-13">Online Revenue</span>
                            <h3>$ 26,334</h3>
                            <span class="f-13">Total Profit</span>
                            <h3>$ 58,869</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-5 m-b-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Recent Activities <span class="pull-left f-13"><a href="#">View All</a></span></h5>
                        <div class="message-widget"> <a href="#">
                                <div class="user-img pull-left"> <img src="/panel/img/img1.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status online pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Florence Douglas</h5>
                                    <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">9:30 AM</span> </div>
                            </a> <a href="#">
                                <div class="user-img pull-left"> <img src="/panel/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status invisable pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Florence Douglas</h5>
                                    <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">10:30 AM</span> </div>
                            </a> <a href="#">
                                <div class="user-img pull-left"> <img src="/panel/img/img4.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status offline pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Florence Douglas</h5>
                                    <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">12:30 AM</span> </div>
                            </a> <a href="#">
                                <div class="user-img pull-left"> <img src="/panel/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status invisable pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Florence Douglas</h5>
                                    <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">10:30 AM</span> </div>
                            </a> <a href="#">
                                <div class="user-img pull-left"> <img src="/panel/img/img1.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status online pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Florence Douglas</h5>
                                    <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">9:30 AM</span> </div>
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Recent Chats <span class="pull-left f-13"><a href="#">View All</a></span></h5>
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" style="height:377px;">
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-left">Alexander Pierce</span> <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img2.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-right">Sarah Bullock</span> <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img3.jpg" alt="user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text"> You better believe it! </div>
                                </div>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-left">Alexander Pierce</span> <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img4.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-right">Sarah Bullock</span> <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img5.jpg" alt="user image">
                                    <div class="direct-chat-text"> I would love to. </div>
                                </div>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-left">Alexander Pierce</span> <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img6.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-right">Sarah Bullock</span> <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img3.jpg" alt="user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text"> You better believe it! </div>
                                </div>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-left">Alexander Pierce</span> <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img6.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-right">Sarah Bullock</span> <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span> </div>
                                    <img class="direct-chat-img" src="/panel/img/img3.jpg" alt="user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text"> You better believe it! </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input name="message" placeholder="Type Message ..." class="form-control" type="text">
                                    <span class="input-group-btn">
                    <button type="button" class="btn btn-warning btn-flat">Send</button>
                    </span> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

    @push('panel_js')

    @endpush
@stop