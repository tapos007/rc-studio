<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Please Log in</title>
        <meta name="description" content="SimpliQ - Flat & Responsive Bootstrap Admin Template.">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="SimpliQ, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/retina.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>latestMain/css/custom_style.css" type="text/css">
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/css/ie6-8.css"></script>
                
        <![endif]-->

        <!-- start: Favicon and Touch Icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <style>
            label.error{
                color: red;
                font-weight: bold;
            }
        </style>
        <!-- end: Favicon and Touch Icons -->	

    </head>

    <body>
        <div class="container">
            <div class="row">
                <?php if ($this->session->flashdata('msg')) { ?>
                    <div class="alert alert-success" style="text-align:center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>

                <?php } ?>
                <div class="row" >
                    <div class="col-lg-12" style="text-align: center;">
                        <a style="text-align: center; color:#fff; font-size:24px" href="<?php echo base_url(); ?>" >
                            <i class="fa fa-home"></i> Back to Studionear
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="row">Back to home</div>
                    <div class="login-box">
                        <h2>Login to your account</h2>
                        <?php
                        $att = array('class' => 'form-horizontal', 'id' => 'form_login');

                        echo form_open('auth/login', $att);
                        ?>
                        <fieldset>

                            <input class="input-large col-xs-12" name="login" id="login" type="text" placeholder="type username"/>

                            <input class="input-large col-xs-12"  name="password" id="password" type="password" placeholder="type password"/>

                            <div class="clearfix"></div>

                            <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

                            <div class="clearfix"></div>

                            <button type="submit" class="btn btn-primary col-xs-12">Login</button>
                        </fieldset>	

                        <?php echo form_close(); ?>
                        <hr>
                        <h3>Forgot Password?</h3>

                        <p>

                            No problem, <a href="<?php echo site_url('auth/forgot_password/'); ?>">click here</a> to get a new password.

                        </p>
                    </div>
                </div><!--/row-->

            </div><!--/row-->		

        </div><!--/container-->


        <!-- start: JavaScript-->
        <!--[if !IE]>-->

        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>

        <!--<![endif]-->

        <!--[if IE]>
        
                <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
        
        <![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js'>" + "<" + "/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>
        
                <script type="text/javascript">
                window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js'>"+"<"+"/script>");
                </script>
                
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>




        <!-- theme scripts -->
        <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {

                $("#form_login").validate({
                    rules: {
                        login: {
                            required: true,
                            email: true

                        },
                        password: "required"
                    },
                    messages: {
                        login: {
                            required: "Please enter a valid email address or user name",
                            email: "enter valid email"
                        },
                        password: "Please enter your passwords"
                    }
                });


            });

        </script>	
        <!-- end: JavaScript-->

    </body>
</html>