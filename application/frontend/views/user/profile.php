

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Profile
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
                        <?php if (!empty($result)) { ?>
                            <?php foreach ($result as $m) { ?>
                  
                                <a class ="btn primary pull-right" href="home/editProfile/<?php echo $m['user_id']; ?>"> <button type="button" class="btn btn-primary hvr-grow-shadow " style="margin-top:-6px;"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                <!--<a class ="btn btn-primary hvr-grow-shadow glyphicon glyphicon-pencil pull-right" href="<?php echo base_url('home/delete_all'); ?>"></a>-->
                                <button type="button" onclick="myfunction(<?php echo $this->session->user_id;?>)" data-toggle="modal" data-target="#myModal1" style="float:right" class="btn btn-danger  hvr-grow-shadow "><span class="glyphicon glyphicon-trash "></span></button>
                          
                                
                            </div><!-- /.box-header -->
                            <table class="table table-responsive table-hover table-bordered">
                                <tr>
                                    <th>Image</th>
                                    <td class="text-left">
                                        <img src="<?php echo $this->session->image; ?>" class="user-image" alt="User Image" height="200px" width="200px">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">User_id</th>
                                    <td>
                                         <?php echo $m['user_id']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">First Name</th>
                                    <td>
                                         <?php echo $m['firstname']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">Last Name</th>
                                    <td>
                                         <?php echo $m['lastname']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">D.O.B.</th>
                                    <td>
                                         <?php echo $m['dob']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">Gender</th>
                                    <td>
                                         <?php echo $m['gender']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">Email</th>
                                    <td>
                                         <?php echo $m['email']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">Conatct No.</th>
                                    <td>
                                         <?php echo $m['contact_no']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">Password</th>
                                    <td>
                                         <?php echo $m['password']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /.box -->
                    <?php } ?>
                <?php } else { ?>
                    Address is not available
                <?php } ?>
            </div>
        </div><!-- /.col -->

        <!-- /.row -->

    </section><!-- /.content -->
</div>

<div class='modal fade modal modal-primary' id='myModal1' role='dialog'>

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
        data += "<form action ='delete_all/" + id + "'>";
        data += "<h2> You want to delete your profile ? </h2> ";
        data += "<br>";
        data += "<button type='submit' class='btn btn-success btn-lg hvr-ripple-out'>Yes</button>";
        data += "<a href='' class='btn btn-danger btn-lg hvr-ripple-out ' style='margin-left:10px;'>No</a>";
        data += "</div>";
        data += "<div class='modal-footer'>";
        data += "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
        data += "</div>";
        data += " </div>";
        data += "</div>";
        $('#myModal1').html(data);

    }

</script>
