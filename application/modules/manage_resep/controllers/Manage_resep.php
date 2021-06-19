<?php

class Manage_Resep extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataRecipe');
        $this->load->model('DataRecipeCategory');
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
            $this->initialize_pagination(base_url("manage_resep/index"), 'resep', 'DataRecipe', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataRecipe
                ->getRelationshipData(
                    $this->numOfContentsPerPage,
                    $page,
                    'resep',
                    null,
                    'resep_kategori',
                    'resep_kategori.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_resep/resep', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_resep/search"),
            'resep',
            'DataRecipe',
            $this->DataRecipe->countSearchData(
                'resep',
                'resep_kategori',
                'resep_kategori.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                'ID_RESEP LIKE \'%' . $search . '%\' ' .
                'OR NAMA_RESEP LIKE \'%' . $search . '%\' ' .
                'OR EN_NAMA_RESEP LIKE \'%' . $search . '%\' ')
        );
        $data['datas'] = $this->DataRecipe
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'resep',
                'resep_kategori',
                'resep.ID_RESEP_KATEGORI = resep_kategori.ID_RESEP_KATEGORI',
                'ID_RESEP LIKE \'%' . $search . '%\' ' .
                'OR NAMA_RESEP LIKE \'%' . $search . '%\' ' .
                'OR NAMA_RESEP_KATEGORI LIKE \'%' . $search . '%\' ' .
                'OR EN_NAMA_RESEP LIKE \'%' . $search . '%\' '
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_resep/resep', $data);
        $this->template->publish();
    }

    public function tambahResep()
    {
        if ($this->isPost())
        {
            $filename = $this->resep_submit();
            $this->DataRecipe->addData('resep', array(
                'ID_RESEP_KATEGORI'   => $this->input->post('kategori'),
                'KEY_PRODUCT'         => $this->input->post('key_product'),
                'NAMA_RESEP'          => $this->input->post('nama_id'),
                'EN_NAMA_RESEP'       => $this->input->post('nama_en'),
                'DESKRIPSI_RESEP'     => $this->input->post('deskripsi_id'),
                'EN_DESKRIPSI_RESEP'  => $this->input->post('deskripsi_en'),
                'INGREDIENT_RESEP'    => $this->input->post('ingredient_id'),
                'EN_INGREDIENT_RESEP' => $this->input->post('ingredient_en'),
                'PREP_TIME'           => $this->input->post('prep_time'),
                'COOK_TIME'           => $this->input->post('cook_time'),
                'KALORI'              => $this->input->post('calories'),
                'JUMLAH_INGREDIENT'   => $this->input->post('ingredients'),
                'HOW_TO_COOK'         => $this->input->post('how_to_cook_id'),
                'EN_HOW_TO_COOK'      => $this->input->post('how_to_cook_en'),
                'FOTO'                => isset($filename) ? $filename : 'null.png',
                'STATUS'              => $this->input->post('status'),
                'CREATED_aT'          => date('Y-m-d', strtotime($this->input->post('waktu'))),
            ));
            redirect(base_url() . 'manage_resep', 'refresh');
        } else
        {
            $data['resep_kategoris'] = $this->DataRecipeCategory->getAllData('resep_kategori');
            $data['key_products'] = $this->DataRecipeCategory->getAllData('produk');
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_resep/tambah_resep', $data);
            $this->template->publish();
        }
    }

    public function setRecipeFlash()
    {
        $this->session->set_flashdata('kategori',$this->input->post('kategori'));
        $this->session->set_flashdata('key_product',$this->input->post('key_product'));
        $this->session->set_flashdata('nama_id',$this->input->post('nama_id'));
        $this->session->set_flashdata('nama_en',$this->input->post('nama_en'));
        $this->session->set_flashdata('deskripsi_id',$this->input->post('deskripsi_id'));
        $this->session->set_flashdata('deskripsi_en',$this->input->post('deskripsi_en'));
        $this->session->set_flashdata('ingredient_id',$this->input->post('ingredient_id'));
        $this->session->set_flashdata('ingredient_en',$this->input->post('ingredient_en'));
        $this->session->set_flashdata('prep_time',$this->input->post('prep_time'));
        $this->session->set_flashdata('cook_time',$this->input->post('cook_time'));
        $this->session->set_flashdata('calories',$this->input->post('calories'));
        $this->session->set_flashdata('ingredients',$this->input->post('ingredients'));
        $this->session->set_flashdata('how_to_cook_id',$this->input->post('how_to_cook_id'));
        $this->session->set_flashdata('how_to_cook_en',$this->input->post('how_to_cook_en'));
    }

    public function deleteResep($id)
    {
        $this->DataRecipe->deleteData('resep', array('ID_RESEP' => $id));
        redirect(base_url() . 'manage_resep', 'refresh');
    }

    public function editResep($id)
    {
        if ($this->isPost())
        {
            $filename = $this->resep_submit();
            $existing_image = $this->input->post('existing_foto');
            if (isset($filename) && $filename != $existing_image && $existing_image != 'null.png')
                unlink('./uploads/' . $existing_image);
            $this->DataRecipe->updateData(array(
                'ID_RESEP_KATEGORI'   => $this->input->post('kategori'),
                'KEY_PRODUCT'         => $this->input->post('key_product'),
                'NAMA_RESEP'          => $this->input->post('nama_id'),
                'EN_NAMA_RESEP'       => $this->input->post('nama_en'),
                'DESKRIPSI_RESEP'     => $this->input->post('deskripsi_id'),
                'EN_DESKRIPSI_RESEP'  => $this->input->post('deskripsi_en'),
                'INGREDIENT_RESEP'    => $this->input->post('ingredient_id'),
                'EN_INGREDIENT_RESEP' => $this->input->post('ingredient_en'),
                'PREP_TIME'           => $this->input->post('prep_time'),
                'COOK_TIME'           => $this->input->post('cook_time'),
                'KALORI'              => $this->input->post('calories'),
                'JUMLAH_INGREDIENT'   => $this->input->post('ingredients'),
                'HOW_TO_COOK'         => $this->input->post('how_to_cook_id'),
                'EN_HOW_TO_COOK'      => $this->input->post('how_to_cook_en'),
                'STATUS'              => $this->input->post('status'),
                'FOTO'                => ($filename != $existing_image && isset($filename)) ? $filename : $existing_image
            ), array('ID_RESEP' => $id), 'resep');
            redirect(base_url() . 'manage_resep', 'refresh');
        } else
        {
            $data['resep_kategoris'] = $this->DataRecipeCategory->getAllData('resep_kategori');
            $data['key_products'] = $this->DataRecipeCategory->getAllData('produk');
            $data['resep'] = $this->DataRecipe->getSpecificData('resep', array('ID_RESEP' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_resep/edit_resep', $data);
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

    protected function resep_submit()
    {
        $this->form_validation->set_rules('key_product', 'Key Product', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama_id', 'Nama Resep ID', 'required');
        $this->form_validation->set_rules('nama_en', 'Nama Resep EN', 'required');
        $this->form_validation->set_rules('deskripsi_id', 'Deskripsi Resep ID', 'required');
        $this->form_validation->set_rules('deskripsi_en', 'Deskripsi Resep EN', 'required');
        $this->form_validation->set_rules('ingredient_id', 'Ingredient ID', 'required');
        $this->form_validation->set_rules('ingredient_en', 'Ingredient EN', 'required');
        $this->form_validation->set_rules('prep_time', 'Prep Time', 'required');
        $this->form_validation->set_rules('cook_time', 'Cook Time', 'required');
        $this->form_validation->set_rules('calories', 'Calories', 'required');
        $this->form_validation->set_rules('ingredients', 'Jumlah Ingredients', 'required');
        $this->form_validation->set_rules('how_to_cook_id', 'How to Cook ID', 'required');
        $this->form_validation->set_rules('how_to_cook_en', 'How to Cook EN', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            $this->setRecipeFlash();
            redirect(current_url() . "#errors");
        } else
        {
            return $this->do_upload();
        }
    }
}