<?php
session_start();
include('../connection.php');
if(isset($_POST['login']))
	{
		$name = $_POST['name'];
		$password = sha1($_POST['password']);

		$no = 0;
		$sql="select * from TBLLogin where username ='".$name."' && password ='".$password."'";
		$result = mysqli_query($con,$sql);
		while($log=mysqli_fetch_array($result))
			{
				$User_Id = $log['id_login'];
				$Name = $log['username'];
			  $Password = $log['password'];
				$no++;
			}
      echo $no;
		if($no>0)
		{
			$_SESSION['User_Id'] = $User_Id;
			$_SESSION['Name'] = $Name;
			$_SESSION['Password'] = $Password;
			header('Location: ../index.php');
		}

		else
		{
			//header('Location: ../login.php?wrong=1');
		}
	}
?>
