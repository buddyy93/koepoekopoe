<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/14/2017
 * Time: 4:45 PM
 */
class Manage_slider extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataSlider');
        $this->load->model('DataProduct');
        $this->load->model('DataRecipe');
        $this->numOfContentsPerPage = 50;
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
        $search = $this->input->post('search');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if (isset($search))
        {
            $this->search();
        } else
        {
            $this->initialize_pagination(base_url("manage_slider/index"), 'slider', 'DataSlider', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataSlider
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'slider');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_slider/slider', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_slider/search"),
            'slider',
            'Dataslider',
            $this->Dataslider->countSearchData(
                'slider',
                null,
                null,
                'NAMA_SLIDER LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->Dataslider
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'slider',
                null,
                null,
                'NAMA_SLIDER LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_slider/slider', $data);
        $this->template->publish();
    }

    public function tambahSlider()
    {
        if ($this->isPost())
        {
            $filename = $this->slider_submit();
            $this->DataProduct->addData('slider', array(
                'HEADING'             => $this->input->post('heading_id'),
                'EN_HEADING'          => $this->input->post('heading_en'),
                'LINK_SLIDER'         => $this->input->post('link_slider'),
                'DESKRIPSI_SLIDER'    => $this->input->post('deskripsi_id'),
                'EN_DESKRIPSI_SLIDER' => $this->input->post('deskripsi_en'),
                'FOTO'                => $filename
            ));
            redirect(base_url() . 'manage_slider', 'refresh');
        } else
        {
            $data['products'] = $this->DataProduct->getAllData('produk');
            $data['recipes'] = $this->DataRecipe->getAllData('resep');
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_slider/tambah_slider', $data);
            $this->template->publish();
        }
    }

    public function deleteSlider($id)
    {
        $this->DataProduct->deleteData('slider', array('ID_SLIDER' => $id));
        redirect(base_url() . 'manage_slider', 'refresh');
    }

    public function editSlider($id)
    {
        if ($this->isPost())
        {
            $filename = $this->slider_submit();
            if(isset($filename))
            {
                $this->DataSlider->updateData(array(
                    'HEADING'             => $this->input->post('heading_id'),
                    'EN_HEADING'          => $this->input->post('heading_en'),
                    'LINK_SLIDER'         => $this->input->post('link_slider'),
                    'DESKRIPSI_SLIDER'    => $this->input->post('deskripsi_id'),
                    'EN_DESKRIPSI_SLIDER' => $this->input->post('deskripsi_en'),
                    'FOTO'                => $filename
                ), array('ID_SLIDER' => $id), 'slider');
                redirect(base_url() . 'manage_slider', 'refresh');
            }
            else{
                $this->DataSlider->updateData(array(
                    'HEADING'             => $this->input->post('heading_id'),
                    'EN_HEADING'          => $this->input->post('heading_en'),
                    'LINK_SLIDER'         => $this->input->post('link_slider'),
                    'DESKRIPSI_SLIDER'    => $this->input->post('deskripsi_id'),
                    'EN_DESKRIPSI_SLIDER' => $this->input->post('deskripsi_en'),
                ), array('ID_SLIDER' => $id), 'slider');
                redirect(base_url() . 'manage_slider', 'refresh');
            }
        } else
        {
            $data['slider'] = $this->DataSlider->getSpecificData('slider', array('ID_SLIDER' => $id));
            $data['products'] = $this->DataProduct->getAllData('produk');
            $data['recipes'] = $this->DataRecipe->getAllData('resep');
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_slider/edit_slider', $data);
            $this->template->publish();
        }
    }

    public function do_upload()
    {
        if ($_FILES['foto']['size'] <= 0)
        {
            return null;
        }
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['file_name'] = 'slider_'.$config['file_name'];
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto'))
        {
            $this->session->set_flashdata('error', $this->upload->display_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        } else
        {
            $upload_data = $this->upload->data();

            return $upload_data['file_name'];
        }
    }

    protected function slider_submit()
    {
        $this->form_validation->set_rules('heading_id', 'Heading ID', 'required');
        $this->form_validation->set_rules('heading_en', 'Heading EN', 'required');
        $this->form_validation->set_rules('link_slider','Link Slider','required');
        $this->form_validation->set_rules('deskripsi_id', 'Deskripsi ID', 'required');
        $this->form_validation->set_rules('deskripsi_en', 'Deskripsi EN', 'required');

        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        } else
        {
            return $this->do_upload();
        }
    }
}