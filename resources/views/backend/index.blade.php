@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.customers.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.management') }}
        <small>{{ trans('labels.backend.access.customers.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.customers.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.customer-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.customers.table.id') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.name') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.email') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.confirmed') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.roles') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.other_permissions') }}</th>
                        <th class="visible-lg">{{ trans('labels.backend.access.customers.table.created') }}</th>
                        <th class="visible-lg">{{ trans('labels.backend.access.customers.table.last_updated') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{!! $customer->id !!}</td>
                            <td>{{ link_to_route('admin.customer.profile', $customer->name.' '.$customer->lastname, $customer->id ) }} </td>
                            <td>{!! link_to("mailto:".$customer->email, $customer->email) !!}</td>
                            <td>{!! $customer->occupation !!}</td>
                            <td>{!! $customer->phone !!}</td>
                            <td>{!! $customer->address !!}</td>
                            <td class="visible-lg">{!! $customer->created_at->diffForHumans() !!}</td>
                            <td class="visible-lg">{!! $customer->updated_at->diffForHumans() !!}</td>
                            <td>{!! $customer->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Old Method used
            <div class="pull-left">
                {!! App\Customer::count() !!} {{ trans_choice('labels.backend.access.customers.table.total', App\Customer::count()) }}
            </div>
            --}}
            <div class="pull-left">
                {!! $customers->total() !!} {{ trans_choice('labels.backend.access.customers.table.total', $customers->total()) }}
            </div>

            <div class="pull-right">
                {!! $customers->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
