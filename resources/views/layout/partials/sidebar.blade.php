 <!-- Dashboard -->
 <li class="menu-item {{request()->is('/') ? 'active' : ''}}">
    <a href="{{route('home')}}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Analytics">Dashboard</div>
    </a>
  </li>

  <!-- Layouts -->

  <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>
    <li class="menu-item  {{request()->is('admin/buku') ? 'active' : ''}}">
      <a href="{{route('buku')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-list-ul"></i>
        <div data-i18n="Layouts">Daftar buku</div>
      </a>
    </li>
    <li class="menu-item  {{request()->is('admin/pinjam') ? 'active' : ''}}">
      <a href="{{route('pinjam')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
        <div data-i18n="Layouts">Peminjaman</div>
      </a>
    </li>
    <li class="menu-item  {{request()->is('admin/pengembalian') ? 'active' : ''}}">
      <a href="{{route('pengembalian')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-list-check"></i>
        <div data-i18n="Layouts">Pengembalian</div>
      </a>
    </li>
    <li class="menu-item  {{request()->is('admin/history') ? 'active' : ''}}">
      <a href="{{route('history')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-history"></i>
        <div data-i18n="Layouts">History Pengembalian</div>
      </a>
    </li>
    <li class="menu-item  {{request()->is('admin/kategori') ? 'active' : ''}}">
      <a href="{{route('kategori')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-category"></i>
        <div data-i18n="Layouts">Kategori buku</div>
      </a>
    </li>
    <li class="menu-item  {{request()->is('admin/member') ? 'active' : ''}}">
      <a href="{{route('member')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user-plus"></i>
        <div data-i18n="Layouts">Data Member</div>
      </a>
    </li>
    <li class="menu-item  {{request()->is('admin/user') ? 'active' : ''}}">
      <a href="{{route('user')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Layouts">Data User</div>
      </a>
    </li>
