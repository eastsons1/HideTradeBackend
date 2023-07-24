<?php
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

require_once("config.php");
//require_once("dbcontroller.php");
header('content-type:application/json');


		$emailId = $_POST['emailId'];
		$userpassword = $_POST['userpass'];
		
		
		
		if($_POST['login_option']=="Mobile Number")
		{
			$mobile_num = $_POST['mobile'];
			$query = "SELECT * FROM user_info WHERE mobile	='".$mobile_num."' and password ='".md5($userpassword)."' ";
		
		}
		if($_POST['login_option']=="Email")
		{
			$emailId = $_POST['emailId'];
			 $query = "SELECT * FROM user_info WHERE email	='".$emailId."' and password ='".md5($userpassword)."' ";
		
		}
		
		
		$result = $conn->query($query) or die ("table not found");
		$numrows = mysqli_num_rows($result);
		
		
		if($numrows > 0)
		{
		  $results = mysqli_fetch_array($result);
		  $results['email'];
			$results['password'];
			
			if( ($emailId==$results['email'] || $mobile_num==$results['mobile'] ) && md5($userpassword) == $results['password'] )
			{
				
				
				///Token Create start
				
					//$userID = $results['user_id'];
					//$userRole = $results['user_type'];
					

					define('SECRET_KEY', "fakesecretkey");

						function createToken($data)
						{
							/* Create a part of token using secretKey and other stuff */
							$tokenGeneric = SECRET_KEY.$_SERVER["SERVER_NAME"]; // It can be 'stronger' of course

							/* Encoding token */
							$token = hash('sha256', $tokenGeneric.$data);
							
							return array('token' => $token, 'userData' => $data);
						}





						function auth($login, $password)
						{
							// we check user. For instance, it's ok, and we get his ID and his role.
							//$userID = 1;
							//$userRole = "admin";
							
							$userID = $login;
							$userRole = md5($password);

							// Concatenating data with TIME
							$data = time()."_".$userID."-".$userRole;
							$token = createToken($data);
							
							return $token;
							//echo json_encode($token);
						}

					
					
						
						define('VALIDITY_TIME', 3600);

						function checkToken($receivedToken, $receivedData)
						{
							/* Recreate the generic part of token using secretKey and other stuff */
							$tokenGeneric = SECRET_KEY.$_SERVER["SERVER_NAME"];

							// We create a token which should match
							$token = hash('sha256', $tokenGeneric.$receivedData);   

							// We check if token is ok !
							if ($receivedToken != $token)
							{
								echo 'wrong Token !';
								return false;
							}

							list($tokenDate, $userData) = explode("_", $receivedData);
							// here we compare tokenDate with current time using VALIDITY_TIME to check if the token is expired
							// if token expired we return false

							// otherwise it's ok and we return a new token
							
							
							return createToken(time()."#".$userData);   
						}
					
						
				
						
				
				
				/// Insert token into database start
				
				
		
				
						$tokenV = auth($emailId,$userpassword);
						foreach($tokenV as $key => $value) {
						
						
							if($key=='token')
							{
								$tokenD = $value;
							}
							
							if($key=='userData')
							{
								$userData = $value;
							}
						
						}
						
						
						
						
					   $_SESSION['token'] = $tokenD;
					
					   $_SESSION['timeout'] = time();
					
						$expiry = 1;
							
						// Set expiry_timestamp..
						$expiry_timestamp = $_SESSION['timeout'] + 1 * 60; //time() + $expiry;	
						
					
					
					$update_sql = $conn->query("UPDATE user_info SET accessToken ='".$tokenD."', expiry_timestamp = '".$expiry_timestamp."' WHERE email	= '".$emailId."' and password = '".md5($userpassword)."'  ");
					
					$chk_user_data = mysqli_fetch_array($conn->query("SELECT * FROM user_info WHERE email ='".$emailId."' and password ='".md5($userpassword)."' "));
					
					
				
				if( $chk_user_data['accessToken'] != $_SESSION['token'] && $_SESSION['timeout'] + 1 * 60 < time())
				{
					$resultData = array('status' => false, 'message' => 'Invalid Access Token!');
					echo json_encode($resultData);
					
				}
				else
				{
					
				
				
				
					if($_POST['emailId'] !="")
					{
						$user_session_value = $_POST['emailId'];
					}
					if($_POST['mobile'] !="")
					{
						$user_session_value = $_POST['mobile'];
					}
					
					$_SESSION['adminusername'] = $user_session_value;
					
					$_SESSION['username'] = $user_session_value;
					
					$_SESSION['loggedIn_user_id'] = $results['user_id']; 
					
					
					$user_id = $results['user_id'];
					$user_type = $results['user_type'];
					
					
					if($_POST['remember'])
					{
						setcookie("cookusername", $_SESSION['adminusername'], time()+3600 , "/");
						setcookie("cookpass", $_SESSION['adminusername'], time()+60*60*24*30 , "/");
					}
					else
					{
						setcookie("cookusername", $_SESSION['adminusername'], time()+(-3600) , "/");
					}
				
				
				
				
				//header("location:admin/welcome.php");
				 $resultData = array('Status' => true, 'Message' => 'User Login Successfully.', 'Access_Token' => $tokenD, 'user_id' => $user_id, 'user_type' => $user_type );
				 
				
				}
				
				
			}
			else ///$message1="Password not valid !";
			$resultData = array('status' => false, 'message' => 'Password not valid !');
		}
		else 
		{
			//$message1="Email Id Or Mobile Number not valid !";
			$resultData = array('status' => false, 'message' => 'Email Id Or Mobile Number not valid !');
		}
				
							
			echo json_encode($resultData);
					
			
?>