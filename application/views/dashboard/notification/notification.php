<script type="text/javascript">
    function ChangeNotificationStatus(email, notification, datetime)
    {

        var loadUrl = '<?php echo site_url('notification/update_notification'); ?>';
        $.post(loadUrl, {email: email, notification: notification, datetime: datetime});
        window.location.reload();
    }
</script>
<?php
//Get TimeZone and DayLightSaving
$email = $this->tank_auth->get_user_email();
$TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
foreach ($TimeZone->result() as $TimeZ) {
    $TimeZone = $TimeZ->TimeZone;
    $DayLightSaving = $TimeZ->DayLightSaving;
}
//End TimeZone 
?>
<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Notifications</h2>
            <div class="box-icon">
                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="todo">
                <ul class="todo-list">
                    <?php
                    foreach ($notifications as $notification) {
                        ?>
                        <li>
                            <span class="todo-actions">
                                <a href=""   onclick="ChangeNotificationStatus(<?php echo "'" . $notification->Email . "','" . $notification->Notification . "','" . $notification->DateTime . "'"; ?>)"><i class="glyphicon glyphicon-trash"></i></a> 
                            </span>
                            <span class="desc" style="padding-left: 35px"><?php echo $notification->Notification; ?></span> 
                            <span class="label label-important pull-right"><?php echo date('m/d/Y H:i:s', gmt_to_local(strtotime($notification->DateTime), $TimeZone, $DayLightSaving)); ?>	
                            </span>				
                        </li>
                    <?php } ?>
                </ul>
            </div>	
        </div>
    </div>
</div><!--/col-->
