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
            <a class="navbar-brand" href="#">Talash Enterprises</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<!-- Top Header -->
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> Talash Enterprises <small><?= $page_title ?></small></h1>
            </div>
        </div>
    </div>
</header>
<!-- End Top Header -->


<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="message"></div>
                <!-- Login Form -->
                <form id="loginForm" method="POST" action="<?= base_url('auth/login') ?>" class="well" role="form">
                    <!-- Email Address     -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <!-- End Email Address -->

                    <!-- Password -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" data-toggle="password"
                            placeholder="Password">
                        <script type="text/javascript">
                        $("#password").password('toggle');
                        </script>
                    </div>
                    <!-- End Password -->

                    <!-- Remember me -->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            Trust this computer for 60 days
                        </label>
                    </div>
                    <!-- End Remember me -->

                    <!-- Registration Link -->
                    <div class="form-group">
                        <p class="text-muted">New user? <a href="<?= base_url('auth/register') ?>">Register</a></p>
                    </div>
                    <!-- End Registration Link -->

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-default btn-block">Login</button>
                    <!-- End Login Button -->
                </form>
                <!-- End Login Form -->
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url('custom/js/login.js')?>"></script>