<?php
$this->lang->load('tank_auth');
$email = $this->tank_auth->get_user_email();
$msg_count = $this->mahana_messaging->get_msg_count($email);
?>
<!-- start: Content -->


<div class= "col-lg-12">
    <div class="col-lg-9">
        <div class="box"> <a href="<?php echo site_url('messaging'); ?>"  class="btn btn-large btn-success" > Inbox </a> <a href="<?php echo site_url('messaging/sent_item'); ?>"  class="btn btn-large btn-warning" > Sent Item </a>
            <h2>
                You are <strong>Viewing Message</strong>
                <h2>
                    <div class="box-header">
                        <h2><i class="fa fa-edit"></i>Message Details</h2>
                        <div class="box-icon"> <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a> </div>
                    </div>
                    <div class="box-content">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>"/>
                        <input type="hidden" name="sender_id" value="<?php echo $sender_id; ?>"/>
                        <input type="hidden" name="priority" value="<?php echo $priority; ?>"/>
                        <br>
                        <a  class="btn btn-info" href="<?php echo base_url() . 'messaging/smsr/' . $id . '/' . base64_encode($sender_id) . '/' . base64_encode($subject) . '/' . base64_encode($body) . '/' . base64_encode($username) . '/' . $priority ?>"> 
                        <!--<i class="icon-share-alt"/> --> Reply To This Message </a>
                        <h2>Subject: <small><?php echo $subject; ?></small></h2>
                        <?php
                        $this->load->library('mahana_messaging');
                        $this->lang->load('mahana');
                        $MessageAllGrouped = $this->mahana_messaging->get_all_threads_grouped($email, TRUE, 'DESC');
                        foreach ($MessageAllGrouped['retval'][$thread_id] as $MessageAll) {
                            for ($j = 0; $j < count($MessageAll[0]) - 1; $j++) {
                                if ($MessageAll[$j])
                                    if ($MessageAll[$j]['sender_id'] != $email) {
                                        echo "<span style='color:blue;'>";
                                    }
                                ?>
                                <h5>From: <i><?php echo " " . $MessageAll[$j]['username']; ?> </i></h5>
                                <h5>Date: <i><?php echo " " . $MessageAll[$j]['cdate']; ?> </i></h5>
                                <div class="tooltip-demo well">
                                    <p style="margin-bottom: 0;"> <?php echo $MessageAll[$j]['body']; ?> </p>
                                    <?php
                                    if ($MessageAll[$j]['sender_id'] != $email) {
                                        echo "</span>";
                                    }
                                    ?>
                                    <div class="hidden">
                                        <?php
                                        if ($MessageAll[$j + 1]['sender_id'] == NULL) {
                                            echo "</div>";
                                            break;
                                        } else {
                                            echo "</div>";
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-lg-3">
                        <?php
//To Get Receptionist ID
                        $receiptionistEmail = $sender_id;
                        $SQLComm = "SELECT mp.user_id, u.username from msg_participants AS mp INNER JOIN users u ON u.email = mp.user_id WHERE user_id <> '" . $email . "' and thread_id = '" . $thread_id . "'";
                        if ($receiptionistEmail == $email) {
                            $Receip = $this->db->query($SQLComm);
                            foreach ($Receip->result() as $Receiver) {
                                $receiptionist = $Receiver->username;
                                $receiptionistEmail = $Receiver->user_id;
                            }
                            // End get Receptionist ID
                        }
                        $SQLComm = "SELECT p.*, u.username from tbl_profile as p INNER JOIN users as u ON u.email = p.UserID WHERE UserID = '" . $receiptionistEmail . "'";
                        $ongoing_courses = $this->db->query($SQLComm);
                        $c_name = '';
                        $course_id = '';
                        ?>
                        <div class="box">
                            <div class="box-header">
                                <h2><i class="fa fa-edit"></i>Sender</h2>
                                <div class="box-icon"> <a href="form-elements.html#" class="btn-setting"><i class="fa fa-wrench"></i></a> <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a> </div>
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
                                                      <!-- <a type="button" href="<?php //echo site_url('view_profile/teacher_profile/'.base64_encode($profile->UserID));     ?>"  > --> 
                                                        <img class="grayscale" src="<?php echo base_url(); ?>public/dashboard/upl/<?php echo $profile->Picture; ?>"   width="100px" height="100px" alt="<?php echo $profile->username; ?>" /> </div>
                                                </div>
                                                <br>
                                                <strong> <i><?php echo $profile->username; ?> </a></strong> <br />
                                                </i> </a> <br>
                                                <i class="icon-map-marker"></i>&nbsp&nbsp Location: <span class="seostars"> <strong><?php echo $profile->Country; ?></strong> <i><?php echo $profile->State; ?></i> <br>
                                                    <i class="icon-time"></i>&nbsp&nbsp TimeZone: <span class="seostars"> <strong>
                                                            <?php
                                                            $this->lang->load('date', 'english');
                                                            echo substr($this->lang->line($profile->TimeZone), 0, 20);
                                                            ?>
                                                        </strong> <br>
                                                        <i class="icon-comment"></i>&nbspYears of Experience: <span class="seostars"> <strong><?php echo $profile->YearOfExperince; ?></strong> <br>
                                                            <i class="icon-calendar"></i>&nbspMember Since: <span class="seostars"> <strong><?php echo date("m/d/Y ", strtotime($profile->CreatedOn)); ?></strong> <i></i> </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        </ul>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>