<li class="nav-item">
  <a href="{{ url('/mapel')}}" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p class="text">Mata Pelajaran</p>
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
        <a href="{{ url('/artikel')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
          <p>Artikel</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/datapokok')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-hotel nav-icon"></i>
          <p>Data Pokok</p>
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
          <p>Guru</p>
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
      <li class="nav-item">
        <a href="{{ url('/datapokok')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-hotel nav-icon"></i>
          <p>Data Pokok</p>
        </a>
      </li>
    </ul>
</li>