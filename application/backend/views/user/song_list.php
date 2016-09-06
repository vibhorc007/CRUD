

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Songs
            <small>control panel</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    
        <div class="row">
            <div class="col-xs-12">
                <div class="box table-responsive">
                    <div class="box-header">
                        <h3 class="box-title">Songs</h3>
                        <div class="pull-right">
                        <button onclick="confirm('Delete cannot be undone! Are you sure you want to do this?') ? $('#form-genre').submit() : false;" class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>

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

                                        <th>Title</th>
                                        <th>Uploaded by</th>
                                        <th>File type</th>
                                        <th>File ext</th>
                                        <th>action
                              
                                    </tr>
                                </thead>
                                <?php if (!empty($result)) { ?>
                                    <tbody>
                                        <?php foreach ($result as $row) { ?>

                                            <tr>
                                                <td class="text-center">                    
                                                    <input class="simple" type="checkbox" value="<?php echo $row['image_id'];?>" name="selected[]">
                                                </td>
                                                <td><?php echo $row['file_name']; ?></td><!--here showing all data of the name's field-->
                                                <td><a href="<?php echo site_url('home/profile') . '/' . $row['user_id'];?>"><?php echo $row['firstname'];?></a></td><!--here showing all data of the city's field-->
                                                <td><?php echo $row['file_type']; ?></td><!--here showing all data of the mobile's field-->
                                                <td><?php echo $row['file_ext'];?></td><!--here showing all data of the mobile's field-->
                           

<!--                                                    <a class =" btn-success" href="<?php echo site_url('home/editProfile'). '/' . $row['user_id'];?>">  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a> link is used to go to update page-->
                                                <td>  <a  class =" btn-success" href="<?php echo site_url('media/getSong') . '/' . $row['image_id'];?>">  <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button></a><!-- link is used to go to view page-->



                                                </td>

                                            </tr>

                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr><td> Address is not available</td> </tr>

                                    </tbody>
                                <?php } ?>

                               
                            </table>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
