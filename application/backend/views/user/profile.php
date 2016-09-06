

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Details
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">


                <!-- About Me Box -->
                <div class="box box-primary animated fadeInDown">
                    <div class="box-header with-border" >
                        <h3 class="box-title">About Me</h3>

                        <div class="pull-right">
                            <a href="<?php echo site_url('home/users'); ?>" class="btn btn-default" data-toggle="tooltip" data-original-title="Back"><i class="fa fa-reply"></i></a>
                            <a href="<?php echo site_url('home/editProfile') . '/' . $user_id; ?>" class="btn btn-primary" data-toggle="tooltip" data-original-title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>


                    </div><!-- /.box-header -->
                    <table class="table table-responsive table-hover table-bordered">
                        <tr>
                            <th>Image</th>

                            <?php if (($social_type == 'web') && ($file_name !== '')) { ?>
                                <td>  <img src="<?php echo str_replace('admin/', '', base_url('images')) . '/' . $file_name; ?>" class="user-image" alt="User Image" height="200px" width="200px"></td><!--here showing all data of the name's field-->
                            <?php } else if (($social_type == 'web') && ($file_name == '')) { ?>
                                <td>  <img src="<?php echo str_replace('admin/', '', base_url('images/glyphicons_user.png')); ?>" class="user-image" alt="User Image" height="200px" width="200px"></td><!--here showing all data of the name's field-->
                            <?php } else { ?>
                                <td>  <img src="<?php echo $file_name; ?>" class="user-image" alt="User Image" height="2000px" width="200px"></td><!--here showing all data of the name's field-->
                            <?php } ?>

                        </tr>
                        <tr>
                            <th style="width: 25%;">User_id</th>
                            <td>
                                <?php echo $user_id; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">First Name</th>
                            <td>
                                <?php echo $firstname; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Last Name</th>
                            <td>
                                <?php echo $lastname; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Email</th>
                            <td>
                                <?php echo $email; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">D.O.B.</th>
                            <td>
                                <?php echo $dob; ?>
                            </td>
                        </tr>
                        <tr> 
                            <th style="width: 25%;">Verification</th>
                            <?php if ($email_verification_status === '1') { ?> 
                                <td><span class="label label-success">Enabled</span></td>
                            <?php } else { ?>
                                <td> <span class="label label-warning">Disabled</span></td>
                            <?php } ?>

                        </tr>
                        <tr>
                            <th style="width: 25%;">Gender</th>
                            <td>
                                <?php echo $gender; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Email</th>
                            <td>
                                <?php echo $email; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Conatct No.</th>
                            <td>
                                <?php echo $contact_no; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Password</th>
                            <td>
                                <?php echo $password; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Logi type</th>
                            <td>
                                <?php echo $social_type; ?>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box -->

            </div>
        </div><!-- /.col -->

        <!-- /.row -->

    </section><!-- /.content -->
</div>
