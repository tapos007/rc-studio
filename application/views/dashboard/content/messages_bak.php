
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
            <ul class="nav nav-pills nav-stacked">
                <!--<ul class="messagesList"> -->
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
                                <li>
                                    <div style= "width: 85%; float: left; text-align: left;">
                                        <a href="<?php echo site_url('messaging/read_single_message_all_threads/' . $MessageB['id'] . '/' . base64_encode($email)); ?>" style="background-color:#E1E1E1; padding-top: 5px;">
                                            <span style = "width: 25%; float: left; text-align:left; font-size:13px;">
                                                <span></span>
                                                <b>
                                                    <?php
                                                    echo substr($MessageB['username'], 0, 20);
                                                    if ($i != 1)
                                                        echo " (" . $i . ")";
                                                    if ($MessageB['priority'] == 2) {
                                                        ?> 
                                                        <span class="label label-success" style = "float: right; text-align:right; margin-right: 2px;">Normal</span><?php
                                                    } if ($MessageB['priority'] == 1) {
                                                        ?> 
                                                        <span class="label label-warning" style = "float: right; text-align:right; margin-right: 2px;">System</span><?php
                                                    } if ($MessageB['priority'] == 0) {
                                                        ?> 
                                                        <span class="label  btn-danger" style = "float: right; text-align:right; margin-right: 2px;">Admin</span>
                                                    </b>
                                                    <?php
                                                }
                                                if ($MessageB['status'] == 0) { //If Un-read
                                                    ?>
                                                </span><span class="title" style= "text-align:left; font-size:13px;"><span class="btn btn-mini btn-info"> new </span> <b> <?php echo substr($MessageB['subject'], 0, 80) . " ... ... ..."; ?> </b></span><span class="date"><?php echo date('M d', (strtotime($MessageB['cdate']))); ?> <b><?php echo "(" . date('H:i:s', (strtotime($MessageB['cdate']))) . ")"; ?></b></span>
                                                <?php
                                            } else {
                                                ?>
                                            </span><span class="title" style= "text-align:left; font-size:13px;"> <?php echo substr($MessageB['subject'], 0, 80) . " ... ... ..."; ?></span><span class="date"><?php echo date('M d', (strtotime($MessageB['cdate']))); ?> <b><?php echo "(" . date('H:i:s', (strtotime($MessageB['cdate']))) . ")"; ?></b></span>
                                    <?php } ?>
                                </a>
                            </div>	
                            <div style= "width: 5%; float: left;">
                                <a class="btn btn-danger v" href="<?php echo base_url() . 'messaging/del/' . base64_encode($email) . '/' . $MessageB['id'] . '/' . $MessageB['status'] ?>">
                                <!--<i class="icon-trash "/> -->
                                    Delete
                                </a>
                            </div>
                            <div class="clearfix"></div>					
                        </li>
                        <?php
                    }
                } //End Else
            } // End IF
        }
        ?>
    </ul>
    </div>


    <!-- end: Content -->
