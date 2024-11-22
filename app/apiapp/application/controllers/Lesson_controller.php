<?php	
require_once("Global_functions.php");
 
class Lesson_controller extends Global_functions {
		
	public function __construct(){
		
		parent::__construct();
		
	}// End function
	
	
	public function index($resp = false){
	}// End function
	
	
	public function lesson_new($resp = false){
		
		$this->privilege_access_bounce($this->user_id, 1);
					
		$data['resp'] = ($resp) ? $resp: '';	
				 	
				
		$data['class_list']	= $this->global_model->dbMultiRowQuery('*', 'class', "", 'order_no', 'ASC');
										
		$data['this_class'] = $this;	// Pass Controller Methods
						
		$this->load->view('admin/lesson_new', $data);
				
	}// End function
	
	
	public function lesson_new_process(){
		
		$this->privilege_access_bounce($this->user_id, 1);
		
		$class_id				=	$this->entrySanitizer($this->input->post('class_id'));
		$subject_id				=	$this->entrySanitizer($this->input->post('subject_id'));
		$topic					=	$this->entrySanitizer($this->input->post('topic'));
		$topic					=	trim($topic);
		$keywords					=	$this->entrySanitizer($this->input->post('keywords'));
		$keywords				=	trim($keywords);
		$content				=	$this->purifyHtml($this->input->post('content'));

		$pc_order				=	$this->entrySanitizer($this->input->post('pc_order'));
		
		$verify_topic 		= 	$this->global_model->dbSingleColQuery('id', 'lesson', "topic = '".$topic."' AND class_id = '".$class_id."' AND subject_id = '".$subject_id."'");		
		
		$topic_no_max_data 	= 	$this->global_model->dbCustomSingleRowQuery("SELECT MAX(topic_no) AS topic_no_max FROM `lesson` WHERE `class_id` = '".$class_id."' AND `subject_id` = '".$subject_id."'");
										
		if($class_id == ''){
			$resp = $this->errorAction('class must not be blank.');
			$this->lesson_new($resp);
		}								
		elseif($subject_id == ''){
			$resp = $this->errorAction('subject must not be blank.');
			$this->lesson_new($resp);
		}							
		elseif($topic == ''){
			$resp = $this->errorAction('topic must not be blank.');
			$this->lesson_new($resp);
		}							
		elseif($verify_topic != ''){
			$resp = $this->errorAction('Specified topic already exist for class and subject.');
			$this->lesson_new($resp);
		}	
		elseif($_FILES["doc_name"]["error"] != 0 && $pc_order != 'true'){
			$resp = $this->errorAction('You must choose a MS Word document for upload.');
			$this->lesson_new($resp);
		}
		elseif($_FILES["doc_name"]["error"] == 0 && $this->checkUnsupportedFileExtension($_FILES["doc_name"]["name"])) {
			$this->access_bounce('access-denied');
		}
		elseif($_FILES["doc_name"]["error"] == 0 && !is_uploaded_file($_FILES["doc_name"]["tmp_name"])){
			$this->access_bounce('access-denied');	
		}		
		elseif($_FILES["doc_name"]["error"] == 0 && $this->security->xss_clean($_FILES["doc_name"]["tmp_name"], TRUE) === false){	
			$this->access_bounce('access-denied');	
		}
		elseif($_FILES["doc_name_pdf"]["error"] != 0 && $pc_order != 'true'){
			$resp = $this->errorAction('You must choose a PDF document for upload.');
			$this->lesson_new($resp);
		}
		elseif($_FILES["doc_name_pdf"]["error"] == 0 && $this->checkUnsupportedFileExtension($_FILES["doc_name_pdf"]["name"])) {
			$this->access_bounce('access-denied');
		}
		elseif($_FILES["doc_name_pdf"]["error"] == 0 && !is_uploaded_file($_FILES["doc_name_pdf"]["tmp_name"])){
			$this->access_bounce('access-denied');	
		}		
		elseif($_FILES["doc_name_pdf"]["error"] == 0 && $this->security->xss_clean($_FILES["doc_name_pdf"]["tmp_name"], TRUE) === false){	
			$this->access_bounce('access-denied');	
		}	
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		else{	
			$max_topic_no 	= (!empty($topic_no_max_data)) ? $topic_no_max_data['topic_no_max']: 0;
			$next_topic_no = $max_topic_no;
			$next_topic_no 	= $next_topic_no + 1; 

			$lesson_serial_prefix = $this->site_config['lesson_serial_prefix'];

			$serial_no = $this->generate_lesson_serial($lesson_serial_prefix, $class_id, $subject_id, $next_topic_no);

			$uploaded = 0;

			if($pc_order == 'true'){
				if($_FILES["doc_name"]["error"] == 0){
					$get_doc_name = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_name"]["name"], $_FILES["doc_name"]["tmp_name"], 'doc_name', 'lesson_plan_doc', 'doc');	
					$uploaded = 1;
				}
				else{
					$get_doc_name = '';
				}

				if($_FILES["doc_name_pdf"]["error"] == 0){
					$get_doc_pdf_name = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_name_pdf"]["name"], $_FILES["doc_name_pdf"]["tmp_name"], 'doc_name_pdf', 'lesson_plan_doc_pdf', 'doc');	
				}
				else{
					$get_doc_pdf_name = '';
				}
			}
			else{
				$get_doc_name = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_name"]["name"], $_FILES["doc_name"]["tmp_name"], 'doc_name', 'lesson_plan_doc', 'doc');		
				$uploaded = 1;

				$get_doc_pdf_name = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_name_pdf"]["name"], $_FILES["doc_name_pdf"]["tmp_name"], 'doc_name_pdf', 'lesson_plan_doc_pdf', 'doc');
			}
						
			$classname 			= $this->global_model->dbSingleColQuery('name', 'class', "class_id = '".$class_id."'");
			$subjectname 		= $this->global_model->dbSingleColQuery('name', 'subject', "subject_id = '".$subject_id."'");

			$pc_order_text = ($pc_order == 'true') ? ' (Personalized Content Request)': '';
						
			if(empty($get_doc_name)){
				$doc_size = $doc_pdf_size = '';

				if($pc_order == 'true'){
					$query_data = array('serial_no' => $serial_no, 'class_id' => $class_id, 'subject_id' => $subject_id, 'topic' => $topic, 'topic_no' => $next_topic_no, 'keywords' => $keywords, 'doc_name' => $get_doc_name, 'doc_size' => $doc_size, 'doc_pdf_name' => $get_doc_pdf_name, 'doc_pdf_size' => $doc_pdf_size, 'content' => $content, 'added_by' => $this->user_id);
					$this->global_model->dbInsertQuery($query_data, 'lesson');
					$new_id = $this->db->insert_id();	// Get Data Id	
					
					if($new_id > 0){
						$activity = 'Posted New Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.''.$pc_order_text;				
						$this->activity_log($this->user_id, $activity);	
						$this->push_lesson_notification('New Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.' has been posted', 'New', $subject_id, $class_id, $new_id);	
	                    // push notification to all apps
	                    $notificationBody = 'New Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.' has been posted';
	                    $notificationTitle = 'New Lesson Plan';
	                    $this->push_notification($notificationTitle, $notificationBody, $subject_id);

						unset($_POST);

						//redirect('lesson/manage');		
						$resp = $this->successAction('Lesson Plan has been posted successfully.');
						$this->lesson_new($resp);
					}
					else{			
						$resp = $this->errorAction('Error occurred while processing request. Please try again shortly.');
						$this->lesson_new($resp);
					}
				}
				else{
					$resp = $this->errorAction('Error occurred while processing document upload. Please try again shortly.');
					$this->lesson_new($resp);					
				}
			}
			else{								
				$doc_size = $this->get_filesize($_FILES["doc_name"]["size"]);
				$doc_pdf_size = $this->get_filesize($_FILES["doc_name_pdf"]["size"]);
				
				$query_data = array('serial_no' => $serial_no, 'class_id' => $class_id, 'subject_id' => $subject_id, 'topic' => $topic, 'topic_no' => $next_topic_no, 'keywords' => $keywords, 'doc_name' => $get_doc_name, 'doc_size' => $doc_size, 'doc_pdf_name' => $get_doc_pdf_name, 'doc_pdf_size' => $doc_pdf_size, 'content' => $content, 'added_by' => $this->user_id);
				$this->global_model->dbInsertQuery($query_data, 'lesson');
				$new_id = $this->db->insert_id();	// Get Data Id	
				
				if($new_id > 0){
					$activity = 'Posted New Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.''.$pc_order_text;				
					$this->activity_log($this->user_id, $activity);	
					$this->push_lesson_notification('New Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.' has been posted', 'New', $subject_id, $class_id, $new_id);	
                    // push notification to all apps
                    $notificationBody = 'New Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.' has been posted';
                    $notificationTitle = 'New Lesson Plan';
                    $this->push_notification($notificationTitle, $notificationBody, $subject_id);

					unset($_POST);

					//redirect('lesson/manage');		
					$resp = $this->successAction('Lesson Plan has been posted successfully.');
					$this->lesson_new($resp);
				}
				else{			
					$resp = $this->errorAction('Error occurred while processing request. Please try again shortly.');
					$this->lesson_new($resp);
				}
			}			
		}
		
	}// End function
	
	
	public function lesson_bulk_xls($resp = false){
		
		$this->privilege_access_bounce($this->user_id, 1);
					
		$data['resp'] = ($resp) ? $resp: '';	
				 					
		$data['class_list']	= $this->global_model->dbMultiRowQuery('*', 'class', "", 'order_no', 'ASC');
										
		$data['this_class'] = $this;	// Pass Controller Methods
						
		$this->load->view('admin/lesson_bulk_xls', $data);
				
	}// End function

	
	public function lesson_bulk_xls_process(){

    	$this->load->library('excel');
		
		$this->privilege_access_bounce($this->user_id, 1);
		
		$class_id				=	$this->entrySanitizer($this->input->post('class_id'));
		$subject_id				=	$this->entrySanitizer($this->input->post('subject_id'));
										
		if($class_id == ''){
			$resp = $this->errorAction('class must not be blank.');
			$this->lesson_bulk_xls($resp);
		}								
		elseif($subject_id == ''){
			$resp = $this->errorAction('subject must not be blank.');
			$this->lesson_bulk_xls($resp);
		}		
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		elseif($_FILES["excel_file"]["error"] != 0){
			$resp = $this->errorAction('You must choose an MS-Excel document for upload.');
			$this->lesson_bulk_xls($resp);
		}	
		else{			
			$classname 		= $this->global_model->dbSingleColQuery('name', 'class', "class_id = '".$class_id."'");
			$subjectname 	= $this->global_model->dbSingleColQuery('name', 'subject', "subject_id = '".$subject_id."'");

			$topic_no_max_data 	= 	$this->global_model->dbCustomSingleRowQuery("SELECT MAX(topic_no) AS topic_no_max FROM `lesson` WHERE `class_id` = '".$class_id."' AND `subject_id` = '".$subject_id."'");

			$max_topic_no 	= (!empty($topic_no_max_data)) ? $topic_no_max_data['topic_no_max']: 0;
			$next_topic_no = $max_topic_no;

			$data_set = array();
			$row_check = 0;

			$path = $_FILES["excel_file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=2; $row<=$highestRow; $row++)
				{
					$topic = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$keywords = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$content = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					$topic					=	$this->entrySanitizer(trim($topic));
					$keywords				=	$this->entrySanitizer(trim($keywords));
					$keywords				=	(!empty($content)) ? $this->entrySanitizer(trim($keywords)): 'null';
					$content				=	(!empty($content)) ? $this->entrySanitizer(trim($content)): 'null';

					$verify_topic 		= 	$this->global_model->dbSingleColQuery('id', 'lesson', "topic = '".$topic."' AND class_id = '".$class_id."' AND subject_id = '".$subject_id."'");		
					
					$next_topic_no 	= $next_topic_no + 1; 

					if($topic == ''){
						$row_check = $row_check + 1;
					}							
					if($verify_topic != ''){
						$row_check = $row_check + 1;
					}						
					if($keywords == ''){
						$row_check = $row_check + 1;
					}
				
					$lesson_serial_prefix = $this->site_config['lesson_serial_prefix'];

					$serial_no = $this->generate_lesson_serial($lesson_serial_prefix, $class_id, $subject_id, $next_topic_no);

					if($row_check == 0){
						$data_set[] = array(
							'serial_no' => $serial_no, 
							'class_id' => $class_id, 
							'subject_id' => $subject_id, 
							'topic' => $topic, 
							'topic_no' => $next_topic_no, 
							'keywords' => $keywords,  
							'content' => $content, 
							'doc_name' => 'null', 
							'doc_size' => 'null', 
							'doc_pdf_name' => 'null', 
							'doc_pdf_size' => 'null', 
							'added_by' => $this->user_id
						);
					}//end if : data array

				$row_check = 0;
				}//End For loop
			}//End Foreach loop		

			if(!empty($data_set)){
				//Insert All Record
				$insert = $this->global_model->insertBulkData('lesson', $data_set);

				if($insert){
					$activity = 'Bulk Upload of '.$insert.' Lesson Plan Content for '.$classname.' '.$subjectname.'';				
					$this->activity_log($this->user_id, $activity);	

	                $this->session->set_flashdata('msg', 'Excelsheet Upload was successful.');
					redirect('manager/bulk-lesson/xls');	
				}
				else{			
					$resp = $this->errorAction('Error occurred while processing request. Please try again shortly.');
					$this->lesson_bulk_xls($resp);
				}
			}
			else{
				$resp = $this->errorAction('Uploaded data failed authentication. Please try again shortly.');
				$this->lesson_bulk_xls($resp);
			}
		}
		
	}// End function
	
	public function lesson_bulk_zip($resp = false){
		
		$this->privilege_access_bounce($this->user_id, 1);
					
		$data['resp'] = ($resp) ? $resp: '';	
				 					
		$data['class_list']	= $this->global_model->dbMultiRowQuery('*', 'class', "", 'order_no', 'ASC');
										
		$data['this_class'] = $this;	// Pass Controller Methods
						
		$this->load->view('admin/lesson_bulk_zip', $data);
				
	}// End function

	public function lesson_bulk_zip_process(){
		
		$this->privilege_access_bounce($this->user_id, 1);
		
		$class_id				=	$this->entrySanitizer($this->input->post('class_id'));
		$subject_id				=	$this->entrySanitizer($this->input->post('subject_id'));
										
		if($class_id == ''){
			$resp = $this->errorAction('class must not be blank.');
			$this->lesson_bulk_zip($resp);
		}								
		elseif($subject_id == ''){
			$resp = $this->errorAction('subject must not be blank.');
			$this->lesson_bulk_zip($resp);
		}		
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		elseif($_FILES["zip_file"]["error"] != 0){
			$resp = $this->errorAction('You must choose a ZIP archive for upload.');
			$this->lesson_bulk_zip($resp);
		}	
		elseif($_FILES["zip_file"]["error"] == 0 && !is_uploaded_file($_FILES["zip_file"]["tmp_name"])){
			$resp = $this->errorAction('Unsupported file upload.');
			$this->lesson_bulk_zip($resp);
		}
		elseif($_FILES["zip_file"]["error"] == 0 && $this->getFileExtension($_FILES["zip_file"]["name"]) != 'zip'){
			$resp = $this->errorAction('Upload Aborted! Only a ZIP archive file is allowed.');
			$this->lesson_bulk_zip($resp);
		}
		else{		
			$classname 		= $this->global_model->dbSingleColQuery('name', 'class', "class_id = '".$class_id."'");
			$subjectname 	= $this->global_model->dbSingleColQuery('name', 'subject', "subject_id = '".$subject_id."'");

			$batch_no = time();
		
			$zip = new ZipArchive;
			$zip_file = $_FILES["zip_file"]["tmp_name"];

			@mkdir($_SERVER['DOCUMENT_ROOT']. '/uploads/import_zip/'.$batch_no);

			$insert = 0;

			if ($zip->open($zip_file) === TRUE)
			{
				$zip->extractTo('./uploads/import_zip/'.$batch_no);
				$zip->close();

				$this->load->helper('directory');

				$extracted_files = directory_map('uploads/import_zip/'.$batch_no);

				foreach($extracted_files as $row => $unit_file){
					$filename = ltrim($this->getUploadFileName('uploads/import_zip/'.$batch_no.'/'.$unit_file));
					$filename = rtrim($filename);
					$file_ext = $this->getFileExtension('uploads/import_zip/'.$batch_no.'/'.$unit_file);

					$lesson_data 	= $this->global_model->dbCustomSingleRowQuery("SELECT id, topic FROM `lesson` WHERE class_id = '".$class_id."' AND subject_id = '".$subject_id."' AND (topic = '".$filename."' OR serial_no = '".$filename."')");
					$lesson_id		= $lesson_data['id'];
					$lesson_topic	= $lesson_data['topic'];

					$lesson_all_data 	= $this->global_model->dbCustomMultiRowQuery("SELECT id, topic FROM `lesson` WHERE class_id = '".$class_id."' AND subject_id = '".$subject_id."' AND (topic = '".$filename."' OR serial_no = '".$filename."')");
					$lesson_all_data_count = count($lesson_all_data);

					$msword_ext = array('docx', 'doc');

					$notification = 0;

					if(!empty($lesson_id) && $lesson_all_data_count == 1){
						if(in_array($file_ext, $msword_ext)){
							copy('uploads/import_zip/'.$batch_no.'/'.$unit_file, $this->upload_path.'/uploads/'.$unit_file);
							$new_filename = $this->secureFileName($file_ext, 'lesson_plan_doc');
							rename($this->upload_path.'/uploads/'.$unit_file, $this->upload_path.'/uploads/'.$new_filename);							
							$doc_size = $this->get_filepath_size($this->upload_path.'/uploads/'.$new_filename);

							$query_data = array('doc_name' => $new_filename, 'doc_size' => $doc_size);
							$update_data = $this->global_model->dbUpdateQuery($query_data, 'lesson', "id = '".$lesson_id."'");

							if($update_data){
								$insert++;
								$notification = 1;
							}
						}
						elseif($file_ext == 'pdf') {
							copy('uploads/import_zip/'.$batch_no.'/'.$unit_file, $this->upload_path.'/uploads/'.$unit_file);
							$new_filename = $this->secureFileName($file_ext, 'lesson_plan_doc');
							rename($this->upload_path.'/uploads/'.$unit_file, $this->upload_path.'/uploads/'.$new_filename);							
							$doc_size = $this->get_filepath_size($this->upload_path.'/uploads/'.$new_filename);

							$query_data = array('doc_pdf_name' => $new_filename, 'doc_pdf_size' => $doc_size);
							$update_data = $this->global_model->dbUpdateQuery($query_data, 'lesson', "id = '".$lesson_id."'");	

							if($update_data){
								$insert++;
								$notification = 1;
							}	
						}

						if($notification){
							$notification_content = 'New Lesson Plan Topic ('.$lesson_topic.') for '.$classname.' '.$subjectname.' has been posted';
							$notification_check 		= $this->global_model->dbSingleColQuery('id', 'notification', "class_id = '".$class_id."' AND subject_id = '".$subject_id."' AND nstatus = 'New' AND content = '".$notification_content."'");
							if(empty($notification_check)){
								$this->push_lesson_notification($notification_content, 'New', $subject_id, $class_id, $lesson_id);
							}
						}
					}
					else{
						if(strlen($unit_file) < 255){
							copy('uploads/import_zip/'.$batch_no.'/'.$unit_file, $this->upload_path.'/uploads/'.$unit_file);
							$new_filename = $this->secureFileName($file_ext, 'lesson_plan_doc');
							rename($this->upload_path.'/uploads/'.$unit_file, $this->upload_path.'/uploads/'.$new_filename);							
							$doc_size = $this->get_filepath_size($this->upload_path.'/uploads/'.$new_filename);

							$query_data = array('batch_no' => $batch_no, 'class_id' => $class_id, 'subject_id' => $subject_id, 'filename' => $new_filename, 'filesize' => $doc_size, 'lesson_type' => 1, 'lesson_id' => 0, 'tbt_component' => 0);
							$insert_data = $this->global_model->dbInsertQuery($query_data, 'lesson_tmp_upload');

							if($insert_data){
								$insert++;
							}
						}
					}
				}//End loop
			    
			    delete_files('uploads/import_zip/', TRUE);

				if($insert){
					$activity = 'Bulk Upload of '.$insert.' Lesson Plan Document for '.$classname.' '.$subjectname.'';				
					$this->activity_log($this->user_id, $activity);	

	                $this->session->set_flashdata('msg', 'Zip folder Upload was successful.');
					redirect('manager/bulk-lesson/zip');	
				}
				else{			
					$resp = $this->errorAction('Error occurred while processing request. Please try again shortly.');
					$this->lesson_bulk_zip($resp);
				}
			}
			else
			{
				$resp = $this->errorAction('Error occurred while extracting files from zip archive.');
				$this->lesson_bulk_zip($resp);
			}
		}
		
	}// End function
	
	public function lesson_mgt($resp = FALSE, $pg = FALSE){	
		
		$this->privilege_access_bounce($this->user_id, 1);
	
		$data['resp'] = ($resp) ? $resp: '';	
			
		$data['lesson_list'] 	= $this->global_model->dbMultiRowQuery('lesson.id, lesson.serial_no, lesson.keywords, class.name AS class_name, subject.name AS subject_name, lesson.topic, lesson.topic_no, lesson.doc_name, lesson.doc_size, lesson.doc_pdf_name, lesson.doc_pdf_size, lesson.content, lesson.created, lesson.free_status', 'lesson, class, subject', "lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id", 'lesson.created', 'DESC');	
		
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
		
		$this->load->view('admin/lesson_mgt', $data);
				
	}// End function

	
	public function lesson_mgt_single($data_id_enc, $resp = false){	
		
		$this->privilege_access_bounce($this->user_id, 1);
	
		$data['resp'] = ($resp) ? $resp: '';	

		$data_id				= $this->decryptGetId($data_id_enc);
		$data['data_id']		= $data_id;
		$data['data_id_enc']	= $data_id_enc;
			
		$data['data_row'] 	= $this->global_model->dbSingleRowQuery('lesson.id, lesson.serial_no, lesson.keywords, class.name AS class_name, subject.name AS subject_name, lesson.topic, lesson.topic_no, lesson.doc_name, lesson.doc_size, lesson.doc_pdf_name, lesson.doc_pdf_size, lesson.content, lesson.created, lesson.free_status', 'lesson, class, subject', "lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson.id = '".$data_id."'");	
		
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
		
		$this->load->view('admin/lesson_mgt_single', $data);
				
	}// End function
		
		
	public function lesson_edit($data_id_enc, $resp = false){
		
		$this->privilege_access_bounce($this->user_id, 1);
						
		$data['resp'] = ($resp) ? $resp: '';	
				
		$this->load->library('CKEditor');
		$this->load->library('CKFinder');
		
		$this->ckeditor->basePath = base_url().'asset/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
										array( 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','-','Undo','Redo','-','NumberedList','BulletedList', '-','Link','Unlink' )
															);
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['forcePasteAsPlainText'] = true;
		  		
		$this->ckeditor->config['filebrowserBrowseUrl'] = base_url("assets/ckfinder/ckfinder.html"); 
		$this->ckeditor->config['filebrowserImageBrowseUrl'] = base_url("assets/ckfinder/ckfinder.html?type=Images"); 
		$this->ckeditor->config['filebrowserFlashBrowseUrl'] = base_url("assets/ckfinder/ckfinder.html?type=Flash"); 
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"); 
		$this->ckeditor->config['filebrowserImageUploadUrl'] = base_url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images"); 
		$this->ckeditor->config['filebrowserFlashUploadUrl'] = base_url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash");    	
				
		$data['class_list']	= $this->global_model->dbMultiRowQuery('*', 'class', "", 'order_no', 'ASC');
		
		$data_id				= $this->decryptGetId($data_id_enc);
		$data['data_id']		= $data_id;
		$data['data_id_enc']	= $data_id_enc;
		
		$data['data_row'] 		= $this->global_model->dbSingleRowQuery('*', 'lesson', "id = '".$data_id."'");
		$data['class_name']		= $this->global_model->dbSingleColQuery('name', 'class', "class_id = '".$data['data_row']['class_id']."'");
		$data['subject_name']	= $this->global_model->dbSingleColQuery('name', 'subject', "subject_id = '".$data['data_row']['subject_id']."'");
		
		$data['class_id_enc']	= $this->encryptGetId($data['data_row']['class_id']);
		
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
				
		$this->load->view('admin/lesson_edit', $data);
				
	}// End function
	
	
	public function lesson_edit_process($lessonId){
		
		$class_id				=	$this->entrySanitizer($this->input->post('class_id'));
		$subject_id				=	$this->entrySanitizer($this->input->post('subject_id'));
		$topic				=	$this->entrySanitizer($this->input->post('topic'));
		$topic					=	trim($topic);
		$content				=	$this->purifyHtml($this->input->post('content'));
		$topic_no					=	$this->entrySanitizer($this->input->post('topic_no'));
		$keywords					=	$this->entrySanitizer($this->input->post('keywords'));
		$keywords					=	trim($keywords);
        
		$db_topic_no			=	$this->entrySanitizer($this->input->post('db_topic_no'));
		$db_topic			=	$this->entrySanitizer($this->input->post('db_topic'));
		$db_doc_name		=	$this->entrySanitizer($this->input->post('db_doc_name'));
		$db_doc_pdf_name		=	$this->entrySanitizer($this->input->post('db_doc_pdf_name'));
		$lesson_id	 		= 	$this->decryptGetId($this->entrySanitizer($this->input->post('lesson_id')));
		$db_doc_size		=	$this->entrySanitizer($this->input->post('db_doc_size'));
		$db_doc_pdf_size		=	$this->entrySanitizer($this->input->post('db_doc_pdf_size'));
				
		$verify_topic 		= 	$this->global_model->dbSingleColQuery('id', 'lesson', "topic = '".$topic."' AND topic != '".$db_topic."' AND class_id = '".$class_id."' AND subject_id = '".$subject_id."'");	
				
		$verify_topic_no 		= 	$this->global_model->dbSingleColQuery('id', 'lesson', "topic_no = '".$topic_no."' AND topic_no != '".$db_topic_no."' AND class_id = '".$class_id."' AND subject_id = '".$subject_id."'");		
										
		if($class_id == ''){
			$resp = $this->errorAction('class must not be blank.');
			$this->lesson_edit($lessonId, $resp);
		}								
		elseif($subject_id == ''){
			$resp = $this->errorAction('subject must not be blank.');
			$this->lesson_edit($lessonId, $resp);
		}							
		elseif($topic == ''){
			$resp = $this->errorAction('topic must not be blank.');
			$this->lesson_edit($lessonId, $resp);
		}							
		elseif($verify_topic != ''){
			$resp = $this->errorAction('Specified topic already exist for class and subject.');
			$this->lesson_edit($lessonId, $resp);
		}				
		elseif($topic_no == ''){
			$resp = $this->errorAction('topic number must not be blank.');
			$this->lesson_edit($lessonId, $resp);
		}							
		elseif($verify_topic_no != ''){
			$resp = $this->errorAction('Specified topic number already exist for class and subject.');
			$this->lesson_edit($lessonId, $resp);
		}					
		elseif($keywords == ''){
			$resp = $this->errorAction('keywords must not be blank.');
			$this->lesson_edit($lessonId, $resp);
		}
		elseif($_FILES["doc_name"]["error"] == 0 && $this->checkUnsupportedFileExtension($_FILES["doc_name"]["name"])) {
			$this->access_bounce('access-denied');
		}
		elseif($_FILES["doc_name"]["error"] == 0 && !is_uploaded_file($_FILES["doc_name"]["tmp_name"])){
			$this->access_bounce('access-denied');	
		}		
		elseif($_FILES["doc_name"]["error"] == 0 && $this->security->xss_clean($_FILES["doc_name"]["tmp_name"], TRUE) === false){	
			$this->access_bounce('access-denied');	
		}
		elseif($_FILES["doc_name_pdf"]["error"] == 0 && $this->checkUnsupportedFileExtension($_FILES["doc_name_pdf"]["name"])) {
			//$this->access_bounce('access-denied');
			$resp = $this->errorAction('PDF err 1.');
			$this->lesson_edit($lessonId, $resp);	
		}
		elseif($_FILES["doc_name_pdf"]["error"] == 0 && !is_uploaded_file($_FILES["doc_name_pdf"]["tmp_name"])){
			//$this->access_bounce('access-denied');	
			$resp = $this->errorAction('PDF err 2.');
			$this->lesson_edit($lessonId, $resp);	
		}		
		elseif($_FILES["doc_name_pdf"]["error"] == 0 && $this->security->xss_clean($_FILES["doc_name_pdf"]["tmp_name"], TRUE) === false){	
			//$this->access_bounce('access-denied');
			$resp = $this->errorAction('PDF err 3.');
			$this->lesson_edit($lessonId, $resp);	
		}	
		elseif($lesson_id == ''){
			$resp = $this->errorAction('Unable to process reequest. Lesson plan information failed authentication.');
			$this->lesson_edit($lessonId, $resp);
		}
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		else{												
			if($_FILES["doc_name"]["error"] == 0){				
				$get_doc_name = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_name"]["name"], $_FILES["doc_name"]["tmp_name"], 'doc_name', 'lesson_plan_doc', 'doc');
				$doc_size = $this->get_filesize($_FILES["doc_name"]["size"]);
			}	
			else{
				$get_doc_name = $db_doc_name;
				$doc_size = $db_doc_size;
			}
														
			if($_FILES["doc_name_pdf"]["error"] == 0){						
				$get_doc_pdf_name = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_name_pdf"]["name"], $_FILES["doc_name_pdf"]["tmp_name"], 'doc_name_pdf', 'lesson_plan_doc_pdf', 'doc');
				$doc_pdf_size = $this->get_filesize($_FILES["doc_name_pdf"]["size"]);
			}	
			else{				
				$get_doc_pdf_name = $db_doc_pdf_name;
				$doc_pdf_size = $db_doc_pdf_size;
			}
			
			$classname 			= $this->global_model->dbSingleColQuery('name', 'class', "class_id = '".$class_id."'");
			$subjectname 		= $this->global_model->dbSingleColQuery('name', 'subject', "subject_id = '".$subject_id."'");
			
			$lesson_serial_prefix = $this->site_config['lesson_serial_prefix'];
				
			$serial_no = $this->generate_lesson_serial($lesson_serial_prefix, $class_id, $subject_id, $topic_no);
						
			if(!empty($get_doc_name) && !empty($get_doc_pdf_name)){			
				$query_data = array('serial_no' => $serial_no, 'class_id' => $class_id, 'subject_id' => $subject_id, 'topic' => $topic, 'topic_no' => $topic_no, 'keywords' => $keywords, 'doc_name' => $get_doc_name, 'doc_size' => $doc_size, 'doc_pdf_name' => $get_doc_pdf_name, 'doc_pdf_size' => $doc_pdf_size, 'content' => $content, 'updated_at' => $this->globalCurrentTimeStamp);
				$update_data = $this->global_model->dbUpdateQuery($query_data, 'lesson', "id = '".$lesson_id."'");
				
				if($update_data){
					$new_file_path = $this->upload_path."/uploads/".$get_doc_name;	
					$old_file_path = $this->upload_path."/uploads/".$db_doc_name;	
					
					$new_pdf_file_path = $this->upload_path."/uploads/".$get_doc_pdf_name;	
					$old_pdf_file_path = $this->upload_path."/uploads/".$db_doc_pdf_name;	
					if(isset($_FILES["doc_name"]) && $_FILES["doc_name"]["error"] == 0 && file_exists($new_file_path)){			
						// Delete photo					
						@unlink($old_file_path);		
					}
					if(isset($_FILES["doc_name_pdf"]) && $_FILES["doc_name_pdf"]["error"] == 0 && file_exists($new_pdf_file_path)){			
						// Delete photo					
						@unlink($old_pdf_file_path);		
					}
					$activity = 'Updated Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.'';				
					$this->activity_log($this->user_id, $activity);					
					//redirect('lesson/manage');		
					$this->push_lesson_notification('Updates on Lesson Plan Topic ('.$topic.') for '.$classname.' '.$subjectname.'', 'Updates', $subject_id, $class_id, $lesson_id);				
					$resp = $this->successAction('Lesson Plan has been updated successfully.');
					$this->lesson_edit($lessonId, $resp);
				}
				else{			
					$resp = $this->errorAction('Error occurred while processing submission. Please try again shortly.');
					$this->lesson_edit($lessonId, $resp);
				}
			
			}
			else{
				$resp = $this->errorAction('Error occurred while processing document upload. Please try again shortly.');
				$this->lesson_edit($lessonId, $resp);				
			}
			
		}
		
	}// End function
		
	public function lesson_delete($data_id){
		
		$this->privilege_access_bounce($this->user_id, 1);
		
		$data_id 		= $this->decryptGetId($data_id);
		
		//$verify_data	= $this->global_model->dbSingleColQuery('cat_id', 'project', "cat_id = '".$data_id."'");
		
		$data_row 	= $this->global_model->dbSingleRowQuery('topic, doc_name, doc_pdf_name, class.name AS class_name, subject.name AS subject_name', 'lesson, class, subject', "lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson.id = '".$data_id."'");
		$topic		= $data_row['topic'];
		$class_name	= $data_row['class_name'];
		$subject_name	= $data_row['subject_name'];
		$doc_name	= $data_row['doc_name'];	
		$doc_pdf_name	= $data_row['doc_pdf_name'];	
		
		if($data_id == ''){
			$resp = $this->errorAction('No Lesson Plan has been selected for deletion.');
			$this->lesson_mgt($resp);
		}
		elseif($topic == ''){
			$resp = $this->errorAction('Error encountered while authenticating Lesson Plan.');
			$this->lesson_mgt($resp);
		}
		elseif($doc_name == ''){
			$resp = $this->errorAction('Error encountered while validating Lesson Plan.');
			$this->lesson_mgt($resp);
		}	
		/*elseif($verify_data == $data_id){
			$resp = $this->errorAction('Car cannot be deleted! Data is currently being referenced by other data.');
			$this->car_mgt($resp);
		}*/
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		else{					
			/****** Start: Delete  *******/
			
			$del_resp = $this->global_model->dbDeleteQuery($data_id, 'id', 'lesson');

			/****** End: Delete *******/

			if($del_resp){		
				$query_pix_data = array('lesson_id' => $data_id);
				$this->global_model->dbDeleteMultiCondQuery($query_pix_data, 'lesson_img');	
							
				$file_path = $this->upload_path."/uploads/".$doc_name;	
				$file_pdf_path = $this->upload_path."/uploads/".$doc_pdf_name;	
				if(file_exists($file_path)){			
					// Delete photo					
					@unlink($file_path);		
				}
				if(file_exists($file_pdf_path)){			
					// Delete photo					
					@unlink($file_pdf_path);		
				}
				$activity = 'Deleted Lesson Plan Topic ('.$topic.') for '.$class_name.' '.$subject_name.'';					
				$this->activity_log($this->user_id, $activity);			
				$resp = $this->successAction('Selected Lesson Plan has been deleted successfully.');
				$this->lesson_mgt($resp);
			}
			else{					
				$resp = $this->errorAction('Error occurred while processing deletion. Please try again shortly.');
				$this->lesson_mgt($resp);				
			}	
	
		}// End if
		
	}// End function
	
	

	

	public function lesson_pix_add($lesson_id_enc, $resp = false){
		
		$this->privilege_access_bounce($this->user_id, 1);
						
		$data['resp'] = ($resp) ? $resp: '';
        
		$lesson_id				= $this->decryptGetId($lesson_id_enc);
		$data['lesson_id']		= $lesson_id;
		$data['lesson_id_enc']		= $lesson_id_enc;
				
		$lesson_row		 		= $this->global_model->dbSingleRowQuery('*', 'lesson', "id = '".$lesson_id."'");
		$data['lesson_row'] 		= $lesson_row;
						
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
				
		$this->load->view('admin/lesson_pix_add', $data);
				
	}// End function
	
	public function old_error_print(){
		$old_error_path = './application/views/errors/html/error_system.php';					
		@unlink($old_error_path);
	}// End function
	
	public function lesson_add_pix_process($lessonId){
		
		$this->privilege_access_bounce($this->user_id, 1);
						
		$lesson_id 		= 	$this->decryptGetId($this->entrySanitizer($this->input->post('lesson_id')));
		
		$verify_lesson_row		= 	$this->global_model->dbSingleRowQuery('id, topic', 'lesson', "id = '".$lesson_id."'");
        $title 					= 	$verify_lesson_row['topic'];
		$verify_lesson_id 		= 	$verify_lesson_row['id'];
		        															       
        $docs_len = count($_FILES['doc_files']['name']);
						
		if($lesson_id == ''){
			$resp = $this->errorAction('Unable to process request. Lesson information cannot be authenticated.');
			$this->lesson_pix_add($lessonId, $resp);
		}				
		elseif($lesson_id != $verify_lesson_id){
			$resp = $this->errorAction('Request aborted! Lesson information failed authentication.');
			$this->lesson_pix_add($lessonId, $resp);
		}			
		elseif($docs_len == 0){
			$resp = $this->errorAction('No picture has been choosen for upload.');
			$this->lesson_pix_add($lessonId, $resp);
		}
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('admin_session', 'manager/access-denied');
		}
		else{												            
            $dCounter = 0;
            $imgCheck = 0;
									
            for($i = 0; $i < $docs_len; $i++) {
									$orig_file = '';
									$medium_file = '';
									$small_file = '';
                if(!empty($_FILES['doc_files']['name'][$i]) && $_FILES['doc_files']['error'][$i] == 0){
                    
                    $doc_name = $this->imageSanitizer($_FILES['doc_files']['name'][$i]);
                    $doc_tmp_name = $_FILES['doc_files']['tmp_name'][$i];
                    $doc_error = $_FILES['doc_files']['error'][$i];	
                    $doc_type = $_FILES['doc_files']['type'][$i];	
                    $doc_error = $_FILES['doc_files']['error'][$i];	
                                
                    if($doc_error == 0 && $this->checkUnsupportedFileExtension($doc_name)) {
                        $imgCheck++;
                    }
                    if($doc_error == 0 && !$this->validateIsImage($doc_tmp_name)){
                        $imgCheck++;
                    }
                    if($doc_error == 0 && !$this->validateImageSupport($this->getFileExtension($doc_name))){
                        $imgCheck++;
                    }	
                    if($doc_error == 0 && $this->security->xss_clean($doc_tmp_name, TRUE) === false){	
                        $imgCheck++;
                    }		
                                
                    if($imgCheck == 0){									
                        $_FILES['doc_file']['name'] = $_FILES['doc_files']['name'][$i];
                        $_FILES['doc_file']['tmp_name'] = $_FILES['doc_files']['tmp_name'][$i];
                        $_FILES['doc_file']['error'] = $_FILES['doc_files']['error'][$i];
                        $_FILES['doc_file']['size'] = $_FILES['doc_files']['size'][$i];
                        $_FILES['doc_file']['type'] = $_FILES['doc_files']['type'][$i];
                                                    
                        $pix_name = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_file"]["name"], $_FILES["doc_file"]["tmp_name"], 'doc_file', 'lesson_img', 'image');
						
						$pix_ext = $this->getFileExtension($_FILES["doc_file"]["name"]);
                        
                        if(!empty($pix_name)){
                        	$query2_data = array('lesson_id' => $lesson_id, 'pix_name' => $pix_name);
                            $pix_insert = $this->global_model->dbInsertQuery($query2_data, 'lesson_img');		
							if($pix_insert){
								$dCounter++;
							}
                        }//End if	
                        
                    }//End if
                }
            }//End loop
              											
			if($dCounter > 0){	
				$activity = 'Uploaded '.$docs_len.' lesson picture - '.$title;				
				$this->activity_log($this->user_id, $activity);			
				$resp = $this->successAction('Selected Lesson Picture has been uploaded successfully.');	
				$this->lesson_pix_add($lessonId, $resp);
			}
			else{									
				$resp = $this->errorAction('Error occurred while processing request. Please try again shortly.');
				$this->lesson_pix_add($lessonId, $resp);
			} 
		}
		
	}// End function	

	public function lesson_pix_edit(){
		$data['this_class'] = $this;	// Pass Controller Methods
		$this->load->view('admin/lesson_pix_edit');
	}// End function
			
	public function lesson_pix_mgt($lesson_id_enc, $resp = false){
		$this->privilege_access_bounce($this->user_id, 1);
						
		$data['resp'] = ($resp) ? $resp: '';
        
		$lesson_id				= $this->decryptGetId($lesson_id_enc);
		$data['lesson_id']		= $lesson_id;
		$data['lesson_id_enc']		= $lesson_id_enc;
				
		$lesson_row		 		= $this->global_model->dbSingleRowQuery('*', 'lesson', "id = '".$lesson_id."'");
		$data['lesson_row'] 		= $lesson_row;
									
		$data['lesson_pix_list']	= $this->global_model->dbMultiRowQuery('*', 'lesson_img', "lesson_id = '".$lesson_id."'", 'id', 'ASC');
				
		$data['this_class'] = $this;	// Pass Controller Methods
						
		$this->load->view('admin/lesson_pix_mgt', $data);
				
	}// End function
			
	public function lesson_pix_delete($data_id){
		
		$pixId 		= $data_id;	
		$data_id 		= $this->decryptGetId($data_id);	
				
		$verify_lesson_row		= 	$this->global_model->dbSingleRowQuery('*', 'lesson_img', "id = '".$data_id."'");
        $lesson_id 			= 	$verify_lesson_row['lesson_id'];
		$lessonId			=	$this->encryptGetId($lesson_id);
		$verify_pix_id 		= 	$verify_lesson_row['id'];
		$pix_name 		= 	$verify_lesson_row['pix_name'];
		
		$title		 		= $this->global_model->dbSingleColQuery('topic', 'lesson', "id = '".$lesson_id."'");
		        																	
		if($data_id == ''){
			$resp = $this->errorAction('Unable to process request. Selected data cannot be authenticated.');
			$this->lesson_pix_mgt($lessonId, $resp);
		}				
		elseif($data_id != $verify_pix_id){
			$resp = $this->errorAction('Request aborted! Selected data failed authentication.');
			$this->lesson_pix_mgt($lessonId, $resp);
		}			
		elseif($lesson_id == ''){
			$resp = $this->errorAction('Request aborted! Lesson information failed authentication.');
			$this->lesson_pix_mgt($lessonId, $resp);
		}
		elseif($title == ''){
			$resp = $this->errorAction('Error encountered while authenticating lesson information.');
			$this->lesson_pix_mgt($lessonId, $resp);
		}			
		elseif($pix_name == ''){
			$resp = $this->errorAction('Request aborted! Selected Picture information failed authentication.');
			$this->lesson_pix_mgt($lessonId, $resp);
		}
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('admin_session', 'manager/access-denied');
		}
		else{					
			/****** Start: Delete  *******/
            		
			$del_resp = $this->global_model->dbDeleteQuery($data_id, 'id', 'lesson_img');

			/****** End: Delete *******/

			if($del_resp){	
				if(!empty($pix_name)){	
					$old_pix_path = $this->upload_path."/uploads/".$pix_name;					
					@unlink($old_pix_path);		
				}			
				$activity = 'Deleted lesson picture - '.$title;						
				$this->activity_log($this->user_id, $activity);			
				$resp = $this->successAction('Selected lesson picture has been deleted successfully.');
				$this->lesson_pix_mgt($lessonId, $resp);
			}
			else{					
				$resp = $this->errorAction('Error occurred while processing deletion. Please try again shortly.');
				$this->lesson_pix_mgt($lessonId, $resp);				
			}	
	
		}// End if
		
	}// End function	

	
	
	
/******************* INNOVATIVE RESOURCES ******************/
		
		
	public function innovative_content($resp = false){
		
		$this->privilege_access_bounce($this->user_id, 2);
					
		$data['resp'] = ($resp) ? $resp: '';	
				
		$data['class_list']	= $this->global_model->dbMultiRowQuery('*', 'class', "", 'order_no', 'ASC');
						
		$data['lesson_list'] 	= $this->global_model->dbMultiRowQuery('*', 'lesson', "", 'created', 'DESC');	
		
		$data['media1_list'] 	= $this->global_model->dbMultiRowQuery('*', 'media_app', "media_cat = 2", 'name', 'ASC');
		$data['media2_list'] 	= $this->global_model->dbMultiRowQuery('*', 'media_app', "media_cat = 3", 'name', 'ASC');
										
		$data['this_class'] = $this;	// Pass Controller Methods
						
		$this->load->view('admin/innovative_content', $data);
				
	}// End function
		
	
	public function innovative_content_process(){
		
		$class_id				=	$this->entrySanitizer($this->input->post('class_id'));
		$subject_id				=	$this->entrySanitizer($this->input->post('subject_id'));
		$lesson_id				=	$this->entrySanitizer($this->input->post('lesson_id'));
		$component				=	$this->entrySanitizer($this->input->post('component'));		
		$category				=	$this->entrySanitizer($this->input->post('category'));
		$comp_app_id				=	$this->entrySanitizer($this->input->post('comp_app_id'));
		$on_app_id				=	$this->entrySanitizer($this->input->post('on_app_id'));
		$video_url				=	$this->input->post('video_url');
		$text_content			=	$this->input->post('text_content');
		
		$format				=	$this->entrySanitizer($this->input->post('format'));
		
		$lesson_topic 		= $this->global_model->dbSingleColQuery('topic', 'lesson', "id = '".$lesson_id."'");	
				
		$verify_component 	= $this->global_model->dbSingleColQuery('id', 'lesson_innovative', "lesson_id = '".$lesson_id."' AND component = '".$component."'");	
										
		if($class_id == ''){
			$resp = $this->errorAction('Class must not be blank.');
			$this->innovative_content($resp);
		}								
		elseif($subject_id == ''){
			$resp = $this->errorAction('subject must not be blank.');
			$this->innovative_content($resp);
		}							
		elseif($lesson_id == ''){
			$resp = $this->errorAction('Lesson must not be blank.');
			$this->innovative_content($resp);
		}							
		elseif($component == ''){
			$resp = $this->errorAction('Component type must not be blank.');
			$this->innovative_content($resp);
		}						
		/*elseif($verify_component != ''){
			$resp = $this->errorAction(''.$this->component_value($component).' Component content already exist. You must delete or modify older content before proceeding.');
			$this->innovative_content($resp);
		}*/						
		elseif($category == ''){
			$resp = $this->errorAction('Media  Category must not be blank.');
			$this->innovative_content($resp);
		}							
		elseif($format == ''){
			$resp = $this->errorAction('Media Format must not be blank.');
			$this->innovative_content($resp);
		}							
		elseif($component == '1' && $category == '2' && $comp_app_id == ''){
			$resp = $this->errorAction('Computer Application must not be blank if Component One and Multimedia is chosen.');
			$this->innovative_content($resp);
		}							
		elseif($component == '1' && $category == '3' && $on_app_id == ''){
			$resp = $this->errorAction('Online Application must not be blank if Component One and Multimedia is chosen.');
			$this->innovative_content($resp);
		}					
		elseif($format == '1' && count($_FILES["filename"]['name']) == 0){
			$resp = $this->errorAction('You must choose a Picture for upload if selected Media Format is Picture.');
			$this->innovative_content($resp);
		}				
		elseif($format == '2' && count($video_url) == 0){
			$resp = $this->errorAction('Video URL must not be blank if selected Media Format is Video.');
			$this->innovative_content($resp);
		}						
		elseif($format == '3' && count($text_content) == 0){
			$resp = $this->errorAction('Text Content must not be blank if selected Media Format is Text.');
			$this->innovative_content($resp);
		}							
		elseif($lesson_topic == ''){
			$resp = $this->errorAction('Request terminated! Selected Lesson topic failed authentication.');
			$this->innovative_content($resp);
		}			
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		else{			
			$classname 			= $this->global_model->dbSingleColQuery('name', 'class', "class_id = '".$class_id."'");
			$subjectname 		= $this->global_model->dbSingleColQuery('name', 'subject', "subject_id = '".$subject_id."'");						
			$app_id = 0;
			$comp_app_id 	= ($comp_app_id != '') ? $comp_app_id: 0;
			$on_app_id 		= ($on_app_id != '') ? $on_app_id: 0;
			$app_id 		= ($comp_app_id != '') ? $comp_app_id: $on_app_id;
				
			$ok_entry = 0;	
            $imgCheck = 0;
						       			      					
			if($format == '1'){
       			$filename_len 			=  count($_FILES["filename"]['name']);	
				$video_url = '';
				$text_content = '';
				for($i = 0; $i < $filename_len; $i++) {
					if(!empty($_FILES['filename']['name'][$i]) && $_FILES['filename']['error'][$i] == 0){
						
						$doc_name = $_FILES['filename']['name'][$i];
						$doc_tmp_name = $_FILES['filename']['tmp_name'][$i];
						$doc_error = $_FILES['filename']['error'][$i];	
						$doc_type = $_FILES['filename']['type'][$i];	
						$doc_error = $_FILES['filename']['error'][$i];	
									
						if($doc_error == 0 && $this->checkUnsupportedFileExtension($doc_name)) {
							$imgCheck++;
						}
						if($doc_error == 0 && !$this->validateIsImage($doc_tmp_name)){
							$imgCheck++;
						}
						if($doc_error == 0 && !$this->validateImageSupport($this->getFileExtension($doc_name))){
							$imgCheck++;
						}	
						if($doc_error == 0 && $this->security->xss_clean($doc_tmp_name, TRUE) === false){	
							$imgCheck++;
						}		
									
						if($imgCheck == 0){									
							$_FILES['doc_file']['name'] = $_FILES['filename']['name'][$i];
							$_FILES['doc_file']['tmp_name'] = $_FILES['filename']['tmp_name'][$i];
							$_FILES['doc_file']['error'] = $_FILES['filename']['error'][$i];
							$_FILES['doc_file']['size'] = $_FILES['filename']['size'][$i];
							$_FILES['doc_file']['type'] = $_FILES['filename']['type'][$i];
																					
							$get_filename = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["doc_file"]["name"], $_FILES["doc_file"]["tmp_name"], 'doc_file', 'lesson_innovative', 'image');
							
							//$f = $get_filename.' - '.$_FILES['doc_file']['name'];
							
							if(!empty($get_filename)){
								$query_data = array('component' => $component, 'lesson_id' => $lesson_id, 'category' => $category, 'format' => $format, 'app_id' => $app_id, 'filename' => $get_filename, 'video_url' => $video_url, 'text_content' => $text_content);										
								$insert_data = $this->global_model->dbInsertQuery($query_data, 'lesson_innovative');		
								if($insert_data){
									$ok_entry++;
								}
							}//End if	
							
						}//End if
					}
					
				}
			}
			elseif($format == '2'){ 
				$get_filename = '';
				$text_content = '';
				
				foreach($video_url as $video_url_val){			
					if(!empty($video_url_val)){						
						$video_url_val 	= 	$this->cleanContentUrl($video_url_val);
						$query_data = array('component' => $component, 'lesson_id' => $lesson_id, 'category' => $category, 'format' => $format, 'app_id' => $app_id, 'filename' => $get_filename, 'video_url' => $video_url_val, 'text_content' => $text_content);										
						$insert_data = $this->global_model->dbInsertQuery($query_data, 'lesson_innovative');		
						if($insert_data){
							$ok_entry++;
						}
					}//End if
				}
			}
			elseif($format == '3'){			       
				$get_filename = '';
				$video_url = '';
				
				foreach($text_content as $text_content_val){			
					if(!empty($text_content_val)){
						$query_data = array('component' => $component, 'lesson_id' => $lesson_id, 'category' => $category, 'format' => $format, 'app_id' => $app_id, 'filename' => $get_filename, 'video_url' => $video_url, 'text_content' => $text_content_val);										
						$insert_data = $this->global_model->dbInsertQuery($query_data, 'lesson_innovative');		
						if($insert_data){
							$ok_entry++;
						}
					}//End if
				}
			}
			
			if($ok_entry){
				unset($_POST);
				$activity = 'Posted Innovative Content for Lesson ('.$lesson_topic.')';			
				$this->activity_log($this->user_id, $activity);			
				$this->push_lesson_notification('Innovative Content for Lesson Plan ('.$lesson_topic.') has been posted for '.$subjectname.' in '.$classname, 'New', $subject_id, $class_id, $lesson_id, $component);				
				$resp = $this->successAction('Innovative Content has been posted successfully.');
				$this->innovative_content($resp);				
			}
			else{			
				$resp = $this->errorAction('Error occurred while processing submission. Please try again shortly.');
				$this->innovative_content($resp);
			}
			
		}
		
	}// End function

		
	public function innovative_content_mgt($resp = FALSE){	
		
		$this->privilege_access_bounce($this->user_id, 2);
	
		$data['resp'] = ($resp) ? $resp: '';	
			
		$data['data_list'] 	= $this->global_model->dbMultiRowQuery('lesson_innovative.id, lesson.topic, class.name AS class_name, subject.name AS subject_name, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, format, component, lesson_innovative.created', 'lesson_innovative, lesson, class, subject', "lesson_innovative.lesson_id = lesson.id AND lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id", 'lesson_innovative.created', 'DESC');	
		
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
		
		$this->load->view('admin/innovative_content_mgt', $data);
				
	}// End function

		
	public function innovative_content_mgt_single($data_id_enc, $resp = FALSE){	
		
		$this->privilege_access_bounce($this->user_id, 2);
	
		$data['resp'] = ($resp) ? $resp: '';	

		$data_id				= $this->decryptGetId($data_id_enc);
		$data['data_id']		= $data_id;
		$data['data_id_enc']	= $data_id_enc;
			
		$data['data_list'] 	= $this->global_model->dbMultiRowQuery('lesson_innovative.id, lesson.topic, class.name AS class_name, subject.name AS subject_name, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, format, component, lesson_innovative.created', 'lesson_innovative, lesson, class, subject', "lesson_innovative.lesson_id = lesson.id AND lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson_innovative.lesson_id = '".$data_id."'");	
		
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
		
		$this->load->view('admin/innovative_content_mgt_single', $data);
				
	}// End function
		
		
	public function innovative_content_view($data_id_enc, $resp = false){
		
		$this->privilege_access_bounce($this->user_id, 2);
						
		$data['resp'] = ($resp) ? $resp: '';	
		
		$data_id				= $this->decryptGetId($data_id_enc);
		$data['data_id']		= $data_id;
		$data['data_id_enc']	= $data_id_enc;
		
		$data_row 		= $this->global_model->dbSingleRowQuery('lesson_innovative.id, lesson_innovative.lesson_id, lesson_innovative.component, lesson_innovative.category, lesson.topic, class.name AS class_name, subject.name AS subject_name, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, format, component, lesson_innovative.created', 'lesson_innovative, lesson, class, subject', "lesson_innovative.lesson_id = lesson.id AND lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson_innovative.id = '".$data_id."'");
		$data['data_row']	= $data_row;
					
		$data['data_list'] 	= $this->global_model->dbMultiRowQuery('lesson_innovative.id, lesson.topic, class.name AS class_name, subject.name AS subject_name, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, format, component, lesson_innovative.created', 'lesson_innovative, lesson, class, subject', "lesson_innovative.lesson_id = lesson.id AND lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson_innovative.lesson_id = '".$data_row['lesson_id']."' AND lesson_innovative.component = '".$data_row['component']."' AND lesson_innovative.category = '".$data_row['category']."' AND lesson_innovative.id != '".$data_id."'", 'lesson_innovative.created', 'DESC');	
		
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
				
		$this->load->view('admin/innovative_content_view', $data);
				
	}// End function
		
		
	public function innovative_content_edit($data_id_enc, $resp = false){
		
		$this->privilege_access_bounce($this->user_id, 2);
						
		$data['resp'] = ($resp) ? $resp: '';	
		
		$data_id				= $this->decryptGetId($data_id_enc);
		$data['data_id']		= $data_id;
		$data['data_id_enc']	= $data_id_enc;	 
		
		$data['data_row'] 		= $this->global_model->dbSingleRowQuery('lesson_innovative.id, lesson_innovative.lesson_id, lesson.topic, class.class_id, subject.subject_id, lesson_innovative.text_content, lesson_innovative.filename, lesson_innovative.video_url, category, app_id, format, component, lesson_innovative.created', 'lesson_innovative, lesson, class, subject', "lesson_innovative.lesson_id = lesson.id AND lesson.class_id = class.class_id AND lesson.subject_id = subject.subject_id AND lesson_innovative.id = '".$data_id."'");
		
		$data['lesson_list'] 	= $this->global_model->dbMultiRowQuery('*', 'lesson', "id != '".$data['data_row']['lesson_id']."'", 'created', 'DESC');	
		
		$data['class_name']		= $this->global_model->dbSingleColQuery('name', 'class', "class_id = '".$data['data_row']['class_id']."'");
		$data['subject_name']	= $this->global_model->dbSingleColQuery('name', 'subject', "subject_id = '".$data['data_row']['subject_id']."'");
		$data['app_id']		= 	$data['data_row']['app_id'];
		$data['app_name']		= $this->global_model->dbSingleColQuery('name', 'media_app', "id = '".$data['data_row']['app_id']."'");
		
		$data['class_id_enc']	= $this->encryptGetId($data['data_row']['class_id']);
		$data['lesson_id_enc']	= $this->encryptGetId($data['data_row']['lesson_id']);
		
				
		$data['class_list']	= $this->global_model->dbMultiRowQuery('*', 'class', "", 'order_no', 'ASC');
						
		$data['lesson_list'] 	= $this->global_model->dbMultiRowQuery('*', 'lesson', "", 'created', 'DESC');	
		
		$data['media1_list'] 	= $this->global_model->dbMultiRowQuery('*', 'media_app', "media_cat = 2", 'name', 'ASC');
		$data['media2_list'] 	= $this->global_model->dbMultiRowQuery('*', 'media_app', "media_cat = 3", 'name', 'ASC');
				
		$data['this_class'] = $this;	// Pass Controller Classes and Methods
				
		$this->load->view('admin/innovative_content_edit', $data);
				
	}// End function
	
	
	public function innovative_content_edit_process($dataId){
		
		$class_id				=	$this->entrySanitizer($this->input->post('class_id'));
		$subject_id				=	$this->entrySanitizer($this->input->post('subject_id'));
		$lesson_id				=	$this->entrySanitizer($this->input->post('lesson_id'));
		$component				=	$this->entrySanitizer($this->input->post('component'));		
		$category				=	$this->entrySanitizer($this->input->post('category'));
		$format				=	$this->entrySanitizer($this->input->post('format'));
		$comp_app_id				=	$this->entrySanitizer($this->input->post('comp_app_id'));
		$on_app_id				=	$this->entrySanitizer($this->input->post('on_app_id'));
		$video_url				=	$this->entrySanitizer($this->input->post('video_url'));
		$text_content				=	$this->entrySanitizer($this->input->post('text_content'));
		
		$db_filename		=	$this->entrySanitizer($this->input->post('db_filename'));
        
		$data_id 		= 	$this->decryptGetId($this->entrySanitizer($this->input->post('data_id')));
		$db_lesson_id 		= 	$this->decryptGetId($this->entrySanitizer($this->input->post('db_lesson_id')));
		
		$lesson_topic 		= 	$this->global_model->dbSingleColQuery('topic', 'lesson', "id = '".$lesson_id."'");	
										
		if($class_id == ''){
			$resp = $this->errorAction('Class must not be blank.');

			$this->innovative_content_edit($dataId, $resp);
		}								
		elseif($subject_id == ''){
			$resp = $this->errorAction('subject must not be blank.');
			$this->innovative_content_edit($dataId, $resp);
		}							
		elseif($lesson_id == ''){
			$resp = $this->errorAction('Lesson must not be blank.');
			$this->innovative_content_edit($dataId, $resp);
		}							
		elseif($component == ''){
			$resp = $this->errorAction('Component type must not be blank.');
			$this->innovative_content_edit($dataId, $resp);
		}						
		elseif($category == ''){
			$resp = $this->errorAction('Media  Category must not be blank.');
			$this->innovative_content_edit($dataId, $resp);
		}							
		elseif($format == ''){
			$resp = $this->errorAction('Media  Format must not be blank.');
			$this->innovative_content_edit($dataId, $resp);
		}							
		elseif($component == '1' && $category == '2' && $comp_app_id == ''){
			$resp = $this->errorAction('Computer Application must not be blank if Component One and Multimedia is chosen.');
			$this->innovative_content_edit($dataId, $resp);
		}							
		elseif($component == '1' && $category == '3' && $on_app_id == ''){
			$resp = $this->errorAction('Online Application must not be blank if Component One and Multimedia is chosen.');
			$this->innovative_content_edit($dataId, $resp);
		}							
		elseif($format == '1' && $_FILES["filename"]["error"] != 0){
			$resp = $this->errorAction('You must choose a Picture for upload if selected Media Format is Picture.');
			$this->innovative_content_edit($dataId, $resp);
		}						
		elseif($format == '1' && $_FILES["filename"]["error"] != 0){
			$resp = $this->errorAction('You must choose a Picture for upload if selected Media Format is Picture.');
			$this->innovative_content_edit($dataId, $resp);
		}
		elseif($format == '1' && $_FILES["filename"]["error"] == 0 && !$this->validateIsImage($_FILES["filename"]["tmp_name"])){
			$resp = $this->errorAction('Uploaded file is not a Picture.');
			$this->innovative_content_edit($dataId, $resp);
		}
		elseif($format == '1' && $_FILES["filename"]["error"] == 0 && !$this->validateImageSupport($this->getFileExtension($_FILES["filename"]["name"]))){
			$resp = $this->errorAction('Uploaded Picture format is not supported.');
			$this->innovative_content_edit($dataId, $resp);
		}		
		elseif($format == '1' && $_FILES["filename"]["error"] == 0 && $this->checkUnsupportedFileExtension($_FILES["filename"]["name"])) {
			$this->access_bounce('access-denied');
		}
		elseif($format == '1' && $_FILES["filename"]["error"] == 0 && !is_uploaded_file($_FILES["filename"]["tmp_name"])){
			$this->access_bounce('access-denied');	
		}		
		elseif($format == '1' && $_FILES["filename"]["error"] == 0 && $this->security->xss_clean($_FILES["filename"]["tmp_name"], TRUE) === false){	
			$this->access_bounce('access-denied');	
		}								
		elseif($format == '2' && $video_url == ''){
			$resp = $this->errorAction('Video URL must not be blank if selected Media Format is Video.');
			$this->innovative_content_edit($dataId, $resp);
		}						
		elseif($format == '3' && $text_content == ''){
			$resp = $this->errorAction('Text Content must not be blank if selected Media Format is Text.');
			$this->innovative_content_edit($dataId, $resp);
		}							
		elseif($lesson_topic == ''){
			$resp = $this->errorAction('Request terminated! Selected Lesson topic failed authentication.');
			$this->innovative_content_edit($dataId, $resp);
		}		
		elseif($db_lesson_id == ''){
			$resp = $this->errorAction('Unable to process request. Lesson information failed authentication.');
			$this->innovative_content_edit($dataId, $resp);
		}	
		elseif($data_id == ''){
			$resp = $this->errorAction('Unable to process request. Content cannot be authenticated.');
			$this->innovative_content_edit($dataId, $resp);
		}		
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		else{						
			$app_id = 0;
			$comp_app_id 	= ($comp_app_id != '') ? $comp_app_id: 0;
			$on_app_id 		= ($on_app_id != '') ? $on_app_id: 0;
			$app_id 		= ($comp_app_id != '') ? $comp_app_id: $on_app_id;	
			
			$del_filename 	= 0;											
			if(isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0){				
				$get_filename = $this->file_uploader($this->upload_path.'/uploads/', $_FILES["filename"]["name"], $_FILES["filename"]["tmp_name"], 'filename', 'lesson_innovative', 'image');
				$del_filename 	= (!empty($get_filename) && !empty($db_filename)) ? 1: 0;
			}	
			else{
				$get_filename = $db_filename;
				$del_filename 	= ($format == '1') ? 0: 1;	
			}
						
			$get_filename 	= ($format == '1') ? $get_filename: '';			
			$video_url 		= ($format == '2') ? $this->cleanContentUrl($video_url): '';	
			$text_content 	= ($format == '3') ? $text_content: '';
						            
			$query_data = array('component' => $component, 'lesson_id' => $lesson_id, 'category' => $category, 'format' => $format, 'app_id' => $app_id, 'filename' => $get_filename, 'video_url' => $video_url, 'text_content' => $text_content, 'updated_at' => $this->globalCurrentTimeStamp);
										
			$update_data = $this->global_model->dbUpdateQuery($query_data, 'lesson_innovative', "id = '".$data_id."'");
			
			if($update_data){
				$new_file_path = $this->upload_path."/uploads/".$get_filename;	
				$old_file_path = $this->upload_path."/uploads/".$db_filename;	
				if($del_filename > 0){
					if(!empty($db_filename) && file_exists($new_file_path)){			
						// Delete photo					
						@unlink($old_file_path);		
					}
				}
				$activity = 'Updated Innovative Content for Lesson ('.$lesson_topic.')';			
				$this->activity_log($this->user_id, $activity);				
				
				$this->push_lesson_notification('Updates on Innovative Content for Lesson Plan ('.$lesson_topic.') has been posted', 'Updates', $subject_id, $class_id, $lesson_id, $component);
					
				$resp = $this->successAction('Innovative Content has been updated successfully.');
				$this->innovative_content_edit($dataId, $resp);				
			}
			else{			
				$resp = $this->errorAction('Error occurred while processing submission. Please try again shortly.');
				$this->innovative_content_edit($dataId, $resp);
			}
		}
		
	}// End function
	
		
	public function innovative_content_delete($data_id){
		
		$this->privilege_access_bounce($this->user_id, 2);
		
		$data_id 		= $this->decryptGetId($data_id);
								
		$data_row 	= $this->global_model->dbSingleRowQuery('topic, filename', 'lesson_innovative, lesson', "lesson_innovative.lesson_id = lesson.id AND lesson_innovative.id = '".$data_id."'");
		$lesson_topic	= $data_row['topic'];
		$db_filename		= $data_row['filename'];
		
		if($data_id == ''){
			$resp = $this->errorAction('No Content has been selected for deletion.');
			$this->innovative_content_mgt($resp);
		}
		elseif($this->user_id == ''){
			// Logout user
			$this->access_bounce('manager/access-denied');
		}
		else{					
			/****** Start: Delete  *******/
			
			$del_resp = $this->global_model->dbDeleteQuery($data_id, 'id', 'lesson_innovative');

			/****** End: Delete *******/

			if($del_resp){
				$old_file_path = $this->upload_path."/uploads/".$db_filename;	
				if(!empty($db_filename) && file_exists($old_file_path)){			
					// Delete photo					
					@unlink($old_file_path);		
				}
					
				$activity = 'Deleted Innovative Content Resources for Lesson ('.$lesson_topic.')';					
				$this->activity_log($this->user_id, $activity);			
				$resp = $this->successAction('Selected Content has been deleted successfully.');
				$this->innovative_content_mgt($resp);
			}
			else{					
				$resp = $this->errorAction('Error occurred while processing deletion. Please try again shortly.');
				$this->innovative_content_mgt($resp);				
			}	
	
		}// End if
		
	}// End function
		
	
}// End Class

?>