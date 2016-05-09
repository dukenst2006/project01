<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! access()->user()->image !!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! access()->user()->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        {!! Form::open(['route' => 'admin.search', 'class' => 'sidebar-form', 'role' => 'form', 'method' => 'get']) !!}
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.backend.general.search_placeholder') }}"/>
                {{--{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => trans('strings.backend.general.search_placeholder')]) !!}--}}
                  <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
            {!! Form::close() !!}

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i><span>{{ trans('menus.backend.sidebar.dashboard') }}</span></a>
            </li>

            @permission('view-access-management')
                <li class="{{ Active::pattern('admin/access/*') }} treeview">
                    <a href="#"><i class="fa fa-unlock-alt"></i><span>{{ trans('menus.backend.access.title') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu {{ Active::pattern('admin/access/*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                        <li class="{{ Active::pattern('admin/access/users') }}">
                            <a href="{!! url('admin/access/users') !!}">{{ trans('menus.backend.access.users.main') }}</a>
                        </li>
                        <li class="{{ Active::pattern('admin/access/roles') }}">
                            <a href="{!! url('admin/access/roles') !!}">{{ trans('menus.backend.access.roles.main') }}</a>
                        </li>
                        <li class="{{ Active::pattern('admin/access/roles/permissions#all-permissions') }}">
                            <a href="{!! url('admin/access/roles/permissions#all-permissions') !!}">{{ trans('menus.backend.access.permissions.main') }}</a>
                        </li>
                    </ul>
                </li>
            @endauth

            @roles(['Administrator', 'Director'])
            <li class="{{ Active::pattern('admin/customer*') }} treeview">
                <a href="#"><i class="fa fa-users"></i>
                    <span>{{ trans('menus.backend.access.customers.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/customer/*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/customer') }}">
                        <a href="{!! url('admin/customer') !!}">{{ trans('menus.backend.access.customers.all') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/customer/create') }}">
                        <a href="{!! url('admin/customer/create') !!}">{{ trans('menus.backend.access.customers.create') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/customer/deactivated') }}">
                        <a href="{!! url('admin/customer/deactivated') !!}">{{ trans('menus.backend.access.customers.deactivated') }}</a>
                    </li>
                </ul>
            </li>
            @endauth

            @roles(['Administrator', 'Director', 'Cashier'])
            <li class="{{ Active::pattern('admin/transaction*') }} treeview">
                <a href="#"><i class="fa fa-money"></i>
                    <span>{{ trans('menus.backend.access.transactions.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/transaction/*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/transaction/all') }}">
                        <a href="{!! url('admin/transaction/all') !!}">{{ trans('menus.backend.access.transactions.all') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/transaction/deposit') }}">
                        <a href="{!! url('admin/transaction/deposit') !!}">{{ trans('menus.backend.access.transactions.deposit') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/transaction/withdrawl') }}">
                        <a href="{!! url('admin/transaction/withdrawl') !!}">{{ trans('menus.backend.access.transactions.withdrawl') }}</a>
                    </li>
                </ul>
            </li>
            @endauth

            <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#"><i class="fa fa-signal"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/log-viewer') }}">
                        <a href="{!! url('admin/log-viewer') !!}">{{ trans('menus.backend.log-viewer.dashboard') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                        <a href="{!! url('admin/log-viewer/logs') !!}">{{ trans('menus.backend.log-viewer.logs') }}</a>
                    </li>
                </ul>
            </li>
            <!-- Setting link -->
            <li class="{{ Active::pattern('admin/setting') }}">
                <a href="{!! route('admin.settings') !!}"><i class="fa fa-gears"></i><span>{{ trans('menus.backend.sidebar.settings') }}</span></a>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>