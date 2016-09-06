<!--      Left side column. contains the logo and sidebar -->
<aside class="main-sidebar ">
    <!--                 sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!--                     Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $this->u->getUserImage(); ?>" class="user-image" alt="User Image">
                <!--<img src="<?php echo $this->u->getUserImage();?>" class="img-circle" alt="User Image">-->
            </div>
            <div class="pull-left info">
                <p> <?php echo $this->session->username . "&nbsp" . $this->session->lastname; ?> </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!--                     search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!--                     /.search form 
                             sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i><span>Home</span></a>
            </li>
<!--

            <li class="treeview">

                <a href="<?php echo base_url('home'); ?>/editProfile/<?php echo $this->session->user_id; ?>"><i class="fa fa-edit"></i><span>Edit Profile</span></a>

            </li>-->
            <li class="treeview">


                <a href="<?php echo base_url('home/profile'); ?>"><i class="fa fa-file-picture-o "></i><span>Profile</span></a>


            </li>
            <li class="treeview">

                <a href="<?php echo base_url('home'); ?>/password_c/<?php echo $this->session->user_id; ?>"><i class="fa fa-edit"></i><span>Change Password</span></a>

            </li>
<!--            <li class="treeview">

                <a href="<?php echo base_url('home/addAddress'); ?>"><i class="fa fa-plus-square"></i><span>Insert Records</span></a>

            </li>-->

            <li class="treeview">

                <a href="<?php echo base_url('media/image_gallery'); ?>"><i class="fa fa-file-picture-o"></i><span>Gallery</span></a>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Media</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('media/getSongs');?>"><i class="fa fa-circle-o"></i>Songs</a></li>
                    <li><a href="<?php echo base_url('media/getVideo');?>"><i class="fa fa-circle-o"></i> Video</a></li>
         
                </ul>
            </li>
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
