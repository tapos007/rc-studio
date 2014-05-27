<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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



<script>

    $(document).ready(function() {



        var b = new Date();

        var c = b.getDate();

        var a = b.getMonth();

        var e = b.getFullYear();







        $(".calendar-small").fullCalendar({
            header: {right: "title", left: "prev,next,today"},
            defaultView: "month",
            editable: true,
            selectable: true,
            selectHelper: true,
            eventSources: {url: '<?php echo base_url('teacher/timeshow'); ?>', color: 'yellow', textColor: 'black'},
            dayClick: function(g, j, f, d) {  //(g)day, (j)allday, (f)jsevent, (d)view



                $(".calendar-details > .events").html("");



                var i = new Array(7);

                i[0] = "Sunday";

                i[1] = "Monday";

                i[2] = "Tuesday";

                i[3] = "Wednesday";

                i[4] = "Thursday";

                i[5] = "Friday";

                i[6] = "Saturday";



                var k = new Array();

                k[0] = "January";

                k[1] = "February";

                k[2] = "March";

                k[3] = "April";

                k[4] = "May";

                k[5] = "June";

                k[6] = "July";

                k[7] = "August";

                k[8] = "September";

                k[9] = "October";

                k[10] = "November";

                k[11] = "December";



                var h = new Date(g.getFullYear(), g.getMonth(), g.getDate() + 1);



                var l = $(".calendar-small").fullCalendar("clientEvents", function(n) {

                    function o(r) {

                        return r < 10 ? "0" + r : r

                    }

                    if (n.start >= g && n.start < h) {

                        var p = n.title;

                        var q = n.start;

                        var m = n.end;

                        $(".calendar-details > .day").html(i[g.getDay()]);

                        $(".calendar-details > .date").html(k[g.getMonth()] + " " + g.getDate());



                        if (n.allDay) {

                            $(".calendar-details > .events").append("<li>" + p + " - all day</li>")

                        }

                        else {

                            $(".calendar-details > .events").append("<li>" + p + " - " + q.getHours() + ":" + o(q.getMinutes()) + " - " + m.getHours() + ":" + o(m.getMinutes()) + "</li>")

                        }

                    }

                    else {

                        if (g >= n.start && g <= n.end) {

                            var p = n.title;

                            var q = n.start;

                            var m = n.end;

                            $(".calendar-details > .day").html(i[g.getDay()]);

                            $(".calendar-details > .date").html(k[g.getMonth()] + " " + g.getDate());

                            $(".calendar-details > .events").append("<li>" + p + " - " + k[q.getMonth()] + " " + q.getDate() + " " + q.getHours() + ":" + o(q.getMinutes()) + " - " + k[m.getMonth()] + " " + m.getDate() + " " + m.getHours() + ":" + o(m.getMinutes()) + "</li>")

                        }

                        else {

                            $(".calendar-details > .day").html(i[g.getDay()]);

                            $(".calendar-details > .date").html(k[g.getMonth()] + " " + g.getDate())

                        }

                    }

                });



                if ($(".calendar-details ul li").length == 0) {

                    $(".calendar-details > .events").html("<li> You have no Course Today</li>")

                }

            }





        });

    });

</script>



