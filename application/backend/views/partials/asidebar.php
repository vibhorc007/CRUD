<!--      Left side column. contains the logo and sidebar -->
<aside class="main-sidebar ">
    <!--                 sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
       

            <li class="treeview">
                <a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i><span>Home</span></a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('home/users');?>"><i class="fa fa-circle-o"></i>users</a></li>
                    <li><a href="<?php echo site_url('media/song_list'); ?>"><i class="fa fa-circle-o"></i>Songs</a></li>
                    <li><a href="<?php echo site_url('media/video_list'); ?>"><i class="fa fa-circle-o"></i> Video</a></li>

                </ul>
            </li>


            <!--
            
                        <li class="treeview">
            
                            <a href="<?php echo base_url('home'); ?>/editProfile/<?php echo $this->session->user_id; ?>"><i class="fa fa-edit"></i><span>Edit Profile</span></a>
            
                        </li>-->
            <!--            <li class="treeview">
            
            
                            <a href="<?php echo site_url('home/profile'); ?>"><i class="fa fa-file-picture-o "></i><span>Profile</span></a>
            
            
                        </li>-->
            <!--            <li class="treeview">
            
                            <a href="<?php echo base_url('home'); ?>/password_c/<?php echo $this->session->user_id; ?>"><i class="fa fa-edit"></i><span>Change Password</span></a>
            
                        </li>-->
            <!--            <li class="treeview">
            
                            <a href="<?php echo base_url('home/addAddress'); ?>"><i class="fa fa-plus-square"></i><span>Insert Records</span></a>
            
                        </li>-->

            <!--            <li class="treeview">
            
                            <a href="<?php echo base_url('media/image_gallery'); ?>"><i class="fa fa-file-picture-o"></i><span>Gallery</span></a>
            
                        </li>-->
            <!--            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Media</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('media/getSongs'); ?>"><i class="fa fa-circle-o"></i>Songs</a></li>
                                <li><a href="<?php echo base_url('media/getVideo'); ?>"><i class="fa fa-circle-o"></i> Video</a></li>
                     
                            </ul>
                        </li>-->
            <!--            <li class="treeview">
            
                            <a href="<?php echo base_url('media'); ?>"><i class="fa fa-file-picture-o"></i><span>Media</span></a>
            
                        </li>-->
            <li class="treeview">

                <a href="<?php echo base_url('home/system_info'); ?>"><i class="fa fa-info"></i><span>Information</span></a>

            </li>
            <!--            <li class="treeview">
            
                            <a href="<?php echo base_url('media/show_Records'); ?>"><i class="fa fa-database"></i><span>Records</span></a>
            
                        </li>-->



        </ul>
    </section>

</aside>
