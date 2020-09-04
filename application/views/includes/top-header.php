<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=base_url('dashboard')?>">Talash Enterprises </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="DashboardNav"><a href="<?=base_url('dashboard')?>"><span class="glyphicon glyphicon-dashboard"
                            aria-hidden="true"></span> Dashboard</a></li>
                <li id="OutboxNav"><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        Outbox</a></li>
                <!-- Settings Link -->
                <li id="SettingsNav" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li id="SettingsUsersNav"><a href="<?= base_url('users')?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
                        <li id="SettingsServicesNav"><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> Services</a>
                        </li>
                        <li id="SettingsPrefenceNav"><a href="#"><span class="glyphicon glyphicon-adjust" aria-hidden="true"></span> System
                                Preference</a></li>
                        <li id="SettingsPermissionsNav"><a href="#"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
                                Permissions</a></li>
                    </ul>
                </li>
                <!-- End Settings Link -->

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Profile -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> John Doe
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Privacy</a>
                        </li>
                        <!-- <li><a href="#">Change Theme</a></li> -->
                        <li role="separator" class="divider"></li>
                        <li><a href="<?=base_url('auth/logout')?>"><span class="glyphicon glyphicon-log-out"
                                    aria-hidden="true"></span>
                                Logout</a></li>
                    </ul>
                </li>
                <!-- End Profile -->
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<!-- Header -->
<header id="header">
    <div class="container">
        <div class="row">
            <!-- Page Title -->
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard <small>Manage Your
                        Data</small></h1>
            </div>
            <!-- End Page Title -->

            <!-- Quick Action Link -->
            <div class="col-md-2">
                <div class="dropdown create">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Quick actions
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li style="cursor: pointer;"><a type="button" data-toggle="modal"
                                data-target="#compose_modal">Compose Message</a></li>
                        <li style="cursor: pointer;"><a ype="button" data-toggle="modal"
                                data-target="#add_user_modal">Add User</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Quick Action Link -->
        </div>
    </div>
</header>
<!-- End Header -->

<!-- Breadcrumb Section -->
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </div>
</section>
<!-- End Breadcrumb Section -->