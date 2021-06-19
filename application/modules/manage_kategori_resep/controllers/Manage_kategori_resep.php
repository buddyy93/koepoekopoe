<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/14/2017
 * Time: 4:45 PM
 */
class Manage_kategori_resep extends MX_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataRecipeCategory');
        $this->numOfContentsPerPage = 50;
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
            $this->initialize_pagination(base_url("manage_kategori_resep/INDEX"), 'resep_kategori', 'DataRecipeCategory', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataRecipeCategory
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'resep_kategori');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_resep/kategori_resep', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_kategori_resep/search"),
            'resep_kategori',
            'DataRecipeCategory',
            $this->DataRecipeCategory->countSearchData(
                'resep_kategori',
                null,
                null,
                'NAMA_RESEP_KATEGORI LIKE \'%' . $search . '%\' OR EN_NAMA_RESEP_KATEGORI LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataRecipeCategory
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'resep_kategori',
                null,
                null,
                'NAMA_RESEP_KATEGORI LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_kategori_resep/kategori_resep', $data);
        $this->template->publish();
    }

    public function tambahKategoriResep()
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_resep_submit();
            $this->DataRecipeCategory->addData('resep_kategori', array(
                'NAMA_RESEP_KATEGORI' => $this->input->post('nama_kategori_id'),
                'EN_NAMA_RESEP_KATEGORI' => $this->input->post('nama_kategori_en'),
                'FOTO'                => $filename
            ));
            redirect(base_url() . 'manage_kategori_resep', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_resep/tambah_kategori_resep');
            $this->template->publish();
        }
    }

    public function deleteKategoriResep($id)
    {
        $this->DataRecipeCategory->deleteData('resep_kategori', array('ID_RESEP_KATEGORI' => $id));
        redirect(base_url() . 'manage_kategori_resep', 'refresh');
    }

    public function editKategoriResep($id)
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_resep_submit();
            if (isset($filename))
            {
                $this->DataRecipeCategory->updateData(array(
                    'NAMA_RESEP_KATEGORI' => $this->input->post('nama_kategori_id'),
                    'EN_NAMA_RESEP_KATEGORI' => $this->input->post('nama_kategori_en'),
                    'FOTO'                => $filename
                ), array('ID_resep_KATEGORI' => $id), 'resep_kategori');
                redirect(base_url() . 'manage_kategori_resep', 'refresh');
            } else
            {
                $this->DataRecipeCategory->updateData(array(
                    'NAMA_RESEP_KATEGORI' => $this->input->post('nama_kategori_id'),
                    'EN_NAMA_RESEP_KATEGORI' => $this->input->post('nama_kategori_en'),
                ), array('ID_resep_KATEGORI' => $id), 'resep_kategori');
                redirect(base_url() . 'manage_kategori_resep', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataRecipeCategory->getSpecificData('resep_kategori', array('ID_RESEP_KATEGORI' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_resep/edit_kategori_resep', $data);
            $this->template->publish();
        }
    }

    protected function kategori_resep_submit()
    {
        $this->form_validation->set_rules('nama_kategori_id', 'Nama Kategori Resep ID', 'required');
        $this->form_validation->set_rules('nama_kategori_en', 'Nama Kategori Resep EN', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        } else
        {
            return $this->do_upload();
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
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = 'banner_' . str_replace(' ', '', $this->input->post('nama'));
        $config['overwrite'] = true;
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
}