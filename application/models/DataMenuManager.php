<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 1/17/2018
 * Time: 11:04 AM
 */
class DataMenuManager extends MY_Model {

    function returnparentmenus()
    {

        $sql = "SELECT t0.ID_MENU AS lvl0_id, t0.MENU_TITLE AS lvl0_name, t0.MENU_TITLE_EN AS lvl0_name_en, t0.MENU_PARENT AS lv10_menuparent,t0.URL as lv10_link, t1.ID_MENU AS lvl1_id, t1.MENU_TITLE as lvl1_name, t1.MENU_TITLE_EN as lvl1_name_en,t1.MENU_PARENT AS lv11_menuparent,t1.URL as lv11_link, t2.ID_MENU AS lvl2_id, t2.MENU_TITLE as lvl2_name, t2.MENU_TITLE_EN as lvl2_name_en,t2.MENU_PARENT AS lv12_menuparent,t2.URL as lv12_link, t3.ID_MENU AS lvl3_id, t3.MENU_TITLE as lvl3_name, t3.MENU_TITLE_EN as lvl3_name_en,t3.MENU_PARENT AS lv13_menuparent,t3.URL as lv13_link FROM menumanager AS t0 LEFT JOIN menumanager AS t1 ON t1.MENU_PARENT = t0.ID_MENU LEFT JOIN menumanager AS t2 ON t2.MENU_PARENT = t1.ID_MENU LEFT JOIN menumanager AS t3 ON t3.MENU_PARENT = t2.ID_MENU  ";

        $sql .= " ORDER BY t0.MENU_ORDER,t1.MENU_ORDER,t2.MENU_ORDER,t3.MENU_ORDER ";

        $query = $this->db->query($sql);
        $result = $query->result_array();//$query->next_result();
        $query->free_result();

        return $result;
    }

    function updateMenu($id, $parentId, $order)
    {
        $this->db->limit(1, 0);
        $this->db->select_max('MENU_ORDER');
        $this->db->from('menumanager');
        $row1 = $this->db->get()->row();

        $myorder = $row1->MENU_ORDER == 0 ? 1 : $row1->MENU_ORDER + 1;
        $data = array(
            'MENU_PARENT' => $parentId,
            'MENU_SORT'   => $order,
            'MENU_ORDER'  => $myorder
        );

        $this->db->where('ID_MENU', $id);
        $this->db->update('menumanager', $data);

        return $id;
    }

    function resetMenuManagerOrder()
    {
        $data = array(
            'MENU_ORDER' => 0
        );
        $this->db->update('menumanager', $data);
    }

    function getTopOrderPlusOne()
    {
        $this->db->select_max('MENU_ORDER');
        $this->db->from('menumanager');
        $row1 = $this->db->get()->row();

        return $row1->MENU_ORDER + 1;
    }

    function getParentOrder($parentId)
    {
        $this->db->limit(1, 0);
        $this->db->from('menumanager');
        $this->db->where(array('MENU_PARENT' => $parentId));
        $this->db->order_by('MENU_ORDER', 'DESC');
        $row = $this->db->get()->row();
        if (isset($row))
            return $row->MENU_ORDER + 1;

        $this->db->from('menumanager');
        $this->db->where(array('ID_MENU' => $parentId));
        $row = $this->db->get()->row();
        if (isset($row))
            return $row->MENU_ORDER + 1;
    }

    function incrementOrder($number)
    {
        $sql = 'UPDATE menumanager SET `MENU_ORDER` = `MENU_ORDER`+1 WHERE `MENU_ORDER`> ' . $number;
        $this->db->query($sql);
    }
}