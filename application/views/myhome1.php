<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Title of the document</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link href="<?php echo base_url(); ?>assets/css/mycsspage.css" rel="stylesheet" type="text/css"/>
        <!-- Optional theme -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <style>
            body{
                background-color:#111111;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/supersized.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supersized.shutter.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/supersized.3.2.7.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/supersized.shutter.min.js"></script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51168131-1', 'studionear.com');
  ga('send', 'pageview');

</script>
		<script type="text/javascript">
            jQuery(function($) {
                $.supersized({
                    // Functionality
                    slideshow: 1, // Slideshow on/off
                    autoplay: 1, // Slideshow starts playing automatically
                    start_slide: 1, // Start slide (0 is random)
                    stop_loop: 0, // Pauses slideshow on last slide
                    random: 0, // Randomize slide order (Ignores start slide)
                    slide_interval: 3000, // Length between transitions
                    transition: 6, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                    transition_speed: 1000, // Speed of transition
                    new_window: 1, // Image links open in new window/tab
                    pause_hover: 0, // Pause slideshow on hover
                    keyboard_nav: 1, // Keyboard navigation on/off
                    performance: 1, // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                    image_protect: 1, // Disables image dragging and right click with Javascript
                    // Size & Position						   
                    min_width: 0, // Min width allowed (in pixels)
                    min_height: 0, // Min height allowed (in pixels)
                    vertical_center: 1, // Vertically center background
                    horizontal_center: 1, // Horizontally center background
                    fit_always: 0, // Image will never exceed browser width or height (Ignores min. dimensions)
                    fit_portrait: 1, // Portrait images will not exceed browser height
                    fit_landscape: 0, // Landscape images will not exceed browser width
                    // Components							
                    slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                    thumb_links: 1, // Individual thumb links for each slide
                    thumbnail_navigation: 0, // Thumbnail navigation
                    slides: [// Slideshow Images
                        {image: '<?php echo base_url(); ?>public/home/img/frontpage1.jpg'},
                        {image: '<?php echo base_url(); ?>public/home/img/frontpage2.jpg'}
                    ],
                    // Theme Options			   
                    progress_bar: 1, // Timer for each slide							
                    mouse_scrub: 0
                });
            });
        </script>
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
    </head>
    <body>
        <?php if ($this->session->flashdata('msg')) { ?>
            <script>
                $(document).ready(function() {
                    $('#system').modal('show');
                });

            </script>
        <?php } ?>

        <div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        $attributes = array('id' => 'frmRegConfirm');
                        echo form_open('welcome/contact_us', $attributes);
                        ?>
                        <div class="form-group">
                            <label for="email_contact">Email</label>
                            <input type="text" class="form-control" name="email_contact" id="contac_subject" />
                        </div>
                        <div class="form-group">
                            <label for="subject_contact">Subject</label>
                            <input type="text" class="form-control" name="subject_contact" id="contac_subject" />
                        </div>
                        <div class="form-group">
                            <label for="description_contact"> Description :</label>
                            <textarea class="form-control" rows="3" name="description_contact"></textarea>
                        </div>

                        <button type="submit" name="regConfirm" id="regConfirm" class="btn btn-primary btn-lg btn-block">Submit</button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="aboutUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">System generated alert</h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-size : 20px">Living in a city like Portland, Oregon we are blessed with access to a wide variety of educational opportunities in the world of arts.  From dance, to music, to yoga, and so on. . .you name it, we have it.  But we found ourselves thinking about those less fortunate than ourselves, those who don’t have a dance studio on every corner.  We decided to spread our love of the arts by creating a live, online studio space where anyone who has a computer can share their talents or learn something new.

                            We envision a world where teachers and students of the arts community can connect, share and learn.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>   
        <div class="modal fade" id="saveYoutArt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">System generated alert</h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-size : 20px">Living in a city like Portland, Oregon we are blessed with access to a wide variety of educational opportunities in the world of arts.  From dance, to music, to yoga, and so on. . .you name it, we have it.  But we found ourselves thinking about those less fortunate than ourselves, those who don’t have a dance studio on every corner.  We decided to spread our love of the arts by creating a live, online studio space where anyone who has a computer can share their talents or learn something new.

                            We envision a world where teachers and students of the arts community can connect, share and learn.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="system" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">System generated alert</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 350px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Login to your account</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        $attributes = array('id' => 'form_login', 'name' => 'form_login', 'style' => 'height:auto');

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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p><h4><b>Forgot Password?</b></h4></p>


                        <p><a  href="<?php echo base_url(); ?>welcome/forget_password" > Click Here </a> <i> to retrive your password.</i></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-sm" id="regModel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 350px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Sign-Up</h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-size:14px; color:#0C3;">Hello and welcome to STUDIO NEAR! Already have an account?<a href="<?php echo base_url(); ?>welcome/loginUnregistered" style="outline:none"> Sign In</a></p>

                        <?php
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
                            <button type="submit" name="regConfirm" id="regConfirm" class="btn btn-primary btn-lg btn-block">Sign In</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <p><h4><b>Forgot Password?</b></h4></p>
                            <p><a  href="<?php echo base_url(); ?>welcome/forget_password" > Click Here </a> <i> to retrive your password.</i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"  href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/img/Studio-Near3.png"/></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left header_menu">
                        <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                        <li><a href="<?php echo base_url(); ?>welcome/help" >HOW IT WORKS</a></li>
                        <li><a href="<?php echo base_url(); ?>welcome/get_search_data">CLASSES</a></li>
                    </ul>
                    <?php
                    $attributes = array('class' => 'navbar-form navbar-left search', 'role' => 'search');
                    echo form_open('welcome/get_search_data', $attributes);
                    ?>	

                    <div class="form-group">
                        <input type="text" name ="keyword" class="form-control" placeholder="Search instructor/Classes" style="width: 200px !important;">
                    </div>
                    <input type="hidden" name="min_range" value="10" />
                    <input type="hidden" name="max_range" value="2000" />
                    <input type="hidden" name="category" value="Any" />
                    <input type="hidden" name="subcategory" value="Any" />
                    <input type="hidden" name="experience" value="0 and 100" />
                    <input type="hidden" name="ListingOption" value="Instructor" />
                    <?php echo form_close(); ?>
                    <ul class="nav navbar-nav navbar-right">

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
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"> 
                                    <?php if ($picture != NULL) { ?>

                                        <span class="avatar"><img src="<?php echo base_url() . 'public/dashboard/upl/' . $picture; ?>"  alt="My Picture" /></span>
                                    <?php } else { ?>
                                        <span class="avatar"><img src="<?php echo base_url() . 'public/dashboard/upl/teacher.jpg' ?>" alt="My Picture" /></span>
                                    <?php } ?>
                                    <span class="hello"><?php echo $username; ?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <div class="log-arrow-up"></div>
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
                    <?php } else { ?>
                        <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#regModel">Join</a></li>

                    <?php } ?>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <?php
            if (isset($content)) {
                $this->load->view($content);
            }
            ?>
            <div class="row">
                <div class="col-lg-4 artical_box">
                    <div class="top_box fix">
                        <h2>ABOUT US</h2>
                    </div>
                    <div class="bottom_box fix">
                        <p>Living in a city like Portland, Oregon we are blessed with access to a wide variety of educational opportunities in the world of arts.  From dance, to ...
                        </p>
                        <center>
                            <strong><button class="btn btn-primary" data-toggle="modal" data-target="#aboutUs">Large modal</button></strong>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#aboutUs">
                                Learn More
                            </button>
                        </center>
                    </div>
                </div>
                <div class="col-lg-4 artical_box">
                    <div class="top_box"><h2>SHARE YOUR ART</h2></div>
                    <div class="bottom_box fix">
                        <p>For those artistic experts who want to share what they know. List your classes, decide on a fee, and start teaching students around the country. We keep a ... 
                        </p>
                        <center>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#saveYoutArt">
                                Learn More
                            </button>
                        </center>
                    </div>
                </div>
                <div class="col-lg-4 artical_box">
                    <div class="top_box fix"><h2>LEARN TO</h2></div>
                    <div class="bottom_box fix">
                        <p>dance the tango or any other art form for that matter.  All you have to do is search available classes or instructors, sign up for a lesson, and enter “the ...
                        </p>
                        <center>
                            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#learnTo">
                                Learn More
                            </button>
                        </center>				
                    </div>
                </div>
            </div>
        </div>
        <div class="footer row">
            <div class="container">
                <div class="col-lg-3">
                    <div class="get_involved fix">
                        <h2>Contact Us</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="" data-toggle="modal" data-target="#contactus">help@studionear.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="get_involved fix">
                        <h2>Learn More ...</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="" data-toggle="modal" data-target="#learnTo">Learn More</a></li>
                            <li><a href="<?php echo base_url(); ?>welcome/help">How It Works</a></li>
                            <li><a href="" data-toggle="modal" data-target="#aboutUs">About Us</a></li>
                        </ul>
                    </div>
                </div>    
                <div class="col-lg-3">
                    <div class="get_involved fix">
                        <h2>Get Started</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="" data-toggle="modal" data-target="#myLogin" >Login</a></li>
                            <li><a href="" data-toggle="modal" data-target="#regConfirm">Join</a></li>
                        </ul>
                    </div>
                </div>    
                <div class="col-lg-3">
                    <div class="stay_updated fix">
                        <h2>Stay Updated</h2>
                        <input type="text"  value="Stay Updated" name="domainname" class="form-control">
                    </div>
                    <div>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/recursioncom"><img src="http://localhost/studionear/public/home/img/facebook.png"></a> </li> 
                            <li><a href="http://twitter.com"><img src="http://localhost/studionear/public/home/img/twitter.png"></a> </li>
                            <li><a href="https://plus.google.com/‎"><img src="http://localhost/studionear/public/home/img/google_plus.png"></a> </li>
                            <li><a href="https://www.youtube.com/"><img src="http://localhost/studionear/public/home/img/youtube.png"> </a> </li>
                        </ul>
                    </div>
                </div>  
            </div>

        </div>
        <div class="row fullfooter">
            <div class="col-lg-8 footer_bottom_menu fix">
                <ul class="list-inline">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="" data-toggle="modal" data-target="#aboutUs">About Us</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="<?php echo base_url(); ?>welcome/help">FAQs</a></li>
                    <li><a href="" onclick="return popitup()">Site Terms</a></li>
                    <li><a href="" data-toggle="modal" data-target="#contactus">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-4 author fix pull-right" style="padding-right:30px">
                <span style="text-align:left;float:left; color: black" >&copy; 2013-2014 <a href="http://www.studionear.com" alt="STUDIO NEAR">STUDIO NEAR</a></span>
                <span class="hidden-phone" style="text-align:left;float:left; padding-left:10px; color: black">Powered by: <a href="http://r-cis.com" alt="Recursion">Recursion</a></span>
            </div>
            <div class="row" style="color:#fff;">“日本語: Studio Booth at Studio 3" by JacoTen (Own Work) is licensed under CC BY 3.0 , via Wikimedia Commons, desaturated from original.  The licensor does not necessarily endorse StudioNear or its use of the work. </div>    
        </div>
    </div>
    <script language="javascript" type="text/javascript">

        function popitup() {
            var url = "<?php echo site_url('Terms_and_services'); ?>";
            newwindow = window.open(url, 'name', 'height=200,width=500');
            if (window.focus) {
                newwindow.focus()
            }
            return false;
        }


    </script>
</body>
</html>