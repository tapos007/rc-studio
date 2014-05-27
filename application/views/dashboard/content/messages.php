
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js"></script>
<?php $TimeZone = "UTC"; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("ul.advanceSearch").quickPagination({pagerLocation: "both", pageSize: "10"});
        $("ul.advanceSearchCourse").quickPagination({pagerLocation: "both", pageSize: "10"});
    });
</script>

<?php
$this->lang->load('tank_auth');
$email = $this->tank_auth->get_user_email();
$msg_count = $this->mahana_messaging->get_msg_count($email);
$MessageSmall = $this->mahana_messaging->get_all_threads($email);
?>
<!-- start: Content -->
<div class="col-lg-12"">
    <a href="<?php echo site_url('messaging'); ?>"  class="btn btn-large btn-success" > Inbox </a>
    <a href="<?php echo site_url('messaging/sent_item'); ?>"  class="btn btn-large btn-warning" > Sent Item </a>
    <h2> You are at <strong>Inbox</strong> <h2>
            <table class="table table-bordered table-striped table-condensed" style = "border:0px;">
                <thead>
                    <tr>
                        <th style = "border:0px;" width = "20%">From</th>
                        <th style = "border:0px;" width = "5%">Priority</th>
                        <th style = "border:0px;" width = "55%">Subject</th>
                        <th style = "border:0px;" width = "15%">Date Time</th>
                        <th style = "border:0px;" width = "5%">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $this->load->library('mahana_messaging');
                    $this->lang->load('mahana');
                    $this->load->library('mahana_messaging');
                    $this->lang->load('mahana');
                    $MessageAllGrouped = $this->mahana_messaging->get_all_threads_grouped($email, TRUE, 'DESC');
                    foreach ($MessageAllGrouped['retval'] as $MessageAll) {
                        $i = 0;
                        foreach ($MessageAll['messages'] as $MessageB) {
                            $i++;
                            if ($MessageB['status'] == 3) {
                                if ($MessageB['sender_id'] != $email) {
                                    $this->mahana_messaging->update_message_status($MessageB['id'], $email, '1');
                                }
                            }
                            if ($MessageB['status'] == 0 || $MessageB['status'] == 1) {
                                if ($MessageB['sender_id'] == $email) {
                                    $this->mahana_messaging->update_message_status($MessageB['id'], $email, '3');
                                } else {
                                    ?>
                                    <tr>
                                        <td style = "border:0px;">

                                            <a href="<?php echo site_url('messaging/read_single_message_all_threads/' . $MessageB['id'] . '/' . base64_encode($email)); ?>" style="padding-top: 5px;">
                                                <b>
                                                    <?php
                                                    echo substr($MessageB['username'], 0, 20);
                                                    if ($i != 1)
                                                        echo " (" . $i . ")";
                                                    if ($MessageB['priority'] == 2) {
                                                        ?> 
                                                </a></td><td style = "border:0px;"><span class="label label-success">Normal</span></td><?php
                                        } if ($MessageB['priority'] == 1) {
                                            ?> 
                                            </a></td><td style = "border:0px;"><span class="label label-warning ">System</span></td><?php
                                        } if ($MessageB['priority'] == 0) {
                                            ?> 
                                            </a></td><td style = "border:0px;"><span class="label  btn-danger">Admin</span></td>
                                            </b>
                                            <?php
                                        }
                                        if ($MessageB['status'] == 0) { //If Un-read
                                            ?>
                                            <td style = "border:0px;"><span class="title" style= "text-align:left; font-size:13px;"><span class="label label-info"> new </span> <b> &nbsp;&nbsp;
                                                        <a href="<?php echo site_url('messaging/read_single_message_all_threads/' . $MessageB['id'] . '/' . base64_encode($email)); ?>" style="padding-top: 5px;">

                                                        <?php echo substr($MessageB['subject'], 0, 80) . " ... ... ..."; ?> </b> </span></td>
                                            </a>
                                            <td style = "border:0px;">

                                                <span class="date"><?php echo date('M d', (strtotime($MessageB['cdate']))); ?> <b>
                                                        <?php echo "(" . date('H:i:s', (strtotime($MessageB['cdate']))) . ")"; ?></b></span> </td>
                                            <?php
                                        } else {
                                            ?>
                                            </span>
                                            <td style = "border:0px;">
                                                <a href="<?php echo site_url('messaging/read_single_message_all_threads/' . $MessageB['id'] . '/' . base64_encode($email)); ?>" style="padding-top: 5px;">

                                                    <span class="title" style= "text-align:left; font-size:13px;"> <?php echo substr($MessageB['subject'], 0, 80) . " ... ... ..."; ?></span>
                                                </a>
                                            </td>
                                            <td style = "border:0px;">
                                                <span class="date"><?php echo date('M d', (strtotime($MessageB['cdate']))); ?> <b><?php echo "(" . date('H:i:s', (strtotime($MessageB['cdate']))) . ")"; ?></b></span> </td>
                                        <?php } ?>


                                        <td style = "border:0px;">	

                                            <a class="btn btn-danger" href="<?php echo base_url() . 'messaging/del/' . base64_encode($email) . '/' . $MessageB['id'] . '/' . $MessageB['status']; ?>">

                                                <img src="<?php echo base_url() . "assets/img/trash.png"; ?> " height= "15px" width= "15px">

                                            </a>
                                        </td>



                                        <?php
                                    }
                                } //End Else
                            } // End IF
                            ?> </tr> <?php }
                        ?>
                    </ul>
                    </div>

                </tbody>
            </table>
            <!-- end: Content -->
