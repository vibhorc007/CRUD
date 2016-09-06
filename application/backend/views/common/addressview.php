

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Information
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                     <div class="box-header with-border">
                        <h3 class="box-title">Address Details</h3>
                        <div class="pull-right">
                            <a href="<?php echo $back;?>" class="btn btn-default" data-toggle="tooltip" data-original-title="Back"><i class="fa fa-reply"></i></a>
                            <a href="<?php echo $edit;?>" class="btn btn-primary" data-toggle="tooltip" data-original-title="edit"><i class="fa fa-pencil"></i></a>
                        </div>
                    </div><!-- /.box-header -->

              

                    <table class="table table-responsive table-hover table-bordered">

                        <tr>
                            <th style="width: 25%;">Address_id</th>
                            <td>
                                <?php echo $address_id; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Name</th>
                            <td>
                                <?php echo $name; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">City</th>
                            <td>
                                <?php echo $city; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Insert by</th>
                            <td>
                                <?php echo $firstname; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Mobile</th>
                            <td>
                                <?php echo $mobile; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Gender</th>
                            <td>
                                <?php echo $gender ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Email</th>
                            <td>
                                <?php echo $email ?>
                            </td>
                        </tr>
                        <th style="width: 25%;">Description</th>
                        <td>
                            <?php echo ($description != '') ? $description : 'No Description'; ?> 
                        </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Date_added</th>
                            <td>
                                <?php echo $operations_time; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">date_modified</th>
                            <td>
                                <?php echo $date_modified; ?>
                            </td>
                        </tr>
                    </table>
              
                </div>
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
