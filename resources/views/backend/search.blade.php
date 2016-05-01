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
                    Pas de resultat
                @elseif (count($customerSearch) >= 1)
                    <p>Resultat for {{ $query }}</p>
                   @foreach($customerSearch as $customersearch)
                 <td>{{ link_to_route('admin.customer.profile', $customersearch->name.' '.$customersearch->lastname, $customersearch->id ) }} </td>
                @endforeach
                @endif

            </div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
