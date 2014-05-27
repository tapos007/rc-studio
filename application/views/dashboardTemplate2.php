<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Official Site of Studio Near www.studionear.com</title>
        <meta name="description" content="Studio Near" />
        <meta name="author" content="Mohammad Arif Hossain" />
        <meta name="keyword" content="Studio Near, Guitar, Piano" />
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
                <script src="assets/js/respond.min.js"></script>
                <script src="assets/css/ie6-8.css"></script>
        <![endif]-->
        <!-- start: Favicon and Touch Icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        
        <!-- end: Favicon and Touch Icons -->
        <!-- start: JavaScript-->
        <!--[if !IE]>-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
        <!--<![endif]-->
        <!--[if IE]>
                <script src="assets/js/jquery-1.11.0.min.js"></script>
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
        <!-- page scripts -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script><![endif]-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.stack.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.time.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.autosize.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.placeholder.min.js"></script>
        <!-- theme scripts -->

        <!-- inline scripts related to this page -->
        <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core.min.js"></script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51168131-1', 'studionear.com');
  ga('send', 'pageview');

</script>
        <!-- end: JavaScript-->
    </head>
    <body>
        <!-- Modal Start -->
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
        <div class="modal fade" id="howitWorks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title" id="myModalLabel">HOW IT WORKS</h3>
                    </div>
                    <div class="modal-body">
                        <p style="font-size : 20px">How it works??? How it works??? How it works??? How it works??? How it works??? How it works??? How it works??? 

                            Abhisek have not yet provided BETA content :)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="learnMore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title" id="myModalLabel">LEARN MORE... ... ...</h3>
                    </div>
                    <div class="modal-body">
                        <p style="font-size : 20px">Learn More... Learn More... Learn More... Learn More... Learn More... 

                            Abhisek have not yet provided BETA content :)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="betaText" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title" id="myModalLabel">BETA</h3>
                    </div>
                    <div class="modal-body">
                        <p style="font-size : 20px">Studio takes no responsibility for any losses, claims, injuries, expenses, or any other cost related to your use of the service as a Beta-User.  If you are a Beta User, you acknowledge that the Product and/or Services are not ready to go live and will inevitably likely be susceptible to a wide-range of issues which could harm you and/or your hardware and software.  BETA USERS ASSUME ALL RISKS ASSOCIATED WITH THE USE AND OPERATION OF PRODUCT AND SERVICES DURING ALL BETA PHASES.  
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="aboutUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title" id="myModalLabel">ABOUT US</h3>
                    </div>
                    <div class="modal-body">
                        <p style="font-size : 20px">Living in a city like Portland, Oregon we are blessed with access to a wide variety of educational opportunities in the world of arts.  From dance, to music, to yoga, and so on. . .you name it, we have it.  But we found ourselves thinking about those less fortunate than ourselves, those who don’t have a dance studio on every corner.  We decided to spread our love of the arts by creating a live, online studio space where anyone who has a computer can share their talents or learn something new.

                            We envision a world where teachers and students of the arts community can connect, share and learn.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="saveYoutArt" tabindex="-1" role="modal" aria-labelledby="saveYoutArtLabel" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h3 class="modal-title" id="myModalLabel">SHARE YOUR ART</h3>

                    </div>

                    <div class="modal-body">

                        <p style="font-size : 20px">For those artistic experts who want to share what they know.  List your classes, decide on a fee, and start teaching students around the country.  We keep a small percentage of your lesson fee and remit the rest to you. 

                            We request that you charge a minimum of $10 per individual per session in order to maintain feasibility.



                        </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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

                        <h3 class="modal-title" id="myModalLabel">LEARN TO</h3>

                    </div>

                    <div class="modal-body">

                        <p style="font-size : 20px">dance the tango or any other art form for that matter.  All you have to do is search available classes or instructors, sign up for a lesson, and enter “the studio”. 



                        </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>


                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->

        </div><!-- /.modal -->
        <div class="modal fade" id="ToR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">TERMS OF USE AND PRICACY POLICY</h4>
                    </div>
                    <div class="modal-body" style="overflow:scroll; height: 500px;">
                        <p align="center"><strong>TERMS OF SERVICE</strong></p>
                        <p><strong>STUDIO  NEAR, LLC </strong><br />
                            <strong>Last  Edit:  February 17, 2014</strong></p>
                        <p>&nbsp;</p>
                        <p>Studio Near, LLC (&ldquo;<strong>Studio</strong>&rdquo;, &ldquo;<strong>we</strong>&rdquo;, &ldquo;<strong>us</strong>&rdquo;, or &ldquo;<strong>our</strong>&rdquo;) owns and operates software  applications, websites and products located at <a href="http://www.studionear.com"><strong>www.studionear.com</strong></a><strong>, </strong>and mobile  applications associated with said software applications, websites, and products  (collectively, the &ldquo;<strong>Product</strong>&rdquo;).  We hereby offer a revocable license to use  Product in a manner consistent with any and all applicable state, federal,  and/or international laws, and in the manner prescribed herein  and elsewhere within Product; specifically,  but not limited to, a license to use online services and any mobile  applications associated therewith, which provide instructors and students  (collectively, the &ldquo;<strong>Users</strong>&rdquo;) with  access to communicate with each other via a two-way webcam where people with  skills, the instructors, may teach those seeking to learn a skill, the students  (collectively, all of this shall be referred to as the &ldquo;<strong>Services</strong>&rdquo;).  </p>
                        <p>PLEASE READ THESE TERMS OF SERVICE  CAREFULLY.  BY ACCESSING THE PRODUCT OR  USING THE SERVICES YOU AGREE TO BE BOUND BY THESE TERMS OF SERVICE.  IF YOU DO NOT WISH TO BE BOUND BY THESE TERMS  OF SERVICE YOU MAY NOT ACCESS OR USE THIS PRODUCT OR THE SERVICES.  </p>
                        <p>We may at our sole discretion modify,  add or delete portions of these Terms of Service at any time.  It is your responsibility to review these  Terms of Service for changes prior to use of the Product and Services.  Your use of the Product or Services following  posting of changes to these Terms of Service constitutes your acceptance of any  modifications.  We will notify you of any  such material changes by posting notice of the changes on the Product.  </p>
                        <p>By using our Product, you represent  that you are at least 18 years of age.&nbsp; If we find a User to be under 18  years old, we will take reasonable measures to remove that User's personal  information from our database, and if necessary, ban such User&rsquo;s IP address  from access to the Product and Services.&nbsp; If you are not 18 years of age  and would like to use the Service, you MUST have the consent from your parent  or legal guardian.  The consenting adult  must be present at the beginning of every session and is responsible for  agreeing to the Terms of Service, paying for classes enrolled in, and securing  the safety of the minor.  </p>
                        <p><strong>1.  USERS.</strong>  You guarantee that all the information you  provide to Studio is true and correct.   You agree to maintain and promptly update such information to keep it  true and correct.  If we have reasonable  grounds to believe that such information is not correct, we may deny or  terminate your access to the Product or Services.  We are however, under no duty or obligation  to investigate or confirm the credentials of any party.  Every User uses the Product and Services by  their own choice, and as such, each and every User assumes the inherent risks  involved in joining into one-on-one webcam virtual rooms.     <br />
                            There is also no  inherent right to use the Product or Services.   We reserve the right to refuse to provide the Service to any person for  any lawful reason and/or to discontinue the Service in whole or in part at any  time, with or without prior notice.  <br />
                            Services are only  available to Users who register and create an account with Studio prior to  accessing the Services (the &ldquo;<strong>Account</strong>&rdquo;).  <br />
                            <strong><u>Setting  up an Account as an instructor:</u></strong><br />
                            When you set up an  Account as an instructor you are asked to enter the following information:           <strong><u></u></strong></p>
                        <ol>
                            <li>first and last name</li>
                            <li>date of birth</li>
                            <li>email</li>
                            <li>phone number</li>
                            <li>address</li>
                            <li>picture upload</li>
                        </ol>
                        <p>The Account is set up  with an email address and a password of the instructor&rsquo;s choosing. <br />
                            <strong><u>Setting  up an Account as a student:</u></strong><strong> </strong><br />
                            When you set up an  Account as a student you are asked to enter the following information:</p>
                        <ol>
                            <li>first and last name</li>
                            <li>date of birth</li>
                            <li>email</li>
                            <li>phone number</li>
                            <li>address</li>
                            <li>picture upload</li>
                        </ol>
                        <p>The Account is set up  with an email address and a password of the student&rsquo;s choosing.  <br />
                            All questions regarding  your Account administration should be submitted via our ticket system, by  chatting with a customer service representative, or via our auto email recovery  system.  <br />
                            You are responsible for  the security and confidentiality of your Account (including login and  password).  <br />
                            YOU UNDERSTAND THAT SOME  OR ALL OF THE INFORMATION YOU SUBMIT FOR YOUR PROFILE MAY BE AVAILABLE TO THE  PUBLIC.  You take sole responsibility for  any and all information you submit or upload.   You further acknowledge and agree that the information provided may be  used in the manner set forth in our Privacy Policy.  You are responsible for reading the Privacy  Policy.  Your use of the Product and/or  Services is your consent to the Privacy Policy.  <br />
                            <strong>Additional Terms Applicable to Instructors Only</strong>: </p>
                        <ol>
                            <li>You will be asked to enter additional information to create a  profile on the Product.  As an instructor  you are asked to enter your education and qualifications, rate per hour, and  years of experience.  </li>
                        </ol>
                        <ol>
                            <li>You may be required to take part in an interview with a Studio  agent.  During such interview we will  walk you through the website and tools available on the website.  In addition, we may request a small  demonstration of what you intend to teach during your class(es).  If we do not find the interview satisfactory,  we reserve the right to decline your use of our Product and enrollment in our  Services.  </li>
                        </ol>
                        <p><strong>Additional Terms Applicable to Students Only:</strong></p>
                        <ol>
                            <li>You  understand, accept, and assume all of the risks inherent in communicating with  parties with whom you do not know.  You  understand and accept the inherent risk that a party holding themselves out to  be a qualified instructor may not be properly qualified, may not be properly  educated, may not be properly credentialed, and may not even be who they say  they are.  As with all communications  occurring in cyberspace, there should always be a level of caution and  verification taken on your part to mitigate inherent risks.  You understand and accept that you hereby  assume all risks inherent with the use of the Product and Services.</li>
                        </ol>
                        <ol>
                            <li>You  understand and accept that most of the information requested from you when  registering your Account is purely optional, and you are under no obligation to  enter information that you do not want to enter.  You understand and accept that any information  that you do enter when registering your Account may be visible to the public in  the form of your profile. (Please see our Privacy Policy for more  information).   </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You understand and accept that all Users are  independent and not agents, employees, or affiliates of Studio.  Users are solely responsible for their own communication  Studio has neither control nor involvement, nor does Studio take part in any  advice provided by any party while using the Product and/or Services.  STUDIO   MAKES NO GENERAL OR SPECIFIC WARRANTIES, EXPRESS OR IMPLIED, THAT THE  PRODUCT AND/OR SERVICES ARE USEFUL, INFORMATIVE, ENTERTAINING, EDUCATIONAL,  TRUE, ACCURATE, NOR FOR ANY INTENDED PURPOSE.   STUDIO MERELY PROVIDES THE ONLINE SPACE FOR USERS TO MEET ON CONTRACTUAL  TERMS AGREED UPON BETWEEN SUCH USERS AND IS NOT RESPONSIBLE FOR WHAT GOES ON IN  THE ONLINE SPACES, NOR ANY OF THE CONDUCT OF ANY OTHER USER.  STUDIO IS MERELY A COMMUNICATIONS PLATFORM  SERVICE PROVIDER, AND IS NOT IN ANY WAY A PROVIDER OF EDUCATION, COUNSELING,  NOR THE LIKE. YOU UNDERSTAND THAT STUDIO&rsquo;S RELATIONSHIP TO ANY USER IS ONLY TO  THE EXTENT OF PROVIDING A PLATFORM OF COMMUNICATION THROUGH THE PRODUCT AND THE  SERVICES. </li>
                        </ol>
                        <p><strong>2.&nbsp; PRIVACY.</strong>&nbsp; During your use of the Product  and/or Services we will collect certain personal information.  The use of this information will be treated  in accordance with our Privacy Policy and is incorporated by this reference to  these Terms of Service.  </p>
                        <p><strong>3.  COPYRIGHT/LICENSES. </strong>The contents of the Product  and Services are protected by copyright, trademark, and other proprietary  rights. Users may not infringe upon any copyrights, trademarks, or other  intellectual property rights while using the Product and/or Service.  Nothing in this Terms of Service or elsewhere  gives you permission to modify, reproduce, copy, republish, upload, post,  distribute or transmit in any manner, any of the contents on the Product,  including but not limited to, text, code, images, video, and/or software. You  may print and download portions of the content from the Product solely for your  own <u>non-commercial use,</u> contingent on your agreement that you will not  change or delete any copyright or proprietary notices from the content.  You further agree not to share, broadcast,  transmit, or otherwise allow viewing of any of the Services&rsquo; content, including  content provided by other Users. .</p>
                        <p>You agree not to utilize  any data mining, data gathering or extraction tools or any manual systems to  collect, gather, or copy any data on or related to the Services in a manner not  previously authorized in writing by Studio. You may not use &ldquo;hidden text&rdquo; or  meta-tags incorporating the Studio name or trademarks without first obtaining Studio&rsquo;s  express written consent.<br />
                            <strong>4.</strong>  <strong>USER SUBMISSIONS</strong>. Any and all expressions, information, images, artwork,  logos, copyrighted materials, trademarked materials, sounds, and/or data,  whether submitted, exhibited, and/or webcast by Users, is hereby referred to in  these Terms of Service as &ldquo;User Submissions.&rdquo; User Submissions are subject to these  Terms of Service, whether they are published or not.  Studio does not guarantee any right to confidentiality  and/or privacy with respect to User Submissions.  You are solely responsible for your own User  Submissions and the outcome and consequences of posting or publishing them. You  represent and warrant that you own or have the necessary authorization, licenses,  rights, permissions and/or consents to any intellectual properties within your User  Submissions.  You hereby grant Studio the  right to use User Submissions in the manner laid out by these Terms of Service,  within the Privacy Policy, and elsewhere within the Product and/or Services.<br />
                            You hereby grant Studio  a royalty-free, non-exclusive, worldwide, everlasting license, with the right  to publicly display, recreate, distribute, reproduce, transmit, broadcast,  telecast, webcast, create derivative works of, any or all User Submissions.  You also authorize Studio to use your image, name,  and likeness in connection with the use of marketing, advertising, or other  promotional material.  You agree that you  shall have no recourse against Studio (including its agents, employees,  affiliates, and the like) nor hold Studio (nor its agents, employees,  affiliates, and the like) liable for any alleged or actual infringement, appropriation,  and/or dilution of any proprietary rights in any and all submissions to Studio.  <br />
                            Studio does not tolerate  violations of intellectual property rights on the Product or through the  Service.  If you believe your copyright  has been infringed upon through any User Submission, please submit a  notification pursuant to the Digital Millennium Copyright Act  (&quot;DMCA&quot;). Your notice must be submitted in writing and can be  submitted through our ticket system.   Studio will take reasonable measures to remove any infringing  content.  </p>
                        <p><strong>5.  ACCOUNT TERMS.  </strong>The following terms apply to your use of the Services and any Account  that you may open via the Product:</p>
                        <ol>
                            <li>You must be 18 years of  age or older to use the Service, unless supervised by a consenting parent or  legal guardian.  </li>
                            <li>You must create an Account to use the Services.</li>
                            <li>You are responsible  for maintaining the security of your account and password. Studio will not be  liable for any unauthorized use of your Account.  </li>
                            <li>You agree not to submit  any copyrighted, trademarked, or proprietary materials on the Product or  through the Services without the expressed permission of the owner of such  intellectual property.  By submitting content  through the Services, you are asserting to have the necessary authorization to  utilize said content, and as such, you hereby agree to indemnify and defend us  against any and all claims made against us arising from your User Submissions.   </li>
                            <li>You agree to use the  Services in a legal manner and not harass or prevent other Users from doing the  same.  You agree to stay within the  guidelines and rules set by Studio when using the Services.  </li>
                            <li>You agree to hold  Studio harmless and take sole responsibility and liability for User Submissions  made on your Account, or by use of your Account.</li>
                            <li>You agree to use the  Services at your own risk.</li>
                            <li>If you have ever been  on a registered sex offender list or convicted of any crime of moral turpitude,  you agree not to enter into any webcam studio with anyone who appears to be  under the age of 25 years old.</li>
                        </ol>
                        <p>&nbsp;</p>
                        <p><strong>6.  USER CONDUCT.  </strong>Your use of the Product and its Services must be lawful at all times and  is subject to  all applicable laws and regulations.   You agree to be solely responsible for the User  Submissions you make. You agree that you will not submit, upload, share, post, display,  record, show, transmit, broadcast, telecast, webcast, or otherwise disperse or  facilitate distribution of any User Submissions — including images, sounds,  photos, comments, recordings, text, communications, software, data, video, or  other information — that:</p>
                        <ol>
                            <li>violates any local,  state, national or international law; </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>interferes with or  disrupts the Product or its Services or networks; </li>
                        </ol>
                        <ol>
                            <li>is unlawful, harmful  to minors, abusive, threatening, harassing, deceptive, libelous, defamatory,  slanderous, vulgar, obscene, lewd, fraudulent, injurious, or is invasive of  another&rsquo;s privacy; </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>contains subtle, explicit,  and/or graphic descriptions of violence, adult themes and/or sexual contents,  including accounts, images, and/or demonstrations, of nudity, lewd and/or sexual  acts.</li>
                        </ol>
                        <ol>
                            <li>contains foul  language, sexual language, and/or solicitations of any kind, including, but not  limited to commercial solicitation, advertising of goods and/or services, or  any conduct which attempts to use the Product and/or Services to act as a  conduit for the sale of goods or services.</li>
                            <li>harasses, threatens, victimizes,  and/or intimidates an individual or group of individuals on the basis of age,  sex, gender, sexual orientation, religion, race, ethnicity, age, or disability;</li>
                            <li>contains unauthorized  or unwanted advertisement, such as junk ,spam emails or phishing emails or any  other unsolicited commercial or non-commercial communications;  </li>
                            <li>infringes on any intellectual  property or proprietary right of any party; </li>
                            <li>contains software or  any other computer code, files, or programs that are designed or intended to spread  viruses, worms, corrupted files which are known to disrupt, damage, impair and/or  limit the functioning of any software, hardware, network, server or  communications equipment, or to damage or obtain unauthorized access to any  data or other information; </li>
                            <li>use  any robot, spider, or other such programmatic or automatic device, including, but  not limited to, automated dial-in or inquiry devices to obtain information from  the Product or otherwise monitor or copy any portion of the Product and/or  Services; or, is not authorized by the Terms of  Service. </li>
                        </ol>
                        <p>&nbsp;</p>
                        <p>Studio does not assume  any liability for the contents of any User Submission. Communications or User  Submissions between Users are not pre-screened, but webcam sessions may be  monitored by Studio, at its discretion.   Studio, however, is under no duty to monitor the webcam studios.  The Product includes a feature in which any  User can flag a class session to indicate that a violation of the Terms of  Service has occurred.  Studio will take  reasonable measures to investigate and take appropriate actions. Although Studio  does not monitor all User Submissions, we may on occasion review some of the  User Submissions for content, quality, or any other purposes we deem  necessary.  <br />
                            Within its sole  discretion, Studio may remove any User Submission or other content which it deems  as likely to be unlawful, or which it deems to be violative of the spirit  and/or letter of the Terms of Service.  We  are not responsible for any failure or delay in removing any such User  Submission or other content.  You hereby  consent to such removal and waive any claim against us arising out of such  removal.  <br />
                            You agree that any  violation of the Terms of Service is grounds for termination of your Account  and immediate revocation of any and all licenses to use the Product and/or  Services.  You agree that Studio may, at  any time and at our discretion, terminate or block your Account and/or your IP  address, with or without prior notice to you.   You further agree that you will cooperate with any investigation  regarding violations of the Terms of Service, including cooperation with law  enforcement for investigations regarding criminal activity.  <br />
                            <strong>7.  FEES/COSTS.  </strong>Studio reserves the right to make changes to any fees or costs charged  for the use of its Services, including charging for services that may currently  be free.  You understand that Studio  merely provides the means to broker an exchange between instructors and  students in an online marketplace where students can shop for one-on-one webcam  instruction from instructors at dates and times posted by instructors.  We provide students with the opportunity to  find and hire instructors.  We provide instructors  with the opportunity and means to offer webcam classes at a price set by the  instructor.  We facilitate the financial  transactions, collecting monies from the students, and remitting monies to  Instructors within a reasonable time after successful completion of the  purchased class.    Users further agree that Studio cannot be  held liable for transactions between the Users.  </p>
                        <p><strong>Additional Terms Applicable to Instructors Only</strong>: </p>
                        <ol>
                            <li>Instructors acknowledge that they are not employees or agents of Studio,  and that nothing contained within this Agreement, or anywhere else shall be  construed to impute, imply, suggest, or create any expectation of employment,  agency, or representation between Studio and User.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Instructors acknowledge that usage of the Product and/or Services does  not create, expressly or impliedly, any relationship akin to employee/employer,  landlord/tenant, parent/subsidiary, independent contractor, partnership,  co-ownership, membership, nor any other form of agency or representation, nor  does it create, expressly or impliedly, a joint venture relationship,  partnership, or other form of co-ownership.</li>
                        </ol>
                        <ol>
                            <li> Instructors are not charged a  subscription fee to use the Product and/or Services.  Instead, Studio shall deduct a commission fee  from an instructor&rsquo;s class fee in the manner set forth herein (&ldquo;Studio&rsquo;s  Commission Fee&rdquo; or &ldquo;Commission Fee&rdquo;).  Instructor&rsquo;s  may determine and set the amount to charge for their own class fees (must be  over $10.00 minimum) for each available class that they offer on our Services  (&ldquo;Class Fee&rdquo;).   The Studio Commission  Fee shall be ____%  of the Class Fee, and shall be charged against and deducted from the Class Fee  once it is collected from the student who has purchased a class.      Commission Fees are subject to change, from  time to time.  If Studio modifies the  amount or method of apportioning a Commission Fee, it shall state such  modifications within revised Terms of Service.   Should you use the Product and/or Services after the Terms of Service  have been revised, your use of the Product and/or Services shall serve as your  notice of, and consent to the newly revised Commission Fee and any other  revisions contained within the revised Terms of Service.</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Although Studio shall collect Class Fees from students who purchase a  class at the time such student reserves and purchases a class, the Class Fee  shall not be released to an instructor until five to ten days have lapsed after  a &ldquo;successful&rdquo; completion of the class, without dispute (see Studio&rsquo;s Dispute  Policy).  Commission Fees shall be  deducted immediately from the Class Fees, and apportioned to Studio&rsquo;s general  operating account.  Studio is under no  obligation to segregate undispersed Class Fees into a trust account or into any  interest bearing account.  No interest  shall accrue on undispersed monies. </li>
                        </ol>
                        <ol>
                            <li>Commission Fees are non-refundable, and instructors shall be liable for  Commission Fees, even in circumstances where a Class Fee has been refunded to a  student.  (see Studio&rsquo;s Dispute Policy) .</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Studio may hold Class Fees indefinitely during any periods wherein a student  has opened a complaint ticket, until such ticket has been fully resolved by  Studio, in its discretion, and/or until the instructor and student have both  mutually agreed upon settlement terms with each other and adequately conveyed  such terms to Studio without contradiction to each other.  As long as there is an open complaint ticket,  Studio shall hold onto the Class Fees.</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Unresolved complaint tickets shall be resolved by Studio, at its own  discretion, taking into account the totality of relevant circumstances.  Both instructor and student agree to be bound  by the decision of Studio.  Instructors  and Students are urged to resolve their complaints between them.  . </li>
                        </ol>
                        <ol>
                            <li>Instructors are asked to provide bank account information for the direct  deposit of their payments from Studio.   Studio will take reasonable measures to maintain this information secure  and confidential.  Transacting business  on the internet is never free from some degree of risk.  Studio cannot guarantee the security or  confidentiality of your information, but will take reasonable measures to  secure and protect it.  As with all  communications occurring in cyberspace, you should take measures to maintain  any sensitive information secure.  You  acknowledge the potential risk in providing your bank account information to  Studio and agree to hold Studio harmless in the unlikely event that this  information is obtained and used without your authorization.  <strong> </strong></li>
                        </ol>
                        <p><strong>&nbsp;</strong></p>
                        <ol>
                            <li>Instructors will receive a blank W9 form as soon as their earned income  from Studio reaches in excess of $600 (as required by law).   You agree to return the completed W9 form  promptly to Studio, in order to prevent the permanent or temporary hold on your  Account.  The W9 form requests a social  security number or tax identifier.  Studio  will take reasonable measures to maintain this information secure and  confidential. However, Studio cannot guarantee the security or confidentiality  of this information, nor any other information shared with Studio.  As with all communications occurring in cyberspace, you  should take measures to maintain any sensitive information secure.  You acknowledge the potential risk in  providing your social security or tax identifier information to Studio and  agree to hold Studio harmless in the unlikely event that this information is  obtained and used without your authorization.  <strong> </strong></li>
                        </ol>
                        <ol>
                            <li>Instructors are responsible  for paying all taxes associated with fees earned and received.  Studio will not withhold taxes from  disbursements to instructors.  <strong></strong></li>
                        </ol>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>Additional Terms Applicable to Students Only: </strong></p>
                        <ol>
                            <li>Students are not charged a subscription fee.  Each instructor determines the Class Fee and  displays the Class Fee for each available class.  Students are only charged for the classes they  enroll in.   Class Fees, once paid, are  refundable in the following cases:</li>
                            <ol>
                                <li>Instructor &ldquo;no shows&rdquo; or begins the session more than ____ minutes after the  regularly scheduled time.</li>
                                <li>Instructor doesn&rsquo;t successfully provide the instruction that was  promised, and the student is able to adequately prove instructor&rsquo;s lack of  success to the satisfaction of Studio after following through with the Dispute  Resolution phase.</li>
                            </ol>
                        </ol>
                        <p>Since the instructors set the value of  their own Class Fees these fees are subject to change with or without prior  notice from time to time.  Students,  however, will not be affected by price changes that occur after enrollment for  that given class.  <br />
                            Class Fees are due, in full, upon enrollment.  Class Fees are made via PayPal.  PayPal may store your payment information on  their site.  We are not responsible for  the services provided by Paypal.  Studio  may accept major credit cards in the future and may choose to store payment  account information in its own database.  </p>
                        <ol>
                            <li><strong>CANCELLATIONS AND  REFUNDS. </strong></li>
                            <ol>
                                <li>Cancellations by Instructors:  Studio  understands that situations change and that a class may need to be cancelled by  an instructor.  An instructor may cancel  a class upon 24 hours prior notice without being liable to Studio for a  Commission Fee.  Should an instructor  cancel with less than 24 hours remaining before the class, or simply fail to  attend his/her own class, although student will receive a full refund of Class  Fees, the instructor may still be liable to Studio, at Studio&rsquo;s discretion, in  the amount of the Commission Fee that would have been received by Studio had  the class actually been taught.  Such  fees will be charged against any future payments to the instructor, or  otherwise shall remain as a deficit on that instructor&rsquo;s account indefinitely  until paid.   </li>
                                <li>Cancellations by Student:  Except  as specifically set forth in Studio&rsquo;s Dispute Resolution Policy, students will  not be awarded refunds.  Once a student  commits to a class they must either attend or forfeit their Class Fee for that  class.   </li>
                                <li>Cancellations for technical  reasons:  Unless the technical reason is  under the immediate control of Studio, Studio will not offer refunds for  technical issues.  Complaints that arise  from issues relating to any Users&rsquo; hardware, software, and/or internet  connectivity are non-refundable.</li>
                            </ol>
                        </ol>
                        <p>&nbsp;</p>
                        <p><strong>9.  DISSATISFACTION WITH A  CLASS</strong>.  In the event that a student is dissatisfied  with a session, a complaint may be submitted through our Product in the form of  a ticket.  Studio&rsquo;s customer service  agent will then look into the issue described on the ticket.  A simple dissatisfaction does not constitute  a refund for the class.  Each situation  will be reviewed on a case-by-case basis and a determination will be made by  Studio&rsquo;s sole discretion.  All complaint  tickets from students must be submitted no later than two (2) days after the  session; otherwise, Studio will be unable to take any action and student will  have to handle the matter directly with instructor.  </p>
                        <p>If an instructor is dissatisfied with  a session the instructor may submit a ticket informing Studio that they will  not accept future enrollment by the student in question, but there shall not be  any refund of the Commission Fee paid to Studio simply because an instructor is  dissatisfied with a student. </p>
                        <p>Unless the technical reason is under  the immediate control of Studio, Studio will not offer refunds for technical  issues.  Complaints that arise from  issues relating to any Users&rsquo; hardware, software, and/or internet connectivity  are non-refundable.</p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>10.  CLASSES.  </strong>You agree that your participation in a class, either as an  instructor or student is at your sole risk.  Studio is under no obligation to supervise classes,  although it is within their right to do so.    Studio does not employee, hire, nor  contract for hire any User of the Product and/or Services, nor is Studio even affiliated  or responsible for any acts or omissions by any User.  STUDIO DOES NOT WARRANT OR GUARANTEE THAT THE  PRODUCT AND/OR THE SERVICES ARE TO BE USED FOR ANY SPECIFIC OR IMPLIED PURPOSE,  NOR DOES IT WARRANT OR GUARANTEE THE PRODUCT AND/OR SERVICES TO BE WITHOUT  DEFECT  NOR DOES IT WARRANT OR GUARANTEE  THE TRUTH, OPINIONS, LESSONS, IDEAS, OR COMMUNICATIONS EXPRESSED BY USERS OF  PRODUCT AND/OR SERVICES..  Studio  encourages and requests that our Users exercise good judgment and caution when  attending (or allowing a minor to attend) a live class. You acknowledge and  agree that by participating in any class you may be exposed to a variety of  risks and hazards, which may or may not be foreseen, including but not limited  to, inappropriate images, personal injury, property damage and death. You accept  and understand that you are solely responsible for protecting yourself from any  and all risk, harm, and/or injury arising from your participation with the  Product and/or Services.&nbsp;TO THE  FULLEST EXTENT PERMITTED BY LAW, YOU HEREBY RELEASE STUDIO AND its agents FROM  ANY AND ALL CLAIMS OR DAMAGES OF ANY KIND OR NATURE, KNOWN OR UNKNOWN,  DISCLOSED OR UNDISCLOSED, RELATING TO YOUR PARTICIPATION IN AND/OR USE OF THE  PRODUCT AND/OR SERVICES. YOU AGREE AND UNDERSTAND AND INTEND THAT THIS  ASSUMPTION OF RISK AND RELEASE IS BINDING UPON YOU AND YOUR HEIRS, EXECUTORS,  AGENTS, ADMINISTRATORS AND ASSIGNS.<strong> </strong></p>
                        <p><strong>Additional Terms Applicable to Instructors Only:</strong></p>
                        <ol>
                            <li>You represent that you  have the requisite qualifications to teach the classes you list on the Product  in a manner that will serve to provide a student who purchases a class from you  with an experience that will be educationally enriching and rewarding. </li>
                        </ol>
                        <ol>
                            <li>You represent that you  will conduct yourself in a professional manner and abide by all laws and  regulations.  Any deviation from this  will be a violation of the Terms of Service and could result in your Account  being closed and your IP address being blocked</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You represent that you  will only request information from a student that is necessary to conduct the  class, and that you will not share or use a student&rsquo;s information with anyone  for any purpose.  Any deviation from this  will be a violation of the Terms of Service and could result in your Account  being closed and your IP address being blocked.</li>
                        </ol>
                        <ol>
                            <li>You understand that any  student may book any class you list on our Product.  You agree to not refuse enrollment by any  student for any discriminatory reason.   Any deviation from this will be a violation of  the Terms of Service and could result in your Account being closed and your IP  address being blocked</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You understand and agree  that you are solely responsible for any and all content, User Submission, and  sessions you conduct.  </li>
                        </ol>
                        <ol>
                            <li>You understand and agree  that your profile will be public.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <p><strong>Additional Terms Applicable to Students Only:</strong></p>
                        <ol>
                            <li>You understand that the classes  offered on the Product are offered directly by the instructor.  Studio is not responsible or liable to you  for any content displayed or transmitted to you.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You represent that you  will participate in the classes for your own enjoyment and knowledge only, and you  shall not copy, share, distribute, or use any class, materials, or lectures for  purposes beyond your own immediate education and enjoyment.  </li>
                        </ol>
                        <ol>
                            <li>You understand that  Studio does not vet, background check, reference, authenticate, investigate,  credential, or confirm the instructors listed on the Product, nor does Studio  guarantee any User&rsquo;s supposed qualifications, nor does Studio require a minimum  qualification.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You understand and agree  that the instructor for any class you enroll in will have access to your profile  which includes the details you submit in the &ldquo;About Me&rdquo; section and any photos  you choose to upload.  DO NOT SHARE ANY  INFORMATION YOU WOULD NOT OTHERWISE BE WILLING TO HAVE SHARED PUBLICLY.     </li>
                        </ol>
                        <p><strong>11.  AVAILABILITY OF  SESSION FOR ONE WEEK</strong>.  As soon as a session  ends, Users who participated in the session will receive a link to view and/or  listen to the recorded session.  Studio  will only archive the session for one week at which point it will be deleted  and unable to be retrieved.  </p>
                        <p><strong>12.  CLASS AND USER REVIEWS  AND RATINGS.  </strong>Users have the option to  rate and review a session and give feedback on the instructor or student.  These reviews and ratings will be public for  all Users to see.  We encourage Users to  take advantage of this function to advance the marketplace of the Services and  raise quality of User participation.  Users  that decide to leave reviews and/or ratings are required to be honest and not  use these features to dishonestly &ldquo;pump&rdquo; or &ldquo;bash&rdquo; another User.  Any deviation from this will be a violation  of the Terms of Service and could result in your Account being closed and your  IP address being blocked.   Studio cannot  control the contents of the reviews and therefore you agree to not hold Studio  responsible or liable for any comments, information, or opinions that a User  may include in a review.  You must submit  and bring to our attention any review that you believe violates the Terms of  Service.  You understand that a class rating  and review is a way Users can get familiar with other Users and determine  whether they should take a class offered.  </p>
                        <p><strong>13.  THIRD PARTY SITES AND  LINKS.  </strong>Third party sites do not  have access to our Product.  However,  from time to time Studio may make a recommendation on goods or services that could  potentially enhance your experience while using the Product and/or Services or  simply be of interest to you. Studio&rsquo;s  inclusion of links to other websites is simply for your convenience.  In no way should the inclusion of a link be  seen as an endorsement of the link or the content within its website.  It is your sole responsibility to investigate  and gather the information necessary to make a determination of whether or not  you would like to use the link.  Studio  will not be liable for any links or information contained on other  websites.  Studio will not be liable for  your use of any links or purchase of any product or service.  Studio will not be liable for any other  websites failure to abide by necessary guidelines, rules, or laws. </p>
                        <p><strong>14.  MOBILE APPLICATION</strong>.  The Studio website is accessible on all smart  mobile devices.  The video conferencing  portion of our Services will only function on Flash supported devices.   Please check to make sure that your mobile  device can support Flash before attempting to use the Product and/or Services.  We are not responsible if your device or  hardware does not have the system requirements to support our Product and/or  Services.</p>
                        <p><strong>15.  DISCLAIMER OF WARRANTIES.&nbsp;<br />
                            </strong><strong><u> </u></strong><br />
                            <strong><u>STUDIO  EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED,  INCLUDING, BUT NOT LIMITED TO ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A  PARTICULAR USE OR PURPOSE, NON-INFRINGEMENT, ACCURACY OF DATA AND SYSTEM  INTEGRATION.&nbsp; STUDIO MAKES NO WARRANTY THAT THE PRODUCT OR SERVICES WILL  BE ERROR-FREE OR THAT ACCESS WILL BE UNINTERRUPTED. STUDIO MAKES NO WARRANTY  THAT ANY DOWNLOADS, FROM THE PRODUCT OR ORIGINATING FROM THE PRODUCT, WILL BE  FREE OF VIRUSES AND/OR HARMFULL DATA.</u></strong>  </p>
                        <p>&nbsp;</p>
                        <p>You understand and accept that  the Services offered by Studio may expose you to advertising and/or other  commercial transactions.  You understand  that Studio makes no representations, warranties, and guarantees nor endorses  any product or transactions you enter into.   YOU UNDERSTAND THAT SUCH TRANSACTIONS ARE MADE AT YOUR OWN RISK AND  THROUGH THIRD PARTIES.  <strong></strong></p>
                        <p>All User Submissions are comments and  opinions solely of the User.  Studio may  or may not necessarily endorse, represent or even agree or support the views,  beliefs, or expressions of any of our Users or any User Submissions.  Studio is not responsible for any deficiency,  error, truth, accuracy, and/or reliability of any User Submissions.  </p>
                        <p>You understand and agree  that Studio has no control over any third party networks or connections.  <br />
                            You further understand  that on occasions there may be temporary interruptions, transmission failures,  or other occurrences that may impair your ability to use and/or enjoy the  Product and/or Services.  You understand  and agree that the Product and its Services are provided to you <strong><u>&ldquo;AS-IS&rdquo;</u></strong> and that we assume no  responsibility for any deficiencies and/or failures.  <br />
                            <strong>16. LIMITATION OF  LIABILITY.&nbsp;&nbsp;</strong>To the fullest extent permitted by law, the total  liability, of Studio and its agents, if any liability should be found to exist  at all, to any claim or demand made by a User, or made by anyone claiming by or  through the User that they  have been  harmed or damage by Studio, including   such  alleged claims, losses,  costs or damages, including attorneys&rsquo; fees and costs and expert-witness fees  and costs of any nature whatsoever or claims expenses resulting from or in any  way related to the Product and its Services,  <u>shall not exceed the total amount of $1.00</u>.   It is intended that this limitation apply to  any and all liability or cause of action however alleged or arising, unless  otherwise prohibited by law.<strong>  </strong></p>
                        <p><strong>17. INDEMNIFICATION.&nbsp;&nbsp;</strong>You agree to indemnify, defend and hold  harmless Studio, its parents, subsidiaries, affiliates, LLC members and  managers, owners, licensors, co-branders, and suppliers and service providers,  and the officers, directors, employees, consultants, and agents of each, and  other Users, from and against any and all third-party claims, liabilities,  damages, losses, costs, expenses, fees (including reasonable attorneys' fees  and court costs) that such parties may incur as a result of or arising from (1)  User Content and any information you submit, post or transmit through the  Product or Services, (2) your use of the Product or Services, (3) your  violation of the Terms Of Service, (4) your violation of any rights of any  other person or entity or (5) any viruses, Trojan horses, worms, or other  similar harmful input by you into the Services.&nbsp;</p>
                        <p><strong>18. ENTIRE  AGREEMENT.&nbsp;&nbsp; </strong>The Terms of Service constitute the entire agreement  between Studio and you  with respect to the Product and Services.   This Agreement supersedes all prior agreements or representations,  written or oral, to the extent they relate in any way to the matter in the  Terms of Service.  This Terms of Service  govern your access to the Product and your use of its Services. </p>
                        <p><strong>19.  ARBITRATION</strong>.  Any controversy  or claim arising out of or relating to this Terms of Service, or the breach  thereof, shall be settled by arbitration administered by the American  Arbitration Association in accordance with its Commercial Arbitration Rules,  and judgment on the award rendered by the arbitrator(s) may be entered in any  court having jurisdiction thereof.  </p>
                        <p><strong>20.  ATTORNEY FEES</strong>.   In the event either party should ever institute or defend an action or proceeding  in court to enforce and/or interpret these Terms of Service, the prevailing  party at such action or proceeding shall be entitled to reasonable attorney&rsquo;s  fees and costs.</p>
                        <p><strong>21.  SEVERABILITY</strong>.   In the event that a court may deem any portion of this Terms of Service  to be unenforceable, the remainder of the Terms of Service will remain valid  and in full force.  <br />
                            &nbsp;&nbsp;<br />
                            <strong>22.&nbsp; NETWORK CONNECTIVITY. </strong>Users are  responsible for their own connectivity to the internet, as well as their own  speed of downloading, uploading, caching, processing, and saving data.  Users are responsible for their own software,  hardware, and internet service providers, as well as the speed, safety, and  security of their use of the Product and/or Services.  Users assume all risks associated with the  online world.    We are not responsible  for caching, buffering, or any other issues   and/or delays related to third party hardware, software, internet  service providers, viruses, Trojan horses, worms, spyware, bots, and/or  any bandwidth or connectivity issues, no  matter what the reason, including without limitation, those caused by traffic  on the internet, wireless systems, blackouts, brown outs,  insufficient software and/or hardware  specifications, and/or acts of nature, terrorism, work stoppages, or any other act  or omission beyond the immediate control of Studio.</p>
                        <p><strong>23. VIOLATIONS/COMPLAINTS.</strong>&nbsp; Report any violations and/or  complaints through our ticket system or chat online with one of our customer  service representatives.  </p>
                        <p><strong>24.</strong> <strong>VENUE AND CONFLICT OF LAWS.</strong>  Any dispute arising  from this contractual relationship shall be governed by Oregon law, and shall  be decided solely and exclusively by State or Federal courts and/or arbitrators  located in Portland, Oregon without giving effect to any conflicts of law  principles of such state that might refer the governance, construction or  interpretation of this Terms of Service to the Laws of another jurisdiction.  Any party who  unsuccessfully challenges the enforceability of this forum selection clause  shall reimburse the prevailing party for its attorney's fees, and the party  prevailing in any such dispute shall be awarded its attorneys' fees.</p>
                        <p><strong>25.  RIGHTS RESERVED.</strong>   Any rights of Studio not expressly granted are reserved. </p>
                        <p><strong>26.  TECHNICAL SPECS</strong>.   You are responsible for your own hardware and software.  You are responsible for making sure that your  hardware, operating system, browser, and/or other software are sufficient to  handle the Product and Services.  Make  sure that your hardware and software can stream audio and visual conferencing.  </p>
                        <p><strong>27.  BETA-USERS</strong>.  Studio takes no  responsibility for any losses, claims, injuries, expenses, or any other cost  related to your use of the service as a Beta-User.  If you are a Beta User, you acknowledge that  the Product and/or Services are not ready to go live and will inevitably likely  be susceptible to a wide-range of issues which could harm you and/or your  hardware and software.  BETA USERS ASSUME  ALL RISKS ASSOCIATED WITH THE USE AND OPERATION OF PRODUCT AND SERVICES DURING  ALL BETA PHASES.  </p>
                        <p><strong>Date of Last Revision:  &nbsp; March 23, 2014</strong>&nbsp;<br />
                            <strong>----------------------------&nbsp;</strong></p>
                        <p style="font-size : 20px">&nbsp;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            <label for="subject_contact">Feedback</label>
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

        <!-- Modal End -->
        <!-- start: Header -->
        <header class="navbar">
            <div class="container">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="main-menu-toggle" class="hidden-xs open"><i class="fa fa-bars"></i></a>		
                <a class="navbar-brand col-lg-2 col-sm-1 col-xs-12" href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/img/Studio-Near3.png"/></a>
                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">

                </div>
                <!-- end: Header Menu -->
            </div>	
        </header>
        <!-- end: Header -->
        <div class="container">
            <div class="row">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="col-lg-2 col-sm-1">	
                </div>
                <!-- end: Main Menu -->

                <!-- start: Content -->
                <div id="content" class="col-lg-10 col-sm-11">
                    <div class="row">
                        <?php echo $this->load->view($main_content); ?>
                    </div>
                </div>
                <!-- end: Content -->

            </div><!--/row-->		

        </div><!--/container-->

        <div class="clearfix"></div>
        <footer>
            <!-- <div class="row">
                 <div class="col-sm-5">
                     &copy;  2013-2014  <a href="<?php //echo base_url();   ?>">STUDIO NEAR</a>
                 </div>
                 <div class="col-sm-7 text-right">
                     Powered by: <a href="http://www.r-cis.com" >Recursion</a>
                 </div>
             </div>-->	


           <div class="row footer-thirdPart">
                <div class="container">
                    <div class="col-lg-8">
                        <ul class="nav nav-pills">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="" data-toggle="modal" data-target="#aboutUs">About Us</a></li>
                            <li><a href="" data-toggle="modal"  data-target="#press">Press</a></li>
                            <li><a href="<?php echo base_url(); ?>welcome/faq" >FAQs</a></li>
                            <li><a href="" data-toggle="modal"  data-target="#ToR">Site Terms</a></li>
                             <li><a href="" data-toggle="modal"  data-target="#PrivacyPolicy">Privacy Policy</a></li>
                            <li><a href="" data-toggle="modal"  data-target="#feedback">Feedback</a></li>
                            <li><a href="" data-toggle="modal"  data-target="#contactus">Contact Us</a></li>
                        </ul>
                        <p style="margin-top:10px; padding-left: 15px;">Copyright © 2014-2015. Studio Near LLC. Designed by: <a href="www.r-cis.com"> RECURSION</a></p>
                    </div>
                    <div class="col-lg-4">
                        <div id="s5_socialicons" 	style="margin-right:85px;" >				
                            <!-- <div id="s5_rss"></div>					
                            <div id="s5_youtube"></div>	--><div id="s5_google"></div>				
                            <div id="s5_fb"></div>					
                            <div id="s5_twitter"></div>					

                        </div>
                    </div>
                </div>
            </div>  
                   
        </footer>
        <div class="modal fade" id="ToR1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">TERMS OF USE </h4>
                  </div>
                    <div class="modal-body" style="overflow:scroll; height: 500px;">
                        <p align="center"><strong>TERMS OF SERVICE</strong></p>
                        <p><strong>STUDIO  NEAR, LLC </strong><br />
                            <strong>Last  Edit:  February 17, 2014</strong></p>
                        <p>&nbsp;</p>
                        <p>Studio Near, LLC (&ldquo;<strong>Studio</strong>&rdquo;, &ldquo;<strong>we</strong>&rdquo;, &ldquo;<strong>us</strong>&rdquo;, or &ldquo;<strong>our</strong>&rdquo;) owns and operates software  applications, websites and products located at <a href="http://www.studionear.com"><strong>www.studionear.com</strong></a><strong>, </strong>and mobile  applications associated with said software applications, websites, and products  (collectively, the &ldquo;<strong>Product</strong>&rdquo;).  We hereby offer a revocable license to use  Product in a manner consistent with any and all applicable state, federal,  and/or international laws, and in the manner prescribed herein  and elsewhere within Product; specifically,  but not limited to, a license to use online services and any mobile  applications associated therewith, which provide instructors and students  (collectively, the &ldquo;<strong>Users</strong>&rdquo;) with  access to communicate with each other via a two-way webcam where people with  skills, the instructors, may teach those seeking to learn a skill, the students  (collectively, all of this shall be referred to as the &ldquo;<strong>Services</strong>&rdquo;).  </p>
                        <p>PLEASE READ THESE TERMS OF SERVICE  CAREFULLY.  BY ACCESSING THE PRODUCT OR  USING THE SERVICES YOU AGREE TO BE BOUND BY THESE TERMS OF SERVICE.  IF YOU DO NOT WISH TO BE BOUND BY THESE TERMS  OF SERVICE YOU MAY NOT ACCESS OR USE THIS PRODUCT OR THE SERVICES.  </p>
                        <p>We may at our sole discretion modify,  add or delete portions of these Terms of Service at any time.  It is your responsibility to review these  Terms of Service for changes prior to use of the Product and Services.  Your use of the Product or Services following  posting of changes to these Terms of Service constitutes your acceptance of any  modifications.  We will notify you of any  such material changes by posting notice of the changes on the Product.  </p>
                        <p>By using our Product, you represent  that you are at least 18 years of age.&nbsp; If we find a User to be under 18  years old, we will take reasonable measures to remove that User's personal  information from our database, and if necessary, ban such User&rsquo;s IP address  from access to the Product and Services.&nbsp; If you are not 18 years of age  and would like to use the Service, you MUST have the consent from your parent  or legal guardian.  The consenting adult  must be present at the beginning of every session and is responsible for  agreeing to the Terms of Service, paying for classes enrolled in, and securing  the safety of the minor.  </p>
                        <p><strong>1.  USERS.</strong>  You guarantee that all the information you  provide to Studio is true and correct.   You agree to maintain and promptly update such information to keep it  true and correct.  If we have reasonable  grounds to believe that such information is not correct, we may deny or  terminate your access to the Product or Services.  We are however, under no duty or obligation  to investigate or confirm the credentials of any party.  Every User uses the Product and Services by  their own choice, and as such, each and every User assumes the inherent risks  involved in joining into one-on-one webcam virtual rooms.     <br />
                            There is also no  inherent right to use the Product or Services.   We reserve the right to refuse to provide the Service to any person for  any lawful reason and/or to discontinue the Service in whole or in part at any  time, with or without prior notice.  <br />
                            Services are only  available to Users who register and create an account with Studio prior to  accessing the Services (the &ldquo;<strong>Account</strong>&rdquo;).  <br />
                            <strong><u>Setting  up an Account as an instructor:</u></strong><br />
                            When you set up an  Account as an instructor you are asked to enter the following information:           <strong><u></u></strong></p>
                        <ol>
                            <li>first and last name</li>
                            <li>date of birth</li>
                            <li>email</li>
                            <li>phone number</li>
                            <li>address</li>
                            <li>picture upload</li>
                        </ol>
                        <p>The Account is set up  with an email address and a password of the instructor&rsquo;s choosing. <br />
                            <strong><u>Setting  up an Account as a student:</u></strong><strong> </strong><br />
                            When you set up an  Account as a student you are asked to enter the following information:</p>
                        <ol>
                            <li>first and last name</li>
                            <li>date of birth</li>
                            <li>email</li>
                            <li>phone number</li>
                            <li>address</li>
                            <li>picture upload</li>
                        </ol>
                        <p>The Account is set up  with an email address and a password of the student&rsquo;s choosing.  <br />
                            All questions regarding  your Account administration should be submitted via our ticket system, by  chatting with a customer service representative, or via our auto email recovery  system.  <br />
                            You are responsible for  the security and confidentiality of your Account (including login and  password).  <br />
                            YOU UNDERSTAND THAT SOME  OR ALL OF THE INFORMATION YOU SUBMIT FOR YOUR PROFILE MAY BE AVAILABLE TO THE  PUBLIC.  You take sole responsibility for  any and all information you submit or upload.   You further acknowledge and agree that the information provided may be  used in the manner set forth in our Privacy Policy.  You are responsible for reading the Privacy  Policy.  Your use of the Product and/or  Services is your consent to the Privacy Policy.  <br />
                            <strong>Additional Terms Applicable to Instructors Only</strong>: </p>
                        <ol>
                            <li>You will be asked to enter additional information to create a  profile on the Product.  As an instructor  you are asked to enter your education and qualifications, rate per hour, and  years of experience.  </li>
                        </ol>
                        <ol>
                            <li>You may be required to take part in an interview with a Studio  agent.  During such interview we will  walk you through the website and tools available on the website.  In addition, we may request a small  demonstration of what you intend to teach during your class(es).  If we do not find the interview satisfactory,  we reserve the right to decline your use of our Product and enrollment in our  Services.  </li>
                        </ol>
                        <p><strong>Additional Terms Applicable to Students Only:</strong></p>
                        <ol>
                            <li>You  understand, accept, and assume all of the risks inherent in communicating with  parties with whom you do not know.  You  understand and accept the inherent risk that a party holding themselves out to  be a qualified instructor may not be properly qualified, may not be properly  educated, may not be properly credentialed, and may not even be who they say  they are.  As with all communications  occurring in cyberspace, there should always be a level of caution and  verification taken on your part to mitigate inherent risks.  You understand and accept that you hereby  assume all risks inherent with the use of the Product and Services.</li>
                        </ol>
                        <ol>
                            <li>You  understand and accept that most of the information requested from you when  registering your Account is purely optional, and you are under no obligation to  enter information that you do not want to enter.  You understand and accept that any information  that you do enter when registering your Account may be visible to the public in  the form of your profile. (Please see our Privacy Policy for more  information).   </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You understand and accept that all Users are  independent and not agents, employees, or affiliates of Studio.  Users are solely responsible for their own communication  Studio has neither control nor involvement, nor does Studio take part in any  advice provided by any party while using the Product and/or Services.  STUDIO   MAKES NO GENERAL OR SPECIFIC WARRANTIES, EXPRESS OR IMPLIED, THAT THE  PRODUCT AND/OR SERVICES ARE USEFUL, INFORMATIVE, ENTERTAINING, EDUCATIONAL,  TRUE, ACCURATE, NOR FOR ANY INTENDED PURPOSE.   STUDIO MERELY PROVIDES THE ONLINE SPACE FOR USERS TO MEET ON CONTRACTUAL  TERMS AGREED UPON BETWEEN SUCH USERS AND IS NOT RESPONSIBLE FOR WHAT GOES ON IN  THE ONLINE SPACES, NOR ANY OF THE CONDUCT OF ANY OTHER USER.  STUDIO IS MERELY A COMMUNICATIONS PLATFORM  SERVICE PROVIDER, AND IS NOT IN ANY WAY A PROVIDER OF EDUCATION, COUNSELING,  NOR THE LIKE. YOU UNDERSTAND THAT STUDIO&rsquo;S RELATIONSHIP TO ANY USER IS ONLY TO  THE EXTENT OF PROVIDING A PLATFORM OF COMMUNICATION THROUGH THE PRODUCT AND THE  SERVICES. </li>
                        </ol>
                        <p><strong>2.&nbsp; PRIVACY.</strong>&nbsp; During your use of the Product  and/or Services we will collect certain personal information.  The use of this information will be treated  in accordance with our Privacy Policy and is incorporated by this reference to  these Terms of Service.  </p>
                        <p><strong>3.  COPYRIGHT/LICENSES. </strong>The contents of the Product  and Services are protected by copyright, trademark, and other proprietary  rights. Users may not infringe upon any copyrights, trademarks, or other  intellectual property rights while using the Product and/or Service.  Nothing in this Terms of Service or elsewhere  gives you permission to modify, reproduce, copy, republish, upload, post,  distribute or transmit in any manner, any of the contents on the Product,  including but not limited to, text, code, images, video, and/or software. You  may print and download portions of the content from the Product solely for your  own <u>non-commercial use,</u> contingent on your agreement that you will not  change or delete any copyright or proprietary notices from the content.  You further agree not to share, broadcast,  transmit, or otherwise allow viewing of any of the Services&rsquo; content, including  content provided by other Users. .</p>
                        <p>You agree not to utilize  any data mining, data gathering or extraction tools or any manual systems to  collect, gather, or copy any data on or related to the Services in a manner not  previously authorized in writing by Studio. You may not use &ldquo;hidden text&rdquo; or  meta-tags incorporating the Studio name or trademarks without first obtaining Studio&rsquo;s  express written consent.<br />
                            <strong>4.</strong>  <strong>USER SUBMISSIONS</strong>. Any and all expressions, information, images, artwork,  logos, copyrighted materials, trademarked materials, sounds, and/or data,  whether submitted, exhibited, and/or webcast by Users, is hereby referred to in  these Terms of Service as &ldquo;User Submissions.&rdquo; User Submissions are subject to these  Terms of Service, whether they are published or not.  Studio does not guarantee any right to confidentiality  and/or privacy with respect to User Submissions.  You are solely responsible for your own User  Submissions and the outcome and consequences of posting or publishing them. You  represent and warrant that you own or have the necessary authorization, licenses,  rights, permissions and/or consents to any intellectual properties within your User  Submissions.  You hereby grant Studio the  right to use User Submissions in the manner laid out by these Terms of Service,  within the Privacy Policy, and elsewhere within the Product and/or Services.<br />
                            You hereby grant Studio  a royalty-free, non-exclusive, worldwide, everlasting license, with the right  to publicly display, recreate, distribute, reproduce, transmit, broadcast,  telecast, webcast, create derivative works of, any or all User Submissions.  You also authorize Studio to use your image, name,  and likeness in connection with the use of marketing, advertising, or other  promotional material.  You agree that you  shall have no recourse against Studio (including its agents, employees,  affiliates, and the like) nor hold Studio (nor its agents, employees,  affiliates, and the like) liable for any alleged or actual infringement, appropriation,  and/or dilution of any proprietary rights in any and all submissions to Studio.  <br />
                            Studio does not tolerate  violations of intellectual property rights on the Product or through the  Service.  If you believe your copyright  has been infringed upon through any User Submission, please submit a  notification pursuant to the Digital Millennium Copyright Act  (&quot;DMCA&quot;). Your notice must be submitted in writing and can be  submitted through our ticket system.   Studio will take reasonable measures to remove any infringing  content.  </p>
                        <p><strong>5.  ACCOUNT TERMS.  </strong>The following terms apply to your use of the Services and any Account  that you may open via the Product:</p>
                        <ol>
                            <li>You must be 18 years of  age or older to use the Service, unless supervised by a consenting parent or  legal guardian.  </li>
                            <li>You must create an Account to use the Services.</li>
                            <li>You are responsible  for maintaining the security of your account and password. Studio will not be  liable for any unauthorized use of your Account.  </li>
                            <li>You agree not to submit  any copyrighted, trademarked, or proprietary materials on the Product or  through the Services without the expressed permission of the owner of such  intellectual property.  By submitting content  through the Services, you are asserting to have the necessary authorization to  utilize said content, and as such, you hereby agree to indemnify and defend us  against any and all claims made against us arising from your User Submissions.   </li>
                            <li>You agree to use the  Services in a legal manner and not harass or prevent other Users from doing the  same.  You agree to stay within the  guidelines and rules set by Studio when using the Services.  </li>
                            <li>You agree to hold  Studio harmless and take sole responsibility and liability for User Submissions  made on your Account, or by use of your Account.</li>
                            <li>You agree to use the  Services at your own risk.</li>
                            <li>If you have ever been  on a registered sex offender list or convicted of any crime of moral turpitude,  you agree not to enter into any webcam studio with anyone who appears to be  under the age of 25 years old.</li>
                        </ol>
                        <p>&nbsp;</p>
                        <p><strong>6.  USER CONDUCT.  </strong>Your use of the Product and its Services must be lawful at all times and  is subject to  all applicable laws and regulations.   You agree to be solely responsible for the User  Submissions you make. You agree that you will not submit, upload, share, post, display,  record, show, transmit, broadcast, telecast, webcast, or otherwise disperse or  facilitate distribution of any User Submissions — including images, sounds,  photos, comments, recordings, text, communications, software, data, video, or  other information — that:</p>
                        <ol>
                            <li>violates any local,  state, national or international law; </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>interferes with or  disrupts the Product or its Services or networks; </li>
                        </ol>
                        <ol>
                            <li>is unlawful, harmful  to minors, abusive, threatening, harassing, deceptive, libelous, defamatory,  slanderous, vulgar, obscene, lewd, fraudulent, injurious, or is invasive of  another&rsquo;s privacy; </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>contains subtle, explicit,  and/or graphic descriptions of violence, adult themes and/or sexual contents,  including accounts, images, and/or demonstrations, of nudity, lewd and/or sexual  acts.</li>
                        </ol>
                        <ol>
                            <li>contains foul  language, sexual language, and/or solicitations of any kind, including, but not  limited to commercial solicitation, advertising of goods and/or services, or  any conduct which attempts to use the Product and/or Services to act as a  conduit for the sale of goods or services.</li>
                            <li>harasses, threatens, victimizes,  and/or intimidates an individual or group of individuals on the basis of age,  sex, gender, sexual orientation, religion, race, ethnicity, age, or disability;</li>
                            <li>contains unauthorized  or unwanted advertisement, such as junk ,spam emails or phishing emails or any  other unsolicited commercial or non-commercial communications;  </li>
                            <li>infringes on any intellectual  property or proprietary right of any party; </li>
                            <li>contains software or  any other computer code, files, or programs that are designed or intended to spread  viruses, worms, corrupted files which are known to disrupt, damage, impair and/or  limit the functioning of any software, hardware, network, server or  communications equipment, or to damage or obtain unauthorized access to any  data or other information; </li>
                            <li>use  any robot, spider, or other such programmatic or automatic device, including, but  not limited to, automated dial-in or inquiry devices to obtain information from  the Product or otherwise monitor or copy any portion of the Product and/or  Services; or, is not authorized by the Terms of  Service. </li>
                        </ol>
                        <p>&nbsp;</p>
                        <p>Studio does not assume  any liability for the contents of any User Submission. Communications or User  Submissions between Users are not pre-screened, but webcam sessions may be  monitored by Studio, at its discretion.   Studio, however, is under no duty to monitor the webcam studios.  The Product includes a feature in which any  User can flag a class session to indicate that a violation of the Terms of  Service has occurred.  Studio will take  reasonable measures to investigate and take appropriate actions. Although Studio  does not monitor all User Submissions, we may on occasion review some of the  User Submissions for content, quality, or any other purposes we deem  necessary.  <br />
                            Within its sole  discretion, Studio may remove any User Submission or other content which it deems  as likely to be unlawful, or which it deems to be violative of the spirit  and/or letter of the Terms of Service.  We  are not responsible for any failure or delay in removing any such User  Submission or other content.  You hereby  consent to such removal and waive any claim against us arising out of such  removal.  <br />
                            You agree that any  violation of the Terms of Service is grounds for termination of your Account  and immediate revocation of any and all licenses to use the Product and/or  Services.  You agree that Studio may, at  any time and at our discretion, terminate or block your Account and/or your IP  address, with or without prior notice to you.   You further agree that you will cooperate with any investigation  regarding violations of the Terms of Service, including cooperation with law  enforcement for investigations regarding criminal activity.  <br />
                            <strong>7.  FEES/COSTS.  </strong>Studio reserves the right to make changes to any fees or costs charged  for the use of its Services, including charging for services that may currently  be free.  You understand that Studio  merely provides the means to broker an exchange between instructors and  students in an online marketplace where students can shop for one-on-one webcam  instruction from instructors at dates and times posted by instructors.  We provide students with the opportunity to  find and hire instructors.  We provide instructors  with the opportunity and means to offer webcam classes at a price set by the  instructor.  We facilitate the financial  transactions, collecting monies from the students, and remitting monies to  Instructors within a reasonable time after successful completion of the  purchased class.    Users further agree that Studio cannot be  held liable for transactions between the Users.  </p>
                        <p><strong>Additional Terms Applicable to Instructors Only</strong>: </p>
                        <ol>
                            <li>Instructors acknowledge that they are not employees or agents of Studio,  and that nothing contained within this Agreement, or anywhere else shall be  construed to impute, imply, suggest, or create any expectation of employment,  agency, or representation between Studio and User.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Instructors acknowledge that usage of the Product and/or Services does  not create, expressly or impliedly, any relationship akin to employee/employer,  landlord/tenant, parent/subsidiary, independent contractor, partnership,  co-ownership, membership, nor any other form of agency or representation, nor  does it create, expressly or impliedly, a joint venture relationship,  partnership, or other form of co-ownership.</li>
                        </ol>
                        <ol>
                            <li> Instructors are not charged a  subscription fee to use the Product and/or Services.  Instead, Studio shall deduct a commission fee  from an instructor&rsquo;s class fee in the manner set forth herein (&ldquo;Studio&rsquo;s  Commission Fee&rdquo; or &ldquo;Commission Fee&rdquo;).  Instructor&rsquo;s  may determine and set the amount to charge for their own class fees (must be  over $10.00 minimum) for each available class that they offer on our Services  (&ldquo;Class Fee&rdquo;).   The Studio Commission  Fee shall be ____%  of the Class Fee, and shall be charged against and deducted from the Class Fee  once it is collected from the student who has purchased a class.      Commission Fees are subject to change, from  time to time.  If Studio modifies the  amount or method of apportioning a Commission Fee, it shall state such  modifications within revised Terms of Service.   Should you use the Product and/or Services after the Terms of Service  have been revised, your use of the Product and/or Services shall serve as your  notice of, and consent to the newly revised Commission Fee and any other  revisions contained within the revised Terms of Service.</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Although Studio shall collect Class Fees from students who purchase a  class at the time such student reserves and purchases a class, the Class Fee  shall not be released to an instructor until five to ten days have lapsed after  a &ldquo;successful&rdquo; completion of the class, without dispute (see Studio&rsquo;s Dispute  Policy).  Commission Fees shall be  deducted immediately from the Class Fees, and apportioned to Studio&rsquo;s general  operating account.  Studio is under no  obligation to segregate undispersed Class Fees into a trust account or into any  interest bearing account.  No interest  shall accrue on undispersed monies. </li>
                        </ol>
                        <ol>
                            <li>Commission Fees are non-refundable, and instructors shall be liable for  Commission Fees, even in circumstances where a Class Fee has been refunded to a  student.  (see Studio&rsquo;s Dispute Policy) .</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Studio may hold Class Fees indefinitely during any periods wherein a student  has opened a complaint ticket, until such ticket has been fully resolved by  Studio, in its discretion, and/or until the instructor and student have both  mutually agreed upon settlement terms with each other and adequately conveyed  such terms to Studio without contradiction to each other.  As long as there is an open complaint ticket,  Studio shall hold onto the Class Fees.</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>Unresolved complaint tickets shall be resolved by Studio, at its own  discretion, taking into account the totality of relevant circumstances.  Both instructor and student agree to be bound  by the decision of Studio.  Instructors  and Students are urged to resolve their complaints between them.  . </li>
                        </ol>
                        <ol>
                            <li>Instructors are asked to provide bank account information for the direct  deposit of their payments from Studio.   Studio will take reasonable measures to maintain this information secure  and confidential.  Transacting business  on the internet is never free from some degree of risk.  Studio cannot guarantee the security or  confidentiality of your information, but will take reasonable measures to  secure and protect it.  As with all  communications occurring in cyberspace, you should take measures to maintain  any sensitive information secure.  You  acknowledge the potential risk in providing your bank account information to  Studio and agree to hold Studio harmless in the unlikely event that this  information is obtained and used without your authorization.  <strong> </strong></li>
                        </ol>
                        <p><strong>&nbsp;</strong></p>
                        <ol>
                            <li>Instructors will receive a blank W9 form as soon as their earned income  from Studio reaches in excess of $600 (as required by law).   You agree to return the completed W9 form  promptly to Studio, in order to prevent the permanent or temporary hold on your  Account.  The W9 form requests a social  security number or tax identifier.  Studio  will take reasonable measures to maintain this information secure and  confidential. However, Studio cannot guarantee the security or confidentiality  of this information, nor any other information shared with Studio.  As with all communications occurring in cyberspace, you  should take measures to maintain any sensitive information secure.  You acknowledge the potential risk in  providing your social security or tax identifier information to Studio and  agree to hold Studio harmless in the unlikely event that this information is  obtained and used without your authorization.  <strong> </strong></li>
                        </ol>
                        <ol>
                            <li>Instructors are responsible  for paying all taxes associated with fees earned and received.  Studio will not withhold taxes from  disbursements to instructors.  <strong></strong></li>
                        </ol>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>Additional Terms Applicable to Students Only: </strong></p>
                        <ol>
                            <li>Students are not charged a subscription fee.  Each instructor determines the Class Fee and  displays the Class Fee for each available class.  Students are only charged for the classes they  enroll in.   Class Fees, once paid, are  refundable in the following cases:</li>
                            <ol>
                                <li>Instructor &ldquo;no shows&rdquo; or begins the session more than ____ minutes after the  regularly scheduled time.</li>
                                <li>Instructor doesn&rsquo;t successfully provide the instruction that was  promised, and the student is able to adequately prove instructor&rsquo;s lack of  success to the satisfaction of Studio after following through with the Dispute  Resolution phase.</li>
                            </ol>
                        </ol>
                        <p>Since the instructors set the value of  their own Class Fees these fees are subject to change with or without prior  notice from time to time.  Students,  however, will not be affected by price changes that occur after enrollment for  that given class.  <br />
                            Class Fees are due, in full, upon enrollment.  Class Fees are made via PayPal.  PayPal may store your payment information on  their site.  We are not responsible for  the services provided by Paypal.  Studio  may accept major credit cards in the future and may choose to store payment  account information in its own database.  </p>
                        <ol>
                            <li><strong>CANCELLATIONS AND  REFUNDS. </strong></li>
                            <ol>
                                <li>Cancellations by Instructors:  Studio  understands that situations change and that a class may need to be cancelled by  an instructor.  An instructor may cancel  a class upon 24 hours prior notice without being liable to Studio for a  Commission Fee.  Should an instructor  cancel with less than 24 hours remaining before the class, or simply fail to  attend his/her own class, although student will receive a full refund of Class  Fees, the instructor may still be liable to Studio, at Studio&rsquo;s discretion, in  the amount of the Commission Fee that would have been received by Studio had  the class actually been taught.  Such  fees will be charged against any future payments to the instructor, or  otherwise shall remain as a deficit on that instructor&rsquo;s account indefinitely  until paid.   </li>
                                <li>Cancellations by Student:  Except  as specifically set forth in Studio&rsquo;s Dispute Resolution Policy, students will  not be awarded refunds.  Once a student  commits to a class they must either attend or forfeit their Class Fee for that  class.   </li>
                                <li>Cancellations for technical  reasons:  Unless the technical reason is  under the immediate control of Studio, Studio will not offer refunds for  technical issues.  Complaints that arise  from issues relating to any Users&rsquo; hardware, software, and/or internet  connectivity are non-refundable.</li>
                            </ol>
                        </ol>
                        <p>&nbsp;</p>
                        <p><strong>9.  DISSATISFACTION WITH A  CLASS</strong>.  In the event that a student is dissatisfied  with a session, a complaint may be submitted through our Product in the form of  a ticket.  Studio&rsquo;s customer service  agent will then look into the issue described on the ticket.  A simple dissatisfaction does not constitute  a refund for the class.  Each situation  will be reviewed on a case-by-case basis and a determination will be made by  Studio&rsquo;s sole discretion.  All complaint  tickets from students must be submitted no later than two (2) days after the  session; otherwise, Studio will be unable to take any action and student will  have to handle the matter directly with instructor.  </p>
                        <p>If an instructor is dissatisfied with  a session the instructor may submit a ticket informing Studio that they will  not accept future enrollment by the student in question, but there shall not be  any refund of the Commission Fee paid to Studio simply because an instructor is  dissatisfied with a student. </p>
                        <p>Unless the technical reason is under  the immediate control of Studio, Studio will not offer refunds for technical  issues.  Complaints that arise from  issues relating to any Users&rsquo; hardware, software, and/or internet connectivity  are non-refundable.</p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>10.  CLASSES.  </strong>You agree that your participation in a class, either as an  instructor or student is at your sole risk.  Studio is under no obligation to supervise classes,  although it is within their right to do so.    Studio does not employee, hire, nor  contract for hire any User of the Product and/or Services, nor is Studio even affiliated  or responsible for any acts or omissions by any User.  STUDIO DOES NOT WARRANT OR GUARANTEE THAT THE  PRODUCT AND/OR THE SERVICES ARE TO BE USED FOR ANY SPECIFIC OR IMPLIED PURPOSE,  NOR DOES IT WARRANT OR GUARANTEE THE PRODUCT AND/OR SERVICES TO BE WITHOUT  DEFECT  NOR DOES IT WARRANT OR GUARANTEE  THE TRUTH, OPINIONS, LESSONS, IDEAS, OR COMMUNICATIONS EXPRESSED BY USERS OF  PRODUCT AND/OR SERVICES..  Studio  encourages and requests that our Users exercise good judgment and caution when  attending (or allowing a minor to attend) a live class. You acknowledge and  agree that by participating in any class you may be exposed to a variety of  risks and hazards, which may or may not be foreseen, including but not limited  to, inappropriate images, personal injury, property damage and death. You accept  and understand that you are solely responsible for protecting yourself from any  and all risk, harm, and/or injury arising from your participation with the  Product and/or Services.&nbsp;TO THE  FULLEST EXTENT PERMITTED BY LAW, YOU HEREBY RELEASE STUDIO AND its agents FROM  ANY AND ALL CLAIMS OR DAMAGES OF ANY KIND OR NATURE, KNOWN OR UNKNOWN,  DISCLOSED OR UNDISCLOSED, RELATING TO YOUR PARTICIPATION IN AND/OR USE OF THE  PRODUCT AND/OR SERVICES. YOU AGREE AND UNDERSTAND AND INTEND THAT THIS  ASSUMPTION OF RISK AND RELEASE IS BINDING UPON YOU AND YOUR HEIRS, EXECUTORS,  AGENTS, ADMINISTRATORS AND ASSIGNS.<strong> </strong></p>
                        <p><strong>Additional Terms Applicable to Instructors Only:</strong></p>
                        <ol>
                            <li>You represent that you  have the requisite qualifications to teach the classes you list on the Product  in a manner that will serve to provide a student who purchases a class from you  with an experience that will be educationally enriching and rewarding. </li>
                        </ol>
                        <ol>
                            <li>You represent that you  will conduct yourself in a professional manner and abide by all laws and  regulations.  Any deviation from this  will be a violation of the Terms of Service and could result in your Account  being closed and your IP address being blocked</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You represent that you  will only request information from a student that is necessary to conduct the  class, and that you will not share or use a student&rsquo;s information with anyone  for any purpose.  Any deviation from this  will be a violation of the Terms of Service and could result in your Account  being closed and your IP address being blocked.</li>
                        </ol>
                        <ol>
                            <li>You understand that any  student may book any class you list on our Product.  You agree to not refuse enrollment by any  student for any discriminatory reason.   Any deviation from this will be a violation of  the Terms of Service and could result in your Account being closed and your IP  address being blocked</li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You understand and agree  that you are solely responsible for any and all content, User Submission, and  sessions you conduct.  </li>
                        </ol>
                        <ol>
                            <li>You understand and agree  that your profile will be public.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <p><strong>Additional Terms Applicable to Students Only:</strong></p>
                        <ol>
                            <li>You understand that the classes  offered on the Product are offered directly by the instructor.  Studio is not responsible or liable to you  for any content displayed or transmitted to you.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You represent that you  will participate in the classes for your own enjoyment and knowledge only, and you  shall not copy, share, distribute, or use any class, materials, or lectures for  purposes beyond your own immediate education and enjoyment.  </li>
                        </ol>
                        <ol>
                            <li>You understand that  Studio does not vet, background check, reference, authenticate, investigate,  credential, or confirm the instructors listed on the Product, nor does Studio  guarantee any User&rsquo;s supposed qualifications, nor does Studio require a minimum  qualification.  </li>
                        </ol>
                        <p>&nbsp;</p>
                        <ol>
                            <li>You understand and agree  that the instructor for any class you enroll in will have access to your profile  which includes the details you submit in the &ldquo;About Me&rdquo; section and any photos  you choose to upload.  DO NOT SHARE ANY  INFORMATION YOU WOULD NOT OTHERWISE BE WILLING TO HAVE SHARED PUBLICLY.     </li>
                        </ol>
                        <p><strong>11.  AVAILABILITY OF  SESSION FOR ONE WEEK</strong>.  As soon as a session  ends, Users who participated in the session will receive a link to view and/or  listen to the recorded session.  Studio  will only archive the session for one week at which point it will be deleted  and unable to be retrieved.  </p>
                        <p><strong>12.  CLASS AND USER REVIEWS  AND RATINGS.  </strong>Users have the option to  rate and review a session and give feedback on the instructor or student.  These reviews and ratings will be public for  all Users to see.  We encourage Users to  take advantage of this function to advance the marketplace of the Services and  raise quality of User participation.  Users  that decide to leave reviews and/or ratings are required to be honest and not  use these features to dishonestly &ldquo;pump&rdquo; or &ldquo;bash&rdquo; another User.  Any deviation from this will be a violation  of the Terms of Service and could result in your Account being closed and your  IP address being blocked.   Studio cannot  control the contents of the reviews and therefore you agree to not hold Studio  responsible or liable for any comments, information, or opinions that a User  may include in a review.  You must submit  and bring to our attention any review that you believe violates the Terms of  Service.  You understand that a class rating  and review is a way Users can get familiar with other Users and determine  whether they should take a class offered.  </p>
                        <p><strong>13.  THIRD PARTY SITES AND  LINKS.  </strong>Third party sites do not  have access to our Product.  However,  from time to time Studio may make a recommendation on goods or services that could  potentially enhance your experience while using the Product and/or Services or  simply be of interest to you. Studio&rsquo;s  inclusion of links to other websites is simply for your convenience.  In no way should the inclusion of a link be  seen as an endorsement of the link or the content within its website.  It is your sole responsibility to investigate  and gather the information necessary to make a determination of whether or not  you would like to use the link.  Studio  will not be liable for any links or information contained on other  websites.  Studio will not be liable for  your use of any links or purchase of any product or service.  Studio will not be liable for any other  websites failure to abide by necessary guidelines, rules, or laws. </p>
                        <p><strong>14.  MOBILE APPLICATION</strong>.  The Studio website is accessible on all smart  mobile devices.  The video conferencing  portion of our Services will only function on Flash supported devices.   Please check to make sure that your mobile  device can support Flash before attempting to use the Product and/or Services.  We are not responsible if your device or  hardware does not have the system requirements to support our Product and/or  Services.</p>
                        <p><strong>15.  DISCLAIMER OF WARRANTIES.&nbsp;<br />
                            </strong><strong><u> </u></strong><br />
                            <strong><u>STUDIO  EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED,  INCLUDING, BUT NOT LIMITED TO ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A  PARTICULAR USE OR PURPOSE, NON-INFRINGEMENT, ACCURACY OF DATA AND SYSTEM  INTEGRATION.&nbsp; STUDIO MAKES NO WARRANTY THAT THE PRODUCT OR SERVICES WILL  BE ERROR-FREE OR THAT ACCESS WILL BE UNINTERRUPTED. STUDIO MAKES NO WARRANTY  THAT ANY DOWNLOADS, FROM THE PRODUCT OR ORIGINATING FROM THE PRODUCT, WILL BE  FREE OF VIRUSES AND/OR HARMFULL DATA.</u></strong>  </p>
                        <p>&nbsp;</p>
                        <p>You understand and accept that  the Services offered by Studio may expose you to advertising and/or other  commercial transactions.  You understand  that Studio makes no representations, warranties, and guarantees nor endorses  any product or transactions you enter into.   YOU UNDERSTAND THAT SUCH TRANSACTIONS ARE MADE AT YOUR OWN RISK AND  THROUGH THIRD PARTIES.  <strong></strong></p>
                        <p>All User Submissions are comments and  opinions solely of the User.  Studio may  or may not necessarily endorse, represent or even agree or support the views,  beliefs, or expressions of any of our Users or any User Submissions.  Studio is not responsible for any deficiency,  error, truth, accuracy, and/or reliability of any User Submissions.  </p>
                        <p>You understand and agree  that Studio has no control over any third party networks or connections.  <br />
                            You further understand  that on occasions there may be temporary interruptions, transmission failures,  or other occurrences that may impair your ability to use and/or enjoy the  Product and/or Services.  You understand  and agree that the Product and its Services are provided to you <strong><u>&ldquo;AS-IS&rdquo;</u></strong> and that we assume no  responsibility for any deficiencies and/or failures.  <br />
                            <strong>16. LIMITATION OF  LIABILITY.&nbsp;&nbsp;</strong>To the fullest extent permitted by law, the total  liability, of Studio and its agents, if any liability should be found to exist  at all, to any claim or demand made by a User, or made by anyone claiming by or  through the User that they  have been  harmed or damage by Studio, including   such  alleged claims, losses,  costs or damages, including attorneys&rsquo; fees and costs and expert-witness fees  and costs of any nature whatsoever or claims expenses resulting from or in any  way related to the Product and its Services,  <u>shall not exceed the total amount of $1.00</u>.   It is intended that this limitation apply to  any and all liability or cause of action however alleged or arising, unless  otherwise prohibited by law.<strong>  </strong></p>
                        <p><strong>17. INDEMNIFICATION.&nbsp;&nbsp;</strong>You agree to indemnify, defend and hold  harmless Studio, its parents, subsidiaries, affiliates, LLC members and  managers, owners, licensors, co-branders, and suppliers and service providers,  and the officers, directors, employees, consultants, and agents of each, and  other Users, from and against any and all third-party claims, liabilities,  damages, losses, costs, expenses, fees (including reasonable attorneys' fees  and court costs) that such parties may incur as a result of or arising from (1)  User Content and any information you submit, post or transmit through the  Product or Services, (2) your use of the Product or Services, (3) your  violation of the Terms Of Service, (4) your violation of any rights of any  other person or entity or (5) any viruses, Trojan horses, worms, or other  similar harmful input by you into the Services.&nbsp;</p>
                        <p><strong>18. ENTIRE  AGREEMENT.&nbsp;&nbsp; </strong>The Terms of Service constitute the entire agreement  between Studio and you  with respect to the Product and Services.   This Agreement supersedes all prior agreements or representations,  written or oral, to the extent they relate in any way to the matter in the  Terms of Service.  This Terms of Service  govern your access to the Product and your use of its Services. </p>
                        <p><strong>19.  ARBITRATION</strong>.  Any controversy  or claim arising out of or relating to this Terms of Service, or the breach  thereof, shall be settled by arbitration administered by the American  Arbitration Association in accordance with its Commercial Arbitration Rules,  and judgment on the award rendered by the arbitrator(s) may be entered in any  court having jurisdiction thereof.  </p>
                        <p><strong>20.  ATTORNEY FEES</strong>.   In the event either party should ever institute or defend an action or proceeding  in court to enforce and/or interpret these Terms of Service, the prevailing  party at such action or proceeding shall be entitled to reasonable attorney&rsquo;s  fees and costs.</p>
                        <p><strong>21.  SEVERABILITY</strong>.   In the event that a court may deem any portion of this Terms of Service  to be unenforceable, the remainder of the Terms of Service will remain valid  and in full force.  <br />
                            &nbsp;&nbsp;<br />
                            <strong>22.&nbsp; NETWORK CONNECTIVITY. </strong>Users are  responsible for their own connectivity to the internet, as well as their own  speed of downloading, uploading, caching, processing, and saving data.  Users are responsible for their own software,  hardware, and internet service providers, as well as the speed, safety, and  security of their use of the Product and/or Services.  Users assume all risks associated with the  online world.    We are not responsible  for caching, buffering, or any other issues   and/or delays related to third party hardware, software, internet  service providers, viruses, Trojan horses, worms, spyware, bots, and/or  any bandwidth or connectivity issues, no  matter what the reason, including without limitation, those caused by traffic  on the internet, wireless systems, blackouts, brown outs,  insufficient software and/or hardware  specifications, and/or acts of nature, terrorism, work stoppages, or any other act  or omission beyond the immediate control of Studio.</p>
                        <p><strong>23. VIOLATIONS/COMPLAINTS.</strong>&nbsp; Report any violations and/or  complaints through our ticket system or chat online with one of our customer  service representatives.  </p>
                        <p><strong>24.</strong> <strong>VENUE AND CONFLICT OF LAWS.</strong>  Any dispute arising  from this contractual relationship shall be governed by Oregon law, and shall  be decided solely and exclusively by State or Federal courts and/or arbitrators  located in Portland, Oregon without giving effect to any conflicts of law  principles of such state that might refer the governance, construction or  interpretation of this Terms of Service to the Laws of another jurisdiction.  Any party who  unsuccessfully challenges the enforceability of this forum selection clause  shall reimburse the prevailing party for its attorney's fees, and the party  prevailing in any such dispute shall be awarded its attorneys' fees.</p>
                        <p><strong>25.  RIGHTS RESERVED.</strong>   Any rights of Studio not expressly granted are reserved. </p>
                        <p><strong>26.  TECHNICAL SPECS</strong>.   You are responsible for your own hardware and software.  You are responsible for making sure that your  hardware, operating system, browser, and/or other software are sufficient to  handle the Product and Services.  Make  sure that your hardware and software can stream audio and visual conferencing.  </p>
                        <p><strong>27.  BETA-USERS</strong>.  Studio takes no  responsibility for any losses, claims, injuries, expenses, or any other cost  related to your use of the service as a Beta-User.  If you are a Beta User, you acknowledge that  the Product and/or Services are not ready to go live and will inevitably likely  be susceptible to a wide-range of issues which could harm you and/or your  hardware and software.  BETA USERS ASSUME  ALL RISKS ASSOCIATED WITH THE USE AND OPERATION OF PRODUCT AND SERVICES DURING  ALL BETA PHASES.  </p>
                        <p><strong>Date of Last Revision:  &nbsp; March 23, 2014</strong>&nbsp;<br />
                            <strong>----------------------------&nbsp;</strong></p>
                        <p style="font-size : 20px">&nbsp;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        
        
        
        <!-- Modal Privacy policy -->
        <div class="modal fade" id="PrivacyPolicy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">PRICACY POLICY</h4>
                    </div>
                  <div class="modal-body" style="overflow:scroll; height: 500px;">
                        
                        <p><strong>STUDIO  NEAR, LLC – PRIVACY POLICY </strong><br>
                          <strong>Last  Edit:  February 17, 2014 </strong></p>
                        <ol>
                          <li>Introduction</li>
                          <li>Definition</li>
                        </ol>
                        <p>3.    How and What Information We  Collect <br>
                          4.    How We Use Your  Information<br>
                          5.    How We Share Your  Information<br>
                          6.    Information You Share  With Third Parties&nbsp;<br>
                          7.    How You Can Modify or  Delete Information&nbsp;<br>
                          8.    How We Protect Your  Information<br>
                          9.    Modifications this  Privacy Policy<br>
                          10.  Miscellaneous</p>
                        <p>&nbsp;</p>
                        <p><strong>1.  Introduction</strong></p>
                        <p>This  privacy policy (the &ldquo;<strong>Privacy Policy</strong>&rdquo;)  is developed with you in mind.  </p>
                        <p><u>Your  privacy matters to us</u>!  <br>
                          Accordingly, we have created this Privacy Policy in order for  you to understand how we collect, use, share, and protect your personal  information.<br>
                          We  understand the sensitivity of the collection of data and will describe in  detail how we collect, use, share, and protect your data. Studio Near, LLC (&ldquo;<strong>Studio</strong>&rdquo;, &ldquo;<strong>we</strong>&rdquo;, &ldquo;<strong>us</strong>&rdquo;, or &ldquo;<strong>our</strong>&rdquo;) owns and operates software  applications, websites, and products located at <a href="http://www.studionear.com">www.studionear.com</a><strong>, </strong>and mobile  applications associated with said software applications, websites, and products  (collectively, the &ldquo;<strong>Product</strong>&rdquo;). Through  the Product we provide instructors and students (collectively, the &ldquo;<strong>Users</strong>&rdquo;) with access to communicate with  each other via a two-way webcam where people with skills (the &ldquo;<strong>Instructors</strong>&rdquo;) may teach those seeking  to learn a skill (the &ldquo;<strong>Student</strong>&rdquo;) (collectively,  the &ldquo;<strong>Services</strong>&rdquo;).  </p>
                        <p>PLEASE READ THIS PRIVACY POLICY  CAREFULLY.  BY ACCESSING THE PRODUCT OR  USING THE SERVICES YOU AGREE TO BE BOUND BY THIS PRIVACY POLICY.  IF YOU DO NOT WISH TO BE BOUND BY THIS  PRIVACY POLICY YOU MAY NOT ACCESS OR USE THIS PRODUCT OR THE SERVICES.  </p>
                        <p>We may at our sole discretion modify,  add, or delete portions of this Privacy Policy at any time.  It is your responsibility to review this  Privacy Policy for changes prior to use of the Product and Services.  Your use of the Product or Services following  posting of changes to this Privacy Policy constitutes your acceptance of any  modifications.  We will notify you of any  such material changes by posting notice of the changes on the Product.  <br>
                          <strong>2.  Definitions. </strong></p>
                        <p><strong>&ldquo;Personal Identifiable Information&rdquo; </strong>includes your contact information, specifically:  name, address, email address, birthdate, and/or telephone number.  This is information that may be used to  identify who you are.  </p>
                        <p><strong>&ldquo;Non-Identifying Information&rdquo;</strong> refers to certain information collected during a  User&rsquo;s use of the Product and Services.  </p>
                        <p><strong>&ldquo;Cookies&rdquo;</strong> refers to small bits of  information that a website collects and then sends to your browser while you  are viewing the website to track your usage of said website.  We may use Cookies to collect Non-Identifying  Information.</p>
                        <p><strong>&ldquo;Instructors&rdquo; </strong>refers to any User who creates an account on the  Product and/or Services under the heading &ldquo;Instructor&rdquo;.  The defined term, and the usage of the term  on this website, does not imply any warranty or guarantee that a User  registering as an &ldquo;Instructor&rdquo; is actually qualified, licensed, credentialed or  even competent to act as an instructor.   Students will need to make any determination of an Instructor&rsquo;s  qualifications and abilities on their own, using their own judgment, based on their  own interactions with the Instructors via the webcam and course sessions. </p>
                        <p><strong>&ldquo;Students&rdquo; </strong>refers to any User who creates an account on the  Product and/or Services under the heading &ldquo;Student&rdquo;.  The defined term, and the usage of the term  on this website, does not imply any warranty or guarantee that a User registering  as a &ldquo;Student&rdquo; is actually a student, or someone seeking knowledge, or someone  who does not already possess the skills they seek to obtain.  </p>
                        <p><strong>&ldquo;Visitors&rdquo; </strong>refers to any individual who visits the Product, but  does not create an account.  </p>
                        <p><strong>3. How and What  Information We Collect.  </strong></p>
                        <p>When you register with Studio, we will ask for Personally Identifiable Information.  </p>
                        <p><strong>Instructor Information.  </strong><br>
                          We receive information from Users who register as Instructors on Studio.  When you set up an Account as an Instructor  you are asked to enter the following information: </p>
                        <ol>
                          <li>first and last name</li>
                          <li>date of birth (must be 18 years or older to be an Instructor)</li>
                          <li>email</li>
                          <li>phone number</li>
                          <li>address</li>
                          <li>picture upload</li>
                          <li>years of experience</li>
                          <li>qualifications</li>
                          <li>language</li>
                          <li>Education detail</li>
                          <li>Experience detail</li>
                        </ol>
                        <p>Accounts are set up for log-in using an email address as a username, and  a password for security.  The User selects  the password, and the User takes all responsibility for choosing a password  that is sufficiently secure.  Instructors  are asked to provide bank account information where the direct deposits of the  earned course fees will be deposited. In addition, we will also collect  Non-Identifying Information.  </p>
                        <p><strong>Student Information. </strong><br>
                          We receive information from Users who register as Students on  Studio.  When you set up an Account as a  Student you are asked to enter the following information:</p>
                        <ol>
                          <li>first and last name</li>
                          <li>date of birth </li>
                          <li>email</li>
                          <li>phone number (optional)</li>
                          <li>address (optional)</li>
                          <li>picture upload (optional)</li>
                        </ol>
                        <p>Accounts are set up for log-in using an email address as a username, and  a password for security.  The User selects  the password, and the User takes all responsibility for choosing a password  that is sufficiently secure.  In  addition, we will also collect Non-Identifying Information. <br>
                          <br>
  <u>We do not collect or store credit card numbers in our database</u>.  <br>
                          PayPal processes all of the Students&rsquo; transactions, and the  information you provide to PayPal is subject to PayPal&rsquo;s own privacy policy, as  stated on Paypal&rsquo;s website.  PayPal does  not provide Studio with any of the credit card information you provide to  them.  In the event, credit card numbers  were to be stored in our database they would be subject to this Privacy  Policy.  <br>
  <strong>Video Recordings</strong><br>
                          We  collect video recordings of all two-way sessions conducted by and participated  in by Users.  The recordings are archived  in our database for a period of one-week from the date of the course  session.  The video recordings include  the session, as recorded at the time of the Services.  <strong></strong></p>
                        <p><strong>Visitor Information.</strong>&nbsp; <br>
                          We  collect Non-Identifying Information from Visitors to the site.  </p>
                        <ol>
                          <li><strong>Information We Collect via  Technology.&nbsp;&nbsp;</strong></li>
                          <li>Cookies are used to  collect Non-Identifying Information from all Users of the Product, including Visitors.   The  Non-Identifying Information collected includes, but is not limited to: </li>
                        </ol>
                        <p>      1.  your browsing activities; <br>
                          2.  hardware and software information; <br>
                          3.  your  internet speed; <br>
                          4.  ip address; <br>
                          5.  geographic location; and, <br>
                          6.  advertisement preferences.   </p>
                        <p>You  have the option to limit the access of Cookies via your browser and other  software applications, but keep in mind that restricting access of Cookies may  interfere with the full experience the Services have to offer.  </p>
                        <ol>
                          <li>&nbsp;</li>
                          <li><strong>Information We Collect via</strong> <strong>Mobile Services</strong>.&nbsp;</li>
                          <li>We collect Non-Identifying Information from your  mobile device in the same manner we collect from the web browser.  This information is generally used to assist  us in improving the Services.  Some  examples of collected information via the mobile service are:</li>
                        </ol>
                        <p>      1.   your location;<br>
                          2.  the type of mobile device used;<br>
                          3.  how you use the mobile service;<br>
                          4.  operating system and software version on your  mobile device;<br>
                          5.  mobile device carrier information; and,<br>
                          6.  data relating to instances of the Product  crashing on your mobile device.</p>
                        <p>The  collection of this data is for the purpose of providing you with the best  possible service on the applications.   Studio is able to identify and correct bugs that may be in the mobile  version of the Product with the assistance of the Non-Identifying  Information.  This information is not  traceable to a specific individual and cannot be utilized to identify a single  person.  The information is sent as a  batch of data report.  </p>
                        <p><strong>4.  How We Use Your Information</strong><br>
                          <strong>Information  From Users Who Register as Instructors.&nbsp;</strong><br>
                          We will  use your information to:</p>
                        <ol>
                          <li>Administer  your account;</li>
                          <li>Enable you to provide the Service to Students; </li>
                          <li>Respond to your requests;</li>
                          <li>Resolve disputes and/or troubleshoot problems; </li>
                          <li>Improve the functionality of the Product; and, </li>
                          <li>Communicate  with you about the Product.</li>
                        </ol>
                        <p><strong>Information  From Users Who Register as Students.&nbsp;</strong><br>
                          We will  use your information to:  </p>
                        <ol>
                          <li>Administer  your account; </li>
                          <li>Enable you to communicate with Instructors; </li>
                          <li>Enable your Instructors to communicate with you; </li>
                          <li>To provide you with customer support related to  the Product; </li>
                          <li>Respond to your requests, resolve disputes  and/or troubleshoot problems;</li>
                          <li>Improve the functionality of the Product; and, </li>
                          <li>Communicate  with you about the Product.</li>
                        </ol>
                        <p>If you  decide to opt-out of receiving emails from us, please submit your request to our  ticket system on our Product.  Please  note that even if you elect to opt-out, we may still send you certain Product  related communications that we deem important.</p>
                        <p><strong>Non-Identifiable  Collected Information</strong><br>
                          We use your Non-Identifiable Information to help diagnose  problems with our server, to administer our Service, and to analyze traffic  patterns on the Service. We use cookies and similar technology to assist us in delivering  content specific to your interests.  In  addition, we may track information about the visits to the Service. For  example, we may assemble statistics that show the number of visitors to the Product,  the number of enrollments for a particular course or type of course, and what  geographical areas those enrollments come from. These aggregated statistics are  used internally to better provide services to the public and may also be  provided to affiliated third parties.<br>
  <strong>Video Recordings</strong><br>
                          We  archive the video recording of sessions conducted and participated in by our  Users.  At the end of each session, each  User who took a part in the session will receive a link to download the session  and save the session on their hardware.   The archived session is deleted from our database after one-week from  the completion of the session.  Studio  may elect to use some or all of the video recording sessions for marketing  purposes, including the images, likenesses, and/or audio recordings of the  Users.  Studio may also use still  pictures of the sessions to use in brochures, the website, and other marketing  material.  The marketing purposes may  include the promotion of the Product and Services in social media and/or other  marketing avenues.  </p>
                        <p>&nbsp;</p>
                        <p><strong>5.  How We Share Your Information</strong>&nbsp;<strong> </strong><br>
                          Studio  does not sell or share any information submitted by Users to any unaffiliated  third party, except with your consent or as otherwise set forth in this Privacy  Policy.  </p>
                        <p>Studio  will only share Personal Identifiable Information when required to comply with  relevant laws or to respond to request from law enforcement or other government  officials relating to investigations or alleged illegal activity, in which case  we may disclose said information without subpoenas or warrants to such parties  and agencies. In addition, Studio may share bank account information with third  parties who facilitate the processing of payments between Studio and the  Instructors.  </p>
                        <p><u>Instructors&rsquo;  profiles are public</u>.  <u>Students&rsquo;  profiles are not public and only become visible to an Instructor after the  Student&rsquo;s enrollment into that Instructor&rsquo;s class(es)</u>.  Upon enrollment, the Instructor will have  access to the Student&rsquo;s profile and details submitted.  For example, Instructors will have access to  the Student&rsquo;s profile photo and information submitted under the &ldquo;About Me&rdquo;  section. </p>
                        <p>Although,  Personal Identifiable Information of a User is not shared (except as set forth  above), Non-Identifying Information may be shared with third parties who may be  hired by Studio to enhance the functionality, efficiency or visibility of the  Product.  Third parties may include  contractors, consultants, affiliates and/or employees of Studio.  </p>
                        <p>Studio  may also use Personal Identifiable Information as well as Non-Identifying  Information for marketing purposes.  The  marketing purposes, include, but are not limited to, recommendations to  Students about what courses to enroll in or what courses they may be interested  in.  </p>
                        <h1>6.&nbsp;Information You Share With Third Parties</h1>
                        <p>Studio  does not verify or confirm the authenticity of any of its Users.  Any information you disclose via the Product  is at your discretion and at your own risk.   Studio does not control the privacy policies of any other entity or  website, and as such Studio strongly recommends you review the privacy policy  of each entity and/or website you disclose information to, or of any link you  follow, including, without limitation, links posted on the Product regarding  hardware recommendations.  </p>
                        <h1>7.&nbsp;How You Can Modify or Delete Your Information</h1>
                        <p><strong>Modification  of Information by Studio</strong>.&nbsp; <br>
                          Users  may update, change, delete or add information to their profiles at  anytime.  Studio only requires a name and  email address to be part of the profile at all times, unless you are registered  as an Instructor.  An Instructor&rsquo;s  profile requires additional information.   Aside from being able to delete a User&rsquo;s account, in total, Studio cannot  verify, modify or otherwise alter any of User&rsquo;s information. Users may delete  their account by sending a request through our ticket system available on our  Product.  <br>
  &nbsp;&nbsp;<br>
  <strong>8.&nbsp;How  We Protect Your Information</strong></p>
                        <p>We take strong  measures to protect your information. We use MD5 encryption and use our hosting  company&rsquo;s firewall, router, and access control to protect all of our User&rsquo;s  information.  Our hosting company further  uses physical, electronic, and managerial procedures to protect the security  and safety of all the collected information.   Studio, its employees, affiliates, third party members, or consultants  do not have access to our hosting company&rsquo;s devices therefore creating a higher  level of security.   </p>
                        <p>Ultimately,  you are responsible for the security of your account and any information you  decide to share.  </p>
                        <p><strong>Inherent  Risks</strong>. &nbsp; <br>
                          While we  try to use the highest level of security measures, we cannot guarantee the  security of any information you submit to Studio or share with any other Users.  Due to the ever-evolving technology available,  Studio cannot guarantee your transmissions over the Internet or data storage  facilities will ever be secure.  Any  transmissions you make, you do so at your own risk.  </p>
                        <p><strong>Violations</strong>. <br>
                          You  should report any security violations through our ticket system available on  our Product.  </p>
                        <h1>9.&nbsp;Modifications to this Privacy Policy</h1>
                        <p>Studio  reserves the right to make changes to this Privacy Policy at any time and  without advance notice.  The most updated  Privacy Policy will be made available on this page.&nbsp; We may, but are not  required, to send you notice via email of any material changes to this Privacy  Policy.&nbsp; You understand that your continued use of our Product after the  posting of any revisions will constitute an acknowledgement of the changes and  an unquestionable assent to the changes.</p>
                        <h1>10. Miscellaneous</h1>
                        <p><strong>Children  under age 18</strong>.<br>
                          If you  are under the age of 18 do not input any Information or use our Product and/or  Services unless you have consent from your parent or legal guardian.  Parents and legal guardians take sole  responsibility for their minor&rsquo;s use of the Product and its Services.  </p>
                        <p><strong>Terms of Service</strong>. <br>
                          Please  take the time to also review the Terms of Service, as they apply to all  Visitors and Users.</p>
                        <p><strong>Instructors</strong><br>
                          Instructors  are bound by our Terms of Service.   Instructors are not employees of Studio.   All transactions made through our Product are between the Instructors  and the Students.  As a result, Studio  cannot control Instructors&rsquo; actions and shall not be held liable for the  actions taken. </p>
                        <p><strong>Voluntary Disclosures</strong><br>
                          Please  be aware that any information you disclose in public areas becomes publically  available.  If there is information you  do not want to share or disclose, please refrain from including such  information on your profile.  You should  exercise caution before disclosing your personal information via cyberspace or  any other public venues.  </p>
                        <p><strong>Geography</strong><br>
                          The  Service is hosted in the United States and is intended for Users in the United  States.  If you access the Product and  its Services outside of the United States, in a region whose laws and policies  regarding privacy may differ from those in the United States, you consent to  your Personal Identifiable Information and Non-Identifying Information to be  transferred to the United States, be governed under such laws, be subject to  this Privacy Policy and Terms of Service.  </p>
                        <p><strong>Questions</strong>.&nbsp; <br>
                          Please  submit any questions or concerns about our Privacy Policy, through our ticket  system available on our Product.  </p>
                        <h1>&nbsp;</h1>
<p align="center">&nbsp;</p>
                        
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                  </div>
                </div>
            </div>
        </div>

    </body>
</html>