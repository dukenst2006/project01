<div class="pull-right" style="margin-bottom:10px">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.customers.main') }} <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{!! url('admin/customer') !!}">{{ trans('menus.backend.access.customers.all') }}</a></li>

            @permission('create-users')
            <li><a href="{!! url('admin/customer/create') !!}">{{ trans('menus.backend.access.customers.create') }}</a></li>
            @endauth

            <li class="divider"></li>
            <li><a href="{{ url('admin/customer/deactivated') }}">{{ trans('menus.backend.access.customers.deactivated') }}</a></li>
            <li><a href="{{ url('admin/customer/deactivated') }}">{{ trans('menus.backend.access.customers.deleted') }}</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
