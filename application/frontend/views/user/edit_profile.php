<script type ="text/javascript">
    $(function () {

        $("#datepicker").datepicker({
            dateFormat: 'yy-dd-mm'
        }).val();
    });
</script> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            You can change your profile 
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
                        <h3 class="box-title">Edit Profile Form</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo site_url('home/editProfile/' . $result['user_id']); ?>" method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <?php if ($error != '') { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                    <?php echo $error; ?>
                                </div>
                            <?php } if ($message != '') { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    <?php echo $message; ?>
                                </div>
                            <?php } ?>
                            <div class="form-group">

                                <div class=" row">
                                    <div class="recent-work-wrap col-sm-2">
                                        <img alt="" id="image_upload_preview" src="<?php echo $this->session->image; ?>" class="img img-responsive img thumbnail "height="200px" width="232px">

                                        <div class="overlay  col-sm-1">
                                            <div class="recent-work-inner text-center" style="margin-top: 73px; margin-right: 44px;">
                                                <!--                                                <div class="fileUpload btn btn-primary">
                                                                                                    <span class="fa fa-upload"></span>
                                                                                                    <input type ="file" name="file_name" id="inputFile" class="upload ">
                                                                                                </div>-->
                                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#upload_logo"><span class="fa fa-upload"></span></button>
                                                <button type="button" onclick="myfunction(<?php echo $this->session->user_id; ?>)" id="logo_delete" data-toggle="modal" data-target="#myModal2" class="btn btn-danger  hvr-grow-shadow"><i class="fa fa-trash-o"></i></button>
    <!--                                            <a class="btn btn-danger" id="logo_delete"><i class="fa fa-trash-o"></i></a>-->
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group <?php echo ((form_error('firstname') != '') ? 'has-error' : ''); ?>">
                                <label for="First name">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" value="<?php echo $result['firstname']; ?>" placeholder="First Name">
                                <?php echo form_error('firstname'); ?>
                            </div>
                            <div class="form-group <?php echo ((form_error('lastname') != '') ? 'has-error' : ''); ?>">
                                <label for="Last Name">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="exampleInputPassword1" value="<?php echo $result['lastname']; ?>" placeholder="Last Name">
                                <?php echo form_error('lastname'); ?>
                            </div>
                            <div class="form-group <?php echo ((form_error('email') != '') ? 'has-error' : ''); ?>">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputPassword1" value="<?php echo $result['email']; ?>" placeholder="Email">
                                <?php echo form_error('email'); ?>
                            </div>
                      
                            <div class="form-group <?php echo ((form_error('gender') != '') ? 'has-error' : ''); ?>">
                                <label for="Gender">Gender</label>
                                <input type="text" class="form-control" name="gender" id="exampleInputPassword1" value="<?php echo $result['gender']; ?>" placeholder="Gender">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group <?php echo ((form_error('dob') != '') ? 'has-error' : ''); ?>">
                                <label for="DOB">DOB</label>
                                <input type="text" class="form-control demo" name="dob" id="exampleInputPassword1 datepicker" value="<?php echo $result['dob']; ?>" placeholder="date of birth">
                                <?php echo form_error('dob'); ?>
                            </div>

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

<!--image upload modal-->
<!--------------------------------------------------------------------------------------------------------------------------------------------- -->
<div <?php echo (isset($upload_error) && $upload_error != '') ? 'id="upload_logo" class="modal fade in" aria-hidden="true" role="dialog" tabindex="-1" style="display: block;" ' : 'class="modal fade" id="upload_logo" tabindex="-1" role="dialog" aria-hidden="true" ' ?> >
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 130px;">
            <div class="modal-header">
                <button type="button" class="close close_model" id="" data-dismiss="modal"><span aria-hidden="true"><i class="icon ion-close-circled"></i></span>
                </button>
                <h4 class="modal-title text-red text-bold">Upload Image</h4>
            </div>
            <div class="modal-body">
                <?php if (isset($upload_error) && $upload_error != '') { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $upload_error; ?>
                    </div>
                <?php } ?>
                <!-- Custom Tabs -->
                <form action="<?php echo site_url('media/imageUpload'); ?>" method="post" enctype="multipart/form-data">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#image" data-toggle="tab">Select Image</a></li>
                            <li><a href="#upload" data-toggle="tab">Upload Image</a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="image">
                                <?php if (isset($images) && $images != '') { ?>
                                    <div class="box-body no-padding">
                                        <ul class="users-list clearfix">
                                            <?php foreach ($images as $image) { ?>
                                                <li class="img-thumbnail">
 <!--this is for image which we have upload for select image--><label for="<?php echo $image['image_id']; ?>"><input type="checkbox" name="image" value="<?php echo $image['image_id']; ?>" id="<?php echo $image['image_id']; ?>" <?php echo ($image['status'] == 1)?'checked':''?> /> <img  alt="<?php echo $this->session->username; ?>" src="<?php echo base_url() . 'images/' . $image['file_name']; ?>"></label>
                                                    <?php  if($image['status'] == 1){ ?>
                                                    <input type="hidden" name="current_image" value="<?php  echo $image['image_id'];?>"/><!-- this is use for already selected profile picture-->
                                                    <?php } ?>
                                                </li>
                                            <?php } ?>
                                        </ul><!-- /.users-list -->
                                    </div>
                                <?php } ?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane " id="upload">

                                <div class="form-group">

                                    <div class="fileUpload btn btn-primary" style="margin-top:10%;margin-bottom:10%;margin-left:40%">
                                        <div class="text-center">
                                            <span class="text-center fa fa-upload fa-5x"></span>
                                            <input type ="file" name="file_name" id="inputFile" class="upload">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->

                    </div>
                    <button type="submit" class="btn btn-success">Update</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close_model" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------------- -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script type="text/javascript">//multiple select select box
                                                    $().ready(function () {

                                                        $(':checkbox').on('change', function () {
                                                            var th = $(this), name = th.prop('name');
                                                            if (th.is(':checked')) {
                                                                $(':checkbox[name="' + name + '"]').not($(this)).prop('checked', false);
                                                            }
                                                        });
                                                    });
</script>
<script type="text/javascript">//thisis used for show image when we select to upload

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });
</script>
<div class='modal fade modal modal-primary' id='myModal2' role='dialog'>

</div><!--

delete script by jquery and in profile page delete with javascript
-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#logo_delete').click(function () {
            data = "<div class='modal-dialog modal-lg '>";
            data += "<div class='modal-content'>";
            data += "<div class='modal-header'>";
            data += "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
            data += "<h4 class='modal-title'>Confirm!</h4>";
            data += "</div>";
            data += "<div class='modal-body text-center '>";
            data += "<form action = '<?php echo base_url(); ?>media/delete_photo/<?php echo $this->session->user_id; ?>'>";
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
            $('#myModal2').html(data);
        });
    });
</script>
<!--close the modal-->
<script type="text/javascript">
    
    $(document).ready(function(){
        $(".close_model").click(function(){
            $('#upload_logo').hide();
            $('.alert').hide();
        });
    });
</script>

