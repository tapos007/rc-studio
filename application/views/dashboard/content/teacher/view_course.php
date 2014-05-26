<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js">

</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js">

</script>

<?php //echo $this->session->userdata('TimeZone'); ?>

<?php $this->load->helper('share'); ?>

<?php
$TimeZone = "UTC";

$CatImage = '';
?>

<script type="text/javascript">

    var TimeZoneResult = '';

    $(document).ready(function() {

        var visitortime = new Date();



        var timediff = -visitortime.getTimezoneOffset();

        var visitortimezone = timediff / 60;

        var modresult;

        var result = '';



        if (visitortimezone == 0) {

            TimeZoneResult = "UTC";

        }

        else if (visitortimezone > 0) {

            if (timediff % 60 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString();

            else if (timediff % 30 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString() + '5';

            else
                result += Math.floor(parseInt(visitortimezone)).toString() + '75';

            TimeZoneResult = "UP" + result;

        }

        else if (visitortimezone < 0) {

            visitortimezone *= -1;

            if (timediff % 60 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString();

            else if (timediff % 30 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString() + '5';

            else
                result += Math.floor(parseInt(visitortimezone)).toString() + '75';

            TimeZoneResult = "UM" + result;

        }



    });

</script>



<?php
$DayLightSaving = 0;

$email = $this->tank_auth->get_user_email();

$TimeZoneData = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');

if ($TimeZoneData->num_rows() != 0) {

    foreach ($TimeZoneData->result() as $TimeZ) {

        $TimeZone = $TimeZ->TimeZone;

        $DayLightSaving = $TimeZ->DayLightSaving;
    }
} else {

    if ($this->session->userdata('TimeZone'))
        $TimeZone = $this->session->userdata('TimeZone');
    else
        $TimeZone = $TimeZoneUR;

    //echo $TimeZone;
}

//End TimeZone 
?>



<div class="row-fluid">

    <div class="box col-lg-9">

        <div class="box-header">

            <h2><i class="fa fa-edit"></i><span class="break"></span>Course Detail</h2>

        </div>

        <div class="box-content">

            <?php
            $this->lang->load('tank_auth');
            $MaxStudent = "";

            foreach ($course->result() as $course_info):

                $CatImage = $course_info->Category;
                ?>

                <div id= "Course" class="page-header">



                    <div id="Course-Picture" class="masonry-thumb" Style="float:left !important;">

                        <img class="grayscale" src="<?php echo base_url(); ?>public/dashboard/course/<?php echo $course_info->Category; ?>.jpg"  width="120px" height="150px" alt="<?php echo $course_info->Category; ?>" />						

                    </div>



                    <div id="Instructor-NameExp"  Style="float:left; padding-left:15px">



                        <span class="blue">

                            <h1><b><?php echo $course_info->CourseName; ?></b> <br></h1>

                        </span>



                                                        <!--<br><i class="icon-comment"></i>&nbspLanguage: <span class="seostars">

                                                        <strong>English</strong>  <i>US</i>-->



                        <br><i class="icon-time"></i>&nbspTotal Course Hours: <span class="seostars">

                            <strong><?php echo $course_info->TotalHour; ?></strong>  <i></i>



                            <br><i class=" icon-spinner"></i>&nbspSession Duration (Minutes): <span class="seostars">	

                                <strong><?php echo $course_info->HourPerSession; ?> </strong>  <i></i>



                                <br><i class="icon-group"></i>&nbspMax Number of Student: <span class="seostars">	

                                    <strong><?php
                                        $MaxStudent = $course_info->MaxofStudet;
                                        echo $course_info->MaxofStudet;
                                        ?></strong>  <i></i>



                                    </div>





                                    <div id="Instructor-RateRating"  Style="float:right">

                                        <br><h2><b>

                                                <span class="blue">

                                                    Course Price: USD <?php echo $course_info->CouseFree; ?>

                                                </span>

                                        </h2></b>									
                                        <?php
                                        //Get Course Rating
                                        $SQLComm = "SELECT SUM(RatingPointTeacher) as Rating FROM tbl_rating WHERE CourseID = '" . $course_info->CourseID . "'";
                                        $TblRating = $this->db->query($SQLComm);
                                        foreach ($TblRating->result() as $RecRating) {

                                            $urtng = $RecRating->Rating;
                                            if ($urtng == 'NULL')
                                                $urtng = 0;
                                        }
                                        //End Get Course Rating 

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






                                        <br>                    

                                        <?php
                                        // Check Role For Sending Message

                                        $var_role = "";

                                        $email = $this->tank_auth->get_user_email();

                                        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";

                                        $transaction = $this->db->query($SQLComm);

                                        foreach ($transaction->result() as $trans) {

                                            $var_role = $trans->role;

                                            $data['Role'] = $var_role;
                                        }

                                        if ($var_role == "student") {



                                            $SQLCommU = "SELECT count(Rolle) as TotalStudent from tbl_useronbatch WHERE Rolle = 'Student' and  BatchID = '" . $batch_id . "' ";  //check for max student enrolled

                                            $studentCount = $this->db->query($SQLCommU)->result();



                                            foreach ($studentCount as $stCount) {

                                                $TotalEnrolled = $stCount->TotalStudent;
                                            }



                                            if (intval($TotalEnrolled) < intval($course_info->MaxofStudet)) {
                                                ?> <button type="submit" class="btn btn-primary">Send Message</button> <?php
                                            } else {
                                                ?> <button type="submit" class="btn btn-primary">Send Message</button> <?php
                                            }
                                        } elseif ($var_role == "teacher") {

                                            if ($email == $course_info->InstructorID) {
                                                ?>  

                                                <button class="btn btn-success noty" data-noty-options='{"text":"You are trying to send a message to yourself !!!","layout":"top","type":"information"}'>Send Message</button>  <?php } else {
                                                ?>  

                                                <button class="btn btn-success noty" data-noty-options='{"text":"You are trying to send a message to another teacher which is not allowed !!!","layout":"top","type":"information"}'>Send Message</button>  <?php
                                            }
                                        } else {
                                            ?> <a href="<?php echo site_url('/welcome/loginUnregistered'); ?>" class="btn btn-primary"> Send Message </a> <?php
                                        }



                                        // End Check Role for Sending message
                                        ?>							



                                        <br>

                                        <!--Start Transaction for Course Purchase -->

                                        <?php
                                        $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'enroll_into_course');
                                        foreach ($batch->result() as $batch_info) {
                                            //echo form_open('teacher/enroll_into_course', $attributes); 
                                            echo form_open('student/purchase/' . $batch_info->CourseID . '/' . $batch_info->BatchID, $attributes);
                                        }
                                        ?>


                                        <input type="hidden" name="CourseName" value="<?php echo $course_info->CourseName; ?>"/>

                                        <input type="hidden" name="CouseFree" value="<?php echo $course_info->CouseFree; ?>"/>

                                        <input type="hidden" name="StudentID" value="<?php echo $this->tank_auth->get_user_email(); ?>"/>

                                        <?php foreach ($batch->result() as $batch_info): ?>

                                            <input type="hidden" name="CourseID" value="<?php echo $batch_info->CourseID; ?>"/> 

                                            <input type="hidden" name="BatchID" value="<?php echo $batch_info->BatchID; ?>"/> 

                                            <input type="hidden" name="InstructorID" value="<?php echo $batch_info->TeacherID; ?>"/> 

                                            <?php
                                        endforeach;

                                        // Check Role for Enrollment 

                                        $var_role = "";

                                        $email = $this->tank_auth->get_user_email();

                                        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";

                                        $transaction = $this->db->query($SQLComm);

                                        foreach ($transaction->result() as $trans) {

                                            $var_role = $trans->role;

                                            $data['Role'] = $var_role;
                                        }

                                        if ($var_role == "student") {

                                            $SQLCommU = "SELECT count(Rolle) as TotalStudent from tbl_useronbatch WHERE Rolle = 'Student' and  BatchID = '" . $batch_id . "' ";  //check for max student enrolled

                                            $studentCount = $this->db->query($SQLCommU);

                                            foreach ($studentCount->result() as $stCount) {

                                                $TotalEnrolled = $stCount->TotalStudent;
                                            }

                                            $SQLCommAlreadyRegistered = "SELECT count(Rolle) as IsStudentEnrolled from tbl_useronbatch WHERE Rolle = 'Student' and  BatchID = '" . $batch_id . "' and UserID = '" . $email . "'";  //check for max student enrolled

                                            $IsEnrolled = $this->db->query($SQLCommAlreadyRegistered)->result();

                                            foreach ($IsEnrolled as $Enrolled) {

                                                $Enrolled = $Enrolled->IsStudentEnrolled;
                                            }



                                            if (intval($Enrolled) == 0 && intval($TotalEnrolled) < intval($MaxStudent) && $email != $course_info->InstructorID) {
                                                ?> <button type="submit" class="btn btn-success btn-next" data-last="Finish">Sign Up</button> <?php
                                            } else {

                                                if ($email == $course_info->InstructorID) {
                                                    ?>  <a href="#" class="btn btn-danger btn-next"> Sign Up </a>  <?php
                                                } elseif (intval($Enrolled) != 0) {
                                                    ?>  <button class="btn btn-success noty" data-noty-options='{"text":"You are already enrolled into this course.","layout":"top","type":"information"}'>Sign Up</button>   <?php
                                                } else {
                                                    ?>  <button class="btn btn-success noty" data-noty-options='{"text":"Capacity of this course reached maximum.","layout":"top","type":"information"}'>Course Filled</button>   <?php
                                                }
                                            }
                                        } elseif ($var_role == "teacher") {
                                            ?>  

                                            <button class="btn btn-success noty" data-noty-options='{"text":"You cannot to Sign Up a Course as Instructor.","layout":"top","type":"information"}'>Sign Up</button>  <?php
                                        } else {
                                            ?> <a href="<?php echo site_url('/welcome/loginUnregistered_signup'); ?>" class="btn btn-success btn-next"> Sign Up </a> <?php
                                        }

                                        // End Check Role for Enrollment
                                        ?>	





                                        <?php echo form_close(); ?>  

                                        <!--End Transaction for Course Purchase -->



                                    </div>



                                    <div style = "clear:both"></div> 

                                    </div>     

                                    <div id= "Instructor-Overview" class="page-header">

                                        <div id="Instructor-Overview-Title">

                                            <h3>Course Overview <small></small></h3>

                                        </div>



                                        <div id="Instructor-Overview-Detail">

                                            <?php echo $course_info->Overview; ?>

                                        </div>

                                    </div>  

                                    <!-- Qualification for Students -->

                                    <div id= "Qualification-for-Students" class="page-header">

                                        <div id="Qualification-for-Students-Title">

                                            <h3>Qualification for Students <small></small></h3>

                                        </div>



                                        <div id="Qualification-for-Students-Detail">

                                            <?php echo $course_info->QualificationForStudent; ?>

                                        </div>

                                    </div>  

                                    <!-- End Education & Qualification -->	 



                                    <!-- Other Requirements -->

                                    <div id= "Requirements" class="page-header">

                                        <div id="Requirements-Title">

                                            <h3>Requirements <small></small></h3>

                                        </div>



                                        <div id="Requirements-Detail">

                                            <?php echo $course_info->Requirements; ?>

                                        </div>

                                    </div>  

                                    <!-- End Other Requirements -->	

                                    <?php if ($course_info->VideoLink != NULL) { ?>

                                        <!-- Videos -->

                                        <div id= "Video" class="page-header">

                                            <div id="Video-Title">

                                                <h3>Course Videos <small></small></h3>

                                            </div>





                                            <iframe width="650" height="480" src="//<?php echo $course_info->VideoLink; ?>" frameborder="0" allowfullscreen></iframe>



                                        </div>  

                                        <!-- End Other Videos -->					

                                    <?php } endforeach; ?>



                                <?php foreach ($batch->result() as $batch_info): ?>

                                    <!-- Schedule Information -->

                                    <div id= "Schedule" class="page-header">

                                        <div id="Schedule-Title">

                                            <h3>Course Schedule Detail for Sessions<small></small></h3>

                                        </div>



                                        <div id="Schedule-Detail">
                                            <div class="hidden">
                                                <br><i class=" icon-calendar"></i>&nbspCourse Start Date: <span class="seostars"> <strong><?php echo date('m/d/Y', gmt_to_local(strtotime($batch_info->StartDate), $TimeZone, $DayLightSaving)); //date("m/d/Y",strtotime($batch_info->StartDate));     ?></strong>  <i></i>

                                                    <br><i class=" icon-calendar"></i>&nbspCourse End Date: <span class="seostars"> <strong><?php echo date('m/d/Y', gmt_to_local(strtotime($batch_info->EndDate), $TimeZone, $DayLightSaving)); //date("m/d/Y",strtotime($batch_info->EndDate));     ?></strong>  <i></i>
                                                        </div>
                                                        </div>

                                                        <br>

                                                        <br>

                                                    <?php endforeach; ?>

                                                    <div class="row-fluid">	

                                                        <div class="box span12">

                                                            <div class="box-header">

                                                                <h2><i class="fa fa-edit"></i><span class="break"></span>Weekly Schedule</h2>

                                                                <div class="box-icon"> 
                                                                    <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                                                    <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>

                                                                </div>

                                                            </div>

                                                            <div class="box-content">

                                                                <table class="table table-bordered">

                                                                    <thead>

                                                                        <tr>

                                                                            <th>Date</th>

                                                                            <th>Start Time</th>

                                                                            <th>End Time</th>

                                                                            <th>Flexibility </th>                                          

                                                                        </tr>

                                                                    </thead>   

                                                                    <tbody>

                                                                        <?php
                                                                        $i = 1;
                                                                        foreach ($schedules->result() as $schedule_info): $i++;
                                                                            ?>

                                                                            <tr>

                                                                                <td><?php echo date("m-d-Y", strtotime($schedule_info->schedule_date)); ?></td>

                                                                                <td class="center"><?php //echo $schedule_info->StartTime;     ?>

                                                                                    <?php echo date('H:i:s', gmt_to_local(strtotime($schedule_info->StartTime), $TimeZone, $DayLightSaving)); ?>

                                                                                </td>

                                                                                <td class="center"><?php //echo $schedule_info->EndTime;    ?>

                                                                                    <?php echo date('H:i:s', gmt_to_local(strtotime($schedule_info->EndTime), $TimeZone, $DayLightSaving)); ?>

                                                                                </td>

                                                                                <td class="center">

                                                                                    <span class="label label-importan"><?php echo $schedule_info->Flexiblity; ?></span>

                                                                                </td>                                       

                                                                            </tr>

                                                                            <?php
                                                                            $InstructorID = $course_info->InstructorID;

                                                                            $CourseID = $course_info->CourseID;

                                                                        endforeach;
                                                                        ?>

                                                                    </tbody>

                                                                </table>  

                                                            </div>

                                                        </div><!--/span-->



                                                    </div><!--/row-->



                                                    </div>  

                                                    <!-- End Schedule Information -->	 









                                                    <!-- Course History and Feedback --><div id= "Course-History-and-Feedback" class="page-header">

                                                        <div class="box span12">

                                                            <div class="box-header">

                                                                <h2><i class="fa fa-edit"></i><span class="break"></span>Course History and Feedback</h2>

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
                                                                        $coursehistory = $this->db->query("select * from tbl_rating where TeacherID = '" . $InstructorID . "' and CourseID = '" . $CourseID . "'");

                                                                        foreach ($coursehistory->result() as $history) { //Course History Table Start Loop 
                                                                            ?> 

                                                                            <tr>



                                                                                <td class="center"><?php echo $history->CourseName; ?></td>

                                                                                <td class="center"><?php echo date("m/d/Y", strtotime($history->StartDate)); ?></td>

                                                                                <td class="center"><?php echo date("m/d/Y", strtotime($history->EndDate)); ?></td>

                                                                                <td class="center"><?php echo $history->CommentsForTeacher ?> </td>    

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

                                                                        <?php } //end Course History loop   ?> 							

                                                                    </tbody>

                                                                </table>  



                                                            </div>

                                                        </div><!--/span-->

                                                    </div>  

                                                    </div>  



                                                    </div>  	<!-- /box span9--> 


                                                    <!-- Right New Table-->

                                                    <!-- Ongoing Course List -->

                                                    <?php
                                                    $SQLComm = "SELECT p.*, u.username from tbl_profile as p INNER JOIN users as u ON u.email = p.UserID WHERE UserID = '" . $InstructorID . "'";

                                                    $ongoing_courses = $this->db->query($SQLComm);

                                                    $c_name = '';

                                                    $course_id = '';
                                                    ?>

                                                    <div class="col-lg-3">

                                                        <div class="box span3" ontablet="span3" ondesktop="span3">

                                                            <div class="box-header">

                                                                <h2><i class="fa fa-edit"></i>Instructor</h2>

                                                                <div class="box-icon">

                                                                    <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>

                                                                    <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>

                                                                </div>

                                                            </div>

                                                            <div class="box-content">

                                                                <ul class="dashboard-list">

                                                                    <?php
                                                                    foreach ($ongoing_courses->result() as $profile) {
                                                                        ?>

                                                                        <?php if ($c_name != 'Demo Session') { ?>

                                                                            <li> 

                                                                                <div class="row">

                                                                                    <div style = "text-align:center;">

                                                                                        <a type="button" href="<?php echo site_url('view_profile/teacher_profile/' . base64_encode($profile->UserID)); ?>"  >

                                                                                            <img class="grayscale" src="<?php echo base_url(); ?>public/dashboard/upl/<?php echo $profile->Picture; ?>"   width="100px" height="100px" alt="<?php echo $profile->username; ?>" />

                                                                                    </div>

                                                                                </div>

                                                                                <br><strong>  <i><?php echo $profile->username; ?> </a></strong> <br /></i>

                                                                                </a>



                                                                                <br>

                                                                                <i class="icon-map-marker"></i>&nbsp&nbsp Location: <span class="seostars">

                                                                                    <strong><?php echo $profile->Country; ?></strong>  <i><?php echo $profile->State; ?></i>



                                                                                    <br>

                                                                                    <i class="icon-time"></i>&nbsp&nbsp TimeZone: <span class="seostars">

                                                                                        <strong><?php
                                                                                            $this->lang->load('date', 'english');
                                                                                            echo substr($this->lang->line($profile->TimeZone), 0, 20);
                                                                                            ?></strong>  



                                                                                        <br>

                                                                                        <i class="icon-comment"></i>&nbspYears of Experience: <span class="seostars">

                                                                                            <strong><?php echo $profile->YearOfExperince; ?></strong> 



                                                                                            <br><i class="icon-calendar"></i>&nbspMember Since: <span class="seostars">

                                                                                                <strong><?php echo date("m/d/Y ", strtotime($profile->CreatedOn)); ?></strong>  <i></i>							

                                                                                                </li>	

                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>

                                                                                        </ul>

                                                                                        </div>

                                                                                        </div><!--/span-->



                                                                                        <?php
                                                                                        $SQLComm = "SELECT distinct c.TotalHour, c.Category, c.SubCategory, c.HourPerSession, c.MaxofStudet, c.CouseFree, u.BatchID, u.UserID, u.Rolle, b.StartDate, b.EndDate, b.NextSessionDate, b.CourseID FROM tbl_useronbatch u INNER JOIN tbl_batch b ON b.BatchID = u.BatchID INNER JOIN tbl_course c ON c.CourseID = b.CourseID WHERE u.UserID = '" . $InstructorID . "' AND u.Rolle =  'Teacher' AND b.IsActive =  'Yes'";

                                                                                        $ongoing_courses = $this->db->query($SQLComm);

                                                                                        $c_name = '';

                                                                                        $course_id = '';
                                                                                        ?>

                                                                                        <div class="box span3" ontablet="span3" ondesktop="span3">

                                                                                            <div class="box-header">

                                                                                                <h2><i class="fa fa-edit"></i>Courses</h2>

                                                                                                <div class="box-icon">

                                                                                                    <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>

                                                                                                    <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="box-content">

                                                                                                <ul class="dashboard-list">

                                                                                                    <?php
                                                                                                    foreach ($ongoing_courses->result() as $course) {

                                                                                                        $course_id = $course->CourseID;

                                                                                                        $batch_id = $course->BatchID;

                                                                                                        $course_name = $this->db->query("SELECT CourseName from tbl_course where CourseID = '" . $course_id . "'");

                                                                                                        foreach ($course_name->result() as $co_name) {

                                                                                                            $c_name = $co_name->CourseName;
                                                                                                        }
                                                                                                        ?>

                                                                                                        <?php
                                                                                                        if ($c_name != 'Demo Session') {

                                                                                                            $CourseURL = site_url('teacher/view_course/' . $course_id . '/' . $batch_id . '/' . $TimeZone);
                                                                                                            ?>

                                                                                                            <li>

                                                                                                                <a href="<?php echo $CourseURL; ?>">

                                                                                                                    <img class="avatar" alt="Lucas" src="<?php echo base_url() . 'public/dashboard/course/' . $course->Category . '.jpg'; ?>" />

                                                                                                                </a>

                                                                                                                <strong>Name:</strong> <a href="<?php echo $CourseURL; ?>"> <?php echo $c_name; ?> </a><br />

                                                                                                                <strong>Course Hour:</strong> <?php echo $course->TotalHour; ?> <br />

                                                                                                                <strong>Price:</strong><?php echo $course->CouseFree; ?>     

                                                                                                                <br><i class="icon-calendar"></i>&nbspStarts at: <span class="seostars"><strong><?php echo date("m/d/Y ", strtotime($course->StartDate)); ?></strong>  <i></i>								

                                                                                                            </li>	

                                                                                                            <?php
                                                                                                        }
                                                                                                    }
                                                                                                    ?>

                                                                                                </ul>

                                                                                            </div>

                                                                                        </div><!--/span-->

                                                                                        <div class="box span3" ontablet="span3" ondesktop="span3">



                                                                                            <?php
                                                                                            $url = 'http://www.studionear.com/beta2/teacher/view_course/' . $course_id . '/' . $batch_id;

                                                                                            $text = 'Studio Near';

                                                                                            $image = 'http://www.studionear.com/beta2/public/dashboard/course/' . $CatImage . '.jpg';
                                                                                            ?>



                                                                                            <p>

                                                                                                <?= share_button('facebook', array('url' => $url, 'text' => $text)) ?> <br/>

                                                                                                <?= share_button('twitter', array('url' => $url, 'text' => $text, 'via' => 'mpak666', 'type' => 'iframe')) ?>

                                                                                                <br/>



                                                                                            </p>

                                                                                        </div>


                                                                                        </div>


                                                                                        <!-- Right Table End -->

                                                                                        </div>  

