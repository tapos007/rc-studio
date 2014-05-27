<script type="text/javascript">
    $(document).ready(function() {
        var visitortime = new Date();
        var timediff = -visitortime.getTimezoneOffset();
        var visitortimezone = timediff / 60;
        var modresult;
        var result = '';
        var TimeZoneResult = '';
        if (visitortimezone == 0) {
            TimeZoneResult = "UTC";
        }
        else if (visitortimezone > 0) {
            if (timediff % 60 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString();
            else if (timediff % 30 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString() + '5';
            else
                result += Math.floor(parseInt(visitortimezone)).toString() + '75';
            TimeZoneResult = "UP" + result;
        }
        else if (visitortimezone < 0) {
            visitortimezone *= -1;
            if (timediff % 60 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString();
            else if (timediff % 30 == 0)
                result += Math.floor(parseInt(visitortimezone)).toString() + '5';
            else
                result += Math.floor(parseInt(visitortimezone)).toString() + '75';
            TimeZoneResult = "UM" + result;
        }
        //alert(TimeZoneResult);
        $('.TimeZone').val(TimeZoneResult);

    });
</script>
<script type="text/javascript">
    function select_value(select_val)
    {
        var loadUrl = '<?php echo site_url('teacher/getSubCategoryByCategory'); ?>';
        if (select_val != undefined) {
            $("#subcategory").html('Loading....').load(loadUrl + "/" + select_val);
        }
    }
</script>

<style type="text/css">
    #content { background-color:white; }
</style>
<div class="col-lg-12">
    <div class="box">

        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Set Search Preference and Keyword</h2>
            <div class="box-icon">
                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'get_search_data');
            echo form_open($Role . '/get_search_data', $attributes);
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="keyword_top" class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $keyword; ?>" name="keyword" id="course_name" id="typeahead" data-provide="typeahead" data-items="4" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pricerange-top" class="col-sm-2 control-label">Price Range Minimum</label>
                        <div class="col-sm-10 ">
                            <input id="min_range" name="min_range"  class="form-control" style="width: 75%" type ="range" min ="10" max="500" step ="1" value ="10" onchange="printValue('min_range', 'min_range_value')" />
                            <input id="min_range_value" type="text" style="width: 75%"  class=" form-control" value="10" readonly="readonly" />
                        </div>
                    </div>
                    <!-- 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pricerange-top">Price Range Minimum &nbsp</label><b></b>
                        <div id ="pricerange" class="col-sm-10">
                            <input id="min_range" name="min_range"  class="form-control " type ="range" min ="10" max="2000" step ="50" value ="10" onchange="printValue('min_range', 'min_range_value')" />
                            <input id="min_range_value" type="text"  class="form-control" value="10" />
                        </div>                      
                    </div> -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pricerange-top">Price Range Maximum &nbsp</label><b></b>
                        <div id ="pricerange" class="col-sm-10 ">
                            <input id="max_range"  name="max_range"  class="form-control" style="width: 75%" type ="range" min ="10" max="500" step ="1" value ="500" onchange="printValue('max_range', 'max_range_value')" />
                            <input id="max_range_value" style="width: 75%" type="text"  class="form-control" value="500" readonly="readonly" />
                        </div>
                    </div> 						<!-- End Sub Category -->
                    <!-- End Skill Level -->
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="category_top">Category</label>
                        <div class="controls col-sm-10">
                            <select name="category"  id="category" onchange="select_value(this.value)"  class="form-control">
                                <option value="Any">-Any- </option>  
                                <?php $categories = $this->db->query('SELECT Category FROM tbl_category'); ?> 
                                <?php foreach ($categories->result() as $category): ?>
                                    <option value="<?php echo $category->Category; ?>"><?php echo $category->Category; ?>
                                    </option>    
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="subcategory_top">Sub Category</label>
                        <div class="controls col-sm-10">
                            <select name="subcategory"  id = "subcategory" class="form-control">
                                <div class="controls" id ="subcategory">
                                    <option value="Any">-Any-</option>  
                                </div>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="experience_top">Instructor's Experience</label>
                        <div class="controls col-sm-10">
                            <select name="experience"  id = "experience" class="form-control">
                                <div class="controls" id ="experience">
                                    <option value="0 and 100">-Any-</option>
                                    <option value="1 and 2">1-2</option>
                                    <option value="3 and 5">3-5</option>
                                    <option value="5 and 10">5-10</option>
                                    <option value="10 and 100">above 10</option>
                                </div>
                            </select>
                        </div>
                    </div>		
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Listing By: </label>
                        <div class="controls col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="ListingOption" id="ListingOptions1" value="Instructor" checked="checked">
                                Instructor
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="ListingOption" id="ListingOptions2" value="Course">
                                Course
                            </label>
                        </div>
                    </div>

                </div>
                <input type="hidden" name="TimeZone4" class="TimeZone" value="" />
                <div style="text-align:center;"><button type="submit" class="btn btn-primary">Search</button></div>
                <?php echo form_close(); ?>  
            </div>  		

        </div>
    </div>
</div>
<?php if ($ListingOption == "Instructor") { ?>
    <?php
    $TeacherSR = $this->db->query($Query); //***
    ?>
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>List by Instructor</h2>
            <div class="box-icon">

                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class=" table advanceSearch">
                <?php foreach ($TeacherSR->result() as $profile) { ?>

                    <td>
                        <img alt="Jane" src="<?php echo base_url(); ?>public/dashboard/upl/<?php echo $profile->Picture; ?>" width="60px" height="60px" alt="Recursion" />
                    </td>
                    <td>
                        <p class="" style="vertical-align:text-top;">
                            <b><?php echo $profile->username; ?></b><br>
                            <i class="icon-money"></i>&nbsp;&nbsp; Hourly Rate: <span class="seostars">
                                <strong><?php echo $profile->RatePerHour; ?></strong>  <i>USD</i><br>
                                <?php
                                $rating = $this->db->query("select AVG(RatingPointTeacher) as avg_rating from tbl_rating where TeacherID = '" . $profile->UserID . "'"); //***
                                foreach ($rating->result() as $rat) {
                                    $urtng = $rat->avg_rating;
                                    if ($urtng <= 0): echo "<i class='star star-0'></i>";
                                        ?>
                                    <?php elseif ($urtng <= .5): echo "<i class='star star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 1): echo "<i class='star star-1'></i>"; ?>
                                    <?php elseif ($urtng <= 1.5): echo "<i class='star star-1 star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 2): echo "<i class='star star-2'></i>"; ?>
                                    <?php elseif ($urtng <= 2.5): echo "<i class='star star-2 '></i>"; ?>
                                    <?php elseif ($urtng <= 3): echo "<i class='star star-3 '></i>"; ?>
                                    <?php elseif ($urtng <= 3.5): echo "<i class='star star-3 star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 4): echo "<i class='star star-4 '></i>"; ?>
                                    <?php elseif ($urtng <= 4.5): echo "<i class='star star-4 star-half'></i>"; ?>
                                    <?php elseif ($urtng <= 5): echo "<i class='star star-5'></i>"; ?>
                                        <?php
                                    else: echo "<i class='star star-0'></i>";
                                    endif;
                                }
                                ?>
                                </p>
                                </td>
                                <td>
                                    <i class="icon-map-marker"></i>&nbsp;&nbsp; Location: <span class="seostars">
                                        <strong><?php echo $profile->Country; ?></strong>  <i><?php echo $profile->State; ?></i>
                                        <br><i class="icon-comment"></i>&nbspYears of Experience: <span class="seostars">
                                            <strong><?php echo $profile->YearOfExperince; ?></strong> 
                                            <br><i class="icon-calendar"></i>&nbsp;Member Since: <span class="seostars">
                                                <strong><?php echo date("m/d/Y ", strtotime($profile->CreatedOn)); ?></strong>  <i></i>
                                                </td>
                                                <td>

                                                    <a type="button" href="<?php echo site_url('view_profile/teacher_profile/' . base64_encode($profile->UserID)); ?>"  class="btn btn-success btn-next" data-last="Finish">View Profile</a><br/>
                                                    <a type="button" href="<?php //echo site_url('welcome/loginUnregistered');                ?>" class="btn btn-prev" data-toggle="modal" data-target="#message" data-last="Finish">Send Message</a>

                                                </td>

                                                </tr>
                                            <?php } ?>
                                            </table>
                                            </div>
                                            </div>

                                            <?php
                                        }
                                        if ($ListingOption == "Course") {
                                            ?>                                                  
                                            <?php
//echo $Query;
                                            $CourseSR = $this->db->query($Query); //***
                                            ?>
                                            <div class="box">
                                                <div class="box-header">
                                                    <h2><i class="fa fa-edit"></i>List by Course</h2>
                                                    <div class="box-icon">

                                                        <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                                        <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                                <div class="box-content">
                                                    <table class="table">
                                                        <?php foreach ($CourseSR->result() as $course_info): ?>
                                                            <tr>
                                                                <td>
                                                                    <img alt="Recursion" src="<?php echo base_url(); ?>public/dashboard/course/<?php echo $course_info->Category; ?>.jpg" width="60px" height="60px" class="img-responsive" alt="Sample Image 6" />
                                                                </td>
                                                                <td>

                                                                    <p> <?php echo $course_info->CourseName; ?></p>
                                                                    <p>
                                                                        <?php
                                                                        $rating = $this->db->query("select AVG(RatingPointTeacher) as avg_rating from tbl_rating where CourseID = '" . $course_info->CourseID . "'"); //***
                                                                        foreach ($rating->result() as $rat) {
                                                                            $urtng = $rat->avg_rating;
                                                                            if ($urtng <= 0): echo "<i class='star star-0'></i>";
                                                                                ?>
                                                                            <?php elseif ($urtng <= .5): echo "<i class='star star-half'></i>"; ?>
                                                                            <?php elseif ($urtng <= 1): echo "<i class='star star-1'></i>"; ?>
                                                                            <?php elseif ($urtng <= 1.5): echo "<i class='star star-1 star-half'></i>"; ?>
                                                                            <?php elseif ($urtng <= 2): echo "<i class='star star-2'></i>"; ?>
                                                                            <?php elseif ($urtng <= 2.5): echo "<i class='star star-2 '></i>"; ?>
                                                                            <?php elseif ($urtng <= 3): echo "<i class='star star-3 '></i>"; ?>
                                                                            <?php elseif ($urtng <= 3.5): echo "<i class='star star-3 star-half'></i>"; ?>
                                                                            <?php elseif ($urtng <= 4): echo "<i class='star star-4 '></i>"; ?>
                                                                            <?php elseif ($urtng <= 4.5): echo "<i class='star star-4 star-half'></i>"; ?>
                                                                            <?php elseif ($urtng <= 5): echo "<i class='star star-5'></i>"; ?>
                                                                                <?php
                                                                            else: echo "<i class='star star-0'></i>";
                                                                            endif;
                                                                        }
                                                                        ?>
                                                                    </p>

                                                                </td>
                                                                <td>
                                                                    <p>Session Duration (Minutes):<?php echo $course_info->HourPerSession; ?> </p>
                                                                    <p> Course Hour:<?php echo $course_info->TotalHour; ?></p> 
                                                                    <p>Fees per Student: <?php echo $course_info->CouseFree; ?></p> 
                                                                </td>

                                                                <td>
                                                                    <?php echo form_open('welcome/view_course/' . $course_info->CourseID . '/' . $course_info->BatchID); ?>
                                                                    <input type="hidden" name="TimeZone" class="TimeZone" value="" />
                                                                    <button class="btn btn-success"href="<?php echo site_url('welcome/view_course/' . $course_info->CourseID . '/' . $course_info->BatchID); ?>">
                                                                        View Course</i> </button>
                                                                    <?php echo form_close(); ?>

                                                                </td>

                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- About Us Modal -->
                                        <div class="modal fade" id="message" tabindex="-1" role="modal" aria-labelledby="aboutUsLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h1 class="modal-title" id="learnToLabel">Notice</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size : 20px">
                                                            You have to be registered in order to send messages. It takes less than 5 minutes to register and its free. Click join button it is on Home right top corner.
                                                        </p>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!-- End List by Course-->	
                                        <script type="text/javascript">
                                            function printValue(a, b)
                                            {
                                                var min_value = $('#' + a).val();
                                                $('#' + b).val(min_value);
                                            }
                                        </script>		

                                        </div><!--/row-->
                                        <!-- Start List by Instructor-->