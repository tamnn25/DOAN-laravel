
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <hr>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        {{-- <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-open' : '' }}">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                Dashboard
                              </p>
                            </a>
                        </li> --}}
                        {{-- menu of category module --}}
                          @php
                          $routeCategoryArr = [
                            'admin.category.index',
                            'admin.category.create',
                            'admin.category.edit',
                            'admin.category.show',
                          ];
                        @endphp
                        <li class="sidebar-item {{ in_array(Route::currentRouteName(), $routeCategoryArr) ? 'menu-open' : '' }}">
                          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-receipt"></i>
                            <span class="hide-menu"> category </span>
                          </a>
                        
                            <ul aria-expanded="false" class="collapse  first-level">
                              <a href="{{ route('admin.category.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.category.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Category</p>
                              </a>
                              <li class="sidebar-item">
                                <a href="{{ route('admin.category.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.category.create' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create Category</p>
                                </a>
                              </li>
                          </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i>
                                <span class="hide-menu"> Product </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <a href="{{ route('admin.product.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.product.index' ? 'active' : '' }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>List Product</p>
                                    </a>
                                    <li class="sidebar-item">
                                       <a href="{{ route('admin.product.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.category.create' ? 'active' : '' }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Create Product</p>
                                    </a>
                                    </li>
                                </ul>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                              <i class="mdi mdi-receipt"></i>
                              <span class="hide-menu"> Order </span></a>
                              <ul aria-expanded="false" class="collapse  first-level">
                                  <a href="{{ route('admin.order.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List Order</p>
                                  </a>
                              </ul>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-receipt"></i>
                            <span class="hide-menu">Customer manage</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                              <a href="{{ route('admin.customer.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Customer</p>
                              </a>
                            </ul>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-receipt"></i>
                            <span class="hide-menu"> User manage</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                              <a href="{{ route('admin.user.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
              
                                <p>List User</p>
                              </a>
                                <li class="sidebar-item">
                                  <a href="{{ route('admin.user.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.user.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Admin</p>
                                  </a>
                                </li>
                            </ul>
                    </li>
                    </ul>
                    <form  action="{{ route('admin.logout') }}"  method="POST" style="margin-top:130px;">
                      @csrf
                      <button class="btn btn-dark" type="submit" onclick="return confirm('Are you sure LOGOUT ?')">Logout</button>
                    </form> 
                </nav>   
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->