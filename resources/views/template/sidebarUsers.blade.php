 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('usersHome') }}" class="brand-link">
      <img src="{{ asset('style/dist/img/honda-logo-motorcycle-brand-png-16.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tes Gambar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info"> 
          <a href="{{ route('usersHome')}}" class="d-block">
            @auth
              {{ auth()->user()->nama }}
            @endauth
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2"> 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Data Non Input</li>
          <li class="nav-item"> 
              <a href="{{route('UsersJenisMobil')}}" class="nav-link">
                <i class="fa-solid fa-car"></i>
                  <p>
                    Jenis
                  </p>
                </a>
          </li>
          <li class="nav-item"> 
            <a href="#" class="nav-link">
              <i class="fa-solid fa-signs-post"></i>
                <p>
                  Letak Setir
                </p>
              </a>
          </li>
          <li class="nav-item"> 
            <a href="/users/ukuranKarakter" class="nav-link">
              <i class="fa-solid fa-rectangle-xmark"></i>
                <p>
                  Ukuran Karakter
                </p>
              </a>
          </li>
          <li class="nav-item"> 
            <a href="/users/mesin" class="nav-link">
              <i class="fa-solid fa-chevron-up"></i>
                <p>
                  Merek
                </p>
              </a>
          </li>
          <li class="nav-item"> 
            <a href="#" class="nav-link">
              <i class="fa-solid fa-rectangle-xmark"></i>
                <p>
                  Plat Nomor
                </p>
              </a>
          </li>
          <li class="nav-item"> 
            <a href="/users/mesin" class="nav-link">
              <i class="fa-solid fa-bolt"></i>
                <p>
                  Mesin
                </p>
              </a>
          </li>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Input Data</li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-car"></i>
                    <p>
                      Unggah Data Mobil
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-car"></i>
                    <p>
                      Unggah Data Mobil Komparasi
                    </p>
                  </a>
            <li class="nav-header">Logout</li>
            <li class="nav-item menu-open"> 
                <a href="{{ route('logout')}}" class="nav-link active">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>
                      Keluar Dari Sistem
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside >
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->