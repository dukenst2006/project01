@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.customers.management') . ' | ' . trans('labels.backend.access.customers.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.transactions.management') }}
        <small style="color: red;">{{ $customer->status ? ''  : trans('labels.backend.access.customers.alert') }}</small>
    </h1>
@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" width="250px" style="align:center;" src="{{ $customer->image }}" alt="User profile picture" width="300px">
                        <h3 class="profile-username text-center">{{ $customer->name .' '. $customer->lastname }}</h3>
                        <p class="text-muted text-center"><b style="font-size: large">{{$customer->number}}</b></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>{{ trans('labels.backend.access.customers.table.ballance') }}</b> <a class="pull-right"><b style="font-size: larger">{{ $balance.' Gdes' }}</b></a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ trans('labels.backend.access.customers.table.roles') }}</b> <a class="pull-right">{{ $customer->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ trans('labels.backend.access.customers.table.identity') }}</b> <a class="pull-right">{{ $customer->cin }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ trans('labels.backend.access.customers.table.account_open_date') }}</b> <a class="pull-right">{{ $customer->updated_at->toFormattedDateString() }}</a>
                            </li>
                        </ul>

                        <a href="{{ url('/admin/customer/'.$customer->id).'/disable' }}" class="btn {{$customer->status == 1 ? 'btn-primary' : 'btn-danger'}} btn-block"><b>{{ $customer->status == 1 ? trans('labels.backend.access.customers.table.deactivated'): trans('labels.backend.access.customers.table.activated') }}</b></a>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- About Me Box -->

            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">{{ trans('labels.backend.access.customers.recent_transaction') }}</a></li>
                        <li><a href="#timeline" data-toggle="tab">{{ trans('labels.backend.access.transactions.deposit') }}</a></li>
                        <li><a href="#settings" data-toggle="tab">{{ trans('labels.backend.access.transactions.withdrawl') }}</a></li>
                        <li><a href="#transfert" data-toggle="tab">{{ trans('labels.backend.access.transactions.transfert') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="visible-lg">{{ trans('labels.backend.access.transactions.table.created') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.name') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.amount') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.type') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.authorised') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.reference') }}</th>

                                        <th class="visible-lg">{{ trans('labels.backend.access.transactions.table.last_updated') }}</th>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td class="visible-lg">{!! $transaction->created_at !!}</td>
                                            <td>{!! App\Customer::find($transaction->customer_id)->name.' '.App\Customer::find($transaction->customer_id)->lastname !!}</td>
                                            <td>{!! $transaction->amount !!}</td>
                                            <td>{!! App\Transactiontype::find($transaction->transactiontype_id)->name !!}</td>
                                            <td>{!! App\Models\Access\User\User::find($transaction->user_id)->name !!}</td>
                                            <td>{!! $transaction->reference !!}</td>
                                            <td class="visible-lg">{!! $transaction->updated_at !!}</td>
                                            {{--<td>{!! $transaction->action_buttons !!}</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- deposit -->
                            {!! Form::open(['route' => 'admin.transaction.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{ trans('labels.backend.access.transactions.deposit').' / ' .$customer->name .' '.$customer->lastname .' / '.$customer->number}}</h3>

                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('created_at', trans('labels.backend.access.transactions.date'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::date('created_at', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.number'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('amount', trans('labels.backend.access.transactions.table.amount'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::number('amount', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('labels.backend.access.transactions.table.amount'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('reference', trans('labels.backend.access.transactions.table.reference'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">

                                            {!! Form::text('reference', $TransactionRef , ['class' => 'form-control', 'placeholder' => trans('labels.backend.access.transactions.table.reference'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                        </div>
                                    </div><!--form control-->

                                    {{ Form::hidden('user_id', auth()->id()) }}
                                    {{ Form::hidden('customer_id', $customer->id) }}
                                    {{ Form::hidden('transactiontype_id', 1) }}
                                </div><!-- /.box-body -->
                            </div><!--box-->

                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="pull-left">
                                        <a href="" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                                    </div>

                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- /.box-body -->
                            </div><!--box-->

                            {!! Form::close() !!}
                        </div><!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <!-- Withdrawl -->
                            {!! Form::open(['route' => 'admin.transaction.withdrawl', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{ trans('labels.backend.access.transactions.withdrawl').' / ' .$customer->name .' '.$customer->lastname .' / '.$customer->number}}</h3>

                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('created_at', trans('labels.backend.access.transactions.date'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::date('created_at', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.number'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('amount', trans('labels.backend.access.transactions.table.amount'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::number('amount', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('labels.backend.access.transactions.table.amount'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('reference', trans('labels.backend.access.transactions.table.reference'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">

                                            {!! Form::text('reference', $TransactionRef , ['class' => 'form-control', 'placeholder' => trans('labels.backend.access.transactions.table.reference'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                        </div>
                                    </div><!--form control-->

                                    {{ Form::hidden('user_id', auth()->id()) }}
                                    {{ Form::hidden('customer_id', $customer->id) }}
                                    {{ Form::hidden('transactiontype_id', 2) }}
                                </div><!-- /.box-body -->
                            </div><!--box-->

                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="pull-left">
                                        <a href="" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                                    </div>

                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- /.box-body -->
                            </div><!--box-->

                            {!! Form::close() !!}
                        </div><!-- /.tab-pane -->
                        <!-- Transfert -->
                        <div class="tab-pane" id="transfert">
                            <!-- Transfert -->
                        {!! Form::open(['route' => 'admin.transaction.transfert', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ trans('labels.backend.access.transactions.transfert').' / ' .$customer->name .' '.$customer->lastname .' / '.$customer->number}}</h3>

                            </div><!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('created_at', trans('labels.backend.access.transactions.date'), ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::date('created_at', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.number'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                    </div>
                                </div><!--form control-->

                                <div class="form-group">
                                    {!! Form::label('amount', trans('labels.backend.access.transactions.acount'), ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {{ Form::select('number', $accountNumber) }}
                                    </div>
                                </div><!--form control-->

                                <div class="form-group">
                                    {!! Form::label('amount', trans('labels.backend.access.transactions.table.amount'), ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::number('amount', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('labels.backend.access.transactions.table.amount'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                    </div>
                                </div><!--form control-->

                                <div class="form-group">
                                    {!! Form::label('reference', trans('labels.backend.access.transactions.table.reference'), ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">

                                        {!! Form::text('reference', $TransactionRef , ['class' => 'form-control', 'placeholder' => trans('labels.backend.access.transactions.table.reference'), $customer->status ? "" : 'disabled' => 'disabled']) !!}
                                    </div>
                                </div><!--form control-->

                                {{ Form::hidden('user_id', auth()->id()) }}
                                {{ Form::hidden('customer_id', $customer->id) }}
                                {{ Form::hidden('transactiontype_id', 2) }}
                            </div><!-- /.box-body -->
                        </div><!--box-->

                        <div class="box box-info">
                            <div class="box-body">
                                <div class="pull-left">
                                    <a href="" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                                </div>

                                <div class="pull-right">
                                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.box-body -->
                        </div><!--box-->

                        {!! Form::close() !!}
                    </div><!-- /.tab-pane -->
                        <!-- End transfert -->
                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->

@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
@stop
