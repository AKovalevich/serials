<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-expand-toggle">
            <i class="fa fa-bars icon"></i>
        </button>
        <ol class="breadcrumb navbar-breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
            <i class="fa fa-th icon"></i>
        </button>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
            <i class="fa fa-times icon"></i>
        </button>
        <li class="dropdown profile">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span></a>
            <ul class="dropdown-menu animated fadeInDown">
                <li>
                    <div class="profile-info">
                        <h4 class="username">{{ Auth::user()->name }}</h4>

                        <p>{{ Auth::user()->email }}</p>

                        <div class="btn-group margin-bottom-1x" role="group">
                            <a href="{{ route('admin.logout') }}" type="button" class="btn btn-default">
                                <i class="fa fa-sign-out"></i>Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
