<script src="<?php echo base_url(); ?>public/dashboard/js/angular.min.js"></script>

<script >

    var RatingDemoCtrl = function($scope) {

        $scope.rate = 7;

        $scope.max = 10;

        $scope.isReadonly = false;



        $scope.hoveringOver = function(value) {

            $scope.overStar = value;

            $scope.percent = 100 * (value / $scope.max);

        };



        $scope.ratingStates = [
            {stateOn: 'glyphicon-ok-sign', stateOff: 'glyphicon-ok-circle'},
            {stateOn: 'glyphicon-star', stateOff: 'glyphicon-star-empty'},
            {stateOn: 'glyphicon-heart', stateOff: 'glyphicon-ban-circle'},
            {stateOn: 'glyphicon-heart'},
            {stateOff: 'glyphicon-off'}

        ];

    };

</script>



<?php
$email = $this->tank_auth->get_user_email();

$rating = $this->db->query("select * from tbl_rating where StudentID = '" . $email . "' and CommentsForTeacher is null and RatingPointTeacher is null"); //***

if ($rating->result()) {

    foreach ($rating->result() as $rating_teacher) {

        $CourseID = $rating_teacher->CourseID;

        $BatchID = $rating_teacher->BatchID;

        $CourseName = $rating_teacher->CourseName;
    }

    $GetAllTeacher = $this->db->query("select b.UserID, u.username as UserName from tbl_useronbatch as b INNER JOIN users u ON u.email = b.UserID where Rolle = 'Teacher' and BatchID = '" . $BatchID . "'"); //***
    //Get CourseName, Batch StartDate and Batch EndDate

    $CourseInfo = $this->db->query('SELECT c.CourseName, b.StartDate, b.EndDate FROM tbl_course as c INNER JOIN tbl_batch as b ON b.CourseID = c.CourseID where b.CourseID ="' . $CourseID . '" and b.BatchID = "' . $BatchID . '"');

    foreach ($CourseInfo->result() as $CourseInformation) {

        $CourseName = $CourseInformation->CourseName;

        $StartDate = $CourseInformation->StartDate;

        $EndDate = $CourseInformation->EndDate;
    }

    $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'rate_teacher');

    echo form_open('student/rate_teacher', $attributes);
    ?>



    <div class="row-fluid">

        <div class="box span12">

            <div class="box-header">

                <h2><i class="icon-search"></i>Rate Teacher for <?php echo $CourseName; ?></h2>

                <div class="box-icon">



                    <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>

                    <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>

                </div>

            </div>





            <div class="box-content">

                <fieldset> <?php
                    foreach ($GetAllTeacher->result() as $AllTeacherOfBatch) {
                        ?>

                        <div class="control-group-warning">

                            <label class="control-label" for="TeacherName">You are Rating</label>

                            <div class="controls">

                                <input type="text" readonly name="TeacherName" value = "<?php echo $AllTeacherOfBatch->UserName; ?>">

                            </div>

                        </div>	

                        <div class="control-group-warning">

                            <label class="control-label" for="TeacherName">Rating</label>

                            <div class="controls">

                                <input type="number"  min="1.00" max="5.00"  name="RatingPointTeacher" value = "">

                            </div>

                        </div>







                        <div class="control-group-warning">

                            <label class="control-label" for="CommentsForTeacher">Comments</label>

                            <div class="controls">

                                <div class="input-append">



                                    <input type="hidden" name="TeacherID" value = "<?php echo $AllTeacherOfBatch->UserID; ?>">

                                    <input type="hidden" name="BatchID" value = "<?php echo $BatchID; ?>">

                                    <input type="hidden" name="CourseID" value = "<?php echo $CourseID; ?>">

                                    <input type="hidden" name="CourseName" value = "<?php echo $CourseName; ?>">



                                    <input type="hidden" name="StartDate" value = "<?php echo $StartDate; ?>">

                                    <input type="hidden" name="EndDate" value = "<?php echo $EndDate; ?>">



                                    <textarea class="cleditor" name="CommentsForTeacher" style="width: 500px; height:75px;"> </textarea>

                                </div>

                                <br><span class="help-inline">Share your experience with the Teacher for the STUDIO NEAR Community.</span>

                            </div>

                        </div>

                    <?php } ?>

                    <div class="form-actions">

                        <button type="submit" class="btn btn-primary">Submit Comments</button>

                    </div>



                </fieldset>



            </div><!--/box-->

        </div><!--/span-->



        <?php
        echo form_close();
    } else
        echo "You are un-authorized to view this page...";
    ?>

