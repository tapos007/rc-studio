<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cleditor').cleditor();
    });
</script>
<?php
$email = $this->tank_auth->get_user_email();
$GetAllStudent = $this->db->query("select b.UserID, u.username as UserName from tbl_useronbatch as b INNER JOIN users u ON u.email = b.UserID where Rolle = 'Student' and IsCompleted = 'Req' and BatchID = '" . $BatchID . "' Limit 1"); //***
$StudentCounter = 1;
//Get CourseName, Batch StartDate and Batch EndDate
$CourseInfo = $this->db->query('SELECT c.CourseName, b.StartDate, b.EndDate FROM tbl_course as c INNER JOIN tbl_batch as b ON b.CourseID = c.CourseID where b.CourseID ="' . $CourseID . '" and b.BatchID = "' . $BatchID . '"');
foreach ($CourseInfo->result() as $CourseInformation) {
    $CourseName = $CourseInformation->CourseName;
    $StartDate = $CourseInformation->StartDate;
    $EndDate = $CourseInformation->EndDate;
}
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'operation_approve_reject');
echo form_open('teacher/operation_approve_reject', $attributes);
?>

<div class="col-lg-9">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Approve Student for <?php echo $CourseName; ?></h2>
            <div class="box-icon">
                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <fieldset> <?php
                foreach ($GetAllStudent->result() as $AllStudentOfBatch) {
                    ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="StudentName">You Approving</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly name="StudentID" value = "<?php echo $AllStudentOfBatch->UserName; ?>">
                        </div>
                    </div>	
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="CommentsForStudent">Approve / Reject Note</label>
                        <div class="col-sm-10">
                            <div class="input-append">
                                <input type="hidden" name="StudentID" value = "<?php echo $AllStudentOfBatch->UserID; ?>">
                                <input type="hidden" name="BatchID" value = "<?php echo $BatchID; ?>">
                                <input type="hidden" name="CourseID" value = "<?php echo $CourseID; ?>">
                                <textarea class="cleditor" name="CommentsForStudent" style="width: 500px; height:50px;"> </textarea>
                            </div>
                            <br><span class="help-inline">Approve or Reject Student.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="approve"  value="Approve" class="btn btn-success">Approve</button>
                            <button type="submit" name="reject"  value="Reject" class="btn btn-danger">Reject</button>
                        </div></div>
                </fieldset>
            </div>
        </div>
    </div><!--/col-->
    <div class="col-lg-3">
        <div class="box">
            <div class="box-header">
                <h2><i class="fa fa-edit"></i>Student</h2>
                <div class="box-icon">
                    <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php
                $SQLComm = "SELECT p.*, u.username from tbl_profile as p INNER JOIN users as u ON u.email = p.UserID WHERE UserID = '" . $AllStudentOfBatch->UserID . "'";
                $ongoing_courses = $this->db->query($SQLComm);
                ?>
                <ul class="dashboard-list"> <?php
                    foreach ($ongoing_courses->result() as $profile) {
                        ?>
                        <li> 
                            <div class="row">
                                <div style = "text-align:center;">
                                <!-- <a type="button" href="<?php //echo site_url('view_profile/teacher_profile/'.base64_encode($profile->UserID));    ?>"  > -->
                                    <img class="grayscale" src="<?php echo base_url(); ?>public/dashboard/upl/<?php echo $profile->Picture; ?>"   width="100px" height="100px" alt="<?php echo $profile->username; ?>" />
                                </div>
                            </div>
                            <br><strong>  <i><a href="<?php echo site_url('view_profile/student_profilebyemail/' . base64_encode($AllStudentOfBatch->UserID)); ?>"><?php echo $profile->username; ?> </a></a></strong> <br /></i>
                            </a>
                            <br>
                            <i class="fa fa-map-marker"></i>&nbsp&nbsp Location: <span class="seostars">
                                <strong><?php echo $profile->Country; ?></strong>  <i><?php echo $profile->State; ?></i>
                                <br>
                                <i class="fa fa-times-circle-o"></i>&nbsp&nbsp TimeZone: <span class="seostars">
                                    <strong><?php
                                        $this->lang->load('date', 'english');
                                        echo substr($this->lang->line($profile->TimeZone), 0, 20);
                                        ?></strong>  
                                    <br><i class="fa fa-calendar"></i>&nbspMember Since: <span class="seostars">
                                        <strong><?php echo date("m/d/Y ", strtotime($profile->CreatedOn)); ?></strong>  <i></i>							
                                        </li>	
                                    <?php } ?>
<?php } ?>
                                </ul>		
                                </div>
                                </div>
                                </div><!--/col-->

