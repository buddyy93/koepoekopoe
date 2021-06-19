<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 4:00 PM
 */
class DataStory extends MY_Model {

    public function getAllDataWhere($table, $where)
    {
        $data = null;
        $this->db->where($where);
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

    function getLimitedData($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
        $this->db->from($table);
        $this->db->order_by('CREATED_AT', 'DESC');
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
        $data = null;
        if (isset($limit))
            $this->db->limit($limit, $start);
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
        $this->db->where($where);
        $this->db->order_by('CREATED_AT', 'DESC');
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