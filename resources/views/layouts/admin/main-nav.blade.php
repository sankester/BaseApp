<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    {{--<a href="#" class="media-left">--}}
                        {{--{{ Html::image('theme/admin-template/images/placeholder.jpg', 'user_photo', ['class' => 'img-circle']) }}--}}
                    {{--</a>--}}
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="{{ url('/home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <!-- /main -->

                    <!-- User Manajemen -->
                    <li class="navigation-header"><span>Users Manajement</span> <i class="icon-menu" title="Forms"></i></li>
                    <li>
                        <a href="#"><i class="icon-users"></i> <span>Users</span></a>
                        <ul>
                            <li><a href="{{ route('users.index') }}">List User</a></li>
                            <li><a href="{{ route('users.create') }}">Add User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-users4"></i> <span>Role</span></a>
                        <ul>
                            <li><a href="{{ route('roles.index') }}">List Role</a></li>
                            <li><a href="{{ route('roles.create') }}">Add Role</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('permissions.index') }}"><i class="icon-user-lock"></i> <span>Permission</span></a>
                    </li>
                    <li class="navigation-header"><span>Site Manajement</span> <i class="icon-menu" title="Forms"></i></li>
                    <li>
                        <a href="#"><i class="icon-earth"></i> <span>Portal</span></a>
                        <ul>
                            <li><a href="{{ route('portals.index') }}">List Portal</a></li>
                            <li><a href="{{ route('portals.create') }}">Add Portal</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('navs.index') }}"><i class="icon-list"></i> <span>Menu</span></a>
                    </li>

                    <!-- /forms -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->