<script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.min.js"></script>


<?php if ($this->session->flashdata('msg')) { ?>	
    <script type="text/javascript">
        window.onload = function() {
            $("#notification").click();
        }
    </script>	<?php }
?>

<script type="text/javascript">
    var counter = 1;
    var counter1 = 1;
    var flag = 0;
    var flag1 = 0;
    function add_rows(i)
    {
        if (flag == 0) {
            counter = i;
            flag = 1;
        }
        else {
            counter = parseInt(counter) + 1;
        }
        if (counter < 7)
        {
            var data_row = '<tr>';
            data_row += '<td>';
            data_row += '<input type="text" class="form-control"  id = "Institute' + counter + '" name="Institute' + counter + '" class="input"  value="" />';
            data_row += '<input type="hidden" id = "EducationID' + counter + '" name="EducationID' + counter + '" class="input"  value="" />';
            data_row += '</td><td>';
            data_row += '<input type="text" class="form-control" id = "Degree' + counter + '" name="Degree' + counter + '" class="input"  value="" /></td>';
            data_row += '<td><input type="text" class="form-control" id = "Major' + counter + '" name="Major' + counter + '" class="input"  value="" /></td>';
            data_row += '<td><input type="text" class="form-control" min="1950" max="2050 value="2000"  id = "StartYear' + counter + '" name="StartYear' + counter + '" class="input"  value="" style="width: 60px;"/></td>';
            data_row += '</tr>';
            $('#addRow > tbody:last').append(data_row);
            $('#countRow').val(counter);
        }
        else
        {
            alert("Can not Enter more than Seven Rows");
        }
    }
    function add_rows_experience(i)
    {
        if (flag1 == 0) {
            counter1 = i;
            flag1 = 1;
        }
        else {
            counter = parseInt(counter1) + 1;
        }
        if (counter < 10)
        {
            var data_row = '<tr>';
            data_row += '<td>';
            data_row += '<input type="text" class="form-control" id = "Position' + counter1 + '" name="Position' + counter1 + '" class="input"  value="" /></td>';
            data_row += '<input type="hidden" id = "experienceID' + counter1 + '" name="experienceID' + counter1 + '" class="input"  value="" />';
            data_row += '<td><input type="text" class="form-control" id = "Employer' + counter1 + '" name="Employer' + counter1 + '" class="input"  value="" /></td>';
            data_row += '<td><input type="text" class="form-control" min="1950" max="2020 value="2000"  id = "StartYear' + counter1 + '" name="StartYear' + counter1 + '" class="input"  value="" style="width: 60px;"/></td>';
            data_row += '<td><input type="text" class="form-control" min="1950" max="2020 value="2000"  id = "EndYear' + counter1 + '" name="EndYear' + counter1 + '" class="input"  value="" style="width: 60px;"/></td>';
            data_row += '</tr>';
            $('#addRowExperience > tbody:last').append(data_row);
            $('#countRowExperience').val(counter1);
        }
        else
        {
            alert("Can not Enter more than Seven Rows");
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#myTab a').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });

</script>

<div id ="notification" class="noty" data-noty-options='{"text":"<?php echo $this->session->flashdata('msg'); ?>","layout":"top","type":"information"}'>
</div>

<div class="col-lg-12">
    <div class="box">
        <div class="box-header">
            <h2><i class="fa fa-edit"></i>Edit My Profile</h2>
        </div>
        <?php

        function sanitize($string) {
            $string = filter_var($string, FILTER_SANITIZE_STRING);
            $string = trim($string);
            $string = stripslashes($string);
            $string = strip_tags($string);
            return $string;
        }

        $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'my_profile');
        echo form_open_multipart('teacher/save_my_profile', $attributes);
        $profile_data = $this->db->query('SELECT * FROM tbl_profile where UserID ="' . $user_email . '"');
        foreach ($profile_data->result() as $profile) {
            ?>
            <div class="box-content">
                <ul id="myTab" class="nav tab-menu nav-tabs">	
                    <li class='active'> <a href="#user" data-toggle="tab">User Info</a> </li>
                    <li> <a href="#contact" data-toggle="tab">Contact</a> </li>			
                    <li> <a href="#profile" data-toggle="tab">Profile</a> </li>
                    <li> <a href="#work" data-toggle="tab">Experience</a> </li>
                    <li> <a href="#education" data-toggle="tab">Education & Qualification</a> </li>
                </ul>
            </div>
            <div id="myTabContent" class="tab-content" style="background-color:white;">
                <div id="user" class="tab-pane active">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="box">
                                <div style = "text-align: center;"> 
                                    <img id="showImg" src="<?php echo base_url(); ?>public/dashboard/upl/<?php echo $profile->Picture; ?>"  alt="Your Picture" width="150" height="150"  />
                                </div>
                                <div style = "text-align: center;">
                                    <input class="form-control" id="picture" type="file" name="picture" />	
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="username">Name </label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" value="<?php
                                    if ($username) {
                                        echo $username;
                                    }
                                    ?>"  />
                                    <p class="help-block">Changing Name will be applied at next login.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="RatePerHour" >Select Timezone</label>
                                <div class="col-sm-10">
                                    <?php echo timezone_menu($profile->TimeZone, 'form-control'); ?>
                                </div>
                            </div>
                            <div class="hidden">
                                <label class="col-sm-2 control-label" for="DayLightSaving" >Day Light Saving</label>
                                <div class="col-sm-10">
                                    <?php if ($profile->DayLightSaving == 0) { ?>
                                        <input type="checkbox"name="DayLightSaving" value="1"/>
                                    <?php } else { ?>
                                        <input type="checkbox"name="DayLightSaving" value="0" checked />
                                    <?php } ?>
                                    <span style ="color: #CO9853 !important;">CHECK IF DAYLIGHT SAVING ON</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="DoB" >Date of Birth</label>
                                <div class="col-sm-10">
                                    <input type="text"  class="form-control date-picker" name="DoB" id="DoB" value="<?php
                                    if ($profile->DoB) {
                                        echo date('m/d/Y', (strtotime($profile->DoB)));
                                    }
                                    ?>" />
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="Language" >Language</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="Language" id="Language" value="<?php
                                    if ($profile->Language) {
                                        echo $profile->Language;
                                    }
                                    ?>" />
                                    <span class="help-inline"></span>
                                </div>
                            </div>	
                        </div>




                    </div>
                </div>
                <div id="contact" class="tab-pane">
                    <div class="row-fluid">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address">Address Line 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" id="address" 
                                       value=" <?php
                                       if ($profile->Address) {
                                           echo $profile->Address;
                                       }
                                       ?>" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address">Address Line 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address1" id="address1" 
                                       value=" <?php
                                       if ($profile->Address1) {
                                           echo $profile->Address1;
                                       }
                                       ?>" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address">City</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="City" id="City"
                                       value=" <?php
                                       if ($profile->City) {
                                           echo $profile->City;
                                       }
                                       ?>" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="state">State</label>
                            <div class="col-sm-10">
                                <select id="state" name="state" class="form-control">
                                    <option value="AL" <?php
                                    if ($profile->State == "AL") {
                                        echo "selected";
                                    }
                                    ?> >Alabama</option>
                                    <option value="AK" <?php
                                    if ($profile->State == "AK") {
                                        echo "selected";
                                    }
                                    ?> > Alaska</option>
                                    <option value="AZ" <?php
                                    if ($profile->State == "AZ") {
                                        echo "selected";
                                    }
                                    ?> > Arizona</option>
                                    <option value="AR" <?php
                                    if ($profile->State == "AR") {
                                        echo "selected";
                                    }
                                    ?> > Arkansas</option>
                                    <option value="CA" <?php
                                    if ($profile->State == "CA") {
                                        echo "selected";
                                    }
                                    ?> > California</option>
                                    <option value="CO" <?php
                                    if ($profile->State == "CO") {
                                        echo "selected";
                                    }
                                    ?> > Colorado</option>
                                    <option value="CT" <?php
                                    if ($profile->State == "CT") {
                                        echo "selected";
                                    }
                                    ?> > Connecticut</option>
                                    <option value="DE" <?php
                                    if ($profile->State == "DE") {
                                        echo "selected";
                                    }
                                    ?> > Delaware</option>
                                    <option value="FL" <?php
                                    if ($profile->State == "FL") {
                                        echo "selected";
                                    }
                                    ?> > Florida</option>
                                    <option value="GA" <?php
                                    if ($profile->State == "GA") {
                                        echo "selected";
                                    }
                                    ?> > Georgia</option>
                                    <option value="HI" <?php
                                    if ($profile->State == "HI") {
                                        echo "selected";
                                    }
                                    ?> > Hawaii</option>
                                    <option value="ID" <?php
                                    if ($profile->State == "ID") {
                                        echo "selected";
                                    }
                                    ?> > Idaho</option>
                                    <option value="IL" <?php
                                    if ($profile->State == "IL") {
                                        echo "selected";
                                    }
                                    ?> > Illinois</option>
                                    <option value="IN" <?php
                                    if ($profile->State == "IN") {
                                        echo "selected";
                                    }
                                    ?> > Indiana</option>
                                    <option value="IA" <?php
                                    if ($profile->State == "IA") {
                                        echo "selected";
                                    }
                                    ?> > Iowa</option>
                                    <option value="KS" <?php
                                    if ($profile->State == "KS") {
                                        echo "selected";
                                    }
                                    ?> > Kansas</option>
                                    <option value="KY" <?php
                                    if ($profile->State == "KY") {
                                        echo "selected";
                                    }
                                    ?> > Kentucky[C]</option>
                                    <option value="LA" <?php
                                    if ($profile->State == "LA") {
                                        echo "selected";
                                    }
                                    ?> > Louisiana</option>
                                    <option value="ME" <?php
                                    if ($profile->State == "ME") {
                                        echo "selected";
                                    }
                                    ?> > Maine</option>
                                    <option value="MD" <?php
                                    if ($profile->State == "MD") {
                                        echo "selected";
                                    }
                                    ?> > Maryland</option>
                                    <option value="MA" <?php
                                    if ($profile->State == "MA") {
                                        echo "selected";
                                    }
                                    ?> > Massachusetts[D]</option>
                                    <option value="MI" <?php
                                    if ($profile->State == "MI") {
                                        echo "selected";
                                    }
                                    ?> > Michigan</option>
                                    <option value="MN" <?php
                                    if ($profile->State == "MN") {
                                        echo "selected";
                                    }
                                    ?> > Minnesota</option>
                                    <option value="MS" <?php
                                    if ($profile->State == "MS") {
                                        echo "selected";
                                    }
                                    ?> > Mississippi</option>
                                    <option value="MO" <?php
                                    if ($profile->State == "MO") {
                                        echo "selected";
                                    }
                                    ?> > Missouri</option>
                                    <option value="MT" <?php
                                    if ($profile->State == "MT") {
                                        echo "selected";
                                    }
                                    ?> > Montana</option>
                                    <option value="NE" <?php
                                    if ($profile->State == "NE") {
                                        echo "selected";
                                    }
                                    ?> > Nebraska</option>
                                    <option value="NV" <?php
                                    if ($profile->State == "NV") {
                                        echo "selected";
                                    }
                                    ?> > Nevada</option>
                                    <option value="NH" <?php
                                    if ($profile->State == "NH") {
                                        echo "selected";
                                    }
                                    ?> > New Hampshire</option>
                                    <option value="NJ" <?php
                                    if ($profile->State == "NJ") {
                                        echo "selected";
                                    }
                                    ?> > New Jersey</option>
                                    <option value="NM" <?php
                                    if ($profile->State == "NM") {
                                        echo "selected";
                                    }
                                    ?> > New Mexico</option>
                                    <option value="NY" <?php
                                    if ($profile->State == "NY") {
                                        echo "selected";
                                    }
                                    ?> > New York</option>
                                    <option value="NC" <?php
                                    if ($profile->State == "NC") {
                                        echo "selected";
                                    }
                                    ?> > North Carolina</option>
                                    <option value="ND" <?php
                                    if ($profile->State == "ND") {
                                        echo "selected";
                                    }
                                    ?> > North Dakota</option>
                                    <option value="OH" <?php
                                    if ($profile->State == "OH") {
                                        echo "selected";
                                    }
                                    ?> > Ohio</option>
                                    <option value="OK" <?php
                                    if ($profile->State == "OK") {
                                        echo "selected";
                                    }
                                    ?> > Oklahoma</option>
                                    <option value="OR" <?php
                                    if ($profile->State == "OR") {
                                        echo "selected";
                                    }
                                    ?> > Oregon</option>
                                    <option value="PA" <?php
                                    if ($profile->State == "PA") {
                                        echo "selected";
                                    }
                                    ?> > Pennsylvania[E]</option>
                                    <option value="RI" <?php
                                    if ($profile->State == "RI") {
                                        echo "selected";
                                    }
                                    ?> > Rhode Island[F]</option>
                                    <option value="SC" <?php
                                    if ($profile->State == "SC") {
                                        echo "selected";
                                    }
                                    ?> > South Carolina</option>
                                    <option value="SD" <?php
                                    if ($profile->State == "SD") {
                                        echo "selected";
                                    }
                                    ?> > South Dakota</option>
                                    <option value="TN" <?php
                                    if ($profile->State == "TN") {
                                        echo "selected";
                                    }
                                    ?> > Tennessee</option>
                                    <option value="TX" <?php
                                    if ($profile->State == "TX") {
                                        echo "selected";
                                    }
                                    ?> > Texas</option>
                                    <option value="UT" <?php
                                    if ($profile->State == "UT") {
                                        echo "selected";
                                    }
                                    ?> > Utah</option>
                                    <option value="VT" <?php
                                    if ($profile->State == "VT") {
                                        echo "selected";
                                    }
                                    ?> > Vermont</option>
                                    <option value="VA" <?php
                                    if ($profile->State == "VA") {
                                        echo "selected";
                                    }
                                    ?> > Virginia[G]</option>
                                    <option value="WA" <?php
                                    if ($profile->State == "WA") {
                                        echo "selected";
                                    }
                                    ?> > Washington</option>
                                    <option value="WV" <?php
                                    if ($profile->State == "WV") {
                                        echo "selected";
                                    }
                                    ?> > West Virginia</option>
                                    <option value="WI" <?php
                                    if ($profile->State == "WI") {
                                        echo "selected";
                                    }
                                    ?> > Wisconsin</option>
                                    <option value="WY" <?php
                                    if ($profile->State == "WY") {
                                        echo "selected";
                                    }
                                    ?> > Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="ZipCode">ZipCode </label>
                            <div class="col-sm-10">
                                <input type="text" name="ZipCode" class="form-control" value="<?php
                                if ($profile->zipCode) {
                                    echo $profile->zipCode;
                                }
                                ?>" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="country" >Country</label>
                            <div class="col-sm-10">
                                <input type="text" name="country" class="form-control" readonly id="country"  value="<?php
                                if ($profile->Country) {
                                    echo $profile->Country;
                                }
                                ?>" />
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="phone">Phone </label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" value="<?php
                                if ($profile->Phone) {
                                    echo $profile->Phone;
                                }
                                ?>" />
                                <p class="help-block"></p>
                            </div>
                        </div>					
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="mobile">Mobile </label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile" class="form-control" value="<?php
                                if ($profile->Mobile) {
                                    echo $profile->Mobile;
                                }
                                ?>" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="alternateEmail">Alternate Email </label>
                            <div class="col-sm-10">
                                <input type="text" name="alternateEmail" class="form-control" value="<?php
                                if ($profile->AlternateEmail) {
                                    echo $profile->AlternateEmail;
                                }
                                ?>" />
                                <p class="help-block"></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="profile" class="tab-pane">


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="RatePerHour" >Rate Per Hour</label>
                        <div class="col-sm-10">
                            <input type="text"class="form-control" id="RatePerHour"  name="RatePerHour" min="10" max="500" value="<?php
                            if ($profile->RatePerHour) {
                                echo $profile->RatePerHour;
                            }
                            ?>" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="YearOfExperince" >Years of Experience</label>
                        <div class="col-sm-10">
                            <input  type="text" class="form-control" name="YearOfExperince" id="YearOfExperince" value="<?php
                            if ($profile->YearOfExperince) {
                                echo $profile->YearOfExperince;
                            }
                            ?>" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Overview">About Me</label>
                        <div class="col-sm-10">
                            <textarea class="cleditor" rows="4" cols="100" name="Overview" id="Overview">
                                <?php
                                if ($profile->Overview) {
                                    echo $profile->Overview;
                                }
                                ?>
                            </textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="VideoLinks">Video Link of Profile</label>
                        <div class="col-sm-10">
                            <input type="text" name="VideoLinks" class="form-control" value="<?php
                            if ($profile->VideoLinks) {
                                echo $profile->VideoLinks;
                            }
                            ?>" />
                        </div>
                    </div>					


                </div>
                <div id="education" class="tab-pane">


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textarea2">Education & Qualification</label>
                        <!-- Education Field Add -->											
                        <div class="col-sm-10">
                            <table class="table table-striped table-bordered" id="addRow">
                                <thead>
                                    <tr>
                                        <th>Institute</th>
                                        <th>Degree/Certification </th>
                                        <th>Major  </th>
                                        <th>Year</th>	
                                    </tr>
                                </thead>   
                                <tbody >
                                    <?php
                                    $education_data = $this->db->query('SELECT * FROM tbl_education where UserID ="' . $user_email . '"');
                                    $i = 1;
                                    foreach ($education_data->result() as $education) {
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id = "Institute<?php echo $i; ?>"  name="Institute<?php echo $i ?>" class="input"  value="<?php echo $education->Institute; ?>" />
                                                <input type="hidden" id = "EducationID<?php echo $i; ?>"  name="EducationID<?php echo $i; ?>" value="<?php echo $education->EducationID; ?>" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id = "Degree<?php echo $i; ?>" name="Degree<?php echo $i ?>" class="input"  value="<?php echo $education->Degree; ?>" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id = "Major<?php echo $i; ?>"  name="Major<?php echo $i ?>" class="input"  value="<?php echo $education->Major; ?>" />
                                            </td>
                                            <td style="width:70px">
                                                <input  type="text" class="form-control"    id = "StartYear<?php echo $i; ?>"  name="StartYear<?php echo $i ?>" class="input"  value="<?php echo $education->StartYear ?>" style="width: 60px;"/>
                                            </td>
                                        </tr>	
                                        <?php
                                        $i++;
                                    }
                                    ?>									
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="hidden" name="countRow" id="countRow" value="<?php echo $i; ?>" />
                                    <a class="btn" onclick="add_rows(<?php echo $i; ?>);">Add</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Education Field Add -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textarea2">Other Qualification</label>
                            <div class="col-sm-10">
                                <textarea class="cleditor"  name="otherQualification" id="textarea2" rows="3" style="width:490px"><?php
                                    if ($profile->OtherQualification) {
                                        echo $profile->OtherQualification;
                                    }
                                    ?> </textarea>
                            </div>
                        </div>
                    </div>


                </div>
                <div id="work" class="tab-pane">
                    <div class="row-fluid">

                        <div class="form-group">
                            <label class="control-label" for="textarea2">Work History and Experience</label>
                            <!-- Experience Field Add -->											
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered" id="addRowExperience">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Employer </th>
                                            <th>Start Year  </th>
                                            <th>End Year </th>	
                                        </tr>
                                    </thead>   
                                    <tbody >
                                        <?php
                                        $experience_data = $this->db->query('SELECT * FROM tbl_experience where UserID ="' . $user_email . '"');
                                        $i = 1;
                                        foreach ($experience_data->result() as $experience) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id = "Position<?php echo $i; ?>"  name="Position<?php echo $i ?>" class="input"  value="<?php echo $experience->Position; ?>" />
                                                    <input type="hidden" id = "experienceID<?php echo $i; ?>"  name="experienceID<?php echo $i; ?>" value="<?php echo $experience->ExperienceID; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id = "Employer<?php echo $i; ?>" name="Employer<?php echo $i ?>" class="input"  value="<?php echo $experience->Employer; ?>" />
                                                </td>
                                                <td style="width:70px">
                                                    <input  type="text" class="form-control"  id = "StartYear<?php echo $i; ?>"  name="StartYear<?php echo $i ?>" class="input"  value="<?php echo $experience->StartYear ?>" style="width: 60px;"/>
                                                </td>
                                                <td style="width:70px">
                                                    <input  type="text" class="form-control"   id = "EndYear<?php echo $i; ?>"  name="EndYear<?php echo $i ?>" class="input"  value="<?php echo $experience->EndYear ?>" style="width: 60px;"/>
                                                </td>
                                            </tr>	
                                            <?php
                                            $i++;
                                        }
                                        ?>									
                                    </tbody>
                                </table>
                                <input type="hidden" name="countRowExperience" id="countRowExperience" value="<?php echo $i; ?>" />
                                <a class="btn" onclick="add_rows_experience(<?php echo $i; ?>);">Add</a>
                            </div>
                            <!-- End experience Field Add -->
                        </div>

                    </div>
                </div>
            </div><!-- End Tab -->
        <?php } //End profile loop     ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
        </div>

        <?php echo form_close(); ?>
    </div> 
</div>

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
<!-- field valid script start-->
<script type="text/javascript">
    $.validator.addMethod("regex", function(value, element, regexp) {
        var check = false;
        return this.optional(element) || regexp.test(value);
    },
            "Please check your input."
            );
    $.validator.addMethod("alfa", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });
    $("#my_profile").validate({
        rules: {
            username: {required: true,
                alfa: "[a-zA-Z]+"
            },
            timezones: "required",
            Language: "required",
            DoB: "required",
            address: "required",
            City: "required",
            state: "required",
            ZipCode: "required",
            phone: "required",
            RatePerHour: "required",
            YearOfExperince: "required",
            Overview: "required",
            VideoLinks: {required: true,
                regex: /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\/|v\/|watch\?v=|embed\?.+&v=))((\w|-){11})(?:\S+)?$/
            }
        },
        messages: {
            username: {required: "Techer name is required",
                alfa: "Can not a number"
            },
            timezones: "Timezone is required",
            Language: "Language required",
            DoB: "Date of Birth required",
            address: "Address Line 1 required",
            City: "City is required",
            state: "State is required",
            ZipCode: "Zip-code is required",
            phone: "Phone Number is required",
            RatePerHour: "Rate Per Hour required",
            YearOfExperince: "Year of experince required",
            Overview: "Overview is required",
            VideoLinks: "Please enter a valid Youtube Embeded URL"
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
</script>
<script>
    $(document).ready(function() {
         CKEDITOR.replace( 'Overview' );
          CKEDITOR.replace( 'textarea2' );
    });
</script>