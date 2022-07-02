<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">AppStock</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">User</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('register') }}">Adding users</a>
                        <a class="dropdown-item" href="{{ route('user_list') }}">List of users</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Category</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('category_add') }}">Adding categories</a>
                        <a class="dropdown-item" href="{{ route('category_list') }}">List of categories</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Product</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('product_add') }}">Adding products</a>
                        <a class="dropdown-item" href="{{ route('product_list') }}">List of products</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Entry</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('entry_add') }}">Adding entries</a>
                        <a class="dropdown-item" href="{{ route('entry_list') }}">List of entries</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Output</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('output_add') }}">Adding outputs</a>
                        <a class="dropdown-item" href="{{ route('output_list') }}">List of outputs</a>
                    </div>
                </li>
            </ul>
            @auth
                <form method="POST" class="d-flex" action="{{ route('logout') }}">
                    @csrf
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            this.closest('form').submit();">
                                    Log out</a>
                            </div>
                        </li>
                    </ul>
                </form>
            @endauth
        </div>
    </div>
</nav>
