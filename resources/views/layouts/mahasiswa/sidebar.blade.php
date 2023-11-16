<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('/img/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3 my-0"style="font-size:9pt">Politeknik Negeri Semarang</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/mahasiswa/pinjam">
            <i class="fa-solid fa-house"></i>
            <span>Home</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features

    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
            aria-expanded="true" aria-controls="collapseForm">
            <i class="fa-solid fa-book-open"></i>
            <span>Barang</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kategori</h6>
                <a class="collapse-item" href="/mahasiswa/pinjam">Lihat Semua Barang</a>

                @if (Auth::user()->isAdmin == 1)
                    <a class="collapse-item" href="/kategori/create">Tambah Barang</a>
                @endif

            </div>
        </div>
    </li>
    @if (Auth::user()->isAdmin == 0)
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeminjam"
                aria-expanded="true" aria-controls="collapsePeminjam">
                <i class="fas fa-fw fa-table"></i>
                <span>Peminjaman</span>
            </a>
            <div id="collapsePeminjam" class="collapse" aria-labelledby="headingPeminjam"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pinjam Barang</h6>
                    <!-- <a class="collapse-item" href="/peminjaman/create">Pinjam Barang</a> -->
                    <a class="collapse-item" href="/mahasiswa/history">Pinjaman Saya</a>
                </div>
            </div>
        </li>
    @endif

</ul>