<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CRUD |Forgot Password</title>
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">

<style type="text/css">
    .btn-primary-1 {
        background-color: #257AEE;
        border-color: #367fa9;
        color: #fff;
    }

    .btn-primary-1:hover {
        background-color: #186de1;
        color: #fff;
    }
</style>
<div class="login-box">


    <?php if ($success) { ?>
        <h3 class="text-success  text-center"><?php echo $success; ?></h3>
    <?php } ?>
    <?php if ($error) { ?>
        <h3 class="text-danger text-center"><?php echo $error; ?></h3>
    <?php } ?>            
    <?php if ($display_form) { ?>
        <div class="login-box-body animated fadeInDown">

            <p class="login-box-msg">Reset your password</p>

              <form action="" method="post">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="password" value="<?php echo set_value('password');?>">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password1" placeholder="Confirm New Password" value="<?php echo set_value('password1');?>">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <?php echo form_error('password1'); ?>
                    </div>
                    <div class="row">

                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                        </div><!-- /.col -->
                    </div>
                </form>


        </div><!-- /.login-box-body -->
    <?php } ?>
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