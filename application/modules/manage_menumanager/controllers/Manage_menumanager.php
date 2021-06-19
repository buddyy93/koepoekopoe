<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 1/17/2018
 * Time: 10:32 AM
 */
class Manage_menumanager extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataMenuManager');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = '/new/public/ckeditor/';
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '300px';
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/new/public/ckfinder/');
        if (empty($this->session->userdata('logged_in')))
            redirect(base_url() . 'backoffice');
    }

    public function index()
    {
        $data['datas'] = $this->DataMenuManager
            ->getAllData('menumanager');
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_menumanager/menumanager', $data);
        $this->template->publish();
    }

    public function tambahMenuManager()
    {
        if ($this->isPost())
        {
            $this->menumanager_submit();
            $order = $this->DataMenuManager->getTopOrderPlusOne();
            if ($this->input->post('top_menu') != 0)
            {
                $order = $this->DataMenuManager->getParentOrder($this->input->post('top_menu'));
                $this->DataMenuManager->incrementOrder($order);
            }
            $this->DataMenuManager->addData('menumanager', array(
                'MENU_PARENT'     => $this->input->post('top_menu'),
                'MENU_TITLE'      => $this->input->post('title_id'),
                'MENU_TITLE_EN'   => $this->input->post('title_en'),
                'URL'             => $this->input->post('url'),
                'MENU_SORT'       => 1,
                'MENU_KONTEN'     => $this->input->post('content_id'),
                'MENU_KONTEN_EN'  => $this->input->post('content_en'),
                'MENU_TARGET'     => $this->input->post('target'),
                'STATUS'          => $this->input->post('status'),
                'STATUS_KOMENTAR' => $this->input->post('komentar'),
                'MENU_ORDER'      => $order
            ));
            redirect(base_url() . 'manage_menumanager', 'refresh');
        } else
        {
            $data['top_menus'] = $this->DataMenuManager->getAllData('menumanager');
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_menumanager/tambah_menumanager', $data);
            $this->template->publish();
        }
    }

    public function editMenuManager($menuid)
    {
        if ($this->isPost())
        {
            $this->menumanager_submit();
            if ($this->input->post('top_menu') != 0)
            {
                $order = $this->DataMenuManager->getParentOrder($this->input->post('top_menu'));
                $this->DataMenuManager->incrementOrder($order);
                $this->DataMenuManager->updateData(array(
                    'MENU_PARENT'     => $this->input->post('top_menu'),
                    'MENU_TITLE'      => $this->input->post('title_id'),
                    'MENU_TITLE_EN'   => $this->input->post('title_en'),
                    'URL'             => $this->input->post('url'),
                    'MENU_SORT'       => 1,
                    'MENU_KONTEN'     => $this->input->post('content_id'),
                    'MENU_KONTEN_EN'  => $this->input->post('content_en'),
                    'MENU_TARGET'     => $this->input->post('target'),
                    'STATUS'          => $this->input->post('status'),
                    'STATUS_KOMENTAR' => $this->input->post('komentar'),
                    'MENU_ORDER'      => $order
                ), array('ID_MENU' => $menuid), 'menumanager');
            } else
            {
                $this->DataMenuManager->updateData(array(
                    'MENU_PARENT'     => $this->input->post('top_menu'),
                    'MENU_TITLE'      => $this->input->post('title_id'),
                    'MENU_TITLE_EN'   => $this->input->post('title_en'),
                    'URL'             => $this->input->post('url'),
                    'MENU_SORT'       => 1,
                    'MENU_KONTEN'     => $this->input->post('content_id'),
                    'MENU_KONTEN_EN'  => $this->input->post('content_en'),
                    'MENU_TARGET'     => $this->input->post('target'),
                    'STATUS'          => $this->input->post('status'),
                    'STATUS_KOMENTAR' => $this->input->post('komentar')
                ), array('ID_MENU' => $menuid), 'menumanager');
            }
            redirect(base_url() . 'manage_menumanager', 'refresh');
        } else
        {
            $data['top_menus'] = $this->DataMenuManager->getAllData('menumanager');
            $data['menu'] = $this->DataMenuManager->getSpecificData('menumanager', array('ID_MENU' => $menuid));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_menumanager/edit_menumanager', $data);
            $this->template->publish();
        }
    }

    public function deleteMenumanager($id)
    {
        $this->DataMenuManager->deleteData('menumanager', array('ID_MENU' => $id));
        redirect(base_url() . 'manage_menumanager', 'refresh');
    }

    public function sorting()
    {
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_menumanager/sorting_menumanager');
        $this->template->publish();
    }

    public function showmenus()
    {
        $categories = array();
        $pool = array();
        $q = $this->DataMenuManager->returnparentmenus();
        foreach ($q as $row)
        {
            if (in_array($row['lvl0_id'], $pool) === false && isset($row['lvl0_name']) && !is_null($row['lvl0_name']))
            {
                $c = array('id'   => $row['lvl0_id'],
                           'name' => $row['lvl0_name'],
                           'link' => $row['lv10_link'],
                           'level' => 0);
                $categories[] = $c;
            }
            if (in_array($row['lvl1_id'], $pool) === false && isset($row['lvl1_name']) && !is_null($row['lvl1_name']))
            {
                $c = array('id'    => $row['lvl1_id'],
                           'name'  => $row['lvl1_name'],
                           'link'  => $row['lv11_link'],
                           'level' => 1);
                $categories[] = $c;
            }
            if (in_array($row['lvl2_id'], $pool) === false && isset($row['lvl2_name']) && !is_null($row['lvl2_name']))
            {
                $c = array('id'    => $row['lvl2_id'],
                           'name'  => $row['lvl2_name'],
                           'link'  => $row['lv12_link'],
                           'level' => 2);
                $categories[] = $c;
            }
            if (in_array($row['lvl3_id'], $pool) === false && isset($row['lvl3_name']) && !is_null($row['lvl3_name']))
            {
                $c = array('id'    => $row['lvl3_id'],
                           'name'  => $row['lvl3_name'],
                           'link'  => $row['lv13_link'],
                           'level' => 3);
                $categories[] = $c;
            }
            $pool[] = $row['lvl0_id'];
            $pool[] = $row['lvl1_id'];
            $pool[] = $row['lvl2_id'];
            $pool[] = $row['lvl3_id'];
        }
        /*
        Sample outoput: [{"id":"1","name":"Home","class":null,"link":"#","level":0},{"id":"2","name":"How","class":null,"link":"#","level":0}]
        */
        echo json_encode($categories);
        exit;

    }

    public function updateSorting()
    {
        $this->DataMenuManager->resetMenuManagerOrder();
        $response = json_decode($_POST['s'], true); // decoding received JSON to array
        if (is_array($response))
        {
            //start saving now
            $topmenusorder = 1;
            foreach ($response as $key => $block)
            {
                $menuid = $this->DataMenuManager->updateMenu($block['id'], 0, $topmenusorder);

                if (isset($block['children']))
                {
                    //loopMe($block['children']);
                    // loopChildren($block['link']['children']); /* children loop*/
                    $this->updateChildSubmenus($menuid, $block['children']);
                }
                $topmenusorder ++;
            }
        } //if is_array($response);
        echo 1;
        exit;
    }

    public function updateChildSubmenus($menuid, $e)
    {
        $topmenusorder = 1;
        foreach ($e as $key => $block)
        {
            //echo $block['link'].' '.$block['cls'].' '.$block['id'].' '.$block['label'].'<br/>'; /* echo parent*/
            $menu = $this->DataMenuManager->updateMenu($block['id'], $menuid, $topmenusorder);
            if (isset($block['children']))
            {
                $this->updateChildSubmenus($menu, $block['children']);
            }
            $topmenusorder ++;
        }
    }

    protected function menumanager_submit()
    {
        $this->form_validation->set_rules('top_menu', 'Top Menu', 'required');
        $this->form_validation->set_rules('title_id', 'Title ID', 'required');
        $this->form_validation->set_rules('title_en', 'Title EN', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('target', 'Target', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            $this->setMenumanagerFlash();
            redirect(current_url() . "#errors");
        }
    }

    public function setMenumanagerFlash()
    {
        $this->session->set_flashdata('top_menu', $this->input->post('top_menu'));
        $this->session->set_flashdata('title_id', $this->input->post('title_id'));
        $this->session->set_flashdata('title_en', $this->input->post('title_en'));
        $this->session->set_flashdata('content_id', $this->input->post('content_id'));
        $this->session->set_flashdata('content_en', $this->input->post('content_en'));
        $this->session->set_flashdata('url', $this->input->post('url'));
        $this->session->set_flashdata('target', $this->input->post('target'));
        $this->session->set_flashdata('status', $this->input->post('status'));
    }
}