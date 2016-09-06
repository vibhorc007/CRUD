

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Songs
            <small>advanced tables</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box table-responsive">
                    <div class="box-header">
                        <h3 class="box-title">Song Details</h3>
                        <div class="pull-right">
                            <a href="<?php echo $back; ?>" class="btn btn-default" data-toggle="tooltip" data-original-title="Back"><i class="fa fa-reply"></i></a>
<!--                            <a href="<?php echo $edit; ?>" class="btn btn-primary" data-toggle="tooltip" data-original-title="edit"><i class="fa fa-pencil"></i></a>-->
                        </div>
                    </div><!-- /.box-header -->

                    <table class="table table-responsive table-hover table-bordered">

                        <tr>
                            <th style="width: 25%;">Song id</th>
                            <td>
                                <?php echo $image_id; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Uploaded By</th>

                            <td><a href="<?php echo site_url('home/profile') . '/' . $user_id; ?>"><?php echo $firstname; ?></a></td><!--here showing all data of the city's field-->

                            </td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Song</th>
                            <td><audio controls>
                                    <source src="<?php echo str_replace('admin', '', base_url('songs') . '/' . $file_name);?>" type="<?php echo $file_ext;?>" value="">

                                </audio></td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Title</th>
                            <td>
                                <?php echo $file_name; ?>
                            </td>
                        </tr>

                        <tr>
                            <th style="width: 25%;">Ext.</th>
                            <td>
                                <?php echo $file_ext; ?>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
