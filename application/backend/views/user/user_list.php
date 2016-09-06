

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>control panel</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box table-responsive">
                    <div class="box-header">
                        <h3 class="box-title">Users</h3>
                        <div class="pull-right">
                            <button onclick="confirm('Delete cannot be undone! Are you sure you want to do this?') ? $('#form-genre').submit() : false;" class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>

<!--                            <a href="<?php echo site_url('home/addAddress'); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="Upload"><i class="fa fa-plus"></i></a>-->
                        </div>
                        <h4> <?php if ($this->session->message) { ?>
                            <div class="alert alert-success" role="alert"> 
                                <a href="#" class="close" data-dismiss="alert" >&times;</a>
                                    <?php echo $this->session->message; ?>

                                </div>
                            <?php } ?></h4>
                    </div><!-- /.box-header -->
                    <form id="form-genre" action="<?php echo $delete; ?>" enctype="multipart/form-data" method="post">
                        <div class="box-body animated zoomIn">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="" style="width: 1px;"><input class="simple" type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>                                    

                                        <th>Image</th>
                                        <th>First name</th>
                                        <th>email</th>
                                        <th>Login_type</th>
                                        <th>date_added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php if (!empty($result)) { ?>
                                    <tbody>
                                        <?php foreach ($result as $row) { ?>

                                            <tr>
                                                <td class="text-center">                    
                                                    <input class="simple" type="checkbox" value="<?php echo $row['user_id']; ?>" name="selected[]">
                                                </td>

                                                <?php if (($row['social_type'] == 'web') && ($row['file_name'] !== '')) {  ?>
                                                <td>  <img src="<?php echo str_replace('admin/', '', base_url('images')) . '/' . $row['file_name']; ?>" class="user-image" alt="User Image" height="50px" width="50px"></td><!--here showing all data of the name's field-->
                                                <?php } else if (($row['social_type'] == 'web') && ($row['file_name'] == '')) { ?>
                                                    <td>  <img src="<?php echo str_replace('admin/', '', base_url('images/glyphicons_user.png')); ?>" class="user-image" alt="User Image" height="50px" width="50px"></td><!--here showing all data of the name's field-->
                                                <?php } else { ?>
                                                <td>  <img src="<?php echo $row['file_name']; ?>" class="user-image" alt="User Image" height="50px" width="50px"></td><!--here showing all data of the name's field-->
                                                <?php } ?>
                                                <td><?php echo $row['firstname']; ?></td><!--here showing all data of the city's field-->
                                                <td><?php echo $row['email']; ?></td><!--here showing all data of the mobile's field-->
                                                <td><?php echo $row['social_type']; ?></td><!--here showing all data of the mobile's field-->
                                                <td><?php echo $row['date_modified']; ?></td>

                                                <td>
        <!--                                              <a href="<?php echo $edit . "/" . $row['address_id']; ?>">Edit</a> these are also a link where we want to go-->
                                                     <!--   <a href="<?php echo $delete . "/" . $row['address_id']; ?>">Delete</a>-->
                                                      <!--  <a href="<?php echo $view . "/" . $row['address_id']; ?>">View</a> -->

                                                    <!--or-->  


                                                    <a class =" btn-success" href="<?php echo site_url('home/editProfile') . '/' . $row['user_id']; ?>">  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a><!-- link is used to go to update page-->
                                                    <a  class =" btn-success" href="<?php echo site_url('home/profile') . '/' . $row['user_id']; ?>">  <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button></a><!-- link is used to go to view page-->



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
