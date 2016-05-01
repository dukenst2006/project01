@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.transactions.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.transactions.management') }}
        <small>{{ trans('labels.backend.access.transactions.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.transactions.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.customer-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="visible-lg">{{ trans('labels.backend.access.transactions.table.created') }}</th>
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
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="visible-lg">{!! $transaction->created_at->diffForHumans() !!}</td>
                            <td>{!! App\Transactiontype::find($transaction->transactiontype_id)->name !!}</td>
                            <td>{!! App\Customer::find($transaction->customer_id)->name !!}</td>
                            <td>{!! $transaction->amount !!}</td>
                            <td>{!! App\Models\Access\User\User::find($transaction->user_id)->name !!}</td>
                            <td>{!! $transaction->reference !!}</td>
                            <td class="visible-lg">{!! $transaction->updated_at->diffForHumans() !!}</td>
                            <td>{!! $transaction->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Old Method used --}}
            <div class="pull-left">
                {!! App\Transaction::count() !!} {{ trans_choice('labels.backend.access.customers.table.total', App\Transaction::count()) }}
            </div>

            {{--<div class="pull-left">--}}
                {{--{!! $transaction->total() !!} {{ trans_choice('labels.backend.access.transactions.table.total', $transaction->total()) }}--}}
            {{--</div>--}}

            <div class="pull-right">
                {{--{!! $$transaction->render() !!}--}}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
