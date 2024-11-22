<?php
require_once ("Global_functions.php");

class Api_v2_controller extends Global_functions
{

	var $xml_header;
	var $http_status_array;

	public function __construct()
	{

		parent::__construct();
		$this->load->model('api_model');

		header('Access-Control-Allow-Origin: *');

		header('Access-Control-Allow-Methods: GET, POST');

		Header('Access-Control-Allow-Headers: *');

		header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Authorization, Origin, Cache-Control, Pragma, Accept, Accept-Encoding, Process-Data");

		$this->xml_header = '<?xml version="1.0" encoding="UTF-8"?>';

		$this->http_status_array = array('Failed' => '400', 'Unauthorized' => '401', 'Unsuccessful' => '404', 'Success' => '200');
	} // End function



	public function index($resp = false)
	{
	} // End function


	public function start()
	{
		$xml_body = $this->xml_header;
		$xml_body .= '<response>
						  <status>success</status>
						  <status_message>Welcome to API</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';

		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function member_login()
	{

		$email = $this->entrySanitizer($this->input->post('email'));
		$password = $this->entrySanitizer($this->input->post('password'));
		$ip_address = $this->getIPAddress();
		$get_browser = $this->getBrowser();

		$xml_body = $this->xml_header;

		$xml_status = '';

		$this->api_ext_request_log('Login', $ip_address, $email, '-----');

		if (empty($email)) {
			$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>Email must not be blank</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';
		} elseif (!valid_email($email)) {
			$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>Email specified is invalid</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';
		} elseif (empty($password)) {
			$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>Password must not be blank</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';
		} else {
			$result = $this->api_model->member_login($email, $password);

			if ($result == 3) {
				$xml_body .= '<response>
						  <status>EmailUnverified</status>
						  <status_message>Your Email is yet to be verified. Pls check your email for Account approval details!</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';
			} elseif ($result == 4) {
				$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>Your account is currently suspended. Please contact the Admin.</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';
			} elseif ($result == 5) {
				$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>Your account is currently locked. Please contact the Admin.</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';
			} elseif (!empty($result['user_id'])) {
				$user_id = $result['user_id'];
				$login_status = $result['login_status'];
				$curr_next_feedback_date = $result['next_feedback_date'];

				$this->userCronCheckExpiredSubscription($user_id);

				$full_token = false;

				if ($login_status == 'Never') {
					$first_login = 'TRUE';
					if ($curr_next_feedback_date == '0000-00-00') {
						$this->setFirstFeedbackDate($user_id);
					}
				} else {
					$first_login = 'FALSE';
				}

				if ($this->site_config['free_package_status'] == 'On') {
					$package_id = $this->site_config['single_free_package'];
					if (!empty($package_id)) {
						$this->new_user_freemium_subscription($user_id, $package_id, 1);
					}
				}

				$next_feedback_date = $this->api_model->dbSingleColQuery('next_feedback_date', 'user', "user_id = '" . $user_id . "'");

				$show_feedback = ($this->globalCurrentDate == $next_feedback_date) ? 'TRUE' : 'FALSE';

				$this->setNextFeedbackDate($user_id, $next_feedback_date);

				//INSERT MEMBER DATA IF NOT EXIST
				$verify_member = $this->api_model->dbSingleColQuery('member_id', 'member', "user_id = '" . $user_id . "'");
				if (empty($verify_member)) {
					$query_profile_data = array('user_id' => $user_id, 'surname' => $email, 'first_name' => $email, 'gender' => '-');
					$this->api_model->dbInsertQuery($query_profile_data, 'member');
				}
				//INSERT MEMBER DATA IF NOT EXIST

				$member_row = $this->api_model->dbSingleRowQuery('first_name, surname, gender', 'member', "user_id = '" . $user_id . "'");

				$user_id_enc = $this->encryptGetId($user_id);

				// Check if Unused Freemium Subscription exist
				$verify_freemium_subscription = $this->api_model->dbSingleRowQuery('id, package_id', 'subscription', "user_id = '" . $user_id . "' AND sub_started < 1 AND pay_status = '2' AND free_plan = '2'");

				$get_ip_count = $this->getSavedUserIPCount($user_id);

				$verify_ip = $this->checkSavedUserIP($user_id, $ip_address);

				// $this->saveUserIP($user_id, $ip_address);

				$device_full_token = $this->getUserDeviceFullToken($user_id, $ip_address, $get_browser);

				$count_multi_login = $this->countActiveUserDevice($user_id);

				if (!empty($device_full_token)) {
					$this->update_login_stat($user_id);
					$this->activity_log($user_id, 'Logged In', $ip_address, $get_browser);
					$xml_body .= '<response>
									  <status>Success</status>
									  <status_message>Login Successful...</status_message>
									  <user_id>' . $user_id_enc . '</user_id>
									  <token>' . $device_full_token . '</token>
									  <email>' . $result['email'] . '</email>
									  <first_name>' . $member_row['first_name'] . '</first_name>
									  <surname>' . $member_row['surname'] . '</surname>
									  <gender>' . $member_row['gender'] . '</gender>
									  <first_login>' . $first_login . '</first_login>
									  <show_feedback>' . $show_feedback . '</show_feedback>
								</response>';
				} else {
					if ($this->site_config['max_multi_login'] > 0 && $count_multi_login >= $this->site_config['max_multi_login']) {
						$this->unsetUserAllDeviceToken($user_id);
					}

					if (!empty($verify_freemium_subscription)) {
						$sub_id = $verify_freemium_subscription['id'];
						$sub_package_id = $verify_freemium_subscription['package_id'];
						$this->enableFreemiumSubscription($user_id, $sub_id, $sub_package_id);
					}

					$this->update_login_stat($user_id);

					$new_token = $this->generateApiToken($user_id);

					$log_id = $this->setUserToken($user_id, $new_token, $ip_address, $get_browser);

					$full_token = $this->encryptToken($log_id . 'I' . $new_token);

					/*
								   if($get_ip_count > 0 && $verify_ip < 1){
									   $this->multiDeviceLoginNotice($email, $member_row['first_name'], $ip_address, $get_browser, $this->globalCurrentTimeStamp);
								   }
								   */

					$this->activity_log($user_id, 'Logged In', $ip_address, $get_browser);

					$xml_body .= '<response>
									  <status>Success</status>
									  <status_message>Login Successful...</status_message>
									  <user_id>' . $user_id_enc . '</user_id>
									  <token>' . $full_token . '</token>
									  <email>' . $result['email'] . '</email>
									  <first_name>' . $member_row['first_name'] . '</first_name>
									  <surname>' . $member_row['surname'] . '</surname>
									  <gender>' . $member_row['gender'] . '</gender>
									  <first_login>' . $first_login . '</first_login>
									  <show_feedback>' . $show_feedback . '</show_feedback>
								</response>';
				}
			} else {
				$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>Invalid access information</status_message>
						  <user_id></user_id>
						  <token></token>
						</response>';
			}
		}

		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function multiDeviceLoginNotice($email, $first_name, $ip_address, $browser, $timestamp)
	{
		//************ Start: 	Send Mail ************

		$subject = 'New Login to ' . $this->site_config['comp_name'];

		$timestamp = date('M j Y, g:i a', strtotime($timestamp));

		$messageContent = '<div>Hello ' . $first_name . ', <br><br>
			We recorded a new login to your account on ' . $this->site_config['comp_name'] . ' from a new IP address. We want to be sure it was you.
			<br><br>

			Email : ' . $email . ' <br>
			Time/Date : ' . $timestamp . ' <br>
			IP Address : ' . $ip_address . ' <br>
			Device/Browser : ' . $browser . ' <br>

			<br>

			If this action was performed by you, kindly ignore this alert. <br><br>

			If this was not you, we strongly recommend you change your password immediately. <br><br>
  
			<a style="font-size:15px; color:#FF0000;" href="' . $this->dev_base_dashboard_url . '/page/settings">Click here to Reset Password</a>
			<br />

			<br />
			<p style="font-size:15px; color:#FF0000;">OR Copy and paste the link below in your browser</p>
			<br /><br />

			' . $this->dev_base_dashboard_url . '/page/settings
			
			<div>';

		$this->sendEmail($email, $subject, $messageContent, 1);

		//************ End: 	Send Mail ************	
	} // End function



	public function member_logout()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);

		$user_id = $this->decryptGetId($user_id, 1);

		$verify_user_data = $this->api_model->dbSingleRowQuery('user_id, login_status', 'user', "user_id = '" . $user_id . "'");
		$verify_user_id = $verify_user_data['user_id'];
		$verify_login_status = $verify_user_data['login_status'];

		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		$xml_body = $this->xml_header;

		if (!empty($user_id) && !empty($token)) {

			if ($verify_user_id != $user_id) {
				$xml_status = 'Unauthorized';
				$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>User Authentication Failed</status_message>
						</response>';
			} elseif ($verify_token != $token) {
				$xml_status = 'Unauthorized';
				$xml_body .= '<response>
						  <status>Failed</status>
						  <status_message>Token Authentication Failed</status_message>
						</response>';
			} else {
				if ($verify_login_status != 'Never') {
					$login_status = 'Logged_out';
					$query_data = array('login_status' => $login_status);
					$this->api_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");
					$log_data = $this->getUserDeviceTokenData($user_id, $token_log_id);
					$this->activity_log($user_id, 'Logged Out', $log_data['ip_address'], $log_data['browser']);
					$this->unsetUserToken($user_id, $token_log_id);

					$xml_status = 'Success';
					$xml_body .= '<response>
								  <status>Success</status>
								  <status_message>Logout Successful...</status_message>
								</response>';
				}
			}
		} else {
			$xml_status = 'Unauthorized';
			$xml_body .= '<response>
					  <status>Failed</status>
					  <status_message>Empty user parameter</status_message>
					</response>';
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function member_register()
	{

		$first_name = $this->entrySanitizer($this->input->post('first_name'));
		$first_name = ucwords(strtolower($this->stringReplaceSpecialChar($first_name)));
		$surname = $this->entrySanitizer($this->input->post('surname'));
		$surname = ucwords(strtolower($this->stringReplaceSpecialChar($surname)));
		$email = strtolower($this->entrySanitizer($this->input->post('email')));
		$password = $this->entrySanitizer($this->input->post('password'));
		$gender = ucwords(strtolower($this->entrySanitizer($this->input->post('gender'))));

		$package_id = $this->entrySanitizer($this->input->post('package_id'));

		$verify_email = $this->api_model->dbSingleColQuery('user_id', 'user', "email = '" . $email . "'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$this->api_ext_request_log('Register', $this->getIPAddress(), $email, '-----', $first_name, $surname);

		if ($first_name == '') {
			$xml_body .= '<status>Failed</status>
							<status_message>First Name must not be blank and must be a valid name</status_message>';
		} elseif ($surname == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>Last Name must not be blank and must be a valid name</status_message>';
		} elseif ($email == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>Email must not be blank</status_message>';
		} elseif (!valid_email($email)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Email specified is invalid</status_message>';
		} elseif (!empty($verify_email)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>An account already exist with the email specified. Pls specify a distinct email OR Login to Account</status_message>';
		} elseif ($gender == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>Gender must be selected</status_message>';
		} elseif ($password == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>Password must be specified</status_message>';
		} else {
			$user_type_id = 1;	// User Type	
			$status = 1;	// User Status set to 1	
			$signup = 1;

			$password_hash = password_hash($password, PASSWORD_DEFAULT);

			$username = $this->createAccountUsername($email);

			$this->db->trans_start();	//Transaction Start

			// User Acccount
			$query_user_data = array('email' => $email, 'password' => $password_hash, 'username' => $username, 'type_id' => $user_type_id, 'status' => $status, 'login_status' => 'Never', 'curr_login' => '0000-00-00 00:00:00', 'last_login' => '0000-00-00 00:00:00', 'approved' => 1, 'suspended' => 1, 'approval_timestamp' => '0000-00-00 00:00:00', 'suspended_timestamp' => '0000-00-00 00:00:00', 'signup' => $signup);
			$this->api_model->dbInsertQuery($query_user_data, 'user');		//  Process Query
			$new_user_id = $this->db->insert_id();	// Get Data Id

			// Member Profile												
			$query_profile_data = array('user_id' => $new_user_id, 'surname' => $surname, 'first_name' => $first_name, 'gender' => $gender);
			$this->api_model->dbInsertQuery($query_profile_data, 'member');

			// Code Gen												
			$gen_action_txt = 'confirm_signup';
			if ($this->api_model->dbRowCountQuery('code_gen', "user_id = '" . $new_user_id . "' AND action = '" . $gen_action_txt . "'") > 0) {
				$this->deleteCodeGen($new_user_id, 'confirm_signup');
			}

			$gen_action_code = $this->generateCodeGen($new_user_id, $gen_action_txt);

			$new_user_id_enc = $this->encryptGetId($new_user_id);

			$this->db->trans_complete();	//Transaction End

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();	// All transaction rolled back
				$xml_body .= '<status>Failed</status>
						  <status_message>System error encountered while processing request. Please try again shortly</status_message>';
			} else {
				$this->db->trans_commit();		// All transaction committed to database

				if ($this->site_config['free_package_status'] == 'On') {

					if (!empty($package_id)) {
						$this->new_user_freemium_subscription($new_user_id, $package_id);
					} else {
						$package_id = $this->site_config['single_free_package'];
						if (!empty($package_id)) {
							$this->new_user_freemium_subscription($new_user_id, $package_id);
						}
					}
				}

				//************ Start: 	Send Mail ************

				$subject = $this->site_config['comp_name'] . " - Member Account Creation";

				$messageContent = '<p>
				We like to notify that a unique account has been created for you after a successful registration. 
				<br /><br />
				<span  style="font-size:25px; color:#FF0000;">Your account registration is incomplete. We urge you to click the link below to verify your email and activate your account.</span>
				<br /><br />

				<a style="font-size:25px; color:#FF0000;" href="' . $this->dev_base_url . '/verify?code=' . $gen_action_code . '&amp;email=' . $email . '">Click here to confirm your registration</a>
				<br /><br />

				<br /><br />
				OR Copy and paste the link below in your browser
				<br /><br />

				' . $this->dev_base_url . '/verify?code=' . $gen_action_code . '&amp;email=' . $email . '

				<br><br><span  style="font-size:25px; color:#FF0000;">Please note that the Verification Link expires in 24 hours.</span>';

				//$send = $this->senderEmail($email, $subject, $messageContent);


				/*$htmlMessageContent = $this->prepGeneralEmailTemplate($subject, $messageContent);
										
							$this->email->clear();
							
							$config['charset'] = 'utf-8';
							$config['wordwrap'] = TRUE;
							$config['mailtype'] = 'html';
							
							$this->email->initialize($config);
						
							$this->email->from($this->site_config['mailer_email'], $this->site_config['comp_name']);
							
							$this->email->to($email);	
							$this->email->subject($subject);
							$this->email->message($htmlMessageContent);
							$this->email->send();	*/

				//************ End: 	Send Mail ************

				$activity = 'New member registration - ' . $first_name . ' ' . $surname . ' (' . $email . ')';
				$this->activity_log($new_user_id, $activity);

				$xml_body .= '<status>Success</status>
							  <status_message>Your registration was successful. Check your email for further information</status_message>
							  <new_user_id>' . $new_user_id_enc . '</new_user_id>';
			} //End if		

		}

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function new_user_freemium_subscription($user_id, $package_id, $enable_sub = false)
	{

		$error_count = 0;

		$verify_email_register = $this->api_model->dbSingleRowQuery('user.user_id, user.email, member.first_name, member.surname', 'user, member', "user.user_id = member.user_id AND user.user_id = '" . $user_id . "'");

		$verify_package_row = $this->api_model->dbSingleRowQuery('*', 'package', "id = " . $package_id . " AND free_status = '2'");

		$verify_package = $verify_package_row['id'];
		$verify_package_name = $verify_package_row['name'];
		$plan_type = $verify_package_row['plan_type'];
		$free_days = $verify_package_row['free_days'];

		$verify_free_sub = $this->checkFreeSubscription($user_id);

		if (empty($user_id)) {
			$error_count++;
		}
		if ($verify_free_sub > 0) {
			$error_count++;
		}
		if (empty($package_id)) {
			$error_count++;
		}
		if (empty($verify_package)) {
			$error_count++;
		}
		if (empty($free_days)) {
			$error_count++;
		}
		if (empty($verify_email_register)) {
			$error_count++;
		}

		if ($error_count == 0) {
			$error_count = 0;

			$new_user_id = $verify_email_register['user_id'];
			$email = $verify_email_register['email'];
			$new_user_names = $verify_email_register['first_name'];
			$new_user_names .= ' ' . $verify_email_register['surname'];

			$other_active_subscription = $this->api_model->dbCustomSingleRowQuery("SELECT subscription_users.user_id FROM subscription, subscription_users WHERE subscription_users.sub_id = subscription.id AND subscription.date_end > '" . $this->globalCurrentDate . "' AND subscription.sub_status = 1 AND subscription.pay_status = 2 AND subscription_users.user_id = '" . $new_user_id . "'");

			$other2_active_subscription = $this->api_model->dbCustomSingleRowQuery("SELECT subscription_users.user_id FROM subscription, subscription_users WHERE subscription_users.sub_id = subscription.id AND subscription.sub_status = 1 AND subscription.pay_status = 2 AND subscription_users.user_id = '" . $new_user_id . "'");

			$verify_subscription_user = $this->api_model->dbSingleRowQuery('id', 'subscription_users', "user_id = '" . $new_user_id . "'");

			if (!empty($verify_subscription_user)) {
				$error_count++;
			}
			if (!empty($other_active_subscription)) {
				$error_count++;
			}
			if (!empty($other2_active_subscription)) {
				$error_count++;
			}
			if (empty($new_user_id)) {
				$error_count++;
			}

			if ($error_count == 0) {
				// SUCCESSFUL PAYMENT
				$sub_status = 0; // Inactive until first login
				$sub_started = 0;
				$pay_status = 2;
				$tranx_status_code = 7;
				$tranx_status = 'success';

				$date_start = '0000-00-00'; // Unset until first login
				$date_end = '0000-00-00'; // Unset until first login

				$this->db->trans_start();	//Transaction Start		

				// Subscription
				if ($enable_sub) {
					$date_start = $this->globalCurrentDate;
					$date_end = $this->generateFutureDate($date_start, $free_days);

					$sub_status = 1; // Activate
					$sub_started = 1;

					$query_sub_data = array('user_id' => $new_user_id, 'free_plan' => 2, 'license_no' => '0', 'package_id' => $package_id, 'month_count' => 0, 'days_count' => $free_days, 'total_cost' => 0, 'discount' => 1, 'discount_amount' => 0, 'date_start' => $date_start, 'date_end' => $date_end, 'sub_status' => $sub_status, 'sub_started' => $sub_started, 'pay_status' => $pay_status, 'paygate_status_code' => $tranx_status_code, 'paygate_status_msg' => $tranx_status, 'paygate_process' => 2);
				} else {
					$query_sub_data = array('user_id' => $new_user_id, 'free_plan' => 2, 'license_no' => '0', 'package_id' => $package_id, 'month_count' => 0, 'days_count' => $free_days, 'total_cost' => 0, 'discount' => 1, 'discount_amount' => 0, 'date_start' => $date_start, 'date_end' => $date_end, 'sub_status' => $sub_status, 'sub_started' => $sub_started, 'pay_status' => $pay_status, 'paygate_status_code' => $tranx_status_code, 'paygate_status_msg' => $tranx_status, 'paygate_process' => 2);
				}

				$this->api_model->dbInsertQuery($query_sub_data, 'subscription');
				$sub_id = $this->db->insert_id();	// Get Data Id

				$new_order_no = $this->generateOrderId($sub_id);
				$license_no = $this->generateLicenseNo($new_order_no);

				$query_order_update = array('order_no' => $new_order_no, 'license_no' => $license_no);
				$this->api_model->dbUpdateQuery($query_order_update, 'subscription', "id = '" . $sub_id . "'");

				$query_sub_user = array('sub_id' => $sub_id, 'user_id' => $new_user_id);
				$this->api_model->dbInsertQuery($query_sub_user, 'subscription_users');

				$this->db->trans_complete();	//Transaction End	

				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();	// All transaction rolled back							  
				} else {
					$this->db->trans_commit();		// All transaction committed to database				

					$activity = 'Added ' . $new_user_names . ' (' . $email . ') to ' . $verify_package_name . ' subscription plan';
					$this->activity_log($new_user_id, $activity);
				}
			} //error free

		} //error free

	} // End function


	public function verify_email_resend()
	{

		$email = $this->entrySanitizer($this->input->get('email'));

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$this->api_ext_request_log('Email Verification Resend', $this->getIPAddress(), $email);

		if (empty($email)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Your email must not be blank</status_message>';
		} elseif (!valid_email($email)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Email specified is invalid</status_message>';
		} else {
			$userdata_row = $this->api_model->dbSingleRowQuery('user_id, email, status, suspended, approved', 'user', "email = '" . $email . "'");
			$verify_email = $userdata_row['email'];
			$new_user_id = $userdata_row['user_id'];
			$acc_status = $userdata_row['status'];
			$suspended = $userdata_row['suspended'];
			$approved = $userdata_row['approved'];

			if (empty($verify_email)) {
				$xml_body .= '<status>Failed</status>
							  <status_message>Email specified does not exist</status_message>';
			} elseif (empty($new_user_id)) {
				$xml_body .= '<status>Failed</status>
							  <status_message>Email specified does not exist</status_message>';
			} elseif ($acc_status == 1 && $approved == 2) {
				$xml_body .= '<status>Failed</status>
							  <status_message>Request aborted! Your account had been verified and approved</status_message>';
			} elseif ($acc_status == 0 && $suspended == 2) {
				$xml_body .= '<status>Failed</status>
							  <status_message>Your account has been suspended. Contact Admin for details</status_message>';
			} else {
				// Code Gen	
				$gen_action_txt = 'confirm_signup';
				$this->deleteCodeGen($new_user_id, $gen_action_txt);

				$gen_action_code = $this->generateCodeGen($new_user_id, $gen_action_txt);

				$new_user_id_enc = $this->encryptGetId($new_user_id);

				//************ Start: 	Send Mail ************

				$subject = $this->site_config['comp_name'] . " - Email Verification Link";

				$messageContent = '<p>
					We like to notify that a new email verification link has been created for you.
					<br /><br />
					Click the link below to verify and activate your account.
					<br /><br />
  
					<a style="font-size:25px; color:#FF0000;" href="' . $this->dev_base_url . '/verify?code=' . $gen_action_code . '&amp;email=' . $email . '">Click here to confirm your account</a>
					<br /><br />
	
					<br /><br />
					OR Copy and paste the link below in your browser
					<br /><br />
	
					' . $this->dev_base_url . '/verify?code=' . $gen_action_code . '&amp;email=' . $email . '

					<br><br><span style="font-size:25px; color:#FF0000;">Please note that the Verification Link expires in 24 hours.</span>';

				//$this->senderEmail($email, $subject, $messageContent);

				/*$htmlMessageContent = $this->prepGeneralEmailTemplate($subject, $messageContent);
											
								$this->email->clear();
								
								$config['charset'] = 'utf-8';
								$config['wordwrap'] = TRUE;
								$config['mailtype'] = 'html';
								
								$this->email->initialize($config);
							
								$this->email->from($this->site_config['mailer_email'], $this->site_config['comp_name']);
								
								$this->email->to($email);	
								$this->email->subject($subject);
								$this->email->message($htmlMessageContent);
								$this->email->send();	*/

				//************ End: 	Send Mail ************

				$activity = 'Resent Account Verification link - ' . $email;
				$this->activity_log($new_user_id, $activity);

				$xml_body .= '<status>Success</status>
							  <status_message>Account Verification link has been successfully sent. Check your email for further details</status_message>';
			}
		}

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function forgot_password_request()
	{

		$email = $this->entrySanitizer($this->input->get('email'));

		$verify_email = $new_user_id = $acc_status = '';

		$userdata_row = $this->api_model->dbSingleRowQuery('user_id, email, status, suspended', 'user', "email = '" . $email . "'");

		if (!empty($userdata_row)) {
			$verify_email = $userdata_row['email'];
			$new_user_id = $userdata_row['user_id'];
			$acc_status = $userdata_row['status'];
			$suspended = $userdata_row['suspended'];
		}

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$this->api_ext_request_log('Forgot Password Request Change', $this->getIPAddress(), $email);

		if (empty($email)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Your email must not be blank</status_message>';
		} elseif (empty($verify_email)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Email specified does not exist</status_message>';
		} elseif (empty($new_user_id)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Email specified does not exist</status_message>';
		} elseif ($suspended == 2) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Request aborted! Your account has been blocked. Contact Administrator!</status_message>';
		} else {
			$gen_action_txt = 'forgot_pwd';
			$this->deleteCodeGen($new_user_id, $gen_action_txt);

			$gen_action_code = $this->generateCodeGen($new_user_id, $gen_action_txt);

			//$gen_action_code = substr(md5(rand(0, 1000000)), 0, 25);				
			// Code Gen													
			//$query_code_gen = array('user_id' => $new_user_id, 'action' => $gen_action_txt, 'code' => $gen_action_code, 'timestamp' => $this->globalCurrentTimeStamp);	
			//$this->api_model->dbInsertQuery($query_code_gen, 'code_gen');

			$new_user_id_enc = $this->encryptGetId($new_user_id);

			//************ Start: 	Send Mail ************

			$subject = $this->site_config['comp_name'] . " - Change Forgot Password Link";

			$messageContent = '<p>
					A request to change your password was made on ' . $this->site_config['comp_name'] . '. Find below a unique link to change your password:
					<br /><br />
  
    				<a style="font-size:25px; color:#FF0000;" href="' . $this->dev_base_url . '/reset-password?code=' . $gen_action_code . '&amp;email=' . $email . '">Click here to change password</a>
    				<br /><br />
	
					<br /><br />
					OR Copy and paste the link below in your browser
					<br /><br />
	
					' . $this->dev_base_url . '/reset-password?code=' . $gen_action_code . '&amp;email=' . $email . '
					<br><br>

					If this request was not made by you, kindly ignore or delete this message.

					<br>';

			$this->senderEmail($email, $subject, $messageContent);

			/*$htmlMessageContent = $this->prepGeneralEmailTemplate($subject, $messageContent);
											 
								 $this->email->clear();
								 
								 $config['charset'] = 'utf-8';
								 $config['wordwrap'] = TRUE;
								 $config['mailtype'] = 'html';
								 
								 $this->email->initialize($config);
							 
								 $this->email->from($this->site_config['mailer_email'], $this->site_config['comp_name']);
								 
								 $this->email->to($email);	
								 $this->email->subject($subject);
								 $this->email->message($htmlMessageContent);
								 $this->email->send(); */

			//************ End: 	Send Mail ************

			$activity = 'Change Forgot Password Link - ' . $email;
			$this->activity_log($new_user_id, $activity);

			$xml_body .= '<status>Success</status>
							  <status_message>A unique link to change password has been successfully sent. Check your email for more information.</status_message>';
		}

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function verify_url_token_request()
	{

		$code = $this->entrySanitizer($this->input->get('code'));

		$email = $this->entrySanitizer($this->input->get('email'));
		//$user_id		= $this->decryptGetId($user_id_enc);	

		$verify_user_row = $this->api_model->dbSingleRowQuery('user_id, email, status, login_status', 'user', "email = '" . $email . "'");
		$verify_user_id = $verify_user_row['user_id'];
		$curr_email = $verify_user_row['email'];
		$user_id = $verify_user_id;
		$account_status = $verify_user_row['status'];
		$login_status = $verify_user_row['login_status'];

		$verify_code_data = $this->api_model->dbSingleRowQuery('*', 'code_gen', "user_id = '" . $user_id . "' AND code = '" . $code . "'");
		$verify_code = $verify_code_data['code'];
		$code_timestamp = $verify_code_data['timestamp'];

		$code_timestamp_expiry = $this->generateFutureTime(20, 0, $code_timestamp);

		$active_subscription = $this->api_model->dbCustomSingleRowQuery("SELECT subscription_users.user_id FROM subscription, subscription_users WHERE subscription_users.sub_id = subscription.id AND subscription.date_end > '" . $this->globalCurrentDate . "' AND subscription.sub_status = 1 AND subscription.pay_status = 2 AND subscription_users.user_id = '" . $user_id . "'");

		$new_subscribed_user = 0;
		if ($login_status == 'Never' && $account_status < 1 && !empty($active_subscription)) {
			$new_subscribed_user = 1;
		}

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		if ($email == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Empty Email Parameter</status_message>';
		} elseif ($verify_user_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($curr_email == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>User information failed Authentication</status_message>';
		} elseif ($curr_email != $email) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($code == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token must not be blank</status_message>';
		} elseif ($verify_code != $code) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token Failed Authentication</status_message>';
		} elseif ($this->globalCurrentTimeStamp > $code_timestamp_expiry && $new_subscribed_user == 0) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token has Expired</status_message>';
		} else {
			$xml_body .= '<status>Success</status>
							  <status_message>Request is Valid</status_message>';
		}

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function forgot_password_reset()
	{

		$pwd = $this->entrySanitizer($this->input->get('pwd'));
		$code = $this->entrySanitizer($this->input->get('code'));

		$email = $this->entrySanitizer($this->input->get('email'));
		//$user_id		= $this->decryptGetId($user_id_enc);	

		$verify_user_row = $this->api_model->dbSingleRowQuery('user_id, email, status, login_status', 'user', "email = '" . $email . "'");
		$verify_user_id = $verify_user_row['user_id'];
		$curr_email = $verify_user_row['email'];
		$user_id = $verify_user_id;
		$account_status = $verify_user_row['status'];
		$login_status = $verify_user_row['login_status'];

		$verify_code_data = $this->api_model->dbSingleRowQuery('*', 'code_gen', "user_id = '" . $user_id . "' AND code = '" . $code . "'");
		$verify_code = $verify_code_data['code'];
		$code_timestamp = $verify_code_data['timestamp'];

		$code_timestamp_expiry = $this->generateFutureTime(20, 0, $code_timestamp);

		$active_subscription = $this->api_model->dbCustomSingleRowQuery("SELECT subscription_users.user_id FROM subscription, subscription_users WHERE subscription_users.sub_id = subscription.id AND subscription.date_end > '" . $this->globalCurrentDate . "' AND subscription.sub_status = 1 AND subscription.pay_status = 2 AND subscription_users.user_id = '" . $user_id . "'");

		$new_subscribed_user = 0;
		if ($login_status == 'Never' && $account_status < 1 && !empty($active_subscription)) {
			$new_subscribed_user = 1;
		}

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		if ($pwd == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>New password must not be blank</status_message>';
		} elseif ($email == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Empty Email Parameter</status_message>';
		} elseif ($verify_user_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($curr_email == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>User information failed Authentication</status_message>';
		} elseif ($curr_email != $email) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($code == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token must not be blank</status_message>';
		} elseif ($verify_code != $code) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token Failed Authentication</status_message>';
		} elseif ($this->globalCurrentTimeStamp > $code_timestamp_expiry && $new_subscribed_user == 0) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token has Expired</status_message>';
		} else {
			$new_pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

			$query_data = array('password' => $new_pwd_hash);
			$update_data = $this->api_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");

			$data_row = $this->api_model->dbSingleRowQuery('surname, first_name', 'member', "user_id = '" . $user_id . "'");
			$name = $data_row['surname'];
			$name .= ' ' . $data_row['first_name'];
			$email = $curr_email;

			if ($update_data) {
				/*
							if(!empty($active_subscription)){
								$this->db->set('status', '1');
								$this->db->where('approved', 2);
								$this->db->set('approval_timestamp', ''.$this->globalCurrentTimeStamp.'');
								$this->db->where('user_id', $user_id);
								$this->db->update('user');
							}
							*/

				$this->deleteCodeGen($user_id, 'forgot_pwd');

				if (!empty($email)) {

					//************ Start: 	Send Mail ************

					$subject = "Your password has been changed";

					$messageContent = '<p>
						This is to notify you that your password was changed by you. Find your new password below: <br /><br />
						New Password: ' . $pwd . '
						 </p>';

					//$this->sendEmail($email, $subject, $messageContent, 1);	
					$this->senderEmail($email, $subject, $messageContent);

					//************ End: 	Send Mail ************

				} //End if

				$activity = 'Forgot Password Changed by Self - ' . $name;
				$this->activity_log($user_id, $activity);
				$xml_body .= '<status>Success</status>
							  <status_message>Account password has been changed successfully.</status_message>';
			} else {
				$xml_body .= '<status>Failed</status>
					  <status_message>System error encountered while processing request. Please try again shortly.</status_message>';
			}
		}

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function verify_email_registration()
	{

		$code = $this->entrySanitizer($this->input->get('code'));

		$email = $this->entrySanitizer($this->input->get('email'));

		$verify_user_row = $this->api_model->dbSingleRowQuery('user_id, email, status, approved', 'user', "email = '" . $email . "'");
		$verify_user_id = $verify_user_row['user_id'];
		$curr_email = $verify_user_row['email'];
		$user_status = $verify_user_row['status'];
		$user_id = $verify_user_row['user_id'];
		$approved = $verify_user_row['approved'];

		$verify_code_data = $this->api_model->dbSingleRowQuery('*', 'code_gen', "user_id = '" . $user_id . "' AND code = '" . $code . "'");
		$verify_code = $verify_code_data['code'];
		$code_timestamp = $verify_code_data['timestamp'];

		$code_timestamp_expiry = $this->generateFutureTime(0, 24, $code_timestamp);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		if ($user_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Empty User Parameter</status_message>';
		} elseif ($curr_email == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>User information failed Authentication</status_message>';
		} elseif ($user_status == 1 && $approved == 2) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Request aborted! Account had been verified and approved</status_message>';
		} elseif ($code == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token must not be blank</status_message>';
		} elseif ($verify_code != $code) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token Failed Authentication</status_message>';
		} elseif ($this->globalCurrentTimeStamp > $code_timestamp_expiry) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Verification Token has Expired</status_message>';
		} else {
			$this->db->set('status', '1');
			$this->db->set('approval_timestamp', '' . $this->globalCurrentTimeStamp . '');
			$this->db->set('approved', '2');
			$this->db->where('user_id', $user_id);
			$update_data = $this->db->update('user');


			$data_row = $this->api_model->dbSingleRowQuery('surname, first_name, user.status, user.approved', 'member, user', "user.user_id = member.user_id AND member.user_id = '" . $user_id . "'");
			$name = $data_row['surname'];
			$name .= ' ' . $data_row['first_name'];
			$email = $curr_email;

			$verify_status = $data_row['status'];
			$verify_approved = $data_row['approved'];

			if ($update_data && $verify_status == 1 && $verify_approved == 2) {
				$this->deleteCodeGen($user_id, 'confirm_signup');

				if (!empty($email)) {

					//************ Start: 	Send Mail ************

					$subject = $this->site_config['comp_name'] . " - Member Account Confirmation";

					$messageContent = '<p>
					Your account has been activated. You may login to your account via the link below. 
					<br /><br />
  
    				<a style="font-size:25px; color:#FF0000;" href="' . $this->dev_base_url . '/login">Click here to login</a>
    				<br /><br />
	
					<br /><br />
					OR Copy and paste the link below in your browser
					<br /><br />
	
					' . $this->dev_base_url . '/login

					<br>';

					//$this->sendEmail($email, $subject, $messageContent, 1);
					$this->senderEmail($email, $subject, $messageContent);

					//************ End: 	Send Mail ************

				} //End if

				$activity = 'Account Email Verification Completed - ' . $name;
				$this->activity_log($user_id, $activity);
				$xml_body .= '<status>Success</status>
							  <status_message>Account Email Verification Successful</status_message>';
			} else {
				$xml_body .= '<status>Failed</status>
					  <status_message>System error encountered while processing request. Please try again shortly.</status_message>';
			}
		}

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function member_profile()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$data_row = $this->api_model->dbSingleRowQuery('*', 'member', "user_id = '" . $user_id . "'");

			if (!empty($data_row)) {

				$surname = $data_row['surname'];
				$first_name = $data_row['first_name'];
				$phone = $data_row['phone'];
				$state = $data_row['state'];
				$school = $data_row['school'];
				$user_category = $data_row['user_category'];
				$account_type = $data_row['account_type'];
				$passport = (!empty($data_row['passport'])) ? base_url() . 'uploads/passports/' . $data_row['passport'] : '';

				$class_list = $this->api_model->dbMultiRowQuery('class.name, member_class.class_id', 'member_class, class', "member_class.user_id = '" . $user_id . "' AND member_class.class_id = class.class_id");

				$subject_list = $this->api_model->dbMultiRowQuery('subject.name, member_subjects.subject_id', 'member_subjects, subject', "member_subjects.user_id = '" . $user_id . "' AND member_subjects.subject_id = subject.subject_id");

				$member_class_list = '';
				$member_subject_list = '';

				if (!empty($class_list)) {
					foreach ($class_list as $class_row) {
						if (!empty($class_row['name'])) {
							//$member_class_list .= $class_row['name'];
							$member_class_list .= $class_row['class_id'];
							$member_class_list .= ', ';
						}
					} //End loop
					$member_class_list = trim($member_class_list);
					$member_class_list = substr($member_class_list, 0, -1);
				}

				if (!empty($subject_list)) {
					foreach ($subject_list as $subject_row) {
						if (!empty($subject_row['name'])) {
							//$member_subject_list .= $subject_row['name'];
							$member_subject_list .= $subject_row['subject_id'];
							$member_subject_list .= ', ';
						}
					} //End loop
					$member_subject_list = trim($member_subject_list);
					$member_subject_list = substr($member_subject_list, 0, -1);
				}

				$xml_body .= '<status>Success</status>
								  <surname>' . $surname . '</surname>
								  <first_name>' . $first_name . '</first_name>
								  <phone>' . $phone . '</phone>
								  <state>' . $state . '</state>
								  <user_category>' . $user_category . '</user_category>
								  <account_type>' . $account_type . '</account_type>
								  <school>' . $school . '</school>
								  <passport>' . $passport . '</passport>
								  <member_subject_list>' . $member_subject_list . '</member_subject_list>
								  <member_class_list>' . $member_class_list . '</member_class_list>';
			} else {
				$xml_body .= '<status>Null</status>
								  <status_message>Member profile was found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function member_profile_edit()
	{

		$first_name = $this->entrySanitizer($this->input->get('first_name'));
		$first_name = ucwords(strtolower($this->stringReplaceSpecialChar($first_name)));
		$surname = $this->entrySanitizer($this->input->get('surname'));
		$surname = ucwords(strtolower($this->stringReplaceSpecialChar($surname)));
		$state = $this->entrySanitizer($this->input->get('state'));
		$phone = $this->entrySanitizer($this->input->get('phone'));
		$school = $this->entrySanitizer($this->input->get('school'));
		$school = trim($school);
		$class = $this->entrySanitizer($this->input->get('class'));
		$subject = $this->entrySanitizer($this->input->get('subject'));

		$user_category_list = $this->user_category_list();
		$account_type_list = $this->account_type_list();

		$user_category = $this->entrySanitizer($this->input->get('user_type'));
		$account_type = $this->entrySanitizer($this->input->get('account_type'));

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$verify_user_id = $this->api_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';


		$xml_status = 'Success';

		if (empty($first_name)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>First Name must not be blank and must be a valid name</status_message>';
		} elseif (empty($surname)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Last Name must not be blank and must be a valid name</status_message>';
		} elseif (empty($phone)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Phone number must be specified</status_message>';
		} elseif (!ctype_digit($phone)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Phone number must be strictly numbers or numeric. Characters are not allowed.</status_message>';
		} elseif (empty($user_category)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>User category must be specified</status_message>';
		} elseif ($user_category == 'school-admin' && empty($school)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Your School name must be specified</status_message>';
		} elseif ($user_category != 'school-admin' && empty($class)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Class must be specified</status_message>';
		} elseif (!in_array(strtolower($user_category), $user_category_list)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>User category is invalid</status_message>';
		} elseif (!empty($account_type) && !in_array(strtolower($account_type), $account_type_list)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Account type is invalid</status_message>';
		} elseif (empty($user_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Empty User Parameter</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} else {
			$passport = '';

			$school = str_replace("_", " ", $school);

			$query_data = array('surname' => $surname, 'first_name' => $first_name, 'phone' => $phone, 'state' => $state, 'school' => $school, 'passport' => $passport, 'user_category' => $user_category, 'account_type' => $account_type);
			$update_data = $this->api_model->dbUpdateQuery($query_data, 'member', "user_id = '" . $user_id . "'");

			if (!empty($class)) {
				$this->api_model->dbDeleteQuery($user_id, 'user_id', 'member_class');

				$class_array = explode(',', $class);
				foreach ($class_array as $c) {
					if (!empty($c)) {
						$query_c_data = array('user_id' => $user_id, 'class_id' => $c);
						$this->api_model->dbInsertQuery($query_c_data, 'member_class');
					}
				} //End loop
			}

			if (!empty($subject)) {
				$this->api_model->dbDeleteQuery($user_id, 'user_id', 'member_subjects');

				$subject_array = explode(',', $subject);
				foreach ($subject_array as $s) {
					if (!empty($s)) {
						$query_s_data = array('user_id' => $user_id, 'subject_id' => $s);
						$this->api_model->dbInsertQuery($query_s_data, 'member_subjects');
					}
				} //End loop
			}

			if ($update_data) {
				$activity = 'Updated profile information (Self)';
				$this->activity_log($user_id, $activity);
				$xml_body .= '<status>Success</status>
							  <status_message>Profile has been updated successfully.</status_message>';
			} else {
				$xml_body .= '<status>Failed</status>
					  <status_message>System error encountered while processing request. Please try again shortly.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function member_picture_upload()
	{

		$user_id = $this->entrySanitizer($this->input->post('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->post('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->post('token')), 2);

		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$resp_body = '';
		$resp_status = 0;

		if (empty($token)) {
			$resp_body .= 'Token Authentication Failed';
			$resp_status = 'Failed';
		} elseif (empty($verify_token)) {
			$resp_body .= 'Token Authentication Failed';
			$resp_status = 'Failed';
		} elseif (empty($user_id)) {
			$resp_body .= 'Token Authentication Failed';
			$resp_status = 'Failed';
		} elseif ($verify_token != $token) {
			$resp_body .= 'Token Authentication Failed';
			$resp_status = 'Failed';
		} else {
			$resize_image = 0;
			$passport = '';
			$db_passport = $this->api_model->dbSingleColQuery('passport', 'member', "user_id = '" . $user_id . "'");

			if (isset($_FILES["pix"]) && $_FILES["pix"]["error"] == 0) {
				$image_properties = getimagesize($_FILES['pix']['tmp_name']);
				$image_width = $image_properties[0];
				$image_height = $image_properties[1];

				if ($image_width > 300) {
					$resize_image = 1;
				}
				if ($image_height > 300) {
					$resize_image = 1;
				}

				$imgCheck = 0;
				$imgCheckError = '';

				$pix_name = $this->imageSanitizer($_FILES['pix']['name']);
				$pix_tmp_name = $_FILES['pix']['tmp_name'];
				$pix_error = $_FILES['pix']['error'];
				$pix_type = $_FILES['pix']['type'];

				if ($pix_error == 0 && $this->checkUnsupportedFileExtension($pix_name)) {
					$imgCheck++;
					$imgCheckError = 'Uploaded File extension is not supported';
				}
				if ($pix_error == 0 && !$this->validateIsImage($pix_tmp_name)) {
					$imgCheck++;
					$imgCheckError = 'Uploaded File is not a picture';
				}
				if ($pix_error == 0 && !$this->validateImageSupport($this->getFileExtension($pix_name))) {
					$imgCheck++;
					$imgCheckError = 'Uploaded File format is not supported';
				}
				if ($pix_error == 0 && $this->security->xss_clean($pix_tmp_name, TRUE) === false) {
					$imgCheck++;
					$imgCheckError = 'Uploaded File is invalid';
				}

				if ($imgCheck == 0) {
					$passport = $this->file_uploader('./uploads/passports/', $pix_name, $pix_tmp_name, 'pix', 'member_photo', 'image', $resize_image);

					if (!empty($passport)) {
						$query_data = array('passport' => $passport);
						$update_data = $this->api_model->dbUpdateQuery($query_data, 'member', "user_id = '" . $user_id . "'");
						if ($update_data) {
							$db_passport_path = "./uploads/passports/" . $db_passport;
							if (file_exists($db_passport_path)) {
								// Delete image					
								@unlink($db_passport_path);
							}

							$activity = 'Uploaded Profile Picture';
							$this->activity_log($user_id, $activity);
							$resp_body .= 'Your profile picture has been uploaded and saved successfully';
							$resp_status = 'Success';
						} else {
							$passport_path = "./uploads/passports/" . $passport;
							@unlink($passport_path);
							$resp_body .= 'Whoops! Something went wrong while saving your picture. Please try again shortly.';
							$resp_status = 'Failed';
						}
					} else {
						$resp_body .= 'Whoops! Picture upload failed. Please try again shortly.';
						$resp_status = 'Failed';
					}
				} else {
					$resp_body .= $imgCheckError;
				}
			} else {
				$resp_body .= 'Invalid or Empty Picture Upload';
				$resp_status = 'Failed';
			}
		}

		$jsonData = array(
			'status' => $resp_status,
			'status_message' => $resp_body
		);

		echo json_encode($jsonData);
	} // End function


	public function member_change_password()
	{

		$pwd = $this->entrySanitizer($this->input->get('pwd'));
		$curr_pwd = $this->entrySanitizer($this->input->get('curr_pwd'));

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$verify_user_row = $this->api_model->dbSingleRowQuery('user_id, password', 'user', "user_id = '" . $user_id . "'");
		$verify_user_id = $verify_user_row['user_id'];
		$curr_pwd_hash = $verify_user_row['password'];

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if ($pwd == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>New password must not be blank</status_message>';
		} elseif ($curr_pwd == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>Current password must not be blank</status_message>';
		} elseif (empty($user_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Empty User Parameter</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($curr_pwd_hash == '') {
			$xml_body .= '<status>Failed</status>
						  <status_message>Current password Authentication failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (!password_verify($curr_pwd, $curr_pwd_hash)) {
			$xml_body .= '<status>Failed</status>
						  <status_message>Request cannot be processed. Current password is incorrect.</status_message>';
		} else {
			$new_pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

			$query_data = array('password' => $new_pwd_hash);
			$update_data = $this->api_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");

			$data_row = $this->api_model->dbSingleRowQuery('*', 'member', "user_id = '" . $user_id . "'");
			$name = $data_row['surname'];
			$name .= ' ' . $data_row['first_name'];
			$email = $this->user_email;

			if ($update_data) {

				if (!empty($email)) {

					//************ Start: 	Send Mail ************

					$subject = "Your password has been changed";

					$messageContent = '<p>
						This is to notify you that your password was changed by you. Find your new password below: <br /><br />
						New Password: ' . $pwd . '
						 </p>';

					//$this->sendEmail($email, $subject, $messageContent, 1);
					$this->senderEmail($email, $subject, $messageContent);

					//************ End: 	Send Mail ************

				} //End if

				$activity = 'Changed account password (Self) ' . $name;
				$this->activity_log($user_id, $activity);
				$xml_body .= '<status>Success</status>
							  <status_message>Account password has been changed successfully.</status_message>';
			} else {
				$xml_body .= '<status>Failed</status>
					  <status_message>System error encountered while processing request. Please try again shortly.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function all_class()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$class_list = $this->api_model->dbMultiRowQuery('*', 'class', "", 'order_no', 'ASC');

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			if (!empty($class_list)) {
				$xml_body .= '<status>Success</status>
							  <list>';

				foreach ($class_list as $data_row) {

					$data_id = $data_row['class_id'];
					$class_name = $data_row['name'];
					// $class_name = $this->convert_class_to_word($class_name);

					$xml_body .= '<class class_id="' . $data_id . '">';
					$xml_body .= $class_name;
					$xml_body .= '</class>';
				} //End Loop
				$xml_body .= '</list>';
			} else {
				$xml_body .= '<status>Failed</status>
						  <status_message>No class record was found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');

		$this->output->set_output($xml_body);
	} // End function


	public function all_subject()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$subject_list = $this->api_model->dbMultiRowQuery('subject_id, name', 'subject', "", 'subject_id', 'ASC');

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {

			if (!empty($subject_list)) {
				$xml_body .= '<status>Success</status>
							  <list>';

				foreach ($subject_list as $data_row) {

					$data_id = $data_row['subject_id'];
					$subject_name = $data_row['name'];
					$subject_name = str_replace("&", "and", $subject_name);

					$xml_body .= '<subject subject_id="' . $data_id . '">';
					$xml_body .= $subject_name;
					$xml_body .= '</subject>';
				} //End Loop
				$xml_body .= '</list>';
			} else {
				$xml_body .= '<status>Failed</status>
						  <status_message>No subject record was found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function class_subject()
	{

		$class_id = $this->entrySanitizer($this->input->get('class'));
		//$class_id		=	$this->decryptGetId($class_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$verify_class_id = $this->api_model->dbSingleColQuery('class_id', 'class', "class_id = '" . $class_id . "'");

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {

			if (!empty($class_id) && $class_id == $verify_class_id) {

				$subject_list = $this->api_model->dbMultiRowQuery('subject.subject_id, subject.name', 'subject, class_subject', "class_subject.subject_id = subject.subject_id AND class_subject.class_id = '" . $class_id . "'", 'subject.subject_id', 'ASC');

				if (!empty($subject_list)) {
					$xml_body .= '<status>Success</status>
								  <list>';

					foreach ($subject_list as $data_row) {

						$data_id = $data_row['subject_id'];
						$subject_name = $data_row['name'];
						$subject_name = str_replace("&", "and", $subject_name);

						$xml_body .= '<subject subject_id="' . $data_id . '">';
						$xml_body .= $subject_name;
						$xml_body .= '</subject>';
					} //End Loop
					$xml_body .= '</list>';
				} else {
					$xml_body .= '<status>Failed</status>
							  <status_message>No subject record was found</status_message>';
				}
			} else {
				$xml_body .= '<status>Failed</status>
							  <status_message>Invalid class parameter</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function search_lesson_plan()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));

		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$curr_date = $this->globalCurrentDate;

		$verify_user_id = $this->api_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");

		$sub_row = $this->api_model->dbSingleRowQuery('subscription_users.sub_id', 'subscription, subscription_users', "subscription_users.sub_id = subscription.id AND subscription.sub_status = '1' AND subscription.pay_status = '2' AND date_end >= '" . $curr_date . "' AND subscription_users.user_id = '" . $user_id . "'");
		$verify_sub_id = $sub_row['sub_id'];

		$count_free_status = $this->api_model->dbRowCountQuery('lesson', "free_status = '2'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$result_array = array();

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		}
		/*elseif(empty($verify_sub_id) && $count_free_status == 0){
				  $xml_body .= '<status>Failed</status>
							<status_message>No Active Subscription</status_message>';					
			  }*/ elseif (empty($verify_sub_id)) {

			//****** NO SUBSCRIPTION :  LOAD FREE CONTENT			

			if ($this->input->get('class') || $this->input->get('subject') || $this->input->get('topic')) {

				$class_id = $this->entrySanitizer($this->input->get('class'));
				//$class_id		=	$this->decryptGetId($class_id);
				$subject_id = $this->entrySanitizer($this->input->get('subject'));
				//$subject_id		=	$this->decryptGetId($subject_id);
				$topic = $this->entrySanitizer($this->input->get('topic'));
				$topic = trim($topic);

				if (!empty($topic) && empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (!empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);


					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (!empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (!empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);

					$this->db->or_where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);
				} elseif (empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);
				} elseif (empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
				} elseif (empty($topic) && empty($subject_id) && empty($class_id)) {
					$this->db->select('id, lesson.free_status');
					$this->db->from('lesson');
					$this->db->where('lesson.subject_id', '');
					$this->db->where('lesson.class_id', '');
				}

				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$result_array = $query->result_array();
				}

				//$sq = $this->db->last_query(); Query SQL	

				$this->post_search_log($user_id, $class_id, $subject_id, $topic, 1);
			}

			if (empty($result_array)) {
				$xml_body .= '<status>Failed</status>
							  <status_message>No result matched your search.</status_message>';
				/*$xml_body .= '<status>Failed</status>
								  <status_message>No Active Subscription</status_message>';	*/
			} else {
				$free_exist = 0;

				foreach ($result_array as $data_row) {
					$data_free_status = $data_row['free_status'];
					if ($data_free_status == 2) {
						$free_exist = 1;
					}
				}

				//$resp_status_message = ($free_exist == 1) ? 'Success': 'Failed';
				//$resp_status_detail = ($free_exist == 1) ? '': '<status_message>No Active Subscription</status_message>';

				$resp_status_message = 'Success';
				$resp_status_detail = '<status_message>No Active Subscription</status_message>';

				$xml_body .= '<status>' . $resp_status_message . '</status>
								' . $resp_status_detail . '
							  <list>';

				$p = 1;
				foreach ($result_array as $data_row) {

					$data_free_status = $data_row['free_status'];

					/*if($data_free_status == 2){*/


					$data_id = $data_row['id'];
					$class_name = $data_row['class_name'];
					$class_name = $this->convert_class_to_word($class_name);
					$subject_name = $data_row['subject_name'];
					$topic = $data_row['topic'];
					$doc_name = $data_row['doc_name'];
					$doc_name_link = (!empty($doc_name)) ? $this->app_upload_dir . 'uploads/' . $doc_name : 'nil';
					$doc_pdf_name = $data_row['doc_pdf_name'];
					$doc_pdf_name_link = (!empty($doc_pdf_name)) ? $this->app_upload_dir . 'uploads/' . $doc_pdf_name : 'nil';
					$content = $data_row['content'];
					$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';
					$subscription_status = (!empty($verify_sub_id)) ? 'TRUE' : 'FALSE';

					//$image_data 	= 	$this->api_model->dbSingleRowQuery('lesson_img.pix_name', 'lesson, lesson_img', "lesson.id = lesson_img.lesson_id AND lesson_img.lesson_id = '".$data_id."'");	

					$xml_body .= '<lesson_plan>';
					$xml_body .= '<lesson_id>' . $data_id . '</lesson_id>';
					$xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
					$xml_body .= '<subscription_status>' . $subscription_status . '</subscription_status>';
					$xml_body .= '<topic>' . $topic . '</topic>';
					$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
					$xml_body .= '<class_name>' . $class_name . '</class_name>';
					//$xml_body .= '<doc_word type="msword">'.$doc_name_link.'</doc_word>';
					//$xml_body .= '<doc_pdf type="pdf">'.$doc_pdf_name_link.'</doc_pdf>';
					$xml_body .= '<content>' . $content . '</content>';

					$lesson_pix_list = $this->api_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '" . $data_id . "'", 'id', 'ASC');

					$xml_body .= '<lesson_pictures>';
					if (!empty($lesson_pix_list)) {
						foreach ($lesson_pix_list as $lesson_pix_row) {
							$xml_body .= '<picture' . $p . '>';
							$xml_body .= $this->app_upload_dir . 'uploads/' . $lesson_pix_row['pix_name'];
							//$xml_body .= ',';
							$xml_body .= '</picture' . $p . '>';
							$p++;
						}
					}
					$xml_body .= '</lesson_pictures>';

					$xml_body .= '</lesson_plan>';

					$p = 1;

					/*}//End FREE STATUS Check*/
				} //End Loop

				$xml_body .= '</list>';
			}

			//****** NO SUBSCRIPTION :  LOAD FREE CONTENT		

		} else {

			if ($this->input->get('class') || $this->input->get('subject') || $this->input->get('topic')) {

				$class_id = $this->entrySanitizer($this->input->get('class'));
				//$class_id		=	$this->decryptGetId($class_id);
				$subject_id = $this->entrySanitizer($this->input->get('subject'));
				//$subject_id		=	$this->decryptGetId($subject_id);
				$topic = $this->entrySanitizer($this->input->get('topic'));
				$topic = trim($topic);

				if (!empty($topic) && empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status,  lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (!empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status,  lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (!empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.topic, lesson.id, lesson.free_status,   lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');

					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (!empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status,  lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);

					$this->db->or_where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
				} elseif (empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status,  lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);
				} elseif (empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status,  lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);
				} elseif (empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson.id, lesson.free_status,  lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
				} elseif (empty($topic) && empty($subject_id) && empty($class_id)) {
					$this->db->select('id, free_status');
					$this->db->from('lesson');
					$this->db->where('lesson.subject_id', '');
					$this->db->where('lesson.class_id', '');
				}

				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$result_array = $query->result_array();
				}

				//$sq = $this->db->last_query(); //Query SQL	

				$this->post_search_log($user_id, $class_id, $subject_id, $topic, 1);
			}

			if (empty($result_array)) {
				$xml_body .= '<status>Failed</status>
							  <status_message>No result matched your search.</status_message>';
			} else {
				/*if(!empty($result_array) && empty($verify_sub_id)){
								$xml_body .= '<status>Failed</status>
										  <status_message>Content Available! But you have No Active Subscription.</status_message>';
							}

							else{	*/
				$xml_body .= '<status>Success</status>
								  <list>';

				$p = 1;
				foreach ($result_array as $data_row) {

					$data_id = $data_row['id'];
					$class_name = $data_row['class_name'];
					$class_name = $this->convert_class_to_word($class_name);
					$subject_name = $data_row['subject_name'];
					$topic = $data_row['topic'];
					$doc_name = $data_row['doc_name'];
					$doc_name_link = (!empty($doc_name)) ? $this->app_upload_dir . 'uploads/' . $doc_name : 'nil';
					$doc_pdf_name = $data_row['doc_pdf_name'];
					$doc_pdf_name_link = (!empty($doc_pdf_name)) ? $this->app_upload_dir . 'uploads/' . $doc_pdf_name : 'nil';
					$content = $data_row['content'];

					$data_free_status = $data_row['free_status'];
					$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';
					$subscription_status = (!empty($verify_sub_id)) ? 'TRUE' : 'FALSE';

					$xml_body .= '<lesson_plan>';
					$xml_body .= '<lesson_id>' . $data_id . '</lesson_id>';
					$xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
					$xml_body .= '<subscription_status>' . $subscription_status . '</subscription_status>';
					$xml_body .= '<topic>' . $topic . '</topic>';
					$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
					$xml_body .= '<class_name>' . $class_name . '</class_name>';
					//$xml_body .= '<doc_word type="msword">'.$doc_name_link.'</doc_word>';
					//$xml_body .= '<doc_pdf type="pdf">'.$doc_pdf_name_link.'</doc_pdf>';
					$xml_body .= '<content>' . $content . '</content>';

					$lesson_pix_list = $this->api_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '" . $data_id . "'", 'id', 'ASC');

					$xml_body .= '<lesson_pictures>';
					if (!empty($lesson_pix_list)) {
						foreach ($lesson_pix_list as $lesson_pix_row) {
							$xml_body .= '<picture' . $p . '>';
							$xml_body .= $this->app_upload_dir . 'uploads/' . $lesson_pix_row['pix_name'];
							//$xml_body .= ',';
							$xml_body .= '</picture' . $p . '>';
							$p++;
						}
					}
					$xml_body .= '</lesson_pictures>';

					$xml_body .= '</lesson_plan>';

					$p = 1;
				} //End Loop

				$xml_body .= '</list>';
				/*}*/
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion



	public function get_lesson_plan_data()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$curr_date = $this->globalCurrentDate;

		$sub_row = $this->api_model->dbSingleRowQuery('subscription_users.sub_id', 'subscription, subscription_users', "subscription_users.sub_id = subscription.id AND subscription.sub_status = '1' AND subscription.pay_status = '2' AND date_end >= '" . $curr_date . "' AND subscription_users.user_id = '" . $user_id . "'");
		$verify_sub_id = $sub_row['sub_id'];

		$pc_order_id = $this->api_model->dbSingleRowQuery('pc_order.id', 'pc_order, pc_order_details', "pc_order.id = pc_order_details.order_id AND pc_order.user_id = '" . $user_id . "' AND pc_order_details.completed_data_id = '" . $lesson_id . "'");

		$verify_user_id = $this->api_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");
		$verify_lesson_data = $this->api_model->dbSingleRowQuery('id, free_status', 'lesson', "id = '" . $lesson_id . "'");
		$verify_lesson_plan = $verify_lesson_data['id'];
		$verify_lesson_free_status = $verify_lesson_data['free_status'];

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$result_array = array();

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($lesson_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Lesson parameter required</status_message>';
		} elseif (empty($verify_lesson_plan)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Invalid Lesson parameter</status_message>';
		} else {
			$subscription_validate = 0;

			if (!empty($verify_sub_id)) {
				$subscription_validate = 1;
			} elseif ($verify_lesson_free_status != 2 && empty($verify_sub_id) && empty($pc_order_id)) {
				$subscription_validate = 0;
			} elseif ($verify_lesson_free_status != 2 && empty($verify_sub_id) && !empty($pc_order_id)) {
				$subscription_validate = 1;
			}

			if ($this->site_config['free_content_status'] == 'On') {
				$subscription_validate = 1; // ALL CONTENT FREE
			}

			if ($subscription_validate < 1) {
				$xml_body .= '<status>No Subscription</status>
								  <status_message>Content Available! But you have No Active Subscription.</status_message>';
			} else {
				$this->save_recent_view($user_id, $lesson_id, 1);
				$this->pc_save_first_content_view($user_id, $lesson_id);

				$data_row = $this->api_model->dbSingleRowQuery('lesson.id, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name', 'lesson, class, subject', "class.class_id = lesson.class_id AND subject.subject_id = lesson.subject_id AND lesson.id = '" . $lesson_id . "'");

				$xml_body .= '<status>Success</status>
								  <list>';

				$p = 1;

				$data_id = $data_row['id'];
				$class_name = $data_row['class_name'];
				$class_name = $this->convert_class_to_word($class_name);
				$subject_name = $data_row['subject_name'];
				$topic = $data_row['topic'];
				$doc_name = $data_row['doc_name'];
				$doc_name_link = (!empty($doc_name)) ? $doc_name : 'nil';
				$doc_pdf_name = $data_row['doc_pdf_name'];
				$doc_pdf_name_link = (!empty($doc_pdf_name)) ? $doc_pdf_name : 'nil';
				$content = $data_row['content'];

				$xml_body .= '<lesson_plan>';
				$xml_body .= '<lesson_id>' . $data_id . '</lesson_id>';
				$xml_body .= '<topic>' . $topic . '</topic>';
				$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
				$xml_body .= '<class_name>' . $class_name . '</class_name>';
				$xml_body .= '<doc_word type="msword">' . $this->app_upload_dir . 'uploads/' . $doc_name_link . '</doc_word>';
				$xml_body .= '<doc_pdf type="pdf">' . $this->app_upload_dir . 'uploads/' . $doc_pdf_name_link . '</doc_pdf>';
				$xml_body .= '<content>' . $content . '</content>';

				$lesson_pix_list = $this->api_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '" . $data_id . "'", 'id', 'ASC');

				$xml_body .= '<lesson_pictures>';
				if (!empty($lesson_pix_list)) {
					foreach ($lesson_pix_list as $lesson_pix_row) {
						$xml_body .= '<picture' . $p . '>';
						$xml_body .= $this->app_upload_dir . 'uploads/' . $lesson_pix_row['pix_name'];
						$xml_body .= '</picture' . $p . '>';
						$p++;
					}
				}
				$xml_body .= '</lesson_pictures>';

				$xml_body .= '</lesson_plan>';

				$xml_body .= '</list>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function get_lesson_plan_image()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));


		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$verify_lesson_data = $this->api_model->dbRowCountQuery('lesson', "id = '" . $lesson_id . "'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($lesson_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Lesson parameter required</status_message>';
		} elseif ($verify_lesson_data < 1) {
			$xml_body .= '<status>Failed</status>
					  <status_message>No content was found for requested Lesson</status_message>';
		} else {
			$image_data = $this->api_model->dbSingleRowQuery('lesson_img.pix_name', 'lesson, lesson_img', "lesson.id = lesson_img.lesson_id AND lesson_img.lesson_id = '" . $lesson_id . "'");

			if (!empty($image_data)) {
				$xml_body .= '<status>Success</status>';

				$content_image = $image_data['pix_name'];

				$xml_body .= '<lesson_image>';
				$xml_body .= $name;
				$xml_body .= $content_image;
				$xml_body .= '</lesson_image>';
			} else {
				$xml_body .= '<status>Null</status>';
				$xml_body .= '<lesson_image></lesson_image>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');

		$this->output->set_output($xml_body);
	} //End funtion


	public function search_innovative()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$curr_date = $this->globalCurrentDate;

		$verify_user_id = $this->api_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");

		$sub_row = $this->api_model->dbSingleRowQuery('subscription_users.sub_id', 'subscription, subscription_users', "subscription_users.sub_id = subscription.id AND subscription.sub_status = '1' AND subscription.pay_status = '2' AND date_end >= '" . $curr_date . "' AND subscription_users.user_id = '" . $user_id . "'");
		$verify_sub_id = $sub_row['sub_id'];

		$count_free_status = $this->api_model->dbRowCountQuery('lesson', "free_status = '2'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		$result_array = array();


		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		}
		/*elseif(empty($verify_sub_id) && $count_free_status == 0){
				  $xml_body .= '<status>Failed</status>
							<status_message>No Active Subscription</status_message>';					
			  }*/ elseif (empty($verify_sub_id)) {

			//****** NO SUBSCRIPTION :  LOAD FREE CONTENT


			if ($this->input->get('class') || $this->input->get('subject') || $this->input->get('topic')) {

				$class_id = $this->entrySanitizer($this->input->get('class'));
				//$class_id		=	$this->decryptGetId($class_id);
				$subject_id = $this->entrySanitizer($this->input->get('subject'));
				//$subject_id		=	$this->decryptGetId($subject_id);
				$topic = $this->entrySanitizer($this->input->get('topic'));
				$topic = trim($topic);

				$group_by_col = 'lesson_innovative.lesson_id';

				if (!empty($topic) && empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (!empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (!empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (!empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);
					$this->db->group_by($group_by_col);
				} elseif (empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);
					$this->db->group_by($group_by_col);
				} elseif (empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->group_by($group_by_col);
				}

				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$result_array = $query->result_array();
				}

				$this->post_search_log($user_id, $class_id, $subject_id, $topic, 2);
			}

			if (empty($result_array)) {
				$xml_body .= '<status>Failed</status>
							  <status_message>No result matched your search.</status_message>';
			} else {
				$free_exist = 0;
				foreach ($result_array as $data_row) {
					$data_free_status = $data_row['free_status'];
					if ($data_free_status == 2) {
						$free_exist = 1;
					}
				}

				$resp_status_message = ($free_exist == 1) ? 'Success' : 'Failed';
				$resp_status_detail = ($free_exist == 1) ? '' : '<status_message>No Active Subscription</status_message>';

				$xml_body .= '<status>' . $resp_status_message . '</status>
								' . $resp_status_detail . '
							  <list>';

				$p = 1;
				foreach ($result_array as $data_row) {

					$data_free_status = $data_row['free_status'];

					/*if($data_free_status == 2){*/

					$data_id = $data_row['id'];
					$lesson_id = $data_row['lesson_id'];
					$topic = $data_row['topic'];
					//$topic = $this->limitLongText($topic, 35, 1);	
					$class_name = $data_row['class_name'];
					$class_name = $this->convert_class_to_word($class_name);
					$subject_name = $data_row['subject_name'];

					$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';
					$subscription_status = (!empty($verify_sub_id)) ? 'TRUE' : 'FALSE';

					$component = $data_row['component'];
					$component_name = $this->api_model->dbSingleColQuery('name', 'components', "id = '" . $component . "'");

					$filename = $this->app_upload_dir . 'uploads/' . $data_row['filename'];
					$video_url = $data_row['video_url'];
					$text_content = $data_row['text_content'];

					$xml_body .= '<innovative_content innovative_id="' . $data_id . '">';
					$xml_body .= '<component_name>' . $component_name . '</component_name>';
					$xml_body .= '<lesson_id>' . $lesson_id . '</lesson_id>';
					$xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
					$xml_body .= '<subscription_status>' . $subscription_status . '</subscription_status>';
					$xml_body .= '<topic>' . $topic . '</topic>';
					$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
					$xml_body .= '<class_name>' . $class_name . '</class_name>';

					$xml_body .= '<content_data>';

					if (!empty($filename)) {
						$xml_body .= '<data data_type="image">';
						$xml_body .= $filename;
						$xml_body .= '</data>';
					}

					if (!empty($video_url)) {
						$xml_body .= '<data data_type="url">';
						$video_url = $this->addhttp($video_url);
						$video_url = $this->cleanContentUrl($video_url);
						$xml_body .= $video_url;
						$xml_body .= '</data>';
					}

					if (!empty($text_content)) {
						$xml_body .= '<data data_type="text">';
						$text_content = str_replace(';', "", $text_content);
						$xml_body .= $text_content;
						$xml_body .= '</data>';
					}

					$xml_body .= '</content_data>';

					$xml_body .= '</innovative_content>';

					/*}//End FREE STATUS Check*/
				} //End Loop			

				$xml_body .= '</list>';
			}

			//****** NO SUBSCRIPTION :  LOAD FREE CONTENT	
		} else {
			if ($this->input->get('class') || $this->input->get('subject') || $this->input->get('topic')) {

				$class_id = $this->entrySanitizer($this->input->get('class'));
				//$class_id		=	$this->decryptGetId($class_id);
				$subject_id = $this->entrySanitizer($this->input->get('subject'));
				//$subject_id		=	$this->decryptGetId($subject_id);
				$topic = $this->entrySanitizer($this->input->get('topic'));
				$topic = trim($topic);

				$group_by_col = 'lesson_innovative.lesson_id';

				if (!empty($topic) && empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status,, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (!empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status,, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (!empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status,, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (!empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status,, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);

					$this->db->where('MATCH (lesson.topic) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);
					$this->db->or_where('MATCH (lesson.keywords) AGAINST ("' . $topic . '" IN BOOLEAN MODE)', NULL, FALSE);

					$this->db->group_by($group_by_col);
				} elseif (empty($topic) && !empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status,, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->where('lesson.class_id', $class_id);
					$this->db->group_by($group_by_col);
				} elseif (empty($topic) && empty($subject_id) && !empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status,, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.class_id', $class_id);
					$this->db->group_by($group_by_col);
				} elseif (empty($topic) && !empty($subject_id) && empty($class_id)) {
					$this->db->select('lesson_innovative.id, lesson_innovative.component, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson.free_status,, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name');
					$this->db->from('lesson_innovative');
					$this->db->join('lesson', 'lesson_innovative.lesson_id = lesson.id');
					$this->db->join('class', 'class.class_id = lesson.class_id');
					$this->db->join('subject', 'subject.subject_id = lesson.subject_id');

					$this->db->where('lesson.subject_id', $subject_id);
					$this->db->group_by($group_by_col);
				}

				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$result_array = $query->result_array();
				}

				$this->post_search_log($user_id, $class_id, $subject_id, $topic, 2);
			}

			if (empty($result_array)) {
				$xml_body .= '<status>Failed</status>
							  <status_message>No result matched your search.</status_message>';
			} else {
				/*if(!empty($result_array) && empty($verify_sub_id) && $count_free_status == 0){
								$xml_body .= '<status>Failed</status>
										  <status_message>Content Available! But you have No Active Subscription.</status_message>';
							}
							else{*/
				$xml_body .= '<status>Success</status>
								  <list>';

				foreach ($result_array as $data_row) {

					$data_id = $data_row['id'];
					$lesson_id = $data_row['lesson_id'];
					$topic = $data_row['topic'];
					//$topic = $this->limitLongText($topic, 35, 1);	
					$class_name = $data_row['class_name'];
					$class_name = $this->convert_class_to_word($class_name);
					$subject_name = $data_row['subject_name'];
					$data_free_status = $data_row['free_status'];
					$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';
					$subscription_status = (!empty($verify_sub_id)) ? 'TRUE' : 'FALSE';

					$component = $data_row['component'];
					$component_name = $this->api_model->dbSingleColQuery('name', 'components', "id = '" . $component . "'");

					$filename = $this->app_upload_dir . 'uploads/' . $data_row['filename'];
					$video_url = $data_row['video_url'];
					$text_content = $data_row['text_content'];

					$xml_body .= '<innovative_content innovative_id="' . $data_id . '">';
					$xml_body .= '<component_name>' . $component_name . '</component_name>';
					$xml_body .= '<lesson_id>' . $lesson_id . '</lesson_id>';
					$xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
					$xml_body .= '<subscription_status>' . $subscription_status . '</subscription_status>';
					$xml_body .= '<topic>' . $topic . '</topic>';
					$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
					$xml_body .= '<class_name>' . $class_name . '</class_name>';

					$xml_body .= '<content_data>';

					if (!empty($filename)) {
						$xml_body .= '<data data_type="image">';
						$xml_body .= $filename;
						$xml_body .= '</data>';
					}

					if (!empty($video_url)) {
						$xml_body .= '<data data_type="url">';
						$video_url = $this->addhttp($video_url);
						$video_url = $this->cleanContentUrl($video_url);
						$xml_body .= $video_url;
						$xml_body .= '</data>';
					}

					if (!empty($text_content)) {
						$xml_body .= '<data data_type="text">';
						$text_content = str_replace(';', "", $text_content);
						$xml_body .= $text_content;
						$xml_body .= '</data>';
					}

					$xml_body .= '</content_data>';

					$xml_body .= '</innovative_content>';
				} //End Loop

				$xml_body .= '</list>';
				/*}*/
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion



	public function search_innovative_component()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$verify_user_id = $this->api_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");
		$verify_innovative_list = $this->api_model->dbRowCountQuery('lesson_innovative', "lesson_id = '" . $lesson_id . "'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$result_array = array();

		$xml_status = 'Success';


		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($lesson_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Lesson parameter required</status_message>';
		} elseif ($verify_innovative_list < 1) {
			$xml_body .= '<status>Failed</status>
					  <status_message>No Innovative content was found for requested Lesson</status_message>';
		} else {
			$xml_body .= '<status>Success</status>';

			$components_list = $this->api_model->dbMultiRowQuery('*', 'components', "", 'id', 'ASC');

			if (!empty($components_list)) {

				$xml_body .= '<components lesson_id="' . $lesson_id . '">';

				foreach ($components_list as $components_row) {
					$cid = $components_row['id'];
					$name = $components_row['name'];
					$short_name = $components_row['short_name'];
					$xml_body .= '<component component_id="' . $cid . '" component_short="' . $short_name . '">';
					$xml_body .= $name;
					$xml_body .= '</component>';
				} //End loop

				$xml_body .= '</components>';
			} else {
				$xml_body .= '<components></components>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function get_innovative_component()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$verify_user_id = $this->api_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$result_array = array();

		$xml_status = 'Success';


		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} else {
			$xml_body .= '<status>Success</status>';

			$components_list = $this->api_model->dbMultiRowQuery('*', 'components', "", 'id', 'ASC');

			if (!empty($components_list)) {

				$xml_body .= '<components>';

				foreach ($components_list as $components_row) {
					$cid = $components_row['id'];
					$name = $components_row['name'];
					$short_name = $components_row['short_name'];
					$xml_body .= '<component component_id="' . $cid . '" component_short="' . $short_name . '">';
					$xml_body .= $name;
					$xml_body .= '</component>';
				} //End loop

				$xml_body .= '</components>';
			} else {
				$xml_body .= '<components></components>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function search_innovative_detail()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));
		$component_id = $this->entrySanitizer($this->input->get('component'));

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$curr_date = $this->globalCurrentDate;

		$sub_row = $this->api_model->dbSingleRowQuery('subscription_users.sub_id', 'subscription, subscription_users', "subscription_users.sub_id = subscription.id AND subscription.sub_status = '1' AND subscription.pay_status = '2' AND date_end >= '" . $curr_date . "' AND subscription_users.user_id = '" . $user_id . "'");
		$verify_sub_id = $sub_row['sub_id'];

		$pc_order_id = $this->api_model->dbSingleRowQuery('pc_order.id', 'pc_order, pc_order_details', "pc_order.id = pc_order_details.order_id AND pc_order.user_id = '" . $user_id . "' AND pc_order_details.completed_data_id = '" . $lesson_id . "'");

		$verify_user_id = $this->api_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");
		$verify_innovative_list = $this->api_model->dbRowCountQuery('lesson_innovative', "lesson_id = '" . $lesson_id . "' AND component = '" . $component_id . "'");

		$verify_lesson_data = $this->api_model->dbSingleRowQuery('lesson_innovative.id, lesson.free_status', 'lesson_innovative, lesson', "lesson_innovative.lesson_id = lesson.id AND lesson_innovative.lesson_id = '" . $lesson_id . "'");
		$verify_innovative_id = $verify_lesson_data['id'];
		$verify_lesson_free_status = $verify_lesson_data['free_status'];

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$result_array = array();

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_user_id != $user_id) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User Authentication Failed</status_message>';
		} elseif ($lesson_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Lesson parameter required</status_message>';
		} elseif ($component_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Component ID parameter required</status_message>';
		} elseif ($verify_innovative_list < 1) {
			$xml_body .= '<status>Failed</status>
					  <status_message>No Innovative content was found for requested component</status_message>';
		} else {
			$subscription_validate = 0;

			if (!empty($verify_sub_id)) {
				$subscription_validate = 1;
			} elseif ($verify_lesson_free_status != 2 && empty($verify_sub_id) && empty($pc_order_id)) {
				$subscription_validate = 0;
			} elseif ($verify_lesson_free_status != 2 && empty($verify_sub_id) && !empty($pc_order_id)) {
				$subscription_validate = 1;
			}

			if ($this->site_config['free_content_status'] == 'On') {
				$subscription_validate = 1; // ALL CONTENT FREE
			}

			if ($subscription_validate < 1) {
				$xml_body .= '<status>No Subscription</status>
								  <status_message>Content Available! But you have No Active Subscription.</status_message>';
			} else {
				$xml_body .= '<status>Success</status>';

				$this->save_recent_view($user_id, $lesson_id, 2, $component_id);
				$this->pc_save_first_content_view($user_id, $lesson_id, 2, $component_id);

				$data_row = $this->api_model->dbSingleRowQuery('lesson_innovative.id, lesson_innovative.lesson_id, lesson.topic, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name', 'lesson_innovative, lesson, class, subject', "lesson_innovative.lesson_id = lesson.id AND class.class_id = lesson.class_id AND subject.subject_id = lesson.subject_id AND lesson.id = '" . $lesson_id . "' AND lesson_innovative.component = '" . $component_id . "'");


				$data_id = $data_row['id'];
				$lesson_id = $data_row['lesson_id'];
				$topic = $data_row['topic'];
				$class_name = $data_row['class_name'];
				$class_name = $this->convert_class_to_word($class_name);
				$subject_name = $data_row['subject_name'];

				$xml_body .= '<innovative_content innovative_id="' . $data_id . '">';
				$xml_body .= '<lesson_id>' . $lesson_id . '</lesson_id>';
				$xml_body .= '<topic>' . $topic . '</topic>';
				$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
				$xml_body .= '<class_name>' . $class_name . '</class_name>';

				$this->db->select('lesson_innovative.id, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.format, lesson_innovative.component, lesson_innovative.category, lesson_innovative.app_id');
				$this->db->from('lesson_innovative');
				$this->db->where('lesson_innovative.lesson_id', $lesson_id);
				$this->db->where('lesson_innovative.component', $component_id);

				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$components_list = $query->result_array();

					if (!empty($components_list)) {

						$xml_body .= '<contents>';

						$c = 1;
						$content_web_url = '';
						$content_web_url_app = array();
						$content_images = '';
						$content_images_app = array();
						$content_text = '';
						$content_text_app = array();

						$check_content_img = 0;
						$check_content_url = 0;
						$check_content_txt = 0;

						foreach ($components_list as $components_row) {

							$component = $components_row['component'];
							$category = $components_row['category'];
							$category_name = $this->component_cat_value($category);
							$format = $components_row['format'];
							$format_name = $this->component_format_value($format);
							$app_id = $components_row['app_id'];

							$app_name = (!empty($app_id)) ? $this->api_model->dbSingleColQuery('name', 'media_app', "id = '" . $app_id . "'") : $category_name;

							$content = '';

							if ($format == 1) {
								$filename = $components_row['filename'];
								$content = $this->app_upload_dir . 'uploads/' . $filename;

								$content_images .= $content;
								$content_images .= ', ';
								$content_images_app[] = $app_name;
								$check_content_img++;
							} elseif ($format == 2) {
								$video_url = $components_row['video_url'];
								$video_url = $this->addhttp($video_url);
								$video_url = $this->cleanContentUrl($video_url);
								$content = $video_url;
								$content = str_replace(';', "", $content);

								$content_web_url .= $content;
								$content_web_url .= ', ';
								$content_web_url_app[] = $app_name;
								$check_content_url++;
							} elseif ($format == 3) {
								$content = $components_row['text_content'];
								$content = str_replace(';', "", $content);

								$content_text .= $content;
								$content_text .= ', ';
								$content_text_app[] = $app_name;
								$check_content_txt++;
							}

							$c++;
						} //end loop

						$content_web_url = substr($content_web_url, 0, -2);
						$content_images = substr($content_images, 0, -2);
						$content_text = substr($content_text, 0, -2);

						// Remove empty element
						$content_images_app = array_filter($content_images_app);
						$content_web_url_app = array_filter($content_web_url_app);
						$content_text_app = array_filter($content_text_app);

						// Remove duplicate element
						//$content_images_app = array_unique($content_images_app);
						//$content_web_url_app = array_unique($content_web_url_app);
						//$content_text_app = array_unique($content_text_app);

						// Implode
						$content_images_app = implode(',', $content_images_app);
						$content_web_url_app = implode(',', $content_web_url_app);
						$content_text_app = implode(',', $content_text_app);

						if ($check_content_img > 0) {
							$xml_body .= '<images useable_app="' . $content_images_app . '">';
							$xml_body .= $content_images;
							$xml_body .= '</images>';
						}

						if ($check_content_url > 0) {
							$xml_body .= '<weburl useable_app="' . $content_web_url_app . '">';
							$xml_body .= $content_web_url;
							$xml_body .= '</weburl>';
						}

						if ($check_content_txt > 0) {
							$xml_body .= '<texts useable_app="' . $content_text_app . '">';
							$xml_body .= $content_text;
							$xml_body .= '</texts>';
						}

						$xml_body .= '</contents>';
					} else {
						$xml_body .= '<contents></contents>';
					}
				} else {
					$xml_body .= '<contents></contents>';
				}

				$xml_body .= '</innovative_content>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function get_innovative_data()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$innovative_id = $this->entrySanitizer($this->input->get('innovative_id'));

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$curr_date = $this->globalCurrentDate;

		$sub_row = $this->api_model->dbSingleRowQuery('subscription_users.sub_id', 'subscription, subscription_users', "subscription_users.sub_id = subscription.id AND subscription.sub_status = '1' AND subscription.pay_status = '2' AND date_end >= '" . $curr_date . "' AND subscription_users.user_id = '" . $user_id . "'");
		$verify_sub_id = $sub_row['sub_id'];

		$verify_lesson_data = $this->api_model->dbSingleRowQuery('lesson_innovative.id, lesson_innovative.lesson_id, lesson.free_status', 'lesson_innovative, lesson', "lesson_innovative.lesson_id = lesson.id AND lesson_innovative.id = '" . $innovative_id . "'");
		$verify_innovative_id = $verify_lesson_data['id'];
		$lesson_id = $verify_lesson_data['lesson_id'];
		$verify_lesson_free_status = $verify_lesson_data['free_status'];

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($innovative_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Lesson parameter required</status_message>';
		} elseif (empty($verify_innovative_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>No Innovative content was found for requested Lesson</status_message>';
		} elseif ($verify_lesson_free_status != 2 && empty($verify_sub_id)) {
			$xml_body .= '<status>No Subscription</status>
							  <status_message>Content Available! But you have No Active Subscription.</status_message>';
		} else {
			$content_data = $this->api_model->dbSingleRowQuery('filename, video_url, text_content', 'lesson_innovative', "id = '" . $innovative_id . "'");

			if (!empty($content_data)) {

				$xml_body .= '<status>Success</status>';

				$filename = $content_data['filename'];
				$video_url = $content_data['video_url'];
				$text_content = $content_data['text_content'];

				$xml_body .= '<innovative_content>';

				if (!empty($filename)) {
					$xml_body .= '<content content_type="image">';
					$xml_body .= $this->app_upload_dir . 'uploads/' . $filename;
					$xml_body .= '</content>';
				}

				if (!empty($video_url)) {
					$xml_body .= '<content content_type="url">';
					$video_url = $this->addhttp($video_url);
					$video_url = $this->cleanContentUrl($video_url);
					$xml_body .= $video_url;
					$xml_body .= '</content>';
				}

				if (!empty($text_content)) {
					$xml_body .= '<content content_type="text">';
					$text_content = str_replace(';', "", $text_content);
					$xml_body .= $text_content;
					$xml_body .= '</content>';
				}

				$xml_body .= '</innovative_content>';
			} else {
				$xml_body .= '<status>Null</status>';
				$xml_body .= '<innovative_content></innovative_content>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function get_innovative_content_image()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$verify_innovative_list = $this->api_model->dbRowCountQuery('lesson_innovative', "lesson_id = '" . $lesson_id . "'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($lesson_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Lesson parameter required</status_message>';
		} elseif ($verify_innovative_list < 1) {
			$xml_body .= '<status>Failed</status>
					  <status_message>No Innovative content was found for requested Lesson</status_message>';
		} else {
			$image_data = $this->api_model->dbSingleRowQuery('filename', 'lesson_innovative', "lesson_id = '" . $lesson_id . "'");

			if (!empty($image_data)) {
				$xml_body .= '<status>Success</status>';

				$content_image = $image_data['filename'];

				$xml_body .= '<lesson_image>';
				$xml_body .= $content_image;
				$xml_body .= '</lesson_image>';
			} else {
				$xml_body .= '<status>Null</status>';
				$xml_body .= '<lesson_image></lesson_image>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function save_innovative_download()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';


		$innovative_id = $this->entrySanitizer($this->input->get('innovative_id'));

		$verify_innovative_id = $this->api_model->dbSingleColQuery('id', 'lesson_innovative', "id = '" . $innovative_id . "'");

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			if (!empty($innovative_id) && $innovative_id == $verify_innovative_id) {
				$query_data = array('user_id' => $user_id, 'innovative_id' => $innovative_id, 'dpoint' => 2, 'dtime' => $this->globalCurrentTimeStamp);
				$data_insert = $this->api_model->dbInsertQuery($query_data, 'lesson_innovative_download');

				if ($data_insert) {
					$xml_body .= '<status>Success</status>';

					$activity = 'Saved Innovative Content';
					$this->activity_log($user_id, $activity);
				} else {
					$xml_body .= '<status>Failed</status>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function save_lesson_download_word()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));

		$verify_lesson_id = $this->api_model->dbSingleColQuery('id', 'lesson', "id = '" . $lesson_id . "'");

		$download_counter_word = $this->get_lesson_download_count($user_id, 'word');
		$download_counter_pdf = $this->get_lesson_download_count($user_id, 'pdf');

		$verify_download_word = $this->verify_lesson_download_exist($user_id, 'word', $lesson_id);
		$verify_download_pdf = $this->verify_lesson_download_exist($user_id, 'pdf', $lesson_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($download_counter_word >= 6 && $verify_download_word < 1) {
			$xml_body .= '<status>MaxDownload</status>
					  <status_message>You have reached your daily download limit.</status_message>';
		} elseif ($download_counter_pdf >= 6 && $verify_download_pdf < 1) {
			$xml_body .= '<status>MaxDownload</status>
					  <status_message>You have reached your daily download limit.</status_message>';
		} else {
			if (!empty($lesson_id) && $lesson_id == $verify_lesson_id) {
				$query_data = array('user_id' => $user_id, 'lesson_id' => $lesson_id, 'filetype' => 'word', 'dpoint' => 2, 'dtime' => $this->globalCurrentTimeStamp);
				$data_insert = $this->api_model->dbInsertQuery($query_data, 'lesson_download');

				if ($data_insert) {
					$xml_body .= '<status>Success</status>';
					$xml_body .= '<status_message word="' . $download_counter_word . '" pdf="' . $download_counter_pdf . '"></status_message>';

					$activity = 'Saved Lesson Plan (MS Word)';
					$this->activity_log($user_id, $activity);
				} else {
					$xml_body .= '<status>Failed</status>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function save_lesson_download_pdf()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));

		$verify_lesson_id = $this->api_model->dbSingleColQuery('id', 'lesson', "id = '" . $lesson_id . "'");

		$download_counter_pdf = $this->get_lesson_download_count($user_id, 'pdf');
		$download_counter_word = $this->get_lesson_download_count($user_id, 'word');

		$verify_download_pdf = $this->verify_lesson_download_exist($user_id, 'pdf', $lesson_id);
		$verify_download_word = $this->verify_lesson_download_exist($user_id, 'word', $lesson_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($download_counter_pdf >= 6 && $verify_download_pdf < 1) {
			$xml_body .= '<status>MaxDownload</status>
					  <status_message>You have reached your daily download limit.</status_message>';
		} elseif ($download_counter_word >= 6 && $verify_download_word < 1) {
			$xml_body .= '<status>MaxDownload</status>
					  <status_message>You have reached your daily download limit.</status_message>';
		} else {
			if (!empty($lesson_id) && $lesson_id == $verify_lesson_id) {
				$query_data = array('user_id' => $user_id, 'lesson_id' => $lesson_id, 'filetype' => 'pdf', 'dpoint' => 2, 'dtime' => $this->globalCurrentTimeStamp);
				$data_insert = $this->api_model->dbInsertQuery($query_data, 'lesson_download');

				if ($data_insert) {
					$xml_body .= '<status>Success</status>';
					$xml_body .= '<status_message word="' . $download_counter_word . '" pdf="' . $download_counter_pdf . '"></status_message>';

					$activity = 'Saved Lesson Plan (PDF)';
					$this->activity_log($user_id, $activity);
				} else {
					$xml_body .= '<status>Failed</status>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function get_lesson_download_count($user_id, $filetype)
	{

		$current_datetime = $this->globalCurrentDate . ' 00:00:00';
		$date_next = $this->generateFutureDate($this->globalCurrentDate, 1);
		$next_current_datetime = $date_next . ' 00:00:00';

		/*$download_query 	= 	$this->api_model->dbMultiRowQuery('DISTINCT(lesson_id) AS get_lesson_id', 'lesson_download', "user_id = '".$user_id."' AND filetype = '".$filetype."' AND dtime >= '".$current_datetime."' AND dtime < '".$next_current_datetime."'", '', '', '', '', 'lesson_id');*/

		$download_query = $this->api_model->dbMultiRowQuery('DISTINCT(lesson_id) AS get_lesson_id', 'lesson_download', "user_id = '" . $user_id . "' AND filetype = '" . $filetype . "' AND dtime >= '" . $current_datetime . "' AND dtime < '" . $next_current_datetime . "'");

		$count = 0;

		if (!empty($download_query)) {
			$count = count($download_query);
		}

		return $count;
	} // End function


	public function verify_lesson_download_exist($user_id, $filetype, $lesson_id)
	{

		$current_datetime = $this->globalCurrentDate . ' 00:00:00';
		$date_next = $this->generateFutureDate($this->globalCurrentDate, 1);
		$next_current_datetime = $date_next . ' 00:00:00';

		$verify_download = $this->api_model->dbSingleRowQuery('id', 'lesson_download', "user_id = '" . $user_id . "' AND lesson_id = '" . $lesson_id . "' AND filetype = '" . $filetype . "' AND dtime >= '" . $current_datetime . "' AND dtime < '" . $next_current_datetime . "'");

		if (!empty($verify_download)) {
			return 1;
		} else {
			return 0;
		}
	} // End function


	public function saved_lesson_download_count()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$filetype = $this->entrySanitizer($this->input->get('filetype'));

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$filetype_array = array('word', 'pdf');

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (!in_array($filetype, $filetype_array)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Invalid file type was sent</status_message>';
		} else {
			$current_datetime = $this->globalCurrentDate . ' 00:00:00';
			$date_next = $this->generateFutureDate($this->globalCurrentDate, 1);
			$next_current_datetime = $date_next . ' 00:00:00';

			$download_query = $this->api_model->dbMultiRowQuery('DISTINCT(lesson_id) AS get_lesson_id', 'lesson_download', "user_id = '" . $user_id . "' AND filetype = '" . $filetype . "' AND dtime >= '" . $current_datetime . "' AND dtime < '" . $next_current_datetime . "'", '', '', '', '', 'lesson_id');

			$count = 0;

			if (!empty($download_query)) {
				$count = count($download_query);
			}

			if ($count < 6) {
				$xml_body .= '<status>Success</status>';
				$xml_body .= '<download_count>';
				$xml_body .= $count;
				$xml_body .= '</download_count>';
			} else {
				$xml_body .= '<status>MaxDownload</status>';
				$xml_body .= '<download_count>';
				$xml_body .= $count;
				$xml_body .= '</download_count>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function get_lesson_plan_download()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$data_list = $this->api_model->dbMultiRowQuery('lesson_download.user_id, lesson_download.filetype, lesson_download.dtime, lesson.doc_pdf_name, lesson.doc_name, lesson.id, lesson.topic, lesson.class_id, lesson.subject_id', 'lesson_download, lesson', "lesson.id = lesson_download.lesson_id AND lesson_download.user_id = '" . $user_id . "' AND lesson_download.dpoint = '2'", 'lesson_download.dtime', 'DESC');

			if (!empty($data_list)) {
				$xml_body .= '<status>Success</status>';

				$xml_body .= '<saved_contents>';

				foreach ($data_list as $data_row) {
					$lesson_id = $data_row['id'];
					$topic = $data_row['topic'];
					$class_id = $data_row['class_id'];
					$subject_id = $data_row['subject_id'];

					$filetype = $data_row['filetype'];
					$word_data = $data_row['doc_name'];
					$pdf_data = $data_row['doc_pdf_name'];

					$classname = $this->api_model->dbSingleColQuery('name', 'class', "class_id = '" . $class_id . "'");
					$subjectname = $this->api_model->dbSingleColQuery('name', 'subject', "subject_id = '" . $subject_id . "'");

					if (!empty($word_data) && $filetype == 'word') {
						$xml_body .= '<lesson_file lesson_id="' . $lesson_id . '" topic="' . $topic . '" classname="' . $classname . '" subjectname="' . $subjectname . '" content_type="Lesson Plan" filetype="word">';
						$xml_body .= $word_data;
						$xml_body .= '</lesson_file>';
					}

					if (!empty($pdf_data) && $filetype == 'pdf') {
						$xml_body .= '<lesson_file lesson_id="' . $lesson_id . '" topic="' . $topic . '" classname="' . $classname . '" subjectname="' . $subjectname . '" content_type="Lesson Plan" filetype="pdf">';
						$xml_body .= $pdf_data;
						$xml_body .= '</lesson_file>';
					}
				} //end loop

				$xml_body .= '</saved_contents>';
			} else {
				$xml_body .= '<status>Null</status>';
				$xml_body .= '<saved_contents>No saved content</saved_contents>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion



	public function get_innovative_content_download()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$innovative_id = $this->entrySanitizer($this->input->get('innovative_id'));

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$data_list = $this->api_model->dbMultiRowQuery('lesson_innovative_download.user_id, lesson_innovative_download.dtime, lesson_innovative.id, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.text_content, lesson_innovative.lesson_id, lesson_innovative.component', 'lesson_innovative_download, lesson_innovative', "lesson_innovative.id = lesson_innovative_download.innovative_id AND lesson_innovative_download.user_id = '" . $user_id . "' AND lesson_innovative_download.dpoint = '2'", 'lesson_innovative_download.dtime', 'DESC');

			if (!empty($data_list)) {
				$xml_body .= '<status>Success</status>';

				$xml_body .= '<saved_contents>';

				foreach ($data_list as $data_row) {
					$innovative_id = $data_row['id'];
					$lesson_id = $data_row['lesson_id'];

					$lesson_data = $this->api_model->dbSingleRowQuery('class.name AS class_name, subject.name AS subject_name, lesson.topic', 'class, subject, lesson', "lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson.id = '" . $lesson_id . "'");


					$class_name = $lesson_data['class_name'];
					$subject_name = $lesson_data['subject_name'];
					$topic = $lesson_data['topic'];

					$component = $data_row['component'];

					$component_name = $this->api_model->dbSingleColQuery('short_name', 'components', "id = '" . $component . "'");

					$filename = $data_row['filename'];
					$video_url = $data_row['video_url'];
					$text_content = $data_row['text_content'];

					if (!empty($filename)) {
						$xml_body .= '<content innovative_id="' . $innovative_id . '" lesson_id="' . $lesson_id . '" component_name="' . $component_name . '" topic="' . $topic . '" classname="' . $class_name . '" subjectname="' . $subject_name . '" content_type="image">';
						$xml_body .= $this->app_upload_dir . 'uploads/' . $filename;
						$xml_body .= '</content>';
					}

					if (!empty($video_url)) {
						$xml_body .= '<content innovative_id="' . $innovative_id . '" lesson_id="' . $lesson_id . '" component_name="' . $component_name . '" topic="' . $topic . '" classname="' . $class_name . '" subjectname="' . $subject_name . '" content_type="url">';
						$video_url = $this->addhttp($video_url);
						$video_url = $this->cleanContentUrl($video_url);
						$xml_body .= $video_url;
						$xml_body .= '</content>';
					}

					if (!empty($text_content)) {
						$xml_body .= '<content innovative_id="' . $innovative_id . '" lesson_id="' . $lesson_id . '" component_name="' . $component_name . '" topic="' . $topic . '" classname="' . $class_name . '" subjectname="' . $subject_name . '" content_type="text">';
						$text_content = str_replace(';', "", $text_content);
						$xml_body .= $text_content;
						$xml_body .= '</content>';
					}
				} //end loop

				$xml_body .= '</saved_contents>';
			} else {
				$xml_body .= '<status>Null</status>';
				$xml_body .= '<saved_contents>No saved content</saved_contents>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function delete_saved_download()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$this->db->trans_start();	//Transaction Start

			$this->api_model->dbDeleteQuery($user_id, 'user_id', 'lesson_innovative_download');
			$this->api_model->dbDeleteQuery($user_id, 'user_id', 'lesson_download');

			$this->db->trans_complete();	//Transaction End

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();	// All transaction rolled back

				$xml_body .= '<status>Failed</status>
						  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
			} else {
				$this->db->trans_commit();		// All transaction committed to database	

				$activity = 'Cleared Saved Items';
				$this->activity_log($user_id, $activity);

				$xml_body .= '<status>Success</status>
						  	<status_message>Your saved item has been successfully cleared.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function



	public function all_notification()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$curr_date = $this->globalCurrentDate;

		$result_array = array();

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$this->db->select('id, nstatus, subject_id, class_id, content, created');
			$this->db->from('notification');
			$this->db->where('lesson_id <', 1);
			$this->db->order_by('created', 'DESC');
			$this->db->limit(10, 0);

			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result_array = $query->result_array();
			}

			if (!empty($result_array)) {
				$xml_body .= '<status>Success</status>
							  <list>';

				foreach ($result_array as $data_row) {

					$data_id = $data_row['id'];
					$content = $data_row['content'];
					$status = $data_row['nstatus'];
					$subject_id = $data_row['subject_id'];
					$class_id = $data_row['class_id'];
					$created = date('F jS Y', strtotime($data_row['created']));

					if (!empty($subject_id)) {
						$subject_name = $this->api_model->dbSingleColQuery('name', 'subject', "subject_id = '" . $subject_id . "'");
					} else {
						$subject_name = '';
					}

					if (!empty($class_id)) {
						$class_name = $this->api_model->dbSingleColQuery('name', 'class', "class_id = '" . $class_id . "'");
					} else {
						$class_name = '';
					}

					$xml_body .= '<content status="' . $status . '" subject_name="' . $subject_name . '" class_name="' . $class_name . '" note_date="' . $created . '">';
					$xml_body .= $content;
					$xml_body .= '</content>';
				} //End Loop

				$xml_body .= '</list>';
			} else {
				$xml_body .= '<status>Null</status>
						  <status_message>No notification was found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function	


	public function expireNotification($data_id)
	{
		$query_data = array('validity' => 2);
		$this->api_model->dbUpdateQuery($query_data, 'notification', "id = '" . $data_id . "'");
	} // End function



	public function single_subscription_packages()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$package_list = $this->api_model->dbMultiRowQuery('*', 'package', "plan_type = 'Single' AND visible = '2'", 'amount', 'ASC');

		$xml_status = 'Success';

		if (!empty($package_list)) {
			$xml_body .= '<status>Success</status>
						  <list>';

			foreach ($package_list as $packages_row) {

				$data_id = $packages_row['id'];
				$name = $packages_row['name'];
				$amount = $packages_row['amount'];
				$plan_type = $packages_row['plan_type'];
				$user_count = $packages_row['user_count'];
				$month_count = $packages_row['month_count'];
				$reverse_pid = $packages_row['reverse_pid'];
				$free_status = $packages_row['free_status'];

				if (!empty($reverse_pid)) {
					$reverse_pname = $this->api_model->dbSingleColQuery('name', 'package', "id = '" . $reverse_pid . "'");
				} else {
					$reverse_pname = '';
				}

				$payment_type = ($free_status == 2) ? 'free' : 'paid';

				$xml_body .= '<package payment_type="' . $payment_type . '" package_id="' . $data_id . '">';
				$xml_body .= '<name>' . $name . '</name>';
				$xml_body .= '<amount>' . $amount . '</amount>';
				$xml_body .= '<user_count>' . $user_count . '</user_count>';
				$xml_body .= '<month_count>' . $month_count . '</month_count>';
				$xml_body .= '<reverse_package_id>' . $reverse_pid . '</reverse_package_id>';
				$xml_body .= '<reverse_package_name>' . $reverse_pname . '</reverse_package_name>';
				$xml_body .= '</package>';
			} //End Loop

			$xml_body .= '</list>';
		} else {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>No package record was found</status_message>';
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');

		$this->output->set_output($xml_body);
	} // End function


	public function multi_subscription_packages()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$package_list = $this->api_model->dbMultiRowQuery('*', 'package', "plan_type = 'Group' AND visible = '2'", 'amount', 'ASC');

		$xml_status = 'Success';

		if (!empty($package_list)) {
			$xml_body .= '<status>Success</status>
						  <list>';

			foreach ($package_list as $packages_row) {

				$data_id = $packages_row['id'];
				$name = $packages_row['name'];
				$amount = $packages_row['amount'];
				$plan_type = $packages_row['plan_type'];
				$user_count = $packages_row['user_count'];
				$month_count = $packages_row['month_count'];
				$reverse_pid = $packages_row['reverse_pid'];
				$free_status = $packages_row['free_status'];

				if (!empty($reverse_pid)) {
					$reverse_pname = $this->api_model->dbSingleColQuery('name', 'package', "id = '" . $reverse_pid . "'");
				} else {
					$reverse_pname = '';
				}

				$payment_type = ($free_status == 2) ? 'free' : 'paid';

				$xml_body .= '<package payment_type="' . $payment_type . '" package_id="' . $data_id . '">';
				$xml_body .= '<name>' . $name . '</name>';
				$xml_body .= '<amount>' . $amount . '</amount>';
				$xml_body .= '<user_count>' . $user_count . '</user_count>';
				$xml_body .= '<month_count>' . $month_count . '</month_count>';
				$xml_body .= '<reverse_package_id>' . $reverse_pid . '</reverse_package_id>';
				$xml_body .= '<reverse_package_name>' . $reverse_pname . '</reverse_package_name>';
				$xml_body .= '</package>';
			} //End Loop

			$xml_body .= '</list>';
		} else {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>No package record was found</status_message>';
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');

		$this->output->set_output($xml_body);
	} // End function


	public function package_config()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$data_row = $this->api_model->dbSingleRowQuery('month_count_termly, month_count_session, single_termly_discount, single_session_discount, multi_termly_discount, multi_session_discount', 'site_config', "id = 1");

			if (!empty($data_row)) {

				$month_count_termly = $data_row['month_count_termly'];
				$month_count_session = $data_row['month_count_session'];
				$single_termly_discount = $data_row['single_termly_discount'];
				$single_session_discount = $data_row['single_session_discount'];
				$multi_termly_discount = $data_row['multi_termly_discount'];
				$multi_session_discount = $data_row['multi_session_discount'];

				$xml_body .= '<status>Success</status>
								  <status_message>Active subscription</status_message>
								  <month_count_termly>' . $month_count_termly . '</month_count_termly>
								  <month_count_session>' . $month_count_session . '</month_count_session>
								  <single_termly_discount>' . $single_termly_discount . '</single_termly_discount>
								  <single_session_discount>' . $single_session_discount . '</single_session_discount>
								  <multi_termly_discount>' . $multi_termly_discount . '</multi_termly_discount>
								  <multi_session_discount>' . $multi_session_discount . '</multi_session_discount>';
			} else {
				$xml_body .= '<status>Null</status>
								  <status_message>No package config data was found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function			


	public function user_subscription()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$sub_row = $this->api_model->dbSingleRowQuery('subscription_users.sub_id, subscription_users.user_id, subscription.sub_status, subscription.pay_status, subscription.date_start, subscription.date_end, subscription.package_id', 'subscription, subscription_users', "subscription_users.sub_id = subscription.id AND subscription.sub_status = '1' AND subscription.pay_status = '2' AND subscription_users.user_id = '" . $user_id . "'");

			if (!empty($sub_row)) {
				$subscription_id = $sub_row['sub_id'];

				$verify_primary_user = $this->api_model->dbSingleColQuery('user_id', 'subscription', "id = '" . $subscription_id . "'");

				$sub_user_type = ($verify_primary_user == $user_id) ? 'primary' : 'secondary';

				$package_row = $this->api_model->dbSingleRowQuery('*', 'package', "id = '" . $sub_row['package_id'] . "'");

				$reverse_pid = $package_row['reverse_pid'];
				$free_status = $package_row['free_status'];
				$package_id = $package_row['id'];

				if (!empty($reverse_pid)) {
					$reverse_pname = $this->api_model->dbSingleColQuery('name', 'package', "id = '" . $reverse_pid . "'");
				} else {
					$reverse_pname = '';
				}

				$payment_type = ($free_status == 2) ? 'free' : 'paid';

				$date_start = date('F j Y', strtotime($sub_row['date_start']));
				$date_end = date('F j Y', strtotime($sub_row['date_end']));
				$package_name = $package_row['name'];
				$package_amount = $package_row['amount'] * $package_row['user_count'];

				$xml_body .= '<status>Success</status>
								  <status_message>Active subscription</status_message>
								  <user_type>' . $sub_user_type . '</user_type>
								  <date_start>' . $date_start . '</date_start>
								  <date_end>' . $date_end . '</date_end>
								  <subscription_id>' . $subscription_id . '</subscription_id>
								  <package_id>' . $package_id . '</package_id>
								  <package_name>' . trim($package_name) . '</package_name>
								  <reverse_package_id>' . $reverse_pid . '</reverse_package_id>
								  <reverse_package_name>' . trim($reverse_pname) . '</reverse_package_name>
								  <payment_type>' . $payment_type . '</payment_type>
							<package_amount>' . $package_amount . '</package_amount>';
			} else {
				if ($this->site_config['free_content_status'] == 'On') {
					// ALL CONTENT FREE
					$xml_body .= '<status>Success</status>
								  <status_message>No active subscription was found</status_message>';
				} else {
					$xml_body .= '<status>Expired</status>
								  <status_message>No active subscription was found</status_message>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function		



	public function create_new_subscription()
	{

		$package_id = $this->entrySanitizer($this->input->get('package_id'));
		$total_cost = $this->entrySanitizer($this->input->get('total_cost'));
		$month_count = $this->entrySanitizer($this->input->get('month_count'));

		$valid_month_count = array(1, 3, 9);

		$verify_package_row = $this->api_model->dbSingleRowQuery('*', 'package', "id = " . $package_id . "");
		$verify_package = $verify_package_row['id'];
		$plan_type = $verify_package_row['plan_type'];

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$user_data = $this->api_model->dbSingleRowQuery('email, surname, first_name', 'user, member', "user.user_id = member.user_id AND user.user_id = '" . $user_id . "'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_data)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! User account authentication failed</status_message>';
		} elseif (empty($user_data['email'])) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! User has no valid Email</status_message>';
		} elseif (empty($package_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>You must choose a package for subscription</status_message>';
		} elseif (empty($verify_package)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request terminated! Package authentication failed</status_message>';
		} elseif (empty($month_count)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Package Month Type must be specified</status_message>';
		} elseif (!in_array($month_count, $valid_month_count)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Package Month Type is invalid</status_message>';
		} elseif (empty($total_cost)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Total cost must not be blank</status_message>';
		} else {
			$email = $user_data['email'];
			$member_name = $user_data['surname'];
			$member_name .= ' ' . $user_data['first_name'];
			$first_name = $user_data['first_name'];
			$surname = $user_data['surname'];

			$package_amount = $verify_package_row['amount'];
			$package_user_count = $verify_package_row['user_count'];

			if ($month_count > 1) {
				if ($package_user_count > 1) {
					$termly_discount = $this->site_config['multi_termly_discount'];
					$session_discount = $this->site_config['multi_session_discount'];
				} else {
					$termly_discount = $this->site_config['single_termly_discount'];
					$session_discount = $this->site_config['single_session_discount'];
				}
			} else {
				$termly_discount = 0;
				$session_discount = 0;
			}

			$payable = $package_amount * $package_user_count;
			$payable2 = $payable;
			$payable = $payable * $month_count;

			$discount_amount = 0;

			$discount = 1;

			if ($month_count == 3 && $termly_discount > 0) {
				$discount_amount = $payable * $termly_discount / 100;
				$discount = 2;
			} elseif ($month_count == 9 && $session_discount > 0) {
				$discount_amount = $payable * $session_discount / 100;
				$discount = 2;
			}

			$payable_discounted = $payable - $discount_amount;

			if ($payable_discounted != $total_cost) {
				$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Amount Payable for Subscription is invalid. Amount payable is N' . $payable_discounted . '</status_message>';
			} elseif ($this->checkActiveSubscription($user_id)) {
				$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! You have an actively running subscription, therefore another subscription order cannot be processed</status_message>';
			} else {
				$this->db->trans_start();	//Transaction Start
				//$total_cost = $payable_discounted;

				$query_sub_data = array('user_id' => $user_id, 'license_no' => '0', 'package_id' => $package_id, 'month_count' => $month_count, 'total_cost' => $total_cost, 'discount' => $discount, 'discount_amount' => $discount_amount, 'date_start' => '0000-00-00', 'date_end' => '0000-00-00', 'sub_status' => '0', 'sub_started' => '0', 'pay_status' => '0');
				$this->api_model->dbInsertQuery($query_sub_data, 'subscription');
				$sub_id = $this->db->insert_id();	// Get Data Id

				$this->db->trans_complete();	//Transaction End

				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();	// All transaction rolled back

					$xml_body .= '<status>Failed</status>
							  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
				} else {
					$this->db->trans_commit();		// All transaction committed to database				
					$new_order_no = $this->generateOrderId($sub_id);
					$license_no = $this->generateLicenseNo($new_order_no);

					$query_order_update = array('order_no' => $new_order_no, 'license_no' => $license_no);
					$this->api_model->dbUpdateQuery($query_order_update, 'subscription', "id = '" . $sub_id . "'");

					$activity = 'New order subscription - ' . $email;

					$this->activity_log($user_id, $activity);

					//************ Start: 	Send Mail ************

					$subject = $this->site_config['comp_name'] . " - Notice of Subscription";

					$messageContent = '<p>
						This is to notify you that your subscription submission on ' . $this->site_config['comp_name'] . ' has been saved and processed. <br> However, your subscription will become active upon making payment and you will be notified as soon as your payment has been confirmed.
						<br /><br />
						We urge you to complete the payment process immediately so you can start exploring and enjoying all the benefits available on our platform.	
						<br><p>';

					$email_send_resp = $this->senderEmail($email, $subject, $messageContent);

					//************ End: 	Send Mail ************	

					$xml_body .= '<status>Success</status>
								  <status_message>New Subscription Successful</status_message>
								  <order_no>' . $new_order_no . '</order_no>
								  <subscription_id>' . $sub_id . '</subscription_id>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function	


	public function confirm_subscription_payment()
	{

		$tranx_status = $this->entrySanitizer($this->input->get('tranx_status'));
		$order_no = $this->entrySanitizer($this->input->get('order_no'));

		$sub_id = $this->entrySanitizer($this->input->get('subscription_id'));

		$subscription_row = $this->api_model->dbSingleRowQuery('subscription.*, member.user_id, member.first_name, member.surname, member.phone, user.email', 'subscription, member, user', "subscription.user_id = user.user_id AND subscription.user_id = member.user_id AND subscription.id = '" . $sub_id . "'");

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($tranx_status == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Transaction status must be specified</status_message>';
		} elseif ($order_no == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Order No must be specified</status_message>';
		} elseif ($sub_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Subscription ID must be specified</status_message>';
		} elseif (empty($subscription_row)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Subscription authentication failed</status_message>';
		} elseif ($subscription_row['paygate_process'] == 2) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Subscription payment confirmation had been processed</status_message>';
		} else {
			$tranx_status = strtolower($tranx_status);

			if ($tranx_status == 'success') {
				// SUCCESSFUL PAYMENT
				$sub_status = 1;
				$sub_started = 1;
				$pay_status = 2;
				$tranx_status_code = 7;

				$package_id = $subscription_row['package_id'];
				$total_cost = $subscription_row['total_cost'];
				$sub_user_id = $subscription_row['user_id'];
				$sub_month_count = $subscription_row['month_count'];

				$fullname = $subscription_row['first_name'];
				$fullname .= ' ' . $subscription_row['surname'];

				$email = $subscription_row['email'];
				$phone = $subscription_row['phone'];

				$packages_row = $this->api_model->dbSingleRowQuery('*', 'package', "id = '" . $package_id . "'");
				$package_name = $packages_row['name'];

				$package_days = $sub_month_count * 30;

				$date_start = $this->globalCurrentDate;
				$date_end = $this->generateFutureDate($date_start, $package_days);

				$this->db->trans_start();	//Transaction Start

				$query_data = array('date_start' => $date_start, 'date_end' => $date_end, 'sub_status' => $sub_status, 'sub_started' => $sub_started, 'pay_status' => $pay_status, 'paygate_status_code' => $tranx_status_code, 'paygate_status_msg' => $tranx_status, 'paygate_process' => 2);
				$query_data_resp = $this->api_model->dbUpdateQuery($query_data, 'subscription', "id = '" . $sub_id . "' AND order_no = '" . $order_no . "'");

				$query_sub_user = array('sub_id' => $sub_id, 'user_id' => $sub_user_id);
				$query_sub_user_resp = $this->api_model->dbInsertQuery($query_sub_user, 'subscription_users');

				$this->db->trans_complete();	//Transaction End

				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();	// All transaction rolled back

					$xml_body .= '<status>Failed</status>
							  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
				} else {
					$this->db->trans_commit();		// All transaction committed to database	

					$date_start = date('F j Y', strtotime($date_start));
					$date_end = date('F j Y', strtotime($date_end));

					$amount_raw = $total_cost;
					$amount = number_format($amount_raw);

					// Start: Push email to all recipients

					$subject = $this->site_config['comp_name'] . " - Order Payment Successful";

					$payment_date = date("jS F, Y", strtotime($this->globalCurrentDate));

					/*$messageContent = '<p>
								   This is to notify your subscription payment on '.$this->site_config['comp_name'].' was successful. <br />
								   Your order number is: '.$order_no.'.<br />
								   Amount Paid: N'.$amount.'.<br />
								   Payment date: '.$payment_date.'<br /><br />
								   Subscription Plan:
								   Package Name: '.$package_name.'.<br />
								   Start Date: '.$date_start.'.<br />
								   End Date: '.$date_end.'.<br />
								   <br /><br /><br><p>';*/

					//$messageContent .= '<br /><br /> Start enjoying your subscription!';

					$messageContent = '<p>
					This is to notify your subscription payment on ' . $this->site_config['comp_name'] . ' was successful.</p>';

					$htmlMessageContent = $this->prepPaymentEmailTemplate($subject, $messageContent, $fullname, $order_no, 'N' . $amount, $payment_date, $package_name, $date_start, $date_end);

					$this->senderEmail($email, $subject, $htmlMessageContent, 1);


					// To Admin

					$subject2 = "Customer Order Payment Successful";

					$messageContent2 = '<p>
					The is is notify you that instant payment made by a customer on ' . $this->site_config['comp_name'] . ' was successful.
					<br><br>
					Customer name: ' . $fullname . '.<br />
					Customer phone: ' . $phone . '.<br />
					Customer email: ' . $email . '.<br />
					Order number : ' . $order_no . '.<br />
					Amount Paid: N' . $amount . '.
					Payment date: ' . date("jS F, Y", strtotime($this->globalCurrentDate)) . '<br /><br />
					Subscription Plan:
					Package Name: ' . $package_name . '.<br />
					Start Date: ' . $date_start . '.<br />
					End Date: ' . $date_end . '.<br />
					<br /><br />
					<p>';

					$site_email1 = $this->site_config['email1'];

					//$this->sendEmail($site_email1, $subject2, $messageContent2, 1);	
					$this->senderEmail($site_email1, $subject2, $messageContent2);

					// Start: Push email to all recipients

					$xml_body .= '<status>Success</status>
								  <status_message>Subscription Payment Confirmation has been Processed</status_message>
								  <order_no>' . $order_no . '</order_no>
								  <subscription_id>' . $sub_id . '</subscription_id>';
				}

				// SUCCESSFUL PAYMENT
			} else {
				// FAILED PAYMENT									
				$sub_status = 0;
				$sub_started = 0;
				$pay_status = 0;
				$tranx_status_code = 1;

				$this->db->trans_start();	//Transaction Start

				$query_data = array('sub_status' => $sub_status, 'sub_started' => $sub_started, 'pay_status' => $pay_status, 'paygate_status_code' => $tranx_status_code, 'paygate_status_msg' => $tranx_status, 'paygate_process' => 2);
				$query_data_resp = $this->api_model->dbUpdateQuery($query_data, 'subscription', "id = '" . $sub_id . "' AND order_no = '" . $order_no . "'");

				$query_sub_user = array('sub_id' => $sub_id, 'user_id' => $sub_user_id);
				$query_sub_user_resp = $this->api_model->dbInsertQuery($query_sub_user, 'subscription_users');

				$this->db->trans_complete();	//Transaction End

				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();	// All transaction rolled back

					$xml_body .= '<status>Failed</status>
							  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
				} else {
					$this->db->trans_commit();		// All transaction committed to database	

					$xml_body .= '<status>Success</status>
								  <status_message>Subscription Payment Confirmation has been Processed</status_message>
								  <order_no>' . $order_no . '</order_no>
								  <subscription_id>' . $sub_id . '</subscription_id>';
				}

				// FAILED PAYMENT
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function add_subscription_user()
	{


		$emails = $this->input->get('emails');
		$sub_id = $this->entrySanitizer($this->input->get('subscription_id'));
		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$subscription_row = $this->api_model->dbSingleRowQuery('package_id, user_id', 'subscription', "id = '" . $sub_id . "'");

		$expired_subscription = $this->api_model->dbCustomSingleRowQuery("SELECT user_id FROM subscription WHERE id = '" . $sub_id . "' AND date_end < '" . $this->globalCurrentDate . "' AND sub_status = 1 AND pay_status = 2");

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($sub_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Subscription ID must be specified</status_message>';
		} elseif (empty($subscription_row)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Subscription authentication failed</status_message>';
		} elseif (!empty($expired_subscription)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Subscription has Expired</status_message>';
		} elseif (empty($emails)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Emails to add must not be blank</status_message>';
		} else {
			$sub_user_id = $subscription_row['user_id'];
			$package_id = $subscription_row['package_id'];

			$package_count = $this->api_model->dbSingleColQuery('user_count', 'package', "id = '" . $package_id . "'");

			$current_sub_users = $this->api_model->dbRowCountQuery('subscription_users', "sub_id = '" . $sub_id . "'");

			if ($user_id == $sub_user_id) {

				if ($current_sub_users < $package_count) {
					$err_entry = 0;
					$ok_entry = 0;
					$err_exist = 0;
					$err_other_exist = 0;

					foreach ($emails as $email) {
						$send_mail = 0;
						$mail_new_register = 0;

						$email = ltrim($email);
						$email = rtrim($email);
						$email = $this->entrySanitizer($email);

						$verify_email_register = $this->api_model->dbSingleRowQuery('user.user_id, member.first_name, member.surname', 'user, member', "user.user_id = member.user_id AND user.email = '" . $email . "'");

						if (empty($verify_email_register) && valid_email($email)) {
							//****** NEW USER *****

							$this->db->trans_start();	//Transaction Start				
							$user_type_id = 1;	// User Type	
							$status = 0;	// User Status set to 1	
							$signup = 1;

							$password = $this->genRandomString(8);

							$password_hash = password_hash($password, PASSWORD_DEFAULT);

							$username = $this->createAccountUsername($email);

							// User Acccount
							$query_user_data = array('email' => $email, 'password' => $password_hash, 'username' => $username, 'type_id' => $user_type_id, 'status' => $status, 'login_status' => 'Never', 'curr_login' => '0000-00-00 00:00:00', 'last_login' => '0000-00-00 00:00:00', 'approved' => 1, 'suspended' => 1, 'approval_timestamp' => '0000-00-00 00:00:00', 'suspended_timestamp' => '0000-00-00 00:00:00', 'signup' => $signup);
							$this->api_model->dbInsertQuery($query_user_data, 'user');		//  Process Query
							$new_user_id = $this->db->insert_id();	// Get Data Id

							// Member Profile												
							$query_profile_data = array('user_id' => $new_user_id, 'surname' => $email, 'first_name' => $email, 'gender' => '-');
							$this->api_model->dbInsertQuery($query_profile_data, 'member');

							$query_sub_user = array('sub_id' => $sub_id, 'user_id' => $new_user_id);
							$this->api_model->dbInsertQuery($query_sub_user, 'subscription_users');

							$this->db->trans_complete();	//Transaction End		

							if ($this->db->trans_status() === FALSE) {
								$this->db->trans_rollback();	// All transaction rolled back							  
								$err_entry++;
							} else {
								$this->db->trans_commit();		// All transaction committed to database

								$activity = 'Add ' . $email . ' to Subscription User List';
								$this->activity_log($sub_user_id, $activity);

								$ok_entry++;
								$send_mail = 1;
								$mail_new_register = 1;
							}

							//****** NEW USER *****
						} else {
							//****** REGISTERED USER *****
							$new_user_id = $verify_email_register['user_id'];
							$new_user_names = $verify_email_register['first_name'];
							$new_user_names .= ' ' . $verify_email_register['surname'];

							$other_active_subscription = $this->api_model->dbCustomSingleRowQuery("SELECT subscription_users.user_id FROM subscription, subscription_users WHERE subscription_users.sub_id = subscription.id AND subscription.date_end > '" . $this->globalCurrentDate . "' AND subscription.sub_status = 1 AND subscription.pay_status = 2 AND subscription_users.user_id = '" . $new_user_id . "'");

							$verify_subscription_user = $this->api_model->dbSingleRowQuery('id', 'subscription_users', "sub_id = '" . $sub_id . "' AND user_id = '" . $new_user_id . "'");

							if (!empty($verify_subscription_user)) {
								$err_entry++;
								$err_exist++;
							} elseif (!empty($other_active_subscription)) {
								$err_entry++;
								$err_other_exist++;
							} else {
								$query_sub_user = array('sub_id' => $sub_id, 'user_id' => $new_user_id);
								$ins_data = $this->api_model->dbInsertQuery($query_sub_user, 'subscription_users');

								if ($ins_data) {
									$activity = 'Added ' . $new_user_names . ' (' . $new_user_email . ') to Subscription User List';
									$this->activity_log($sub_user_id, $activity);

									$ok_entry++;
									$send_mail = 1;
								} else {
									$err_entry++;
								}
							} //end if else

							//****** REGISTERED USER *****
						} //end if else


						if ($send_mail == 1) {
							$gen_action_txt = 'forgot_pwd';
							//$gen_action_code = substr(md5(rand(0, 1000000)), 0, 25);				
							// Code Gen													
							//$query_code_gen = array('user_id' => $new_user_id, 'action' => $gen_action_txt, 'code' => $gen_action_code, 'timestamp' => $this->globalCurrentTimeStamp);	
							//$this->api_model->dbInsertQuery($query_code_gen, 'code_gen');

							$gen_action_code = $this->generateCodeGen($new_user_id, $gen_action_txt);

							//************ Start: 	Send Mail ************

							$subject = "You have an Active Subscription plan on " . $this->site_config['comp_name'];

							$messageContent = '<p>
							Hello, you have been added to an Active Subscription plan on ' . $this->site_config['comp_name'] . '.';

							if ($mail_new_register == 1) {
								$messageContent .= 'A unique account has been created for you with this email to enjoy the App features.
								<br /><br />
								Click the link below to Set a new Password for your account, login and start using your subscription
								<br /><br />
		  
			    				<a href="' . $this->dev_base_url . '/reset-password?code=' . $gen_action_code . '&amp;email=' . $email . '">Click here</a>
			    				<br /><br />
				
								<br /><br />
								OR Copy and paste the link below in your browser
								<br /><br />
				
								' . $this->dev_base_url . '/reset-password?code=' . $gen_action_code . '&amp;email=' . $email . '
								<br></p>';
							} else {
								$messageContent .= 'Sign into your account to start enjoying the App features.
								<br /><br /> 
			    				<a href="' . $this->dev_base_url . '/login">Click here to login</a>
			    				<br /><br />
				
								<br /><br />
								OR Copy and paste the Login link below in your browser
								<br /><br />
				
								' . $this->dev_base_url . '/login

								<br>';
							}

							$this->senderEmail($email, $subject, $messageContent);

							/*$htmlMessageContent = $this->prepareHtmlEmail($subject, $messageContent);
															 
												 $this->email->clear();
												 
												 $config['charset'] = 'utf-8';
												 $config['wordwrap'] = TRUE;
												 $config['mailtype'] = 'html';
												 
												 $this->email->initialize($config);
											 
												 $this->email->from($this->site_config['mailer_email'], $this->site_config['comp_name']);
												 
												 $this->email->to($email);	
												 $this->email->subject($subject);
												 $this->email->message($htmlMessageContent);
												 $this->email->send();	*/

							//************ End: 	Send Mail ************
						} //end if

					} //end loop

					if ($ok_entry > 0) {
						$activity = 'Added ' . $new_user_names . ' (' . $new_user_email . ') to Subscription User List';
						$this->activity_log($sub_user_id, $activity);
						$s = ($ok_entry > 1) ? 's' : '';

						$xml_body .= '<status>Success</status>
								  <status_message>' . $ok_entry . ' email' . $s . ' successfully added to the subscription list</status_message>';
					} else {
						$err_exist_msg = ($err_exist > 0) ? $err_exist . ' email already exist on the subscription list.' : '';
						$err_other_exist_msg = ($err_other_exist > 0) ? $err_other_exist . ' Email already exist on other active subscription.' : '';

						$xml_body .= '<status>Failed</status>
							  <status_message>Whoops! Addition of email failed. ' . $err_exist_msg . ' ' . $err_other_exist_msg . '</status_message>';
					}
				} else {
					$xml_body .= '<status>Failed</status>
				  					<status_message>Request aborted! Your subscription User List cannot exceed the Package Count of ' . $package_count . '.</status_message>';
				}
			} else {
				$xml_body .= '<status>Failed</status>
			  					<status_message>Request aborted! You are not the Primary Subscription Owner.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function get_subscription_users()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$sub_id = $this->entrySanitizer($this->input->get('subscription_id'));

		$subscription_row = $this->api_model->dbSingleRowQuery('package_id, user_id', 'subscription', "id = '" . $sub_id . "'");

		$sub_user_list = $this->api_model->dbMultiRowQuery('subscription_users.user_id, user.email, member.first_name, member.surname', 'subscription_users, user, member', "user.user_id = member.user_id AND user.user_id = subscription_users.user_id AND subscription_users.sub_id = '" . $sub_id . "'", 'member.first_name', 'ASC');

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($sub_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Subscription ID must be specified</status_message>';
		} elseif (empty($subscription_row)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Subscription authentication failed</status_message>';
		} else {
			if (!empty($sub_user_list)) {
				$xml_body .= '<status>Success</status>';

				$xml_body .= '<subscription_users subscription_id="' . $sub_id . '">';

				$sub_user_list = $this->api_model->dbMultiRowQuery('subscription_users.user_id, user.email, member.first_name, member.surname', 'subscription_users, user, member', "user.user_id = member.user_id AND user.user_id = subscription_users.user_id AND subscription_users.sub_id = '" . $sub_id . "'", 'member.first_name', 'ASC');

				foreach ($sub_user_list as $data_row) {

					$user_id = $this->encryptGetId($data_row['user_id']);
					$email = $data_row['email'];
					$fullname = $data_row['first_name'];
					$fullname .= ' ' . $data_row['surname'];

					$sub_user_type = ($data_row['user_id'] == $subscription_row['user_id']) ? 'primary' : 'secondary';

					$xml_body .= '<user user_type="' . $sub_user_type . '">';
					$xml_body .= '<user_id>' . $user_id . '</user_id>';
					$xml_body .= '<email>' . $email . '</email>';
					$xml_body .= '<fullname>' . $fullname . '</fullname>';
					$xml_body .= '</user>';
				} //End Loop

				$xml_body .= '</subscription_users>';
			} else {
				$xml_body .= '<status>Failed</status>
						  <status_message>No email account has been added to the subscription list</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function delete_subscription_user()
	{

		$sub_id = $this->entrySanitizer($this->input->get('subscription_id'));
		$email = $this->entrySanitizer($this->input->get('email'));

		$subscription_row = $this->api_model->dbSingleRowQuery('user_id', 'subscription', "id = '" . $sub_id . "'");

		$expired_subscription = $this->api_model->dbCustomSingleRowQuery("SELECT user_id FROM subscription WHERE id = '" . $sub_id . "' AND date_end < '" . $this->globalCurrentDate . "' AND sub_status = 1 AND pay_status = 2");

		$user_data = $this->api_model->dbSingleRowQuery('user.user_id, user.email, member.first_name, member.surname', 'user, member', "user.user_id = member.user_id AND user.email = '" . $email . "'");

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);
		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($sub_id == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Subscription ID must be specified</status_message>';
		} elseif ($email == '') {
			$xml_body .= '<status>Failed</status>
					  <status_message>Email to delete from subscription must be specified</status_message>';
		} elseif (empty($subscription_row)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Subscription authentication failed</status_message>';
		} elseif (!empty($expired_subscription)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Subscription has Expired</status_message>';
		} elseif (empty($user_data)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Email does not have a valid account</status_message>';
		} else {
			$verify_subscription_user = $this->api_model->dbSingleRowQuery('id', 'subscription_users', "sub_id = '" . $sub_id . "' AND user_id = '" . $user_data['user_id'] . "'");

			if (empty($verify_subscription_user)) {
				$xml_body .= '<status>Failed</status>
						  <status_message>Request terminated! Email does not exist on the Subscription List</status_message>';
			} else {
				$sub_user_id = $subscription_row['user_id'];

				$new_user_id = $user_data['user_id'];
				$new_user_names = $user_data['first_name'];
				$new_user_names .= ' ' . $user_data['surname'];

				$verify_subscription_owner = $this->api_model->dbSingleRowQuery('id', 'subscription_users', "sub_id = '" . $sub_id . "' AND user_id = '" . $new_user_id . "'");

				if (empty($verify_subscription_owner)) {
					$xml_body .= '<status>Failed</status>
							  <status_message>Request aborted! User does not exist on the Subscription List</status_message>';
				} elseif ($user_id != $sub_user_id) {
					$xml_body .= '<status>Failed</status>
							  <status_message>Request aborted! You are not the Primary Subscription Owner.</status_message>';
				} else {
					$query_data = array('sub_id' => $sub_id, 'user_id' => $new_user_id);
					$del_resp = $this->api_model->dbDeleteMultiCondQuery($query_data, 'subscription_users');

					if ($del_resp) {
						$activity = 'Deleted ' . $new_user_names . ' (' . $email . ') from Subscription User List';
						$this->activity_log($sub_user_id, $activity);

						$xml_body .= '<status>Success</status>
								  <status_message>Email Deletion from Subscription was Successful</status_message>';
					} else {
						$xml_body .= '<status>Failed</status>
							  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
					}
				}
			} //end if else
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function user_newsletter_setting()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$status_array = array(1, 2);
		$status_values = array('1' => 'Unsubscribed from', '2' => 'Subscribed to');

		$newsletter = $this->entrySanitizer($this->input->get('newsletter'));

		$member_data = $this->api_model->dbSingleRowQuery('newsletter, first_name, surname', 'member', "user_id = " . $user_id . "");
		$verify_newsletter = $member_data['newsletter'];

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';

			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (!in_array($newsletter, $status_array)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Newsletter value is invalid</status_message>';
		} elseif (empty($member_data)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User bio data failed authentication</status_message>';
		} elseif ($newsletter == $member_data['newsletter']) {
			$xml_body .= '<status>Failed</status>
					  <status_message>User had been ' . $status_values[$newsletter] . ' Newsletter</status_message>';
		} else {
			$user_names = $member_data['first_name'];
			$user_names .= ' ' . $member_data['surname'];

			$query_data = array('newsletter' => $newsletter);
			$update_data = $this->api_model->dbUpdateQuery($query_data, 'member', "user_id = '" . $user_id . "'");

			if ($update_data) {
				$activity = $user_names . ' successfully ' . $status_values[$newsletter] . ' newsletter list';
				$this->activity_log($user_id, $activity);

				$xml_body .= '<status>Success</status>
						  <status_message>You have been successfully ' . $status_values[$newsletter] . ' newsletter list</status_message>';
			} else {
				$xml_body .= '<status>Failed</status>
					  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function smart_search()
	{

		$keyword = $this->entrySanitizer($this->input->get('keyword'));
		$class_id = $this->entrySanitizer($this->input->get('class'), 1);
		$subject_id = $this->entrySanitizer($this->input->get('subject'), 1);

		$page = $this->entrySanitizer($this->input->get('page'));

		$verify_class = $this->api_model->dbSingleColQuery('class_id', 'class', "class_id = " . $class_id . "");
		$verify_subject = $this->api_model->dbSingleColQuery('subject_id', 'subject', "subject_id = " . $subject_id . "");

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$curr_date = $this->globalCurrentDate;

		$sub_row = $this->api_model->dbSingleRowQuery('subscription_users.sub_id', 'subscription, subscription_users', "subscription_users.sub_id = subscription.id AND subscription.sub_status = '1' AND subscription.pay_status = '2' AND date_end >= '" . $curr_date . "' AND subscription_users.user_id = '" . $user_id . "'");
		$verify_sub_id = $sub_row['sub_id'];

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$result_array = array();

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($keyword)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Keyword must not be empty</status_message>';
		} elseif (!empty($class_id) && empty($verify_class)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Invalid Class data</status_message>';
		} elseif (!empty($subject_id) && empty($verify_subject)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Invalid Subject data</status_message>';
		} else {
			$this->userCronCheckExpiredSubscription($user_id); //Check Subscription

			// $param = (!empty($class_id)) ? urlencode(' #class_' . $class_id) : '';
			// $param .= (!empty($subject_id)) ? urlencode(' #subject_' . $subject_id) : '';
			// $page_param = (!empty($page)) ? urlencode(' &page=' . $page) : '';

			// $url = $this->smart_query_url . 'search?query=' . urlencode($keyword) . urlencode(' #lesson_plan') . $page_param . '' . $param;

			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_URL, $url);
			// $result = curl_exec($ch);
			// curl_close($ch);
			// $result = "";
			// $result_array = json_decode($result, true);
			// $result_array_alt = $result_array;

			$all_result_array = $this->api_model->dbMultiRowQueryLike($class_id, $subject_id, $keyword);
			$result_array["searchResults"] = [
				"data"=> $all_result_array,
				"count"=> count($all_result_array),
				"missing"=> "",
				"page" => "",
				"pageCount"=> "",
				"pageSize"=> "",
			];
// var_dump($result_array); exit();
			$this->post_search_log($user_id, $class_id, $subject_id, $keyword, 1);

			if (!empty($result_array)) {
				unset($result_array['suggestions']);
				unset($result_array['searchResults']['count']);
				unset($result_array['searchResults']['missing']);
				unset($result_array['searchResults']['page']);
				unset($result_array['searchResults']['pageCount']);
				unset($result_array['searchResults']['pageSize']);

				$result_value_status = (!empty($result_array['searchResults']['data'])) ? 'Success' : 'Null';

				$xml_body .= '<status>' . $result_value_status . '</status>
							  <search_list>';

				$p = 1;

				// foreach ($result_array as $level1_key => $level1_value_array) {
				// 	foreach ($level1_value_array as $level2_key => $level2_value_array) { level2_value_array
						foreach ($result_array['searchResults']['data'] as $level3_key => $level3_value_array) {
							$content_id = $level3_value_array['id'];
							//$content_type = $level3_value_array['type'];

							//if ($content_type == 'LP') {
								//****** LP	

								$data_row = $this->api_model->dbSingleRowQuery('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name', 'lesson, class, subject', "class.class_id = lesson.class_id AND subject.subject_id = lesson.subject_id AND lesson.id = " . $content_id . "");

								$data_id = $data_row['id'];
								$data_free_status = $data_row['free_status'];

								$class_name = $data_row['class_name'];
								$class_name = $this->convert_class_to_word($class_name);
								$subject_name = $data_row['subject_name'];
								$topic = $data_row['topic'];
								$doc_name = $data_row['doc_name'];
								$doc_name_link = (!empty($doc_name)) ? $doc_name : 'nil';
								$doc_pdf_name = $data_row['doc_pdf_name'];
								$doc_pdf_name_link = (!empty($doc_pdf_name)) ? $doc_pdf_name : 'nil';
								$content = $data_row['content'];
								$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';
								$subscription_status = (!empty($verify_sub_id)) ? 'TRUE' : 'FALSE';

								if (!empty($doc_name)) {
									$xml_body .= '<lesson_plan>';
									$xml_body .= '<lesson_id>' . $data_id . '</lesson_id>';
									$xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
									$xml_body .= '<subscription_status>' . $subscription_status . '</subscription_status>';
									$xml_body .= '<topic>' . $topic . '</topic>';
									$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
									$xml_body .= '<class_name>' . $class_name . '</class_name>';
									$xml_body .= '<content>' . $content . '</content>';

									$lesson_pix_list = $this->api_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '" . $data_id . "'", 'id', 'ASC');

									$xml_body .= '<lesson_pictures>';
									if (!empty($lesson_pix_list)) {
										foreach ($lesson_pix_list as $lesson_pix_row) {
											$xml_body .= '<picture' . $p . '>';
											$xml_body .= $this->app_upload_dir . 'uploads/' . $lesson_pix_row['pix_name'];
											//$xml_body .= ',';
											$xml_body .= '</picture' . $p . '>';
											$p++;
										}
									}
									$xml_body .= '</lesson_pictures>';

									$xml_body .= '</lesson_plan>';
								}

								//****** LP	

								//****** TBT ******/

								$lesson_id = $content_id;

								$verify_innovative_list = $this->api_model->dbRowCountQuery('lesson_innovative', "lesson_id = '" . $lesson_id . "'");

								if ($verify_innovative_list > 0) {

									$xml_body .= '<innovative_content free_status="' . $data_free_status_value . '" lesson_id="' . $lesson_id . '" topic="' . $topic . '" subject_name="' . $subject_name . '" class_name="' . $class_name . '">';

									$components_list = $this->api_model->dbMultiRowQuery('*', 'components', "", 'id', 'ASC');

									foreach ($components_list as $components_row) {
										$component_id = $components_row['id'];
										$name = $components_row['name'];
										$short_name = $components_row['short_name'];

										$xml_body .= '<component component_id="' . $component_id . '" name="' . $name . '" short_name="' . $short_name . '">';

										$component_data_list = $this->api_model->dbMultiRowQuery('lesson_innovative.id, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.format, lesson_innovative.component, lesson_innovative.category, lesson_innovative.app_id', 'lesson_innovative', "lesson_innovative.lesson_id = '" . $lesson_id . "' AND lesson_innovative.component = '" . $component_id . "'");

										if (!empty($component_data_list)) {
											//************* COMPONENT CONTENT ***************//

											$xml_body .= '<contents>';

											$c = 1;
											$content_web_url = '';
											$content_web_url_app = array();
											$content_images = '';
											$content_images_app = array();
											$content_text = '';
											$content_text_app = array();

											$check_content_img = 0;
											$check_content_url = 0;
											$check_content_txt = 0;

											foreach ($component_data_list as $component_data_row) {

												$component = $component_data_row['component'];
												$category = $component_data_row['category'];
												$category_name = $this->component_cat_value($category);
												$format = $component_data_row['format'];
												$format_name = $this->component_format_value($format);
												$app_id = $component_data_row['app_id'];

												$app_name = (!empty($app_id)) ? $this->api_model->dbSingleColQuery('name', 'media_app', "id = '" . $app_id . "'") : $category_name;

												$content = '';

												if ($format == 1) {
													$filename = $component_data_row['filename'];
													$content = $this->app_upload_dir . 'uploads/' . $filename;

													$content_images .= $content;
													$content_images .= ', ';
													$content_images_app[] = $app_name;
													$check_content_img++;
												} elseif ($format == 2) {
													$video_url = $component_data_row['video_url'];
													$video_url = $this->addhttp($video_url);
													$video_url = $this->cleanContentUrl($video_url);
													$content = $video_url;
													$content = str_replace(';', "", $content);

													$content_web_url .= $content;
													$content_web_url .= ', ';
													$content_web_url_app[] = $app_name;
													$check_content_url++;
												} elseif ($format == 3) {
													$content = $component_data_row['text_content'];
													$content = str_replace(';', "", $content);

													$content_text .= $content;
													$content_text .= ', ';
													$content_text_app[] = $app_name;
													$check_content_txt++;
												}

												$c++;
											} //end loop

											$content_web_url = substr($content_web_url, 0, -2);
											$content_images = substr($content_images, 0, -2);
											$content_text = substr($content_text, 0, -2);

											// Remove empty element
											$content_images_app = array_filter($content_images_app);
											$content_web_url_app = array_filter($content_web_url_app);
											$content_text_app = array_filter($content_text_app);

											// Implode
											$content_images_app = implode(',', $content_images_app);
											$content_web_url_app = implode(',', $content_web_url_app);
											$content_text_app = implode(',', $content_text_app);

											if ($check_content_img > 0) {
												$xml_body .= '<images useable_app="' . $content_images_app . '">';
												$xml_body .= $content_images;
												$xml_body .= '</images>';
											}

											if ($check_content_url > 0) {
												$xml_body .= '<weburl useable_app="' . $content_web_url_app . '">';
												$xml_body .= $content_web_url;
												$xml_body .= '</weburl>';
											}

											if ($check_content_txt > 0) {
												$xml_body .= '<texts useable_app="' . $content_text_app . '">';
												$xml_body .= $content_text;
												$xml_body .= '</texts>';
											}

											$xml_body .= '</contents>';

											//************* COMPONENT CONTENT **************//
										} else {
											$xml_body .= '<contents></contents>';
										}

										$xml_body .= '</component>';
									} //End loop

									$xml_body .= '</innovative_content>';
								} //end if => verify TBT

								//****** TBT ******/

							//}
						} //end loop
					//} //end loop
				//} //end loop

				$xml_body .= '</search_list>';
			} elseif (!empty($result_array_alt)) {

				unset($result_array2['searchResults']);
				unset($result_array2['searchResults']['count']);
				unset($result_array2['searchResults']['missing']);
				unset($result_array2['searchResults']['page']);
				unset($result_array2['searchResults']['pageCount']);
				unset($result_array2['searchResults']['pageSize']);

				$result_value_status = (!empty($result_array['searchResults']['data'])) ? 'Success' : 'Null';

				$xml_body .= '<status>' . $result_value_status . '</status>
							  <search_list>';

				$p = 1;


				foreach ($result_array_alt as $level1_key => $level1_value_array) {
					foreach ($level1_value_array as $level2_key => $level2_value_array) {
						foreach ($level2_value_array as $level3_key => $level3_value_array) {
							$content_id = $level3_value_array['id'];
							$content_type = $level3_value_array['type'];

							if ($content_type == 'LP') {
								//****** LP	

								$data_row = $this->api_model->dbSingleRowQuery('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name', 'lesson, class, subject', "class.class_id = lesson.class_id AND subject.subject_id = lesson.subject_id AND lesson.id = " . $content_id . "");

								$data_id = $data_row['id'];
								$data_free_status = $data_row['free_status'];

								$class_name = $data_row['class_name'];
								$class_name = $this->convert_class_to_word($class_name);
								$subject_name = $data_row['subject_name'];
								$topic = $data_row['topic'];
								$doc_name = $data_row['doc_name'];
								$doc_name_link = (!empty($doc_name)) ? $this->app_upload_dir . 'uploads/' . $doc_name : 'nil';
								$doc_pdf_name = $data_row['doc_pdf_name'];
								$doc_pdf_name_link = (!empty($doc_pdf_name)) ? $this->app_upload_dir . 'uploads/' . $doc_pdf_name : 'nil';
								$content = $data_row['content'];
								$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';
								$subscription_status = (!empty($verify_sub_id)) ? 'TRUE' : 'FALSE';

								$xml_body .= '<lesson_plan>';
								$xml_body .= '<lesson_id>' . $data_id . '</lesson_id>';
								$xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
								$xml_body .= '<subscription_status>' . $subscription_status . '</subscription_status>';
								$xml_body .= '<topic>' . $topic . '</topic>';
								$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
								$xml_body .= '<class_name>' . $class_name . '</class_name>';
								$xml_body .= '<content>' . $content . '</content>';

								$lesson_pix_list = $this->api_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '" . $data_id . "'", 'id', 'ASC');
								$xml_body .= '<lesson_pictures>';
								if (!empty($lesson_pix_list)) {
									foreach ($lesson_pix_list as $lesson_pix_row) {
										$xml_body .= '<picture' . $p . '>';
										$xml_body .= $this->app_upload_dir . 'uploads/' . $lesson_pix_row['pix_name'];
										//$xml_body .= ',';
										$xml_body .= '</picture' . $p . '>';
										$p++;
									}
								}
								$xml_body .= '</lesson_pictures>';

								$xml_body .= '</lesson_plan>';

								//****** LP	



								//****** TBT ******/

								$lesson_id = $content_id;

								$verify_innovative_list = $this->api_model->dbRowCountQuery('lesson_innovative', "lesson_id = '" . $lesson_id . "'");

								if ($verify_innovative_list > 0) {

									$xml_body .= '<innovative_content lesson_id="' . $lesson_id . '" topic="' . $topic . '" subject_name="' . $subject_name . '" class_name="' . $class_name . '">';

									$components_list = $this->api_model->dbMultiRowQuery('*', 'components', "", 'id', 'ASC');

									foreach ($components_list as $components_row) {
										$component_id = $components_row['id'];
										$name = $components_row['name'];
										$short_name = $components_row['short_name'];

										$xml_body .= '<component component_id="' . $component_id . '" name="' . $name . '" short_name="' . $short_name . '">';

										$component_data_list = $this->api_model->dbMultiRowQuery('lesson_innovative.id, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.format, lesson_innovative.component, lesson_innovative.category, lesson_innovative.app_id', 'lesson_innovative', "lesson_innovative.lesson_id = '" . $lesson_id . "' AND lesson_innovative.component = '" . $component_id . "'");

										if (!empty($component_data_list)) {
											//************* COMPONENT CONTENT ***************//

											$xml_body .= '<contents>';

											$c = 1;
											$content_web_url = '';
											$content_web_url_app = array();
											$content_images = '';
											$content_images_app = array();
											$content_text = '';
											$content_text_app = array();

											$check_content_img = 0;
											$check_content_url = 0;
											$check_content_txt = 0;

											foreach ($component_data_list as $component_data_row) {

												$component = $component_data_row['component'];
												$category = $component_data_row['category'];
												$category_name = $this->component_cat_value($category);
												$format = $component_data_row['format'];
												$format_name = $this->component_format_value($format);
												$app_id = $component_data_row['app_id'];

												$app_name = (!empty($app_id)) ? $this->api_model->dbSingleColQuery('name', 'media_app', "id = '" . $app_id . "'") : $category_name;

												$content = '';

												if ($format == 1) {
													$filename = $component_data_row['filename'];

													$content = $this->app_upload_dir . 'uploads/' . $filename;

													$content_images .= $content;
													$content_images .= ', ';
													$content_images_app[] = $app_name;
													$check_content_img++;
												} elseif ($format == 2) {
													$video_url = $component_data_row['video_url'];
													$video_url = $this->addhttp($video_url);
													$video_url = $this->cleanContentUrl($video_url);
													$content = $video_url;
													$content = str_replace(';', "", $content);

													$content_web_url .= $content;
													$content_web_url .= ', ';
													$content_web_url_app[] = $app_name;
													$check_content_url++;
												} elseif ($format == 3) {
													$content = $component_data_row['text_content'];
													$content = str_replace(';', "", $content);

													$content_text .= $content;
													$content_text .= ', ';
													$content_text_app[] = $app_name;
													$check_content_txt++;
												}

												$c++;
											} //end loop

											$content_web_url = substr($content_web_url, 0, -2);
											$content_images = substr($content_images, 0, -2);
											$content_text = substr($content_text, 0, -2);

											// Remove empty element
											$content_images_app = array_filter($content_images_app);
											$content_web_url_app = array_filter($content_web_url_app);
											$content_text_app = array_filter($content_text_app);

											// Implode
											$content_images_app = implode(',', $content_images_app);
											$content_web_url_app = implode(',', $content_web_url_app);
											$content_text_app = implode(',', $content_text_app);

											if ($check_content_img > 0) {
												$xml_body .= '<images useable_app="' . $content_images_app . '">';
												$xml_body .= $content_images;
												$xml_body .= '</images>';
											}

											if ($check_content_url > 0) {
												$xml_body .= '<weburl useable_app="' . $content_web_url_app . '">';
												$xml_body .= $content_web_url;
												$xml_body .= '</weburl>';
											}

											if ($check_content_txt > 0) {
												$xml_body .= '<texts useable_app="' . $content_text_app . '">';
												$xml_body .= $content_text;
												$xml_body .= '</texts>';
											}

											$xml_body .= '</contents>';

											//************* COMPONENT CONTENT **************//
										} else {
											$xml_body .= '<contents></contents>';
										}

										$xml_body .= '</component>';
									} //End loop

									$xml_body .= '</innovative_content>';
								} //end if => verify TBT

								//****** TBT ******/

							}
						} //end loop
					} //end loop
				} //end loop

				$xml_body .= '</search_list>';
			} else {
				$xml_body .= '<status>Failed</status>
						  <status_message>No search result matched your keyword</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function smart_suggestion()
	{

		$keyword = $this->input->get('keyword');
		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);


		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($keyword)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Keyword must not be empty</status_message>';
		} else {
			$url = $this->smart_query_url . 'suggestions?query=' . $keyword;
			$keyword = str_replace(" ", '%20', $keyword);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL, $url);
			$result = curl_exec($ch);
			curl_close($ch);

			$result_array = json_decode($result, true);

			if (!empty($result_array)) {
				$xml_body .= '<status>Success</status>
							  <suggestions>';

				foreach ($result_array as $key => $value_array) {
					foreach ($value_array as $value) {
						$xml_body .= '<suggestion>';
						$xml_body .= $value;
						$xml_body .= '</suggestion>';
					}
				} //end loop

				$xml_body .= '</suggestions>';
			} else {
				$xml_body .= '<status>Failed</status>
						  <status_message>No suggestions matched your keyword</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function save_recent_view($user_id, $data_id, $data_type, $component = false)
	{

		$data_type_array = array(1, 2);

		if (!empty($user_id) && !empty($data_id) && in_array($data_type, $data_type_array)) {

			if ($data_type == 1) {
				// LP
				$verify_exist = $this->api_model->dbSingleColQuery('id', 'lesson_recent_view', "user_id = '" . $user_id . "' AND data_id = '" . $data_id . "' AND data_type = '" . $data_type . "'");
				if (!empty($verify_exist)) {
					$query_data = array('updated' => $this->globalCurrentTimeStamp);
					$this->api_model->dbUpdateQuery($query_data, 'lesson_recent_view', "user_id = '" . $user_id . "' AND data_id = '" . $data_id . "' AND data_type = '" . $data_type . "'");
				} else {
					$query_data = array('user_id' => $user_id, 'data_id' => $data_id, 'data_type' => $data_type, 'updated' => $this->globalCurrentTimeStamp, 'created' => $this->globalCurrentTimeStamp);
					$this->api_model->dbInsertQuery($query_data, 'lesson_recent_view');
				}
			} else {
				// TBT
				$component_array = array(1, 2, 3, 4);
				if (in_array($component, $component_array)) {

					$verify_exist = $this->api_model->dbSingleColQuery('id', 'lesson_recent_view', "user_id = '" . $user_id . "' AND data_id = '" . $data_id . "' AND data_type = '" . $data_type . "' AND component = '" . $component . "'");
					if (!empty($verify_exist)) {
						$query_data = array('updated' => $this->globalCurrentTimeStamp);
						$this->api_model->dbUpdateQuery($query_data, 'lesson_recent_view', "user_id = '" . $user_id . "' AND data_id = '" . $data_id . "' AND data_type = '" . $data_type . "' AND component = '" . $component . "'");
					} else {
						$query_data = array('user_id' => $user_id, 'data_id' => $data_id, 'data_type' => $data_type, 'component' => $component, 'updated' => $this->globalCurrentTimeStamp, 'created' => $this->globalCurrentTimeStamp);
						$this->api_model->dbInsertQuery($query_data, 'lesson_recent_view');
					}
				}
			}
		}
	} // End function


	public function get_recent_view()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$content_list = $this->api_model->dbMultiRowQuery('data_id, data_type, component', 'lesson_recent_view', "user_id = '" . $user_id . "'", 'updated', 'DESC');

			if (!empty($content_list)) {
				$xml_body .= '<status>Success</status>';

				$xml_body .= '<recent_list>';

				foreach ($content_list as $data_row) {

					$data_id = $data_row['data_id'];
					$data_type = $data_row['data_type'];
					$component_id = $data_row['component'];

					if ($data_type == 1) {
						$data_row = $this->api_model->dbSingleRowQuery('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name', 'lesson, class, subject', "class.class_id = lesson.class_id AND subject.subject_id = lesson.subject_id AND lesson.id = '" . $data_id . "'");

						if (!empty($data_row)) {
							$class_name = $data_row['class_name'];
							$class_name = $this->convert_class_to_word($class_name);
							$subject_name = $data_row['subject_name'];
							$topic = $data_row['topic'];
							$doc_name = $data_row['doc_name'];

							$data_free_status = $data_row['free_status'];
							$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';

							$doc_name_link = (!empty($doc_name)) ? $this->app_upload_dir . 'uploads/' . $doc_name : 'nil';
							$doc_pdf_name = $data_row['doc_pdf_name'];
							$doc_pdf_name_link = (!empty($doc_pdf_name)) ? $this->app_upload_dir . 'uploads/' . $doc_pdf_name : 'nil';
							$content = $data_row['content'];


							$xml_body .= '<viewed_content type="Lesson Plan">';
							$xml_body .= '<lesson_id>' . $data_id . '</lesson_id>';
							$xml_body .= '<topic>' . $topic . '</topic>';
							$xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
							$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
							$xml_body .= '<class_name>' . $class_name . '</class_name>';
							$xml_body .= '<doc_word type="msword">' . $doc_name_link . '</doc_word>';
							$xml_body .= '<doc_pdf type="pdf">' . $doc_pdf_name_link . '</doc_pdf>';
							$xml_body .= '<content>' . $content . '</content>';

							$p = 1;

							$lesson_pix_list = $this->api_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '" . $data_id . "'", 'id', 'ASC');

							$xml_body .= '<lesson_pictures>';
							if (!empty($lesson_pix_list)) {
								foreach ($lesson_pix_list as $lesson_pix_row) {
									$xml_body .= '<picture' . $p . '>';
									$xml_body .= $this->app_upload_dir . 'uploads/' . $lesson_pix_row['pix_name'];
									//$xml_body .= ',';
									$xml_body .= '</picture' . $p . '>';
									$p++;
								}
							}
							$xml_body .= '</lesson_pictures>';

							$xml_body .= '</viewed_content>';
						} else {
							$xml_body .= '<viewed_content>Not Found</viewed_content>';
						}
					} elseif ($data_type == 2) {
						$lesson_id = $data_row['data_id'];

						if (!empty($component_id)) {
							$content_row = $this->api_model->dbSingleRowQuery('lesson_innovative.id, lesson_innovative.lesson_id, lesson.topic, lesson.free_status, lesson.class_id, lesson.subject_id, class.name AS class_name, subject.name AS subject_name', 'lesson_innovative, lesson, class, subject', "lesson_innovative.lesson_id = lesson.id AND class.class_id = lesson.class_id AND subject.subject_id = lesson.subject_id AND lesson.id = '" . $lesson_id . "' AND lesson_innovative.component = '" . $component_id . "'");

							$component_data = $this->api_model->dbSingleRowQuery('name, short_name', 'components', "id = '" . $component_id . "'");
							$component_name = $component_data['name'];
							$component_short_name = $component_data['short_name'];

							$topic = $content_row['topic'];
							$class_name = $content_row['class_name'];
							$class_name = $this->convert_class_to_word($class_name);
							$subject_name = $content_row['subject_name'];
							$data_free_status = $content_row['free_status'];

							$verify_innovative_list = $this->api_model->dbRowCountQuery('lesson_innovative', "lesson_id = '" . $lesson_id . "'");

							$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';

							if ($verify_innovative_list > 0) {
								$xml_body .= '<viewed_content type="Innovative Content" free_status="' . $data_free_status_value . '" lesson_id="' . $lesson_id . '" topic="' . $topic . '" subject_name="' . $subject_name . '" class_name="' . $class_name . '" component_id="' . $component_id . '" component_name="' . $component_name . '" component_short_name="' . $component_short_name . '">';

								$component_data_list = $this->api_model->dbMultiRowQuery('lesson_innovative.id, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.format, lesson_innovative.component, lesson_innovative.category, lesson_innovative.app_id', 'lesson_innovative', "lesson_innovative.lesson_id = '" . $lesson_id . "' AND lesson_innovative.component = '" . $component_id . "'");

								if (!empty($component_data_list)) {
									//************* COMPONENT CONTENT ***************//

									$xml_body .= '<contents>';


									$c = 1;
									$content_web_url = '';
									$content_web_url_app = array();
									$content_images = '';
									$content_images_app = array();
									$content_text = '';
									$content_text_app = array();

									$check_content_img = 0;
									$check_content_url = 0;
									$check_content_txt = 0;

									foreach ($component_data_list as $component_data_row) {

										$component = $component_data_row['component'];
										$category = $component_data_row['category'];
										$category_name = $this->component_cat_value($category);
										$format = $component_data_row['format'];
										$format_name = $this->component_format_value($format);
										$app_id = $component_data_row['app_id'];

										$app_name = (!empty($app_id)) ? $this->api_model->dbSingleColQuery('name', 'media_app', "id = '" . $app_id . "'") : $category_name;

										$content = '';

										if ($format == 1) {
											$filename = $component_data_row['filename'];
											$content = $this->app_upload_dir . 'uploads/' . $filename;

											$content_images .= $content;
											$content_images .= ', ';
											$content_images_app[] = $app_name;
											$check_content_img++;
										} elseif ($format == 2) {
											$video_url = $component_data_row['video_url'];
											$video_url = $this->addhttp($video_url);
											$video_url = $this->cleanContentUrl($video_url);
											$content = $video_url;
											$content = str_replace(';', "", $content);

											$content_web_url .= $content;
											$content_web_url .= ', ';
											$content_web_url_app[] = $app_name;
											$check_content_url++;
										} elseif ($format == 3) {
											$content = $component_data_row['text_content'];
											$content = str_replace(';', "", $content);

											$content_text .= $content;
											$content_text .= ', ';
											$content_text_app[] = $app_name;
											$check_content_txt++;
										}

										$c++;
									} //end loop

									$content_web_url = substr($content_web_url, 0, -2);
									$content_images = substr($content_images, 0, -2);
									$content_text = substr($content_text, 0, -2);

									// Remove empty element
									$content_images_app = array_filter($content_images_app);
									$content_web_url_app = array_filter($content_web_url_app);
									$content_text_app = array_filter($content_text_app);

									// Implode
									$content_images_app = implode(',', $content_images_app);
									$content_web_url_app = implode(',', $content_web_url_app);
									$content_text_app = implode(',', $content_text_app);

									if ($check_content_img > 0) {
										$xml_body .= '<images useable_app="' . $content_images_app . '">';
										$xml_body .= $content_images;
										$xml_body .= '</images>';
									}

									if ($check_content_url > 0) {
										$xml_body .= '<weburl useable_app="' . $content_web_url_app . '">';
										$xml_body .= $content_web_url;
										$xml_body .= '</weburl>';
									}

									if ($check_content_txt > 0) {
										$xml_body .= '<texts useable_app="' . $content_text_app . '">';
										$xml_body .= $content_text;
										$xml_body .= '</texts>';
									}

									$xml_body .= '</contents>';

									//************* COMPONENT CONTENT **************//
								} else {
									$xml_body .= '<contents></contents>';
								}
								$xml_body .= '</viewed_content>';
							} else {
								$xml_body .= '<viewed_content>Not Found</viewed_content>';
							}
						} else {
							$xml_body .= '<viewed_content>Component value must be specified</viewed_content>';
						}
					}
				} //End Loop

				$xml_body .= '</recent_list>';
			} else {
				$xml_body .= '<status>Null</status>
						  <status_message>No recently viewed content was found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function



	public function save_lesson_download_satisfaction()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$lesson_id = $this->entrySanitizer($this->input->get('lesson'));
		$satisfied = $this->entrySanitizer($this->input->get('satisfied'));

		$satisfied_array = array(1, 2);

		$verify_lesson_id = $this->api_model->dbSingleColQuery('id', 'lesson', "id = '" . $lesson_id . "'");
		$verify_satisfied = $this->api_model->dbSingleColQuery('satisfied', 'lesson_content_satisfaction', "data_id = '" . $lesson_id . "' AND user_id = '" . $user_id . "' AND data_type = '1'");

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (!in_array($satisfied, $satisfied_array)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Invalid Content Satisfaction Value</status_message>';
		} elseif (in_array($verify_satisfied, $satisfied_array)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content Satisfaction status had been saved previously</status_message>';
		} elseif (!empty($verify_satisfied)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content Satisfaction cannot be saved twice</status_message>';
		} else {
			if (!empty($lesson_id) && $lesson_id == $verify_lesson_id) {
				$query_data = array('user_id' => $user_id, 'data_id' => $lesson_id, 'data_type' => 1, 'satisfied' => $satisfied, 'created' => $this->globalCurrentTimeStamp);
				$data_insert = $this->api_model->dbInsertQuery($query_data, 'lesson_content_satisfaction');

				if ($data_insert) {
					$xml_body .= '<status>Success</status>';
				} else {
					$xml_body .= '<status>Failed</status>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function	


	public function save_innovative_download_satisfaction()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$innovative_id = $this->entrySanitizer($this->input->get('innovative_id'));
		$satisfied = $this->entrySanitizer($this->input->get('satisfied'));

		$satisfied_array = array(1, 2);

		$verify_innovative_id = $this->api_model->dbSingleColQuery('id', 'lesson_innovative', "id = '" . $innovative_id . "'");
		$verify_satisfied = $this->api_model->dbSingleColQuery('satisfied', 'lesson_content_satisfaction', "data_id = '" . $innovative_id . "' AND user_id = '" . $user_id . "' AND data_type = '2'");

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (!in_array($satisfied, $satisfied_array)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Invalid Content Satisfaction Value</status_message>';
		} elseif (in_array($verify_satisfied, $satisfied_array)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content Satisfaction status had been saved previously</status_message>';
		} elseif (!empty($verify_satisfied)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content Satisfaction cannot be saved twice</status_message>';
		} else {
			if (!empty($innovative_id) && $innovative_id == $verify_innovative_id) {
				$query_data = array('user_id' => $user_id, 'data_id' => $innovative_id, 'data_type' => 2, 'satisfied' => $satisfied, 'created' => $this->globalCurrentTimeStamp);
				$data_insert = $this->api_model->dbInsertQuery($query_data, 'lesson_content_satisfaction');

				if ($data_insert) {
					$xml_body .= '<status>Success</status>';
				} else {
					$xml_body .= '<status>Failed</status>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function get_content_satisfaction_count()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$data_id = $this->entrySanitizer($this->input->get('data_id'));
		$data_type = $this->entrySanitizer($this->input->get('data_type'));

		$verify_content = $this->api_model->dbRowCountQuery('lesson_content_satisfaction', "data_id = '" . $data_id . "' AND data_type = '" . $data_type . "'");

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($data_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content ID failed authentication</status_message>';
		} elseif (empty($data_type)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content type must be indicated</status_message>';
		} elseif ($verify_content < 1) {
			$xml_body .= '<status>Failed</status>
					  <status_message>No satisfaction count was found for this content</status_message>';
		} else {
			$satisfied_count = $this->api_model->dbRowCountQuery('lesson_content_satisfaction', "data_id = '" . $data_id . "' AND data_type = '" . $data_type . "' AND satisfied = '2'");

			$unsatisfied_count = $this->api_model->dbRowCountQuery('lesson_content_satisfaction', "data_id = '" . $data_id . "' AND data_type = '" . $data_type . "' AND satisfied = '1'");

			$xml_body .= '<status>Success</status>';

			$xml_body .= '<counts>';
			$xml_body .= '<satisfied>' . $satisfied_count . '</satisfied>';
			$xml_body .= '<unsatisfied>' . $unsatisfied_count . '</unsatisfied>';
			$xml_body .= '</counts>';
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function check_user_content_satisfaction()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$data_id = $this->entrySanitizer($this->input->get('data_id'));
		$data_type = $this->entrySanitizer($this->input->get('data_type'));

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($data_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content ID failed authentication</status_message>';
		} elseif (empty($data_type)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Content type must be indicated</status_message>';
		} else {
			$satisfaction_data = $this->api_model->dbSingleRowQuery('id, satisfied', 'lesson_content_satisfaction', "data_id = '" . $data_id . "' AND data_type = '" . $data_type . "' AND user_id = '" . $user_id . "'");

			$xml_body .= '<status>Success</status>';

			if (!empty($satisfaction_data)) {
				if ($satisfaction_data['satisfied'] == 1) {
					$xml_body .= '<status_message>Unsatisfied</status_message>';
				} elseif ($satisfaction_data['satisfied'] == 2) {
					$xml_body .= '<status_message>Satisfied</status_message>';
				}
			} else {
				$xml_body .= '<status_message>Unspecified</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function pc_cost()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$data_row = $this->api_model->dbSingleRowQuery('pc_cost_lp, pc_cost_tbt', 'site_config', "id = 1");

			if (!empty($data_row)) {

				$pc_cost_lp = (int) $data_row['pc_cost_lp'];
				$pc_cost_tbt = (int) $data_row['pc_cost_tbt'];
				$pc_cost_both = $pc_cost_lp + $pc_cost_tbt;

				$xml_body .= '<status>Success</status>
								  <lp_cost>' . $pc_cost_lp . '</lp_cost>
								  <tbt_cost>' . $pc_cost_tbt . '</tbt_cost>

								  <both_cost>' . $pc_cost_both . '</both_cost>';
			} else {
				$xml_body .= '<status>Null</status>
								  <status_message>Cost for Personalized Content was not found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function



	public function pc_save_order()
	{

		$tranx_status = $this->entrySanitizer($this->input->get('tranx_status'));
		$order_ref_id = $this->entrySanitizer($this->input->get('order_ref_id'));
		$order_type = $this->entrySanitizer($this->input->get('order_type'));
		$total_cost = $this->entrySanitizer($this->input->get('total_cost'));
		$class_id = $this->entrySanitizer($this->input->get('class_id'));
		$subject_id = $this->entrySanitizer($this->input->get('subject_id'));
		$topic = $this->entrySanitizer($this->input->get('topic'));
		$topic = trim($topic);

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($order_ref_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Order reference ID failed authentication</status_message>';
		} elseif (empty($order_type)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Order type failed authentication</status_message>';
		} elseif (empty($total_cost)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Order total cost failed authentication</status_message>';
		} elseif (empty($class_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Class ID failed authentication</status_message>';
		} elseif (empty($subject_id)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Subject ID failed authentication</status_message>';
		} elseif (empty($tranx_status)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Order Payment status authentication</status_message>';
		} elseif (empty($topic)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Topic must not be blank</status_message>';
		} else {
			$user_email = $this->api_model->dbSingleColQuery('email', 'user', "user_id = '" . $user_id . "'");

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "https://api.paystack.co/transaction/verify/" . rawurlencode($order_ref_id));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			$curl_headers = array(
				'accept: application/json',
				'authorization: Bearer ' . $this->site_config['secret_key'] . '',
				'cache-control: no-cache',
			);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_headers);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			$verify_order_ref_id = $this->api_model->dbSingleColQuery('id', 'pc_order', "order_ref_id = '" . $order_ref_id . "'");

			if ($err) {
				$data_save = 'Payment Verification Request to the Gateway failed. Pls try again shortly.';
				$xml_body .= '<status>Failed</status>
					  <status_message>Payment Verification Request to the Gateway failed. Pls try again shortly.</status_message>';
			} elseif (!empty($verify_order_ref_id)) {
				$data_save = 'Request aborted! Order reference already exist.';
				$xml_body .= '<status>Failed</status>
					  <status_message>Request aborted! Order reference already exist.</status_message>';
			} elseif (empty($user_email)) {
				$data_save = 'User account Email address failed authentication.';
				$xml_body .= '<status>Failed</status>
					  <status_message>User account Email address failed authentication</status_message>';
			} else {
				$tranx = json_decode($response);

				if (!$tranx->status) {
					$data_save = 'Payment Request Failed : ' . $tranx->message;
					$xml_body .= '<status>Failed</status>
						  <status_message>Payment Request Failed : ' . $tranx->message . '</status_message>';
				} elseif ($tranx->data->status == 'success') {
					$this->db->trans_start();	//Transaction Start

					$paygate_status_code = 7;
					$paygate_status_msg = $tranx->data->status;

					$query_order = array('order_type' => $order_type, 'order_ref_id' => $order_ref_id, 'user_id' => $user_id, 'total_cost' => $total_cost, 'pay_status' => '2', 'paygate_status_code' => $paygate_status_code, 'paygate_status_msg' => $paygate_status_msg, 'paygate_process' => 2, 'visible' => 2);
					$this->api_model->dbInsertQuery($query_order, 'pc_order');
					$pc_order_id = $this->db->insert_id();	// Get Data Id

					$query_order_details = array('order_id' => $pc_order_id, 'topic' => $topic, 'class_id' => $class_id, 'subject_id' => $subject_id, 'assigned_to' => 0, 'assigned_date' => '0000-00-00 00:00:00');
					$this->api_model->dbInsertQuery($query_order_details, 'pc_order_details');

					$this->db->trans_complete();	//Transaction End

					if ($this->db->trans_status() === FALSE) {
						$this->db->trans_rollback();	// All transaction rolled back

						$xml_body .= '<status>Failed</status>
								  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';

						$data_save = 'Payment : Whoops! Something went wrong while processing request. Please try again shortly';
					} else {
						$this->db->trans_commit();		// All transaction committed to database

						// Start: Push email to Customer
						$customer_data = $this->api_model->dbSingleRowQuery('surname, first_name', 'member', "user_id = '" . $user_id . "'");
						$customer_name = $customer_data['surname'];
						$customer_name .= ' ' . $customer_data['first_name'];

						$subject_name = $this->api_model->dbSingleColQuery('name', 'subject', "subject_id = '" . $subject_id . "'");

						$class_name = $this->api_model->dbSingleColQuery('name', 'class', "class_id = '" . $class_id . "'");

						$email_subject = $this->site_config['comp_name'] . " - Successful Payment for Personalized Content Order";

						$amount = number_format($total_cost);
						$pco = $this->encryptGetId($pc_order_id);
						$pc_intern_pay = $this->pc_get_intern_pay($order_type);

						$messageContent = '<p>
						This is to notify your payment for the Personalized Content on ' . $this->site_config['comp_name'] . ' was successful. <br />

						Your order number is: ' . $order_ref_id . '.<br />
						Amount Paid: N' . $amount . '.<br />
						Payment/Request date: ' . date("jS F, Y", strtotime($this->globalCurrentDate)) . '<br />
						<br /><br />
						Order Type: ' . $this->pc_order_type($order_type) . '.<br />
						Topic: ' . $topic . '.<br />
						Class: ' . $class_name . '.<br />
						Subject: ' . $subject_name . '.<br />
						<br /><br />
						Your Content is in the works and you will be contacted shortly upon completion of your Personalized Content.
						<br><p>';

						$this->sendEmail($user_email, $email_subject, $messageContent, 1);


						$adm_msg_subject = "New Personalized Content Order";

						$messageContentAdmin = '<p>
						New Order Request for Personalized Content on ' . $this->site_config['comp_name'] . ' was successful. <br />
						<br><br>
						Order number: ' . $order_ref_id . '.<br />
						Amount Paid: N' . $amount . '.<br />
						Payment/Request date: ' . date("jS F, Y", strtotime($this->globalCurrentDate)) . '<br />
						Customer Name: ' . $customer_name . '.<br />
						Order Type: ' . $this->pc_order_type($order_type) . '.<br />
						Topic: ' . $topic . '.<br />
						Class: ' . $class_name . '.<br />
						Subject: ' . $subject_name . '.<br />
						Request date: ' . date("jS F, Y", strtotime($this->globalCurrentDate)) . '<br />
						<br /><br />
						Intern to be paid N' . $pc_intern_pay . ' for the content delivery.
						<br />
						<p>';

						$this->sendEmail($this->site_config['pc_email'], $adm_msg_subject, $messageContentAdmin, 1);

						$interns_list = $this->api_model->dbMultiRowQuery('user.email, user.user_id, admin.surname, admin.first_name', 'admin, user', "admin.user_id = user.user_id AND admin.del_status = '1' AND user.type_id = '2' AND user.user_id != '1'");

						if (!empty($interns_list)) {
							$adm = 1;
							foreach ($interns_list as $intern_row) {
								$admin_user_id = $this->encryptGetId($intern_row['user_id']);
								$admin_email = $intern_row['email'];
								$admin_fullname = $intern_row['surname'];
								$admin_fullname .= ' ' . $intern_row['first_name'];

								$query_apply = array('order_id' => $pc_order_id, 'user_id' => $intern_row['user_id'], 'response' => 0, 'applied_timestamp' => '0000-00-00 00:00:00', 'created' => $this->globalCurrentTimeStamp);
								$this->api_model->dbInsertQuery($query_apply, 'pc_applicants');

								$gen_action_txt = 'pc_apply';

								$gen_action_code = $this->generateCodeGen($intern_row['user_id'], $gen_action_txt);

								$adm_subject = "New Personalized Content Order";

								$due_date = $this->generateFutureDate($this->globalCurrentDate, 2);
								$due_date = date("jS F, Y", strtotime($due_date));

								$messageContent2 = '<div>
								The is is notify you that there is a new Personalized Content Order on ' . $this->site_config['comp_name'] . '.
								<br><br>
								Order Type: ' . $this->pc_order_type($order_type) . '.<br />
								Topic: ' . $topic . '.<br />
								Class: ' . $class_name . '.<br />
								Subject: ' . $subject_name . '.<br />
								Request date: ' . date("jS F, Y", strtotime($this->globalCurrentDate)) . '<br />
								<br />
								You will be paid N' . $pc_intern_pay . ' for the content delivery.
								<br /><br />
								The due date for this request is ' . $due_date . '. (48 hour timeline)
								<br /><br />
								Do you accept this request? Inidicate by clicking either Yes or No below 
								<br /><br />

								<table cellspacing="0" border="0" cellpadding="0" width="100%">
									<tr>
										<td>
											<a href="' . $this->admin_backend_url . 'index.php/pc-apply?emv=' . $admin_user_id . '&resp=2&code=' . $gen_action_code . '&pco=' . $pco . '">Click link for YES</a>
											<br /><br />	
										</td>
										<td>
											' . $this->admin_backend_url . 'index.php/pc-apply?emv=' . $admin_user_id . '&resp=2&code=' . $gen_action_code . '&pco=' . $pco . '
											<br /><br />
										</td>

									</tr>
									<tr>
										<td>
											<a href="' . $this->admin_backend_url . 'index.php/pc-apply?emv=' . $admin_user_id . '&resp=1&code=' . $gen_action_code . '&pco=' . $pco . '">Click link for NO</a>
										</td>
										<td>
											' . $this->admin_backend_url . 'index.php/pc-apply?emv=' . $admin_user_id . '&resp=1&code=' . $gen_action_code . '&pco=' . $pco . '
										</td>
									<tr>
								</table>

								<div>';

								$this->sendEmail($admin_email, $adm_subject, $messageContent2, 1);
							} //end loop
						} //end if

						$xml_body .= '<status>Success</status>
									  <status_message>Personalized Content Order has been successfully processed and saved. You will be contacted shortly upon completion of your content request..</status_message>
									  <order_ref_id>' . $order_ref_id . '</order_ref_id>';
					}
				} else {
					$xml_body .= '<status>Failed</status>
						  <status_message>Order transaction Failed : ' . $tranx->message . '</status_message>';
				}
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} //End funtion


	public function pc_order_list()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';

			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$order_list = $this->api_model->dbMultiRowQuery('pc_order.*, pc_order_details.class_id, pc_order_details.topic, pc_order_details.subject_id', 'pc_order, pc_order_details', "pc_order.id = pc_order_details.order_id AND pc_order_details.completed != '2' AND pc_order_details.completed_data_id = '0' AND visible = '2' AND pc_order.user_id = '" . $user_id . "'", 'pc_order.id', 'DESC');

			if (!empty($order_list)) {
				$xml_body .= '<status>Success</status>';

				$xml_body .= '<order_list>';

				foreach ($order_list as $data_row) {

					$data_id = $data_row['id'];
					$order_type = $data_row['order_type'];
					$order_type_value = $this->pc_order_type($order_type);
					$order_type_value = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $order_type_value);

					$topic = $data_row['topic'];
					$class_id = $data_row['class_id'];
					$subject_id = $data_row['subject_id'];

					$subject_name = $this->api_model->dbSingleColQuery('name', 'subject', "subject_id = '" . $subject_id . "'");

					$class_name = $this->api_model->dbSingleColQuery('name', 'class', "class_id = '" . $class_id . "'");

					$total_cost = $data_row['total_cost'];
					$created = $data_row['created'];

					$xml_body .= '<order>';
					$xml_body .= '<order_type>' . $order_type_value . '</order_type>';
					$xml_body .= '<topic>' . $topic . '</topic>';
					$xml_body .= '<class_name>' . $class_name . '</class_name>';
					$xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
					$xml_body .= '<total_cost>' . $total_cost . '</total_cost>';
					$xml_body .= '<order_date>' . $created . '</order_date>';
					$xml_body .= '</order>';
				} //End Loop

				$xml_body .= '</order_list>';
			} else {
				$xml_body .= '<status>Null</status>
						  <status_message>No content was found</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function pc_ordered_contents()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);


		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$order_list = $this->api_model->dbMultiRowQuery('pc_order.*, pc_order_details.completed', 'pc_order, pc_order_details', "pc_order.id = pc_order_details.order_id AND pc_order_details.completed = '2' AND visible = '2' AND pc_order.user_id = '" . $user_id . "'", 'pc_order.id', 'DESC');

			$count_completed = $this->api_model->dbRowCountQuery('pc_order, pc_order_details, lesson', "pc_order.id = pc_order_details.order_id AND pc_order.user_id = '" . $user_id . "' AND lesson.id = pc_order_details.completed_data_id AND pc_order_details.completed = '2'");

			if (!empty($order_list)) {
				$xml_body .= ($count_completed > 0) ? '<status>Success</status>' : '<status>Null</status>';
				$xml_body .= '<order_list>';

				$p = 1;
				foreach ($order_list as $order_row) {
					$order_id = $order_row['id'];
					$order_ref_id = $order_row['order_ref_id'];
					$order_type = $order_row['order_type'];
					$completed = $order_row['completed'];
					$viewed_lp = $order_row['viewed_lp'];
					$viewed_tbt1 = $order_row['viewed_tbt1'];
					$viewed_tbt2 = $order_row['viewed_tbt2'];
					$viewed_tbt3 = $order_row['viewed_tbt3'];
					$viewed_tbt4 = $order_row['viewed_tbt4'];

					$viewed_lp = ($viewed_lp == 2) ? 'TRUE' : 'FALSE';
					$viewed_tbt1 = ($viewed_tbt1 == 2) ? 'TRUE' : 'FALSE';
					$viewed_tbt2 = ($viewed_tbt2 == 2) ? 'TRUE' : 'FALSE';
					$viewed_tbt3 = ($viewed_tbt3 == 2) ? 'TRUE' : 'FALSE';
					$viewed_tbt4 = ($viewed_tbt4 == 2) ? 'TRUE' : 'FALSE';

					$order_type_value = $this->pc_order_type($order_type);
					$order_type_value = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $order_type_value);

					$xml_body .= '<order order_id="' . $order_id . '" order_type="' . $order_type_value . '" order_ref_id="' . $order_ref_id . '">';

					$data_row = $this->api_model->dbSingleRowQuery('lesson.id, lesson.free_status, lesson.topic, lesson.doc_name, lesson.doc_pdf_name, lesson.content, class.name AS class_name, subject.name AS subject_name, pc_order.order_type', 'lesson, class, subject, pc_order_details, pc_order', "class.class_id = lesson.class_id AND subject.subject_id = lesson.subject_id AND lesson.id = pc_order_details.completed_data_id AND pc_order_details.completed = '2' AND pc_order_details.id = pc_order.id AND pc_order.id = '" . $order_id . "' AND pc_order.user_id = '" . $user_id . "'");

					if (!empty($data_row)) {
						$xml_body .= '<content_list>';

						//****** LP	

						$data_id = $data_row['id'];
						$data_free_status = $data_row['free_status'];
						$order_type = $data_row['order_type'];

						$class_name = $data_row['class_name'];
						$class_name = $this->convert_class_to_word($class_name);
						$subject_name = $data_row['subject_name'];
						$topic = $data_row['topic'];
						$doc_name = $data_row['doc_name'];
						$doc_name_link = (!empty($doc_name)) ? $this->app_upload_dir . 'uploads/' . $doc_name : 'nil';
						$doc_pdf_name = $data_row['doc_pdf_name'];
						$doc_pdf_name_link = (!empty($doc_pdf_name)) ? $this->app_upload_dir . 'uploads/' . $doc_pdf_name : 'nil';
						$content = $data_row['content'];
						$data_free_status_value = ($data_free_status == 2) ? 'FREE' : 'NOT FREE';
						$subscription_status = (!empty($verify_sub_id)) ? 'TRUE' : 'FALSE';

						$lp_xml_body = '';
						$tbt_xml_body = '';

						$lp_xml_body .= '<lesson_plan viewed="' . $viewed_lp . '">';
						$lp_xml_body .= '<lesson_id>' . $data_id . '</lesson_id>';
						$lp_xml_body .= '<free_status>' . $data_free_status_value . '</free_status>';
						$lp_xml_body .= '<subscription_status>' . $subscription_status . '</subscription_status>';
						$lp_xml_body .= '<topic>' . $topic . '</topic>';
						$lp_xml_body .= '<subject_name>' . $subject_name . '</subject_name>';
						$lp_xml_body .= '<class_name>' . $class_name . '</class_name>';
						$lp_xml_body .= '<content>' . $content . '</content>';

						$lesson_pix_list = $this->api_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '" . $data_id . "'", 'id', 'ASC');
						$lp_xml_body .= '<lesson_pictures>';
						if (!empty($lesson_pix_list)) {

							foreach ($lesson_pix_list as $lesson_pix_row) {
								$lp_xml_body .= '<picture' . $p . '>';
								$lp_xml_body .= $this->app_upload_dir . 'uploads/' . $lesson_pix_row['pix_name'];
								$lp_xml_body .= '</picture' . $p . '>';
								$p++;
							}
						}
						$p = 1;
						$lp_xml_body .= '</lesson_pictures>';

						$lp_xml_body .= '</lesson_plan>';

						//****** LP	

						//****** TBT

						$lesson_id = $data_id;

						$verify_innovative_list = $this->api_model->dbRowCountQuery('lesson_innovative', "lesson_id = '" . $lesson_id . "'");

						if ($verify_innovative_list > 0) {

							$tbt_xml_body .= '<innovative_content free_status="' . $data_free_status_value . '" lesson_id="' . $lesson_id . '" topic="' . $topic . '" subject_name="' . $subject_name . '" class_name="' . $class_name . '">';

							$components_list = $this->api_model->dbMultiRowQuery('*', 'components', "", 'id', 'ASC');

							foreach ($components_list as $components_row) {
								$component_id = $components_row['id'];
								$name = $components_row['name'];
								$short_name = $components_row['short_name'];

								if ($component_id == 1) {
									$viewed = $viewed_tbt1;
								} elseif ($component_id == 2) {
									$viewed = $viewed_tbt2;
								} elseif ($component_id == 3) {
									$viewed = $viewed_tbt3;
								} elseif ($component_id == 4) {
									$viewed = $viewed_tbt4;
								}

								$tbt_xml_body .= '<component component_id="' . $component_id . '" name="' . $name . '" short_name="' . $short_name . '" viewed="' . $viewed . '">';

								$component_data_list = $this->api_model->dbMultiRowQuery('lesson_innovative.id, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, lesson_innovative.format, lesson_innovative.component, lesson_innovative.category, lesson_innovative.app_id', 'lesson_innovative', "lesson_innovative.lesson_id = '" . $lesson_id . "' AND lesson_innovative.component = '" . $component_id . "'");

								if (!empty($component_data_list)) {

									$tbt_xml_body .= '<contents>';

									$c = 1;
									$content_web_url = '';
									$content_web_url_app = array();
									$content_images = '';
									$content_images_app = array();
									$content_text = '';

									$content_text_app = array();

									$check_content_img = 0;
									$check_content_url = 0;
									$check_content_txt = 0;

									foreach ($component_data_list as $component_data_row) {

										$component = $component_data_row['component'];
										$category = $component_data_row['category'];
										$category_name = $this->component_cat_value($category);
										$format = $component_data_row['format'];
										$format_name = $this->component_format_value($format);
										$app_id = $component_data_row['app_id'];

										$app_name = (!empty($app_id)) ? $this->api_model->dbSingleColQuery('name', 'media_app', "id = '" . $app_id . "'") : $category_name;

										$content = '';

										if ($format == 1) {
											$filename = $component_data_row['filename'];
											$content = $this->app_upload_dir . 'uploads/' . $filename;

											$content_images .= $content;
											$content_images .= ', ';
											$content_images_app[] = $app_name;
											$check_content_img++;
										} elseif ($format == 2) {
											$video_url = $component_data_row['video_url'];
											$video_url = $this->addhttp($video_url);
											$video_url = $this->cleanContentUrl($video_url);
											$content = $video_url;
											$content = str_replace(';', "", $content);

											$content_web_url .= $content;
											$content_web_url .= ', ';
											$content_web_url_app[] = $app_name;
											$check_content_url++;
										} elseif ($format == 3) {
											$content = $component_data_row['text_content'];
											$content = str_replace(';', "", $content);

											$content_text .= $content;
											$content_text .= ', ';
											$content_text_app[] = $app_name;
											$check_content_txt++;
										}

										$c++;
									} //end loop

									$content_web_url = substr($content_web_url, 0, -2);
									$content_images = substr($content_images, 0, -2);
									$content_text = substr($content_text, 0, -2);

									// Remove empty element
									$content_images_app = array_filter($content_images_app);
									$content_web_url_app = array_filter($content_web_url_app);
									$content_text_app = array_filter($content_text_app);

									// Implode
									$content_images_app = implode(',', $content_images_app);
									$content_web_url_app = implode(',', $content_web_url_app);
									$content_text_app = implode(',', $content_text_app);

									if ($check_content_img > 0) {
										$tbt_xml_body .= '<images useable_app="' . $content_images_app . '">';
										$tbt_xml_body .= $content_images;
										$tbt_xml_body .= '</images>';
									}

									if ($check_content_url > 0) {
										$tbt_xml_body .= '<weburl useable_app="' . $content_web_url_app . '">';
										$tbt_xml_body .= $content_web_url;
										$tbt_xml_body .= '</weburl>';
									}

									if ($check_content_txt > 0) {
										$tbt_xml_body .= '<texts useable_app="' . $content_text_app . '">';
										$tbt_xml_body .= $content_text;
										$tbt_xml_body .= '</texts>';
									}

									$tbt_xml_body .= '</contents>';
								} else {
									$tbt_xml_body .= '<contents></contents>';
								}

								$tbt_xml_body .= '</component>';
							} //End loop

							$tbt_xml_body .= '</innovative_content>';
						} //end if => verify TBT

						//****** TBT

						if ($order_type == 1) {
							$xml_body .= $lp_xml_body;
						} elseif ($order_type == 2) {
							$xml_body .= $tbt_xml_body;
						} elseif ($order_type == 3) {
							$xml_body .= $lp_xml_body;
							$xml_body .= $tbt_xml_body;
						}

						$xml_body .= '</content_list>';
					} else {
						$xml_body .= '<status_message>No content was found</status_message>';
					}

					$xml_body .= '</order>';
				} //end loop

				$xml_body .= '</order_list>';
			} else {
				$xml_body .= '<status>Null</status>
						  <status_message>No order has been made</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function pc_ordered_content_status()
	{

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$order_list = $this->api_model->dbMultiRowQuery('pc_order.*', 'pc_order, pc_order_details', "pc_order.id = pc_order_details.order_id AND pc_order_details.completed = '2' AND visible = '2' AND pc_order.user_id = '" . $user_id . "'", 'pc_order.id', 'DESC');

			if (!empty($order_list)) {
				$all_unseen_count = 0;
				$unseen_count = 0;

				foreach ($order_list as $order_row) {
					$order_type = $order_row['order_type'];

					$viewed_lp = $order_row['viewed_lp'];
					$viewed_tbt1 = $order_row['viewed_tbt1'];
					$viewed_tbt2 = $order_row['viewed_tbt2'];
					$viewed_tbt3 = $order_row['viewed_tbt3'];
					$viewed_tbt4 = $order_row['viewed_tbt4'];

					if ($order_type == 1) {
						$unseen_count = ($viewed_lp == 1) ? $unseen_count + 1 : $unseen_count;
					} elseif ($order_type == 2) {
						$unseen_count = ($viewed_tbt1 == 1) ? $unseen_count + 1 : $unseen_count;
						$unseen_count = ($viewed_tbt2 == 1) ? $unseen_count + 1 : $unseen_count;
						$unseen_count = ($viewed_tbt3 == 1) ? $unseen_count + 1 : $unseen_count;
						$unseen_count = ($viewed_tbt4 == 1) ? $unseen_count + 1 : $unseen_count;
					} elseif ($order_type == 3) {
						$unseen_count = ($viewed_lp == 1) ? $unseen_count + 1 : $unseen_count;
						$unseen_count = ($viewed_tbt1 == 1) ? $unseen_count + 1 : $unseen_count;
						$unseen_count = ($viewed_tbt2 == 1) ? $unseen_count + 1 : $unseen_count;
						$unseen_count = ($viewed_tbt3 == 1) ? $unseen_count + 1 : $unseen_count;
						$unseen_count = ($viewed_tbt4 == 1) ? $unseen_count + 1 : $unseen_count;
					}

					if ($unseen_count > 0) {
						$all_unseen_count = $all_unseen_count + 1;
					}
				} //end loop

				if ($all_unseen_count > 0) {
					$xml_body .= '<status>Success</status>';
					$xml_body .= '<viewed_all_content>TRUE</viewed_all_content>';
				} else {
					$xml_body .= '<status>Success</status>';
					$xml_body .= '<viewed_all_content>FALSE</viewed_all_content>';
				}
			} else {
				$xml_body .= '<status>Null</status>
						  <status_message>No completed Personalized Order is available.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function pc_delete_orders()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>

					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} else {
			$query_data = array('visible' => 1);
			$update_data = $this->api_model->dbUpdateQuery($query_data, 'pc_order', "user_id = '" . $user_id . "'");

			if ($update_data) {
				$activity = 'Deleted personalized content order list';
				$this->activity_log($user_id, $activity);

				$xml_body .= '<status>Success</status>
						  	<status_message>Your saved personalized content order list has been successfully deleted.</status_message>';
			} else {
				$xml_body .= '<status>Failed</status>
						  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function


	public function pc_save_first_content_view($user_id, $data_id, $data_type = 1, $component = false)
	{
		$data_type_array = array(1, 2);
		if (!empty($user_id) && !empty($data_id) && in_array($data_type, $data_type_array)) {
			if ($data_type == 1) {
				// LESSON PLAN
				$verify_data = $this->api_model->dbSingleRowQuery('pc_order.id', 'pc_order, pc_order_details', "pc_order_details.order_id = pc_order.id AND pc_order.user_id = '" . $user_id . "' AND pc_order_details.completed_data_id = '" . $data_id . "' AND pc_order.viewed_lp = '1'");
				if (!empty($verify_data)) {
					$order_id = $verify_data['id'];
					if (!empty($order_id)) {
						$query_data = array('viewed_lp' => 2);
						$this->api_model->dbUpdateQuery($query_data, 'pc_order', "id = '" . $order_id . "' AND user_id = '" . $user_id . "'");
					}
				}
			} else {
				// TBT
				$component_array = array(1, 2, 3, 4);
				$lesson_id = $data_id;

				if (!empty($lesson_id) && in_array($component, $component_array)) {
					$verify_data = '';
					$query_data = array();

					if ($component == 1) {
						$verify_data = $this->api_model->dbSingleRowQuery('pc_order.id', 'pc_order, pc_order_details', "pc_order_details.order_id = pc_order.id AND pc_order.user_id = '" . $user_id . "' AND pc_order_details.completed_data_id = '" . $lesson_id . "' AND pc_order.viewed_tbt1 = '1' AND order_type != '1'");
						$query_data = array('viewed_tbt1' => 2);
					} elseif ($component == 2) {
						$verify_data = $this->api_model->dbSingleRowQuery('pc_order.id', 'pc_order, pc_order_details', "pc_order_details.order_id = pc_order.id AND pc_order.user_id = '" . $user_id . "' AND pc_order_details.completed_data_id = '" . $lesson_id . "' AND pc_order.viewed_tbt2 = '1' AND order_type != '1'");
						$query_data = array('viewed_tbt2' => 2);
					} elseif ($component == 3) {
						$verify_data = $this->api_model->dbSingleRowQuery('pc_order.id', 'pc_order, pc_order_details', "pc_order_details.order_id = pc_order.id AND pc_order.user_id = '" . $user_id . "' AND pc_order_details.completed_data_id = '" . $lesson_id . "' AND pc_order.viewed_tbt3 = '1' AND order_type != '1'");
						$query_data = array('viewed_tbt3' => 2);
					} elseif ($component == 4) {
						$verify_data = $this->api_model->dbSingleRowQuery('pc_order.id', 'pc_order, pc_order_details', "pc_order_details.order_id = pc_order.id AND pc_order.user_id = '" . $user_id . "' AND pc_order_details.completed_data_id = '" . $lesson_id . "' AND pc_order.viewed_tbt4 = '1' AND order_type != '1'");
						$query_data = array('viewed_tbt4' => 2);
					}

					if (!empty($verify_data)) {
						$order_id = $verify_data['id'];
						if (!empty($order_id)) {
							$this->api_model->dbUpdateQuery($query_data, 'pc_order', "id = '" . $order_id . "' AND user_id = '" . $user_id . "'");
						}
					}
				}
			}
		}
	} // End function




	public function save_feedback_rating()
	{

		$user_id = $this->entrySanitizer($this->input->get('user_id'));
		$user_id = $this->decryptGetId($user_id, 1);

		$token = $this->decryptToken($this->entrySanitizer($this->input->get('token')));
		$token_log_id = $this->decryptToken($this->entrySanitizer($this->input->get('token')), 2);
		$verify_token = $this->verifyUserToken($user_id, $token_log_id);

		$xml_body = $this->xml_header;
		$xml_body .= '<response>';

		$xml_status = 'Success';

		$rating = $this->entrySanitizer($this->input->get('rating'));

		if (empty($token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($verify_token)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($user_id)) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif ($verify_token != $token) {
			$xml_status = 'Unauthorized';
			$xml_body .= '<status>Failed</status>
					  <status_message>Token Authentication Failed</status_message>';
		} elseif (empty($rating)) {
			$xml_body .= '<status>Failed</status>
					  <status_message>Rating value must be specified</status_message>';
		} else {
			$query_data = array('user_id' => $user_id, 'rating' => $rating, 'created' => $this->globalCurrentTimeStamp);
			$data_insert = $this->api_model->dbInsertQuery($query_data, 'feedback_rating');

			if ($data_insert) {
				$xml_body .= '<status>Success</status>
						  	<status_message>Your feedback rating has been successfully saved. Thank You!.</status_message>';

				$activity = 'Saved Feedback Rating';
				$this->activity_log($user_id, $activity);
			} else {
				$xml_body .= '<status>Failed</status>
						  <status_message>Whoops! Something went wrong while processing request. Please try again shortly.</status_message>';
			}
		}

		$this->output->set_status_header($this->http_status_array[$xml_status]);

		$xml_body .= '</response>';
		$this->output->set_content_type('text/xml');
		$this->output->set_output($xml_body);
	} // End function






	//*********************** USER-DEFINED APP CRON JOB **********************//

	public function userCronCheckExpiredSubscription($user_id)
	{

		$subscription_list = $this->api_model->dbCustomMultiRowQuery("SELECT id, user_id, date_end FROM subscription WHERE date_end < '" . $this->globalCurrentDate . "' AND sub_status = 1 AND user_id = '" . $user_id . "' AND pay_status = 2");

		if (!empty($subscription_list)) {
			foreach ($subscription_list as $subscription_row) {
				$sub_id = $subscription_row['id'];
				$user_id = $subscription_row['user_id'];

				$user_data = $this->api_model->dbSingleRowQuery('email, surname, first_name', 'user, member', "user.user_id = member.user_id AND user.user_id = '" . $user_id . "'");
				$email = $user_data['email'];
				$surname = $user_data['surname'];
				$first_name = $user_data['first_name'];

				$query_data = array('sub_status' => 0);
				$this->api_model->dbUpdateQuery($query_data, 'subscription', "id = '" . $sub_id . "'");

				$this->api_model->dbDeleteQuery($sub_id, 'sub_id', 'subscription_users');

				$subject = "Your Subscription has Expired";

				$messageContent = '<p>
				<strong>Hello ' . $surname . ' ' . $first_name . '</strong>,<br /><br />
				This is to notify you that your Subscription has Expired. <br />
				 </p>';

				//$this->sendEmail($email, $subject, $messageContent);	
				$this->senderEmail($email, $subject, $messageContent);
			} //End loop
		}
	} // End function


}// End Class
