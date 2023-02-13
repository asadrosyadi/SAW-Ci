<?php

Class Saw extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
		$data['data'] = $this->db->select('*')->from('saw')->get()->result(); //Untuk mengambil data dari database webinar
		$data['rule'] = $this->db->select('*')->from('sawbobot')->get()->result(); //Untuk mengambil data dari database webinar
		$this->template->load('template','saw/list',$data);	
    }
	
	
function add() {
    $isi = array(
            'nilai1'     => $this->input->post('nilai1'),
            'nilai2'     => $this->input->post('nilai2'),
            'nilai3'     => $this->input->post('nilai3'),
        );
        $this->db->insert('saw',$isi);
        redirect('saw');
    }
	    
function edit(){
	if(isset($_POST['submit'])){
            $data = array(
            'bobot1'     => $this->input->post('bobot1'),
			'bobot2'     => $this->input->post('bobot2'),
			'bobot3'     => $this->input->post('bobot3')
        );
        $id   = $this->input->post('id');
        $this->db->where('id_bobot',$id);
        $this->db->update('sawbobot',$data);
        redirect('saw');
        }
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('saw');
        }
        redirect('saw');
    }

}