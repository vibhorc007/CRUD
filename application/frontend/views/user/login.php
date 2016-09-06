<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CRUD | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/hover-min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box ">
            <div class="login-logo">
                <b class="animated flash">CRUD</b>
            </div><!-- /.login-logo -->
            <div class="login-box-body animated zoomIn">
                <p class="login-box-msg">Sign in to start your session</p>
                <div style="color:red">
                    <?php
                    if ($message) {
                        echo $message;
                    }
                    if ($attempt) {
                        echo '<br>' . $attempt;
                    }
                    ?>
                </div>
                <form action="user" method="post">
                    <div class="form-group has-feedback <?php echo ((form_error('email') != '') ? 'has-error' : ''); ?>" >
                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email');?>" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                         <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('email') != '') ? 'has-error' : ''); ?>">
                        <input type="password" class="form-control" name="password" value="<?php echo set_value('password');?>" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                         <?php echo form_error('password'); ?>
                    </div>
                    <div class="row">
                       
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="<?php echo site_url('hauth/login/Facebook');?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                </div><!-- /.social-auth-links -->

                <a href="<?php echo base_url('user/forget');?>">I forgot my password</a><br>
                <a href="<?php echo base_url('user/getRegisterPage');?>" class="text-center">Register a new membership</a>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
