<li class="nav-item">
    <a class="nav-link d-flex align-items-center" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
    </a>
</li>

<li class="nav-item">
    <div class="dropdown">
        <button class="btn text-white dropdown-toggle h-100" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
        </button>
        <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
            <p class="mb-0">{{Auth::user()->email}}</p>
            <hr class="my-2">
            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                @csrf
                <button class="dropdown-item d-flex align-items-center" type="submit">
                    Cerrar session <i class="fas fa-power-off ml-2 text-red"></i>
                </button>
            </form>
        </div>
    </div>
</li>