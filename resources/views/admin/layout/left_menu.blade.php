<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
                <a href="{{route('dashboard')}}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    
                  </p>
                </a>
             
              </li>
              <li class="nav-item">
                <a href="{{route('company.list')}}" class="nav-link {{ request()->routeIs('company.list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
            About Us
                    
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('services.list')}}" class="nav-link {{ request()->routeIs('services.list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
          Services
                    
                  </p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="{{route('clients.list')}}" class="nav-link {{ request()->routeIs('clients.list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
         Clients
                    
                  </p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="{{route('testimonials.list')}}" class="nav-link {{ request()->routeIs('testimonials.list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
        Testimonials
                    
                  </p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="{{route('experts.list')}}" class="nav-link {{ request()->routeIs('experts.list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
       Technologies
                    
                  </p>
                </a>
              </li>
         
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li>
         
        </ul>
      </nav>