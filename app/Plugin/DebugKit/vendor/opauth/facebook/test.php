<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
    if($fgmembersite->RegisterUser())
    {
        $fgmembersite->RedirectToURL("http://xr1.spreadtutorial.com");
    }
}

?>
<?php
session_start();
$db = mysql_connect("rdbms.strato.de","U1370011","3YNQp8c3btj");
mysql_select_db("DB1370011",$db);

if (isset($_POST['name']))
    $fname = mysql_real_escape_string($_POST['name']);
if (isset($_POST['username']))
    $lname = mysql_real_escape_string($_POST['username']);
//if (isset($_POST['gender']))
//	$gender = mysql_real_escape_string($_POST['gender']);
//if (isset($_POST['country']))
//	$country = mysql_real_escape_string($_POST['country']);
//if (isset($_POST['dob']))
//	$dob = mysql_real_escape_string($_POST['dob']); 
if (isset($_POST['email']))
    $email = mysql_real_escape_string($_POST['email']);
//if (isset($_POST['address']))
//	$address = mysql_real_escape_string($_POST['address']);  
//if (isset($_POST['payment-opt']))
//	$paymentopt = mysql_real_escape_string($_POST['payment-opt']); 
//if (isset($_POST['phone']))
//	$phone = mysql_real_escape_string($_POST['phone']); 
//if (isset($_POST['mphone']))
//	$mphone = mysql_real_escape_string($_POST['mphone']); 	
//if (isset($_POST['preftrips']))
//	$preftrips = mysql_real_escape_string($_POST['preftrips']); 
//if (isset($_POST['howyoufindus']))
//	$howyoufindus = mysql_real_escape_string($_POST['howyoufindus']);
if (isset($_POST['password']))
    $password = sha1(mysql_real_escape_string($_POST['password']));
//$dateTimeVariable = date("F j, Y \a\t g:ia");
// $result_add = mysql_query("insert into users (fname,lname,email,reg_date,pass) //values('$fname','$lname','$email','$dateTimeVariable','$password');",$db);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Registrieren</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>
</head>
<body>

<!-- Form Code Start -->
<div id='fg_membersite'>
    <form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
        <fieldset >
            <legend>Register</legend>

            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <div class='short_explanation'>* required fields</div>
            <input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

            <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
            <div class='container'>
                <label for='name' >Your Full Name*: </label><br/>
                <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" /><br/>
                <span id='register_name_errorloc' class='error'></span>
            </div>
            <div class='container'>
                <label for='email' >Email Address*:</label><br/>
                <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
                <span id='register_email_errorloc' class='error'></span>
            </div>
            <div class='container'>
                <label for='username' >UserName*:</label><br/>
                <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
                <span id='register_username_errorloc' class='error'></span>
            </div>
            <div class='container' style='height:80px;'>
                <label for='password' >Password*:</label><br/>
                <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                <noscript>
                    <input type='password' name='password' id='password' maxlength="50" />
                </noscript>
                <div id='register_password_errorloc' class='error' style='clear:both'></div>
            </div>

            <div class='container'>
                <input type='submit' name='Submit' value='Submit' />
            </div>

        </fieldset>
    </form>
    <!-- client-side Form Validations:
    Uses the excellent form validation script from JavaScript-coder.com-->

    <script type='text/javascript'>
        // <![CDATA[
        var pwdwidget = new PasswordWidget('thepwddiv','password');
        pwdwidget.MakePWDWidget();

        var frmvalidator  = new Validator("register");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();
        frmvalidator.addValidation("name","req","Please provide your name");

        frmvalidator.addValidation("email","req","Please provide your email address");

        frmvalidator.addValidation("email","email","Please provide a valid email address");

        frmvalidator.addValidation("username","req","Please provide a username");

        frmvalidator.addValidation("password","req","Please provide a password");

        // ]]>
    </script>

    <!--
    Form Code End (see html-form-guide.com for more info.)
    -->

</body>
</html>	   

  
	