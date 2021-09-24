<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        set_timezone();
    }

    public function index()
    {
        if($this->session->userdata(session_key())==1){
            $this->login_action($this->session->userdata("Username"), $this->session->userdata("Password Clear") <> ""?$this->session->userdata("Password Clear"):$this->session->userdata("Password"));
        }else{
            $btsr = array(
                'assets/public_home/css/owl.carousel.min.css',
                'assets/public_home/css/owl.theme.default.min.css'
            );
            $data = array(
                'total_agenda'=>$this->db->select("COUNT(*) AS res")->get("agenda")->row()->res,
                'total_anggota'=>$this->db->select("COUNT(*) AS res")->where("level", "Anggota")->get("anggota_view")->row()->res,
                'konten'=>"home",
                'judul'=>"Halaman Awal",
                'bootstrap'=>$btsr,
            );
            $this->load->view("container", $data);
        }
    }

    public function syarat_anggota()
    {
        $data = array(
            'judul' => "Syarat Menjadi Anggota",
            'konten'=>'syarat',
        );
        $this->load->view('container', $data);
    }

    public function hak()
    {
        $data = array(
            'judul' => "Hak & Kewajiban Anggota",
            'konten'=>'hak',
        );
        $this->load->view('container', $data);
    }

    public function pembayaran()
    {
        $data = array(
            'judul' => "Pembayaran Anggota",
            'konten'=>'pembayaran',
        );
        $this->load->view('container', $data);
    }

    public function agenda()
    {
        $this->load->model("Agenda_model");
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/agenda?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/agenda?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/agenda';
            $config['first_url'] = base_url() . 'Welcome/agenda';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Agenda_model->total_rows_public($q);
        $agenda = $this->Agenda_model->get_limit_data_public($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'agenda_data' => $agenda,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => "Agenda Kegiatan",
            'konten'=>'agenda',
        );
        $this->load->view('container', $data);
    }

    public function detail_agenda($id)
    {
        $this->load->model("Agenda_model");
        $this->load->model("Gallery_model");

        $row = $this->Agenda_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id' => $row->id,
            'ajudul' => $row->judul,
            'tempat' => $row->tempat,
            'deskripsi' => $row->deskripsi,
            'tanggal' => $row->tanggal,
            'bulan' => $row->bulan,
            'tahun' => $row->tahun,
            'gambar' => $row->gambar,
            'gallery' => $this->Gallery_model->get_by_idagenda($row->id),
            'userpost' => $row->userpost,
            'tampilkan' => $row->tampilkan,
            'judul' => "Agenda Kegiatan",
            'konten'=>'detail_agenda',
            );
            $this->load->view('container', $data);
        } else {
            $this->session->set_flashdata('message', 'Uppss... Data tidak ditemukan');
            redirect('Welcome/agenda');
        }
    }

    public function anggota()
    {
        $this->load->model("User_model");
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
            'konten'=>'member',
        );
        $this->load->view("container", $data);
    }

    public function member($id) 
    {
        $this->load->model("User_model");
        $this->load->library('form_validation');
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
                'konten'=>'member_detail',
            );
            $this->load->view("container", $data);
        } else {
            $this->session->set_flashdata('message', 'Upss!!! Sepertinya anggota tersebut tidak tersedia...');
            redirect('Welcome/anggota');
        }
    }
    
    public function komentar() 
    {
        $data = array(
            'nama' => $this->input->post('nama',TRUE),
            'email' => $this->input->post('email',TRUE),
            'subject' => $this->input->post('subject',TRUE),
            'pesan' => $this->input->post('pesan',TRUE),
        );
        $this->load->model("Komentar_model");
        $this->Komentar_model->insert($data);
        ?>
        <script type="text/javascript">
            alert("Pesan anda telah dikirim kepada administrator kami, terimakasi atas pesan/kritik/saran anda.")
            window.history.go(-1);
        </script>
        <?php
    }

    public function tentang()
    {
        $data = array(
            'total_agenda'=>$this->db->select("COUNT(*) AS res")->get("agenda")->row()->res,
            'total_anggota'=>$this->db->select("COUNT(*) AS res")->get("anggota")->row()->res,
            'konten'=>"tentang",
            'judul'=>"Tentang",
        );
        $this->load->view("container", $data);
    }

    public function login()
    {
        $this->load->view("login");
    }

    public function login_admin()
    {
        $this->load->view("login");
    }

    public function login_action($ug=NULL, $pg=NULL){
        $u = $ug==NULL?$this->input->post("Username"):$ug;
        $p = $pg==NULL?$this->input->post("Password"):$pg;

        $this->load->model("User_model");

        $akun_data = $this->User_model->get_akun($u, md5($p));

        $ref = "User";
        if($akun_data){
            $sess_data['Username'] = $akun_data->username;
            $sess_data['Password'] = $akun_data->uassword;
            $sess_data['Password Clear'] = $p;
            $sess_data['Nama'] = $akun_data->nama;
            $sess_data['Level'] = $akun_data->level;

            switch ($akun_data->level) {
                case 'Admin':
                    // Administrator
                    $ref = "Admin";
                    break;
                case 'Anggota':
                    // User
                    $ref = "User";
                    break;
                default:
                    // User
                    $ref = "User";
                    break;
            }

			$sess_data[session_key()] = 1;
			$this->session->set_userdata($sess_data);
			redirect($ref);
        }else{
            $this->session->unset_userdata("Username");
            $this->session->unset_userdata("Password");
            $this->session->unset_userdata("Nama");       
            $this->session->unset_userdata("Level");
            $this->session->unset_userdata(session_key());
            $this->session->set_flashdata('message', 'Username atau password yang anda masukan salah !');
			?>
            <script type="text/javascript">
                window.history.go(-1);
            </script>
            <?php
		}
    }

    public function logout(){
        $this->session->unset_userdata("NIK");
        $this->session->unset_userdata("Username");
        $this->session->unset_userdata("Password");
        $this->session->unset_userdata("Nama");        
        $this->session->unset_userdata("Foto");
        $this->session->unset_userdata("Level");
        $this->session->unset_userdata(session_key());
        session_destroy();
        redirect("");
    }

}