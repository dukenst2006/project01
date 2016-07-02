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

    <section class="content">
        <!-- ************ Expense Report List start ************-->
        <div class="row">
            <div class="col-sm-3">
                <form id="existing_customer" action="" method="post">
                    <label for="field-1" class="control-label pull-left holiday-vertical"><strong>Year:</strong></label>
                    <div class="col-sm-8">
                        <input type="date" name="year" class="form-control years" value="2016" data-format="yyyy">
                    </div>
                    <button type="submit" id="search_product" data-toggle="tooltip" data-placement="top" title="" class="btn btn-custom pull-right" data-original-title="Search">
                        <i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <br>
            <div class="row">
                <div class="col-md-3 hidden-print"><!-- ************ Expense Report Month Start ************-->
                    <ul class="nav holiday_navbar">
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#January">
                                <i class="fa fa-fw fa-calendar"></i> January </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#February">
                                <i class="fa fa-fw fa-calendar"></i> February </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#March">
                                <i class="fa fa-fw fa-calendar"></i> March </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#April">
                                <i class="fa fa-fw fa-calendar"></i> April </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#May">
                                <i class="fa fa-fw fa-calendar"></i> May </a>
                        </li>
                        <li class="active">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#June">
                                <i class="fa fa-fw fa-calendar"></i> June </a>
                        </li>
                        <li class="">
                            <a aria-expanded="true" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#July">
                                <i class="fa fa-fw fa-calendar"></i> July </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#August">
                                <i class="fa fa-fw fa-calendar"></i> August </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#September">
                                <i class="fa fa-fw fa-calendar"></i> September </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#October">
                                <i class="fa fa-fw fa-calendar"></i> October </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#November">
                                <i class="fa fa-fw fa-calendar"></i> November </a>
                        </li>
                        <li class="">
                            <a aria-expanded="false" data-toggle="tab" href="http://bacs.dev:82/admin/report/report_by_month#December">
                                <i class="fa fa-fw fa-calendar"></i> December </a>
                        </li>
                    </ul>
                </div><!-- ************ Expense Report Month End ************-->
                <div class="col-md-9"><!-- ************ Expense Report Content Start ************-->
                    <div class="tab-content">
                        <div id="January" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> January 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="February" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> February 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/2" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="March" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> March 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/3" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="April" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> April 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/4" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="expense_report()"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <div class="box-body">
                                        <div class="table-responsive" id="expense_report">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="visible-lg">{{ trans('labels.backend.access.transactions.table.created') }}</th>
                                                    <th>{{ trans('labels.backend.access.transactions.table.account_number') }}</th>
                                                    <th>{{ trans('labels.backend.access.transactions.table.type') }}</th>
                                                    <th>{{ trans('labels.backend.access.transactions.table.name') }}</th>
                                                    <th>{{ trans('labels.backend.access.transactions.table.amount') }}</th>
                                                    <th>{{ trans('labels.backend.access.transactions.table.authorised') }}</th>
                                                    <th>{{ trans('labels.backend.access.transactions.table.reference') }}</th>

                                                    <th class="visible-lg">{{ trans('labels.backend.access.transactions.table.last_updated') }}</th>
                                                    <th>{{ trans('labels.general.actions') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($reportMonthDepots as $reportMonthDepot)
                                                    <tr>
                                                        <td class="visible-lg">{!! $reportMonthDepot->created_at !!}</td>
                                                        <td>{!! App\Customer::find($reportMonthDepot->customer_id)->number !!}</td>
                                                        <td>{!! App\Transactiontype::find($reportMonthDepot->transactiontype_id)->name !!}</td>
                                                        <td>{!! App\Customer::find($reportMonthDepot->customer_id)->name.' '.App\Customer::find($reportMonthDepot->customer_id)->lastname !!}</td>
                                                        <td>{!! $reportMonthDepot->amount !!}</td>
                                                        <td>{!! App\Models\Access\User\User::find($reportMonthDepot->user_id)->name !!}</td>
                                                        <td>{!! $reportMonthDepot->reference !!}</td>
                                                        <td class="visible-lg">{!! $reportMonthDepot->updated_at->diffForHumans() !!}</td>
                                                        <td><form action="{{ url('/admin/transaction/'.$reportMonthDepot->id.'/delete') }}" method="POST" id="myform" style="display:inline;">
                                                                {!! csrf_field() !!}
                                                                {!! method_field('DELETE') !!}
                                                                {{--<button type="submit" class="btn btn-xs btn-danger">--}}
                                                                {{--<i class="fa fa-trash"></i>--}}
                                                                {{--</button>--}}
                                                                <button id="delete" class="btn btn-xs btn-danger" type="submit" onclick="if(!confirm('Voulez-vous Supprimer cette transaction ?')) return false;">
                                                                    <i class="glyphicon glyphicon-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- Old Method used --}}
                                        {{--<div class="pull-left">--}}
                                            {{--{!! App\Transaction::count() !!} {{ trans_choice('labels.backend.access.transactions.transac', App\Transaction::count()) }}--}}
                                        {{--</div>--}}

                                        <div class="pull-right">
                                            {{--{!! $$transaction->render() !!}--}}
                                        </div>

                                        <div class="clearfix"></div>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                        <div id="May" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> May 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/5" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="June" class="tab-pane active">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> June 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/6" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="July" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> July 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/7" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="August" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> August 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/8" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="September" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> September 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/9" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="October" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> October 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/10" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="November" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> November 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/11" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="December" class="tab-pane">
                            <div class="wrap-fpanel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <strong><i class="fa fa-calendar"></i> December 2016</strong>
                                            <div class="pull-right hidden-print">
                                                <span><a href="http://bacs.dev:82/admin/report/report_by_month_pdf/2016/12" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF"><span <i="" class="fa fa-file-pdf-o"></span></a></span>
                                                <button style="background: none;border: none" class="btn-print" type="button" data-toggle="tooltip" title="" onclick="expense_report(&#39;expense_report&#39;)" data-original-title="Print"><a href="#" class="btn btn-primary btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="printDiv(" printablearea")"="" data-original-title="Print"><span class="glyphicon glyphicon-print"></span></a></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Table -->
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Accounts</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Amount</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- ************ Expense Report Content Start ************-->
            </div><!-- ************ Expense Report List End ************-->
        </div>
        <script type="text/javascript">
            function expense_report(expense_report) {
                var printContents = document.getElementById(expense_report).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    </section>

@endsection
@section('script_chart')
    <script>
        function myFunction() {
            window.print();
        }
    </script>
        <script type="text/javascript">
                function expense_report(expense_report) {
                    var printContents = document.getElementById(expense_report).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
    </script>
@endsection
