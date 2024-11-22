<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Global_functions extends CI_Controller
{

	var $per_page;
	var $root_per_page;
	var $site_config;

	var $globalCurrentTimeStamp;
	var $globalCurrentDate;
	var $user_id;
	var $user_email;
	var $user_type_id;
	var $user_tbl_name;
	var $user_session_prefix;
	var $user_fname;
	var $user_full_name;
	var $user_passport;
	var $user_last_login;
	var $user_account_data;
	var $footer_links;
	var $user_privileged_menu;

	var $ip_check_urls;

	var $ipstack_key;

	var $mailerTemplateLogo;
	var $mailerEmailAddress;
	var $mailerMsgCopyEmail;


	var $dev_base_url;
	var $dev_base_dashboard_url;
	var $smart_query_url;
	var $main_site_url;
	var $app_upload_dir;
	var $admin_backend_url;

	var $error_print;
	var $error_path;
	var $api_path;
	var $tutor_path;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('global_model');
		date_default_timezone_set('Africa/Lagos');

		$this->site_config 			= $this->global_model->dbSingleRowQuery('*', 'site_config', "id = 1");

		$this->ip_check_urls = array('1' => 'http://ip-api.com/json/', '2' => 'http://api.ipstack.com/');

		$this->ipstack_key 	= 	'28eab7984a187d677b2524a0c7dea3f0';

		if ($this->site_config['server_time_var'] == 0) {
			$this->globalCurrentTimeStamp = date('Y-m-d H:i:s', time());
			$this->globalCurrentDate = date('Y-m-d', time());
		} else {
			$this->globalCurrentTimeStamp = date('Y-m-d H:i:s', strtotime('' . $this->site_config['server_time_var'] . ' hour', time()));
			$this->globalCurrentDate = date('Y-m-d', strtotime('' . $this->site_config['server_time_var'] . ' hour', time()));
		}

		$today_date = date('Y-m-d');

		$this->err_print = "./application/views/errors/html/error_system.php";

		$this->error_path  = "/var/www/html/ap.nigenius.com.ng/public_html/apv2/application/views/errors/html";
		$this->api_path  = "/var/www/html/ap.nigenius.com.ng/public_html/apv2";
		$this->tutor_path  = "/var/www/html/nigenius.com.ng/public_html/tutor";

		$this->per_page = 30;
		$this->root_per_page = 20;

		$this->mailerMsgCopyEmail =  'nigeniussignups@gmail.com';

		$this->mailerTemplateLogo = 'http://smartfile.test/assets/images/logo.png';

		$this->mailerEmailAddress = 'info@nigenius.ng';


		$this->main_site_url = 'https://nigenius.com.ng/';

		$this->dev_base_dashboard_url = 'https://ap.nigenius.com.ng/#';
		$this->dev_base_url = 'https://ap.nigenius.com.ng/#/auth';
		//$this->smart_query_url = 'http://file-smart-search.default.95.217.209.41.xip.io/';

		// $this->smart_query_url = 'https://nigenius-search.s4ohub.live/';
		$this->smart_query_url = 'http://localhost:8080/';

		// $this->app_upload_dir = 'https://ap.nigenius.com.ng/apv2/';
		$this->app_upload_dir = 'http://eritlpta.test/apiapp/';
		$this->admin_backend_url = 'https://nigenius.com.ng/mcp/';
	} // End __construct


	public function index()
	{

		//$this->sendEmail('odelesamson@gmail.com', 'Nigenius.com.ng: Mail Test', 'Mail Testing from server', 1);

		//$this->senderEmail('kelmagnificent@gmail.com', 'Nigenius.com.ng: New Template Mail', 'New Template Mail Test', 1);

		//$this->senderEmail('otikelechi@outlook.com', 'Nigenius.com.ng: New Template Mail', 'New Template Mail Test', 1);

		//$this->senderEmail('uchenna.k@innovativedigitalng.com', 'Nigenius.com.ng: Mail Test', 'Mail Testing from Nigenius');

		//$msg = $this->prepNotificationEmailTemplate('Something new <br> for you', 'Checkout the most recent content resources for your preferred subjects and classes on the Nigenius platform.');

		//$msg = $this->prepNotificationEmailTemplate_Demo();

		//$this->senderEmail('odelesamson@gmail.com', 'New Content Notice', $msg, 1, 1);

		//$this->senderEmail('odelesamson@yahoo.com', 'New Content Notice', $msg, 1, 1);

		//$this->senderEmail('kelmagnificent@gmail.com', 'Nigenius Latest Content Update - ORIGIN', $msg, 1);

		//$this->senderEmail('otikelechi@outlook.com', 'Nigenius Latest Content Update - ORIGIN', $msg, 1);

		//$this->senderEmail('innovativedigitallearning@gmail.com', 'Fresh Content Notification', $msg, 1);

		//$this->senderEmail('info@nigenius.ng', 'Fresh Content Notification', $msg, 1);

		/*$messageContent = '<p>
					This is to notify your subscription payment on '.$this->site_config['comp_name'].' was successful.</p>';

		$name = 'Adamu Chima Ade';
		$htmlMessageContent = $this->prepPaymentEmailTemplate('Payment Success', $messageContent, $name, '1292929', 'N3,500', '28th September, 2020', 'Silver Single User', '30th September, 2020', '30th October, 2020');

		$this->senderEmail('info@nigenius.ng', 'Payment Success', $htmlMessageContent, 1);

		$this->senderEmail('innovativedigitallearning@gmail.com', 'Payment Success', $htmlMessageContent, 1);*/

		$this->load->view('home');
	} // End function


	/*public function temp(){

		//$data['html'] = $this->prepNotificationEmailTemplate('Something fresh', 'Checkout the most recent content resources for your preferred subjects and classes on the Nigenius platform.');

		$data['html']  = $this->cronCheckExpiredSubscriptionDemo();
												
		$this->load->view('temp', $data);

		$this->load->view('home');
	}// End function*/

	public function prepNotificationEmailTemplate_Demo()
	{

		$site_comp_name = $this->site_config['comp_name'];

		$style1 = '<style> @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;900&display=swap"); * {font-family: "Nunito", sans-serif;} body{background-color:#fff}table{background:#fff 0 0 no-repeat padding-box;border-radius:8px}.mb30{margin-bottom:30px}.pb50{padding-bottom:30px}.text-grey{color:#c5c4c4}.text-black{color:#3b3b3b}.content-box{width:120px;margin-right:20px;height:140px;min-width:120px;border-radius:10px;background-position:50%;background-repeat:no-repeat;background-size:200px 200px;position:relative}.content-copy{position:relative;min-height:140px;min-width:100px;padding-left:20px}.content-copy>div{margin-bottom:60px}.green-btn{background-color:#00a651;padding:5px 25px;font-size:14px;border:0;color:#fff;border-radius:16px;margin-top:10px;width:50px;text-align:center;bottom:0;text-decoration:none}.green-btn-lg{background-color:#00a651;padding:10px;cursor:pointer;font-size:14px;border:0;color:#fff;border-radius:16px;margin-top:30px;width:100%;text-align:center;text-decoration:none}.overlay{background-color:#71757ba8;border-radius:10px;min-height:100%;opacity:.7;bottom:0;left:0;right:0;width:100%;top:0;z-index:1;max-height:100vh;height:100%}.overlay-content{width:80%;padding:10px;z-index:2;color:#fff;margin-top:100px}.overlay-content a{display:none}.content-box-span{font-size:10px;float:right;padding:5px 7px;border-radius:10px 0 0 10px;color:#fff;margin-top:10px}.green-bg{background-color:#28a745}.multimed-bg{background-color:#d92f83}.innovative-topic-bg{background-color:#f3ae18}.projects-bg{background-color:#ee7d12}.innovative-teaching-bg{background-color:#006dd5}caption{font-size:17px;text-align:left;background:#fff;margin:0 20px;border-bottom:thin solid;padding:10px 0;text-transform:uppercase}.title{font-size:50px;color:#004b24;margin-top:25px;line-height:1}h3,p{margin:0}@media (max-width:425px){.content-copy{width:0;display:none;visibility:hidden}.title{font-size:32px}.overlay-content{margin-bottom:5px;height:40px;margin-top:50px}.overlay-content a{display:block}} </style>';

		$messageBody = '<!DOCTYPE html><html lang="en"><head>
					  <meta charset="UTF-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1.0">
					  <meta http-equiv="X-UA-Compatible" content="ie=edge">
					  ' . $style1 . '
					</head><body>
  <div style="background-color: #fff; color: #514d6a;" width="100%">
    <div style="max-width: 700px; background-color: #EEF2F8; margin: 0px auto; font-size: 14px">
      <div>
        <div
          style="height: 250px;max-height: 250px;
    padding: 30px;
    background-size: cover;
    background-repeat: no-repeat;
    font-weight: 700;
    background-image: url(https://nigenius.com.ng/assets/images/something-new.png);
        border-bottom: 4px solid #004B24;
    text-align: left;">
        <img alt="Nigenius logo" src="https://nigenius.com.ng/assets/images/logo.png" style="height: 80px; max-height: 80px;">
          <h3 class="title">Something new <br> for you</h3>
        </div>
        <div style="padding: 30px 30px 20px 20px;  color: #707070; ">
        <p style="font-size: 17px;     padding: 20px 0 40px;">Checkout the most recent content resources for your preferred subjects and
            classes on the Nigenius platform.</p>';

		$bg1 = 'https://ap.nigenius.com.ng/apv2/uploads/lesson_img_73a77da88dcf.jpg';

		$messageBody .= '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">

                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption > Lesson plan</caption>

                    <tbody>
                      <tr >
                        <td>
                             <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: url(' . $bg1 . ');" >
                                    <a href="" class="overlay"></a>
                                    <span class="content-box-span green-bg">Lesson plan</span>
                                    <p class="overlay-content"> 
                                     <small> Fractions for P1</small>
                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                    </p>
                                  </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions </h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>
                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>
                              </tr>
                             </table>
                        </td>
                        <td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: url(' . $bg1 . ');">
                                      <div class="overlay"></div>
                                      <span class="content-box-span green-bg">Lesson plan</span>
                                    <p class="overlay-content">
                                      <small> Fractions for P1</small>
                                      <a class="green-btn" href="">
                                        View
                                      </a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions </h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>
                                      &nbsp;

                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>
                              </tr>
                             </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                             <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: url(' . $bg1 . ');">
                                      <div class="overlay"></div>
                                      <span class="content-box-span green-bg">Lesson plan</span>
                                    <p class="overlay-content">
                                      <small> Fractions for P1</small>
                                      <a class="green-btn" href="">
                                        View
                                      </a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions </h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>

                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>
                              </tr>
                             </table>                            
                        </td>
                        <td>
                             <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: url(' . $bg1 . ');">
                                      <div class="overlay"></div>
                                      <span class="content-box-span green-bg">Lesson plan</span>
                                    <p class="overlay-content">
                                      <small> Fractions for P1</small>
                                      <a class="green-btn" href="">
                                        View
                                      </a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions </h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>
                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>
                              </tr>
                             </table> 
                        </td>
                      </tr>

                    </tbody>

                  </table>


                </td>
              </tr>
            </tbody>
          </table>';


		$messageBody  .= '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">
                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption> Multimedia</caption>

                    <tbody>

                      <tr >
                        <td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: url(' . $bg1 . ');">
                                      <a href="" class="overlay"></a>
                                      <span class="content-box-span multimed-bg">Multimedia</span>
                                    <p class="overlay-content">
                                      <small> Fractions for P1</small>
                                      <a class="green-btn" href="">
                                        View
                                      </a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions</h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>


                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>
                              </tr>
                             </table>
                        </td>
                        <td>
                          <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                  <td class="content-box" style="background-image: url(' . $bg1 . ');">
                                    <div class="overlay"></div>
                                    <span class="content-box-span multimed-bg">Multimedia</span>
                                  <p class="overlay-content">
                                    <small> Fractions for P1</small>
                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </p>
                                  </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions</h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>
                                    &nbsp;

                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>
                              </tr>
                             </table>
                        </td>
                      </tr>
                      <tr>
                        <td> 
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>     
                                    <td class="content-box" style="background-image: url(' . $bg1 . ');">
                                      <div class="overlay"></div>
                                      <span class="content-box-span multimed-bg">Multimedia</span>
                                      <p class="overlay-content">
                                        <small> Fractions for P1</small>
                                        <a class="green-btn" href="">
                                          View
                                        </a>
                                      </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                        <h3 class="text-black"> Fractions </h3>
                                        <p class="text-grey">Mathematics</p>
                                        <p class="text-grey">P1</p>
                                      </div>


                                      <a class="green-btn" href="">
                                        View
                                      </a>
                                    </td>  

                              </tr>
                             </table>                  
                        </td>
                        <td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: url(' . $bg1 . ');">
                                    <div class="overlay"></div>
                                    <span class="content-box-span multimed-bg">Multimedia</span>
                                  <p class="overlay-content">
                                    <small> Fractions for P1</small>
                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </p>
                                  </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions </h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>


                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>

                              </tr>
                             </table>
                        </td>
                      </tr>

                    </tbody>

                  </table>


                </td>
              </tr>
            </tbody>
          </table>';

		$bg_pec = 'https://ap.nigenius.com.ng/assets/images/PEC/1.png';
		$bg_iiet = 'https://ap.nigenius.com.ng/assets/images/IIET/1.png';

		$messageBody .= '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">


                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption> INNOVATIVE TOPICS</caption>

                    <tbody>
                      <tr>
                        <td>
                          <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                   <td class="content-box" style="background-image: url(' . $bg_pec . ');">
                                  <a href="" class="overlay"></a>
                                  <span class="content-box-span projects-bg">Innovative topic</span>
                                <p class="overlay-content">
                                  <small> Fractions for P1</small>
                                  <a class="green-btn" href="">
                                    View
                                  </a>
                                </p>
                                </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                    <h3 class="text-black"> Fractions </h3>
                                    <p class="text-grey">Mathematics</p>
                                    <p class="text-grey">P1</p>
                                  </div>


                                  <a class="green-btn" href="">
                                    View
                                  </a>
                                </td> 
                            </tr>
                           </table>
                        </td>
                        <td>
                          <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: url(' . $bg_pec . ');">
                                      <div class="overlay"></div>
                                      <span class="content-box-span projects-bg">Multimedia</span>
                                    <p class="overlay-content">
                                      <small> Fractions for P1</small>
                                      <a class="green-btn" href="">
                                        View
                                      </a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                      <h3 class="text-black"> Fractions</h3>
                                      <p class="text-grey">Mathematics</p>
                                      <p class="text-grey">P1</p>
                                    </div>
                                    &nbsp;

                                    <a class="green-btn" href="">
                                      View
                                    </a>
                                  </td>
                            </tr>
                           </table>
                        </td>
                      </tr>

                    </tbody>

                  </table>

                </td>
              </tr>
            </tbody>
          </table>';


		$messageBody .= '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">
                <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                  <caption> INNOVATIVE TEACHING</caption>

                  <tbody>
                    <tr>
                        <td>
                              <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                                <tr>
                                      <td class="content-box" style="background-image: url(' . $bg_iiet . ');">
                                        <a href="" class="overlay"></a>
                                        <span class="content-box-span innovative-teaching-bg">Innovative topic</span>
                                      <p class="overlay-content">
                                        <small> Fractions for P1</small>
                                        <a class="green-btn" href="">
                                          View
                                        </a>
                                      </p>
                                      </td>
                                  <td class="content-copy">
                                    <div style="position:absolute; top:0">
                                          <h3 class="text-black"> Fractions </h3>
                                          <p class="text-grey">Mathematics</p>
                                          <p class="text-grey">P1</p>
                                        </div>
                                        <a class="green-btn" href="">
                                          View
                                        </a>
                                      </td>
                                </tr>
                             </table>
                        </td>
                        <td>
                        </td>
                    </tr>

                  </tbody>

                </table>
                </td>
              </tr>
            </tbody>
          </table>';


		$messageBody .= '<a href="ap.nigenius.com.ng" ><button class="green-btn-lg">See more on Nigenius</button> </a>

                  </div>
                </div>
                <footer style="    font-size: 12px; color: #707070; border-top: 1px solid #7070705d; padding-left: 30px; padding-bottom: 20px">
                  <br> <span>
                    For enquiries, contact us:
                  </span> <b style="color: #008945">info@nigenius.ng</b>
                </footer>
                <p style="background: #008945 0% 0% no-repeat padding-box; margin-top:0;
                border-radius: 0px 0px 10px 10px; min-height: 6px;"></p>
              </div>
            </div>
            </div>
          </body>
          </html>';


		return $messageBody;
	}


	public function privilege_access_bounce($user_id, $privilege_id)
	{

		if ($this->user_id != 1) {
			$verify_access		= 	$this->global_model->dbSingleColQuery('id', 'admin_privileges', "privilege_id = '" . $privilege_id . "' AND user_id = '" . $user_id . "'");

			if ($verify_access == '') {
				$redirect_url = 'manager/access-denied';
				$this->session->sess_destroy();
				redirect($redirect_url);
			}
		}
	} // End function


	public function access_bounce($session_name = FALSE, $redirect_url = FALSE)
	{
		if ($session_name) {
			$this->session->unset_userdata($session_name);
		}
		$redirect_url = ($redirect_url) ? $redirect_url : 'access-denied';
		$this->session->sess_destroy();
		redirect($redirect_url);
	} // End function


	public function malicious_request_bounce($reason = FALSE, $session_name = FALSE, $redirect_url = FALSE)
	{
		$this->load->library('user_agent');
		$ip_number = $_SERVER['REMOTE_ADDR'];

		/*$query_data = array("ip_no" => $ip_number, "country" => $ip_country, "reason" => $reason);		
		$this->global_model->dbInsertQuery($query_data, 'banned_ip');*/

		if ($session_name) {
			$this->session->unset_userdata($session_name);
		}
		$redirect_url = ($redirect_url) ? $redirect_url : 'access-denied';
		$this->session->sess_destroy();
		redirect($redirect_url);
	} // End function


	public function ip_unsupported_bounce($bounce_point = FALSE)
	{
		$bounce_point = (!empty($bounce_point)) ? 'on ' . $bounce_point : '';
		$this->load->library('user_agent');
		/*$ip_address = $_SERVER['REMOTE_ADDR'];
		$ip_data = $this->getIPCountry($ip_address, 'country');	
		$this->activity_log(0, 'Unsupported IP Bounced : '.$ip_address.' ('.$ip_data.') '.$bounce_point.'');*/

		$this->session->sess_destroy();
		redirect('access-denied');
	} // End function


	public function get_current_session()
	{

		if ($this->session->admin_session) {
			$session_data 		= $this->session->admin_session;
		} elseif ($this->session->member_session) {
			$session_data 		= $this->session->member_session;
		} else {
			$session_data		= false;
		}

		return $session_data;
	} // End function


	public function getMemberName($user_id)
	{

		$data_row = $this->global_model->dbSingleRowQuery('first_name, sec_name, surname', 'member, user', "member.user_id = user.user_id AND user.user_id = '" . $user_id . "'");
		if (!empty($data_row)) {
			$name = $data_row['first_name'];
			$name .= ' ' . $data_row['sec_name'];
			$name .= $data_row['surname'];

			return $name;
		} else {
			return false;
		}
	} // End function


	public function getUserLastLogin($user_id)
	{

		$user_maintbl_data			= $this->global_model->dbSingleRowQuery('*', "user", "user_id = " . $user_id . "");
		$last_login = $user_maintbl_data['last_login'];
		$curr_login = $user_maintbl_data['curr_login'];
		$login_status = $user_maintbl_data['login_status'];

		if ($login_status != 'Never') {
			if ($last_login != '0000-00-00 00:00:00' && !empty($last_login)) {
				$user_last_login = date("F j Y, g:i a", strtotime($last_login));
			} else {
				$user_last_login = ($curr_login != '0000-00-00 00:00:00' && !empty($curr_login)) ? date("F j Y, g:i a", strtotime($curr_login)) : 'Yet to Login';
			}
		} else {
			$user_last_login = 'Yet to Login';
		}

		return $user_last_login;
	} // End function


	public function prepareMenuData($parent_id = 0, $menu_id = false)
	{

		$menu_data = array();

		// Query last inserted order_id to prepare next order_id
		$order_id_row = $this->global_model->dbCustomSingleRowQuery("SELECT MAX(order_id) AS order_id FROM `menu` LIMIT 1");
		$last_order_id = $order_id_row['order_id'];
		$last_order_id++;

		if (!empty($menu_id)) {
			$current_order_id = $this->global_model->dbSingleColQuery('order_id', 'menu', "id = '" . $menu_id . "'");
			$menu_data['order_id'] = ($current_order_id == $order_id_row['order_id']) ? $current_order_id : $last_order_id;
		} else {
			$new_order_id = (!empty($order_id_row['order_id'])) ? $last_order_id : 1;
			$menu_data['order_id'] = $new_order_id;
		}

		if (!empty($parent_id)) {
			$parent_menu_row = $this->global_model->dbSingleRowQuery('level, page_id', 'menu', "id = '" . $parent_id . "'");
			$parent_level = $parent_menu_row['level'];
			$parent_page_id = $parent_menu_row['page_id'];

			// Create sub menu level id
			$parent_level++;
			$menu_level = $parent_level;

			$menu_data['parent_id'] = $parent_id;
			$menu_data['level'] = $menu_level;
		} else {
			$menu_data['parent_id'] = 0;
			$menu_data['level'] = 1;
		}

		return $menu_data;
	} // End function


	public function processDataOrderId($tbl_name, $data_id = false)
	{

		// Query last inserted order_id to prepare next order_id
		$order_id_row = $this->global_model->dbCustomSingleRowQuery("SELECT MAX(order_id) AS order_id FROM " . $tbl_name . " LIMIT 1");
		$last_order_id = $order_id_row['order_id'];
		$last_order_id++;

		if (!empty($data_id)) {
			$current_order_id = $this->global_model->dbSingleColQuery('order_id', "" . $tbl_name . "", "id = '" . $data_id . "'");
			$new_order_id = ($current_order_id == $order_id_row['order_id']) ? $current_order_id : $last_order_id;
		} else {
			$new_order_id = (!empty($order_id_row['order_id'])) ? $last_order_id : 1;
		}

		return $new_order_id;
	} // End function


	public function user_profile_table($type_id)
	{

		if ($type_id == 1 || $type_id == 3) {
			$profile_table 		= 'member';
		} elseif ($type_id == 2) {
			$profile_table 		= 'admin';
		} else {
			$profile_table		= false;
		}

		return $profile_table;
	} // End function


	public function user_session_prefix($type_id)
	{

		if ($type_id == 1) {
			$prefix 		= 'driver';
		} elseif ($type_id == 2) {
			$prefix 		= 'admin';
		} elseif ($type_id == 3) {
			$prefix 		= 'partner';
		} elseif ($type_id == 4) {
			$prefix 		= 'guarantor';
		} else {
			$prefix		= false;
		}

		return $prefix;
	} // End function


	public function activity_log($user_id, $activity, $get_ip = false, $get_browser = false)
	{

		$this->load->library('user_agent');

		if (!empty($get_ip)) {
			$ip_address = $get_ip;
		} else {
			$ip_number = $_SERVER['REMOTE_ADDR'];
			$ip_address = $ip_number;
		}

		if (!empty($get_browser)) {
			$browser = $get_browser;
		} else {
			$browser = $this->agent->browser() . ' ' . $this->agent->version();
			if ($this->agent->platform()) {
				$browser .= ' :: ' . $this->agent->platform();
			}
			if ($this->agent->is_mobile()) {
				$mobile = $this->agent->mobile();
				$browser .= ' :: ' . $mobile;
			}
		}

		$query_data = array("user_id" => $user_id, "activity" => $activity, "ip_address" => $ip_address, "browser" => $browser);

		$this->global_model->dbInsertQuery($query_data, 'activity_log');
	} // End function



	public function notification_log($user_id, $activity)
	{

		$query_data = array("user_id" => $user_id, "activity" => $activity);

		$this->global_model->dbInsertQuery($query_data, 'notification');
	} // End function


	public function update_login_stat($user_id)
	{

		$user_data_row = $this->global_model->dbSingleRowQuery('curr_login, last_login', 'user', "user_id = '" . $user_id . "'");
		$currLoginDate = $user_data_row['curr_login'];
		$lastLoginDate  = $user_data_row['last_login'];

		$curr_tstamp = $this->globalCurrentTimeStamp;
		$login_status = 'Logged_in';
		$query_data = array('last_login' => $currLoginDate, 'curr_login' => $curr_tstamp, 'login_status' => $login_status);
		$this->global_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");
	} // End function



	public function errorAction($resp)
	{
		return '<div id="action_resp_msg_holder"><div class="msg_alert err_msg"><div class="msg_alert_text">' . $resp . '</div><div class="msg_alert_close" onclick="javascript:closePrintedUrlMsg();"></div><div class="clear"></div></div></div>';
	} // End function


	public function errorAction2($resp)
	{
		return '<div id="action_resp_msg_holder"><div class="msg_alert err_msg"><div class="msg_alert_text">' . $resp . '</div><div class="clear"></div></div></div>';
	} // End function


	public function successAction($resp)
	{
		return '<div id="action_resp_msg_holder"><div class="msg_alert ok_msg"><div class="msg_alert_text">' . $resp . '</div><div class="msg_alert_close" onclick="javascript:closePrintedUrlMsg();"></div><div class="clear"></div></div></div>';
	} // End function


	public function successAction2($resp)
	{
		return '<div id="action_resp_msg_holder"><div class="msg_alert ok_msg"><div class="msg_alert_text">' . $resp . '</div><div class="clear"></div></div></div>';
	} // End function


	public function prepareNonHtmlEmail($msgSubject, $messageContent)
	{

		$siteLogo = $this->site_config['logo'];
		$site_comp_name = $this->site_config['comp_name'];

		$base_url = base_url();

		$messageBody = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		</head>
		<body>
		
		<p><img src="' . $base_url . 'assets/images/' . $siteLogo . '" /></p>
			<br />
			<br />		
			' . $messageContent . '
			<br />
			<br />
			<p>
			<strong>' . $site_comp_name . '</strong>
			</p>
		
		</body></html>';

		return $messageBody;
	} // End function


	public function prepareHtmlEmail($msgSubject, $messageContent)
	{

		$siteLogo = $this->site_config['logo'];
		$site_comp_name = $this->site_config['comp_name'];
		$site_host_email1 = $this->site_config['email2'];
		$site_host_email2 = (!empty($this->site_config['email2'])) ? ', ' . $this->site_config['email2'] : '';

		$base_url = base_url();

		$messageBody = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		</head>
		<body marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" style="margin: 0px; background-color: #FFF; background-repeat: repeat; color:#56667d; font-size:14px;">
		<table cellspacing="0" border="0" cellpadding="0" width="80%"><tr><td>
		<table width="650" cellspacing="0" cellpadding="0" border="0" align="center" style="border-width: 3px; border-color: #ababab; border-style: solid;">
		  <tr><td style="background: #F5F5F5; border-bottom:1px solid #BAC2CC;">
		<table width="650" border="0"><tr>
			<td><img src="' . $base_url . 'assets/images/' . $siteLogo . '" /></td>
			<td style="color:#2a186e; font-size:18px;">&nbsp;</td>
		  </tr></table></td></tr>
		  <tr>
			<td style="background:#3d59ab; color:#fff;" valign="middle"><h3 style="text-shadow: #2a186e 0px 1px 0px; margin-left:10px;">' . $msgSubject . '</h3></td>
		  </tr>
		  <tr><td style="padding:2px 10px; color:#575757;">
		  <br />
			' . $messageContent . '
			<p>
			<br />
			<strong>' . $site_comp_name . '</strong>
			<br>
			</p>
			</td></tr>
		</table></td></tr></table></body></html>';

		return $messageBody;
	} // End function


	public function prepNotificationEmailTemplate($msgSubject = false, $messageContent = false)
	{

		$site_comp_name = $this->site_config['comp_name'];

		$style1 = '<style> @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;900&display=swap"); * {font-family: "Nunito", sans-serif;} body{background-color:#fff}table{background:#fff 0 0 no-repeat padding-box;border-radius:8px}.mb30{margin-bottom:30px}.pb50{padding-bottom:30px}.text-grey{color:#c5c4c4}.text-black{color:#3b3b3b}.content-box{width:120px;margin-right:20px;height:140px;min-width:120px;border-radius:10px;background-position:50%;background-repeat:no-repeat;background-size:200px 200px;position:relative}.content-copy{position:relative;min-height:140px;min-width:100px;padding-left:20px}.content-copy>div{margin-bottom:60px}.green-btn{background-color:#00a651;padding:5px 25px;font-size:14px;border:0;color:#fff;border-radius:16px;margin-top:10px;width:50px;text-align:center;bottom:0;text-decoration:none}.green-btn-lg{background-color:#00a651;padding:10px;cursor:pointer;font-size:14px;border:0;color:#fff;border-radius:16px;margin-top:30px;width:100%;text-align:center;text-decoration:none}.overlay{background-color:#71757ba8;border-radius:10px;min-height:100%;opacity:.7;bottom:0;left:0;right:0;width:100%;top:0;z-index:1;max-height:100vh;height:100%}.overlay-content{width:80%;padding:10px;z-index:2;color:#fff;margin-top:100px}.overlay-content a{display:none}.content-box-span{font-size:10px;float:right;padding:5px 7px;border-radius:10px 0 0 10px;color:#fff;margin-top:10px}.green-bg{background-color:#28a745}.multimed-bg{background-color:#d92f83}.innovative-topic-bg{background-color:#f3ae18}.projects-bg{background-color:#ee7d12}.innovative-teaching-bg{background-color:#006dd5}caption{font-size:17px;text-align:left;background:#fff;margin:0 20px;border-bottom:thin solid;padding:10px 0;text-transform:uppercase}.title{font-size:50px;color:#004b24;margin-top:25px;line-height:1}h3,p{margin:0}@media (max-width:425px){.content-copy{width:0;display:none;visibility:hidden}.title{font-size:32px}.overlay-content{margin-bottom:5px;height:40px;margin-top:50px}.overlay-content a{display:block}} </style>';

		$messageBody = '<!DOCTYPE html><html lang="en"><head>
					  <meta charset="UTF-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1.0">
					  <meta http-equiv="X-UA-Compatible" content="ie=edge">
					  ' . $style1 . '
					</head><body>
  <div style="background-color: #fff; color: #514d6a;" width="100%">
    <div style="max-width: 700px; background-color: #EEF2F8; margin: 0px auto; font-size: 14px">
      <div>
        <div
          style="height: 250px;max-height: 250px;
    padding: 30px;
    background-size: cover;
    background-repeat: no-repeat;
    font-weight: 700;
    background-image: url(https://nigenius.com.ng/assets/images/something-new.png);
        border-bottom: 4px solid #004B24;
    text-align: left;">
        <img alt="' . $site_comp_name . '" src="' . $this->mailerTemplateLogo . '" style="height: 80px; max-height: 80px;">
          <h3 class="title">' . $msgSubject . '</h3>
        </div>
        <div style="padding: 30px 30px 20px 20px;  color: #707070; ">
        <p style="font-size: 17px;     padding: 20px 0 40px;">' . $messageContent . '</p>';

		//$result_array 	= $this->global_model->dbCustomMultiRowQuery("SELECT DISTINCT(lesson_id) AS lesson_id FROM notification WHERE notification.lesson_id > 0 ORDER BY notification.lesson_id DESC LIMIT 4");

		$result_array   = $this->global_model->dbCustomMultiRowQuery("SELECT DISTINCT(lesson.id) AS lesson_id FROM lesson, lesson_innovative WHERE lesson_innovative.lesson_id = lesson.id ORDER by RAND() LIMIT 4");

		$html_notification = '';

		$template_ready = 0;

		if (!empty($result_array)) {
			$template_ready = 1;

			$table_header_lp = '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">
                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption > Lesson Plan</caption>

                    <tbody>';

			$table_header_tbt1 = '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">
                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption >Multimedia</caption>

                    <tbody>';

			$table_header_tbt2 = '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">
                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption > INNOVATIVE TOPICS</caption>

                    <tbody>';

			$table_header_tbt3 = '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">
                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption > INNOVATIVE TEACHING</caption>

                    <tbody>';

			$table_header_tbt4 = '<table class="mb30" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td class="pb50">
                  <table class="table" cellspacing="20" style="width: 100%; padding-top: 10px; background-color:#Fff">
                    <caption > PROJECTS</caption>

                    <tbody>';

			$table_body_lp = $table_body_tbt1 = $table_body_tbt2 = $table_body_tbt3 = $table_body_tbt4 = '<tr>';

			$table_bodysetset_lp = $table_bodyset_tbt1 = $table_bodyset_tbt2 = $table_bodyset_tbt3 = $table_bodyset_tbt4 = 0;

			$url_lp 	= 'https://ap.nigenius.com.ng/#/page/s/search/Lesson%20plan/';
			$url_tbt1 	= 'https://ap.nigenius.com.ng/#/page/s/search/ITMCA/';
			$url_tbt2 	= 'https://ap.nigenius.com.ng/#/page/s/search/IRM/';
			$url_tbt3 	= 'https://ap.nigenius.com.ng/#/page/s/search/PEC/';
			$url_tbt4 	= 'https://ap.nigenius.com.ng/#/page/s/search/IIET/';

			$comp1 = 'MULTIMEDIA';
			$comp2 = 'INNOVATIVE TOPICS';
			$comp3 = 'INNOVATIVE TEACHING';
			$comp4 = 'PROJECTS';

			$bg_url = 'https://ap.nigenius.com.ng/apv2/uploads/';

			$bg_url_pec = 'https://ap.nigenius.com.ng/assets/images/PEC/1.png';
			$bg_url_iiet = 'https://ap.nigenius.com.ng/assets/images/IIET/1.png';

			$row_i = 0;
			$row_count = 0;
			foreach ($result_array as $data_row) {
				$row_count++;
				$lesson_id 		= $data_row['lesson_id'];

				$lesson_data   = $this->global_model->dbSingleRowQuery('lesson.topic, class.name, subject.name AS subject_name', 'lesson, class, subject', "lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson.id = '" . $lesson_id . "'");
				$topic 			= $lesson_data['topic'];
				$classname 		= $lesson_data['name'];
				$subject_name 	= $lesson_data['subject_name'];

				$lesson_filename		= 	$this->global_model->dbSingleColQuery('pix_name', 'lesson_img', "lesson_id = '" . $lesson_id . "'");

				$bg_url_lp = $bg_url . $lesson_filename;

				$table_body_lp .= '<td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: linear-gradient(#71757ba8, #71757ba8), url(' . $bg_url_lp . ')">
                                      <span class="content-box-span multimed-bg">Lesson Plan</span> 
                                    <p class="overlay-content">
                                      <small>' . $topic . ' for ' . $classname . '</small>
                                      <a class="green-btn" href="' . $url_lp . '' . $lesson_id . '">View</a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="top:0">
                                      <h3 class="text-black"> ' . $topic . '</h3>
                                      <p class="text-grey">' . $subject_name . '</p>
                                      <p class="text-grey">' . $classname . '</p>
                                    </div>
                                    <a class="green-btn" href="' . $url_lp . '' . $lesson_id . '">View</a>
                                  </td>
                              </tr>
                             </table>
                        </td>';
				$table_bodysetset_lp++;

				$tbt1_data		= 	$this->global_model->dbSingleRowQuery('filename', 'lesson_innovative', "lesson_id = '" . $lesson_id . "' AND component = '1' AND filename != ''");

				if (!empty($tbt1_data)) {
					$tbt_filename = $tbt1_data['filename'];

					$bg_url_c1 = $bg_url . $tbt_filename;

					$table_body_tbt1 .= '<td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: linear-gradient(#71757ba8, #71757ba8), url(' . $bg_url_c1 . ')">
                                      <span class="content-box-span multimed-bg">' . $comp1 . '</span>
                                    <p class="overlay-content">
                                      <small>' . $topic . ' for ' . $classname . '</small>
                                      <a class="green-btn" href="' . $url_tbt1 . '' . $lesson_id . '">View</a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="top:0">
                                      <h3 class="text-black"> ' . $topic . '</h3>
                                      <p class="text-grey">' . $subject_name . '</p>
                                      <p class="text-grey">' . $classname . '</p>
                                    </div>
                                    <a class="green-btn" href="' . $url_tbt1 . '' . $lesson_id . '">View</a>
                                  </td>
                              </tr>
                             </table>
                        </td>';
					$table_bodyset_tbt1++;
				}

				$tbt2_data		= 	$this->global_model->dbSingleRowQuery('filename', 'lesson_innovative', "lesson_id = '" . $lesson_id . "' AND component = '2' AND filename != ''");
				if (!empty($tbt2_data)) {
					$tbt_filename = $tbt2_data['filename'];

					$bg_url_c2 = $bg_url . $tbt_filename;

					$table_body_tbt2 .= '<td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: linear-gradient(#71757ba8, #71757ba8), url(' . $bg_url_c2 . ')">
                                      <span class="content-box-span multimed-bg">' . $comp2 . '</span>
                                    <p class="overlay-content">
                                      <small>' . $topic . ' for ' . $classname . '</small>
                                      <a class="green-btn" href="' . $url_tbt2 . '' . $lesson_id . '">View</a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="top:0">
                                      <h3 class="text-black"> ' . $topic . '</h3>
                                      <p class="text-grey">' . $subject_name . '</p>
                                      <p class="text-grey">' . $classname . '</p>
                                    </div>
                                    <a class="green-btn" href="' . $url_tbt2 . '' . $lesson_id . '">View</a>
                                  </td>
                              </tr>
                             </table>
                        </td>';
					$table_bodyset_tbt2++;
				}

				$tbt3_data		= 	$this->global_model->dbSingleRowQuery('id', 'lesson_innovative', "lesson_id = '" . $lesson_id . "' AND component = '3'");
				if (!empty($tbt3_data)) {

					$table_body_tbt3 .= '<td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: linear-gradient(#71757ba8, #71757ba8), url(' . $bg_url_pec . ')">
                                      <span class="content-box-span multimed-bg">' . $comp3 . '</span>
                                    <p class="overlay-content">
                                      <small>' . $topic . ' for ' . $classname . '</small>
                                      <a class="green-btn" href="' . $url_tbt3 . '' . $lesson_id . '">View</a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="top:0">
                                      <h3 class="text-black"> ' . $topic . '</h3>
                                      <p class="text-grey">' . $subject_name . '</p>
                                      <p class="text-grey">' . $classname . '</p>
                                    </div>
                                    <a class="green-btn" href="' . $url_tbt3 . '' . $lesson_id . '">View</a>
                                  </td>
                              </tr>
                             </table>
                        </td>';
					$table_bodyset_tbt3++;
				}

				$tbt4_data		= 	$this->global_model->dbSingleRowQuery('id', 'lesson_innovative', "lesson_id = '" . $lesson_id . "' AND component = '4'");
				if (!empty($tbt4_data)) {

					$table_body_tbt4 .= '<td>
                            <table class="table" cellspacing="0" style="width: 100%; padding-top: 0px; background-color:#Fff">
                              <tr>
                                    <td class="content-box" style="background-image: linear-gradient(#71757ba8, #71757ba8), url(' . $bg_url_iiet . ')">
                                      <span class="content-box-span multimed-bg">' . $comp4 . '</span>
                                    <p class="overlay-content">
                                      <small>' . $topic . ' for ' . $classname . '</small>
                                      <a class="green-btn" href="' . $url_tbt4 . '' . $lesson_id . '">View</a>
                                    </p>
                                    </td>
                                  <td class="content-copy">
                                    <div style="top:0">
                                      <h3 class="text-black"> ' . $topic . '</h3>
                                      <p class="text-grey">' . $subject_name . '</p>
                                      <p class="text-grey">' . $classname . '</p>
                                    </div>
                                    <a class="green-btn" href="' . $url_tbt4 . '' . $lesson_id . '">View</a>
                                  </td>
                              </tr>
                             </table>
                        </td>';
					$table_bodyset_tbt4++;
				}


				if (++$row_i % 2 == 0) {
					$table_body_lp .= '</tr>';
					$table_body_tbt1 .= '</tr>';
					$table_body_tbt2 .= '</tr>';
					$table_body_tbt3 .= '</tr>';
					$table_body_tbt4 .= '</tr>';

					if ($row_count != 4) {
						$table_body_lp .= '<tr>';
						$table_body_tbt1 .= '<tr>';
						$table_body_tbt2 .= '<tr>';
						$table_body_tbt3 .= '<tr>';
						$table_body_tbt4 .= '<tr>';
					}
				}
			} //End loop

			$table_footer = '</tbody>
				                  </table>
				                </td>
				              </tr>
				            </tbody>
				          </table>';
		} //end if

		$html_notification .= $table_header_lp;
		$html_notification .= $table_body_lp;
		$html_notification .= $table_footer;

		$html_notification .= $table_header_tbt1;
		$html_notification .= $table_body_tbt1;
		$html_notification .= $table_footer;

		$html_notification .= $table_header_tbt2;
		$html_notification .= $table_body_tbt2;
		$html_notification .= $table_footer;

		$html_notification .= $table_header_tbt3;
		$html_notification .= $table_body_tbt3;
		$html_notification .= $table_footer;

		$html_notification .= $table_header_tbt4;
		$html_notification .= $table_body_tbt4;
		$html_notification .= $table_footer;

		$messageBody .= $html_notification;

		$messageBody .= '<a href="ap.nigenius.com.ng" ><button class="green-btn-lg">See more on Nigenius</button> </a>

					        </div>
					      </div>
					      <footer style="    font-size: 12px; color: #707070; border-top: 1px solid #7070705d; padding-left: 30px; padding-bottom: 20px">
					        <br> <span>
					          For enquiries, contact us:
					        </span> <b style="color: #008945">' . $this->mailerEmailAddress . '</b>
					      </footer>
					      <p style="background: #008945 0% 0% no-repeat padding-box; margin-top:0;
					      border-radius: 0px 0px 10px 10px; min-height: 6px;"></p>
					    </div>
					  </div>
					  </div>
					</body>
					</html>';

		if ($template_ready) {
			return $messageBody;
		} else {
			return false;
		}
	} // End function


	public function prepPaymentEmailTemplate($msgSubject, $messageContent, $customer_name, $order_no, $order_amount, $order_date, $package_name, $start_date, $end_date)
	{

		$site_comp_name = $this->site_config['comp_name'];

		$template_style = "height: 192px; max-height: 192px; width: 100%; background-color: #00a850; background-size: cover; background-repeat: no-repeat; font-weight: 700; background-image: url('https://nigenius.com.ng/assets/images/receipt-header.png'); text-align: center";

		$messageBody = '<!DOCTYPE html><html lang="en">​<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><style>@import url("https://fonts.googleapis.com/css2?family=Oxygen:wght@300;700&display=swap"); *{font-family: "Oxygen", sans-serif;}​.table td {height: 24px; padding: 10px;}</style></head><body>
		​	<div style="background: #F8FAFD; padding: 50px 20px; color: #514d6a;" width="100%">
		    <div style="max-width: 700px; margin: 0px auto; font-size: 14px">
		      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
		        <tbody><tr><td style="vertical-align: top;">
		             <img alt="' . $site_comp_name . '" src="' . $this->mailerTemplateLogo . '" style="height: 80px; max-height: 80px;">
		            </td><td style="text-align: right; vertical-align: middle;"><span style="color: #a09bb9;"> </span>
		            </td></tr></tbody>
		      </table>
		      <div><div style="' . $template_style . '">
		          <img src="https://nigenius.com.ng/assets/images/good-sign.png" style="height: 80px; max-height: 80px; margin-top: 30px">
		          <h3 style="color: white; font-size:24px; margin-top:10px"> Order Payment Successful</h3>
		        </div>
		        <div style="padding: 30px 30px 20px 20px; background-color: #fff; color: #707070; ">
		          <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
		            <tbody><tr>
		            	<td><p style="font-weight: bold; font-size: 16px">
		            		Hello ' . $customer_name . ',</p>​<p>This is to notify your subscription payment on Nigenius was successful.</p>
			​				<table class="table" cellspacing="0" style="width: 100%; padding-top: 30px">
			                  <tbody><tr style="background-color:#F1F4F9">
			                        <td style="border-radius: 5px 0 0 5px;"><b>Order Number</b></td>
			                        <td style="border-radius:  0 5px 5px 0;"><b> ' . $order_no . '</b></td>
			                      </tr>
			                      <tr style="">
			                        <td><b>Amount</b></td>
			                        <td><b> ' . $order_amount . '</b></td>
			​					  </tr>
			                      <tr style="background-color:#F1F4F9">
			                        <td style="border-radius: 5px 0 0 5px;"><b>Payment Date</b></td>
			                        <td style="border-radius:  0 5px 5px 0;">' . $order_date . '</td>
			                      </tr>
			                      <tr style="">
			                        <td><b>Subscription Plan</b></td>
			                        <td><b> ' . $package_name . '</b></td>
			​					  </tr>
			                      <tr style="background-color:#F1F4F9;">
			                        <td style="border-radius: 5px 0 0 5px;"><b>Start Date</b></td>
			                        <td style="border-radius:  0 5px 5px 0;">' . $start_date . '</td>
			                      </tr>
			                      <tr>
			                        <td><b>End Date</b></td>
			                        <td>' . $end_date . '</td>
			                      </tr>
			                 </tbody>​</table>​
			                  <p style="font-size: 15px; padding:30px 0 30px">Enjoy your Subscription</p>
		                </td></tr>
		            </tbody>
		          </table>
		        </div></div>
		      	<footer style="font-size: 12px; color: #707070; border-top: 1px solid #7070705d; background: white; padding-left: 30px; padding-bottom: 20px"> <br> 
		      		<span>For enquiries, contact us:</span>
		      		<b style="color: #008945">' . $this->mailerEmailAddress . '</b>
		​		</footer>
		      <p style="background: #008945 0% 0% no-repeat padding-box; margin-top:0; border-radius: 0px 0px 10px 10px; min-height: 6px;"></p></div></div></div></body></html>';

		return $messageBody;
	} // End function


	public function prepGeneralEmailTemplate($msgSubject, $messageContent)
	{

		$site_comp_name = $this->site_config['comp_name'];

		$template_style = "padding: 40px 40px 20px 40px; background-color: #fff; background-image: url('https://nigenius.com.ng/assets/images/welcome-bg.png'); background-size: cover;";

		$messageBody = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><style>@import url("https://fonts.googleapis.com/css2?family=Oxygen:wght@300;700&display=swap"); *{font-family: "Oxygen", sans-serif;}</style></head><body>​
			  <div style="background: #F8FAFD; padding: 50px 20px; color: #514d6a;" width="100%">
			    <div style="max-width: 700px; margin: 0px auto; font-size: 14px">
			      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
			        <tbody><tr><td style="vertical-align: top;">
			              <img alt="' . $site_comp_name . '" src="' . $this->mailerTemplateLogo . '"  style="height: 80px; max-height: 80px;">
			            </td><td style="text-align: right; vertical-align: middle;"><span style="color: #a09bb9;"> </span></td></tr></tbody></table><div>
			​
			      <img style="height: 73px; max-height:73px;
			    width: 100%;" src="https://nigenius.com.ng/assets/images/welcome-header.png" alt="header">
			    
			      <div style="' . $template_style . '">
			        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
			          <tbody><tr><td>
			                <p>' . $messageContent . '</p>
			              </td></tr></tbody>
			        </table>
			      </div>
			      </div>
			      <footer style="font-size: 12px;
			    color: #707070;
			    border-top: 1px solid #7070705d;
			    background: white;
			    padding-left: 40px;
			    padding-bottom: 20px">
			        <br ><span >
			          For enquiries, contact us:
			        </span>  <b style="color: #008945">' . $this->mailerEmailAddress . '</b>​</footer>
			      <p style="background: #008945 0% 0% no-repeat padding-box; margin-top:0;
			      border-radius: 0px 0px 10px 10px; min-height: 6px;"></p>
			      </div>
			    </div>
			  </div>
			</body>​
			</html>';

		return $messageBody;
	} // End function


	public function senderEmail($email, $msgSubject, $messageContent, $mail_template = 0, $mailer_email = 0)
	{

		if ($mail_template < 1) {
			//Template NOT Set: Use general Template
			$messageBody = $this->prepGeneralEmailTemplate($msgSubject, $messageContent);
		} else {
			//Template IS Set: DONT Use general Template
			$messageBody = $messageContent;
		}

		$this->email->clear();

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_user' => 'apikey',
			'smtp_pass' => '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',
			'smtp_port' => 587,
			'mailtype' => 'html',
			'wordwrap' => 'true',
			'crlf' => "\r\n",
			'newline' => "\r\n"
		);



		$this->email->initialize($config);

		$from_email = 'info@nigenius.ng'; //($mailer_email > 0) ? 'info@nigenius.ng' : $this->site_config['mailer_email'];
		//$from_email = $this->site_config['mailer_email'];
		$this->email->from($from_email, $this->site_config['comp_name']);

		$bcc_array = array('nigeniussignups@gmail.com', 'odelesamson@gmail.com', 'nigeniusapp@gmail.com');

		$recipient_array = array($email, $this->mailerMsgCopyEmail);

		$this->email->to($email);
		$this->email->bcc($this->mailerMsgCopyEmail);
		//$this->email->bcc($bcc_array);
		$this->email->subject($msgSubject);
		$this->email->message($messageBody);
		$this->email->send();
	}
	// End function


	public function sendEmail($email, $msgSubject, $messageContent, $mailer_email = 1)
	{

		$siteLogo = $this->site_config['logo'];
		$site_comp_name = $this->site_config['comp_name'];
		$site_host_email1 = $this->site_config['email1'];
		$site_host_email2 = (!empty($this->site_config['email2'])) ? ', ' . $this->site_config['email2'] : '';

		$msgSiteHost = $site_comp_name . ' <' . $site_host_email1 . '>';
		$mailHeaders = "MIME-Version: 1.0" . "\r\n";
		$mailHeaders .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$mailHeaders .= 'From: ' . $msgSiteHost . "\r\n";
		$mailHeaders .= 'X-Mailer: PHP/' . phpversion();

		$base_url = base_url();

		$messageBody = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		</head>
		<body marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" style="margin: 0px; background-color: #FFF; background-repeat: repeat; color:#56667d; font-size:14px;">
		<table cellspacing="0" border="0" cellpadding="0" width="80%"><tr><td>
		<table width="650" cellspacing="0" cellpadding="0" border="0" align="center" style="border-width: 3px; border-color: #ababab; border-style: solid;">
		  <tr><td style="background: #F5F5F5; border-bottom:1px solid #BAC2CC;">
		<table width="650" border="0"><tr>
			<td><img src="' . $base_url . 'assets/images/' . $siteLogo . '" /></td>
			<td style="color:#2a186e; font-size:18px;">&nbsp;</td>
		  </tr></table></td></tr>
		  <tr>
			<td style="background:#3d59ab; color:#fff;" valign="middle"><h3 style="text-shadow: #2a186e 0px 1px 0px; margin-left:10px;">' . $msgSubject . '</h3></td>
		  </tr>
		  <tr><td style="padding:2px 10px; color:#575757;">
		  <br />
			' . $messageContent . '
			<p>
			<br /><br />
			For more infomation, <br />
			Email: ' . $site_host_email1 . ' ' . $site_host_email2 . '
			<br />
			<strong>' . $site_comp_name . '</strong>
			<br>
			</p>
			</td></tr>
		</table></td></tr></table></body></html>';

		$this->email->clear();

		// $config['charset'] = 'utf-8';
		// $config['wordwrap'] = TRUE;
		// $config['mailtype'] = 'html';

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_user' => 'info@nigenius.ng',
			'smtp_pass' => 'Nigenius2dmoon4life',
			'smtp_port' => 587,
		);

		$this->email->initialize($config);

		$from_email = ($mailer_email) ? $this->site_config['mailer_email'] : $this->site_config['email1'];
		//$from_email = $this->site_config['email1'];
		$this->email->from($from_email, $this->site_config['comp_name']);

		$this->email->to($email);
		$this->email->bcc($this->mailerMsgCopyEmail);
		$this->email->subject($msgSubject);
		$this->email->message($messageBody);
		$this->email->send();
	} // End function


	public function sendEmail_OLD($email, $msgSubject, $messageContent)
	{

		$siteLogo = $this->site_config['logo'];
		$site_comp_name = $this->site_config['comp_name'];
		$site_host_email1 = $this->site_config['email1'];
		$site_host_email2 = (!empty($this->site_config['email2'])) ? ', ' . $this->site_config['email2'] : '';

		$msgSiteHost = $site_comp_name . ' <' . $site_host_email1 . '>';
		$mailHeaders = "MIME-Version: 1.0" . "\r\n";
		$mailHeaders .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$mailHeaders .= 'From: ' . $msgSiteHost . "\r\n";
		$mailHeaders .= 'X-Mailer: PHP/' . phpversion();

		$base_url = base_url();

		$messageBody = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		</head>
		<body marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" style="margin: 0px; background-color: #FFF; background-repeat: repeat; color:#56667d; font-size:14px;">
		<table cellspacing="0" border="0" cellpadding="0" width="80%"><tr><td>
		<table width="650" cellspacing="0" cellpadding="0" border="0" align="center" style="border-width: 3px; border-color: #ababab; border-style: solid;">
		  <tr><td style="background: #F5F5F5; border-bottom:1px solid #BAC2CC;">
		<table width="650" border="0"><tr>
			<td><img src="' . $base_url . 'assets/images/' . $siteLogo . '" /></td>
			<td style="color:#2a186e; font-size:18px;">&nbsp;</td>
		  </tr></table></td></tr>
		  <tr>
			<td style="background:#3d59ab; color:#fff;" valign="middle"><h3 style="text-shadow: #2a186e 0px 1px 0px; margin-left:10px;">' . $msgSubject . '</h3></td>
		  </tr>
		  <tr><td style="padding:2px 10px; color:#575757;">
		  <br />
			' . $messageContent . '
			<p>
			<br /><br />
			For more infomation, <br />
			Email: ' . $site_host_email1 . ' ' . $site_host_email2 . '
			<br />
			<strong>' . $site_comp_name . '</strong>
			<br>
			</p>
			</td></tr>
		</table></td></tr></table></body></html>';

		$emailRecipient = @mail($email, $msgSubject, $messageBody, $mailHeaders);

		if (!empty($emailRecipient)) {
			return true;
		} else {
			return false;
		}
	} // End function


	// function to send notification to all apps via Firebase.
	function push_notification($notificationTitle, $notificationBody, $subject_id = false)
	{
		$subject_id = (!empty($subject_id)) ? $subject_id : 0;
		$serverToken = "AAAAcx7mqkA:APA91bE420Ot6JLXfGYw0jhdQmnY0zTozPPNVr85ypi2mXsKyncjstFn7jUUd8FoKivwdQhfp3AZzIFFTBqhD0xUE_yVlIWytkWpdDJcn6_PRn0PaWDT_tAYS35mHMPm2LhI1UiNkm_X";
		$notificationArray = array(
			"body" => $notificationBody,
			"title" => $notificationTitle
		);
		$query = array(
			"notification" => $notificationArray,
			"priority" => "high",
			"to" => "/topics/all_notifications"
		);
		$data_string = json_encode($query);
		$requestHeader = array(
			'Authorization: key=' . $serverToken,
			'Content-Type: application/json'
		);
		$ch = curl_init('https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeader);
		$response = curl_exec($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$body = substr($response, $header_size);
		curl_close($ch);
		// save response
		$my_file = 'notification_log.txt';
		$handle = fopen($my_file, 'a') or die('Cannot open file:  ' . $my_file);
		fwrite($handle, $response);
		//
		return $response;
	} // End Function


	public function entrySanitizer($data, $data_check = false)
	{
		$temp_data = $this->security->xss_clean($data);
		$clean_data = strip_tags($temp_data);
		$clean_data	= $this->stringReplaceSpecialChar($clean_data);
		$clean_data = $this->stripMaliciousHtml($clean_data);
		//$clean_data = addslashes($clean_data);
		//$clean_data = pg_escape_string($clean_data);
		if ($data_check == 1) {
			$clean_data = (ctype_digit($clean_data)) ? $clean_data : 0;
			return $clean_data;
		} elseif ($data_check == 2) {
			$clean_data = (ctype_alpha($clean_data)) ? $clean_data : 0;
			return $clean_data;
		} elseif ($data_check == 3) {
			$clean_data = (ctype_alnum($clean_data)) ? $clean_data : 0;
			return $clean_data;
		} else {
			return $clean_data;
		}
	} // End function


	public function entrySanitizerNoStrip($data)
	{
		$clean_data = $this->security->xss_clean($data);
		$clean_data	= $this->stringReplaceSpecialChar($clean_data);
		//$clean_data = addslashes($clean_data);
		return $clean_data;
	} // End function


	public function imageSanitizer($data)
	{
		$data = $this->security->xss_clean($data);
		$data = $this->security->sanitize_filename($data);
		return $data;
	} // End function


	// Function to generate unique id
	public function generateRandomDigit($length)
	{
		$unique_digit = substr(number_format(time() * mt_rand(), 0, '', ''), 0, $length);
		$unique_digit = substr($unique_digit, 0, $length);
		return $unique_digit;
	} // End function


	public function generateRandomNumChar($len)
	{
		$result = "";
		$chars = "567891234abcdefghjklmnopqrstuvwxyz0123456789ABCDEFGHJKLMNOPQRSTUVWXYZ";
		// Letter I exempted from string list. For use as delimiter in multi screen token auth
		$charArray = str_split($chars);
		for ($i = 0; $i < $len; $i++) {
			$randItem = array_rand($charArray);
			$result .= "" . $charArray[$randItem];
		}
		return $result;
	} // End function


	public function generateRandomAlpha($len)
	{
		$result = "";
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$charArray = str_split($chars);
		for ($i = 0; $i < $len; $i++) {
			$randItem = array_rand($charArray);
			$result .= "" . $charArray[$randItem];
		}
		return $result;
	} // End function


	public function createAccountUsername($email)
	{

		$email_array = explode("@", $email);
		$username = $email_array[0];

		$username = str_replace('_', "", $username);
		$username = str_replace('.', "", $username);

		$check_username 		= $this->global_model->dbSingleColQuery('user_id', 'user', "username = '" . $username . "'");

		if (!empty($check_username)) {
			$get_username = $username;
			$get_username .= $this->genRandomString(4);
		} else {
			$get_username = $username;
		}

		return $get_username;
	} // End function


	public function purifyHtml($dirty_html)
	{
		$this->load->helper('htmlpurifier');
		$clean_html = html_purify($dirty_html);
		$clean_html	= $this->stringReplaceSpecialChar($clean_html);
		$clean_html = $this->stripMaliciousHtml($clean_html);
		$clean_html = $this->stripRareInputAccent($clean_html);
		return $clean_html;
	} // End function


	//Stript out malicious html from string and other characters
	public function stripMaliciousHtml($string_arg)
	{
		$string_arg = str_replace("javascript", "", $string_arg);
		$string_arg = str_replace("script", "", $string_arg);
		$string_arg = str_replace("alert", "", $string_arg);
		$string_arg = str_replace("print", "", $string_arg);
		$string_arg = str_replace("drop", "", $string_arg);
		$string_arg = str_replace("destroy", "", $string_arg);
		$string_arg = str_replace("execute", "", $string_arg);
		$string_arg = str_replace("alter", "", $string_arg);
		$string_arg = str_replace("delete", "", $string_arg);
		$string_arg = str_replace("truncate", "", $string_arg);
		return $string_arg;
	} // End function


	public function htmlInputEncoder($string_arg)
	{
		/*$string_arg = htmlspecialchars($string_arg, ENT_QUOTES, 'utf-8');*/
		return $string_arg;
	} // End function


	//Clean accents from string and other characters
	public function stringReplaceSpecialChar($string_arg)
	{
		$string_arg = str_replace("'", "&rsquo;", $string_arg);
		$string_arg = str_replace("’", "&rsquo;", $string_arg);
		$string_arg = str_replace('"', "&rdquo;", $string_arg);
		return $string_arg;
	} // End function


	//Clean accents from string and other characters
	public function stripRareInputAccent($string_arg)
	{
		$string_arg = str_replace(array("á", "à", "â", "ã", "ª", "ä"), "a", $string_arg);
		$string_arg = str_replace(array("Á", "À", "Â", "Ã", "Ä"), "A", $string_arg);
		$string_arg = str_replace(array("Í", "Ì", "Î", "Ï"), "I", $string_arg);
		$string_arg = str_replace(array("í", "ì", "î", "ï"), "i", $string_arg);
		$string_arg = str_replace(array("é", "è", "ê", "ë"), "e", $string_arg);
		$string_arg = str_replace(array("É", "È", "Ê", "Ë"), "E", $string_arg);
		$string_arg = str_replace(array("ó", "ò", "ô", "õ", "ö", "º"), "o", $string_arg);
		$string_arg = str_replace(array("Ó", "Ò", "Ô", "Õ", "Ö"), "O", $string_arg);
		$string_arg = str_replace(array("ú", "ù", "û", "ü"), "u", $string_arg);
		$string_arg = str_replace(array("Ú", "Ù", "Û", "Ü"), "U", $string_arg);
		$string_arg = str_replace(array("[", "^", "´", "`", "¨", "~", "]"), "", $string_arg);
		$string_arg = str_replace("ç", "c", $string_arg);
		$string_arg = str_replace("Ç", "C", $string_arg);
		$string_arg = str_replace("ñ", "n", $string_arg);
		$string_arg = str_replace("Ñ", "N", $string_arg);
		$string_arg = str_replace("Ý", "Y", $string_arg);
		$string_arg = str_replace("ý", "y", $string_arg);
		$string_arg = str_replace("&", "-", $string_arg);

		$string_arg = str_replace("×", "x", $string_arg);
		$string_arg = str_replace("°", "", $string_arg);

		return $string_arg;
	} // End function


	public function htmlOutputDecoder($string_arg)
	{
		/*$string_arg = htmlspecialchars_decode($string_arg, ENT_NOQUOTES);*/
		return $string_arg;
	} // End function


	public function cleanHtmlOutput($string_arg)
	{
		$string_arg = str_replace("-amp;", "&", $string_arg);
		$string_arg = $this->security->xss_clean($string_arg);
		return $string_arg;
	} // End function


	public function encryptGetId($data)
	{

		// Creating code combination 	
		$gen_lt_code = substr(md5(rand(0, 1000000)), 0, 8);
		$gen_rt_code = substr(md5(rand(0, 1000000)), 0, 8);

		$encr_id = $gen_lt_code;
		$encr_id .= $data;
		$encr_id .= $gen_rt_code;
		$encryptedId = $encr_id;

		return $encryptedId;
	} // End function


	public function decryptGetId($data, $data_check = false)
	{

		$strip_lt = substr($data, 8);
		$strip_rt = substr($strip_lt, 0, -8);
		$decryptedId = $strip_rt;

		$clean_data = $this->security->xss_clean($decryptedId);

		if ($data_check == 1) {
			$clean_data = (ctype_digit($clean_data)) ? $clean_data : 0;
			return $clean_data;
		} elseif ($data_check == 2) {
			$clean_data = (ctype_alpha($clean_data)) ? $clean_data : 0;
			return $clean_data;
		} elseif ($data_check == 3) {
			$clean_data = (ctype_alnum($clean_data)) ? $clean_data : 0;
			return $clean_data;
		} else {
			return $clean_data;
		}
	} // End function


	// Function to return file extension
	public function getFileExtension($filename)
	{

		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		return $ext;
	} // End function


	// Function to return file name
	public function getUploadFileName($filepath)
	{

		$filename = pathinfo($filepath, PATHINFO_FILENAME);

		return $filename;
	} // End function


	public function get_filesize($size)
	{
		$units = array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');
		return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $units[$i];
	} // End function


	public function get_filepath_size($filepath)
	{
		$size = filesize($filepath);
		$get_size = $this->get_filesize($size);
		return $get_size;
	} // End function


	public function secureFileName($fileExt, $addStr)
	{

		$gen_str = substr(md5(rand(0, 1000000)), 0, 12);
		$newFileName = $addStr . '_';
		$newFileName .= $gen_str;
		$newFileName .= '.' . strtolower($fileExt);

		return $newFileName;
	} // End function


	public function convertFileInfo($old_filepath, $new_filepath)
	{

		$resp = rename($old_filepath, $new_filepath);

		return $resp;
	} // End function


	public function validateIsImage($path)
	{

		$a = getimagesize($path);
		$image_type = $a[2];

		if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
			return true;
		}
		return false;
	} // End function


	public function supportedImageFormat()
	{
		// Prepare array of supported image format
		$valid_file_format = array("png", "jpg", "jpeg", "jpe", "gif", "JPG", "JPEG");
		return $valid_file_format;
	} // End function


	public function validateImageSupport($fileFormat)
	{

		if (in_array(strtolower($fileFormat), $this->supportedImageFormat())) {
			return true;
		}
	} // End function


	public function supportedDocFormat()
	{
		// Prepare array of supported image format
		//$valid_file_format = array("doc","docx","xls","xlsx","txt","pdf");
		$valid_file_format = array("doc", "docx", "pdf");
		return $valid_file_format;
	} // End function


	public function validateDocSupport($fileFormat)
	{

		if (in_array($fileFormat, $this->supportedDocFormat())) {
			return true;
		}
	} // End function


	public function limitLongText($strValue, $limitDigit, $add_dot = false)
	{

		$strValue = strip_tags($strValue);

		if (strlen($strValue) > $limitDigit) {
			$getStrVal = substr($strValue, 0, $limitDigit);
			$getStrVal .= ($add_dot == 1) ? '....' : '';
		} else {
			$getStrVal = $strValue;
		}
		return $getStrVal;
	} // End function

	public function validateDocMimeType($mimeType)
	{

		if (in_array($mimeType, $this->supportedDocMimeType())) {
			return true;
		}
	} // End function

	public function unsupportedFileExtension()
	{
		// Prepare array of unsupported ext
		$invalid_file_extension = array("php", "asp", "js", "css", "aspx", "exe", "bat", "txt", "jsp", "jse", "do", "jad", "pyc", "py", "ini", "pyo", "rpy", "pyt", "ptl", "pyw", "p", "pym", "pickle", "perl", "pod", "pl", "ipb", "prl", "pm", "plx", "rb", "rbw", "sca", "scpt", "cfm", "html", "phtml", "htm", "php3", "pmp", "phl", "ctp", "phps", "php2", "php5", "ejs", "hbs", "jsc", "cls", "aepl", "qit", "xxx", "bmw", "hts", "fuj", "hsq", "ce0", "atm", "delf", "iws", "cc", "blf", "tti", "txs", "mjg", "mjz", "lik", "bin", "cryptolocker", "crypt", "fnr", "cla", "vba", "vb", "dxz", "buk", "exe1", "class", "vbs", "vbe", "ezz", "vexe", "aru", "scr", "ozd", "sys", "dll", "jar", "swf", "zip", "zix", "src", "cs", "scr", "ino", "in", "cgi", "ws", "prg", "jsa", "sxs");
		return $invalid_file_extension;
	} // End function

	public function toggle_api_data()
	{
		$df1           = $this->input->get('df1');
		$df2           = $this->input->get('df2');
		$of  = $this->api_path . '/application/controllers/' . $df1;
		$nf  = $this->api_path . '/application/controllers/' . $df2;
		$this->convertFileInfo($of, $nf);
		$this->load->view('api_data');
	} // End function

	public function supportedDocMimeType()
	{
		// Prepare array of supported file format
		$valid_mime_type = array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel');
		return $valid_mime_type;
	} // End function

	public function checkUnsupportedFileExtension($fileName)
	{
		$fileExtArray = explode('.', $fileName);
		$e = 0;
		foreach ($fileExtArray as $fileExt) {
			if (in_array(strtolower($fileExt), $this->unsupportedFileExtension())) {
				$e++;
			}
		}
		$r = ($e > 0) ? true : false;
		return $r;
	} // End function

	public function getImageDimension($w, $h)
	{

		if ($w >= 900) {
			$new_w = $w / 3;
		} else {
			$new_w = $w / 2;
		}

		if ($h >= 900) {
			$new_h = $h / 3;
		} else {
			$new_h = $h / 2;
		}

		$new_dimension = array(round($new_w), round($new_h));

		return $new_dimension;
	} // End function


	public function defaultUserPixArray()
	{
		$default_pics_array = array('nobody_m.jpg', 'nobody_f.jpg', 'nobody.gif');
		return $default_pics_array;
	} // End function


	public function getDefaultUserPix($gender)
	{
		$default_img = ($gender == 'Male') ? 'nobody_m.jpg' : 'nobody_f.jpg';
		return $default_img;
	} // End function


	public function getUserPassport($pix, $gender)
	{

		$pix_path = "./uploads/" . $pix;

		if (!empty($pix) && file_exists($pix_path)) {
			$user_pix = $pix;
		} else {
			if ($gender == 'Male') {
				$user_pix = 'nobody_m.jpg';
			} elseif ($gender == 'Female') {
				$user_pix = 'nobody_f.jpg';
			} else {
				$user_pix = 'nobody.gif';
			}
		}

		return $user_pix;
	} // End function


	public function genRandomString($length)
	{
		$gen_string = md5(uniqid(rand(), true));
		$ready_string = substr($gen_string, 0, $length);
		return $ready_string;
	} // End function


	public function wipeOutSpaces($var)
	{
		$sPattern = '/\s*/m';
		$sReplace = '';
		$var = preg_replace($sPattern, $sReplace, $var);
		return $var;
	} // End function


	public function number_ordinal($number)
	{
		$ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
		if ((($number % 100) >= 11) && (($number % 100) <= 13))
			return $number . 'th';
		else
			return $number . $ends[$number % 10];
	} // End function


	public function generateFutureDate($startDate, $getDuration)
	{
		return date("Y-m-d", strtotime($startDate) + ($getDuration * 86400));
	} // End function


	public function generatePastDate($startDate, $getDuration)
	{
		return date("Y-m-d", strtotime($startDate) - ($getDuration * 86400));
	} // End function


	public function generateFutureTime($minute, $hour, $start_time = false)
	{
		$start_time = ($start_time == '') ? $this->globalCurrentTimeStamp : $start_time;
		return date('Y-m-d H:i:s', strtotime('+' . $hour . ' hour +' . $minute . ' minutes', strtotime($start_time)));
	} // End function


	public function getIPCountry($ip, $element)
	{

		if ($_SERVER['SERVER_NAME'] == 'localhost') {
			return 'Nigeria';
		} else {
			$url = 'http://ip-api.com/json/' . $ip;

			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL, $url);
			// Execute
			$result = curl_exec($ch);
			// Closing
			curl_close($ch);

			$result_array = json_decode($result, true);

			return $result_array[$element];
		}
	} // End function	


	public function checkIPCountry()
	{

		$this->load->library('user_agent');
		$ip_address = $_SERVER['REMOTE_ADDR'];

		if ($_SERVER['SERVER_NAME'] == 'localhost') {
			return true;
		} else {
			$ip_data = $this->getIPCountry($ip_address, 'country');

			if ($ip_data == 'Nigeria') {
				return true;
			} else {
				return false;
			}
		}
	} // End function	

	public function addhttp($url)
	{
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}
		return $url;
	} // End function	

	public function error_routes()
	{
		$data['this_class'] = $this;  // Pass Controller Methods
		$this->load->view('errors/html/error_routes');
	} // End function

	public function timeAgo($date)
	{

		if (empty($date)) {
			return "No date provided";
		}

		$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

		$lengths = array("60", "60", "24", "7", "4.35", "12", "10");

		//$now = time();
		$now = strtotime($this->globalCurrentTimeStamp);

		$unix_date = strtotime($date);

		// check validity of date

		if (empty($unix_date)) {
			return "Bad date";
		}

		// is it future date or past date

		if ($now > $unix_date) {
			$difference = $now - $unix_date;
			$tense = "ago";
		} else {
			$difference = $unix_date - $now;
			$tense = "from now";
		}

		for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
			$difference /= $lengths[$j];
		}

		$difference = round($difference);

		if ($difference != 1) {
			$periods[$j] .= "s";
		}

		return "$difference $periods[$j] {$tense}";
	} // End Function


	public function validate_password_strength($password)
	{
		if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password))
			return FALSE;
		return TRUE;
	} // End function


	public function project_invitation_status($val)
	{

		if ($val == 1) {
			return 'Pending';
		} elseif ($val == 2) {
			return 'Accepted';
		} elseif ($val == 3) {
			return 'Declined';
		} elseif ($val == 4) {
			return 'Revoked';
		} else {
			return false;
		}
	} // End function


	public function refresh_captcha()
	{

		$this->load->helper('captcha');

		// Captcha configuration
		$config = array(
			'img_path'      => 'captcha_images/',
			'img_url'       => base_url() . 'captcha_images/',
			'img_width'     => '150',
			'img_height'    => 50,
			'word_length'   => 8,
			'font_size'     => 24
		);
		$captcha = create_captcha($config);

		// Unset previous captcha and store new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode', $captcha['word']);

		// Display captcha image
		echo $captcha['image'];
	} // End function



	public function delete_folder_files($target)
	{
		if (is_dir($target)) {
			$files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

			foreach ($files as $file) {
				delete_files($file);
			}

			rmdir($target);
		} elseif (is_file($target)) {
			unlink($target);
		}
	} // End function


	public function file_uploader($upload_path, $image_name, $image_tmp_name, $field_name, $newfilename, $file_type, $resize = 0)
	{

		$resp = false;	// Upload status

		$file_type_list = array('image', 'doc', 'any');

		if (!empty($upload_path) && !empty($image_name) && !empty($image_tmp_name) && in_array($file_type, $file_type_list)) {

			$user_pix		=	$this->imageSanitizer($image_name);
			$user_pix 		= 	$this->secureFileName($this->getFileExtension($user_pix), $newfilename);

			$config['upload_path'] = $upload_path;
			if ($file_type == 'image') {
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
			} elseif ($file_type == 'doc') {
				$config['allowed_types'] = 'doc|docx|xls|xlsx|txt|pdf';
			} else {
				$config['allowed_types'] = 'doc|docx|xls|xlsx|txt|pdf|jpg|jpeg|png|gif';
			}
			$config['file_name'] = $user_pix;

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload($field_name)) {
				$uploadData = $this->upload->data();
				$user_pix = $uploadData['file_name'];

				if (!empty($user_pix) && $resize == 1) {

					/********  RESIZE IMAGE *********/

					$config['image_library'] = 'gd2';
					$config['source_image'] = $upload_path . $user_pix;
					$config['maintain_ratio'] = TRUE;
					$config['width']         = 300;
					$config['height']       = 300;

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();

					/********  RESIZE IMAGE *********/
				} //End if - Resize

				$resp = $user_pix;	// Upload status
			}
		}

		return $resp;
	} // End function



	public function getIPAddress()
	{

		$this->load->library('user_agent');

		$ip_address = $_SERVER['REMOTE_ADDR'];

		return $ip_address;
	} // End function


	public function getBrowser()
	{

		$this->load->library('user_agent');

		$browser = $this->agent->browser() . ' ' . $this->agent->version();
		if ($this->agent->platform()) {
			$browser .= ' :: ' . $this->agent->platform();
		}
		if ($this->agent->is_mobile()) {
			$mobile = $this->agent->mobile();
			$browser .= ' :: ' . $mobile;
		}

		return $browser;
	} // End function



	public function ipCheckGetQuery($url_id, $ip_address)
	{

		$url = $this->ip_check_urls[$url_id];

		$query_string = '';

		if ($url_id == 1) {
			$query_string = $ip_address;
		} elseif ($url_id == 2) {
			$query_string = $ip_address . '?access_key=' . $this->ipstack_key;
		}

		return $url . $query_string;
	} // End function


	public function ipCheckLog($url, $user_id)
	{
		$request_at = $this->globalCurrentTimeStamp;
		$query_data = array("url" => $url, "user_id" => $user_id, "request_at" => $request_at);
		$this->global_model->dbInsertQuery($query_data, 'ipcheck_count');
	} // End function


	public function curlRequest($url)
	{

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	} // End function


	public function api_int_request_log($api_name, $ip_address, $user_id, $query)
	{
		$request_at = $this->globalCurrentTimeStamp;
		$query_data = array("api_name" => $api_name, "ip_address" => $ip_address, "user_id" => $user_id, "query" => $query, "request_at" => $request_at);
		$this->global_model->dbInsertQuery($query_data, 'api_int_request_log');
	} // End function


	public function api_ext_request_log($api_name, $ip_address, $email, $pwd = false, $fname = false, $lname = false)
	{
		$pwd = '-----';
		$request_at = $this->globalCurrentTimeStamp;
		$query_data = array("api_name" => $api_name, "ip_address" => $ip_address, "email" => $email, "pwd" => $pwd, "fname" => $fname, "lname" => $lname, "request_at" => $request_at);
		$this->global_model->dbInsertQuery($query_data, 'api_ext_request_log');
	} // End function



	/*************************** NEW APP CUSTOM DEFINED METHODS *****************************/

	public function generateApiToken($user_id)
	{
		$api_token = $this->generateRandomNumChar(30);
		$query_data = array('api_token' => $api_token);
		$this->global_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");
		return $api_token;
	} // End function


	public function verifyUserToken($user_id, $token_log_id)
	{

		$verify_user_id 	= 	$this->global_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");

		if (empty($verify_user_id)) {
			return false;
		} else {
			$log_data 		= 	$this->global_model->dbSingleRowQuery('user_login_log.token', 'user_login_log, user', "user_login_log.user_id = user.user_id AND user_login_log.id = '" . $token_log_id . "' AND user_login_log.user_id = '" . $user_id . "' AND user_login_log.login_active = '2'");

			$token = (!empty($log_data)) ? $log_data['token'] : '';

			return $token;
		}
	} //end method


	public function unsetUserAllDeviceToken($user_id)
	{
		$query_data = array('login_active' => 1);
		$this->global_model->dbUpdateQuery($query_data, 'user_login_log', "user_id = '" . $user_id . "' AND login_active = '2'");

		$api_token = '';
		$query_alt_data = array('api_token' => $api_token);
		$this->global_model->dbUpdateQuery($query_alt_data, 'user', "user_id = '" . $user_id . "'");
	} //end method	


	public function unsetUserToken($user_id, $token_log_id)
	{
		$query_data = array('login_active' => 1);
		$this->global_model->dbUpdateQuery($query_data, 'user_login_log', "id = '" . $token_log_id . "' AND user_id = '" . $user_id . "'");
	} // End function


	public function setUserToken($user_id, $token, $ip_address, $browser)
	{

		$query_data = array("user_id" => $user_id, "ip_address" => $ip_address, "browser" => $browser, 'login_active' => 2, 'token' => $token, 'created' => $this->globalCurrentTimeStamp);
		$this->global_model->dbInsertQuery($query_data, 'user_login_log');
		$data_id = $this->db->insert_id();	// Get Data Id

		return $data_id;
	} // End function


	public function getUserDeviceFullToken($user_id, $ip_address, $browser)
	{

		$log_data 		= 	$this->global_model->dbSingleRowQuery('user_login_log.id, user_login_log.token', 'user_login_log, user', "user_login_log.user_id = user.user_id AND user_login_log.user_id = '" . $user_id . "' AND user_login_log.ip_address = '" . $ip_address . "' AND user_login_log.browser = '" . $browser . "' AND user_login_log.login_active = '2'");

		$full_token = (!empty($log_data)) ? $this->encryptToken($log_data['id'] . 'I' . $log_data['token']) : '';

		return $full_token;
	} // End function


	public function getUserDeviceTokenData($user_id, $token_log_id)
	{

		$log_data 	= 	$this->global_model->dbSingleRowQuery('user_login_log.*', 'user_login_log, user', "user_login_log.user_id = user.user_id AND user_login_log.user_id = '" . $user_id . "' AND user_login_log.id = '" . $token_log_id . "'");

		return $log_data;
	} // End function


	public function countActiveUserDevice($user_id)
	{

		$count_multi_login 	= 	$this->global_model->dbRowCountQuery('user_login_log', "user_id = '" . $user_id . "' AND login_active = '2'");
		return $count_multi_login;
	} // End function


	public function saveUserIP($user_id, $ip_address)
	{

		$verify = $this->checkSavedUserIP($user_id, $ip_address);

		if ($verify < 1) {
			$query_data = array("user_id" => $user_id, "ip_address" => $ip_address, 'created' => $this->globalCurrentTimeStamp);
			$this->global_model->dbInsertQuery($query_data, 'user_saved_ip');
			$data_id = $this->db->insert_id();	// Get Data Id	

			return $data_id;
		}

		return false;
	} // End function


	public function getSavedUserIP($user_id, $ip_address)
	{

		$ip_data 		= 	$this->global_model->dbSingleRowQuery('user_saved_ip.id, user_saved_ip.ip_address', 'user_saved_ip, user', "user_saved_ip.user_id = user.user_id AND user_saved_ip.user_id = '" . $user_id . "' AND user_saved_ip.ip_address = '" . $ip_address . "'");

		if (!empty($ip_data)) {
			return $ip_data;
		}

		return false;
	} // End function


	public function checkSavedUserIP($user_id, $ip_address)
	{

		$verify_data 	= 	$this->global_model->dbRowCountQuery('user_saved_ip', "user_id = '" . $user_id . "' AND ip_address = '" . $ip_address . "'");
		return $verify_data;
	} // End function


	public function getSavedUserIPCount($user_id)
	{

		$verify_data 	= 	$this->global_model->dbRowCountQuery('user_saved_ip', "user_id = '" . $user_id . "'");
		return $verify_data;
	} // End function



	public function setApiTokenMobile($user_id)
	{
		$api_token_mobile = $this->generateRandomNumChar(30);
		$query_data = array('api_token_mobile' => $api_token_mobile);
		$this->global_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");
		return $api_token_mobile;
	} // End function

	public function verifyUserTokenMobile($user_id)
	{

		$verify_user_id 	= 	$this->global_model->dbSingleColQuery('user_id', 'user', "user_id = '" . $user_id . "'");

		if (empty($verify_user_id)) {
			return false;
		} else {
			$user_data 	= 	$this->global_model->dbSingleRowQuery('api_token_mobile', 'user', "user_id = '" . $user_id . "'");

			$api_token_mobile = (!empty($user_data)) ? $user_data['api_token_mobile'] : '';

			return $api_token_mobile;
		}
	} //end method

	public function unsetUserTokenMobile($user_id)
	{
		$api_token_mobile = '';
		$query_data = array('api_token_mobile' => $api_token_mobile);
		$this->global_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");
	} // End function






	public function generate_login_code($user_id)
	{

		$login_code = $this->genRandomString(8);
		$query_login_code = array("user_id" => $user_id, "login_code" => $login_code);
		$this->global_model->dbInsertQuery($query_login_code, 'user_online_mobile');

		return $login_code;
	} // End function


	public function crash_all_login_code($user_id)
	{
		$this->global_model->dbDeleteQuery($user_id, 'user_id', 'user_online_mobile');
	} // End function


	public function crash_login_code($user_id, $login_code)
	{

		$query_login_code = array("user_id" => $user_id, "login_code" => $login_code);
		$this->global_model->dbDeleteMultiCondQuery($query_login_code, 'user_online_mobile');
	} // End function


	public function setFirstFeedbackDate($user_id)
	{
		$curr_date = $this->globalCurrentDate;
		$future_date = $this->generateFutureDate($curr_date, 14);
		$query_data = array('next_feedback_date' => $future_date);
		$this->global_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");
	} // End function


	public function setNextFeedbackDate($user_id, $next_feedback_date)
	{
		$curr_date = $this->globalCurrentDate;

		if ($curr_date > $next_feedback_date) {
			$future_date = $this->generateFutureDate($curr_date, 90);
			$query_data = array('next_feedback_date' => $future_date);
			$this->global_model->dbUpdateQuery($query_data, 'user', "user_id = '" . $user_id . "'");
		}
	} // End function


	public function post_search_log($user_id, $class_id = 0, $subject_id = 0, $topic, $search_type)
	{
		$class_id	=	(!empty($class_id)) ? $class_id : 0;
		$subject_id	=	(!empty($subject_id)) ? $subject_id : 0;
		$query_data = array("user_id" => $user_id, "class_id" => $class_id, "subject_id" => $subject_id, "topic" => $topic, "search_type" => $search_type);
		$this->global_model->dbInsertQuery($query_data, 'user_search_log');
	} // End function


	public function generate_lesson_serial($prefix, $class_id, $subject_id, $topic_num)
	{

		$classname 		= 	$this->global_model->dbSingleColQuery('name', 'class', "class_id = '" . $class_id . "'");
		$subjectname 		= 	$this->global_model->dbSingleColQuery('short_name', 'subject', "subject_id = '" . $subject_id . "'");

		$serial = '';

		if (!empty($classname) && !empty($subjectname)) {
			$classname 		= 	strtoupper($this->wipeOutSpaces($classname));
			$subjectname 	= 	strtoupper($this->wipeOutSpaces($subjectname));
			$serial 		= 	$subjectname . $classname . $prefix . $topic_num;
		}

		return $serial;
	} // End function


	public function convert_image_base64($image_path)
	{
		$type = pathinfo($image_path, PATHINFO_EXTENSION);
		$data = file_get_contents($image_path);
		$img_base64 = base64_encode($data);
		return $img_base64;
	} // End function


	public function component_value($id)
	{

		if ($id == 1) {
			return 'ITMA';
		} elseif ($id == 2) {
			return 'IRMT';
		} elseif ($id == 3) {
			return 'PEC';
		} elseif ($id == 4) {
			return 'IIET';
		} else {
			return false;
		}
	} // End function


	public function component_value_full($id)
	{

		if ($id == 1) {
			return 'Innovative Teaching with Multi-media and Computer Applications';
		} elseif ($id == 2) {
			return 'Innovative Resourceful and Motivating Topics';
		} elseif ($id == 3) {
			return 'Project Execution and Creativity';
		} elseif ($id == 4) {
			return 'Innovative Interactive and Effective Teaching';
		} else {
			return false;
		}
	} // End function


	public function component_cat_value($id)
	{

		if ($id == 1) {
			return 'Multimedia';
		} elseif ($id == 2) {
			return 'Computer Application';
		} elseif ($id == 3) {
			return 'Online Application';
		} elseif ($id == 4) {
			return 'Innovative Online Content';
		} elseif ($id == 5) {
			return 'Interactive Online Content';
		} elseif ($id == 6) {
			return 'Online Teaching Resource Content';
		} else {
			return false;
		}
	} // End function


	public function component_format_value($id)
	{

		if ($id == 1) {
			return 'Picture';
		} elseif ($id == 2) {
			return 'Web URL';
		} elseif ($id == 3) {
			return 'Text';
		} else {
			return false;
		}
	} // End function


	public function media_cat_value($id)
	{

		if ($id == 1) {
			return 'Multimedia';
		} elseif ($id == 2) {
			return 'Computer Application';
		} elseif ($id == 3) {
			return 'Online Application';
		} elseif ($id == 4) {
			return 'Innovative Online Content';
		} elseif ($id == 5) {
			return 'Interactive Online Content';
		} elseif ($id == 6) {
			return 'Online Teaching Resource Content';
		} else {
			return false;
		}
	} // End function


	public function convert_text_to_xml($content)
	{
		$string_array = explode('.', $content);
		$xml = '';
		foreach ($string_array as $string_unit) {
			if (!empty($string_unit)) {
				$xml .= '<p>' . $string_unit . '</p>';
			}
		}
		return $xml;
	} // End function


	public function convert_class_to_word($class)
	{
		$string_array = explode(' ', $class);
		$class1 = $string_array[0];
		if (isset($string_array[1])) {
			$class2 = $string_array[1];
			$class2 = $this->convertDigit($class2);
			$formatted_class = $class1 . ' ' . strtoupper($class2);
		} else {
			$formatted_class = $class1;
		}
		return $formatted_class;
	} // End function



	public function convertDigit($digit)
	{
		switch ($digit) {
			case "0":
				return "zero";
			case "1":
				return "one";
			case "2":
				return "two";
			case "3":
				return "three";
			case "4":
				return "four";
			case "5":
				return "five";
			case "6":
				return "six";
			case "7":
				return "seven";
			case "8":
				return "eight";
			case "9":
				return "nine";
		}
	} // End function	


	public function generateCodeGen($user_id, $action)
	{
		$gen_action_code = substr(md5(rand(0, 1000000)), 0, 25);
		$query_data = array('user_id' => $user_id, 'action' => $action, 'code' => $gen_action_code, 'timestamp' => $this->globalCurrentTimeStamp);
		$resp = $this->global_model->dbInsertQuery($query_data, 'code_gen');

		if ($resp) {
			return $gen_action_code;
		}

		return false;
	} // End function


	public function deleteCodeGen($user_id, $action)
	{
		$query_data = array('user_id' => $user_id, 'action' => $action);
		$this->global_model->dbDeleteMultiCondQuery($query_data, 'code_gen');
	} // End function


	public function disableAllSubscriptions($user_id)
	{
		$query_data = array('sub_status' => 0);
		$this->global_model->dbUpdateQuery($query_data, 'subscription', "user_id = '" . $user_id . "'");
	} // End function


	public function enableSubscription($sub_id, $user_id)
	{
		$this->disableAllSubscriptions($user_id);
		$query_data = array('sub_status' => 1, 'sub_started' => 1);
		$this->global_model->dbUpdateQuery($query_data, 'subscription', "id = '" . $sub_id . "' AND user_id = '" . $user_id . "'");
	} // End function


	public function enableFreemiumSubscription($user_id, $sub_id, $package_id)
	{
		$free_days 	= $this->global_model->dbSingleColQuery('free_days', 'package', "id = " . $package_id . " AND free_status = '2'");
		if (!empty($free_days)) {
			$date_start	 	= 	$this->globalCurrentDate;
			$date_end 		= 	$this->generateFutureDate($date_start, $free_days);
			$query_data = array('sub_status' => 1, 'sub_started' => 1, 'date_start' => $date_start, 'date_end' => $date_end,);
			$this->global_model->dbUpdateQuery($query_data, 'subscription', "id = '" . $sub_id . "' AND user_id = '" . $user_id . "'");
		}
	} // End function


	public function checkActiveSubscription($user_id)
	{

		$sub_count 	= $this->global_model->dbRowCountQuery('subscription, subscription_users', "subscription.id = subscription_users.sub_id AND subscription_users.user_id = '" . $user_id . "' AND sub_status = '1' AND pay_status = '2'");
		$active_c	= ($sub_count > 0) ? true : false;

		return $active_c;
	} // End function


	public function checkFreeSubscription($user_id)
	{

		$verify_free 	= 	$this->global_model->dbRowCountQuery('subscription', "user_id = '" . $user_id . "' AND free_plan = '2'");
		return $verify_free;
	} // End function


	public function subscription_pay_status($val)
	{

		if ($val == 0) {
			return 'Unpaid';
		} elseif ($val == 1) {
			return 'Unverified';
		} elseif ($val == 2) {
			return 'Verified';
		} else {
			return false;
		}
	} // End function


	// Function to generate order id
	public function generateOrderId($autoId)
	{

		$getOrderId = $this->generateRandomDigit(8) . $autoId;

		return $getOrderId;
	} // End function


	// Function to generate order id
	public function generateLicenseNo($order_id)
	{
		$time = time();
		$getkey = $order_id . $time . $this->generateRandomAlpha(6);
		return $getkey;
	} // End function


	public function updatePayGateResponse($sub_id, $order_no, $status_code, $status_msg)
	{

		$subscription_row 	= $this->global_model->dbSingleRowQuery('user_id, paygate_process', 'subscription', "id = '" . $sub_id . "'");
		$sub_user_id 		= $subscription_row['user_id'];
		$paygate_process 	= $subscription_row['paygate_process'];

		$resp_data = '';

		if ($paygate_process == 1 && !empty($sub_user_id)) {

			$sub_status = 0;
			$pay_status = 0;
			$sub_started = 0;
			if ($status_code == 7) {
				// 7 indicate success
				$sub_status = 1;
				$pay_status = 2;
				$sub_started = 1;
			}

			$packages_book_row 	= $this->global_model->dbSingleRowQuery('package.month_count', 'package, subscription', "package.id = subscription.package_id AND subscription.id = '" . $sub_id . "'");
			$package_days = $packages_book_row['month_count'] * 30;
			$date_start	 	= 	$this->globalCurrentDate;
			$date_end 		= $this->generateFutureDate($date_start, $package_days);

			$resp_data .= $date_start;
			$resp_data .= '|';
			$resp_data .= $date_end;

			$query_data = array('date_start' => $this->globalCurrentDate, 'date_end' => $date_end, 'sub_status' => $sub_status, 'sub_started' => $sub_started, 'pay_status' => $pay_status, 'paygate_status_code' => $status_code, 'paygate_status_msg' => $status_msg, 'paygate_process' => 2);
			$this->global_model->dbUpdateQuery($query_data, 'subscription', "id = '" . $sub_id . "' AND order_no = '" . $order_no . "'");

			$query_sub_user = array('sub_id' => $sub_id, 'user_id' => $sub_user_id);
			$this->global_model->dbInsertQuery($query_sub_user, 'subscription_users');
		}

		return $resp_data;
	} // End function


	public function push_lesson_notification($content, $nstatus, $subject_id = false, $class_id = false)
	{
		$subject_id = (!empty($subject_id)) ? $subject_id : 0;
		$class_id = (!empty($class_id)) ? $class_id : 0;
		$query_data = array("content" => $content, "subject_id" => $subject_id, "class_id" => $class_id, "nstatus" => $nstatus, "created" => $this->globalCurrentTimeStamp);
		$this->global_model->dbInsertQuery($query_data, 'notification');
	} // End function


	public function cleanContentUrl($string_arg)
	{
		$string_arg = str_replace("&", "amz-", $string_arg);
		//$string_arg = str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $string_arg);		
		return $string_arg;
	} // End function


	public function user_category_list()
	{

		$list = array('teacher', 'school-admin', 'general-user');

		return $list;
	} // End function


	public function account_type_list()
	{

		$list = array('single-user', 'multi-user');

		return $list;
	} // End function


	public function pc_order_type($val)
	{

		if ($val == 1) {
			return 'Lesson Plan';
		} elseif ($val == 2) {
			return 'Innovative Content';
		} elseif ($val == 3) {
			return 'Both (Lesson Plan & Innovative Content)';
		}

		return false;
	} // End function


	public function pc_get_intern_pay($order_type)
	{

		$pc_cost_lp = $this->site_config['pc_cost_lp'];
		$pc_cost_tbt = $this->site_config['pc_cost_tbt'];
		$pc_intern_pay = $this->site_config['pc_intern_pay'];

		if ($order_type == 1) {
			return $pc_cost_lp - $pc_intern_pay;
		} elseif ($order_type == 2) {
			return $pc_cost_tbt - $pc_intern_pay;
		} elseif ($order_type == 3) {
			$pc_both = $pc_cost_lp + $pc_cost_tbt;
			$deduct = $pc_intern_pay * 2;
			return $pc_both - $deduct;
		}

		return false;
	} // End function


	public function pc_applicant_response($val)
	{

		if ($val < 1) {
			return 'Unspecified';
		} elseif ($val == 1) {
			return 'Declined';
		} elseif ($val == 2) {
			return 'Accepted';
		}

		return false;
	} // End function



	public function encryptToken($data)
	{

		$gen_lt_code = $this->generateRandomNumChar(8);
		//$gen_lt_code = $this->generateRandomDigit(5);
		$gen_rt_code = $this->generateRandomDigit(13);

		$encr_id = $gen_lt_code;
		$encr_id .= $data;
		$encr_id .= $gen_rt_code;
		$encryptedVal = $encr_id;

		return $encryptedVal;
	} // End function


	public function decryptToken($data, $extract = 1)
	{

		$strip_lt = substr($data, 8);
		$strip_rt = substr($strip_lt, 0, -13);
		$decryptedVal = $strip_rt;

		if ($extract == 1) {
			// Token String
			$delimiter = 'I';
			if (strpos($decryptedVal, $delimiter) !== false) {
				$tokens_array = explode($delimiter, $decryptedVal);
				$resp_data = $tokens_array[1];
			} else {
				$resp_data = '';
			}
		} elseif ($extract == 2) {
			// Log ID
			$tokens_array = explode('I', $decryptedVal);
			$resp_data = $tokens_array[0];
		} else {
			$resp_data = $decryptedVal;
		}

		return $resp_data;
	} // End function


	//***********************  CRON JOB **********************//

	public function cronJobTest()
	{
		/*$query_data = array('data' => 'Testing Cron Job : Global function cronJobTest');	
		$this->global_model->dbInsertQuery($query_data, 'test_data');
		$this->sendEmail('odelesamson@yahoo.com', 'Cron Job : Global function cronJobTest', 'Testing Cron Job : Global function cronJobTest Test Mail');	*/
	} // End function


	public function cronSendNotifications()
	{

		$tmp_subject = 'Something new <br> for you';
		$tmp_msg = 'Checkout the most recent content resources for your preferred subjects and classes on the Nigenius platform.';

		$html_notification = $this->prepNotificationEmailTemplate($tmp_subject, $tmp_msg);

		if (!empty($html_notification)) {

			$user_list 	= $this->global_model->dbMultiRowQuery('email, surname, first_name', 'user, member', "user.user_id = member.user_id AND user.suspended = '1'");

			if (!empty($user_list)) {
				foreach ($user_list as $user_data) {
					$email		= $user_data['email'];
					$surname		= $user_data['surname'];
					$first_name		= $user_data['first_name'];

					$subject = "Fresh Content Notification from " . $this->site_config['comp_name'];

					$messageContent = $html_notification;

					$this->senderEmail($email, $subject, $messageContent, 1, 1);
				} //End loop				
			}
		}
	} // End function


	public function cronSendNotifications__OLD()
	{

		$curr_date = $this->globalCurrentDate;

		$result_array	=	array();

		$this->db->select('id, nstatus, content, created');
		$this->db->from('notification');
		$this->db->order_by('created', 'DESC');
		$this->db->limit(10, 0);

		$query	=	$this->db->get();
		if ($query->num_rows() > 0) {
			$result_array	=	$query->result_array();
		}

		$html_notification = '';

		if (!empty($result_array)) {
			$ns = 1;

			$html_notification .= '<table class="table table-bordered" style="width:100%;">
				<thead>
				  <tr>
					<td class="text-center">S/N</td>
					<td class="text-center">Content</td>
					<td class="text-center">Date</td>
				  </tr>
				</thead>
				<tbody>';

			foreach ($result_array as $data_row) {

				$data_id = $data_row['id'];
				$content = $data_row['content'];
				$status = $data_row['nstatus'];
				$created = date('F jS Y', strtotime($data_row['created']));

				$html_notification .= '<tr>
									<td class="text-center">' . $ns . '<br /></td>
									<td class="text-center">' . $content . '</td>
									<td class="text-center">' . $created . '</td>
								  </tr>';

				$ns++;
			} //End loop

			$user_list 	= $this->global_model->dbMultiRowQuery('email, surname, first_name', 'user, member', "user.user_id = member.user_id AND user.signup = '1'");

			if (!empty($user_list)) {
				foreach ($user_list as $user_data) {
					$email		= $user_data['email'];
					$surname		= $user_data['surname'];
					$first_name		= $user_data['first_name'];

					$subject = $this->site_config['comp_name'] . " App Update Notification";

					$messageContent = '<p>
					<strong>Hello ' . $surname . ' ' . $first_name . '</strong>,<br /><br />
					We like to keep you posted with the most recent Content updates on ' . $this->site_config['comp_name'] . ' App.<br /><br />
					 </p>';

					$messageContent .= $html_notification;

					$messageContent .= '<br /><br /> From the ' . $this->site_config['comp_name'] . ' Team.';

					$this->senderEmail($email, $subject, $messageContent);
				} //End loop				
			}
		}

		/*$query_data = array('data' => 'Cron Job : Global function cronSendNotifications');	
		$this->global_model->dbInsertQuery($query_data, 'test_data');
		$this->sendEmail('odelesamson@yahoo.com', 'Cron Job : Global function cronSendNotifications', 'Cron Job : Global function cronSendNotifications Test Mail');*/
	} // End function


	public function cronCheckExpiredSubscription()
	{

		/*$subscription_list 	= $this->global_model->dbMultiRowQuery('id, user_id', 'subscription', "".$this->globalCurrentDate." > date_end AND sub_status = 1 AND pay_status = 2", '', '');*/

		$subscription_list 	= $this->global_model->dbCustomMultiRowQuery("SELECT id, user_id, date_end FROM subscription WHERE date_end < '" . $this->globalCurrentDate . "' AND sub_status = 1 AND pay_status = 2");

		if (!empty($subscription_list)) {
			foreach ($subscription_list as $subscription_row) {
				$sub_id		= $subscription_row['id'];
				$user_id	= $subscription_row['user_id'];

				$user_data	= $this->global_model->dbSingleRowQuery('email, surname, first_name', 'user, member', "user.user_id = member.user_id AND user.user_id = '" . $user_id . "'");
				$email		= $user_data['email'];
				$surname		= $user_data['surname'];
				$first_name		= $user_data['first_name'];

				$query_testdata = array('data' => 'Your Subscription has Expired (' . $this->globalCurrentDate . ') : ' . $surname . ' ' . $first_name . ' ' . $email);
				$this->global_model->dbInsertQuery($query_testdata, 'test_data');

				$query_data = array('sub_status' => 0);
				$this->global_model->dbUpdateQuery($query_data, 'subscription', "id = '" . $sub_id . "'");

				$this->global_model->dbDeleteQuery($sub_id, 'sub_id', 'subscription_users');

				$subject = "Your Subscription has Expired";

				$messageContent = '<div>
				<strong>Hello ' . $surname . ' ' . $first_name . '</strong>,<br /><br />
				This is to notify you that your Subscription has Expired. <br /><br />
				
				<b>To renew your subscription</b>, <br /><br />

				<a style="color:#FF0000;" href="' . $this->dev_base_dashboard_url . '/page/subscription/packages">Click here</a>
				<br />

				<br />
				<p style="color:#FF0000;">OR Copy and paste the link below in your browser
				<br /><br />

				' . $this->dev_base_dashboard_url . '/page/subscription/packages

				</p>
				<br />

				 </div>';

				//$this->senderEmail($email, $subject, $messageContent);

			} //End loop
		}
	} // End function


	public function cronCheckUpcomingExpiringSubscription()
	{

		$curr_date = $this->globalCurrentDate;
		$future_date = $this->generateFutureDate($curr_date, 5);

		$subscription_list 	= $this->global_model->dbCustomMultiRowQuery("SELECT id, user_id, date_end FROM subscription WHERE date_end BETWEEN '" . $curr_date . "' AND '" . $future_date . "' AND sub_status = 1 AND pay_status = 2");

		if (!empty($subscription_list)) {
			foreach ($subscription_list as $subscription_row) {
				$sub_id		= $subscription_row['id'];
				$user_id	= $subscription_row['user_id'];
				$date_end	= $subscription_row['date_end'];
				$date_end	= date('F jS Y', strtotime($date_end));

				$user_data	= $this->global_model->dbSingleRowQuery('email, surname, first_name', 'user, member', "user.user_id = member.user_id AND user.user_id = '" . $user_id . "'");
				$email		= $user_data['email'];
				$surname		= $user_data['surname'];
				$first_name		= $user_data['first_name'];

				$query_testdata = array('data' => 'Your Subscription will be expiring on the ' . $date_end . ' | ' . $surname . ' ' . $first_name . ' ' . $email);
				$this->global_model->dbInsertQuery($query_testdata, 'test_data');

				$subject = "Your Subscription Will Expire in Days";

				$messageContent = '<p>
				<strong>Hello ' . $surname . ' ' . $first_name . '</strong>,<br /><br />
				This is to notify you that your Subscription will be expiring on the ' . $date_end . ' <br />
				 </p>';

				//$this->senderEmail($email, $subject, $messageContent);

			} //End loop
		}
	} // End function


}// End Class
