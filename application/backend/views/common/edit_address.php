

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form Elements
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
                        <h3 class="box-title">Quick Example</h3>
                         
                        <a href="<?php echo site_url('home');?>" class="btn btn-default pull-right" data-toggle="tooltip" data-original-title="Back"><i class="fa fa-reply"></i></a>
                    
                    </div>
                    <!-- form start -->
                  
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                <?php echo form_error('name'); ?>
                            </div>
                            <div class="form-group">
                                <label for="City">City</label>
                                <input type="text" class="form-control" name="city" value="<?php echo $result['city']; ?>" id="exampleInputPassword1" placeholder="City">
                                <?php echo form_error('city'); ?>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>" id="exampleInputPassword1" placeholder="Email">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="editor1" name="description">
                                    <?php echo $result['description']; ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="Gender">Gender</label>
                                <input type="text" class="form-control" name="gender" value="<?php echo $result['gender']; ?>" id="exampleInputPassword1" placeholder="Gender">
                                <?php echo form_error('gender'); ?>
                            </div>
                            <div class="form-group">
                                <label for="Mobile">Mobile No.</label>
                                <input type="number" class="form-control" name="mobile" value="<?php echo $result['mobile']; ?>" id="exampleInputPassword1" placeholder="Mobile">
                                <?php echo form_error('mobile'); ?>
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
