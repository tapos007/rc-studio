<style>
    input[type=text] {
        color: #000 !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
            $(document).ready(function() {
    $.validator.addMethod("zipcode", function(value, element) {
    return this.optional(element) || /^\d{5}(?:-\d{4})?$/.test(value);
    }, "Please provide a valid zipcode.");
            $.validator.addMethod("phoneUS", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
                    return this.optional(element) || phone_number.length > 9 &&
                    phone_number.match(/^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");
			
			//$( "#title" ).rules( "remove" );
            
             $("#my_profile").validate({
             rules: {
             cardProfile: "required",
             title: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             frist_name: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             last_name: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             address: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             city: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             state: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             zip: { 
             required : function(element){
							return $("#cardProfile").val() == 'New';
						}, 
             zipcode: true
             },
             telephone: { 
             required : function(element){
							return $("#cardProfile").val() == 'New';
						}, 
             phoneUS: true
             },
             
             email: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             
             card_type: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             card_no:{
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             cvv: {
				 		required : function(element){
							return $("#cardProfile").val() == 'New';
						}
			 		},
             paypal_check : "required",
             beta_check : "required"
             
             
             },
             messages: {
             cardProfile : "Require field",
             title: "Require field",
             frist_name: "Require field",
             last_name: "Require field",
             address: "Require field",
             city: "Require field",
             state: "Require field",
             zip: { 
             required: "Require field" ,
             zipcode: "Invalid zip code"
             },
             telephone: { 
             required: "Require field" ,
             phoneUS: "Invalid phone number"
             },
             
             email: "Require field",
             
             card_type: "Require field",
             card_no: "Require field",
             cvv: "Require field",
             paypal_check: "You must agree with our Payment Policy",
             beta_check: "You must agree with our BETA Terms and Conditions"
             
             },
             
             highlight: function(element) {
             $(element).closest('.form-group').addClass('has-error');
             },
             unhighlight: function(element) {
             $(element).closest('.form-group').removeClass('has-error');
             },
             errorElement: 'span',
             errorClass: 'help-block',
             errorPlacement: function(error, element) {
             if(element.parent('.input-group').length) {
             error.insertAfter(element.parent());
             } else {
             error.insertAfter(element);
             }
             }
             
             });
             
            

    });</script>
<script>
            $(function(){
            $('#creditCard').change(function () {
            if ($('input#creditCard').is(':checked')) {
            $("input#payPal").prop('checked', false);
                    $("#cardMenu").removeClass('hide');
                    $('#card_info').removeClass('hide');
                    $("#paypal_submit").addClass('hide');
                    $('#submit').removeClass('hide');
            } else{
            $("#card_info").addClass('hide');
            }
            });
                    $('#payPal').change(function () {
            if ($('input#payPal').is(':checked')) {
            $("#card_info").removeClass('hide');
                    $("#cardMenu").addClass('hide');
                    $("input#creditCard").prop('checked', false);
                    $("#submit").addClass('hide');
                    $("#new_profile").addClass('hide');
                    $('#paypal_submit').removeClass('hide');
            } else {
            $("#card_info").addClass('hide');
                    $("#cardMenu").removeClass('hide');
            }
            });
                    $('#cardProfile').change(function () {
            var check = $('#cardProfile').val();
                    if (check == 'New') {

            $('#new_profile').removeClass('hide');
            } else{
            $("#new_profile").addClass('hide');
            }
            });
            });</script>


<?php
$this->lang->load('tank_auth');

$email = $this->tank_auth->get_user_email();
?>
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
<?php if ($this->session->flashdata('msg')) { ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Warning ! </strong><?php echo $this->session->flashdata('msg'); ?> </div>
<?php } ?>

<!-- Course History and Feedback -->
<?php
echo validation_errors();
?>
<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Payment Information</h2>
            <div class="box-icon"> <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a> </div>
        </div>
        <div class="box-content">
            <div class="row" style="padding-left:20px;">
                <input type="checkbox" name="creditCard" id="creditCard" value="creditCard" />
                Credit Card
                <input type="checkbox" name="payPal" id="payPal" value="payPal" />
                Paypal </div>
            <div id="card_info" class="hide">
                <?php
                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'my_profile');
                echo form_open('student/save_payment_info', $attributes);
                ?>
                <div class="row" id="cardMenu">
                    <div class="form-group">
                        <label for="card_type" class="col-sm-4 control-label">Select or create a payment profile:</label>
                        <div class="col-sm-4">
                            <select name="cardProfile" id="cardProfile" class="form-control"  >
                                <option value="">--</option>
                                <option value="New">New</option>
                                <?php
                                $QueryRes = $this->db->query('SELECT distinct(`acct`), status FROM `tbl_paypal_transaction_detail` WHERE `student_id`="' . $this->tank_auth->get_user_email() . '"');
                                if ($QueryRes->num_rows() > 0) {
                                    foreach ($QueryRes->result() as $CardDetail) {
                                        if ($CardDetail->status) {
                                            echo '<option value="' . $CardDetail->acct . '">Card Ending ' . substr($CardDetail->acct, -4, 4) . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="new_profile" class="row hide">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="card_type" class="col-sm-4 control-label">Title</label>
                            <div class="col-sm-8">
                                <select name="title" id="title" class="form-control" >
                                    <option value="">--</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="frist_name" class="col-sm-4 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="frist_name" name="frist_name" placeholder="First name..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address ..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-4 control-label">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City ..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-sm-4 control-label">State/Province</label>
                            <div class="col-sm-8">
                                <select id="state" name="state" class="form-control" >
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip" class="col-sm-4 control-label">Zip</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-sm-4 control-label">Telephone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-sm-4 control-label">Country</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="country" name="country" value="USA" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="card_type" class="col-sm-4 control-label">Card Type</label>
                            <div class="col-sm-8">
                                <select name="card_type" id="card_type" class="form-control" >
                                    <option value="">Select Card Type</option>
                                    <option value="Visa">Visa</option>
                                    <option value="MasterCard">Master Card</option>
                                    <option value="Amex">American Express</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="card_no" class="col-sm-4 control-label">Card No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="card_no" name="card_no" placeholder="Card No..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exp_month" class="col-sm-4 control-label">Expairy Date</label>
                            <div class="col-sm-4">
                                <select name="exp_month" id="exp_month" class="form-control" >
                                    <option value="">--Month--</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="pull-left" style="margin:6px 0 0 -42px">--</div>
                            <div class="col-sm-4" style="margin-left:-36px">
                                <select name="exp_year" id="exp_year" class="form-control" >
                                    <option value="">--Year--</option>
                                    <?php
                                    $year = date("Y", now());
                                    for ($i = 0; $i <= 10; $i++) {
                                        $a = $year + 1;
                                        $year = $a;
                                        ?>
                                        <option value ="<?php echo $a; ?>" ><?php echo $a; ?></option>
<?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="cvv">Cvv</label>
                            <div class="col-sm-8">
                                <input type="text" name="cvv" id="cvv" class="form-control" placeholder="Cvv..">
                            </div>
                        </div>
                        <div class="checkbox">
                            <label class="col-sm-6 control-label" for="cvv">
                                <input type="checkbox" name="status" id="status" value="1" />Save card on file

                            </label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div  class="checkbox" style="padding:20px 60px">
                        <label  for="paypal_check" >
                            <input type="checkbox" name="paypal_check" id="paypal_check" class="checkbox"  />
                            I have fully read, understand, and agree to the Terms and Conditions and Privacy Policy.  By clicking on this box and submitting my credit card information, I hereby represent that I am either (1) the user of the service and at least 18 years of age, or (2) the parent or legal guardian of the user of the service, who is a minor, and consent to any and all charges incurred by my child while using this service. </label>
                    </div>

                    <div  class="checkbox" style="padding:20px 60px">
                        <label  for="beta_check" >
                            <input type="checkbox" name="beta_check" id="beta_check" class="checkbox"  />
                            Studio takes no responsibility for any losses, claims, injuries, expenses, or any other cost related to your use of the service as a Beta-User. If you are a Beta User, you acknowledge that the Product and/or Services are not ready to go live and will inevitably likely be susceptible to a wide-range of issues which could harm you and/or your hardware and software. BETA USERS ASSUME ALL RISKS ASSOCIATED WITH THE USE AND OPERATION OF PRODUCT AND SERVICES DURING ALL BETA PHASES. </label>
                    </div>
                    <div class="form-group pull-right">
                        
                        <div class="col-sm-8" style="float:left !important;"> 
                          <!--<input type="submit" name="submit" id="submit" class="from-control" placeholder="Cvv.." value="Submit"   /> -->
                            <button type="submit" name="submit" class="btn btn-success" id="submit">Checkout </button>
                            <!-- INFO: The post URL "checkout.php" is invoked when clicked on "Pay with PayPal" button.--> 
                        </div>
                        </form>
                        <form action='<?php echo base_url();?>student/payment_paypal' METHOD='POST'>
                        <input type="hidden" name="courseID" value="<?php echo $courseID; ?>" />
                        <input type="hidden" name="batchID" value="<?php echo $batchID; ?>" />
                        <button type='submit' name='paypal_submit' id='paypal_submit' > Pay with Paypal </button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        
    </div>
</div>
<!--/col--> 

<!-- Add Digital goods in-context experience. Ensure that this script is added before the closing of html body tag --> 

<script src='https://www.paypalobjects.com/js/external/dg.js' type='text/javascript'></script> 
<script>

                                        var dg = new PAYPAL.apps.DGFlow(
                                        {
                                        trigger: 'paypal_submit',
                                                expType: 'instant'
                                                //PayPal will decide the experience type for the buyer based on his/her 'Remember me on your computer' option.
                                        });

</script> 
