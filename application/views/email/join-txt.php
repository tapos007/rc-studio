Hi, <?php $name = explode($username);
echo $name[0];
?>,

Thanks for registering with Studionear! Please click the link below to activate your instructor profile: <br/><br/>

<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/activate/' . $user_id . '/' . $new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/activate/' . $user_id . '/' . $new_email_key); ?></a></b></big><br />
<br />
<br />


Sincerely,
Studionear Team