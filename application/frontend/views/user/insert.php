

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Records
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
                        <h3 class="box-title">Insert Form</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php echo form_open('home/addAddress');?>
                    <div class="box-body">
                        <div class="form-group <?php echo ((form_error('name') != '') ? 'has-error' : ''); ?>">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('name'); ?>" placeholder="Enter Name">
                            <?php echo form_error('name'); ?>
                        </div>
                        <div class="form-group <?php echo ((form_error('city') != '') ? 'has-error' : ''); ?>">
                            <label for="City">City</label>
                            <input type="text" class="form-control" name="city" id="exampleInputPassword1" value ="<?php echo set_value('city'); ?>" placeholder="City">
                            <?php echo form_error('city'); ?>
                        </div>
                        <div class="form-group <?php echo ((form_error('mobile') != '') ? 'has-error' : ''); ?>">
                            <label for="Mobile">Mobile No.</label>
                            <input type="number" class="form-control" name="mobile" id="exampleInputPassword1" value ="<?php echo set_value('mobile'); ?>" placeholder="Mobile">
                            <?php echo form_error('mobile'); ?>
                        </div>



                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="editor1" name="description" >
                                  Describe yourself here...
                            </textarea>
                        </div>


                        <div class="form-group <?php echo ((form_error('email') != '') ? 'has-error' : ''); ?>">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputPassword1" value="<?php echo set_value('email'); ?>" placeholder="Email">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group <?php echo ((form_error('gender') != '') ? 'has-error' : ''); ?>">
                            <label for="Gender">Gender</label>
                            <input type="text" class="form-control" name="gender" id="exampleInputPassword1" value="<?php echo set_value('gender'); ?>" placeholder="Gender">
                            <?php echo form_error('gender'); ?>
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
