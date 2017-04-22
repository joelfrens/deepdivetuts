@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">Dashboard</div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="counter-box mg-rt-sm">
                        <h6 class="no-margin">Subscribers</h6>
                        <div class="count">5</div>  
                    </div>
                    <div class="counter-box mg-rt-sm">
                        <h6 class="no-margin">Total Visits</h6>
                        <div class="count">1100</div>   
                    </div>
                    <div class="counter-box mg-rt-sm">
                        <h6 class="no-margin">Users</h6>
                        <div class="count">20</div> 
                    </div>
                </div>
            </div>
            <div class="row mg-tp-sm">
                <div class="col-xs-12 col-md-4">
                    <div class="circular-box">
                        <canvas id="browserView" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="col-xs-12 col-md-5">
                    <div class="panel panel-default list-panel">
                        <div class="panel-heading list-head">
                            <div class="inner-head">
                                <h3 class="panel-title list-title">Comments</h3>
                            </div>
                        </div>
                        <div class="panel-body list-body">
                            <div class="list-row">
                                <span>afasf</span>
                                <div class="list-action-box">
                                    <span class="inline-block pull-left mg-rt-xs">1 day ago</span>
                                    <button type="button" class="btn btn-danger list-action-dec">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-info list-action-appr mg-rt-xs">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="list-row">
                                <span>gsdg</span>
                                <div class="list-action-box">
                                    <span class="inline-block pull-left mg-rt-xs">2 days ago</span>
                                    <button type="button" class="btn btn-danger list-action-dec">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-info list-action-appr mg-rt-xs">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="panel panel-default info-panel">
                        <div class="panel-heading info-head">
                            <h3 class="panel-title info-title">Users registered</h3>
                        </div>
                        <div class="panel-body info-body">
                            <div class="info-row">
                                <span class="info-col">Joel</span>
                                <span class="info-col">12/09/2016</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">Elita</span>
                                <span class="info-col">12/09/2016</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default info-panel">
                        <div class="panel-heading info-head">
                            <h3 class="panel-title info-title">Top 10 articles</h3>
                        </div>
                        <div class="panel-body info-body">
                            <div class="info-row">
                                <span class="info-col">Our first article here...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">When there is sunshine all over...</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default info-panel">
                        <div class="panel-heading info-head">
                            <h3 class="panel-title info-title">Recent Subscriptions</h3>
                        </div>
                        <div class="panel-body info-body">
                            <div class="info-row">
                                <span class="info-col">joel@deepdive.com</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">joelfe@deepdive.com</span>
                            </div>
                            <div class="info-row">
                                <span class="info-col">james@deepdive.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="software-info">
            <span>Software v1.0</span>&nbsp;&#124;
            <span><i class="fa fa-envelope" aria-hidden="true"></i> joelfrens@gmail.com</span>&nbsp;&#124;
            <span><i class="fa fa-mobile" aria-hidden="true"></i> +447895632144&nbsp;</span>
        </div>
    </div>
@endsection
