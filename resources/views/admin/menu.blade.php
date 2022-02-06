<li class="nav-item">
  <a href="{{ url('/kontrak')}}" class="nav-link">
    <i class="nav-icon fas fa-file-signature"></i>
    <p class="text">Kontrak</p>
  </a>
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
        <a href="{{ url('/datapokok')}}" class="nav-link">
          &nbsp;&nbsp;<i class="fas fa-hotel nav-icon"></i>
          <p>Data Pokok</p>
        </a>
      </li>
    </ul>
</li>