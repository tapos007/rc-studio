<?php$this->lang->load('tank_auth');$email = $this->tank_auth->get_user_email();$SQLCom = "Select * from tbl_notification where Email = '" . $email . "' and Status = 'Un-Read' ORDER BY ID DESC";$notifications = $this->db->query($SQLCom);?>	<li class="dropdown hidden-xs">    <a class="btn dropdown-toggle" data-toggle="dropdown" href="index.html#">        <?php if ($notifications->num_rows() != 0) { ?>            <span class="notification red" style = "font-size: 10px !important; margin-top: 10px !important; padding:2px; margin-right:15px;">                <?php echo $notifications->num_rows(); ?>                            </span>        <?php } ?>        <i class="fa fa-bell"></i>    </a>    <ul class="dropdown-menu notifications">        <li class="dropdown-menu-title">            <span>You have <?php echo $notifications->num_rows(); ?> notifications</span>        </li>        <?php        $i = 0;        foreach ($notifications->result() as $note) {            ++$i;            if ($i == 11)                break;            ?>            <li>			                <?php                if (strstr($note->Notification, '<a ')) {                    $html = $note->Notification;                    $url = preg_match('/<a href="(.+)">/', $html, $match);                    $info = parse_url($match[1]);                    $mypath = $info['scheme'] . "://" . $info['host'] . $info['path'];                    $myString = $note->Notification;                    $stripResult1 = strip_tags($myString);                    ?>                    <a href="<?php echo $mypath; ?>">                        <span class="icon blue"><i class="fa fa-user"></i></span>                        <span class="message"><?php echo substr($stripResult1, 0, 25) . " ..."; ?></span>                    </a>                      <?php                } else {                    ?><a href="#">                        <span class="icon blue"><i class="fa fa-user"></i></span>                        <span class="message"><?php echo substr($note->Notification, 0, 25) . " ..."; ?></span>                     </a> <?php                }                ?>	            </li>        <?php } ?>        <li class="dropdown-menu-sub-footer">            <a href="<?php echo site_url('notification'); ?>">View all notifications</a>        </li>	    </ul></li>