<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin/dashboard">{{ trans('admin/nav.main') }}</a>
    </div>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ URL::to('') }}"><i class="fa fa-backward"></i> {{ trans('admin/nav.front') }}</a>
                </li>


                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-bullhorn"></i> {{ trans('admin/nav.groups') }}
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav collapse">

                        <li>
                            <a href="{{url('admin/group')}}">
                                <i class="glyphicon glyphicon-bullhorn"></i> {{ trans('admin/nav.groups') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{url('admin/user')}}">
                        <i class="glyphicon glyphicon-user"></i> {{ trans('admin/nav.users') }}
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('auth/logout') }}"><i class="fa fa-sign-out"></i> {{ trans('admin/nav.logout') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>