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
                        <th>{{ trans('labels.backend.access.customers.table.number') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.identity') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.gender') }}</th>
                        <th>{{ trans('labels.backend.access.customers.table.occupation') }}</th>
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
                            {{--<td>{!! link_to("mailto:".$customer->email, $customer->email) !!}</td>--}}
                            <td>{!! $customer->number !!}</td>
                            <td>{!! $customer->cin !!}</td>
                            <td>{!! $customer->sex !!}</td>
                            <td>{!! $customer->occupation !!}</td>
                            <td>{!! $customer->phone !!}</td>
                            <td>{!! $customer->address !!}</td>
                            <td class="visible-lg">{!! $customer->created_at->toFormattedDateString() !!}</td>
                            <td class="visible-lg">{!! $customer->updated_at->diffForHumans() !!}</td>
                            {{--<td>{!! $customer->action_buttons !!}</td>--}}
                            <td>
                                <a href="{{ url('/admin/customer/'.$customer->id.'/edit') }}" class="btn btn-xs btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url('/admin/customer/'.$customer->id) }}" method="POST" id="myform" style="display:inline;">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    {{--<button type="submit" class="btn btn-xs btn-danger">--}}
                                        {{--<i class="fa fa-trash"></i>--}}
                                    {{--</button>--}}
                                    <button id="delete" class="btn btn-xs btn-danger" type="submit" onclick="if(!confirm('Voulez-vous Supprimer cet utilisateur?')) return false;">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </form>
                            </td>
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
