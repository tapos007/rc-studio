<script type="text/javascript">
    $(document).ready(function(e) {
        var obj = $("#mybg");
        var scr_height = $(window).height() - 360;
        $(obj).css({height: scr_height});
    });
    ;
</script>
<div class="row" style="color: white;">
    <div class="col-lg-12" style="margin-top:50px; margin-bottom: 40px;">
        <?php
        $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'step3');
        echo form_open_multipart('welcome/save_profile', $attributes);
        ?>
        <div class="form-group">
            <label for="inputFristName" class="col-sm-2 control-label">Add Picture</label>
            <div class="col-sm-10">
                <img id="showImg" src="<?php echo base_url() . 'assets/img/user.png'; ?>" alt="your image" width="150" height="150" style=""  />
            </div>
        </div>
        <div class="form-group">
            <label for="picture" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <input  id="picture" type="file" name="picture" />
            </div>
        </div>
        <div class="checkbox">

            <label for="termNCcondition" class="col-sm-9 col-sm-offset-2 control-label ">
                <input  id="termNCcondition" type="checkbox" name="termNCcondition" />
                <p class="text-left">
                    BETA-USERS.  Studio takes no responsibility for any losses, claims, injuries, expenses, or any other cost related to your use of the service as a Beta-User.  If you are a Beta User, you acknowledge that the Product and/or Services are not ready to go live and will inevitably likely be susceptible to a wide-range of issues which could harm you and/or your hardware and software.  BETA USERS ASSUME ALL RISKS ASSOCIATED WITH THE USE AND OPERATION OF PRODUCT AND SERVICES DURING ALL BETA PHASES.  
                </p>
            </label>



        </div>
        <br />
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="next" value="Register" class="btn btn-success center-block" />
            </div>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>
<script>
    $(document).ready(function() {

        $("#step3").validate({
            rules: {
                termNCcondition: "required"
            },
            messages: {
                termNCcondition: "Please accept our TERMS OF USE AND PRICACY POLICY as BETA USER"
            }
        });
    });</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#picture").change(function() {
        readURL(this);
        $('#showImg').show();
    });
</script>
