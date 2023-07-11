<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-lg-inline text-gray-600">{{ auth()->user()->name }}</span>
            <img class="img-profile rounded-circle" width="20" src="{{ asset('images/default-avatar.png') }}">
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('client.show-form-password') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Đổi mật khẩu
            </a>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Đăng xuất
            </a>
        </div>
    </li>
</ul>
