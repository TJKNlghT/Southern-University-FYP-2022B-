<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
  <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
    <div class="sidebar-brand">
      <a href="{{ route('adminportal') }}">Sushi Admin Portal</a>
      <div id="close-sidebar">
        <i class="fas fa-times"></i>
      </div>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li class="header-menu">
          <span>General</span>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="fa fa-cutlery"></i>
            <span>Default Menu</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="{{ route('viewAdminCategory') }}">View Categories</a>
                </a>
              </li>
              <li>
                <a href="{{ route('viewAdminProduct') }}">View Items</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="fa fa-apple"></i>
            <span>Custom Menu</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="{{ route('viewAdminCustomCategory') }}">View Categories

                </a>
              </li>
              <li>
                <a href="{{ route('viewAdminCustomProduct') }}">View Items</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="header-menu">
          <span>Orders</span>
        </li>
        <li>
          <a href="{{ route('orderhistory') }}">
            <i class="fa fa-history"></i>
            <span>Order History</span>
          </a>
        </li>
        <li>
          <a href="{{ route('manageorder') }}">
            <i class="fa fa-folder"></i>
            <span>Manage Order</span>
          </a>
        </li>
        <li class="header-menu">
          <span>Reviews</span>
        </li>
        <li>
          <a href="{{ route('viewallfoodreviews') }}">
            <i class="fa fa-apple"></i>
            <span>Manage Food Reviews</span>
          </a>
        </li>
        <li>
          <a href="{{ route('viewallorderreviews') }}">
            <i class="fa fa-paperclip"></i>
            <span>Manage Order Reviews</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- sidebar-content  -->

  {{-- <div class="sidebar-footer">
    <a href="#">
      <i class="fa fa-bell"></i>
      <span class="badge badge-pill badge-warning notification">3</span>
    </a>
    <a href="#">
      <i class="fa fa-envelope"></i>
      <span class="badge badge-pill badge-success notification">7</span>
    </a>
  </div> --}}

</nav>