<div id ="notification" class="noty" data-noty-options='{"text":"<?php echo $this->session->flashdata('msg'); ?>","layout":"top","type":"information"}'>
</div>
<?php if ($this->session->flashdata('msg')) { ?>	
    <script type="text/javascript">
        window.onload = function() {
            $("#notification").click();
        }
    </script>	<?php }
?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/dashboard/js/dscountdown.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>public/dashboard/js/dscountdown.min.js"></script>
<?php
$this->lang->load('tank_auth');
$email = $this->tank_auth->get_user_email();
?>
<?php
//Get TimeZone and DayLightSaving
$email = $this->tank_auth->get_user_email();
$TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
foreach ($TimeZone->result() as $TimeZ) {
    $TimeZone = $TimeZ->TimeZone;
    $DayLightSaving = $TimeZ->DayLightSaving;
}
//End TimeZone 
//checked if student and is active
$SQLComm = "SELECT u.IsCompleted , u.BatchID, u.UserID, u.Rolle, b.NextSessionDate, b.CourseID FROM tbl_useronbatch u INNER JOIN tbl_batch b ON b.BatchID = u.BatchID WHERE u.UserID = '" . $email . "' AND u.Rolle =  'Teacher' AND b.IsActive =  'Yes'  and u.IsCompleted ='No' ";
$ongoing_courses = $this->db->query($SQLComm);
if ($ongoing_courses->num_rows() != 0) {
    ?>
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h2><i class="fa fa-edit"></i>Approval of Demo Request</h2>
                <div class="box-icon">

                    <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Next Session Date Time</th>
                            <th>Student</th>
                            <th>Action</th>                                          
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                        $counter = 1;
                        $c_name = '';
                        $course_id = '';
                        foreach ($ongoing_courses->result() as $course) {
                            $course_id = $course->CourseID;
                            $batch_id = $course->BatchID;
                            ?>
                        <script>
        jQuery(document).ready(function($) {
            var data = "<?php echo date("F d Y  H:i:s", gmt_to_local(strtotime($course->NextSessionDate), $TimeZone, $DayLightSaving)); ?>";
            $('.demo<?php echo $counter; ?>').dsCountDown({
                endDate: new Date(data)
            });
        });
                        </script>
                        <?php
                        $course_name = $this->db->query("SELECT CourseName from tbl_course where CourseID = '" . $course_id . "'");
                        foreach ($course_name->result() as $co_name) {
                            $c_name = $co_name->CourseName;
                        }
                        if ($c_name == "Demo Session") { //check if DEMO SESSION
                            ?>
                            <!-- Section for DEMO SESSION -->
                            <tr>
                                <td><div id="Timer-Starts"class="contacts"> <!-- Course Name -->
                                        <a href="<?php echo site_url('teacher/view_course/' . $course_id . '/' . $batch_id); ?>"> <?php echo $c_name; ?> </a>
                                </td> 
                                <td><div id="Timer-Starts"class="contacts"> <!-- Next Session Start Date -->
                                        <div class="controls">
                                            <?php
                                            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'update_nextsessiontime');
                                            echo form_open('teacher/change_session_time', $attributes);
                                            ?>
                                            <input type="hidden" name = "BatchID" value="<?php echo $batch_id; ?>"/>
                                            <input type="hidden" name = "course_name" value="<?php echo $c_name; ?>"/>
                                            <div>
                                                <script type="text/javascript">
                                                    $(function() {
                                                        $('#datetimepicker<?php echo $counter; ?>').datetimepicker({
                                                            language: 'pt-BR'
                                                        });
                                                    });
                                                </script>
                                                <div id="datetimepicker<?php echo $counter; ?>" class="input-append date">
                                                    <input data-format="MM/dd/yyyy hh:mm:ss" type="text" name="NextSessionTime" id="start_date" value="<?php
                                                    if (strtotime($course->NextSessionDate) > strtotime('12/31/2010'))
                                                        echo date('m/d/Y H:i:s', gmt_to_local(strtotime($course->NextSessionDate), $TimeZone, $DayLightSaving));
                                                    ?>" >
                                                    </input>
                                                    <span class="add-on">
                                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                        </i>
                                                    </span>
                                                </div>
                                            </div>
                                            <button type="submit" style="margin-bottom:9px;" class="btn btn-success" data-last="Finish" >Update</button>
                                            <?php echo form_close(); ?>
                                        </div>
                                </td> 
                                <td> <!-- Print All Student Name -->
                                    <?php
                                    $StudentEmails = '';
                                    $StudentNames = '';
                                    $STR_Comma = '';
                                    $SQLCommName = $this->db->query("SELECT distinct b.IsCompleted, u.username, u.email FROM users u INNER JOIN tbl_useronbatch b ON b.UserID= u.email Where b.BatchID = '" . $course->CourseID . "' and b.Rolle='Student' and b.IsCompleted ='No' ");
                                    foreach ($SQLCommName->result() as $st_name) {
                                        ?><a href="<?php echo site_url('view_profile/student_profilebyemail/' . base64_encode($st_name->email)); ?>"> <?php
                                            echo $st_name->username . "<br></a>";
                                            if ($StudentEmails == '')
                                                $STR_Comma = '';
                                            else
                                                $STR_Comma = ';';
                                            $StudentEmails = $StudentEmails . $STR_Comma . $st_name->email;
                                            $StudentNames = $StudentNames . $STR_Comma . $st_name->username;
                                        }
                                        ?>
                                </td>
                                <td> <!-- Join Button  -->
                                    <a href="<?php echo site_url('teacher/start_session/' . $c_name . '/' . $batch_id . '/' . $course_id); ?>" class="btn btn-prev">Start Session Now</a>
                                    <br>
                                    <a href="<?php echo site_url('teacher/end_demo/' . $batch_id . '/' . $course_id); ?>" class="btn btn-danger">End Demo Session</a>
                                    <br>
                                    <!-- Start Sending Message -->
                                    <?php
                                    $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'compose_reply');
                                    echo form_open('messaging/sms', $attributes);
                                    ?>
                                    <input type="hidden" name="recipient" value="<?php echo base64_encode($StudentEmails); ?>" />
                                    <input type="hidden" name="recipientname" value="<?php echo base64_encode($StudentNames); ?> "/>
                                    <button type="submit" class="btn btn-info">Message All Students</button>
                                    <?php echo form_close(); ?>
                                </td>
                            <div class="clearfix"></div>
                    </div>
                    </tr>
                <?php } //End IF ?>	
            <?php } //End For Loop  ?>						
            </tbody>
            </table>

        </div>
    </div>
    </div><!--/col-->
<?php } //End IF Demo request exists   ?>	
<!-- End Request Demo Approval -->
<!-- Course Description Table Starts -->
<div id= "Ongoing-Course" class="page-header">
    <div class="box span12">
        <div class="box-header">
            <h2><i class="icon-align-justify"></i><span class="break"></span>Ongoing Courses</h2>
            <div class="box-icon">
                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Next Session Date Time</th>
                        <th>Session Counter</th>
                        <th>Action</th>
                        <th>Students </th>
                        <th>View Edit End</th>
                    </tr>
                </thead>   
                <?php
                $this->lang->load('tank_auth');
                $email = $this->tank_auth->get_user_email();
                //checked if student and is active
                $SQLComm = "SELECT distinct u.BatchID, u.UserID, u.Rolle, b.NextSessionDate, b.CourseID FROM tbl_useronbatch u INNER JOIN tbl_batch b ON b.BatchID = u.BatchID WHERE u.UserID = '" . $email . "' AND u.Rolle =  'Teacher' AND b.IsActive =  'Yes'";
                $ongoing_courses = $this->db->query($SQLComm);
                //$counter = 1;
                $c_name = '';
                $course_id = '';
                foreach ($ongoing_courses->result() as $course) {
                    $counter = $counter + 1;
                    $course_id = $course->CourseID;
                    $batch_id = $course->BatchID;
                    ?>
                    <script>
                        jQuery(document).ready(function($) {
                            var data = "<?php echo date("F d Y  H:i:s", gmt_to_local(strtotime($course->NextSessionDate), $TimeZone, $DayLightSaving)); ?>";
                            $('.demo<?php echo $counter; ?>').dsCountDown({
                                endDate: new Date(data)
                            });
                        });
                    </script>
                    <?php
                    $course_name = $this->db->query("SELECT CourseName from tbl_course where CourseID = '" . $course_id . "'");
                    foreach ($course_name->result() as $co_name) {
                        $c_name = $co_name->CourseName;
                    }
                    if ($c_name != "Demo Session") { //check if DEMO SESSION if (){ //check if Next Session Date Is Not Determined
                        ?>
                        <!-- Section for DEMO SESSION -->
                        <tr>
                            <td><div id="Timer-Starts"class="contacts"> <!-- Course Name -->
                                    <a href="<?php echo site_url('teacher/view_course/' . $course_id . '/' . $batch_id); ?>"> <?php echo $c_name; ?> </a>
                            </td> 
                            <td><div id="Timer-Starts1"class="contacts"> <!-- Next Session Start Date -->
                                    <?php
                                    $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'update_nextsessiontime');
                                    echo form_open('teacher/change_session_time', $attributes);
                                    ?>
                                    <div>
                                        <input type="hidden" name = "BatchID" value="<?php echo $batch_id; ?>"/>
                                    </div>		
                                    <script type="text/javascript">
                                        $(function() {
                                            $('#datetimepicker<?php echo $counter; ?>').datetimepicker({
                                                language: 'pt-BR'
                                            });
                                        });
                                    </script>
                                    <div id="datetimepicker<?php echo $counter; ?>" class="input-append date">
                                        <input data-format="MM/dd/yyyy hh:mm:ss" type="text" name="NextSessionTime" id="start_date" value="<?php if (strtotime($course->NextSessionDate) > strtotime('12/31/2010')) echo date('m/d/Y H:i:s', gmt_to_local(strtotime($course->NextSessionDate), $TimeZone, $DayLightSaving)); ?>" >
                                        </input>
                                        <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                            </i>
                                        </span>
                                    </div>
                                    </br>
                                    <button type="submit" style="margin-bottom:9px;" class="btn btn-success" data-last="Finish" onclick="confirm('Are you sure want to change session time!!');">Update</button>
                                    <?php echo form_close(); ?>
                            </td> 
                            <td> <!-- Counter -->
                                <div class="demo<?php echo $counter; ?>"></div>
                            </td>
                            <td> <!-- Join Button -->
                                <a href="<?php echo site_url('teacher/start_session/' . $c_name . '/' . $batch_id . '/' . $course_id); ?>" class="btn btn-prev">Start Session Now</a>
                                <br>
                                <?php
                                $StudentEmails = '';
                                $StudentNames = '';
                                $STR_Comma = '';
                                $SQLCommName = $this->db->query("SELECT distinct b.IsCompleted, u.username, u.email FROM users u INNER JOIN tbl_useronbatch b ON b.UserID= u.email Where b.BatchID = '" . $course_id . "' and b.Rolle='Student' and b.IsCompleted ='No' ");
                                foreach ($SQLCommName->result() as $st_name) {
                                    if ($StudentEmails == '')
                                        $STR_Comma = '';
                                    else
                                        $STR_Comma = ';';
                                    $StudentEmails = $StudentEmails . $STR_Comma . $st_name->email;
                                    $StudentNames = $StudentNames . $STR_Comma . $st_name->username;
                                }
                                echo form_open('messaging/sms');
                                ?>
                                <input type="hidden" name="recipient" value="<?php echo base64_encode($StudentEmails); ?>" />
                                <input type="hidden" name="recipientname" value="<?php echo base64_encode($StudentNames); ?> "/>
                                <button type="submit" class="btn btn-success">Message Students</button>
                                <?php echo form_close(); ?>
                            </td>
                            <td>
                                <?php
                                $SQLCommName = $this->db->query("SELECT distinct u.username, u.email FROM users u INNER JOIN tbl_useronbatch b ON b.UserID= u.email Where b.BatchID = '" . $course->CourseID . "' and b.Rolle='Student'");
                                foreach ($SQLCommName->result() as $st_name) {
                                    ?><a href="<?php echo site_url('view_profile/student_profilebyemail/' . base64_encode($st_name->email)); ?>"> <?php
                                        echo $st_name->username . "<br></a>";
                                    }
                                    ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-success"href="<?php echo site_url('teacher/view_course/' . $course_id . '/' . $batch_id); ?>">
                                    <i class="icon-zoom-in "></i>  
                                </a>
                                <a class="btn btn-info" href="<?php echo site_url('teacher/edit_course/' . $course_id . '/' . $batch_id); ?>">
                                    <i class="icon-edit "></i>  
                                </a>
                                <a class="btn btn-warning" href="<?php echo site_url('teacher/finish_course/' . $course_id . '/' . $batch_id); ?>" onclick="return confirm('Are you sure want to end the course???');">
                                    <i class="icon-signout"></i> 
                                </a>
                            </td>
                        <div class="clearfix"></div>
                </div>
                </tr>
            <?php } //End IF ?>	
        <?php } //End For Loop  ?>						
        </tbody>
        </table>  
    </div>
</div><!--/span-->
</div>  
<!-- End Course Description Table -->
<!-- ALL Course Not Enrolled Table Starts -->
<div id= "Ongoing-Course" class="page-header">
    <div class="box span12">
        <div class="box-header">
            <h2><i class="icon-align-justify"></i><span class="break"></span>All Courses Published</h2>
            <div class="box-icon">
                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>View Edit Unpublish</th>
                    </tr>
                </thead>   
                <?php
                $this->lang->load('tank_auth');
                $email = $this->tank_auth->get_user_email();
                //checked if student and is active
                $SQLComm = "SELECT distinct b.BatchID, c.* FROM tbl_batch b INNER JOIN tbl_course c ON b.CourseID = c.CourseID WHERE b.TeacherID = '" . $email . "' AND b.IsActive =  'Yes'";
                $ongoing_courses = $this->db->query($SQLComm);
                //$counter = 1;
                $c_name = '';
                $course_id = '';
                foreach ($ongoing_courses->result() as $course) {
                    $counter = $counter + 1;
                    $course_id = $course->CourseID;
                    $batch_id = $course->BatchID;
                    ?>
                    <?php
                    $course_name = $this->db->query("SELECT CourseName from tbl_course where CourseID = '" . $course_id . "'");
                    foreach ($course_name->result() as $co_name) {
                        $c_name = $co_name->CourseName;
                    }
                    if ($c_name != "Demo Session") { //check if DEMO SESSION
                        ?>
                        <tr>
                            <td><div id="Timer-Starts"class="contacts"> <!-- Course Name -->
                                    <a href="<?php echo site_url('teacher/view_course/' . $course_id . '/' . $batch_id); ?>"> <?php echo $c_name; ?> </a>
                            </td> 
                            <td class="center">
                                <a class="btn btn-success"href="<?php echo site_url('teacher/view_course/' . $course_id . '/' . $batch_id); ?>">
                                    <i class="icon-zoom-in "></i>  
                                </a>
                                <a class="btn btn-info" href="<?php echo site_url('teacher/edit_course/' . $course_id . '/' . $batch_id); ?>">
                                    <i class="icon-edit "></i>  
                                </a>
                                <a class="btn btn-danger" href="<?php echo site_url('teacher/un_publish/' . $course_id . '/' . $batch_id); ?>" onclick="return confirm('Are you sure want to un-publish the course???');">
                                    <i class="icon-trash "></i> 
                                </a>
                            </td>
                        <div class="clearfix"></div>
                </div>
                </tr>
            <?php } //End IF ?>	
        <?php } //End For Loop  ?>						
        </tbody>
        </table>  
    </div>
</div><!--/span-->
</div>  
<!-- End ALL Course Not Enrolled -->
<!-- Work History and Feedback -->
<div id= "Work-History-and-Feedback" class="page-header">
    <div id="Work-History-and-Feedback">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="icon-align-justify"></i><span class="break"></span>Work History and Feedback</h2>
                <div class="box-icon">
                    <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Comments</th>
                            <th>Rating</th>                                          
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                        $student_coursehistory = $this->db->query("select * from tbl_rating where TeacherID = '" . $email . "'");
                        foreach ($student_coursehistory->result() as $history) { //Course History Table Start Loop 
                            ?> 
                            <tr>
                                <td class="center"><?php echo $history->CourseName; ?></td>
                                <td class="center"><?php echo date('m/d/Y', gmt_to_local(strtotime($history->StartDate), $TimeZone, $DayLightSaving)); ?></td>
                                <td class="center"><?php echo date('m/d/Y', gmt_to_local(strtotime($history->EndDate), $TimeZone, $DayLightSaving)); ?></td>
                                <td class="center"><?php
                                    if ($history->CommentsForTeacher)
                                        echo $history->CommentsForTeacher;
                                    else
                                        echo "Student not yet rated ... ";
                                    ?> </td>    
                                <td class="center">
                                    <?php
                                    $urtng = $history->RatingPointStudent;
                                    if ($urtng <= 0): echo "<i class='star star-0'></i>";
                                        ?>
                                    <?php elseif ($urtng <= .5): echo "<i class='star star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 1): echo "<i class='star star-1'></i>"; ?>
                                    <?php elseif ($urtng <= 1.5): echo "<i class='star star-1 star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 2): echo "<i class='star star-2'></i>"; ?>
                                    <?php elseif ($urtng <= 2.5): echo "<i class='star star-2 '></i>"; ?>
                                    <?php elseif ($urtng <= 3): echo "<i class='star star-3 '></i>"; ?>
                                    <?php elseif ($urtng <= 3.5): echo "<i class='star star-3 star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 4): echo "<i class='star star-4 '></i>"; ?>
                                    <?php elseif ($urtng <= 4.5): echo "<i class='star star-4 star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 5): echo "<i class='star star-5'></i>"; ?>
                                    <?php
                                    else: echo "<i class='star star-0'></i>";
                                    endif;
                                    ?>
                                </td>
                            </tr>
<?php } //end Course History loop    ?> 
                    </tbody>
                </table>  
            </div>
        </div><!--/span-->
    </div>
</div>  
<!-- End Work History and Feedback -->	
</div>	
