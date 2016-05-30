@extends('backend.layouts.master')
@section ('title',  $settings->app_name )
@section('page-header')
    <h1>
        {{--{!! app_name() !!}--}}
        {{ $settings->app_name }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <script language="JavaScript">
        <!--
        function euroConverter(){
            document.converter.dollar.value = document.converter.euro.value * 1.1389
            document.converter.canadian.value = document.converter.euro.value /  0.6793
            document.converter.gourde.value = document.converter.euro.value * 71.083
            document.converter.peso.value = document.converter.euro.value * 52.217
        }
        function gourdeConverter(){
            document.converter.dollar.value = document.converter.gourde.value / {{ $settings ->us_rate }};
            document.converter.euro.value = document.converter.gourde.value / {{ $settings ->euro_rate }};
            document.converter.canadian.value = document.converter.gourde.value / {{ $settings ->canadian_rate }};
            document.converter.peso.value = document.converter.gourde.value / {{ $settings ->peso_rate }};
        }
        function dollarConverter(){
            document.converter.euro.value = document.converter.dollar.value / 1.1381
            document.converter.gourde.value = document.converter.dollar.value * {{ $settings ->us_rate }};
            document.converter.canadian.value = document.converter.dollar.value / 0.7733
            document.converter.peso.value = document.converter.dollar.value / 0.02178
        }
        function canadianConverter(){
            document.converter.dollar.value = document.converter.canadian.value * 0.7732
            document.converter.euro.value = document.converter.canadian.value * 0.6793
            document.converter.gourde.value = document.converter.canadian.value * {{ $settings ->canadian_rate }};
            document.converter.peso.value = document.converter.canadian.value * 35,2911
        }
        function pesoConverter(){
            document.converter.dollar.value = document.converter.peso.value * 0.0218
            document.converter.canadian.value = document.converter.peso.value / 35.2911
            document.converter.gourde.value = document.converter.peso.value * {{ $settings ->peso_rate }};
            document.converter.euro.value = document.converter.peso.value * 0.0192
        }
        //-->
    </script>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {!! access()->user()->name !!}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {{--{!! getLanguageBlock('backend.lang.welcome') !!}--}}
                    <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <p style="float:left;">{{ $settings->currency.' ' }}</p><h3> {{ $totalAmount.'.00' }}</h3>
                                <p>{{ trans('settings.ballance_all') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cash"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Transactions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $totalCustomer }}</h3>
                                <p>{{ trans('settings.customer_all') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                            <a href="{{ url('admin/customer') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Utilisateurs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                </div><!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li><a href="#revenue-chart" data-toggle="tab">{{ trans('settings.graph') }}</a></li>
                                <li class="active"><a href="#sales-chart" data-toggle="tab">{{ trans('settings.withdral&deposit') }}</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i>{{ trans('settings.transactions') }}</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;"></div>
                            </div>
                        </div><!-- /.nav-tabs-custom -->


                    </section><!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">
                        <!-- solid sales graph -->
                        <div class="box-header">
                            <i class="fa fa-refresh"></i>
                            <h3 class="box-title">{{ trans('labels.general.converter') }}</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div><!-- /. tools -->
                        </div>
                        <!-- quick Converter -->
                        <div class="box box-info">
                            <div class="box-body">
                                <form name="converter">
                                <table class="table table-bordered" border="0">
                                    <tr>
                                        <th style="width: 10px">Symbole</th>
                                        <th>Dévise</th>
                                        <th>Progression %</th>
                                        <th style="width: 40px">Taux</th>
                                    </tr>
                                    <tr>
                                        <td>HTG</td>
                                        <td><input type="number" step ="any" name="gourde" onChange="gourdeConverter()" /></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-red">1.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>USD</td>
                                        <td><input type="number" step ="any" name="dollar" onChange="dollarConverter()" /></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-success" style="width: 85%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-green">{{ $settings ->us_rate }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>EURO</td>
                                        <td><input type="number" step ="any" name="euro" onChange="euroConverter()" /></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-yellow">{{ $settings ->euro_rate }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>CAD</td>
                                        <td><input type="number" step ="any" name="canadian" onChange="canadianConverter()" /></td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light-blue">{{ $settings ->canadian_rate }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>PESO</td>
                                        <td><input type="number" step ="any" name="peso" onChange="pesoConverter()" /></td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-green">{{ $settings ->peso_rate }}</span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="pull-left">
                                                <input type="button" class="btn btn-info btn-md" value="Convertir" />
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </div>
                                        </td>
                                        <td>

                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                                </form>
                            </div><!-- /.box-body -->
                        </div>

                    </section><!-- right col -->
                </div><!-- /.row (main row) -->

            </section><!-- /.content -->
        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection
@section('script_chart')
    <script>
        $(function () {
            "use strict";

            // AREA CHART
            var area = new Morris.Area({
                element: 'revenue-chart',
                resize: true,
                data: [
                    {y: '2011 Q1', item1: 2666, item2: 2666},
                    {y: '2011 Q2', item1: 2778, item2: 2294},
                    {y: '2011 Q3', item1: 4912, item2: 1969},
                    {y: '2011 Q4', item1: 3767, item2: 3597},
                    {y: '2012 Q1', item1: 6810, item2: 1914},
                    {y: '2012 Q2', item1: 5670, item2: 4293},
                    {y: '2012 Q3', item1: 4820, item2: 3795},
                    {y: '2014 Q4', item1: 15073, item2: 5967},
                    {y: '2015 Q1', item1: 10687, item2: 4460},
                    {y: '2016 Q2', item1: 8432, item2: 5713}
                ],
                xkey: 'y',
                ykeys: ['item1', 'item2'],
                labels: ['Item 1', 'Item 2'],
                lineColors: ['#a0d0e0', '#3c8dbc'],
                hideHover: 'auto'
            });
            //DONUT CHART
            var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954", "#00a65a"],
                data: [
                    {label: "{{ trans('labels.general.chartdeposit') }} ", value: {{  $totalDeposit }} },
                    {label: " {{ trans('labels.general.chartwithdrawl') }} ", value: {{ $totalWithdrawl}} },
                    {label: " {{ trans('labels.general.chartloan') }} ", value: 0}
                ],
                hideHover: 'auto'
            });

        });
    </script>
@endsection
