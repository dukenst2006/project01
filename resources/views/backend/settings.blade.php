@extends ('backend.layouts.master')

@section ('title', trans('settings.title'))

@section('page-header')
    <h1>
        {{ trans('settings.title') }}
        {{--<small>{{ trans('labels.backend.access.customers.edit') }}</small>--}}
    </h1>
@endsection

@section('content')
    {!! Form::model($settings, ['route' => ['admin.settings.update'], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH' ]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.config') }}</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('app_name', trans('settings.app_name'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('app_name', null, ['class' => 'form-control', 'placeholder' => trans('settings.app_name')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('app_description', trans('settings.app_description'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('app_description', null, ['class' => 'form-control', 'placeholder' => trans('settings.app_description')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('app_email', trans('settings.app_email'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::email('app_email', null, ['class' => 'form-control', 'placeholder' => trans('settings.app_email')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('app_phone', trans('settings.app_phone'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('app_phone', null, ['class' => 'form-control', 'placeholder' => trans('settings.app_phone')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('currency', trans('settings.currency'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::select('currency', array('HTG' => 'Gourde Haitien', 'USD' => 'Dollar Americain'), null, ['placeholder' => trans('settings.currency')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('us_rate', trans('settings.us_rate'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::number('us_rate', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('settings.us_rate')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('euro_rate', trans('settings.euro_rate'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::number('euro_rate', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('settings.euro_rate')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('peso_rate', trans('settings.peso_rate'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::number('peso_rate', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('settings.peso_rate')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('canadian_rate', trans('settings.canadian_rate'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::number('canadian_rate', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('settings.canadian_rate')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('tax', trans('settings.tax'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::number('tax', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('settings.tax')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('mini_bal', trans('settings.min_balance'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::number('mini_bal', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('settings.min_balance')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('adress', trans('settings.app_adress'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('adress', null, ['class' => 'form-control', 'placeholder' => trans('settings.app_adress')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('app_contact', trans('settings.app_contact'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('app_contact', null, ['class' => 'form-control', 'placeholder' => trans('settings.app_contact')]) !!}
                </div>
            </div><!--form control-->

            {{--<div class="form-group">--}}
                {{--{!! Form::label('image', trans('validation.attributes.backend.access.customers.image'), ['class' => 'col-lg-2 control-label']) !!}--}}
                {{--<div class="col-lg-10">--}}
                    {{--{!! Form::file('image') !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<img class="profile-user-img img-responsive img-circle" with="200px" height="200px" src=" {{ $settings->image }}">--}}
                {{--</div>--}}
            {{--</div><!--form control-->--}}
            {{--{{ Form::hidden('users_id', auth()->id()) }}--}}
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.dashboard')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.save') }}" />
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