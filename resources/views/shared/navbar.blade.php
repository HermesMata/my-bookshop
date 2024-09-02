<nav
        class="navbar navbar-expand-md navbar-light bg-light shadow-sm"
        >
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}/#">{{ config("app.name") }}</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                            >Abonnements
                            <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    {{-- Catégories des livres --}}
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Catégories</a
                        >
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId"
                        >
                            <a class="dropdown-item" href="#"
                                >Action 1</a
                            >
                            <a class="dropdown-item" href="#"
                                >Action 2</a
                            >
                        </div>
                    </li>
                    {{-- Mon compte --}}
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Mon compte</a
                        >
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId"
                        >
                            @guest
                                <a class="dropdown-item" href="{{ route('user.register') }}"
                                    >Inscription</a
                                >
                                <a class="dropdown-item" href="{{ route('auth.login') }}"
                                    >Connexion</a
                                >
                            @endguest
                            @auth
                                @if (Auth::user()->role === "admin")
                                    <a class="dropdown-item" href="{{ route('admin.home') }}"
                                    >Espace administrateur</a
                                    >
                                @endif
                                <a class="dropdown-item" href="{{ route('user.manage.index') }}"
                                >Gérer mon compte</a
                                >
                                <form action="{{ route("auth.logout") }}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Déconnexion</button>
                                </form>
                            @endauth
                        </div>
                    </li>
                </ul>
                {{-- Formulaire de recherche --}}
                <form class="d-flex my-2 my-lg-0">
                    <input
                        class="form-control me-sm-2"
                        type="text"
                        placeholder="Trouver un livre..."
                    />
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        GO
                    </button>
                </form>
            </div>
        </div>
    </nav>
