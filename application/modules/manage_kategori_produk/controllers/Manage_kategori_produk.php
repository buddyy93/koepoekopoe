<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/14/2017
 * Time: 4:45 PM
 */
class Manage_kategori_produk extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataProductCategory');
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
            $this->initialize_pagination(base_url("manage_kategori_produk/index"), 'produk_kategori', 'DataProductCategory',null);
            $data['datas'] = $this->DataProductCategory
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'produk_kategori');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_produk/kategori_produk', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search)?$search:$searchCache;
        $this->initialize_pagination(base_url("manage_kategori_produk/search"),
            'produk_kategori',
            'DataProductCategory',
            $this->DataProductCategory->countSearchData(
                'produk_kategori',
                null,
                null,
                'NAMA_PRODUK_KATEGORI LIKE \'%'.$search.'%\' OR EN_NAMA_PRODUK_KATEGORI LIKE \'%'.$search.'%\'')
        );
        $data['datas'] = $this->DataProductCategory
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'produk_kategori',
                null,
                null,
                'NAMA_PRODUK_KATEGORI LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_kategori_produk/kategori_produk', $data);
        $this->template->publish();
    }

    public function tambahKategoriProduk()
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_produk_submit();
            $this->DataProductCategory->addData('produk_kategori', array(
                'NAMA_PRODUK_KATEGORI' => $this->input->post('nama_kategori_id'),
                'EN_NAMA_PRODUK_KATEGORI' => $this->input->post('nama_kategori_En'),
                'FOTO' => $filename
            ));
            redirect(base_url() . 'manage_kategori_produk', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_produk/tambah_kategori_produk');
            $this->template->publish();
        }
    }

    public function deleteKategoriProduk($id)
    {
        $this->DataProductCategory->deleteData('produk_kategori', array('ID_PRODUK_KATEGORI' => $id));
        redirect(base_url() . 'manage_kategori_produk', 'refresh');
    }

    public function editKategoriProduk($id)
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_produk_submit();
            if (isset($filename))
            {
                $this->DataProductCategory->updateData(array(
                    'NAMA_PRODUK_KATEGORI' => $this->input->post('nama_kategori_id'),
                    'EN_NAMA_PRODUK_KATEGORI' => $this->input->post('nama_kategori_en'),
                    'FOTO'                 => $filename
                ), array('ID_PRODUK_KATEGORI' => $id), 'produk_kategori');
                redirect(base_url() . 'manage_kategori_produk', 'refresh');
            }
            else{
                $this->DataProductCategory->updateData(array(
                    'NAMA_PRODUK_KATEGORI' => $this->input->post('nama_kategori_id'),
                    'EN_NAMA_PRODUK_KATEGORI' => $this->input->post('nama_kategori_en'),
                ), array('ID_PRODUK_KATEGORI' => $id), 'produk_kategori');
                redirect(base_url() . 'manage_kategori_produk', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataProductCategory->getSpecificData('produk_kategori', array('ID_PRODUK_KATEGORI' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_produk/edit_kategori_produk', $data);
            $this->template->publish();
        }
    }

    protected function kategori_produk_submit()
    {
        $this->form_validation->set_rules('nama_kategori_id', 'Nama Kategori Produk ID', 'required|trim');
        $this->form_validation->set_rules('nama_kategori_en', 'Nama Kategori Produk EN', 'required|trim');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        }
        else
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
        $config['file_name'] = 'banner_'.str_replace (' ', '', $this->input->post('nama'));
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