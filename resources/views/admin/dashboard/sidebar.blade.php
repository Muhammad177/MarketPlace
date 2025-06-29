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
            href="/dashboard/posts">
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
