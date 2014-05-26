<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>STUDIO NEAR</title>
    <link href="<?php echo base_url(); ?>public/home/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/home/css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/home/css/search.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/home/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/home/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/home/css/supersized.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/jquery.validate.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/supersized.3.2.7.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript">

        $(document).ready(function(e) {

            var obj = $("#mybg");

            var scr_height = $(window).height();

            $(obj).css({height: scr_height});

        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.supersized({
                slide_interval: 6000, // Length between transitions
                transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition_speed: 700, // Speed of transition
                // Components                           
                slide_links: false, // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                slides: [// Slideshow Images
                    {image: '<?php echo base_url(); ?>public/home/img/frontpage1.jpg'},
                    {image: '<?php echo base_url(); ?>public/home/img/frontpage2.jpg'},
                ]

            });



        });




    </script>

    <style type="text/css">
        #myLogin .modal-dialog

        {

            width: 200px;/* your width */

        }



    </style>



    <style type="text/css">

        #myRegister.modal-dialog

        {

            width: 200px;/* your width */

        }



    </style>

    <script language="javascript" type="text/javascript">
        <!--
    function popitup() {
            var url = "<?php echo site_url('Terms_and_services'); ?>";
            newwindow = window.open(url, 'name', 'height=200,width=500');
            if (window.focus) {
                newwindow.focus()
            }
            return false;
        }

        // -->
    </script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#frmLogin").validate({
                rules: {
                    login: {
                        required: true,
                        email: true
                    },
                    password: "required"
                },
                messages: {
                    login: {
                        required: "Please enter your email address",
                        email: "please enter valid email"
                    },
                    password: "Please enter your password"
                }
            });
        });
    </script>

</head>

<body>
    <!-- Modal login -->

    <div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myLoginLabel" aria-hidden="true">

        <div class="modal-dialog" style="width: 350px">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <b><h3 class="modal-title" id="myLoginLabel">Login to your account</h3></b>

                </div>

                <div class="modal-body">

                    <?php
                    $attributes = array('id' => 'frmLogin', 'name' => 'form_login', 'style' => 'height:auto');

                    echo form_open('auth/login', $attributes);
                    ?>

                    <div class="form-group">

                        <label for="login">Email address</label>

                        <input type="text" class="form-control" name="login" id="login"  placeholder="Type Email" />

                    </div>

                    <div class="form-group">

                        <label for="password">Password</label>

                        <input type="password" class="form-control" name="password" id="password" placeholder="Type Password" />

                    </div>

                    <div class="checkbox">

                        <label>

                            <input type="checkbox" name="remember" id="remember" value="1"> Remember me

                        </label>

                    </div>



                    <button type="submit" name="submit" id="loginSubmit" class="btn btn-primary btn-lg btn-block">Sign In</button>



                </div>

                <?php echo form_close(); ?>

                <div class="modal-footer">

                    <p><h4><b>Forgot Password?</b></h4></p>

                    <?php $URL = "welcome/forget_password"; ?>

                    <p><a  href="<?php echo site_url("$URL"); ?>" > Click Here </a> <i> to retrive your password.</i></p>

                </div>

            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

    </div>
    <!-- /.modal -->



    <!-- Modal Join / Register -->

    <div class="modal fade" id="regConfirm" tabindex="-1" role="dialog" aria-labelledby="myLoginLabel" aria-hidden="true">

        <div class="modal-dialog" style="width: 350px">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title" id="myLoginLabel">Sign-Up</h4>

                </div>

                <div class="modal-body">

                    <p style="font-size:14px; color:#0C3;">Hello and welcome to STUDIO NEAR! Already have an account?<a href="<?php echo base_url(); ?>welcome/loginUnregistered" style="outline:none"> Sign In</a></p>

                    <?php
                    //$attributes = array('id' => 'regConfirm', 'name' => 'regConfirm', 'style' => 'height:auto');
                    //echo form_open('auth/register', $attributes);

                    $attributes = array('id' => 'frmRegConfirm');

                    echo form_open('welcome/step1', $attributes);
                    ?>

                    <div class="form-group">

                        <p>

                            <input name="regType" id="regType" type="radio" value="student" />

                            <span style="font-size:12px; color:#06C">Registration as a student</span>

                        </p>

                        <p>

                            <input name="regType" id="regType" type="radio" value="teacher" />

                            <span style="font-size:12px; color:#06C">Registration as a Teacher</span>

                        </p>

                    </div>
                    <button type="submit" name="regConfirm" id="regConfirm" class="btn btn-primary btn-lg btn-block">Sign In</button>
                </div>

                <?php echo form_close(); ?>

                <div class="modal-footer">

                    <p><h3></h3></p>

                </div>

            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

    </div>
    <!-- /.modal -->
    <div class="wrapper fix">

        <div class="header fix" style="z-index:99">

            <div class="header_logo fix">

                <p><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/home/img/logo.png"></a></p>

            </div>



            <div class="header_menu nav fix">

                <ul>

                    <li><a href="<?php echo base_url(); ?>">HOME</a></li>

                    <li><a href="<?php echo base_url(); ?>welcome/help" >HOW IT WORKS</a></li>

                    <li><a href="<?php echo base_url() . "welcome/get_search_data"; ?>">CLASSES</a></li>

                </ul>

            </div>

            <div id="header_right" style="padding-left:63%; padding-right:2%; margin-top:1%" >

                <div style="border:none; margin" class='pull-left'>

                    <?php echo form_open('welcome/get_search_data'); ?>							

                    <input type="search" name ="keyword" placeholder="Search Instructors/Classes" style = "color:white; padding-left:38px; padding-top: 5px; margin-right:15px;" class="search span12" placeholder="" />

                    <input type="hidden" name="min_range" value="10" />

                    <input type="hidden" name="max_range" value="2000" />

                    <input type="hidden" name="category" value="Any" />

                    <input type="hidden" name="subcategory" value="Any" />

                    <input type="hidden" name="experience" value="0 and 100" />

                    <input type="hidden" name="ListingOption" value="Instructor" />

                    <?php echo form_close(); ?>  

                </div>

                <div class="nav-no-collapse header-nav pull-right">



                    <ul class="pull-right" style="list-style:none">



                        <?php
                        $role = '';

                        $picture = '';

                        $username = '';

                        $URL = '';

                        $data_pic = $this->db->query('SELECT p.Picture, u.username, u.role FROM tbl_profile as p INNER JOIN users as u ON p.UserID = u.email where UserID ="' . $this->tank_auth->get_user_email() . '"');

                        foreach ($data_pic->result() as $i) {   // To get picture
                            $picture = $i->Picture;

                            $username = $i->username;

                            $role = $i->role;
                        }

                        if ($this->tank_auth->is_logged_in()) {



                            if ($role == "teacher")
                                $URL = 'dashboard/teachers_dashboard';

                            elseif ($role == "student")
                                $URL = 'dashboard/students_dashboard';
                            ?>

                            <li class="dropdown">

                                <a class="btn account dropdown-toggle" data-toggle="dropdown" href="<?php site_url($URL) ?>">

                                    <?php if ($picture != NULL) { ?>

                                        <div class="avatar"><img src="<?php echo base_url() . 'public/dashboard/upl/' . $picture; ?>" alt="My Picture" /></div>

                                    <?php } else { ?>

                                        <div class="avatar"><img src="<?php echo base_url() . 'public/dashboard/upl/teacher.jpg' ?>" alt="My Picture" /></div>

                                    <?php } ?>

                                    <div class="user">



                                        <span class="hello"><?php echo $username; ?></span>

                                    </div>

                                </a>

                                <ul class="dropdown-menu">

                                    <li class="dropdown-menu-title">
                                        <?php
                                        $email = $this->tank_auth->get_user_email();

                                        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";

                                        $transaction = $this->db->query($SQLComm);

                                        foreach ($transaction->result() as $trans) {

                                            $var_role = $trans->role;
                                        }
                                        if ($var_role == 'teacher') {
                                            $dashboard_link = 'dashboard/teachers_dashboard';
                                        }
                                        if ($var_role == 'student') {
                                            $dashboard_link = 'dashboard/students_dashboard';
                                        }
                                        ?>
                                    <li><a href="<?php echo base_url($dashboard_link); ?>"><i class="icon-off"></i>Dashboard</a></li>

                            </li>

                            <li>

                                <a href="<?php echo site_url($role . '/edit_password'); ?>">

                                    <i class="icon-key"></i>Change Password</a>

                            </li>

                            <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-off"></i> Logout</a></li>

                        </ul>

                        </li>

                        </ul>

                    <?php } else { ?>



                        <li  style="display:inline"><a id="login" class="btn btn-info"  data-toggle="modal" data-target="#myLogin" >LOGIN</a></li>

                        <li style="display:inline"><a id="frmRegConfirm" class="btn btn-info" data-toggle="modal" data-target="#regConfirm" >JOIN</a></li>

                        </ul>

                    <?php } ?>



                </div>

            </div>

        </div>





        <?php echo $this->load->view($content); ?>



        <div class="footer fix">

            <div class="row footer_top fix">

                <!--<div class="our_address fix">

                        <h2>Our Address</h2>

                        <ul>

                                 <li>629 J St. #207,</li>

                                 <li>San Diego, CA, 92101 </li>

                        </ul>

                </div> -->

                <div class="get_involved fix">

                    <h2>Contact Us</h2>

                    <ul>

                        <li><a href="" data-toggle="modal" data-target="#contactus">help@studionear.com</a></li>

                    </ul>

                </div>



                <div class="get_involved fix">

                    <h2>Learn More ...</h2>

                    <ul>

                        <li><a href="" data-toggle="modal" data-target="#learnTo">Learn More</a></li>

                        <li><a href="<?php echo base_url(); ?>welcome/help">How It Works</a></li>

                        <li><a href="" data-toggle="modal" data-target="#aboutUs">About Us</a></li>

                    </ul>

                </div>

                <div class="get_involved fix">

                    <h2>Get Started</h2>

                    <ul>

                        <li><a href="" data-toggle="modal" data-target="#myLogin" >Login</a></li>

                        <li><a href="" data-toggle="modal" data-target="#regConfirm">Join</a></li>

                    </ul>

                </div>

                <div class="stay_updated fix">

                    <h2>Stay Updated</h2>

                    <input type="text" value="Stay Updated" name="domainname" class="text">

                </div>

            </div>

            <div class="row footer_bottom fix">

                <div class="footer_bottom_menu fix">

                    <ul>

                        <li><a href="<?php echo base_url(); ?>">Home</a></li>

                        <li><a href="" data-toggle="modal" data-target="#aboutUs">About Us</a></li>

                        <li><a href="">News</a></li>

                        <li><a href="<?php echo base_url(); ?>welcome/help">FAQs</a></li>

                        <li><a href="" onclick="return popitup()">Site Terms</a></li>

                        <li><a href="" data-toggle="modal" data-target="#contactus">Contact Us</a></li>

                    </ul>

                </div>

                <div class="author fix pull-right" style="padding-right:30px">



                    <span style="text-align:left;float:left; color: black" >&copy; 2013-2014 <a href="http://www.studionear.com" alt="STUDIO NEAR">STUDIO NEAR</a></span>

                    <span class="hidden-phone" style="text-align:left;float:left; padding-left:10px; color: black">Powered by: <a href="http://r-cis.com" alt="Recursion">Recursion</a></span>



                </div>

                <div class="footer_bottom_social_icon fix">

                    <ul>

                        <li><a href="https://www.facebook.com/recursioncom"><img src="<?php echo base_url(); ?>public/home/img/facebook.png"></a> </li> 

                        <li><a href="http://twitter.com"><img src="<?php echo base_url(); ?>public/home/img/twitter.png"></a> </li>

                        <li><a href="https://plus.google.com/‎"><img src="<?php echo base_url(); ?>public/home/img/google_plus.png"></a> </li>

                        <li><a href="https://www.youtube.com/"><img src="<?php echo base_url(); ?>public/home/img/youtube.png"> </a> </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- Modal Contact Us  -->

    <div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="myLoginLabel" aria-hidden="true">

        <div class="modal-dialog" style="width: 350px">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title" id="myLoginLabel">Contact Us</h4>

                </div>

                <div class="modal-body">
                    <?php
                    $attributes = array('id' => 'frmRegConfirm');
                    echo form_open('welcome/contact_us', $attributes);
                    ?>
                    Email : <br />
                    <input type="text" class="form-control" name="email_contact" id="contac_subject" />
                    <br />
                    Subject : <br />
                    <input type="text" class="form-control" name="subject_contact" id="contac_subject" />
                    <br />


                    <div class="form-group">
                        Description :
                        <p>
                            <textarea class="form-control" rows="3" name="description_contact"></textarea>
                        </p>
                    </div>
                    <button type="submit" name="regConfirm" id="regConfirm" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>

                <?php echo form_close(); ?>

                <div class="modal-footer">

                    <p><h3></h3></p>

                </div>

            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->

    <!-- About Us Modal -->
    <div class="modal fade" id="aboutUs" tabindex="-1" role="modal" aria-labelledby="aboutUsLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h1 class="modal-title" id="learnToLabel">About Us</h1>

                </div>

                <div class="modal-body">

                    <p style="font-size : 20px">Living in a city like Portland, Oregon we are blessed with access to a wide variety of educational opportunities in the world of arts.  From dance, to music, to yoga, and so on. . .you name it, we have it.  But we found ourselves thinking about those less fortunate than ourselves, those who don’t have a dance studio on every corner.  We decided to spread our love of the arts by creating a live, online studio space where anyone who has a computer can share their talents or learn something new.

                        We envision a world where teachers and students of the arts community can connect, share and learn.



                    </p>

                </div>



            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->


    <!--Learn To -->
    <div class="modal fade" id="learnTo" tabindex="-1" role="modal" aria-labelledby="learnToLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h1 class="modal-title" id="learnToLabel">Learn To</h1>

                </div>

                <div class="modal-body">

                    <p style="font-size : 20px">dance the tango or any other art form for that matter.  All you have to do is search available classes or instructors, sign up for a lesson, and enter “the studio”. 



                    </p>

                </div>



            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->

    <?php if ($this->session->flashdata('msg')) { ?>
        <script>
            $('#system').modal('show');
        </script>
    <?php } ?>

    <!--System -->
    <div class="modal fade" id="system" tabindex="-1" role="modal" aria-labelledby="learnToLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h1 class="modal-title" id="learnToLabel">System generated alert</h1>

                </div>

                <div class="modal-body">

                    <p style="font-size : 20px">			
                        <?php echo $this->session->flashdata('msg'); ?>
                    </p>

                </div
            ></div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->




</body>

</html>

