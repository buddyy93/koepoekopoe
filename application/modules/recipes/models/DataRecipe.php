<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 4:00 PM
 */
class DataRecipe extends MY_Model {

    function getRelationshipWhereData($limit, $start, $table,$select,$where, $referencedTable, $condition)
    {
        $order = isset($this->session->order)?$this->session->order:'ASC';

        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('CREATED_AT', $order);
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

    function countRelationshipWhereData($limit, $start, $table,$select,$where, $referencedTable, $condition)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->join($referencedTable, $condition);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countRelatedData($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function searchRecipe($limit, $start, $table)
    {
        $order = isset($this->session->order)?$this->session->order:'ASC';

        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);

        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('CREATED_AT', $order);
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

    function getRelationshipDataOrderBy($limit, $start, $table,$select, $referencedTable, $condition,$where)
    {
        $order = isset($this->session->order)?$this->session->order:'ASC';
        $data = null;
        if (isset($limit))
            $this->db->limit($limit, $start);
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
        if(isset($where))
            $this->db->where($where);
        $this->db->order_by('CREATED_AT', $order);
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
}