
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.min.js"></script>


<div id ="notification" class="noty" data-noty-options='{"text":"<?php echo $this->session->flashdata('msg'); ?>","layout":"top","type":"information"}'>
</div>


<script>
    $(document).ready(function() {
        $("#addbutton").click(function() {
            var counter = $('#countRow').val();
            //alert(counter);
            if (counter < 10)
            {
                var data_row = '<tr>';
                data_row += '<td>';
                data_row += '<select  class="form-control" name="day' + counter + '">';
                data_row += '<option value="Monday">Monday</option>';
                data_row += '<option value="Tuesday">Tuesday</option>';
                data_row += '<option value="Wednesday">Wednesday</option>';
                data_row += '<option value="Thursday">Thursday</option>';
                data_row += '<option value="Friday">Friday</option>';
                data_row += '<option value="Saturday">Saturday</option>';
                data_row += '<option value="Sunday">Sunday</option>';
                data_row += '</select>';
                data_row += '</td>';
                data_row += '<td>';
                data_row += '<div class="input-group col-sm-4 bootstrap-timepicker">';
                data_row += '<input  type="text" name="start_time' + counter + '"  class="form-control timepicker"/>';
                data_row += '</div>';
                data_row += '</td>';
                data_row += '<td>';
                data_row += '<div class="input-group col-sm-4 bootstrap-timepicker">';
                data_row += '<input type="text" name="end_time' + counter + '"  class="form-control timepicker" />';
                data_row += '</div>';
                data_row += '</td>';
                data_row += '<td><select class="form-control" id="Flexibility' + counter + '" name="Flexibility' + counter + '"> <option value="Flexible">Flexible</option><option value="Not Flexible">Not Flexible</option></select></td>';
                data_row += '</tr>';
                $('#addRow > tbody:last').append(data_row);
                counter = parseInt(counter) + 1;
                $('#countRow').val(counter);
            }
            else
            {
                alert("Can not Enter more than Seven Rows");
            }
        });



    });
    function select_value(select_val)
    {

        var loadUrl = '<?php echo site_url('teacher/getSubCategoryByCategory'); ?>';

        if (select_val != undefined) {

            jQuery("#sub_category").html('Loading....').load(loadUrl + "/" + select_val);

        }
    }

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.cleditor').cleditor();
        $('.date-picker').datepicker();
        $(".timepicker").live("click", function() {
            $(this).timepicker();
        });
    });
</script>
<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Edit Your Course</h2>
            <div class="box-icon">
                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php

            function sanitize($string) {
                $string = filter_var($string, FILTER_SANITIZE_STRING);
                $string = trim($string);
                $string = stripslashes($string);
                $string = strip_tags($string);
                return $string;
            }

            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'create_course');
            echo form_open('teacher/save_update_couse_data', $attributes);
            ?>
            <?php foreach ($course->result() as $course_info): ?>
                <input type="hidden" name="course_id" value="<?php echo $course_info->CourseID; ?>" />
                <div class="form-group">
                    <label for="course_name" class="col-sm-2 control-label">Course Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="required form-control" name="course_name" id="course_name" value="<?php echo $course_info->CourseName; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputcategory" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tip_category" id="inputcategory" onchange="select_value(this.value)">
                            <option value="">Select Category </option>  
                            <?php $categories = $this->db->query('SELECT Category FROM tbl_category'); ?> 
                            <?php foreach ($categories->result() as $category): ?>
                                <option value="<?php echo $category->Category; ?>" <?php
                                if ($course_info->Category == $category->Category) {
                                    echo 'selected';
                                }
                                ?>><?php echo $category->Category; ?>
                                </option>    
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sub_category" class="col-sm-2 control-label">Sub Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tip_subcategory" name="sub_category" id="sub_category">
                            <div class="form-control" id ="sub_category">
                                <option value="<?php echo $course_info->SubCategory; ?>" selected ><?php echo $course_info->SubCategory; ?></option>  
                            </div>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="maximum_students" class="col-sm-2 control-label">Maximum Students</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="maximum_students" id="maximum_students" type="text"  value="<?php echo $course_info->MaxofStudet; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="fees_per_student" class="col-sm-2 control-label">Fees Per Student (USD)</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="fees_per_student" id="fees_per_student" type="text" value="<?php echo $course_info->CouseFree; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="number_of_session" class="col-sm-2 control-label">Number of Session</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="number_of_session" id="number_of_session" type="text" value="<?php echo $course_info->TotalHour; ?>" />
                    </div>
                </div>
                <div class="hidden">
                    <label for="total_hour" class="col-sm-2 control-label">Total Course Hour</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="total_hour" id="total_hour" type="text" value="<?php echo $course_info->TotalHour; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="Overview" class="col-sm-2 control-label">Overview</label>
                    <div class="col-sm-10">
                        <textarea class="cleditor" rows="4" cols="100" name="Overview" id="Overview">
                            <?php
                            if ($course_info->Overview) {
                                echo $course_info->Overview;
                            }
                            ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VideoLink" class="col-sm-2 control-label">VideoLink</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="VideoLink" id="VideoLink"  type="text" value="<?php echo $course_info->VideoLink; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="QualificationForStudent" class="col-sm-2 control-label">Qualification for Student</label>
                    <div class="col-sm-10">
                        <textarea class="cleditor" rows="4" cols="100" name="QualificationForStudent" id="QualificationForStudent"> 
                            <?php echo $course_info->QualificationForStudent; ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Requirements" class="col-sm-2 control-label">Requirements</label>
                    <div class="col-sm-10">
                        <textarea class="cleditor" rows="4" cols="100" name="Requirements" id="Requirements">
                            <?php echo $course_info->Requirements; ?>
                        </textarea>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach ($batch->result() as $batch_info): ?>
                <input type="hidden" name="batch_id" value="<?php echo $batch_info->BatchID; ?>" />
                <div class="form-group">
                    <label for="duration_session" class="col-sm-2 control-label">Duration Per Session (Minutes)</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="duration_session" id="duration_session" type="text"  value="<?php echo $batch_info->SessionDuration; ?>" />
                    </div>
                </div>
                <div class="hidden">
                    <label for="start_date" class="col-sm-2 control-label">Start Date</label>
                    <div class="date col-sm-4"> 
                        <input type="text" class="form-control date-picker" name="start_date" id="start_date" value="<?php echo $batch_info->StartDate; ?>" data-date-format="mm/dd/yyyy"/>
                    </div>
                </div>
                <div class="hidden">
                    <label for="end_date" class="col-sm-2 control-label">End Date</label>
                    <div class="date col-sm-4">

                        <input type="text" class="form-control date-picker" name="end_date" id="end_date" value="<?php echo $batch_info->EndDate; ?>" data-date-format="mm/dd/yyyy"/>

                    </div>
                </div>
            <?php endforeach; ?>
            <div class="form-group">
                <table class="table table-striped table-bordered" id="addRow">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Flexible to Student</th>
                        </tr>
                    </thead>   
                    <tbody >
                        <?php $i = 0; ?>
                        <?php foreach ($schedules->result() as $schedule_info): $i++; ?>
                        <input type="hidden" name="schedule_id<?php echo $i; ?>" value="<?php echo $schedule_info->ScheduleID; ?>" />
                        <tr>
                            <td>
                                <input type="text" class="form-control date-picker"  name="schedule_date<?php echo $i; ?>" id="schedule_date<?php echo $i; ?>" data-date-format="yyyy-mm-dd" value="<?php echo $schedule_info->schedule_date; ?>"/>
                            </td>
                            <td class="center">
                                <div class="input-group col-sm-4 bootstrap-timepicker">
                                    <input  id="start_time<?php echo $i; ?>" name="start_time<?php echo $i; ?>" value="<?php echo $schedule_info->StartTime; ?>" class="form-control timepicker" />
                                    <span class="add-on"><i class="icon-time"></i></span>
                                </div>

                            </td>
                            <td class="center">
                                <div class="input-group col-sm-4 bootstrap-timepicker">
                                    <input type="text" name="end_time<?php echo $i; ?>" id="end_time<?php echo $i; ?>"  class="form-control timepicker"  value="<?php echo $schedule_info->EndTime; ?>" />
                                    <span class="add-on"><i class="icon-time"></i></span>
                                </div>


                            </td>

                            <td>
                                <select id="Flexibility" name="Flexibility<?php echo $i; ?>" class="form-control">
                                    <option value="Flexible" id = "Flexible" name = "Flexible<?php echo $i; ?>" <?php
                                    if ($schedule_info->Flexiblity == 'Flexible') {
                                        echo 'selected';
                                    }
                                    ?>>Flexible</option>
                                    <option value="Not Flexible" id = "NotFlexible" name ="NotFlexible<?php echo $i; ?>" <?php
                                    if ($schedule_info->Flexiblity == 'Not Flexible') {
                                        echo 'selected';
                                    }
                                    ?>>Not Flexible</option>											
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="hidden" name="countRow" id="countRow" value="<?php echo $i; ?>" />
                <!--<a class="btn btn-danger" id="addbutton" >Add</a>  -->
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <button class="btn">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div><!--/col-->
