<?php
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'maxlength' => 8,
);
?>
<link href="<?php echo base_url(); ?>assets/css/datepicker33.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker33.js" type="text/javascript"></script>
<script>

    function GetAgeDiff(ev) {
        var newDate = new Date(ev);
        var current = new Date();
        $('#check_dob').html('');
        var day = 1000 * 60 * 60 * 24

        var age = current - newDate;
        if (Math.round(age / day / 365.25) < 18)
            //var x = confirm("You are not 18 years old. You need to have your parents with you to register.");
            $('#check_dob').html('You are not 18 years old. You need to have your parents with you to register. ').css('color', 'yellow');
        //alert('x');
    }


    $(document).ready(function() {

        $('#inputDoB').datepicker();
        $("#step1").validate({
            rules: {
                inputFristName: "required",
                inputLastName: "required",
                inputDoB: "required",
                inputEmail: {
                    required: true,
                    email: true,
                    remote:
                            {
                                url: '<?php echo base_url(); ?>welcome/email_available',
                                type: "post",
                                data:
                                        {
                                            email: function()
                                            {
                                                return $('#step1 :input[name="inputEmail"]').val();
                                            }
                                        }
                            }

                },
                inputpassword: {
                    required: true,
                    minlength: 5
                },
                inputrepassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#inputpassword"
                }
            },
            messages: {
                inputFristName: "Please enter your firstname",
                inputLastName: "Please enter your lastname",
                inputDoB: "Please enter your Date Of Birth",
                inputEmail: {
                    required: "Please enter a valid email address",
                    remote: "Sorry this email is already taken. Please try with another new email."
                },
                inputpassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                inputrepassword: {
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

                        .text('OK!').addClass('valid')

                        .closest('.control-group').removeClass('error').addClass('success');
            }
        });
    });</script>

<div class="row" style="color: white;">
    <div class="col-lg-12" style="margin-top:50px; margin-bottom: 40px;">

        <?php
        $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'step1');

        echo form_open('welcome/step1_validate', $attributes);
        ?>
        <div class="form-group">
            <label for="inputFristName" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" name="inputFristName" id="inputFristName" class="form-control" value="<?php echo set_value('inputFristName'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" name="inputLastName" id="inputLastName" class="form-control" value="<?php echo set_value('inputLastName'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputDoB" class="col-sm-2 control-label">Birth date</label>
            <div class="col-sm-10">
                <input type="text"  name="inputDoB" id="inputDoB" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years"  class="form-control datepicker" value="<?php echo set_value('inputDoB'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="inputEmail" id="inputEmail"  class="form-control" value="<?php echo set_value('inputEmail'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="inputpassword" id="inputpassword" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputrepassword" class="col-sm-2 control-label">Verify password</label>
            <div class="col-sm-10">
                <input type="password" name="inputrepassword" id="inputrepassword" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="inputVerifyPassword11" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <?php echo $captcha_html; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputVerifyPassword3232" class="col-sm-2 control-label">Enter the code exactly as it appears:</label>
            <div class="col-sm-10">
                <input type="text" name="captcha" id="captcha" class="form-control">
            </div>
        </div>
        <br />
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">

                <input type="submit" class="btn btn-success" name="submit" value="Next >>>" >
            </div>
        </div>
        </form>
    </div>
</div>
