<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/14/2017
 * Time: 2:10 PM
 */
class MY_Model extends CI_Model {

    public function record_count($table)
    {
        return $this->db->count_all($table);
    }

    function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function deleteData($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $row = $this->db->get()->row();
        if (isset($row->FOTO) && $row->FOTO != 'null.png')
            unlink('./uploads/' . $row->FOTO);
        $this->db->delete($table, $where);
    }

    public function updateData($data, $where, $table)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($table);
    }

    public function getRelationshipSpecificData($table, $select, $referencedTable, $condition, $where)
    {
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
        $this->db->where($where);
        $row = $this->db->get()->row();
        if (isset($row))
            return $row;
        else
            return null;
    }

    function getRelationshipData($limit, $start, $table,$select, $referencedTable, $condition)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }

    public function searchData($limit, $start, $table, $referencedTable, $condition, $where)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);

        $this->db->select('*');
        $this->db->from($table);
        if (isset($referencedTable))
            $this->db->join($referencedTable, $condition);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    function countSearchData($table, $referencedTable, $condition, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        if (isset($referencedTable))
            $this->db->join($referencedTable, $condition);
        $this->db->where($where);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getData($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);

        $query = $this->db->get($table);
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return $data;
    }

    public function getAllData($table)
    {
        $data = null;
        $query = $this->db->get($table);
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return null;
    }

    public function getSpecificData($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $row = $this->db->get()->row();

        return $row;
    }

    public function checkRecord($table,$where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public function incrementLikeCount($table, $where)
    {
        $count = $this->getSpecificData($table,$where);
        $count->LIKE_COUNT++;
        $this->db->set('LIKE_COUNT', $count->LIKE_COUNT);
        $this->db->where($where);
        $this->db->update($table);
    }
}