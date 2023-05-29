

    <div class="container-scroller">
        <div class="row " id="proBanner">
          <div class="col-md-12 p-0 m-0">
            <div class="">
              <div class="d-flex align-items-center justify-content-between">
              </div>
            </div>
          </div>
        </div>

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="/"><img src="admin/svg/pulse.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="/"><img src="admin/svg/heart.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" 
            href="{{url('home')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Home</span>
            </a>
          </li>

         
          <li class="nav-item menu-items">
            <a class="nav-link" 
            href="{{url('add_doctor_view')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Add Doctors</span>
            </a>
          </li>

          
                    <li class="nav-item menu-items">
                      <a class="nav-link" 
                      href="{{url('show_doctors')}}">
                        <span class="menu-icon">
                          <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">All Doctors</span>
                      </a>
                    </li>

          <li class="nav-item menu-items">
            <a class="nav-link" 
            href="{{url('show_appoints')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">See All Appointments</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" 
            href="{{url('show_prescriptions')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">See All Prescriptions</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" 
            href="{{url('show_payrolls')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Payrolls</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" 
            href="{{url('show_users')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">All Users</span>
            </a>
          </li>

          
        </ul>
      </nav>