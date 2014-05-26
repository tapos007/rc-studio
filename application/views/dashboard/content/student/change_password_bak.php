<!-- Change Password -->
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="box">
            <div class="box-header">
                <h2><i class="fa fa-key"></i>Change Password</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php
                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'change_passowrd');
                echo form_open('auth/change_password', $attributes);
                ?>        
                <div class="form-group">
                    <label class="control-label" for="FromDate">Old Password</label>                
                    <input type="password" name="old_password" class="form-control" id="dtStartDate" value="" />                
                </div>
                <div class="form-group">
                    <label class="control-label" for="ToDate">New Password</label>                
                    <input type="password" name="new_password" class="form-control" id="new_password" value="" />               
                </div>
                <div class="form-group">
                    <label class="control-label" for="ToDate">Re-Type New Password</label>                
                    <input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password" value="" />                
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>        
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
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