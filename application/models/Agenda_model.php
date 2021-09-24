<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda_model extends CI_Model
{

    public $table = 'agenda';
    public $id = 'id';
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
    function get_all_this_month()
    {
        $this->db->where("bulan", date("m"));
        $this->db->where("tahun", date("Y"));
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_year($y)
    {
        $this->db->where("tahun", $y);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_this_year()
    {
        $this->db->where("tahun", date("Y"));
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        if($q != NULL){
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    // get total rows
    function total_rows_terlewati($q = NULL) {
        $this->db->group_start();
        $date = date_create();
        $time = date_timestamp_get($date);
        $this->db->where('timestamps <=', $time);
        $this->db->group_end();
        if($q != NULL){
            $this->db->group_start();
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
            $this->db->group_end();
        };
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    // get total rows
    function total_rows_akandatang($q = NULL) {
        $this->db->group_start();
        $date = date_create();
        $time = date_timestamp_get($date);
        $this->db->where('timestamps >', $time);
        $this->db->group_end();
        if($q != NULL){
            $this->db->group_start();
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
            $this->db->group_end();
        };
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        if($q != NULL){
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
        }
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data_terlewati($limit, $start = 0, $q = NULL) {
        $this->db->group_start();
        $date = date_create();
        $time = date_timestamp_get($date);
        $this->db->where('timestamps <=', $time);
        $this->db->group_end();
        if($q != NULL){
            $this->db->group_start();
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
            $this->db->group_end();
        };
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data_akandatang($limit, $start = 0, $q = NULL) {
        $this->db->group_start();
        $date = date_create();
        $time = date_timestamp_get($date);
        $this->db->where('timestamps >', $time);
        $this->db->group_end();
        if($q != NULL){
            $this->db->group_start();
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
            $this->db->group_end();
        };
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows_public($q = NULL) {
        $this->db->group_start();
        $this->db->where('tampilkan', "1");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
            $this->db->group_end();
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_public($limit, $start = 0, $q = NULL) {
        $this->db->group_start();
        $this->db->where('tampilkan', "1");
        $this->db->group_end();

        if($q != NULL){
            $this->db->group_start();
            $this->db->like('judul', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->or_like('tanggal', $q);
            $this->db->or_like('bulan', $q);
            $this->db->or_like('tahun', $q);
            $this->db->group_end();
        }
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

/* End of file Agenda_model.php */
/* Location: ./application/models/Agenda_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-13 15:00:04 */
/* http://harviacode.com */