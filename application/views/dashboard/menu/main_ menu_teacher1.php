<div id="sidebar-left" class="col-lg-2 col-sm-1">
    <?php
    $attributes = array('class' => 'email', 'id' => 'valform');
    echo form_open('teacher/advance_search', $attributes);
    ?>							
    <input type="text" name ="keyword" class="search hidden-sm" placeholder="..." />
<?php echo form_close(); ?>
    <!-- Start Getting Profile Info from Database -->

    <?php
    $email = $this->tank_auth->get_user_email();

    $TotalProgress = 10;

    $Error = "Profile Incomplete! ";

    $ErrorMessage = "";

    $ErrorMessage1 = "";

    $student_profile = $this->db->query("select p.*, u.username from tbl_profile as p INNER JOIN users as u on u.email = p.UserID where p.UserID = '" . $email . "'"); //***

    foreach ($student_profile->result() as $profile) {

        if ($profile->Picture == NULL) {

            $ErrorMessage = $ErrorMessage . "Update Profile Picture <br>";
        } else
            $TotalProgress = $TotalProgress + 10;

        if ($profile->TimeZone == "UP600") {

            $ErrorMessage = $ErrorMessage . "Your should specify your TimeZone <br>";
        } else
            $TotalProgress = $TotalProgress + 10;

        if ($profile->Overview == NULL) {

            $ErrorMessage = $ErrorMessage . "Overview can not be empty.<br>";
        } else
            $TotalProgress = $TotalProgress + 10;

        if ($profile->YearOfExperince == NULL) {  //for Teacher Only
            $ErrorMessage = $ErrorMessage . "Your Experience can not be empty.<br>";
        } else
            $TotalProgress = $TotalProgress + 10;

        if ($profile->RatePerHour == NULL) { //for Teacher Only
            $ErrorMessage = $ErrorMessage . "Your Profile Rate can not be empty. <br>";
        } else
            $TotalProgress = $TotalProgress + 10;

        if ($profile->VideoLinks == NULL) { //for Teacher Only
            $ErrorMessage = $ErrorMessage . "Your should have a YouTube Profile Video. <br>";
        } else
            $TotalProgress = $TotalProgress + 10;

        //Education Info

        $education = $this->db->query("select * from tbl_education where UserID = '" . $email . "'"); //***

        if ($education->num_rows() != 0) {

            $TotalProgress = $TotalProgress + 10;
        } else
            $ErrorMessage = $ErrorMessage . "Please provide Educational Information. <br>";

        // End Education Info
        //Experience Info

        $experience = $this->db->query("select * from tbl_experience where UserID = '" . $email . "'"); //***

        if ($experience->num_rows() != 0) {

            $TotalProgress = $TotalProgress + 10;
        } else
            $ErrorMessage = $ErrorMessage . "Please update your Experience. <br>";

        // End Experience Info 
        //Search Preference Info

        $search_preference = $this->db->query("select * from  tbl_search_preference where UserID = '" . $email . "'"); //***

        foreach ($search_preference->result() as $search_pref) {

            if ($search_pref->Keywords != " " && $search_pref->Keywords != "") {

                $TotalProgress = $TotalProgress + 10;
            } else
                $ErrorMessage1 = $ErrorMessage1 . "Please Set Search Preference Keywords. <br>";

            if ($search_pref->SubCategory != " ") {

                $TotalProgress = $TotalProgress + 10;
            } else
                $ErrorMessage1 = $ErrorMessage1 . "Please Set Search Preference Category. <br>";

            // End Education Info
        }

        if ($ErrorMessage == "" && $ErrorMessage1 == "") {

            $TotalProgress = 100;
        }
    } //end foreach loop		  
    $EnrollAllert = "";
    $req_course_batch = $this->db->query("SELECT b.BatchID, c.CourseID, u.IsCompleted FROM tbl_batch b INNER JOIN tbl_course c ON b.CourseID = c.CourseID INNER JOIN tbl_useronbatch u ON u.BatchID = b.BatchID WHERE u.IsCompleted =  'Req' and b.TeacherID = '" . $email . "'"); //***
    foreach ($req_course_batch->result() as $req) {
        $CourseID = $req->CourseID;
        $BatchID = $req->BatchID;
        $EnrollAllert = "/" . $CourseID . "/" . $BatchID;
    }
    ?> 



    <div> <!-- Profile Completion Alert -->

        <span style="color:white;"><b>Profile </b><i> <?php echo $TotalProgress; ?> % </i><b> Complete </b></span>

<?php if ($TotalProgress <= 50) { ?>

            <div class="taskProgress progressSlim progressRed"><?php echo $TotalProgress; ?>	</div> 

<?php } elseif ($TotalProgress <= 99) { ?>

            <div class="taskProgress progressSlim progressYellow"><?php echo $TotalProgress; ?>	</div> 

<?php } elseif ($TotalProgress == 100) { ?>

            <div class="taskProgress progressSlim progressGreen"><?php
                echo $TotalProgress;
                $Error = "";
                ?></div> 	



        <?php
        } echo "</br>";

        if ($Error <> "") {
            ?>	

            <div class="alert alert-info">				

                <button type="button" class="close" data-dismiss="alert">×</button>

                <a href="<?php echo site_url('teacher/edit_profile'); ?>">

                    <strong><?php echo $Error; ?>  </strong> <?php echo $ErrorMessage; ?> 

                </a>

            </div>

<?php } if ($ErrorMessage1 <> "") { ?>	

            <div class="alert alert-info">				

                <button type="button" class="close" data-dismiss="alert">×</button>

                <a href="<?php echo site_url('teacher/search_preference'); ?>">

                    <strong><?php echo $Error; ?>  </strong> <?php echo $ErrorMessage1; ?> 

                </a>

            </div>

<?php } if ($EnrollAllert <> "") { ?>	

            <div class="alert alert-info">				

                <button type="button" class="close" data-dismiss="alert">×</button>

                <a href="<?php echo site_url('teacher/view_approve_reject' . $EnrollAllert); ?>">

                    <strong>New Enroll:    </strong> Please Approve or Reject Student.

                </a>

            </div>

<?php } ?>	



    </div> <!-- End Profile Completion Alert -->





    <div class="nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="<?php echo site_url('dashboard/teachers_dashboard'); ?>"><i class="fa fa-tasks"></i><span class="hidden-sm"> Dashboard</span></a></li>
            <li><a href="<?php echo site_url('courses/create_course'); ?>"><i class="fa fa-plus"></i> <span class="hidden-sm">Create a Course</span></a></li>	
            <li><a href="<?php echo site_url('teacher/my_courses'); ?>"><i class="fa fa-video-camera"></i><span class="hidden-tablet"> My Courses</span></a></li>

            <li>
                <a class="dropmenu" href="index.html#"><i class="fa fa-bars"></i><span class="hidden-sm"> Reports</span> <span class="label">v</span></a>

                <ul>
                    <li><a class="submenu" href="<?php echo site_url('teacher/transaction_history'); ?>"><i class="fa fa-money"></i><span class="hidden-sm"> Transaction History</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('teacher/course_history'); ?>"><i class="fa fa-bar-chart-o"></i><span class="hidden-sm"> Course History</span></a></li>
                </ul>
            </li>



            <li>
                <a class="dropmenu" href="index.html#"><i class="fa fa-cogs"></i><span class="hidden-sm"> Settings</span> <span class="label">v</span></a>

                <ul>
                    <li><a class="submenu" href="<?php echo site_url('teacher/profile'); ?>"><i class="fa fa-laptop"></i><span class="hidden-sm"> View My Profile</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('teacher/edit_profile'); ?>"><i class="fa fa-pencil-square-o"></i><span class="hidden-sm"> Edit My Profile</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('teacher/search_preference'); ?>"><i class="fa fa-gear"></i><span class="hidden-sm">Set Preference</span></a></li>

                    <li><a class="submenu" href="<?php echo site_url('teacher/edit_password'); ?>"><i class="fa  fa-key"></i><span class="hidden-sm"> Change Password</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('teacher/upload_video'); ?>"><i class="fa fa-video-camera"></i><span class="hidden-sm"> Upload Videos</span></a></li>
                    <li><a class="submenu" href="<?php echo site_url('teacher/deactivate_confirmation'); ?>"><i class="fa  fa-power-off"></i><span class="hidden-sm">Deactivate Account</span></a></li>


                </ul>
            </li>

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


        </ul>
    </div>
</div>