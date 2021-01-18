<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Register_model'); //Load the Model here
		$this->load->library('upload');
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		if($this->input->post('register'))
		{
			/* Encoding Company Names and company descirption for db */
			
			$company_all_names			= $this->input->post('cname');
  			$company_all_names_json 	= json_encode($company_all_names);
  			$company_all_desc			= $this->input->post('cdesc');
  			$company_all_desc_json 		= json_encode($company_all_desc);

			/* Encoding Company Names and company descirption for db  ends here*/
			
			/* Getting values ready for db input */
			$data['First_Name']				=$this->input->post('fname');
			$data['Last_Name']				=$this->input->post('lname');
			$data['Dob']					=$this->input->post('dob');
			$data['Address']				=$this->input->post('address');
			$data['Company_Name'] 			=$company_all_names_json;
			$data['Company_Description']	=$company_all_desc_json;
			$data['Username']				=$this->input->post('username');
			$data['Pass']					=md5($this->input->post('pass'));
				

				$user=$this->Register_model->check_user($data['Username']);  // Check weather same username exists or not
				if($user>0)
					{
						$data['error']="<h3 style='color:red'>This user already exists</h3>";
					}
				else {
					$user=$this->Register_model->saverecords($data);        // Saving user records to database
					if($user>0){

						$config["upload_path"] = $_SERVER['DOCUMENT_ROOT']."/CodeIgniter/assets/uploads/";
		                $config['allowed_types']        = 'gif|jpg|png';
		                $config['max_size']             = 10000;
		                $config['max_width']            = 1024;
		                $config['max_height']           = 768;

						
						/* FIle uploading here */
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						 $files = $_FILES;
						 $cpt = count($_FILES['portfolio_file']['name']);
						for($i=0; $i<$cpt; $i++)
						{           
						    $_FILES['portfolio_file']['name']		= $files['portfolio_file']['name'][$i];
						    $_FILES['portfolio_file']['type']		= $files['portfolio_file']['type'][$i];
						    $_FILES['portfolio_file']['tmp_name']	= $files['portfolio_file']['tmp_name'][$i];
						    $_FILES['portfolio_file']['error']		= $files['portfolio_file']['error'][$i];
						    $_FILES['portfolio_file']['size']		= $files['portfolio_file']['size'][$i];    

							 if ( ! $this->upload->do_upload('portfolio_file'))
				                {
				                    $error = array('error' => $this->upload->display_errors());
				                }
			                else
			                {
			                        $data = array('upload_data' => $this->upload->data());
			                }

						}
						/* FIle uploading here ends here */

				 		$data['error']="<h3 style='color:blue'>Your account created successfully</h3>";
					}
					else{
							//echo "Insert error !";
							$data['error']="<h3 style='color:red'>This user already exists</h3>";
					}
				}	
		}
		$this->load->view('register',@$data);	
	}
}

