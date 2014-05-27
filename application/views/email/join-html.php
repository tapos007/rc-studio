<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Studionear</title>
    </head>
    <body style="background-color:#666">
        <table bgcolor="#d9d9d9" cellspacing="0" cellpadding="2" style="width:100%">
            <tbody>
                <tr>
                    <td><table border="0" bgcolor="#fff" align="center" cellspacing="0" cellpadding="0" style="width:650px">
                            <tbody>
                                <tr>
                                    <td width="491">&nbsp;&nbsp;&nbsp;&nbsp; <img width="313" height="82" border="0" alt="Studionear" src="http://www.studionear.com/beta2/public/img/email_logo.png"></td>
                                    <td width="159"><span style="line-height:1.5em;font-family:Arial,Helvetica,sans-serif;color:#999999;font-size:8pt"><?php echo date("l, F j, Y", now()); ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><table border="0" cellspacing="0" cellpadding="0" style="width:650px">
                                            <tbody>
                                                <tr>
                                                    <td width="55"></td>
                                                    <td width="540" style="font-size:10pt;font-family:'Arial','sans-serif'"><p> <span style="font-family:georgia,palatino;font-size:12pt;color:#800000"><br />
                                                                Hi 
                                                                <?php $name = explode(' ', $username);
                                                                echo $name[0];
                                                                ?>,
                                                            </span> </p>
                                                        <p>Thanks for registering with Studionear! Please click the link below to activate your instructor profile:</p>
                                                        <p><b><a href="<?php echo site_url('/auth/activate/' . $user_id . '/' . $new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/activate/' . $user_id . '/' . $new_email_key); ?></a></b></p>
                                                        <p> <span style="font-family:georgia,palatino;color:#800000;font-size:12pt">Sincerely,<br />The Studionear Team. </span> </p>
                                                        <p style="text-align:center"></p>
                                                        <p style="text-align:center"> <span style="font-family:arial,helvetica,sans-serif;font-size:10pt;color:#999999"> Web Address : <a href="http://www.studionear.com">www.studionear.com </a> </span> <span style="font-family:arial,helvetica,sans-serif;font-size:10pt;color:#999999"> <br>
                                                                    Email Us : info@studionear.com <br>
                                                                        Please do not reply to this email. <a target="_blank" style="color:#336699" title="Contact the Stdionear Team" href="http://studionear.com/beta/welcome/help">Contact the Studionear Team</a> </span> </p>
                                                                        <p style="text-align:center"> <span style="font-family:arial,helvetica,sans-serif;font-size:10pt;color:#999999"> This place for address and contact Number. This place for address and contact Number. </span> </p></td>
                                                                        <td width="55"></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                        </body>
                                                                        </html>
