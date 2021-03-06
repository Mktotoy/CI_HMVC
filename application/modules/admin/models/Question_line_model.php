<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question_line_model extends CI_Model
{

    public $table = 'question_line';
    public $id = 'question_lineId';
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
    function get_all_array()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get data by col
    function get_by_col($col,$val)
    {
        $this->db->where($col, $val);        
        return $this->db->get($this->table)->result();
    }
    // get data by col array
    function get_by_col_array($col,$val)
    {
        $this->db->where($col,$val);        
        return $this->db->get($this->table)->result_array();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('question_lineId', $q);
	$this->db->or_like('question_lineId', $q);
	$this->db->or_like('questionId', $q);
	$this->db->or_like('question_lineText', $q);
	$this->db->or_like('question_lineTrue', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('question_lineId', $q);
	$this->db->or_like('questionId', $q);
	$this->db->or_like('question_lineText', $q);
	$this->db->or_like('question_lineTrue', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
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
    }}
/* End of file Question_line_model.php */
/* Location: ./application/models/Question_line_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */