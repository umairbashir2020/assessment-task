<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom:0;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        @if(auth()->user()->hasRole('admin'))
        <h1 class="navbar-brand" style="margin: 0px;">Admin Panel</h1>
        @else
            <h1 class="navbar-brand" style="margin: 0px;">User Panel</h1>
        @endif
    </div>
    <ul class="nav navbar-top-links navbar-right">

        <div style="margin-top:10px">
        <li>
            <a href="{{ route('logout') }}">
                   Logout
            </a>
        </li>
        </div>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                @role('admin')
                <li>
                    <a href="{{ route('feedback') }}"><i class="fa fa-dashboard fa-fw"></i> Feedback</a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}"><i class="fa fa-dashboard fa-fw"></i> Users</a>
                </li>
                <li>
                    <a href="{{ route('comment.index') }}"><i class="fa fa-dashboard fa-fw"></i> Comments</a>
                </li>
                @endrole
                @role('user')
                <li>
                    <a href="{{ route('feedback') }}"><i class="fa fa-dashboard fa-fw"></i> Feedback</a>
                </li>
                @endrole

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
