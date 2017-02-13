<?php
// Author : Neelesh Singh Rajpurohit
// Email :  Admin@StudyMedia.in
// Phone : +91-9971751205

//  LIST OF CONTROLLERS : DESCRIPTION

// End
class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('session');
                $this->load->model('file_database');
                $this->load->helper('array');
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload($id)
        {       
                $new_name = $this->input->post('filename');
                $config['upload_path']= './uploads/';
                $config['file_name'] = $new_name;
                $config['allowed_types'] = '*';
                /*$data = array(
                'user_name' => $this->input->post('username'),
                'user_email' => $this->input->post('email_value'),
                'user_password' => $this->input->post('password'),
                'admin'=> $valadmin,
                );*/
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {

                        $data = array('upload_data' => $this->upload->data()); // final file upload informantion
                        foreach (element('upload_data', $data) as $item => $value):
                                 if($item=="file_name"){
                                  $new_name=$value;
                          }
                        endforeach;
                        $filedata = array(
                        'id' => $id,
                        'file_name' => $new_name,
                        'description' => $this->input->post('description'),
                        'branch' => $this->input->post('branch'),
                        'semester' => $this->input->post('semester'),
                        'course' => $this->input->post('courses'),
                        );
                        
                        

                        $result = $this->file_database->file_insert($filedata);

                        

                        if ($result == TRUE) {
                                $data['message_display'] = 'File Uploaded Successfully !';
                        }else {
                                $data['message_display'] = 'Some Error Occured in writing the file to the database';
                        }
                        $this->load->view('upload_success', $data);
                }
        }

        function get($id)
        {
                $query = $this->db->get_where('files', array('id'=>$id));
                return $query->result();
        }


}
?>
