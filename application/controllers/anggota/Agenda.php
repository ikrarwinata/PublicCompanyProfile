<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');
        $this->load->library('form_validation');
        set_timezone();
    }

    public function index(){
        redirect("anggota/Agenda/semua");
    }

    public function semua()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $ref = "anggota/Agenda/semua";

        if ($q <> '') {
            $config['base_url'] = base_url() . $ref.'?q=' . urlencode($q);
            $config['first_url'] = base_url() . $ref.'?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . $ref;
            $config['first_url'] = base_url() . $ref;
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Agenda_model->total_rows($q);
        $agenda = $this->Agenda_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'agenda_data' => $agenda,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'ref' => $ref,
            'konten'=>'anggota/agenda/agenda_list',
            'judul'=>'Agenda',
            'breadcrumb'=>array('Agenda', "Semua Agenda Kegiatan"),
        );
        $this->load->view('anggota/container', $data);
    }

    public function terlewati()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $ref = "anggota/Agenda/terlewati";

        if ($q <> '') {
            $config['base_url'] = base_url() . $ref.'?q=' . urlencode($q);
            $config['first_url'] = base_url() . $ref.'?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . $ref;
            $config['first_url'] = base_url() . $ref;
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Agenda_model->total_rows_terlewati($q);
        $agenda = $this->Agenda_model->get_limit_data_terlewati($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'agenda_data' => $agenda,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'ref' => $ref,
            'konten'=>'anggota/agenda/agenda_list',
            'judul'=>'Agenda Terlewati',
            'breadcrumb'=>array('Agenda', "Agenda Kegiatan Terlewati"),
        );
        $this->load->view('anggota/container', $data);
    }

    public function akandatang()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $ref = "anggota/Agenda/akandatang";

        if ($q <> '') {
            $config['base_url'] = base_url() . $ref.'?q=' . urlencode($q);
            $config['first_url'] = base_url() . $ref.'?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . $ref;
            $config['first_url'] = base_url() . $ref;
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Agenda_model->total_rows_akandatang($q);
        $agenda = $this->Agenda_model->get_limit_data_akandatang($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'agenda_data' => $agenda,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'ref' => $ref,
            'konten'=>'anggota/agenda/agenda_list',
            'judul'=>'Agenda Yang Akan Datang',
            'breadcrumb'=>array('Agenda', "Agenda Kegiatan Akan Datang"),
        );
        $this->load->view('anggota/container', $data);
    }

    public function read($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $this->load->helper(array('form', 'url'));
            $btsr = array(
                'assets/plugins/select2/css/select2.min.css',
                'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
                'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
            );
            $script = array(
                'assets/plugins/jquery-ui/jquery-ui.min.js',
                'assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
                'assets/plugins/select2/js/select2.full.min.js',
                'assets/plugins/moment/moment.min.js',
                'assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js',
                'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                'assets/js/agenda.js',
            );

            $this->db->select("nomor, username, nama");

            $data = array(
                'id' => set_value('id', $id),
                'ajudul' => set_value('judul', $row->judul),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'tempat' => set_value('tempat', $row->tempat),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'bulan' => set_value('bulan', $row->bulan),
                'tahun' => set_value('tahun', $row->tahun),
                'gambar' => set_value('gambar', $row->gambar),
                'userpost' => set_value('userpost', $row->userpost),
                'tampilkan' => set_value('tampilkan', $row->tampilkan),
                'konten'=>'anggota/agenda/agenda_read',
                'judul'=>'Detail Agenda',
                'script'=>$script,
                'bootstrap'=>$btsr,
                'breadcrumb'=>array('Agenda', "Detail Agenda"),
            );
            $this->load->view("anggota/container", $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('anggota/Agenda');
        }
    }

    public function printexec($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $this->load->helper(array('form', 'url'));
            $btsr = array(
                'assets/plugins/select2/css/select2.min.css',
                'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
                'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
            );
            $script = array(
                'assets/plugins/jquery-ui/jquery-ui.min.js',
                'assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
                'assets/plugins/select2/js/select2.full.min.js',
                'assets/plugins/moment/moment.min.js',
                'assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js',
                'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                'assets/js/agenda.js',
            );

            $this->db->select("nomor, username, nama");

            $data = array(
                'id' => set_value('id', $id),
                'ajudul' => set_value('judul', $row->judul),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'tempat' => set_value('tempat', $row->tempat),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'bulan' => set_value('bulan', $row->bulan),
                'tahun' => set_value('tahun', $row->tahun),
                'gambar' => set_value('gambar', $row->gambar),
                'userpost' => set_value('userpost', $row->userpost),
                'tampilkan' => set_value('tampilkan', $row->tampilkan),
                'judul'=>'Detail Agenda',
                'script'=>$script,
                'bootstrap'=>$btsr,
                'breadcrumb'=>array('Agenda', "Detail Agenda"),
            );
            $this->load->view('anggota/agenda/agenda_print', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('anggota/Agenda');
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "agenda.xls";
        $judul = "agenda";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
        xlsWriteLabel($tablehead, $kolomhead++, "Tempat");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");

	foreach ($this->Agenda_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal."-".$data->bulan."-".$data->tahun);
        xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-13 15:00:04 */
/* http://harviacode.com */