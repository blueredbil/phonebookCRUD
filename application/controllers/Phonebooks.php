<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phonebooks extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('phonebook');
    }
    
    public function index(){
        $data = array();
        
        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['phonebooks'] = $this->phonebook->getRows();
        $data['title'] = 'Phone Book';
        
        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('phonebooks/index', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Phonebook details
     */
    public function view($id){
        $data = array();
        
        //check whether phonebook id is not empty
        if(!empty($id)){
            $data['phonebook'] = $this->phonebook->getRows($id);
            $data['name'] = $data['phonebook']['name'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('phonebooks/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/phonebooks');
        }
    }
    
    /*
     * Add phonebook content
     */
    public function add(){
        $data = array();
        $phonebookData = array();
        
        //if add request is submitted
        if($this->input->post('phonebookSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('name', 'phonebook name', 'required');
            $this->form_validation->set_rules('contactno', 'phonebook contactno', 'required');
            
            //prepare post data
            $phonebookData = array(
                'name' => $this->input->post('name'),
                'contactno' => $this->input->post('contactno')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert phonebook data
                $insert = $this->phonebook->insert($phonebookData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Data has been added successfully.');
                    redirect('/phonebooks');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['phonebook'] = $phonebookData;
        $data['title'] = 'Create Phonebook';
        $data['action'] = 'Add';
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('phonebooks/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        
        //get post data
        $phonebookData = $this->phonebook->getRows($id);
        
        //if update request is submitted
        if($this->input->post('phonebookSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('name', 'phonebook name', 'required');
            $this->form_validation->set_rules('contactno', 'phonebook contactno', 'required');
            
            //prepare cms page data
            $phonebookData = array(
                'name' => $this->input->post('name'),
                'contactno' => $this->input->post('contactno')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update phonebook data
                $update = $this->phonebook->update($phonebookData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Data has been updated successfully.');
                    redirect('/phonebooks');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }

        
        $data['phonebook'] = $phonebookData;
        $data['title'] = 'Update Phonebook';
        $data['action'] = 'Edit';
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('phonebooks/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->phonebook->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Data has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('/phonebooks');
    }
}