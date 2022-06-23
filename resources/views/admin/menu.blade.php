<li class="nav-item">
  <a href="{{ url('/mapel')}}" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p class="text">Mata Pelajaran</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('/lms')}}" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p class="text">LMS</p>
  </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-layer-group"></i>
      <p>
        Data Informasi
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/profil')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-user nav-icon"></i>
          <p>Profil</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/fasilitas')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
          <p>Fasilitas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/program')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
          <p>Program</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/ppdb')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
          <p>PPDB</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-layer-group"></i>
      <p>
        Data Master
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/guru')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-user nav-icon"></i>
          <p>Data Pendidik</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/kelas')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
          <p>Kelas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/siswa')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-users nav-icon"></i>
          <p>Siswa</p>
        </a>
      </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-cogs"></i>
      <p>
        Pengaturan
        <i class="fas fa-angle-left right"></i>
        {{-- <span class="badge badge-info right">6</span> --}}
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/slider')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-user nav-icon"></i>
          <p>Slider</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/artikel')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
          <p>Artikel</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/tagline')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-users nav-icon"></i>
          <p>Tagline</p>
        </a>
      </li>
    </ul>
</li>