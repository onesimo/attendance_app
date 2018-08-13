

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
 <li class="sidebar-search">
    <div class="input-group custom-search-form">
        <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
    </div>
    
</li> 
                    <li>
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Students<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('admin.student.index')}}">All Students</a>
                            </li>

                            <li>
                                <a href="{{route('admin.student.create')}}">Create User Student</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Professors<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('admin.professor.index')}}"">All Professors</a>
                            </li>

                            <li>
                                <a href="{{route('admin.professor.create')}}"">Create Professor</a>
                            </li> 

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Classes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('admin.grade.index')}}">All Classes</a>
                            </li>
                             <li>
                                <a href="{{route('admin.grade.create')}}">Create Class</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

            
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Students Requests<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">All Requests</a>
                            </li> 
                        </ul> 
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">Attendance Report</a>
                            </li> 
                        </ul> 
                        <!-- /.nav-second-level -->
                    </li>




 
                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>