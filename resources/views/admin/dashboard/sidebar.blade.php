
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
    aria-labelledby="sidebarMenuLabel">
    {{-- <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
        aria-label="Close"></button>
    </div> --}}
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard') ? 'active border-bottom border-3 fw-bold'  : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-house-door"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/posts*') ? 'active border-bottom border-3 fw-bold' : '' }}" href="/dashboard/posts">
            <i class="bi bi-list-task"></i>
            My post
          </a>
        </li>
        @can('admin')
          
       
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/categories*') ? 'active border-bottom border-3 fw-bold' : '' }}" href="/dashboard/categories">
            <i class="bi bi-gear"></i>
           Admin Categories
          </a>
        </li> 
        @endcan
        
        <li class="nav-item">

          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="nav-link d-flex align-items-center gap-2">
              <i class="bi bi-box-arrow-right"></i>Logout</a>
            </button>
          </form>

        </li>
        <li class="nav-item">
          <a href="/post" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i>
            Back To Home
          </a>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</div>