<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Registration Page</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
        <!--date picker css-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/hover-min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type ="text/javascript">
            $(function () {

                $("#datepicker").datepicker({
                    dateFormat: 'yy-dd-mm'
                }).val();
            });
        </script> 

    </head>
    <body class="hold-transition register-page">
        <div class="register-box animated fadeInLeft">
            <div class="register-logo">
                <a href="#"><b>Admin</b>LTE</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="getRegisterPage" method="post" enctype="multipart/form-data">
                    <div class="form-group has-feedback <?php echo ((form_error('firstname') != '') ? 'has-error' : ''); ?>">
                        <input type="text" class="form-control" value="<?php echo set_value('firstname'); ?>" name="firstname" placeholder="First name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <?php echo form_error('firstname'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('lastname') != '') ? 'has-error' : ''); ?>">
                        <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Last name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <?php echo form_error('lastname'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('email') != '') ? 'has-error' : ''); ?>">
                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('password') != '') ? 'has-error' : ''); ?>">
                        <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?php echo form_error('password'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('confirm') != '') ? 'has-error' : ''); ?>">
                        <input type="password" class="form-control" name="confirm" value="<?php echo set_value('confirm'); ?>" placeholder="Retype password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?php echo form_error('confirm'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('contact_no') != '') ? 'has-error' : ''); ?>">
                        <input type="text" class="form-control" name="contact_no" value="<?php echo set_value('contact_no'); ?>"  placeholder="Contact no.">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        <?php echo form_error('contact_no'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('social_type') != '') ? 'has-error' : ''); ?>">
                        <input type="text" class="form-control" name="social_type" value="<?php echo set_value('social_type'); ?>" placeholder="social_type">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        <?php echo form_error('social_type'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('date') != '') ? 'has-error' : ''); ?>">
                        <input type="text" class="form-control" name="date" id="datepicker" value="<?php echo set_value('date'); ?>" placeholder="date of birth">
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                        <?php echo form_error('date'); ?>
                    </div>
                    <div class="form-group has-feedback <?php echo ((form_error('file_name') != '') ? 'has-error' : ''); ?>">
                        <input type="file" class="form-control" name="file_name" id="datepicker" value="<?php echo set_value('file_name'); ?>">
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                        <?php echo form_error('file_name'); ?> 
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck <?php echo ((form_error('gender') != '') ? 'has-error' : ''); ?>">
                                <input type="radio" name="gender" value="male">Male
                                <input type="radio" name="gender" value="female">Female<br>
                                <?php echo form_error('gender'); ?>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
<!--                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>-->
                </div>

                <a href="<?php echo base_url('user'); ?>" class="text-center">I already have a membership</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

        <!--date picker-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });

            < /body>
                    < /html>