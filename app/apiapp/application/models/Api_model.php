<?php
require_once("Global_model.php");

class Api_model extends Global_model {
	
	public function member_login($email, $password){
		
		$verify_account_status	= true; //$this->dbSingleColQuery('user_id', 'user', "email = '".$email."' AND status = '1' AND type_id = '1'");	
		
		$data_row	= $this->dbSingleRowQuery('*', 'user', "email = '".$email."'");	
		
		if(!empty($data_row)){			
			$passwordHash = $data_row['password'];			
			if(password_verify($password, $passwordHash)){
				if(!empty($verify_account_status)){
					return $data_row;
				}
				else{
					if($data_row['approved'] != '2'){
						return 3;	// To signify new sign-up and is yet to confirm email
					}
					elseif($data_row['suspended'] == '2'){
						return 4;	// To signify account is suspended
					}
					else{
						return 5;	// To signify locked account
					}
				}				
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	}//End funtion
		
}//End class

?>