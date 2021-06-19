<?php

class Manage_produk extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataProduct');
        $this->load->model('DataBrand');
        $this->load->model('DataProduct');
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
            $this->initialize_pagination(base_url("manage_produk/index"), 'produk', 'DataProduct', null);
            $data['datas'] = $this->DataProduct
                ->getRelationshipData(
                    $this->numOfContentsPerPage,
                    $page,
                    'produk',
                    null,
                    'produk_kategori',
                    'produk.ID_PRODUK_KATEGORI = produk_kategori.ID_PRODUK_KATEGORI');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_produk/produk', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_produk/search"),
            'produk',
            'DataProduct',
            $this->DataProduct->countSearchData(
                'produk',
                'produk_kategori',
                'produk.ID_PRODUK_KATEGORI = produk_kategori.ID_PRODUK_KATEGORI',
                'UPC_CODE LIKE \'%' . $search . '%\' ' .
                'OR NAMA_PRODUK LIKE \'%' . $search . '%\' ' .
                'OR EN_NAMA_PRODUK LIKE \'%' . $search . '%\' ')
        );
        $data['datas'] = $this->DataProduct
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'produk',
                'produk_kategori',
                'produk.ID_PRODUK_KATEGORI = produk_kategori.ID_PRODUK_KATEGORI',
                'UPC_CODE LIKE \'%' . $search . '%\' ' .
                'OR NAMA_PRODUK LIKE \'%' . $search . '%\' ' .
                'OR EN_NAMA_PRODUK LIKE \'%' . $search . '%\' '
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_produk/produk', $data);
        $this->template->publish();
    }

    public function tambahProduk()
    {
        if ($this->isPost())
        {
            $filename = $this->produk_submit();
            $this->DataProduct->addData('produk', array(
                'UPC_CODE'             => $this->input->post('upc_code'),
                'ID_BRAND'             => $this->input->post('brand'),
                'ID_PRODUK_KATEGORI'   => $this->input->post('kategori'),
                'NAMA_PRODUK'          => $this->input->post('nama_produk_id'),
                'EN_NAMA_PRODUK'       => $this->input->post('nama_produk_en'),
                'DESKRIPSI_PRODUK'     => $this->input->post('deskripsi_produk_id'),
                'EN_DESKRIPSI_PRODUK'  => $this->input->post('deskripsi_produk_en'),
                'INGREDIENT_PRODUK'    => $this->input->post('ingredient_produk_id'),
                'EN_INGREDIENT_PRODUK' => $this->input->post('ingredient_produk_en'),
                'KONTEN_PRODUK'        => $this->input->post('konten_id'),
                'EN_KONTEN_PRODUK'     => $this->input->post('konten_en'),
                'FOTO'                 => isset($filename) ? $filename : 'null.png',
                'STATUS'               => $this->input->post('status')
            ));
            redirect(base_url() . 'manage_produk', 'refresh');
        } else
        {
            $data['brands'] = $this->DataBrand->getAllData('brand');
            $data['kategoris'] = $this->DataProduct->getAllData('produk_kategori');
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_produk/tambah_produk', $data);
            $this->template->publish();
        }
    }

    public function setProductFlash()
    {
        $this->session->set_flashdata('upc_code', $this->input->post('upc_code'));
        $this->session->set_flashdata('brand', $this->input->post('brand'));
        $this->session->set_flashdata('kategori', $this->input->post('kategori'));
        $this->session->set_flashdata('nama_produk_id', $this->input->post('nama_produk_id'));
        $this->session->set_flashdata('nama_produk_en', $this->input->post('nama_produk_en'));
        $this->session->set_flashdata('deskripsi_produk_id', $this->input->post('deskripsi_produk_id'));
        $this->session->set_flashdata('deskripsi_produk_en', $this->input->post('deskripsi_produk_en'));
        $this->session->set_flashdata('ingredient_produk_id', $this->input->post('ingredient_produk_id'));
        $this->session->set_flashdata('ingredient_produk_en', $this->input->post('ingredient_produk_en'));
        $this->session->set_flashdata('konten_id', $this->input->post('konten_id'));
        $this->session->set_flashdata('konten_en', $this->input->post('konten_en'));
        $this->session->set_flashdata('status', $this->input->post('status'));
    }

    public function deleteProduk($id)
    {
        $this->DataProduct->deleteData('produk', array('ID_PRODUK' => $id));
        redirect(base_url() . 'manage_produk', 'refresh');
    }

    public function editProduk($id)
    {
        if ($this->isPost())
        {
            $filename = $this->produk_submit();
            $existing_image = $this->input->post('existing_foto');
            if (isset($filename) && $filename != $existing_image && $existing_image != 'null.png')
                unlink('./uploads/' . $existing_image);
            $this->DataProduct->updateData(array(
                'UPC_CODE'             => $this->input->post('upc_code'),
                'ID_BRAND'             => $this->input->post('brand'),
                'ID_PRODUK_KATEGORI'   => $this->input->post('kategori'),
                'NAMA_PRODUK'          => $this->input->post('nama_produk_id'),
                'EN_NAMA_PRODUK'       => $this->input->post('nama_produk_en'),
                'DESKRIPSI_PRODUK'     => $this->input->post('deskripsi_produk_id'),
                'EN_DESKRIPSI_PRODUK'  => $this->input->post('deskripsi_produk_en'),
                'INGREDIENT_PRODUK'    => $this->input->post('ingredient_produk_id'),
                'EN_INGREDIENT_PRODUK' => $this->input->post('ingredient_produk_en'),
                'KONTEN_PRODUK'        => $this->input->post('konten_id'),
                'EN_KONTEN_PRODUK'     => $this->input->post('konten_en'),
                'STATUS'               => $this->input->post('status'),
                'FOTO'                 => ($filename != $existing_image && isset($filename)) ? $filename : $existing_image
            ), array('ID_PRODUK' => $id), 'produk');
            redirect(base_url() . 'manage_produk', 'refresh');
        } else
        {
            $data['brands'] = $this->DataBrand->getAllData('brand');
            $data['kategoris'] = $this->DataProduct->getAllData('produk_kategori');
            $data['produk'] = $this->DataProduct->getSpecificData('produk', array('ID_PRODUK' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_produk/edit_produk', $data);
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

    protected function produk_submit()
    {
        $this->form_validation->set_rules('upc_code', 'UPC Code', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama_produk_id', 'Nama Produk ID', 'required');
        $this->form_validation->set_rules('nama_produk_en', 'Nama Produk EN', 'required');
        $this->form_validation->set_rules('deskripsi_produk_id', 'Deskripsi Produk ID', 'required');
        $this->form_validation->set_rules('deskripsi_produk_en', 'Deskripsi Produk EN', 'required');
        $this->form_validation->set_rules('ingredient_produk_id', 'Ingredient ID', 'required');
        $this->form_validation->set_rules('ingredient_produk_en', 'Ingredient EN', 'required');
        $this->form_validation->set_rules('konten_id', 'Konten ID', 'required');
        $this->form_validation->set_rules('konten_en', 'Konten EN', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            $this->setProductFlash();
            redirect(current_url() . "#errors");
        } else
        {
            return $this->do_upload();
        }
    }
}