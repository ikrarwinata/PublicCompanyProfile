<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'username';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all_member()
    {
        $this->db->where('level', "Anggota");

        $this->db->order_by($this->id, $this->order);
        return $this->db->get("anggota_view")->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get("anggota_view")->row();
    }
    

    // get data by id
    function get_akun($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows_all($q = NULL) {
        $this->db->like('username', $q);
    $this->db->or_like('password', $q);
    $this->db->or_like('nama', $q);
    $this->db->or_like('level', $q);
    $this->db->or_like('email', $q);
    $this->db->or_like('telepon', $q);
    $this->db->from("anggota_view");
        return $this->db->count_all_results();
    }
    
    // get total rows
    function total_rows_member($q = NULL) {

        $this->db->group_start();
        $this->db->where('level', "Anggota");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('username', $q);
            $this->db->or_like('password', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('level', $q);
            $this->db->or_like('email', $q);
            $this->db->or_like('telepon', $q);
            $this->db->group_end();
        }

        $this->db->from("anggota_view");
        return $this->db->count_all_results();
    }
    
    // get total rows
    function total_rows_admin($q = NULL) {

        $this->db->group_start();
        $this->db->where('level', "Anggota");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('username', $q);
            $this->db->or_like('password', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('level', $q);
            $this->db->or_like('email', $q);
            $this->db->or_like('telepon', $q);
            $this->db->group_end();
        }

        $this->db->from("anggota_view");
        return $this->db->count_all_results();
    }
    
    // get total rows
    function total_rows_leader($q = NULL) {

        $this->db->group_start();
        $this->db->where('level', "Pimpinan");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('username', $q);
            $this->db->or_like('password', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('level', $q);
            $this->db->or_like('email', $q);
            $this->db->or_like('telepon', $q);
            $this->db->group_end();
        }

        $this->db->from("anggota_view");
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_all($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('username', $q);
    $this->db->or_like('password', $q);
    $this->db->or_like('nama', $q);
    $this->db->or_like('level', $q);
    $this->db->or_like('email', $q);
    $this->db->or_like('telepon', $q);
    $this->db->limit($limit, $start);
        return $this->db->get("anggota_view")->result();
    }

    // get data with limit and search
    function get_limit_data_member($limit, $start = 0, $q = NULL) {

        $this->db->group_start();
        $this->db->where('level', "Anggota");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('username', $q);
            $this->db->or_like('password', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('level', $q);
            $this->db->or_like('email', $q);
            $this->db->or_like('telepon', $q);
            $this->db->group_end();
        }

        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get("anggota_view")->result();
    }

    // get data with limit and search
    function get_limit_data_admin($limit, $start = 0, $q = NULL) {

        $this->db->group_start();
        $this->db->where('level', "Admin");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('username', $q);
            $this->db->or_like('password', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('level', $q);
            $this->db->or_like('email', $q);
            $this->db->or_like('telepon', $q);
            $this->db->group_end();
        }

        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get("anggota_view")->result();
    }

    // get data with limit and search
    function get_limit_data_leader($limit, $start = 0, $q = NULL) {

        $this->db->group_start();
        $this->db->where('level', "Pimpinan");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('username', $q);
            $this->db->or_like('password', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('level', $q);
            $this->db->or_like('email', $q);
            $this->db->or_like('telepon', $q);
            $this->db->group_end();
        }

        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get("anggota_view")->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-14 15:21:29 */
/* http://harviacode.com */