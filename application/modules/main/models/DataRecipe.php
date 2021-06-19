<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 4:00 PM
 */
class DataRecipe extends MY_Model {

    function getRelationshipDataOrderBy($limit, $start, $table,$select, $referencedTable, $condition)
    {
        $data = null;
        if (isset($limit))
            $this->db->limit($limit, $start);
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
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