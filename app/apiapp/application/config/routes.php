<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|   $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|       my-controller/my-method -> my_controller/my_method
*/


/****** PUBLIC PAGE ROUTE *****/
$route['default_controller']                            = 'global_functions/index';
$route['temp']                            = 'global_functions/temp';



/****** V2 APP ENDPOINT ROUTE *****/
$route['api/v2']                                  = 'api_v2_controller/start';
$route['api/v2/member-login']                     = 'api_v2_controller/member_login';
$route['api/v2/member-logout']                    = 'api_v2_controller/member_logout';
$route['api/v2/member-register']                  = 'api_v2_controller/member_register';
$route['api/v2/resend-email-verification']          = 'api_v2_controller/verify_email_resend';
$route['api/v2/email-verification']               = 'api_v2_controller/verify_email_registration';
$route['api/v2/forgot-password-request']          = 'api_v2_controller/forgot_password_request';
$route['api/v2/verify-token-request']             = 'api_v2_controller/verify_url_token_request';
$route['api/v2/forgot-password-reset']            = 'api_v2_controller/forgot_password_reset';

$route['api/v2/member-profile-edit']              = 'api_v2_controller/member_profile_edit';
$route['api/v2/member-picture-upload']              = 'api_v2_controller/member_picture_upload';

$route['api/v2/member-profile']              	  = 'api_v2_controller/member_profile';
$route['api/v2/member-change-password']           = 'api_v2_controller/member_change_password';
$route['api/v2/search-lesson-plan']               = 'api_v2_controller/search_lesson_plan';
$route['api/v2/all-class']                        = 'api_v2_controller/all_class';
$route['api/v2/all-subject']                      = 'api_v2_controller/all_subject';
$route['api/v2/class-subject']                    = 'api_v2_controller/class_subject';
$route['api/v2/get-lesson-plan-image']            = 'api_v2_controller/get_lesson_plan_image';
$route['api/v2/get-innovative-image']             = 'api_v2_controller/get_innovative_content_image';
$route['api/v2/search-lesson-plan']               = 'api_v2_controller/search_lesson_plan';
$route['api/v2/class']                            = 'api_v2_controller/all_class';
$route['api/v2/subject']                          = 'api_v2_controller/all_subject';
$route['api/v2/search-innovative']                = 'api_v2_controller/search_innovative';
$route['api/v2/search-innovative-component']      = 'api_v2_controller/search_innovative_component';
$route['api/v2/search-innovative-detail']         = 'api_v2_controller/search_innovative_detail';
$route['api/v2/notification']                     = 'api_v2_controller/all_notification';
$route['api/v2/get-innovative-component']         = 'api_v2_controller/get_innovative_component';
$route['api/v2/lesson-innovative-download']       = 'api_v2_controller/lesson_innovative_download';
$route['api/v2/get-lesson-plan-data']             = 'api_v2_controller/get_lesson_plan_data';
$route['api/v2/get-innovative-data']              = 'api_v2_controller/get_innovative_data';
$route['api/v2/single-subscription-packages']     = 'api_v2_controller/single_subscription_packages';
$route['api/v2/multi-subscription-packages']      = 'api_v2_controller/multi_subscription_packages';
$route['api/v2/user-subscription']                = 'api_v2_controller/user_subscription';
$route['api/v2/create-new-subscription']          = 'api_v2_controller/create_new_subscription';
$route['api/v2/confirm-subscription-payment']     = 'api_v2_controller/confirm_subscription_payment';
$route['api/v2/add-subscription-user']            = 'api_v2_controller/add_subscription_user';
$route['api/v2/get-subscription-users']           = 'api_v2_controller/get_subscription_users';
$route['api/v2/delete-subscription-user']         = 'api_v2_controller/delete_subscription_user';
$route['api/v2/package-config']                   = 'api_v2_controller/package_config';
$route['api/v2/save-download-lesson-word'] 		  = 'api_v2_controller/save_lesson_download_word';
$route['api/v2/save-download-lesson-pdf'] 		  = 'api_v2_controller/save_lesson_download_pdf';
$route['api/v2/save-download-innovative'] 		  = 'api_v2_controller/save_innovative_download';
$route['api/v2/get-download-lesson-plan'] 		  = 'api_v2_controller/get_lesson_plan_download';
$route['api/v2/get-download-innovative-content']  = 'api_v2_controller/get_innovative_content_download';

$route['api/v2/saved-lesson-download-count'] 		= 'api_v2_controller/saved_lesson_download_count';

$route['api/v2/delete-saved-content'] 		  		= 'api_v2_controller/delete_saved_download';


$route['api/v2/save-lesson-download-satisfaction']  = 'api_v2_controller/save_lesson_download_satisfaction';
$route['api/v2/save-innovative-download-satisfaction'] 	= 'api_v2_controller/save_innovative_download_satisfaction';
$route['api/v2/get-content-satisfaction-count'] 	= 'api_v2_controller/get_content_satisfaction_count';
$route['api/v2/check-user-content-satisfaction'] 	= 'api_v2_controller/check_user_content_satisfaction';

$route['api/v2/save-personalized-content-request'] 	= 'api_v2_controller/pc_save_order';
$route['api/v2/personalized-content-cost'] 	= 'api_v2_controller/pc_cost';
$route['api/v2/personalized-content-order-list'] 	= 'api_v2_controller/pc_order_list';
$route['api/v2/personalized-content-item-list'] 	= 'api_v2_controller/pc_ordered_contents';
$route['api/v2/personalized-content-status'] 	= 'api_v2_controller/pc_ordered_content_status';

$route['api/v2/delete-personalized-content-order-list'] 	= 'api_v2_controller/pc_delete_orders';



$route['api/v2/user-newsletter-setting'] 		  		= 'api_v2_controller/user_newsletter_setting';
$route['api/v2/smart-suggestion'] 		  = 'api_v2_controller/smart_suggestion';
$route['api/v2/smart-search'] 		  = 'api_v2_controller/smart_search';

$route['api/v2/get-recent-view'] 		  = 'api_v2_controller/get_recent_view';


$route['api/v2/save-feedback-rating'] 		  = 'api_v2_controller/save_feedback_rating';





/****** ANDROID APP ENDPOINT ROUTE *****/

$route['member-login'] 									= 'api_controller/member_login';
$route['member-logout'] 								= 'api_controller/member_logout';
$route['member-register'] 								= 'api_controller/member_register';
$route['resend-register-confirm'] 						= 'api_controller/confirm_registration_resend';
$route['forgot-password'] 								= 'api_controller/forgot_password';
$route['member-profile-edit'] 							= 'api_controller/member_profile_edit';
$route['member-change-password'] 						= 'api_controller/member_change_password';
$route['search-lesson-plan'] 							= 'api_controller/search_lesson_plan';
$route['all-class'] 									= 'api_controller/all_class';
$route['all-subject'] 									= 'api_controller/all_subject';
$route['class-subject'] 								= 'api_controller/class_subject';
$route['search-innovative'] 							= 'api_controller/search_innovative';
$route['search-innovative-component'] 					= 'api_controller/search_innovative_component';
$route['search-innovative-detail'] 						= 'api_controller/search_innovative_detail';
$route['send-email'] 									= 'api_controller/send_email';
$route['all-notification'] 								= 'api_controller/all_notification';
$route['user-subscription'] 							= 'api_controller/user_subscription';
$route['lesson-download-counter-word'] 					= 'api_controller/lesson_file_download_word';
$route['lesson-download-counter-pdf'] 					= 'api_controller/lesson_file_download_pdf';
$route['email-lesson-content'] 							= 'api_controller/email_lesson_files';
$route['lesson-innovative-download'] 					= 'api_controller/lesson_innovative_download';
$route['lesson-plan-detail'] 							= 'api_controller/search_lesson_plan_detail';

$route['api/lesson-file-req'] 		  					= 'api_controller/lesson_file_req';
$route['api/lesson-file-req-save'] 		  				= 'api_controller/lesson_file_req_save';
$route['app-data'] 										= 'api_controller/app_data';
$route['logo-base64'] 									= 'api_controller/logo_base64';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
