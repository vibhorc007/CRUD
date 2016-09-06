<div class="content-wrapper">
    <section class="content-header">
        <h1>
            You can change your profile 
            <small>Preview</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Upload File</h3>
                        <div class="pull-right">
                            <a href="<?php echo $back; ?>" class="btn btn-default" data-toggle="tooltip" data-original-title="Back"><i class="fa fa-reply"></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php if ($error != '') { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                        <form class="" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="fileUpload btn btn-primary" style="margin-left:40%">
                                    <div class="text-center">
                                        <span class="text-center fa fa-upload fa-5x"></span>
                                        <input type ="file" name="file_upload" id="inputFile" class="upload1">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" >Upload</button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>