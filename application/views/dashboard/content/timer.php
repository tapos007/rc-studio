
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
//checked if student and is active
$SQLComm = "SELECT distinct u.BatchID, u.UserID, u.Rolle, b.NextSessionDate, b.CourseID FROM tbl_useronbatch u INNER JOIN tbl_batch b ON b.BatchID = u.BatchID WHERE u.UserID = '" . $email . "' AND b.IsActive =  'Yes'";
//Find roll
$SQLRoll = "SELECT Rolle from tbl_useronbatch where UserID = '" . $email . "'";
$user_roll = $this->db->query($SQLRoll);
foreach ($user_roll->result() as $uroll) {
    $rolle = $uroll->Rolle;
}
//End roll
$ongoing_courses = $this->db->query($SQLComm);
$counter = 0;
$c_name = '';
$course_id = '';
foreach ($ongoing_courses->result() as $course) {
    $counter = $counter + 1;
    $course_id = $course->CourseID;
    $c_batch = $course->BatchID;
    $c_courseID = $course->CourseID;
    ?>

    <?php
    $course_name = $this->db->query("SELECT CourseName from tbl_course where CourseID = '" . $course_id . "'");
    foreach ($course_name->result() as $co_name) {
        $c_name = $co_name->CourseName;
    }
    ?>
    <?php
    if ($rolle == 'Student' && $course->NextSessionDate != "0000-00-00 00:00:00") {
        ?>
        <div id="Timer-Starts"class="contacts">
            <h3><?php echo $c_name; ?> Starts in</h3>
            <div class="demo<?php echo $counter; ?>"></div>
            <span style=" float:right; margin-right:75px; margin-top:-41px;">
                <a href="<?php echo site_url('student/start_session/' . $c_name . '/' . $c_batch . '/' . $c_courseID); ?>" class="btn btn-prev">Start</a></span>
        </div> <?php } else if ($rolle == 'Teacher' && $course->NextSessionDate != "0000-00-00 00:00:00") {
        ?>
        <div id="Timer-Starts"class="contacts">
            <h3><?php echo $c_name; ?> Starts in</h3>
            <div class="demo<?php echo $counter; ?>"></div>
            <span style=" float:right; margin-right:75px; margin-top:-41px;">
                <a href="<?php echo site_url('teacher/start_session/' . $c_name . '/' . $c_batch . '/' . $c_courseID); ?>" class="btn btn-prev">Start</a></span>
        </div> <?php } ?>
    </span>
    <div class="clearfix"></div>
<?php } ?>
