<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Komentar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'komentar/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'komentar/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'komentar/index';
            $config['first_url'] = base_url() . 'komentar/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Komentar_model->total_rows($q);
        $komentar = $this->Komentar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $script = array(
            'assets/plugins/jquery-ui/jquery-ui.min.js',
            'assets/plugins/sweetalert2/sweetalert2.min.js',
            'assets/plugins/toastr/toastr.min.js',
            'assets/js/modal-inbox.js',
        );

        $data = array(
            'komentar_data' => $komentar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/komentar/komentar_list',
            'judul'=>'Pesan Masuk',
            'breadcrumb'=>array("Pesan Masuk"),
            'script'=>$script,
        );
        $this->load->view('admin/container', $data);
    }

    public function read() 
    {
        $id=json_decode(stripslashes($this->input->post("id")),true);
        $row = $this->Komentar_model->get_by_id($id);
        if ($row) {
            echo(json_encode($row));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Komentar_model->get_by_id($id);

        if ($row) {
            $this->Komentar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('komentar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komentar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('subject', 'subject', 'trim|required');
	$this->form_validation->set_rules('pesan', 'pesan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "komentar.xls";
        $judul = "komentar";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Subject");
	xlsWriteLabel($tablehead, $kolomhead++, "Pesan");

	foreach ($this->Komentar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->subject);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pesan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=komentar.doc");

        $data = array(
            'komentar_data' => $this->Komentar_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('komentar/komentar_doc',$data);
    }

}

/* End of file Komentar.php */
/* Location: ./application/controllers/Komentar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-14 15:21:27 */
/* http://harviacode.com */