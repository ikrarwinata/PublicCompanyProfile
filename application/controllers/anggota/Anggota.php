<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if($this->session->userdata(session_key())!=1){
            redirect("Home");
        }

        set_timezone();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $btsr = array(
            'assets/plugins/fullcalendar/main.min.css',
            'assets/plugins/fullcalendar-daygrid/main.min.css',
            'assets/plugins/fullcalendar-timegrid/main.min.css',
            'assets/plugins/fullcalendar-bootstrap/main.min.css',
        );
        $script = array(
            'assets/plugins/jquery-ui/jquery-ui.min.js',
            'assets/plugins/moment/moment.min.js',
            'assets/plugins/fullcalendar/main.min.js',
            'assets/plugins/fullcalendar-daygrid/main.min.js',
            'assets/plugins/fullcalendar-timegrid/main.min.js',
            'assets/plugins/fullcalendar-interaction/main.min.js',
            'assets/plugins/fullcalendar-bootstrap/main.min.js',
        );
        $this->load->model("Agenda_model");
        $data = array(
            'konten'=>"anggota/home",
            'judul'=>"Dashboard",
            'breadcrumb'=>array("Dashboard"),
            'script'=>$script,
            'inline_script'=> "anggota/home_script",
            'bootstrap'=>$btsr,
            'agenda_data'=>$this->Agenda_model->get_this_year(),
            'jumlah_agenda'=>$this->Agenda_model->total_rows(),
            'jumlah_agenda_terlewati'=>$this->Agenda_model->total_rows_terlewati(),
            'jumlah_agenda_akandatang'=>$this->Agenda_model->total_rows_akandatang(),
        );
        $this->load->view("anggota/container", $data);
    }
    
    public function profil() 
    {
        $this->load->model("User_model");
        $row = $this->User_model->get_by_id($this->session->userdata("Username"));

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('anggota/Anggota/update_action'),
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
                'judul' => "Ubah Profil Perusahaan Anda",
                'breadcrumb' => array("Akun Pengguna", "Ubah Profil Perusahaan"),
                'konten'=>'anggota/user/user_form',
                'script'=>array('assets/js/anggota-form.js'),
            );
            $this->load->view("anggota/container", $data);
        } else {
            $this->session->set_flashdata('message', 'Upss!!! Sepertinya akun tersebut tidak tersedia');
            redirect('logout');
        }
    }
    
    public function update_action() 
    {
        $this->load->model("User_model");
        $username = str_replace(" ", NULL, $this->input->post('username',TRUE));

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
        $this->User_model->update($this->input->post('oldusername',TRUE), $datauser);


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
        redirect('User');
    }
    
    public function change_pass() 
    {
        $data = array(
            'password' => md5($this->input->post('password',TRUE)),
            );

        $this->load->model("User_model");
        $this->User_model->update($this->session->userdata("Username"), $data);
        ?>
        <script type="text/javascript">
            window.history.go(-1);
        </script>
        <?php
    }

}