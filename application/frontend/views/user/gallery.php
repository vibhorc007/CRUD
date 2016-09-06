

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gallery
            <small>Preview</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <?php if ($error != '') { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $error; ?>
                    </div>
                <?php } if ($message != '') { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <div class="box box-primary animated fadeInDown">
                    <div class="box-header with-border">
                        <h3 class="box-title">Photo Gallery </h3>
                        <h3 class="box-title " style="margin-left:40%;"><b class="text-green">Select All</b> <input class="simple" type="checkbox" onclick="$('input[name*=\'image\']').prop('checked', this.checked);"></h3><!-- for select all image-->
                        <button  onclick="confirm('Are you sure ?') ? $('#form-genre').submit() : false;" class="btn btn-danger pull-right" title="" data-toggle="tooltip" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>

                    </div><!-- /.box-header -->
                    <div class="box-body"  style="background:#5d3c69">

                        <div class="row">
                            <form action="<?php echo base_url('media/delete_gallery'); ?>" method="post" id ="form-genre">
                                <?php
                                if (isset($result) && $result != '') {
                                    $i = 1;
                                    foreach ($result as $d) {
                                        ?>

                                        <div class="col-lg-3 col-sm-6 col-md-4 col-xs-12 clearfix">
                                            <!-- small box -->
                                            <div class="small">
                                                <label class="" >

                                                    <label for="<?php echo $d['image_id']; ?>">
                                                        <input type="checkbox" name="image[]" value="<?php echo $d['image_id']; ?>" id="<?php echo $d['image_id']; ?>" />
                                                        <img  alt="<?php echo $this->session->username; ?>" src="<?php echo base_url() . 'images/' . $d['file_name']; ?>" style="width:200px; height:100px;">
                                                    </label>

                                                </label> 
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-lg-3 col-sm-6 col-md-4 col-xs-12 clearfix">
                                        <!-- small box -->
                                        <div class="small">
                                            <label class="" >
                                                <img src="<?php echo $this->session->image; ?>" class="user-image" alt="User Image" style="width:200px; height:100px;">

                                            </label> 
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>

                    </div>


                </div><!-- /.box -->


            </div><!--/.col (left) -->

        </div><!-- /.box -->
    </section>
</div><!--/.col (right) -->

