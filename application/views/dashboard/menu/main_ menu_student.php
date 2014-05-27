<div id="sidebar-left" class="col-lg-2 col-sm-1">

    <?php
    $attributes = array('class' => 'email', 'id' => 'valform');
    echo form_open('student/advance_search', $attributes);
    ?>							
    <input type="text" name ="keyword" class="search hidden-sm" placeholder="..." />
    <?php echo form_close(); ?>  


    <?php
    $email = $this->tank_auth->get_user_email();
    $TotalProgress = 10;
    $Error = "Profile Incomplete! ";
    $ErrorMessage = "";
    $student_profile = $this->db->query("select p.*, u.username from tbl_profile as p INNER JOIN users as u on u.email = p.UserID where p.UserID = '" . $email . "'"); //***
    foreach ($student_profile->result() as $profile) {
        if ($profile->Picture == NULL) {
            $ErrorMessage = $ErrorMessage . "Update Profile Picture <br>";
        } else
            $TotalProgress = $TotalProgress + 30;
        if ($profile->TimeZone == "UP6") {
            $ErrorMessage = $ErrorMessage . "Your should specify your TimeZone <br>";
        } else
            $TotalProgress = $TotalProgress + 30;
        if ($profile->Overview == NULL) {
            $ErrorMessage = $ErrorMessage . "Overview can not be empty.<br>";
        } else
            $TotalProgress = $TotalProgress + 30;
        if ($ErrorMessage == "") {
            $TotalProgress = 100;
        }
    } //end foreach loop
    ?> 

    <!-- Start Getting Profile Info from Database -->
    <div> <!-- Profile Completion Alert -->
        <span style="color:white;"><b>Profile </b><i> <?php echo $TotalProgress; ?> % </i><b> Complete </b></span>
        <?php if ($TotalProgress <= 50) { ?>
            <div class="taskProgress progressSlim progressRed"><?php echo $TotalProgress; ?>	</div> 
        <?php } elseif ($TotalProgress <= 70) { ?>
            <div class="taskProgress progressSlim progressYellow"><?php echo $TotalProgress; ?>	</div> 
        <?php } elseif ($TotalProgress == 100) { ?>
            <div class="taskProgress progressSlim progressGreen"><?php
                echo $TotalProgress;
                $Error = "";
                ?></div> 


        <?php } if ($Error <> "") { ?>	
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <a href="<?php echo site_url('student/edit_profile'); ?>">
                    <strong><?php echo $Error; ?>  </strong> <?php echo $ErrorMessage; ?> 
                </a>
            </div>
            <?php
        }
        $rating = $this->db->query("select * from tbl_rating where CommentsForTeacher is null and RatingPointTeacher is null and StudentID = '" . $email . "'"); //***
        foreach ($rating->result() as $rating_teacher) {
            if ($rating->result()) {
                $Error = 1;
            }
        }
        if ($Error == 1) {
            ?>		
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <a href="<?php echo site_url('student/rate_teacher_view'); ?>"> <strong><?php echo "Pending Task: "; ?>  </strong> <?php echo "Please Rate Your Teacher"; ?> </a>
            </div> <?php
        }
        ?>
    </div> <!-- End Profile Completion Alert -->

    </br>
    <div class="nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="<?php echo site_url('dashboard/students_dashboard'); ?>"><i class="fa fa-tasks"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
            <li><a href="<?php echo site_url('student/my_courses'); ?>"><i class="fa fa-video-camera"></i><span class="hidden-tablet"> My Courses</span></a></li>
            <li>
                <a class="dropmenu" href="#"><i class="fa fa-bars"></i><span class="hidden-tablet"> Reports</span> <span class="label">v</span></a>
                <ul>
                    <li><a class="submenu" href="<?php echo site_url('student/transaction_history'); ?>"><i class="fa fa-money"></i><span class="hidden-tablet"> Transaction History</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('student/course_history'); ?>"><i class="fa fa-bar-chart-o"></i><span class="hidden-tablet"> Course History</span></a></li>
                </ul>	
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="fa fa-cogs"></i><span class="hidden-tablet"> Settings</span> <span class="label">v</span></a>
                <ul>
                    <li><a class="submenu" href="<?php echo site_url('student/profile'); ?>"><i class="fa fa-laptop"></i><span class="hidden-tablet"> View My Profile</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('student/edit_profile'); ?>"><i class="fa fa-pencil-square-o"></i><span class="hidden-tablet"> Edit My Profile</span></a></li>
                    <li><a href="<?php echo site_url('student/edit_password'); ?>"><i class="fa fa-key"></i><span class="hidden-tablet"> Change Password</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('student/deactivate_confirmation'); ?>"><i class="fa fa-power-off"></i><span class="hidden-tablet">Deactivate Account</span></a></li>
                </ul>	
            </li>
        </ul>
    </div>
    <br>
    <!-- Live Chat -->
    <!-- mibew button -->
    <li>
        <a href="/LiveChat/client.php?locale=en" target="_blank" onclick="if (navigator.userAgent.toLowerCase().indexOf('opera') != -1 && window.event.preventDefault)
                    window.event.preventDefault();
                this.newWindow = window.open('/LiveChat/client.php?locale=en&url=' + escape(document.location.href) + '&referrer=' + escape(document.referrer), 'mibew', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');
                this.newWindow.focus();
                this.newWindow.opener = window;
                return false;">
            <img src="<?php echo base_url(); ?>public/img/b.gif" border="0" width="163" height="61" alt=""/>
        </a>
    </li>
</div>