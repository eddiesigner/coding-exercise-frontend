<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">jobs.at</a>
            <ul class="navbar-nav">
                @if (request()->is('/'))
                    <li class="nav-item">
                        <a class="nav-link active" href="/login">
                            Add new job ad
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
