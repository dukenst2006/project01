@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.customers.management') . ' | ' . trans('labels.backend.access.customers.deleted'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.management') }}
        <small>{{ trans('labels.backend.access.customers.deleted') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.customers.deleted') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
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
                    @if ($users->count())
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
                                <td>
                                    @permission('undelete-customers')
                                    <a href="{{route('admin.customer.restore', $customer->id)}}" class="btn btn-xs btn-success" name="restore_user"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.backend.access.users.restore_user') }}"></i></a>
                                    @endauth

                                    @permission('permanently-delete-customers')
                                    <a href="{{route('admin.customer.delete-permanently', $customer->id)}}" class="btn btn-xs btn-danger" name="delete_user_perm"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.backend.access.users.delete_permanently') }}"></i></a>
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="9">{{ trans('labels.backend.access.users.table.no_deleted') }}</td>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $customers->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $customers->total()) }}
            </div>

            <div class="pull-right">
                {!! $customers->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts-end')
    <script>
        $(function() {
            @permission('permanently-delete-users')
                $("a[name='delete_user_perm']").click(function(e) {
                e.preventDefault();

                swal({
                    title: "{!! trans('strings.backend.general.are_you_sure') !!}",
                    text: "{!! trans('strings.backend.access.users.delete_user_confirm') !!}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{!! trans('strings.backend.general.continue') !!}",
                    cancelButtonText: "{!! trans('buttons.general.cancel') !!}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location = $("a[name='delete_user_perm']").attr('href');
                    }
                });
            });
            @endauth

            @permission('undelete-users')
                $("a[name='restore_user']").click(function(e) {
                e.preventDefault();

                swal({
                    title: "{!! trans('strings.backend.general.are_you_sure') !!}",
                    text: "{!! trans('strings.backend.access.users.restore_user_confirm') !!}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{!! trans('strings.backend.general.continue') !!}",
                    cancelButtonText: "{!! trans('buttons.general.cancel') !!}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location = $("a[name='restore_user']").attr('href');
                    }
                });
            });
            @endauth
        });
    </script>
@stop
