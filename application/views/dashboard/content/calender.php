<link href="<?php echo base_url(); ?>assets/css/dscountdown.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/dashboard/js/dscountdown.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>public/dashboard/js/dscountdown.min.js"></script>
<style>
    .fc-event-time {
  display: none;
}
</style>

<?php
$this->load->helper('date');
$D_Day = date("l");
$D_Date = date("F j");
?>
<?php
$role_query = $this->db->query('SELECT role FROM users WHERE email = "' . $this->tank_auth->get_user_email() . '"');
$role = $role_query->row();
if ($role->role == 'teacher') {
    $course_query = $this->db->query('SELECT count(InstructorID) as total FROM tbl_course WHERE InstructorID = "' . $this->tank_auth->get_user_email() . '"');
    $count = $course_query->row_array();
    if ($count['total'] == 1) { //first time alert check
        $fristCourseAllert = "A quick video chat with our expert is required before you can create your FIRST session. This will allow us to help you set up your “studio” and make sure you meet the minimum system requirement in order to conduct a glitch free session. Click here to set up a video chat appointment with our expert!";
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo $fristCourseAllert; ?></strong>
        </div>
        <?php
    }
}
?>
<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                right: 'prev,next today,month,agendaWeek,agendaDay'
            },
           
            eventSources: [{url: '<?php echo base_url(); ?>dashboard/index1'}],
            loading: function(bool) {
                if (bool)
                    $('#loading').show();
                else
                    $('#loading').hide();
            }

        });
//        $('#calendar').fullCalendar({
//            header: {
//                left: 'title',
//                right: 'prev,next today,month,agendaWeek,agendaDay'
//            },
//            events: "<?php //echo base_url();   ?>dashboard/index1",
//            editable: true,
//            droppable: true, // this allows things to be dropped onto the calendar !!!
//            drop: function(date, allDay) { // this function is called when something is dropped
//
//                // retrieve the dropped element's stored Event Object
//                var originalEventObject = $(this).data('eventObject');
//
//                // we need to copy it, so that multiple events don't have a reference to the same object
//                var copiedEventObject = $.extend({}, originalEventObject);
//
//                // assign it the date that was reported
//                copiedEventObject.start = date;
//                copiedEventObject.allDay = allDay;
//
//                // render the event on the calendar
//                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
//                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
//
//                // is the "remove after drop" checkbox checked?
//                if ($('#drop-remove').is(':checked')) {
//                    // if so, remove the element from the "Draggable Events" list
//                    $(this).remove();
//                }
//
//            }
//        });
    });</script>
<?php
$email = $this->tank_auth->get_user_email();
$TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
foreach ($TimeZone->result() as $TimeZ) {
    $TimeZone = $TimeZ->TimeZone;
    $DayLightSaving = $TimeZ->DayLightSaving;
}
//End TimeZone 
//checked if student and is active
$SQLComm = "SELECT  BatchID from tbl_useronbatch where UserID = '".$email."'";
$batches = $this->db->query($SQLComm);


?>
<div class="box">
    <div class="box-header" data-original-title>
        <h2><i class="fa fa-calendar"></i><span class="break"></span>Calendar</h2>
    </div>
    <div class="box-content">
        <div class="row">

            <div class="col-lg-8">
                <div id="calendar" class="col-lg-12"></div>	
            </div>

            <div class="col-lg-4">
            <?php
            $i = 0;
            foreach ($batches->result() as $batches_res) {
                $i++;
                $BatchID = $batches_res->BatchID;
                $SQLComm = "SELECT uob.BatchID, sch.schedule_date, sch.StartTime, sch.EndTime, course.CourseName, course.InstructorID, uob.UserID FROM tbl_schedule AS sch INNER JOIN tbl_course AS course ON course.CourseID = sch.BatchID INNER JOIN tbl_useronbatch AS uob ON course.CourseID = uob.BatchID WHERE sch.schedule_date > CURDATE( )  AND uob.UserID = '" . $email . "' and uob.BatchID = '" . $BatchID . "'  ORDER BY sch.schedule_date";
                $CourseName = '';
                $schedule = $this->db->query($SQLComm);
                foreach ($schedule->result() as $schedule_res) {
                    $NextSessionDate = $schedule_res->schedule_date;
                    $StartTime = $schedule_res->StartTime;
                    $NextDateTime = $schedule_res->schedule_date . " " . $StartTime;
                    $CourseName =$schedule_res->CourseName;
                    echo "<br />".$schedule_res->CourseName."<br />";
                    
                    break;
                }
                ?>
                <div class = "col-lg-7 demo<?php echo $i; ?>">
                <script>
                    
                    $(document).ready(function($) {
                        var data = "<?php echo date("F d Y  H:i:s", gmt_to_local(strtotime($NextDateTime), $TimeZone, $DayLightSaving)); ?>";
                        $('.demo<?php echo $i; ?>').dsCountDown({
                            endDate: new Date(data)
                        });
                    });
                </script>
                
                </div>
                <div class = "col-lg-4" style="float:left; padding-top:12px; margin-bottom: 30px;">
                <a href="<?php echo site_url('teacher/start_session/' . $CourseName . '/' . $BatchID . '/' . $BatchID); ?>" class="btn btn-prev">Start</a>
                 </div>
                
                
            <?php } ?>
            </div>
        </div>
    </div>
</div>



<!--System -->
<div class="modal fade" id="fristCourse" tabindex="-1" role="modal" aria-labelledby="learnToLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h1 class="modal-title" id="learnToLabel">Important!...</h1>

            </div>

            <div class="modal-body">

                <p style="font-size : 20px">			
<?php echo $fristCourseAllert; ?>
                </p>

            </div
        ></div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->


