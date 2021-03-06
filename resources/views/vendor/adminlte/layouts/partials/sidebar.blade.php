<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li {{ Request::is('home') ? 'class=active' : '' }}><a href="{{ url('/home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            {{--<li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>--}}

            @role('admin')
                <li {{ Request::is('auth/users') ? 'class=active' : '' }}><a href="{{ url('/auth/users') }}"><i class='fa fa-user'></i> <span>用户</span></a></li>
                <li {{ Request::is('auth/roles') ? 'class=active' : '' }}><a href="{{ url('/auth/roles') }}"><i class='fa fa-users'></i> <span>用户组</span></a></li>
                <li {{ Request::is('auth/permissions') ? 'class=active' : '' }}><a href="{{ url('/auth/permissions') }}"><i class='fa fa-wrench'></i> <span>权限</span></a></li>
            @endrole

            {{--            <li {{ Request::is('auth/createPost') ? 'class=active' : '' }}><a href="{{ url('/auth/createPost') }}"><i class='fa fa-link'></i> <span>创建信息</span></a></li>--}}
            <li {{ Request::is('auth/contacts') ? 'class=active' : '' }}><a href="{{ url('/auth/contacts') }}"><i class='fa fa-book'></i> <span>联系人</span></a></li>
            <li {{ Request::is('auth/upload') ? 'class=active' : '' }}><a href="{{ url('/auth/upload') }}"><i class='fa fa-upload'></i> <span>上传文件</span></a></li>


            {{--<li class="treeview">--}}
                {{--<a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
