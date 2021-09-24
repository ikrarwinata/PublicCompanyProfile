<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'gallery/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'gallery/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'gallery/index.html';
            $config['first_url'] = base_url() . 'gallery/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Gallery_model->total_rows($q);
        $gallery = $this->Gallery_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'gallery_data' => $gallery,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('gallery/gallery_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idagenda' => $row->idagenda,
		'gambar' => $row->gambar,
		'caption' => $row->caption,
	    );
            $this->load->view('gallery/gallery_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gallery/create_action'),
	    'id' => set_value('id'),
	    'idagenda' => set_value('idagenda'),
	    'gambar' => set_value('gambar'),
	    'caption' => set_value('caption'),
	);
        $this->load->view('gallery/gallery_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idagenda' => $this->input->post('idagenda',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'caption' => $this->input->post('caption',TRUE),
	    );

            $this->Gallery_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('gallery'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gallery/update_action'),
		'id' => set_value('id', $row->id),
		'idagenda' => set_value('idagenda', $row->idagenda),
		'gambar' => set_value('gambar', $row->gambar),
		'caption' => set_value('caption', $row->caption),
	    );
            $this->load->view('gallery/gallery_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idagenda' => $this->input->post('idagenda',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'caption' => $this->input->post('caption',TRUE),
	    );

            $this->Gallery_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gallery'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $this->Gallery_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gallery'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idagenda', 'idagenda', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('caption', 'caption', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "gallery.xls";
        $judul = "gallery";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idagenda");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Caption");

	foreach ($this->Gallery_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idagenda);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->caption);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=gallery.doc");

        $data = array(
            'gallery_data' => $this->Gallery_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('gallery/gallery_doc',$data);
    }

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-14 15:21:25 */
/* http://harviacode.com */