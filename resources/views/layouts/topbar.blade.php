<div class="layout-width">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box horizontal-logo">
        <a href="index.html" class="logo logo-dark">
          <span class="logo-sm">
            <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22" />
          </span>
          <span class="logo-lg">
            <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17" />
          </span>
        </a>

        <a href="index.html" class="logo logo-light">
          <span class="logo-sm">
            <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22" />
          </span>
          <span class="logo-lg">
            <img
              src="{{asset('assets/images/logo-light.png')}}"
              alt=""
              height="17"
            />
          </span>
        </a>
      </div>

      <button
        type="button"
        class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
        id="topnav-hamburger-icon"
      >
        <span class="hamburger-icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>

      <!-- App Search-->
      <form class="app-search d-none d-md-block">
        <div class="position-relative">
          <input
            type="text"
            class="form-control"
            placeholder="Search..."
            autocomplete="off"
            id="search-options"
            value=""
          />
          <span class="mdi mdi-magnify search-widget-icon"></span>
          <span
            class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
            id="search-close-options"
          ></span>
        </div>
      </form>
    </div>
  </div>
</div>