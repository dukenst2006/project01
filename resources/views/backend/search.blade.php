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
            <h3 class="box-title">{{ trans('labels.backend.access.customers.search') }}</h3>
            <div class="clearfix">
                @if (count($customerSearch) === 0)
                    <p><br />{{ trans('labels.backend.access.customers.noresult').' ' }} <strong>{{ $query }}</strong> </p>
                @elseif (count($customerSearch) >= 1)
                    <p>Resultat for {{ $query }}</p>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('labels.backend.access.customers.table.id') }}</th>
                                <th>{{ trans('labels.backend.access.customers.table.name') }}</th>
                                <th>{{ trans('labels.backend.access.customers.table.number') }}</th>
                                <th>{{ trans('labels.backend.access.customers.table.email') }}</th>
                                <th>{{ trans('labels.backend.access.customers.table.occupation') }}</th>
                                <th>{{ trans('labels.backend.access.customers.table.roles') }}</th>
                                <th>{{ trans('labels.backend.access.customers.table.other_permissions') }}</th>
                                <th class="visible-lg">{{ trans('labels.backend.access.customers.table.created') }}</th>
                                <th class="visible-lg">{{ trans('labels.backend.access.customers.table.last_updated') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customerSearch as $customersearch)
                                <tr>
                                    <td>{!! $customersearch->id !!}</td>
                                    <td>{{ link_to_route('admin.customer.profile', $customersearch->name.' '.$customersearch->lastname, $customersearch->id ) }} </td>
                                    <td>{!! $customersearch->number !!}</td>
                                    <td>{!! link_to("mailto:".$customersearch->email, $customersearch->email) !!}</td>
                                    <td>{!! $customersearch->occupation !!}</td>
                                    <td>{!! $customersearch->phone !!}</td>
                                    <td>{!! $customersearch->address !!}</td>
                                    <td class="visible-lg">{!! $customersearch->created_at !!}</td>
                                    <td class="visible-lg">{!! $customersearch->updated_at !!}</td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
