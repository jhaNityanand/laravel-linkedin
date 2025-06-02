<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="fab fa-linkedin linkedin-logo"></i>
            <div class="input-group search-bar-wrapper">
                <span class="input-group-text bg-transparent border-0"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control search-bar" id="mainSearchBar" placeholder="Search">
                <div class="search-preview" id="searchPreview">
                    <div id="searchPreviewResults">
                        </div>
                    <a href="#" class="see-all-results">See all results</a>
                </div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home fa-icon"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mynetwork') ? 'active' : '' }}" href="{{ route('mynetwork') }}">
                        <i class="fas fa-user-friends fa-icon"></i> My Network
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jobs') ? 'active' : '' }}" href="{{ route('jobs') }}">
                        <i class="fas fa-briefcase fa-icon"></i> Jobs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('messaging') ? 'active' : '' }}" href="{{ route('messaging') }}">
                        <i class="fas fa-comment-dots fa-icon"></i> Messaging
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('notifications') ? 'active' : '' }}" href="{{ route('notifications') }}">
                        <i class="fas fa-bell fa-icon"></i> Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                        <i class="fas fa-th fa-icon"></i> Me
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">
                            <i class="fas fa-sign-out-alt fa-icon"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
