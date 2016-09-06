

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>control panel</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box table-responsive">
                    <div class="box-header">
                        <h3 class="box-title">Records</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body animated zoomIn">

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo $upload_count; ?>
                                    </h3>
                                    <p>
                                        Total Upload File
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-upload hvr-grow-shadow"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo $image_count; ?>
                                    </h3>
                                    <p>
                                        Total Upload Image
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-image hvr-grow-shadow"></i>
                                </div>
                                <a href="<?php echo $images; ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo $audio_count; ?>
                                    </h3>
                                    <p>
                                        Total Audio File
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-music hvr-grow-shadow"></i>
                                </div>
                                <a href="<?php echo $audio; ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        <?php echo $video_count; ?>
                                    </h3>
                                    <p>
                                        Total Video File
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-video-camera hvr-grow-shadow"></i>
                                </div>
                                <a href="<?php echo $video; ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->



                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box table-responsive">
                    <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                        <div class="pull-right">
                        <button onclick="confirm('Delete cannot be undone! Are you sure you want to do this?') ? $('#form-genre').submit() : false;" class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>

                            <a href="<?php echo base_url('home/addAddress'); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="Upload"><i class="fa fa-plus"></i></a>
                        </div>
                        <h4> <?php if ($this->session->message) { ?>
                                <div class="alert alert-success" role="alert"> 
                                    <a href="#" class="close" data-dismiss="alert" >&times;</a>
                                    <?php echo $this->session->message; ?>

                                </div>
                            <?php } ?></h4>
                    </div><!-- /.box-header -->
                    <form id="form-genre" action="<?php echo $delete;?>" enctype="multipart/form-data" method="post">
                        <div class="box-body animated zoomIn">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="" style="width: 1px;"><input class="simple" type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>                                    

                                        <th>Name</th>
                                        <th>City</th>
                                        <th>email</th>
                                        <th>date_added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php if (!empty($result)) { ?>
                                    <tbody>
                                        <?php foreach ($result as $row) { ?>

                                            <tr>
                                                <td class="text-center">                    
                                                    <input class="simple" type="checkbox" value="<?php echo $row['address_id'];?>" name="selected[]">
                                                </td>
                                                <td><?php echo $row['name']; ?></td><!--here showing all data of the name's field-->
                                                <td><?php echo $row['city']; ?></td><!--here showing all data of the city's field-->
                                                <td><?php echo $row['email']; ?></td><!--here showing all data of the mobile's field-->
                                                <td><?php echo $row['date_modified']; ?></td>

                                                <td>
                                             <!-- <a href="<?php echo $edit . "/" . $row['address_id']; ?>">Edit</a>--> <!--these are also a link where we want to go-->
                                                     <!--   <a href="<?php echo $delete . "/" . $row['address_id']; ?>">Delete</a>-->
                                                      <!--  <a href="<?php echo $view . "/" . $row['address_id']; ?>">View</a> -->

                                                    <!--or-->  


                                                    <a class =" btn-success" href="<?php echo $edit; ?>">  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a><!-- link is used to go to update page-->
                                                    <a  class =" btn-success" href="home/getList/<?php echo $row['address_id']; ?>">  <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button></a><!-- link is used to go to view page-->



                                                </td>

                                            </tr>

                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr><td> Address is not available</td> </tr>

                                    </tbody>
                                <?php } ?>

                                <tfoot>
                                    <tr>

                                        <th>Name</th>
                                        <th>City</th>

                                        <th>Email</th>

                                        <th>Date_added</th>
                                        <th>action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class='modal fade modal modal-primary' id='myModal' role='dialog'>

</div>

<!--delete script-->

<script>

    function myfunction(id) {

        data = "<div class='modal-dialog modal-lg '>";
        data += "<div class='modal-content'>";
        data += "<div class='modal-header'>";
        data += "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
        data += "<h4 class='modal-title'>Confirm!</h4>";
        data += "</div>";
        data += "<div class='modal-body text-center '>";
        data += "<form action ='home/delete1/" + id + "'>";
        data += "<h2> Are you sure! </h2> ";
        data += "<br>";
        data += "<button type='submit' class='btn btn-success btn-lg hvr-ripple-out'>Yes</button>";
        data += "<a href='' class='btn btn-danger btn-lg hvr-ripple-out ' style='margin-left:10px;'>No</a>";
        data += "</div>";
        data += "<div class='modal-footer'>";
        data += "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
        data += "</div>";
        data += " </div>";
        data += "</div>";
        $('#myModal').html(data);

    }

</script>
