<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.min.js"></script>

<?php if ($this->session->flashdata('msg')) { ?>	
    <script type="text/javascript">
        window.onload = function() {
            $("#notification").click();
        }
    </script>	<?php }
?>
<div id ="notification" class="noty" data-noty-options='{"text":"<?php echo $this->session->flashdata('msg'); ?>","layout":"top","type":"information"}' ></div>
<?php
$old_password = array(
    'name' => 'old_password',
    'id' => 'old_password',
    'class' => 'required form-control',
    'value' => set_value('old_password'),
    'size' => 30,
);
$new_password = array(
    'name' => 'new_password',
    'id' => 'new_password',
    'class' => 'required form-control',
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
);
$confirm_new_password = array(
    'name' => 'confirm_new_password',
    'id' => 'confirm_new_password',
    'class' => 'required form-control',
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
);
?>
<!-- Change Password -->
<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Change Password </h2>
            <div class="box-icon">

                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>

        </div>
        <div class="box-content">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                In order to change your Password, you must first enter your old Password:
                <br>A strong password…
                <br>- is 14 characters 5 (five minimum) in length
                <br>- is a combination of letters (lower case or upper case) and at least one number or other non-letter character                                                    
            </div>
            <?php
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'change_passowrd');
            echo form_open('auth/change_password', $attributes);
            ?>
            <div class="form-group">
                <label class="control-label" for="FromDate">Old Password</label>
                <div class="controls">
                    <?php echo form_password($old_password); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="ToDate">New Password</label>
                <div class="controls">
                    <?php echo form_password($new_password); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="ToDate">Re-Type New Password</label>
                <div class="controls">
                    <td><?php echo form_password($confirm_new_password); ?></td>
                </div>
            </div>
            <?php echo form_submit('change', 'Change Password'); ?>

            <?php echo form_close(); ?>
        </div>
    </div>
</div> 
<!-- End Change Password -->
<script type="text/javascript">
    $("#change_passowrd").validate({
        rules: {
            old_password: "required",
            new_password: {
                required: true,
                minlength: 5
            },
            confirm_new_password: {
                required: true,
                minlength: 5,
                equalTo: "#new_password"
            }
        },
        messages: {
            old_password: "Please enter old password",
            new_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_new_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element
                    .addClass('valid')
                    .closest('.control-group').removeClass('error').addClass('success');
        }
    });
</script>