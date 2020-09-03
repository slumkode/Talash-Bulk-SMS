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
                <!-- Registration Form -->
                <form id="register" method="POST" action="<?=base_url('auth/create') ?>" class="well" autocomplete="off"
                    id="registerForm">
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Enter Username">
                    </div>
                    <!-- End Username -->

                    <!-- Email Address -->
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
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

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="cpassword"
                            data-toggle="password" placeholder="Confirm Password">
                        <script type="text/javascript">
                        $("#cpassword").password('toggle');
                        </script>
                    </div>
                    <!-- End Confirm Password -->

                    <!-- Login Link -->
                    <div class="form-group">
                        <p class="text-muted">Have an account? <a href="<?= base_url('auth/login') ?>">Login</a>
                        </p>
                    </div>
                    <!-- End Login Link -->

                    <!-- Registration Button -->
                    <button type="submit" class="btn btn-default btn-block">Register</button>
                    <!-- End Registration Button -->

                </form>
                <!-- End Registration Form -->

            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?= base_url('custom/js/register.js') ?>"></script>

<script>
function clearForm() {
    $('input[type="text"]').val('');
    $('input[type="email"]').val('');
    $('input[type="password"]').val('');
    $('select').val('');
    $(".fileinput-remove-button").click();
}
</script>