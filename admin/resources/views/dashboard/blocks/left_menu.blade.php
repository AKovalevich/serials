<nav class="navbar navbar-default" role="navigation">
    <div class="side-menu-container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <div class="icon fa fa-paper-plane"></div>
                <div class="title">Admin panel</div>
            </a>
            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                <i class="fa fa-times icon"></i>
            </button>
        </div>
        <ul class="nav navbar-nav">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span>
                </a>
            </li>
            <li class="panel panel-default dropdown">
                <a data-toggle="collapse" href="#dropdown-form">
                    <span class="icon fa fa-file-text-o"></span><span class="title">Entity</span>
                </a>
                <!-- Dropdown level 1 -->
                <div id="dropdown-form" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('asset.list') }}">TV Shows</a></li>
                            <li><a href="{{ route('episode.list') }}">Episodes</a></li>
                            <li><a href="{{ route('video.list') }}">Videos</a></li>
                            <li><a href="{{ route('image.list') }}">Images</a></li>
                            <li><a href="{{ route('tag.list') }}">Tags</a></li>
                            <li><a href="{{ route('slider.list') }}">Sliders</a></li>
                            <li><a href="{{ route('genre.list') }}">Genres</a></li>
                            <li><a href="{{ route('user.list') }}">Users</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>