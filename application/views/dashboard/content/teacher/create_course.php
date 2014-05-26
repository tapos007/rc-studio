
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.min.js"></script>


<div id ="notification" class="noty" data-noty-options='{"text":"<?php echo $this->session->flashdata('msg'); ?>","layout":"top","type":"information"}'>
</div>

<script>
    $(document).ready(function() {
        $('#number_of_session').on('change', function() {
            var days = parseInt($('#number_of_session').val());
            
            var counter = 2;
           while (counter <=days)
            {
                var data_row = '<tr>';
                data_row += '<td>';
                data_row += '<input type="text" class="form-control date-picker" name="day' + counter + '"data-date-format="mm/dd/yyyy"/>';
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
                counter++;
               
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
        $('body').on('focus', ".date-picker", function() {
            $(this).datepicker();
        });
        $('body').on('focus', ".timepicker", function() {
            $(this).timepicker();
        });
    });
</script>
<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Create A Course</h2>
            <div class="box-icon">

                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'createCourseForm');
            echo form_open('teacher/save_create_couse', $attributes);
            ?>	

            <div class="form-group">
                <label for="course_name" class="col-sm-2 control-label">Course Name</label>
                <div class="col-sm-10 col-lg-6">
                    <input type="text" class="required form-control" name="course_name" id="course_name" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputcategory" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10 col-lg-6">
                    <select class="form-control" name="tip_category" id="inputcategory" onchange="select_value(this.value)">
                        <option value="">Select Category </option>  
                        <?php $categories = $this->db->query('SELECT Category FROM tbl_category'); ?> 
                        <?php foreach ($categories->result() as $category): ?>
                            <option value="<?php echo $category->Category; ?>"><?php echo $category->Category; ?>
                            </option>    
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="sub_category" class="col-sm-2 control-label">Sub Category</label>
                <div class="col-sm-10 col-lg-6"> 
                    <select class="form-control" name="tip_subcategory" name="sub_category" id="sub_category">
                        <div class="form-control" id ="sub_category">
                            <option value="">Select Category</option>  
                        </div>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="maximum_students" class="col-sm-2 control-label">Maximum Students</label>
                <div class="col-sm-10 col-lg-6">
                    <input class="form-control" name="maximum_students" id="maximum_students" type="text"  />
                </div>
            </div>
            <div class="form-group">
                <label for="duration_session" class="col-sm-2 control-label">Duration Per Session (Minutes)</label>
                <div class="col-sm-10 col-lg-6">
                    <input class="form-control" name="duration_session" id="duration_session" type="text"  />
                </div>
            </div>
            <div class="form-group">
                <label for="fees_per_student" class="col-sm-2 control-label">Fees Per Student (USD)</label>
                <div class="col-sm-10 col-lg-6">
                    <input class="form-control" name="fees_per_student" id="fees_per_student" type="text"  />
                </div>
            </div>
            <div class="form-group">
                <label for="number_of_session" class="col-sm-2 control-label">Number of Session</label>
                <div class="col-sm-10 col-lg-6">
                    <input class="form-control" name="number_of_session" id="number_of_session" type="text"  />
                </div>
            </div>
            <div class="hidden">
                <label for="total_hour" class="col-sm-2 control-label">Total Course Hour</label>
                <div class="col-sm-10">
                    <input class="form-control" name="total_hour" id="total_hour" type="number" min="1" max="12" value="1" />
                </div>
            </div>
            <div class="hidden">
                <label for="start_date" class="col-sm-2 control-label">Start Date</label>
                <div class="date col-sm-4"> 
                    <input type="text" class="form-control date-picker" readonly name="start_date" id="start_date" data-date-format="mm/dd/yyyy"/>
                </div>
            </div>
            <div class="hidden">
                <label for="end_date" class="col-sm-2 control-label">End Date</label>
                <div class="date col-sm-4">

                    <input type="text" class="form-control date-picker" readonly name="end_date" id="end_date" data-date-format="mm/dd/yyyy"/>

                </div>
            </div>
            <div class="form-group">
                <table class="table table-striped table-bordered" id="addRow">
                    <thead>
                        <?php $Count = 2; ?>
                        <tr>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Flexible to Student</th>
                        </tr>
                    </thead>   
                    <tbody >
                        <tr>
                            <td>
                                <input type="text" class="form-control date-picker"  name="day1" id="start_date" data-date-format="mm/dd/yyyy"/>

                            </td>
                            <td>
                                <div class="input-group col-sm-4 bootstrap-timepicker">
                                    <input  name="start_time1" type="text" class="form-control timepicker" />
                                    <span class="add-on"><i class="icon-time"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="input-group col-sm-4 bootstrap-timepicker">
                                    <input type="text" name="end_time1" id="end_time1"  class="form-control timepicker"  value="" />
                                    <span class="add-on"><i class="icon-time"></i></span>
                                </div>
                            </td>
                            <td>
                                <select id="Flexibility" name="Flexibility1" class="form-control">
                                    <option value="Flexible" id = "Flexible" name = "Flexible1">Flexible</option>
                                    <option value="Not Flexible" id = "NotFlexible" name ="NotFlexible1">Not Flexible</option>											
                                </select>
                            </td>
                        </tr>										
                    </tbody>
                </table>
                
            </div>
            <div class="form-group">
                <label for="Overview" class="col-sm-2 control-label">Overview</label>
                <div class="col-sm-10 col-lg-6">
                    <textarea class="cleditor" rows="4" cols="100" name="Overview" id="Overview"> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="QualificationForStudent" class="col-sm-2 control-label">Qualification for Student</label>
                <div class="col-sm-10 col-lg-6">
                    <textarea class="cleditor" rows="4" cols="100" name="QualificationForStudent" id="QualificationForStudent"> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="Requirements" class="col-sm-2 control-label">Requirements</label>
                <div class="col-sm-10 col-lg-6">
                    <textarea class="cleditor" rows="4" cols="100" name="Requirements" id="Requirements"> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="VideoLink" class="col-sm-2 control-label">VideoLink</label>
                <div class="col-sm-10">
                    <input class="form-control" name="VideoLink" id="VideoLink"  type="text" onblur="YoutubeValidation(this.value);" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-success" value="submit" name="submit" id="submit">
                    <button type="reset"  class="btn">Cancel</button>
                </div>
            </div>

            <?php echo form_close(); ?>    

        </div>
    </div>
</div>
<style>
    label.error{
        font-weight: bold;
        color: red;
    }
</style>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script>
                        $(document).ready(function() {
                            $.validator.addMethod("regex", function(value, element, regexp) {

                                var check = false;

                                return this.optional(element) || regexp.test(value);

                            },
                                    "Please check your input."

                                    );

                            $("#createCourseForm").validate({
                                rules: {
                                    course_name: "required",
                                    tip_category: "required",
                                    tip_subcategory: "required",
                                    maximum_students: {
                                        required: true,
                                        range: [1, 12]
                                    },
                                    duration_session: {
                                        required: true,
                                        min: 30,
                                        max: 180
                                    },
                                    fees_per_student: "required",
                                    number_of_session: "required",
                                    
                                    Overview: "required",
                                    VideoLink: {
                                        regex: /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\/|v\/|watch\?v=|embed\?.+&v=))((\w|-){11})(?:\S+)?$/

                                    }
                                },
                                messages: {
                                    course_name: "Course name is required ",
                                    tip_category: "Category name is required ",
                                    tip_subcategory: "Sub category is required ",
                                    maximum_students: {
                                        required: 'Maximum students is required',
                                        range: 'Number of student must between 1 and 12'
                                    },
                                    duration_session: {
                                        required: 'Session duration is required',
                                        min: 'Minimum 30 minute',
                                        max: 'No more than 180 min'
                                    },
                                    fees_per_student: "Fees per student is required ",
                                    number_of_session: "Please provide number of session",
                                    Overview: 'Overview is required',
                                    VideoLink: "Please enter a valid Youtube Embeded URL"
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
                        });
</script>
