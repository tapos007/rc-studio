<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.min.js"></script>
<div id ="notification" class="noty" data-noty-options='{"text":"<?php echo $this->session->flashdata('msg'); ?>","layout":"top","type":"information"}'>
</div>
<?php if ($this->session->flashdata('msg')) { ?>	
    <script type="text/javascript">
        window.onload = function() {
            $("#notification").click();
        }
    </script>	<?php }
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.cleditor').cleditor();

    });
</script>
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
            $email = $this->tank_auth->get_user_email();
            $searchPreference = $this->db->query("select * from tbl_search_preference where UserID = '" . $email . "'"); //***
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'advance_search');
            echo form_open('teacher/save_keyword_preference', $attributes);
            //if ($searchPreference->result()->num_rows() != 0):
            foreach ($searchPreference->result() as $SearchPref1):
                $SearchPref = $SearchPref1;
            endforeach; // Search Preference Loop 
            //print_r($SearchPref);
            ?>
            <div class="box-content">

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="appendedInput">Search Keywords</label>
                    <div class="col-sm-10">
                        <div class="input-append">
                            <input type="hidden" name="AllSubCatList"  id="AllSubCatList" value = "<?php
                            if ($searchPreference->num_rows() != 0) {
                                echo $SearchPref->SubCategory;
                            }
                            ?>" onclick = "chkValue()">
                            <textarea class="cleditor" name="Keyword" id="Keyword" style="width: 300px; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"><?php
                            if ($searchPreference->num_rows() != 0) {
                                echo $SearchPref->Keywords;
                            }
                            ?></textarea>
                        </div>
                        <span class="help-inline">Please specify Keywords that people may search for. For example Acoustic Guitar, Bass Guitar</span>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button class="btn">Cancel</button>
                </div>

            </div><!--/box-->
            <table class="table">
                <th>
                </th>
                <tr>
<?php $i = 1;
$categories = $this->db->query('SELECT Category FROM tbl_category');
?> 
                            <?php foreach ($categories->result() as $category): ?>
                        <td  style ="vertical-align:text-top; width : 300px;"> 
                            <div class="form-group">	
                                <label class="control-label"><b><?php echo $category->Category; ?></b></label>
    <?php
    $sub_cats = $this->db->query('SELECT SubCategory FROM tbl_subcategory where Category = "' . $category->Category . '"');
    $j = 0;
    foreach ($sub_cats->result() as $sub_cat): $i++;
        $j++
        ?>  
                                    <div class="controls">
                                        <label class="checkbox inline">
                                            <div class="checker" id="subcat1<?php echo $i; ?>">
                                                <span class="checked">
                                                    <?php
                                                    if ($searchPreference->num_rows() != 0) {
                                                        $pos = strpos($SearchPref->SubCategory, $sub_cat->SubCategory);
                                                        if ($pos === false) {
                                                            ?>
                                                            <input type="checkbox" name="SubCatPost<?php echo $i; ?>" id="SubCatPost<?php echo $i; ?>" value="<?php echo $sub_cat->SubCategory; ?>" onclick="check('SubCatPost<?php echo $i; ?>')" />								
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <input type="checkbox" name="SubCatPost<?php echo $i; ?>" checked id="SubCatPost<?php echo $i; ?>" value="<?php echo $sub_cat->SubCategory; ?>"  onclick="uncheck('SubCatPost<?php echo $i; ?>')" />								
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <input type="checkbox" name="SubCatPost<?php echo $i; ?>" id="SubCatPost<?php echo $i; ?>" value="<?php echo $sub_cat->SubCategory; ?>" onclick="check('SubCatPost<?php echo $i; ?>')" />
        <?php }
        ?>
                                                </span>
                                            </div>
                                    <?php echo $sub_cat->SubCategory;
                                    ?>
                                        </label>
                                    </div>
                            <?php
                            if ($j % 25 == 0)
                                echo "</td><td style ='vertical-align:text-top; width = 300px;'>";
                        endforeach; //SubCat Loop 
                        ?>
                            </div>
                        </td><?php
                    endforeach; //Category Loop  
                    //if ($searchPreference->num_rows() != 0):
                    //endif;
                    ?>
                </tr>
            </table>
        </div>
    </div><!--/col-->
<?php echo form_close(); ?>
    <script type='text/javascript'>

        function check(CheckBoxName) {
            document.getElementById(CheckBoxName).checked = true;
            var SubCat = document.getElementById(CheckBoxName).value;
            var textbox = document.getElementById('AllSubCatList');
            textbox.value = textbox.value + ', ' + SubCat;
            //alert(textbox.value);
        }
        function uncheck(CheckBoxName) {
            document.getElementById(CheckBoxName).checked = false;
            var RemovedItem = document.getElementById(CheckBoxName).value;
            var textbox = document.getElementById('AllSubCatList');
            var textValue = textbox.value;
            var newValue = textValue.replace(RemovedItem, " ");
            textbox.value = newValue;
        }
        /*function chkValue(){
         var textbox = document.getElementById('AllSubCatList');
         textbox.value = textbox.value + "Tor Nanire Digbazi";
         //var tmp = document.getElementByID('AllSubCatList').value
         }*/
    </script>