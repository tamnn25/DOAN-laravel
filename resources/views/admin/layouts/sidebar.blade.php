
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <hr>
                {{-- @foreach ($admins as $admin) --}}
                  <nav class="sidebar-nav" class="p-t-30">
                      <ul id="sidebarnav" class="p-t-30">
                        
                            {{-- @if(auth()->guard('admin')->user()->role_id == 2) --}}
                                {{-- category --}}
                                
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">category</span></a>
                                  <ul aria-expanded="false" class="collapse  first-level">
                                      <li class="sidebar-item"><a href="{{ route('admin.category.index') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List Category</span></a></li>
                                      <li class="sidebar-item"><a href="{{ route('admin.category.create') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Create Category</span></a></li>
                                  </ul>
                                </li>
                                {{-- end category --}}
                                {{-- product --}}
                                
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-barcode"></i><span class="hide-menu">Product</span></a>
                                  <ul aria-expanded="false" class="collapse  first-level">
                                      <li class="sidebar-item"><a href="{{ route('admin.product.index') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List Products</span></a></li>
                                      <li class="sidebar-item"><a href="{{ route('admin.product.create') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Create Products</span></a></li>
                                  </ul>
                                </li>
                                {{-- end product --}}
                                {{-- mesages --}}
                                
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Messages</span></a>
                                  <ul aria-expanded="false" class="collapse  first-level">
                                      <li class="sidebar-item"><a href="{{ route('admin.message.message') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List Messages</span></a></li>
                                  </ul>
                                </li>
                                {{-- end message --}}
                            {{-- @elseif (auth()->guard('admin')->user()->role_id == 3) --}}
                             {{-- order  --}}
                             
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-inbox"></i><span class="hide-menu">Order</span></a>
                              <ul aria-expanded="false" class="collapse  first-level">
                                  <li class="sidebar-item"><a href="{{ route('admin.order.index') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List Order</span></a></li>
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
                                    <p>Create User</p>
                                  </a>
                                </li>
                            </ul>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-receipt"></i>
                            <span class="hide-menu">Promotion</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                              <a href="{{ route('admin.promotion.list_promotion') }}" class="nav-link {{ Route::currentRouteName() == 'admin.promotion.list_promotion' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
              
                                <p>List Promotion</p>
                              </a>
                                {{-- <li class="sidebar-item">
                                  <a href="{{ route('admin.user.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.user.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create User</p>
                                  </a>
                                </li> --}}
                            </ul>
                      </li>
                      <li class="sidebar-item">
                        <a href="#" class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-receipt"></i>
                            <span class="hide-menu">Messages From Customer</span></a>
                            
                      </ul>
                      <form  action="{{ route('admin.logout') }}"  method="POST" style="margin-top:130px;">
                        @csrf
                        <button class="btn btn-dark" type="submit" onclick="return confirm('Are you sure LOGOUT ?')">Logout</button>
                      </form> 
                  </nav>   
                {{-- @endforeach --}}
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->