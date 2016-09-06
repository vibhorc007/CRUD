

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Change Password here!
                        <small>Preview</small>
                    </h1>
                 
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary animated fadeInDown">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Password Update Form</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                 <?php
                        if ($this->session->has_userdata('message')) {?>
                            <div class="alert alert-success" role="alert"> 
                                <a href="#" class="close" data-dismiss="alert" >&times;</a>
                                    <?php echo $this->session->message; ?>

                                </div>
                       <?php }?>
                        
                              <form action = "<?php echo $action; ?>" method="post">
                                    <div class="box-body ">
                                        <div class="form-group <?php echo ((form_error('email') != '') ? 'has-error' : ''); ?>">
                                            <label for="Email">Email</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value ="<?php echo set_value('email');?>">
                                             <?php echo form_error('email');?>
                                        </div>
                                        <div class="form-group <?php echo ((form_error('password') != '') ? 'has-error' : ''); ?>">
                                            <label for="Password">Password</label>
                                            <input type="text" class="form-control" name="password" id="exampleInputPassword1" placeholder="New Password" value="<?php echo set_value('password');?>">
                                            <?php echo form_error('password');?>
                                        </div>
                                        
<!--                                     
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Check me out
                                            </label>
                                        </div>-->
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->


                        </div><!--/.col (left) -->
                        
                        </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
           