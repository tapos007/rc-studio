<link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dscountdown.js"></script> 
<link href="<?php echo base_url(); ?>assets/css/dscountdown.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.min.js"></script>

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
//Get TimeZone and DayLightSaving
$email = $this->tank_auth->get_user_email();
$TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
foreach ($TimeZone->result() as $TimeZ) {
    $TimeZone = $TimeZ->TimeZone;
    $DayLightSaving = $TimeZ->DayLightSaving;
}
//End TimeZone 
?>


<!-- Course Description Table Starts -->
<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Ongoing Courses</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Next Session</th>
                        <th>Session Counter</th>
                        <th>Action</th>
                    </tr>
                </thead>   
                <tbody>                
                    <?php
                    $this->lang->load('tank_auth');
                    $email = $this->tank_auth->get_user_email();
                    //checked if student and is active
                    $SQLComm = "SELECT distinct u.BatchID, u.UserID, u.Rolle, b.NextSessionDate, b.CourseID FROM tbl_useronbatch u INNER JOIN tbl_batch b ON b.BatchID = u.BatchID WHERE u.UserID = '" . $email . "' AND u.Rolle =  'Student' AND b.IsActive =  'Yes'";
                    $ongoing_courses = $this->db->query($SQLComm);
                    $counter = 1;
                    $c_name = '';
                    $course_id = '';
                    foreach ($ongoing_courses->result() as $course) {
                        $counter = $counter + 1;
                        $course_id = $course->CourseID;
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
                    ?>
                    <tr>
                        <td><div id="Timer-Starts"class="contacts"> <!-- Course Name -->
                                <a href="<?php echo site_url('teacher/view_course/' . $course->CourseID . '/' . $course->BatchID); ?>"> <?php echo $c_name; ?> </a>
                        </td> 
                        <td><div id="Timer-Starts"class="contacts"> <!-- Next Session Start Date -->
                                <?php echo date('m/d/Y H:i:s', gmt_to_local(strtotime($course->NextSessionDate), $TimeZone, $DayLightSaving)); ?>
                        </td> 
                        <td> <!-- Counter -->
                            <div class="demo<?php echo $counter; ?>"></div>
                        </td>
                        <td> <!-- Join Button -->
                            <a href="<?php echo site_url('student/start_session/' . $c_name . '/' . $course->BatchID . '/' . $course->CourseID); ?>" ><button type="button" class="btn btn-prev">Join Session</button></a><br>
                            <button type="button" class="btn btn-success">Message Instructor</button>
                        </td>
                    <div class="clearfix"></div>
            </div>
            </tr>
            <?php
            ?> 
        <?php } ?>
        </tbody>
        </table>  
    </div>
</div><!--/span-->
</div>  
<!-- End Course Description Table -->


<!-- Course History and Feedback -->
<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-comment"></i><span class="break"></span>Course History and Feedback</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Start Date-End Date</th>
                        <th>Comments</th>
                        <th>Amount</th>
                        <th>Rating</th>                                          
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    $student_coursehistory = $this->db->query("select * from tbl_rating where StudentID = '" . $email . "'");
                    foreach ($student_coursehistory->result() as $history) { //Course History Table Start Loop 
                        ?> 
                        <tr>
                            <td class="center"><?php echo $history->CourseName; ?></td>
                            <td class="center"><?php echo date('m/d/Y', gmt_to_local(strtotime($history->StartDate), $TimeZone, $DayLightSaving)); ?></td>
                            <td class="center"><?php echo date('m/d/Y', gmt_to_local(strtotime($history->EndDate), $TimeZone, $DayLightSaving)); ?></td>
                            <td class="center"><?php echo $history->CommentsForStudent ?> </td>    
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
<!-- End Course History and Feedback -->
