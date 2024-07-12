<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/jenis">
                <span>Jenis</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/kampus">
                <span>Kampus</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/kendaraan">
                <span>Kendaraan</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="/admin/area_parkir">
                <span>Area Parkir</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/transaksi">
                <span>Transaksi</span>
            </a>
        </li>

        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="nav-link collapsed" href="#">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
</aside>
