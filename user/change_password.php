<!DOCTYPE html>
<html>
<?php
		require("../dataconn/dataconn.php");

		if(!isset($_SESSION))
		{
			session_start();
		}
		$user_id = $_SESSION['user_id'];

		require("../dataconn/page_load.php");

		$status_password="";
		$old_ps=$_POST["old_pass"];
		$new_ps=$_POST["new_pass"];
		$c_new_ps=$_POST["com_new_pass"];


if(isset($_POST['sendbtn'])){

		$login_sql = "select * from user where User_ID = '".$user_id."' and user_password = '".$old_ps."'";
		$login_result = mysql_query($login_sql);

		$login_check = mysql_num_rows($login_result);

	if($login_result==null)
	{
			$status_password="Please enter correct password!!";
	}
	else if($new_ps!=$c_new_ps){

		$status_password="Your new password not same with comfirm password!!";
	}
	else {
				mysql_query("UPDATE User SET User_Password='".$c_new_ps."' WHERE User_ID='".$user_id"' ");

	}

}





?>

<html>
<head>
	<title>Log In</title>
	<link href="../css/login_page.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="../js/jquery-2.2.0.js"></script>
</head>
<body>
	<div id="" class="login_div">
		<div id="" class="logo_div">
			<a href="visitor.php"><img src="../images/logo.ico" alt="Blu Video and Audio Shop" id="" class="logo_images"/></a>
		</div>
		<div id="" class="input_div">
			<form name="login" method="post" action="">
				<span id="change_password">Change Password</span>
				<input type="text" name="old_pass" value="" id="" placeholder="old password..." class="input_box_forget email"/>
				<input type="password" name="new_pass" value=""  id="" placeholder="new password..." class="input_box_forget password"/>
				<input type="password" name="com_new_pass" value=""  id="" placeholder="Confirm your new password..." class="input_box_forget password"/>

				<div id="" class="login_error">
					<span id="" class="<?php echo $reg_error_login;?>"><?php echo $status_password;?>
					</span>
				</div>
								<input type="submit" value="Send" id="" name="sendbtn" class="btn forget_btn"/>
			</form>

		</div>
	</div>
</body>
</html>