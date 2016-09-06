

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box table-responsive">
                    <div class="box-header">
                        <h3 class="box-title">System Information</h3>
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
                                    <th>loginInfo_id</th>
                                    <th>user_id</th>
                                    <th>ipaddress</th>
                                    <th>browser_name</th>
                                    <th>platform</th>
                                    <th>version</th>
                                    <th>login_time</th>
                                    <th>accept_lang</th>
                                    <th>referrer_link</th>
                                 
                                </tr>
                            </thead>
                            <?php if (!empty($info)) { ?>
                                <tbody>
                                    <?php foreach ($info as $row) { ?>

                                        <tr>
                                            <td><?php echo $row['loginInfo_id']; ?></td><!--here showing all data of the address_id's field-->
                                            <td><?php echo $row['user_id']; ?></td><!--here showing all data of the name's field-->
                                            <td><?php echo $row['ipaddress']; ?></td><!--here showing all data of the city's field-->
                                            <td><?php echo $row['browser_name']; ?></td><!--here showing all data of the mobile's field-->
                                            <td><?php echo $row['platform']; ?></td><!--here showing all data of the mobile's field-->
                                            <td><?php echo $row['version']; ?></td><!--here showing all data of the mobile's field-->
                                            <td><?php echo $row['login_time']; ?></td><!--here showing all data of the mobile's field-->
                                            <td><?php echo $row['accept_lang']; ?></td>
                                            <td><?php echo $row['referrer_link']; ?></td>

                                     

                                        </tr>

                                    <?php } ?>
                                <?php } else { ?>
                                    <tr><td> Address is not available</td> </tr>

                                </tbody>
                            <?php } ?>

                            <tfoot>
                                <tr>
                              <th>loginInfo_id</th>
                                    <th>user_id</th>
                                    <th>ipaddress</th>
                                    <th>browser_name</th>
                                    <th>platform</th>
                                    <th>version</th>
                                    <th>login_time</th>
                                    <th>accept_lang</th>
                                    <th>referrer_link</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
