@extends('layouts.main')
@section('content')
    <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                Widget settings form goes here
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn blue">Save changes</button>
                                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <!-- BEGIN PAGE HEADER-->
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                    </ul>
                    <div class="page-toolbar">
                        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                </div>
                <h3 class="page-title">
                    Dashboard <small>reports & statistics</small>
                </h3>
                <!-- END PAGE HEADER-->
                <!-- BEGIN DASHBOARD STATS -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue-madison">
                            <div class="visual">
                                <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    1349
                                </div>
                                <div class="desc">
                                    New Feedbacks
                                </div>
                            </div>
                            <a class="more" href="javascript:;">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat red-intense">
                            <div class="visual">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    12,5M$
                                </div>
                                <div class="desc">
                                    Total Profit
                                </div>
                            </div>
                            <a class="more" href="javascript:;">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat green-haze">
                            <div class="visual">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    549
                                </div>
                                <div class="desc">
                                    New Orders
                                </div>
                            </div>
                            <a class="more" href="javascript:;">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat purple-plum">
                            <div class="visual">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    +89%
                                </div>
                                <div class="desc">
                                    Brand Popularity
                                </div>
                            </div>
                            <a class="more" href="javascript:;">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END DASHBOARD STATS -->
                <div class="clearfix">
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bar-chart font-green-sharp hide"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">Site Visits</span>
                                    <span class="caption-helper">weekly stats...</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                            <input type="radio" name="options" class="toggle" id="option1">New</label>
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                    </div>
                                </div>
                            </div>
                          <!-- Chart place -->
                        </div>
                        <!-- END PORTLET-->
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-red-sunglo hide"></i>
                                    <span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
                                    <span class="caption-helper">monthly stats...</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            Filter Range<span class="fa fa-angle-down">
									</span>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    Q1 2014 <span class="label label-sm label-default">
											past </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    Q2 2014 <span class="label label-sm label-default">
											past </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;">
                                                    Q3 2014 <span class="label label-sm label-success">
											current </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    Q4 2014 <span class="label label-sm label-warning">
											upcoming </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                          <!-- Chart place -->
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>
        
            </div>
    <script>
        $(function () {
            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
        
        })
    </script>
@endsection
