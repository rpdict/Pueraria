@extends('adminlte::layouts.app2')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div id="carousel-example-generic" class="carousel slide small-box" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">

                            <div class="carousel-caption">
                                First Slide
                            </div>
                        </div>
                        <div class="item active">
                            <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">

                            <div class="carousel-caption">
                                Second Slide
                            </div>
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">

                            <div class="carousel-caption">
                                Third Slide
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                @if (Auth::guest())
                    <div class="callout callout-info">
                        <h4><i class="icon fa fa-warning"></i>登录查看更多精彩内容</h4>
                        <p><a href="{{ url('/login') }}">没错，就是这里</a></p>
                    </div>
                @else
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username">Alexander Pierce</h3>
                            <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ Gravatar::get($user->email) }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">3,200</h5>
                                        <span class="description-text">SALES</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">35</h5>
                                        <span class="description-text">PRODUCTS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                @endif
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Add new event</a></li>
                                    <li><a href="#">Clear events</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View calendar</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <!-- Line chart -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>

                        <h3 class="box-title">Line Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="line-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-lg-4">
                <!-- Bar chart -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>

                        <h3 class="box-title">Bar Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="bar-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><a href="#">电子公告</a></h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">55%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-yellow">70%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light-blue">30%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">90%</span></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><a href="#">公司文化</a></h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">55%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-yellow">70%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light-blue">30%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">90%</span></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><a href="#">工作总结</a></h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">55%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-yellow">70%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light-blue">30%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">90%</span></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
@endsection