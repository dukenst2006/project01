@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.customers.management') . ' | ' . trans('labels.backend.access.customers.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.management') }}
        <small>{{ trans('labels.backend.access.customers.edit') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($customer, ['route' => ['admin.customer.update', $customer->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH' ,'files' => true]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.customers.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.customer-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('number', trans('validation.attributes.backend.access.customers.number'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('number', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('validation.attributes.backend.access.customers.number')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('name', trans('validation.attributes.backend.access.customers.name'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.name')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('lastname', trans('validation.attributes.backend.access.customers.lastname'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.lastname')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('cin', trans('labels.backend.access.customers.table.identity'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('cin', null, ['class' => 'form-control', 'placeholder' => trans('labels.backend.access.customers.table.identity')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('sex', trans('labels.backend.access.customers.table.gender'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::select('sex', array('M' => 'Masculin', 'F' => 'Feminin'), null, ['placeholder' => trans('labels.backend.access.customers.table.gender')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('occupation', trans('validation.attributes.backend.access.customers.occupation'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('occupation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.occupation')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('city', trans('validation.attributes.backend.access.customers.city'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.city')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('address', trans('validation.attributes.backend.access.customers.address'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.address')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('phone', trans('validation.attributes.backend.access.customers.phone'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.phone')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('image', trans('validation.attributes.backend.access.customers.image'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::file('image') !!}
                </div>
                <div class="form-group">
                <img class="profile-user-img img-responsive img-circle" with="200px" height="200px" src=" {{ $customer->image }}">
                </div>
            </div><!--form control-->

            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.active') }}</label>
                <div class="col-lg-1">
                    <input type="checkbox" value="1" name="status" checked="checked" />
                </div>
            </div><!--form control-->
            {{ Form::hidden('users_id', auth()->id()) }}
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.update') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
@stop