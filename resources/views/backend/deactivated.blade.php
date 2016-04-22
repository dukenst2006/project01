@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.customers.management') . ' | ' . trans('labels.backend.access.customers.deactivated'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.management') }}
        <small>{{ trans('labels.backend.access.customers.deactivated') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.customers.deactivated') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.users.table.id') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.name') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.other_permissions') }}</th>
                        <th class="visible-lg">{{ trans('labels.backend.access.users.table.created') }}</th>
                        <th class="visible-lg">{{ trans('labels.backend.access.users.table.last_updated') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($customers->count())
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{!! $customer->id !!}</td>
                                <td>{!! $customer->name !!}</td>
                                <td>{!! link_to("mailto:".$customer->email, $user->email) !!}</td>
                                <td>{!! $customer->confirmed_label !!}</td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td class="visible-lg">{!! $customer->created_at->diffForHumans() !!}</td>
                                <td class="visible-lg">{!! $customer->updated_at->diffForHumans() !!}</td>
                                <td>{!! $customer->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="9">{{ trans('labels.backend.access.users.table.no_deactivated') }}</td>
                    @endif
                    </tbody>
                </table>
            </div>

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
