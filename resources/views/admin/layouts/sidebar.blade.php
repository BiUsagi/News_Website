{{--{{ Request::is('admin/orders*') || Request::is('admin/customer*') ? 'active' : '' }} --}}
{{-- Kiểm tra link để thêm class active --}}


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="bi bi-grid"></i>
        <span>Trang chủ</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->



    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('admin/exercise') ? 'active' : '' }}" data-bs-target="#exercise-nav"
        data-bs-toggle="collapse" href="#">
        <i class="bi bi-book-half"></i><span>Quản lý danh mục</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="exercise-nav" class="nav-content collapse {{ Request::is('admin/exercise') ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.danhmuc.ds') }}" class="{{ Request::is('admin/exercise') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Danh sách danh mục</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.danhmuc.add') }}">
            <i class="bi bi-circle"></i><span>Thêm danh mục</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('ad.tintuc.ds*') ? 'active' : '' }}" data-bs-target="#posts-nav"
        data-bs-toggle="collapse" href="#">
        <i class="bi bi-pencil-square"></i><span>Quản lý tin tức</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="posts-nav" class="nav-content collapse {{ Request::is('admin.tintuc*') ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.tintuc.ds') }}" class="{{ Request::is('admin.tintuc.ds') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Danh sách tin</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.tintuc.add') }}" class="{{ Request::is('admin.tintuc.add') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Thêm tin</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('ad.tintuc.ds*') ? 'active' : '' }}" data-bs-target="#posts-nav"
        href="{{ route('admin.user.ds') }}">
        <i class="bi bi-person"></i><span>Quản lý tài khoản</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('ad.binhluan.ds*') ? 'active' : '' }}" data-bs-target="#posts-nav"
        href="{{ route('admin.binhluan.ds') }}">
        <i class="bi bi-chat"></i><span>Quản lý bình luận</span>
      </a>
    </li>




    <li class="nav-item">
      <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
        @csrf
      </form>

      <a class="nav-link collapsed" href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-in-right"></i><span>Đăng xuất</span>
      </a>
    </li><!-- End đăng xuất -->
  </ul>

</aside><!-- End Sidebar-->