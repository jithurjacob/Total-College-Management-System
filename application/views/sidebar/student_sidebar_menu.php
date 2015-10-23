<?php $admin_url=base_url()."index.php/admin/"; ?>
<body class="page-body page-fade" data-url="<?php echo base_url(); ?>">
<div class="page-container">
<div class="sidebar-menu">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="<?php echo $admin_url; ?>"> <img src="<?php echo base_url(); ?>assets/images/logo@1x.png" width="120" alt="" /> </a>
                    </div>
                    <!-- logo collapse icon -->
                    <div class="sidebar-collapse">
                        <a href="<?php echo $admin_url; ?>#" class="sidebar-collapse-icon">
                            <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition --><i class="entypo-menu"></i> </a>
                    </div>
                    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="<?php echo $admin_url; ?>#" class="with-animation">
                            <!-- add class "with-animation" to support animation --><i class="entypo-menu"></i> </a>
                    </div>
                </header>
                <ul id="main-menu" class="main-menu">
                    <li class="active  active"> 
                    <a href="<?php echo $admin_url; ?>"><i class="entypo-gauge"></i><span class="title">Dashboard</span></a>
                        
                    </li>
                    <li> 
                    <a href="<?php echo $admin_url; ?>"><i class="entypo-feather"></i><span class="title">Timeline</span></a>
                        
                    </li>
                    <li> 
                    <a href="<?php echo $admin_url; ?>" ><i class="entypo-search"></i><span class="title">Search</span></a> </li>
                    <li> 
                    <a href="<?php echo $admin_url; ?>"><i class="entypo-user"></i><span class="title">User Management</span></a>
                        
                    </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-users"></i><span class="title">Student Management</span></a>
                        <ul>
                            <li> <a href="<?php echo $admin_url; ?>"><span class="title">Add Student</span></a> </li>
                            <li> <a href="<?php echo $admin_url; ?>"><span class="title">Promote Student</span></a> </li>

                        </ul>
                    </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-doc-text"></i><span class="title">Teacher Management</span></a>
                        
                    </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-window"></i><span class="title">Parent</span></a>
                        
                    </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-flow-branch"></i><span class="title">Branch Management</span></a>
                        
                    </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-chart-bar"></i><span class="title">Semester Maangement</span></a> </li>

                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-flow-tree"></i><span class="title">Subject Management</span></a></li>

                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-plus-circled"></i><span class="title">Attendance Mangement</span></a> </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-address"></i><span class="title">Placement Mangement</span></a> </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-shareable"></i><span class="title">Exam Maangement</span></a> </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-doc-text-inv"></i><span class="title">Noticeboard</span></a> </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-mail"></i><span class="title">Mailbox</span></a> </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-help"></i><span class="title">Help</span></a> </li>
                    <li> <a href="<?php echo $admin_url; ?>"><i class="entypo-cog"></i><span class="title">Settings</span></a> </li>
                </ul>
            </div>
        </div>



<!--header section-->

<div class="main-content">
    <div class="row">
    <!-- Profile Info and Notifications -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <ul class="user-info pull-left pull-none-xsm">
                        <!-- Profile Info -->
                        <li class="profile-info dropdown">
                            <!-- add class "pull-right" if you want to place this from right -->
                            <a href="<?php echo $admin_url; ?>#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url(); ?>assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" /> John Henderson
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Reverse Caret -->
                                <li class="caret"></li>
                                <!-- Profile sub-links -->
                                <li>
                                    <a href="<?php echo $admin_url; ?>"> <i class="entypo-user"></i> Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $admin_url; ?>"> <i class="entypo-mail"></i> Inbox
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $admin_url; ?>"> <i class="entypo-calendar"></i> Calendar
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $admin_url; ?>"> <i class="entypo-clipboard"></i> Tasks
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                        <!-- Raw Notifications -->
                        <li class="notifications dropdown">
                            <a href="<?php echo $admin_url; ?>#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="entypo-attention"></i> <span class="badge badge-info">6</span> </a>
                            <ul class="dropdown-menu">
                                <!-- TS14338244864458: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates -->
                                <li class="top">
                                    <p class="small"> <a href="<?php echo $admin_url; ?>#" class="pull-right">Mark all Read</a> 
                                    You have <strong>3</strong> new notifications.
                                    </p>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller">
                                        <li class="unread notification-success">
                                            <a href="<?php echo $admin_url; ?>#"> <i class="entypo-user-add pull-right"></i>
                                             <span class="line"> <strong>New user registered</strong> </span>
                                              <span class="line small">30 seconds ago</span> </a>
                                        </li>
                                        <li class="unread notification-secondary">
                                            <a href="<?php echo $admin_url; ?>#"> <i class="entypo-heart pull-right"></i>
                                             <span class="line"> <strong>Someone special liked this</strong> 
                                             </span>
                                              <span class="line small">2 minutes ago</span> </a>
                                        </li>
                                        <li class="notification-primary">
                                            <a href="<?php echo $admin_url; ?>#"> <i class="entypo-user pull-right"></i> 
                                            <span class="line"> <strong>Privacy settings have been changed</strong> 
                                            </span> <span class="line small">3 hours ago</span> </a>
                                        </li>
                                        <li class="notification-danger">
                                            <a href="<?php echo $admin_url; ?>#"> <i class="entypo-cancel-circled pull-right"></i> <span class="line">John cancelled the event</span> <span class="line small">9 hours ago</span> </a>
                                        </li>
                                        <li class="notification-info">
                                            <a href="<?php echo $admin_url; ?>#"> <i class="entypo-info pull-right"></i> <span class="line">The server is status is stable</span> <span class="line small">yesterday at 10:30am</span> </a>
                                        </li>
                                        <li class="notification-warning">
                                            <a href="<?php echo $admin_url; ?>#"> <i class="entypo-rss pull-right"></i> <span class="line">New comments waiting approval</span> <span class="line small">last week</span> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="external"> <a href="<?php echo $admin_url; ?>#">View all notifications</a> </li>
                            </ul>
                        </li>
                        <!-- Message Notifications -->
                        <li class="notifications dropdown">
                            <a href="<?php echo $admin_url; ?>#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="entypo-mail"></i> <span class="badge badge-secondary">10</span> </a>
                            <ul class="dropdown-menu">
                                <!-- TS143382448619073: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates -->
                                <li>
                                    <form class="top-dropdown-search">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search anything..." name="s" /> </div>
                                    </form>
                                    <ul class="dropdown-menu-list scroller">
                                        <li class="active">
                                            <a href="<?php echo $admin_url; ?>#"> <span class="image pull-right"> <img src="<?php echo base_url(); ?>assets/images/thumb-1.png" alt="" class="img-circle" /> </span> <span class="line"> <strong>Luc Chartier</strong>- yesterday</span> <span class="line desc small">This ain’t our first item, it is the best of the rest.</span> </a>
                                        </li>
                                        <li class="active">
                                            <a href="<?php echo $admin_url; ?>#"> <span class="image pull-right"> <img src="<?php echo base_url(); ?>assets/images/thumb-1.png" alt="" class="img-circle" /> </span> <span class="line"> <strong>Salma Nyberg</strong>- 2 days ago</span> <span class="line desc small">Oh he decisively impression attachment friendship so if everything. </span> </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="image pull-right"> <img src="<?php echo base_url(); ?>assets/images/thumb-1.png" alt="" class="img-circle" /> </span> <span class="line">Hayden Cartwright- a week ago</span> <span class="line desc small">Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.</span> </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="image pull-right"> <img src="<?php echo base_url(); ?>assets/images/thumb-1.png" alt="" class="img-circle" /> </span> <span class="line">Sandra Eberhardt- 16 days ago</span> <span class="line desc small">On so attention necessary at by provision otherwise existence direction.</span> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="external"> <a href="<?php echo $admin_url; ?>">All Messages</a> </li>
                            </ul>
                        </li>
                        <!-- Task Notifications -->
                        <li class="notifications dropdown">
                            <a href="<?php echo $admin_url; ?>#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="entypo-list"></i> <span class="badge badge-warning">1</span> </a>
                            <ul class="dropdown-menu">
                                <!-- TS14338244861378: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates -->
                                <li class="top">
                                    <p>You have 6 pending tasks</p>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller">
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="task"> <span class="desc">Procurement</span> <span class="percent">27%</span> </span> <span class="progress"> <span style="width: 27%;" class="progress-bar progress-bar-success"> <span class="sr-only">27% Complete</span> </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="task"> <span class="desc">App Development</span> <span class="percent">83%</span> </span> <span class="progress progress-striped"> <span style="width: 83%;" class="progress-bar progress-bar-danger"> <span class="sr-only">83% Complete</span> </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="task"> <span class="desc">HTML Slicing</span> <span class="percent">91%</span> </span> <span class="progress"> <span style="width: 91%;" class="progress-bar progress-bar-success"> <span class="sr-only">91% Complete</span> </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="task"> <span class="desc">Database Repair</span> <span class="percent">12%</span> </span> <span class="progress progress-striped"> <span style="width: 12%;" class="progress-bar progress-bar-warning"> <span class="sr-only">12% Complete</span> </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="task"> <span class="desc">Backup Create Progress</span> <span class="percent">54%</span> </span> <span class="progress progress-striped"> <span style="width: 54%;" class="progress-bar progress-bar-info"> <span class="sr-only">54% Complete</span> </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $admin_url; ?>#"> <span class="task"> <span class="desc">Upgrade Progress</span> <span class="percent">17%</span> </span> <span class="progress progress-striped"> <span style="width: 17%;" class="progress-bar progress-bar-important"> <span class="sr-only">17% Complete</span> </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="external"> <a href="<?php echo $admin_url; ?>#">See all tasks</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Raw Links -->
                <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                    <ul class="list-inline links-list pull-right">
                        
                       
                        <li> <a href="<?php echo $admin_url; ?>">Lock <i class="entypo-lock right"></i> </a> </li>
                        <li class="sep"></li>
                        <li> <a href="<?php echo $admin_url; ?>">Log Out <i class="entypo-logout right"></i> </a> </li>
                    </ul>
                </div>
            </div>
            <hr />
 
