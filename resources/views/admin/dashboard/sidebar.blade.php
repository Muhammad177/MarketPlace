<div class="sidebar border border-end col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <!-- Offcanvas Sidebar for Small Screens -->
  <div class="offcanvas-md offcanvas-end bg-body-tertiary " tabindex="-1" id="sidebarMenu"
    style="width: 200px; max-width: 200px;" aria-labelledby="sidebarMenuLabel">

    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto position-fixed">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 
           {{ Request::is('user/*') ? 'active border-bottom border-3 fw-bold' : '' }}"
            href="{{ route('user.show', auth()->user()) }}" style="font-size: 14px;">
            <i class="bi bi-person-circle flex-shrink-0 "></i>
            <span class="text-truncate" style="max-width: 140px;">{{ auth()->user()->name }}</span>
          </a>
        </li>
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active border-bottom border-3 fw-bold' : '' }}"
            href="/dashboard">
            <i class="bi bi-house-door"></i>
            Dashboard
          </a>
        </li>

        <!-- My Post -->
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'active border-bottom border-3 fw-bold' : '' }}"
            href="{{ route('posts.index') }}">
            <i class="bi bi-list-task"></i>
            My Posts
          </a>
        </li>

        <!-- Admin Category (Only for Admin) -->
        @can('admin')
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active border-bottom border-3 fw-bold' : '' }}"
              href="/dashboard/categories">
              <i class="bi bi-gear"></i>
              Admin Categories
            </a>
          </li>
        @endcan

  @can('admin')
  <li class="nav-item">
    <button 
      class="nav-link d-flex align-items-center gap-2 w-100 text-start border-0 bg-transparent {{ Request::is('dashboard/shops*') ? 'active border-bottom border-3 fw-bold' : '' }}"
      data-bs-toggle="collapse" 
      data-bs-target="#dashboard-collapse" 
      aria-expanded="{{ Request::is('dashboard/shops*') ? 'true' : 'false' }}"
    >
      <i class="bi bi-shop"></i>
      Admin Shop
      <i class="bi bi-caret-down-fill ms-auto"></i> 
    </button>

    <div class="collapse {{ Request::is('dashboard/shops*') ? 'show' : '' }}" id="dashboard-collapse">
      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-4">
        <li>
          <a href="/dashboard/shops" class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/shops*') ? 'active border-bottom border-3 fw-bold' : '' }}">
            Shops
          </a>
        </li>
          <a href="/dashboard/shops/monthly" class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/shops/monthly') ? 'active border-bottom border-3 fw-bold' : '' }}">
            Monthly 
          </a>
        </li>
        <li>
          <a href="/dashboard/shops/annually" class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/shops/anually') ? 'active border-bottom border-3 fw-bold' : '' }}">
            Annually
          </a>
        </li>
      </ul>
    </div>
  </li>
@endcan



          @can('admin')
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/user*') ? 'active border-bottom border-3 fw-bold' : '' }}"
              href="/dashboard/users">
          <i class="bi bi-person-fill-gear"></i>
              Admin User
            </a>
          </li>
        @endcan


        <!-- Logout -->
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="nav-link d-flex align-items-center gap-2">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>

        <!-- Back to Home -->
        <li class="nav-item">
          <a href="/post" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i>
            Back To Home
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>
