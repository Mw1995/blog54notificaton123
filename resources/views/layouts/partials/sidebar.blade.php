          <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item ">
                                
                                    <a href="{{url('project')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">projects</span>
                                    </a>                                                           
                        </li>
                        @if(Auth::user()->hasRole('scrum master'))
                        <li class="nav-item ">
                                
                                    <a href="{{url('/admin')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Assign Roles</span>
                                    </a>                                                           
                        </li>
                        @endif

                        @if(Auth::user()->hasRole('scrum master'))
                        <li class="nav-item ">
                                
                                    <a href="{{url('/showRegisterForm')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Add an employee</span>
                                    </a>                                                           
                        </li>
                        @endif
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
         