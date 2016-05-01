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
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.backend.general.search_placeholder') }}"/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
        </form>

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{!! route('admin.dashboard') !!}"><span>{{ trans('menus.backend.sidebar.dashboard') }}</span></a>
            </li>

            @permission('view-access-management')
                <li class="{{ Active::pattern('admin/access/*') }}">
                    <a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.backend.access.title') }}</span></a>
                </li>
            @endauth

            @roles(['Administrator', 'Director'])
            <li class="{{ Active::pattern('admin/customer*') }} treeview">
                <a href="#">
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
                <a href="#">
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
                <a href="#">
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

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>