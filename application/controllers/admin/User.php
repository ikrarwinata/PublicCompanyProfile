<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index(){
        redirect("admin/User/all");
    }

    public function all()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/User/all?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/User/all?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/User/all';
            $config['first_url'] = base_url() . 'admin/User/all';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows_all($q);
        $user = $this->User_model->get_limit_data_all($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => "Akun Pengguna",
            'breadcrumb' => array("Akun Pengguna", "Semua Akun"),
            'ref' => "admin/User/all",
            'konten'=>'admin/user/user_list',
        );
        $this->load->view("admin/container", $data);
    }

    public function member()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/User/member?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/User/member?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/User/member';
            $config['first_url'] = base_url() . 'admin/User/member';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows_member($q);
        $user = $this->User_model->get_limit_data_member($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => "Akun Member",
            'breadcrumb' => array("Akun Pengguna", "Akun Member"),
            'ref' => "admin/User/member",
            'konten'=>'admin/user/user_list',
        );
        $this->load->view("admin/container", $data);
    }

    public function admin()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/User/admin?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/User/admin?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/User/admin';
            $config['first_url'] = base_url() . 'admin/User/admin';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows_admin($q);
        $user = $this->User_model->get_limit_data_admin($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => "Akun Administrator",
            'breadcrumb' => array("Akun Pengguna", "Akun Administrator"),
            'ref' => "admin/User/admin",
            'konten'=>'admin/user/user_list',
        );
        $this->load->view("admin/container", $data);
    }

    public function leader()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/User/leader?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/User/leader?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/User/leader';
            $config['first_url'] = base_url() . 'admin/User/leader';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows_leader($q);
        $user = $this->User_model->get_limit_data_leader($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => "Akun Pimpinan",
            'breadcrumb' => array("Akun Pengguna", "Akun Pimpinan"),
            'ref' => "admin/User/leader",
            'konten'=>'admin/user/user_list',
        );
        $this->load->view("admin/container", $data);
    }

    public function printexec($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('admin/User/update_action'),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'nama' => set_value('nama', $row->nama),
                'perusahaan' => set_value('perusahaan', $row->perusahaan),
                'level' => set_value('level', $row->level),
                'email' => set_value('email', $row->email),
                'telepon' => set_value('telepon', $row->telepon),
                'nomor' => set_value('nomor', $row->nomor),
                'alamat' => set_value('alamat', $row->alamat),
                'wilayah' => set_value('wilayah', $row->wilayah),
                'fax' => set_value('fax', $row->fax),
                'website' => set_value('website', $row->website),
                'foto' => set_value('foto', isset($row->foto)?$row->foto:NULL),
                'judul' => "Detail Akun Pengguna",
                'breadcrumb' => array("Akun Pengguna", "Detail Akun Pengguna", $row->perusahaan),
            );
            $this->load->view("admin/user/user_print", $data);
        } else {
            $this->session->set_flashdata('message', 'Upss!!! Sepertinya akun tersebut tidak tersedia');
            redirect('admin/User/all');
        }
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('admin/User/update_action'),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'nama' => set_value('nama', $row->nama),
                'perusahaan' => set_value('perusahaan', $row->perusahaan),
                'level' => set_value('level', $row->level),
                'email' => set_value('email', $row->email),
                'telepon' => set_value('telepon', $row->telepon),
                'nomor' => set_value('nomor', $row->nomor),
                'alamat' => set_value('alamat', $row->alamat),
                'wilayah' => set_value('wilayah', $row->wilayah),
                'fax' => set_value('fax', $row->fax),
                'website' => set_value('website', $row->website),
                'foto' => set_value('foto', isset($row->foto)?$row->foto:NULL),
                'judul' => "Detail Akun Pengguna",
                'breadcrumb' => array("Akun Pengguna", "Detail Akun Pengguna", $row->perusahaan),
                'konten'=>'admin/user/user_read',
            );
            $this->load->view("admin/container", $data);
        } else {
            $this->session->set_flashdata('message', 'Upss!!! Sepertinya akun tersebut tidak tersedia');
            redirect('admin/User/all');
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('admin/User/create_action'),
    	    'username' => set_value('username'),
    	    'password' => set_value('password'),
            'nama' => set_value('nama'),
    	    'perusahaan' => set_value('perusahaan'),
    	    'level' => set_value('level'),
    	    'email' => set_value('email'),
    	    'telepon' => set_value('telepon'),
            'nomor' => set_value('nomor'),
            'alamat' => set_value('alamat'),
            'wilayah' => set_value('wilayah'),
            'fax' => set_value('fax'),
            'website' => set_value('website'),
            'foto' => set_value('foto'),
            'judul' => "Menambahkan Akun Pengguna",
            'breadcrumb' => array("Akun Pengguna", "Tambah Akun Pengguna"),
            'konten'=>'admin/user/user_form',
            'script'=>array('assets/js/anggota-form.js'),
    	);
        $this->load->view("admin/container", $data);
    }
    
    public function create_action() 
    {
        $username = str_replace(" ", NULL, $this->input->post('username',TRUE));

        $ref = "all";
        $reg = "M";
        switch ($this->input->post('level',TRUE)) {
            case 'Anggota':
                $ref = "member";
                $reg = "M";
                break;
            case 'Admin':
                $ref = "admin";
                $reg = "A";
                break;
            case 'Pimpinan':
                $ref = "leader";
                $reg = "L";
                break;
            default:
                $ref = "all";
                $reg = "M";
                break;
        };

        $this->load->helper(array('form', 'url'));
        $foto = NULL;

        $config['upload_path']          = './uploads/anggota';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 100000;
        $config['max_width']            = 8000;
        $config['max_height']           = 8000;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $udata = $this->upload->data();
            $foto = "uploads/anggota/".date("dmYHis").$udata["file_ext"];
            rename($udata["full_path"], $foto);
        }

        $wilayah = $this->input->post('wilayah',TRUE);
        $nomor = date("Ymd")."/".$reg."/".$this->db->query("SELECT COUNT(*) AS res FROM anggota_view")->row()->res.".".strtoupper(str_shortened($wilayah,5,NULL));

        $datauser = array(
            'username' => $username,
            'password' => md5($this->input->post('password',TRUE)),
            'nama' => $this->input->post('nama',TRUE),
            'level' => $this->input->post('level',TRUE),
            'email' => $this->input->post('email',TRUE),
            'telepon' => $this->input->post('telepon',TRUE),
        );
        $this->User_model->insert($datauser);


        $this->load->model('Anggota_model');
        $dataanggota = array(
            'nomor' => $nomor,
            'nama' => $this->input->post('nama',TRUE),
            'perusahaan' => $this->input->post('perusahaan',TRUE),
            'alamat' => $this->input->post('alamat',TRUE),
            'wilayah' => $wilayah,
            'telepon' => $this->input->post('telepon',TRUE),
            'fax' => $this->input->post('fax',TRUE),
            'website' => $this->input->post('website',TRUE),
            'foto' => $foto,
            'username' => $username,
        );

        $this->Anggota_model->insert($dataanggota);

        $this->session->set_flashdata('message', 'Akun Pengguna Berhasil Ditambahkan');
        redirect('admin/User/'.$ref);
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('admin/User/update_action'),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'nama' => set_value('nama', $row->nama),
                'perusahaan' => set_value('perusahaan', $row->perusahaan),
                'level' => set_value('level', $row->level),
                'email' => set_value('email', $row->email),
                'telepon' => set_value('telepon', $row->telepon),
                'nomor' => set_value('nomor', $row->nomor),
                'alamat' => set_value('alamat', $row->alamat),
                'wilayah' => set_value('wilayah', $row->wilayah),
                'fax' => set_value('fax', $row->fax),
                'website' => set_value('website', $row->website),
                'foto' => set_value('foto', $row->foto),
                'judul' => "Mengubah Akun Pengguna",
                'breadcrumb' => array("Akun Pengguna", "Ubah Akun Pengguna"),
                'konten'=>'admin/user/user_form',
                'script'=>array('assets/js/anggota-form.js'),
            );
            $this->load->view("admin/container", $data);
        } else {
            $this->session->set_flashdata('message', 'Upss!!! Sepertinya akun tersebut tidak tersedia');
            redirect('admin/User/all');
        }
    }
    
    public function update_action() 
    {
        $username = str_replace(" ", NULL, $this->input->post('username',TRUE));
        $oldusername = $this->input->post('oldusername',TRUE);

        $ref = "all";
        $reg = "M";
        switch ($this->input->post('level',TRUE)) {
            case 'Anggota':
                $ref = "member";
                $reg = "M";
                break;
            case 'Admin':
                $ref = "admin";
                $reg = "A";
                break;
            case 'Pimpinan':
                $ref = "leader";
                $reg = "L";
                break;
            default:
                $ref = "all";
                $reg = "M";
                break;
        };

        $this->load->helper(array('form', 'url'));
        $row = $this->db->query("SELECT foto FROM anggota_view WHERE username='$oldusername'")->row();
        $foto = isset($row->foto)?$row->foto:NULL;

        $config['upload_path']          = './uploads/anggota';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 100000;
        $config['max_width']            = 8000;
        $config['max_height']           = 8000;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            if ($foto!=NULL) {
                if (file_exists($foto)) unlink($foto); 
            }
            $udata = $this->upload->data();
            $foto = "uploads/anggota/".date("dmYHis").$udata["file_ext"];
            rename($udata["full_path"], $foto);
        }

        $wilayah = $this->input->post('wilayah',TRUE);
        $nomor = $this->input->post('nomor',TRUE);

        $datauser = array(
            'username' => $username,
            'password' => md5($this->input->post('password',TRUE)),
            'nama' => $this->input->post('nama',TRUE),
            'level' => $this->input->post('level',TRUE),
            'email' => $this->input->post('email',TRUE),
            'telepon' => $this->input->post('telepon',TRUE),
        );
        $this->User_model->update($oldusername, $datauser);


        $this->load->model('Anggota_model');
        $dataanggota = array(
            'nama' => $this->input->post('nama',TRUE),
            'perusahaan' => $this->input->post('perusahaan',TRUE),
            'alamat' => $this->input->post('alamat',TRUE),
            'wilayah' => $wilayah,
            'telepon' => $this->input->post('telepon',TRUE),
            'fax' => $this->input->post('fax',TRUE),
            'website' => $this->input->post('website',TRUE),
            'foto' => $foto,
            'username' => $username,
        );

        $this->Anggota_model->update($nomor, $dataanggota);

        $this->session->set_flashdata('message', 'Akun Pengguna Berhasil Diubah');
        redirect('admin/User/'.$ref);
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $foto = isset($row->foto)?$row->foto:NULL;
            if ($foto!=NULL) {
                if (file_exists($foto)) unlink($foto); 
            }
            $this->load->model('Anggota_model');
            $ref = "all";
            switch ($row->level) {
                case 'Anggota':
                    $ref = "member";
                    break;
                case 'Admin':
                    $ref = "admin";
                    break;
                case 'Pimpinan':
                    $ref = "leader";
                    break;
                default:
                    $ref = "all";
                    break;
            };
            $this->User_model->delete($id);
            $this->Anggota_model->delete_by_username($id);
            $this->session->set_flashdata('message', 'Akun Berhasil Dihapus');
            redirect('Admin/User/'.$ref);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Username");
        xlsWriteLabel($tablehead, $kolomhead++, "Password");
    	xlsWriteLabel($tablehead, $kolomhead++, "Level");
    	xlsWriteLabel($tablehead, $kolomhead++, "Email");
    	xlsWriteLabel($tablehead, $kolomhead++, "Telepon");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->username);
            xlsWriteLabel($tablebody, $kolombody++, $data->password);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->level);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->telepon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/user_doc',$data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-14 15:21:29 */
/* http://harviacode.com */