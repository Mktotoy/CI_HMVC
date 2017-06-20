<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Videos_model extends CI_Model
{

    public $table = 'videos';
    public $id = array('videoId',);
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        foreach($this->id as $v)
                $this->db->order_by($v, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_all_array()
    {
        foreach($this->id as $v)
                $this->db->order_by($v, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($ids)
    {
        foreach($this->id as $v)
            $this->db->where($v, $ids[$v]);
        
        return $this->db->get($this->table)->row();
    }
    
    // get data by col
    function get_by_cols($array = array())
    {
        foreach($array as $col=>$val)
            $this->db->where($col, $val);        
        return $this->db->get($this->table)->result();
    }
    // get data by col array
    function get_by_cols_array($array = array())
    {
        foreach($array as $col=>$val)
            $this->db->where($col, $val);           
        return $this->db->get($this->table)->result_array();
    }
     // get data by cols
    function get_by_cols_array_like($cols = array())
    {
        foreach ($cols as $col=>$val)
            $this->db->like($col,$val);
        return $this->db->get($this->table)->result_array();
    }
     // get data by cols
    function get_by_cols_like($cols = array())
    {
        foreach ($cols as $col=>$val)
            $this->db->like($col,$val);
        return $this->db->get($this->table)->result();
    }
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('videoId', $q);
	$this->db->or_like('videoId', $q);
	$this->db->or_like('videoDate', $q);
	$this->db->or_like('videoTitle', $q);
	$this->db->or_like('videoRessourceId', $q);
	$this->db->or_like('videoState', $q);
	$this->db->or_like('channelID', $q);
	$this->db->or_like('videoThumbnail', $q);
	$this->db->or_like('pertinent', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
            foreach($this->id as $v)
                $this->db->order_by($v, $this->order);
        
        $this->db->like('videoId', $q);
	$this->db->or_like('videoId', $q);
	$this->db->or_like('videoDate', $q);
	$this->db->or_like('videoTitle', $q);
	$this->db->or_like('videoRessourceId', $q);
	$this->db->or_like('videoState', $q);
	$this->db->or_like('channelID', $q);
	$this->db->or_like('videoThumbnail', $q);
	$this->db->or_like('pertinent', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($ids, $data)
    {
        foreach($this->id as $v)
        $this->db->where($v, $ids[$v]);
        
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($ids)
    {
        foreach($this->id as $v)
        $this->db->where($v, $ids[$v]);
        
        $this->db->delete($this->table);
    }}
/* End of file Videos_model.php */
/* Location: ./application/models/Videos_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-19 17:28:01 */
/* http://harviacode.com */