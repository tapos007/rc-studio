<div class="login-box">    <h2>Deactivate Account Confirmation</h2>    <?php    $att = array('class' => 'form-horizontal');    echo form_open($role . '/deactivate_account', $att);    ?>					    <input class="form-control" name="login" id="login" type="text" placeholder="Please enter username" />    <input class="form-control" name="password" id="password" type="password" placeholder="Please enter password" />                    <button type="submit" class="btn btn-primary">Confirm</button>					    <?php echo form_close(); ?></div>