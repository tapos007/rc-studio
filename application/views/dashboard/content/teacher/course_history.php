<?php$this->lang->load('tank_auth');$email = $this->tank_auth->get_user_email();?><?php//Get TimeZone and DayLightSaving$email = $this->tank_auth->get_user_email();$TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');foreach ($TimeZone->result() as $TimeZ) {    $TimeZone = $TimeZ->TimeZone;    $DayLightSaving = $TimeZ->DayLightSaving;}//End TimeZone ?><div class="col-lg-12">    <div class="box">        <div class="box-header">            <h2><i class="fa fa-edit"></i>Course History and Feedback</h2>            <div class="box-icon">                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>            </div>        </div>        <div class="box-content">            <table class="table table-striped">                <thead>                    <tr>                        <th>Course</th>                        <th>Start Date</th>                        <th>End Date</th>                        <th>Comments</th>                        <th>Amount</th>                        <th>Rating</th>                                                              </tr>                </thead>                   <tbody>                    <?php                    $student_coursehistory = $this->db->query("select * from tbl_rating where TeacherID = '" . $email . "'");                    foreach ($student_coursehistory->result() as $history) { //Course History Table Start Loop                         ?>                         <tr>                            <td class="center"><?php echo $history->CourseName; ?></td>                            <td class="center"><?php echo date('m/d/Y', gmt_to_local(strtotime($history->StartDate), $TimeZone, $DayLightSaving)); ?></td>                            <td class="center"><?php echo date('m/d/Y', gmt_to_local(strtotime($history->EndDate), $TimeZone, $DayLightSaving)); ?></td>                            <td class="center"><?php                                if ($history->CommentsForTeacher)                                    echo $history->CommentsForTeacher;                                else                                    echo "Student has not yet rated the teacher.";                                ?> </td>                              <?php                            $amount_total = $this->db->query("SELECT Amount FROM tbl_transaction WHERE BatchID = '" . $history->BatchID . "' and StudentID ='" . $history->StudentID . "' and TeacherID = '" . $history->TeacherID . "'");                            //echo "SELECT Amount FROM tbl_transaction WHERE BatchID = '".$history->BatchID."' and StudentID ='".$history->StudentID."' and TeacherID = '".$history->TeacherID."'";                            foreach ($amount_total->result() as $amount_t) {                                $am_to = $amount_t->Amount;                            }                            ?>		                            <td class="center"><?php echo $am_to; ?> </td>                            <td class="center">		 							                                <?php                                $urtng = $history->RatingPointStudent;                                if ($urtng <= 0): echo "<i class='star star-0'></i>";                                    ?>                                <?php elseif ($urtng <= .5): echo "<i class='star star-half'></i>"; ?>                                <?php elseif ($urtng <= 1): echo "<i class='star star-1'></i>"; ?>                                <?php elseif ($urtng <= 1.5): echo "<i class='star star-1 star-half'></i>"; ?>                                <?php elseif ($urtng <= 2): echo "<i class='star star-2'></i>"; ?>                                <?php elseif ($urtng <= 2.5): echo "<i class='star star-2 '></i>"; ?>                                <?php elseif ($urtng <= 3): echo "<i class='star star-3 '></i>"; ?>                                <?php elseif ($urtng <= 3.5): echo "<i class='star star-3 star-half'></i>"; ?>                                <?php elseif ($urtng <= 4): echo "<i class='star star-4 '></i>"; ?>                                <?php elseif ($urtng <= 4.5): echo "<i class='star star-4 star-half'></i>"; ?>                                <?php elseif ($urtng <= 5): echo "<i class='star star-5'></i>"; ?>                                <?php                                else: echo "<i class='star star-0'></i>";                                endif;                                ?>                            </td>                        </tr><?php } //end Course History loop    ?> 							                </tbody>            </table>         </div>    </div></div>