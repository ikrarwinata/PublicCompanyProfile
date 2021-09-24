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
        redirect("admin/Agenda/semua");
    }

    public function semua()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $ref = "admin/Agenda/semua";

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
            'konten'=>'admin/agenda/agenda_list',
            'judul'=>'Agenda',
            'breadcrumb'=>array('Agenda', "Semua Agenda Kegiatan"),
        );
        $this->load->view('admin/container', $data);
    }

    public function terlewati()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $ref = "admin/Agenda/terlewati";

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
            'konten'=>'admin/agenda/agenda_list',
            'judul'=>'Agenda Terlewati',
            'breadcrumb'=>array('Agenda', "Agenda Kegiatan Terlewati"),
        );
        $this->load->view('admin/container', $data);
    }

    public function akandatang()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $ref = "admin/Agenda/akandatang";

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
            'konten'=>'admin/agenda/agenda_list',
            'judul'=>'Agenda Yang Akan Datang',
            'breadcrumb'=>array('Agenda', "Agenda Kegiatan Akan Datang"),
        );
        $this->load->view('admin/container', $data);
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
                'konten'=>'admin/agenda/agenda_read',
                'judul'=>'Detail Agenda',
                'script'=>$script,
                'bootstrap'=>$btsr,
                'breadcrumb'=>array('Agenda', "Detail Agenda"),
            );
            $this->load->view("admin/container", $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('admin/Agenda');
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
            $this->load->view('admin/agenda/agenda_print', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('admin/Agenda');
        }
    }

    public function create() 
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('User_model');
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
        $data_member = $this->User_model->get_all_member();

        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/Agenda/create_action'),
    	    'id' => set_value('id'),
            'ajudul' => set_value('judul'),
    	    'tempat' => set_value('tempat'),
    	    'deskripsi' => set_value('deskripsi'),
    	    'tanggal' => set_value('tanggal'),
    	    'bulan' => set_value('bulan'),
    	    'tahun' => set_value('tahun'),
            'gambar' => set_value('gambar'),
    	    'gallery' => array(),
    	    'userpost' => set_value('userpost'),
            'tampilkan' => set_value('tampilkan'),
    	    'data_member' => $data_member,
            'konten'=>'admin/agenda/agenda_form',
            'judul'=>'Menambahkan Agenda Baru',
            'script'=>$script,
            'bootstrap'=>$btsr,
            'breadcrumb'=>array('Agenda', "Menambahkan Agenda Baru"),
        );
        $this->load->view("admin/container", $data);
    }
    
    public function create_action() 
    {
        $config['upload_path']          = './uploads/agenda';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 100000;
        $config['max_width']            = 8000;
        $config['max_height']           = 8000;
        $this->load->library('upload', $config);

        $this->load->model('Gallery_model');
        $gambar = NULL;
        if($this->upload->do_upload('gambar')){
            $udata = $this->upload->data();
            $gambar = "uploads/agenda/".date("dmYHis").$udata["file_ext"];
            rename($udata["full_path"], $gambar);
        }

        $idagenda = $this->db->query("SELECT MAX(id) AS counter FROM agenda")->row()->counter + 1;

        $countfiles = count($_FILES['gallery']['name']);
        for ($i=0; $i < $countfiles; $i++) { 
            if ($_FILES['gallery']["tmp_name"][$i] == NULL) {
                continue;
            };

            $ext = end((explode(".", $_FILES['gallery']["name"][$i])));
            $ggambar = "uploads/gallery/".date("dmYHis").$i.".".$ext;
            rename($_FILES['gallery']["tmp_name"][$i], $ggambar);
            $caption = isset($this->input->post("caption")[$i])?$this->input->post("caption")[$i]:NULL;

            $this->Gallery_model->insert(array(
                                            'idagenda'=>$idagenda,
                                            'gambar'=>$ggambar,
                                            'caption'=>$caption,
                                        ));
        }

        $tampilkan = $this->input->post('tampilkan',TRUE)=="tampilkan"?"1":"0";

        $d = DateTime::createFromFormat(
            'd-m-Y H:i:s',
            format_date($this->input->post("tanggal")).' 00:00:00'
        );
        $time = $d->getTimestamp();


        $data = array(
            'id' => $idagenda,
            'judul' => $this->input->post('judul',TRUE),
            'tempat' => $this->input->post('tempat',TRUE),
            'deskripsi' => $this->input->post('deskripsi',TRUE),
            'tanggal' => get_date($this->input->post('tanggal',TRUE)),
            'bulan' => get_month($this->input->post('tanggal',TRUE)),
            'tahun' => get_year($this->input->post('tanggal',TRUE)),
            'timestamps' => $time,
            'gambar' => $gambar,
            'userpost' => $this->session->userdata("Username"),
            'tampilkan' => $tampilkan,
        );

        $this->Agenda_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect('admin/Agenda');
    }
    
    public function update($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);
        $this->load->model("Gallery_model");

        if ($row) {
            $this->load->helper(array('form', 'url'));
            $this->load->model('User_model');
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
            $data_member = $this->User_model->get_all_member();

            $data = array(
                'button' => 'Create',
                'action' => site_url('admin/Agenda/update_action'),
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
                'gallery' => $this->Gallery_model->get_by_idagenda($row->id),
                'data_member' => $data_member,
                'konten'=>'admin/agenda/agenda_form',
                'judul'=>'Mengubah Agenda',
                'script'=>$script,
                'bootstrap'=>$btsr,
                'breadcrumb'=>array('Agenda', "Mengubah Agenda"),
            );
            $this->load->view("admin/container", $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('admin/Agenda');
        }
    }
    
    public function update_action() 
    {
        $config['upload_path']          = './uploads/agenda';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 100000;
        $config['max_width']            = 8000;
        $config['max_height']           = 8000;
        $this->load->library('upload', $config);

        $this->load->model('Gallery_model');
        $gambar = $this->input->post("oldgambar");
        if($this->upload->do_upload('gambar')){
            $udata = $this->upload->data();
            $gambar = "uploads/agenda/".date("dmYHis").$udata["file_ext"];
            rename($udata["full_path"], $gambar);
        }

        $idagenda = $this->input->post("id");
        $this->db->query("DELETE FROM gallery WHERE idagenda = $idagenda");

        $countfiles = count($_FILES['gallery']['name']);
        for ($i=0; $i < $countfiles; $i++) { 
            if ($_FILES['gallery']["tmp_name"][$i] == NULL) {
                continue;
            };
            
            $ext = end((explode(".", $_FILES['gallery']["name"][$i])));
            $ggambar = "uploads/gallery/".date("dmYHis").$i.".".$ext;
            rename($_FILES['gallery']["tmp_name"][$i], $ggambar);
            $caption = isset($this->input->post("caption")[$i])?$this->input->post("caption")[$i]:NULL;

            $this->Gallery_model->insert(array(
                                            'idagenda'=>$idagenda,
                                            'gambar'=>$ggambar,
                                            'caption'=>$caption,
                                        ));
        }
        
        $countfiles = count($this->input->post("oldgallery"));
        for ($i=0; $i < $countfiles; $i++) {
            $this->Gallery_model->insert(array(
                                            'idagenda'=>$idagenda,
                                            'gambar'=>$this->input->post("oldgallery")[$i],
                                            'caption'=>$this->input->post("oldcaption")[$i],
                                        ));
        }

        $tampilkan = $this->input->post('tampilkan',TRUE)=="tampilkan"?"1":"0";

        $d = DateTime::createFromFormat(
            'd-m-Y H:i:s',
            format_date($this->input->post("tanggal")).' 00:00:00'
        );
        $time = $d->getTimestamp();


        $data = array(
            'id' => $idagenda,
            'judul' => $this->input->post('judul',TRUE),
            'tempat' => $this->input->post('tempat',TRUE),
            'deskripsi' => $this->input->post('deskripsi',TRUE),
            'tanggal' => get_date($this->input->post('tanggal',TRUE)),
            'bulan' => get_month($this->input->post('tanggal',TRUE)),
            'tahun' => get_year($this->input->post('tanggal',TRUE)),
            'timestamps' => $time,
            'gambar' => $gambar,
            'userpost' => $this->session->userdata("Username"),
            'tampilkan' => $tampilkan,
        );

        $this->Agenda_model->update($idagenda, $data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect('admin/Agenda');
    }
    
    public function delete($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            if (isset($row->gambar)) {
                if(file_exists($row->gambar))unlink($row->gambar);
            };

            $this->Agenda_model->delete($id);
            $this->load->model('Gallery_model');

            foreach ($this->Gallery_model->get_by_idagenda($row->id) as $key => $value) {
                if(file_exists($value->gambar)){
                    unlink($value->gambar);
                };
            };
            $this->Gallery_model->delete_by_idagenda($id);

            $this->session->set_flashdata('message', 'Agenda berhasil dihapus.');
            redirect('admin/Agenda');
        } else {
            $this->session->set_flashdata('message', 'Upss... Data tidak ditemukan');
            redirect('admin/Agenda');
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
        xlsWriteLabel($tablehead, $kolomhead++, "Hari");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

        foreach ($this->Agenda_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->judul);
            xlsWriteLabel($tablebody, $kolombody++, $data->tempat);
            xlsWriteLabel($tablebody, $kolombody++, get_day($data->tanggal."-".$data->bulan."-".$data->tahun));
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal." - ".get_str_month($data->bulan)." - ".$data->tahun);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function excel_mnt()
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
        xlsWriteLabel($tablehead, $kolomhead++, "Hari");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

        foreach ($this->Agenda_model->get_all_this_month() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->judul);
            xlsWriteLabel($tablebody, $kolombody++, $data->tempat);
            xlsWriteLabel($tablebody, $kolombody++, get_day($data->tanggal."-".$data->bulan."-".$data->tahun));
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal." - ".get_str_month($data->bulan)." - ".$data->tahun);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function excel_y()
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
        xlsWriteLabel($tablehead, $kolomhead++, "Hari");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

        foreach ($this->Agenda_model->get_year($this->input->post("year")) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->judul);
            xlsWriteLabel($tablebody, $kolombody++, $data->tempat);
            xlsWriteLabel($tablebody, $kolombody++, get_day($data->tanggal."-".$data->bulan."-".$data->tahun));
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal." - ".get_str_month($data->bulan)." - ".$data->tahun);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function print_all()
    {
        $data = array(
            'agenda_data' => $this->Agenda_model->get_all(),
            'judul'=>'Semua Agenda Kegiatan',
            'breadcrumb'=>array('Agenda', "Semua Agenda Kegiatan"),
        );
        $this->load->view('admin/agenda/agenda_print2', $data);
    }

    public function print_mnt()
    {
        $data = array(
            'agenda_data' => $this->Agenda_model->get_all_this_month(),
            'judul'=>'Agenda Kegiatan Bulan Ini',
            'breadcrumb'=>array('Agenda', "Agenda Kegiatan Bulan Ini"),
        );
        $this->load->view('admin/agenda/agenda_print2', $data);
    }

    public function print_y()
    {
        $data = array(
            'agenda_data' => $this->Agenda_model->get_year($this->input->post("year")),
            'judul'=>'Agenda Kegiatan Tahun '.$this->input->post("year"),
            'breadcrumb'=>array('Agenda', 'Agenda Kegiatan Tahun '.$this->input->post("year")),
        );
        $this->load->view('admin/agenda/agenda_print2', $data);
    }

}

/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-13 15:00:04 */
/* http://harviacode.com */