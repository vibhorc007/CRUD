

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Videos
            <small>advanced tables</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box table-responsive">
                    <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                        <div class="pull-right">
                            <a href="<?php echo $upload; ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        </div>
                        <h4> <?php if ($this->session->message) { ?>
                            <div class="alert alert-success" role="alert"> 
                                <a href="#" class="close" data-dismiss="alert" >&times;</a>
                                    <?php echo $this->session->message; ?>

                                </div>
                            <?php } ?></h4>
                    </div><!-- /.box-header -->
                    <div class="box-body animated zoomIn">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 500px">File Name</th>
                                    <th style="width: 500px">Player</th>
                                    <th >Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                  <?php
                                if (isset($videos) && !empty($videos)) {
                                
                                    foreach ($videos as $video) {
                                        ?>
                                        <tr>

                                            <td><?php echo $video['file_name'] ?></td>
                                            <td><video width="320" height="240" controls>
                                                    <source src="songs/<?php echo $video['file_name']; ?>" type="<?php echo $video['file_ext']; ?>" value="">

                                                </video></td>
                                            <td>

                                                <button type="button" onclick="myfunction(<?php echo $video['image_id']; ?>)" data-toggle="modal" data-target="#myModal4" class="btn btn-danger  hvr-grow-shadow"><span class="glyphicon glyphicon-trash "></span></button> 
                                            </td>

                                        </tr>
                                    <?php } ?>


                                <?php } else { ?>
                                    <tr><td> Address is not available</td> </tr>

                                </tbody>
                            <?php } ?>


                        </table>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<div class='modal fade modal modal-primary' id='myModal4' role='dialog'>

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
        data += "<form action ='media/delete_AV/" + id + "'>";
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
        $('#myModal4').html(data);

    }

</script>
