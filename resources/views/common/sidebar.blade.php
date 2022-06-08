        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div>
                    <img src="https://storage.googleapis.com/stateless-my-aibt-global/2018/12/86b73503-vc-logo-landscape-01-full-colour.svg" alt="">
                </div>
                <div class="sidebar-brand-text mx-3"> Admin Panel </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ph-gauge"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Inventory -->
            <div class="sidebar-heading">
                Inventory
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span> Inventory </span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> <i class="fas fa-database"></i> Item Database:</h6>
                        <a class="collapse-item" href="{{ route('item.index') }}"> <i class="ph-squares-four"></i> View Items </a>
                        <a class="collapse-item" href="{{ route('item.create') }}"> <i class="ph-stack-overflow-logo"></i> Register New Items </a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header"> <i class="ph-polygon"></i> Storage & Category :</h6>
                        <a class="collapse-item" href="{{ route('storage.create') }}"> <i class="ph-package-bold"></i> Storage </a>
                        <a class="collapse-item" href="{{ route('category.create') }}"> <i class="ph-tree-structure-bold"> </i> Category </a>
                    </div>
                </div>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                Office & Employee:
            </div>

            <!-- Nav Item - Employee Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="ph-user"></i>
                    <span> Employee </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> <i class="ph-identification-card-bold"></i> Manage Employee :</h6>
                        <a class="collapse-item" href="{{ route('employee.create') }}"> 
                            <i class="ph-user-plus"></i>
                            Create An Employee 
                        </a>
                        <!-- <a class="collapse-item" href="{{ route('employee.index') }}"> 
                            <i class="ph-user-list"></i>
                            View Employee 
                        </a> -->
                        <h6 class="collapse-header"> <i class="ph-star-bold"></i> Manage Role :</h6>
                        <a class="collapse-item" href="{{ route('role.create') }}"> 
                            <i class="ph-user-circle-gear"></i>
                            Role 
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Office Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="ph-buildings"></i>
                    <span> Office </span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> <i class="ph-buildings"></i> Office:</h6>
                        <a class="collapse-item" href="{{ route('office.create') }}"> 
                            <i class="ph-plus-bold"></i>
                            Register New Office 
                        </a>
                        <a class="collapse-item" href="{{ route('office.index') }}">
                            <i class="ph-pencil-line"></i>
                            Manage Office 
                        </a>
                        <h6 class="collapse-header"> <i class="ph-folder-open-bold"></i> Documents:</h6>
                        <a class="collapse-item" href="{{ route('employment.create') }}"> 
                            <i class="ph-plus-bold"></i>
                            Employment
                        </a>
                        <a class="collapse-item" href="{{ route('payroll.create') }}">
                            <i class="ph-pencil-line"></i>
                            Payroll
                        </a> 
                        <h6 class="collapse-header"> <i class="ph-navigation-arrow-bold"></i> Location:</h6>
                        <a class="collapse-item" href="{{ route('location.create') }}"> 
                            <i class="ph-plus-bold"></i>
                            Register New Location 
                        </a>
                        <a class="collapse-item" href="{{ route('location.index') }}"> 
                            <i class="ph-pencil-line"></i>
                            Manage Location 
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tools
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('country.create') }}">
                    <i class="ph-flag-bold"></i>
                    <span> Import New Country </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->