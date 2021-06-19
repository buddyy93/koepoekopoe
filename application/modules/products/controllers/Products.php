<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 3:06 PM
 */
class Products extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataProduct');
        $this->load->model('DataProductCategory');
        $this->load->model('DataRecipeCategory');
        $this->load->model('DataStoryCategory');
        $this->load->model('DataLocation');
        $this->load->model('DataBrand');
        $this->load->model('DataRecipe');
        $this->load->model('DataOrder');
        $this->numOfContentsPerPage = 12;
    }

    public function index()
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['products'] = $this->DataProduct
            ->searchProduct(
                $this->numOfContentsPerPage,
                0,
                'produk');
        $data['nama_kategori'] = null;
        $data['pages'] = $this->DataProduct->record_count('produk') / $this->numOfContentsPerPage;
        $this->template->set_template('frontend/template');
        $this->template->title = 'Product Content';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/products.css");

        $this->template->javascript->add(base_url() . "public/js/product-loader.js");

        $this->template->content->view('frontend/partials/products', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function searchProduct($page)
    {
        $data['products'] = $this->DataProduct
            ->searchProduct(
                $this->numOfContentsPerPage,
                $page * $this->numOfContentsPerPage,
                'produk');

        $this->load->view('frontend/partials/product-loaded', $data);
    }

    public function searchProductBy()
    {
        $data['products'] = $this->DataProduct
            ->searchProductWhere(
                $this->numOfContentsPerPage,
                $this->uri->segment(3) * $this->numOfContentsPerPage,
                'produk',
                array('ID_PRODUK_KATEGORI' => $this->uri->segment(4)));

        $this->load->view('frontend/partials/product-loaded', $data);
    }

    public function by($kategoriId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');
        $data['pages'] = $this->DataProduct->
            countSearchData(
                'produk',
                null,
                null,
                array('ID_PRODUK_KATEGORI' => $kategoriId)) / $this->numOfContentsPerPage;

        $data['products'] = $this->DataProduct->
        searchData($this->numOfContentsPerPage,
            0,
            'produk',
            null,
            null,
            array('ID_PRODUK_KATEGORI' => $kategoriId));

        $data['nama_kategori'] = $this->DataProductCategory->getSpecificData('produk_kategori', array('ID_PRODUK_KATEGORI' => $kategoriId));
        $this->template->set_template('frontend/template');
        $this->template->title = 'Product Content';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/products.css");

        $this->template->javascript->add(base_url() . "public/js/productbycategory-loader.js");

        $this->template->content->view('frontend/partials/products', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function bybrand($brandId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');
        $data['pages'] = $this->DataProduct->
            countSearchData(
                'produk',
                null,
                null,
                array('ID_BRAND' => $brandId)) / $this->numOfContentsPerPage;

        $data['products'] = $this->DataProduct->
        searchData($this->numOfContentsPerPage,
            0,
            'produk',
            null,
            null,
            array('ID_BRAND' => $brandId));

        $this->template->set_template('frontend/template');
        $this->template->title = 'Product Content';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/products.css");

        $this->template->javascript->add(base_url() . "public/js/productbycategory-loader.js");

        $this->template->content->view('frontend/partials/products', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function details($produkId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['products'] = $this->DataProduct->getLimitedData(12,0,'produk');
        $data['produk'] = $this->DataProduct->getRelationshipSpecificData('produk',
            '*,k.FOTO AS KFOTO, produk.FOTO AS PFOTO',
            'produk_kategori k',
            'produk.ID_PRODUK_KATEGORI = k.ID_PRODUK_KATEGORI',
            array('produk.ID_PRODUK' => $produkId));

        $data['related_recipe'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                10,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                array('resep.KEY_PRODUCT' => $produkId));

        if (empty($data['produk']))
            redirect(base_url());

        $this->template->set_template('frontend/template');
        $this->template->title = $data['produk']->NAMA_PRODUK;

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/products.css");
        $this->template->stylesheet->add(base_url() . "public/css/lightbox.css");
        $this->template->stylesheet->add(base_url() . "public/css/print.min.css");

        $this->template->javascript->add(base_url() . "public/js/lightbox.js");
        $this->template->javascript->add(base_url() . "public/js/jquery.form.min.js");
        $this->template->javascript->add(base_url() . "public/js/printThis.js");

        $this->template->content->view('frontend/partials/product-content', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function buyproduct()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message','<p>Pemesanan gagal dikirim</p>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else
        {
            $this->DataOrder->addData('order_barang', array(
                'NAMA'             => $this->input->post('nama'),
                'EMAIL'             => $this->input->post('email'),
                'NO_HANDPHONE'   => $this->input->post('no_handphone'),
                'JUMLAH'          => $this->input->post('jumlah'),
                'ID_PRODUK'       => $this->input->post('id_produk'),
            ));
            $this->session->set_flashdata('message','<p>Pemesanan berhasil dikirim</p>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }
    }

    public function generatePdf($produkId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['products'] = $this->DataProduct->getLimitedData(12,0,'produk');
        $data['produk'] = $this->DataProduct->getRelationshipSpecificData('produk',
            '*,k.FOTO AS KFOTO, produk.FOTO AS PFOTO',
            'produk_kategori k',
            'produk.ID_PRODUK_KATEGORI = k.ID_PRODUK_KATEGORI',
            array('produk.ID_PRODUK' => $produkId));

        $data['related_recipe'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                10,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                array('resep.KEY_PRODUCT' => $produkId));

        $this->load->library('Pdf');

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('My Title');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->AddPage();

        $pdf->WriteHtml($this->load->view('frontend/product_pdf',$data,true));
        ob_end_flush();

        $pdf->Output($data['produk']->NAMA_PRODUK.'.pdf', 'I');
    }
}