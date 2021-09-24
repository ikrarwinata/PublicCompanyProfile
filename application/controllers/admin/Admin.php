<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if($this->session->userdata(session_key())!=1){
            redirect("Home");
        }

        set_timezone();
    }

    public function laporan(){
        $data = array(
            'konten'=>"admin/laporan",
            'judul'=>"Laporan",
            'breadcrumb'=>array("Laporan"),
        );
        $this->load->view("admin/container", $data);        
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
            'konten'=>"admin/home",
            'judul'=>"Dashboard",
            'breadcrumb'=>array("Dashboard"),
            'script'=>$script,
            'inline_script'=> "admin/home_script",
            'bootstrap'=>$btsr,
            'agenda_data'=>$this->Agenda_model->get_this_year(),
            'jumlah_agenda'=>$this->Agenda_model->total_rows(),
            'jumlah_agenda_terlewati'=>$this->Agenda_model->total_rows_terlewati(),
            'jumlah_agenda_akandatang'=>$this->Agenda_model->total_rows_akandatang(),
        );
        $this->load->view("admin/container", $data);
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