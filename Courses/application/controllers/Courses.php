<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function index(){
		$this->output->enable_profiler(TRUE);
		$this->load->model('Course');
		// if($this->session->flashdata('coursedelete')){
		// 	$course = $this->session->flashdata('coursedelete');	
		// // 	// var_dump($course);
		// // 	$id = intval($course['id']);
		// // 	// var_dump($id); die();
		// // 	$this->Course->delete_course($id);
		// }
		$course_data = $this->Course->get_all_courses();
		$this->load->view('courses', array('courses' => $course_data));
	}

	public function show($id)
    {   
        $this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("Course"); //loads the model
        $course = $this->Course->get_course_by_id($id);  //calls the get_course_by_id method
        $this->session->set_flashdata('coursedelete', $course);
        $this->load->view('course_delete', array('course' => $course));
    }


	public function destroy($id){
		$this->load->model('Course');
		$delete_course = $this->Course->delete_course($id);
		redirect('/');
	}

    public function add()
    {
        $this->load->model("Course");
        $course_details = array(
            "title" => $this->input->post('title'),
            "description" => $this->input->post('description')
        ); 
        $add_course = $this->Course->add_course($course_details);

        redirect('/');
    }

}
// $this->session->set_userdata('name', $this->input->post('name'));

?>