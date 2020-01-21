<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Test_model extends CI_Model {

    public function add($data)
    {
        $this->db->insert('tb_lokasi', $data);
    }

    public function add1($data)
    {
        $this->db->insert('tb_lokasi', $data);
    }

    public function pemetaan()
    {
        $this->db->select('a.latitude1, a.longitude1');
        $this->db->from('tb_lokasi a');
        $query=$this->db->get();
        return $query->result();
    }

    public function pemetaan2()
    {
        $this->db->select('b.latitude2, b.longitude2');
        $this->db->from('tb_lokasi b');
        $query=$this->db->get();
        return $query->result();
    }
}

/* End of file services_model.php */
    /* Location: ./application/models/news_model.php */