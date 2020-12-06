<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/administration" class="brand-link">
        <img src="{{asset("admin/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Internship Manage</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("admin/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('http://localhost:8000/administration')}}" class="nav-link  {{request()->is('administration') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{request()->is('administration/internship*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Thực tập 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('candidates.index')}}" class="nav-link {{request()->is('administration/internship/candidates') ? 'active' : ''}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách ứng viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo bài test</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link  {{request()->is('administration/questions*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book "></i>
                        <p>
                            Quản lý câu hỏi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route("questions.index")}}" class="nav-link {{request()->is('administration/questions') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách câu hỏi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("questions.create")}}" class="nav-link {{request()->is('administration/questions/create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon "></i>
                                <p>Tạo câu hỏi mới</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{request()->is('administration/config-testing*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Cấu hình bài Test
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route("config-testing.index")}}" class="nav-link {{request()->is('administration/config-testing') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách cấu hình</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("config-testing.create")}}" class="nav-link {{request()->is('administration/config-testing/create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo cấu hình câu hỏi mới</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
