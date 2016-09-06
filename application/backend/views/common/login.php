<div class="login-box ">
 

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if ($error_warning) { ?>
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alert!</b> <?php echo $error_warning; ?>
            </div>
        <?php } ?>
        <form action="<?php echo $action; ?>" method="post">

            <div class="form-group has-feedback ">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback ">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div><!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat ">Sign In</button>
                </div><!-- /.col -->
                
            </div>
        </form>
           <a href="<?php echo base_url('user/forget');?>">I forgot my password</a><br>
       

    </div><!-- /.login-box-body -->
</div>