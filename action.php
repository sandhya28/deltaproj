<?php

  	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('stallstop');
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
  			$firstname = test_input($_POST['firstname']);
			$lastname = test_input($_POST['lastname']);
			$username = test_input($_POST['username']);
			$gender = test_input($_POST['gender']);
			$nationality = test_input($_POST['nationality']);
			$email = test_input($_POST['email']);
			$address = test_input($_POST['address']);
			$phoneno = test_input($_POST['phoneno']);
			$usertype = "Public";
 		}
		function test_input($data) 
		{
  			$data = trim($data);
  			$data = stripslashes($data);

  			$data = htmlspecialchars($data);
  			$data = mysql_real_escape_string($data);
  			return $data;
  		}


  		if($_POST['details_submit'])
  		{		

  			$file = $_FILES['image']['tmp_name'];
  			
  			if(isset($file))
  			{
  				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  				$file_name = addslashes($_FILES['image']['name']);
  				$image_size = getimagesize($_FILES['image']['tmp_name']);

  				if($image_size == FALSE)
    			{
    			
    				echo  "<script> 

    				history.go(-1);
    				alert('Profile photo has to be an image');

    				</script>";
    				exit();
    				echo "Enter a valid file";
    			}
  			}
			

			$password = sha1($_POST['password']);
			$confirmpassword = sha1($_POST['confirmpassword']);
				
			if($password != $confirmpassword)
			{

				echo  "<script> 
					
    				history.go(-1);
    				alert(\"passwords don't match\");

    				</script>";

				exit();
			}
			else
			{	
				$result = mysql_query("SELECT * FROM stallstop WHERE username = \"$username\"");//or die(mysql_error());
					
					$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					echo  "<script> 
					history.go(-1);
    				alert('username already exists');
    				</script>";
    				exit();
				} 
				else 
				{
					$result = mysql_query("SELECT * FROM stallstop WHERE email = \"$email\"");//or die(mysql_error());
					
					$count = mysql_num_rows($result);
					
					if($count == 1) 
					{
						echo  "<script> 
						history.go(-1);
    					alert('user with this email already exists');
    					</script>";
    					exit();
					} 
    				else
					{	
						$result = mysql_query("SELECT * FROM stallstop WHERE phoneno = \"$phoneno\"");//or die(mysql_error());
						
						$count = mysql_num_rows($result);
						
						if($count == 1) 
						{
							echo  "<script> 
							history.go(-1);
    						alert('user with mobile number already exists');
    						</script>";
    						exit();
						} 
						else
						{	
							mysql_query(" INSERT INTO stallstop
							VALUES (NULL,
									'$usertype',
									'$firstname',
									'$lastname',
									'$username',
							 		'$password',
									'$gender',
							 		'$nationality',
									'$email',
									'$address',
									'$phoneno',
									'$image'
							 		) ") or die(mysql_error()) ;
							echo "<script>alert('SignUp Successful');
									document.location='loginpage.php';
								</script>";
						}

					}

				}
			
			}
		}
 ?>