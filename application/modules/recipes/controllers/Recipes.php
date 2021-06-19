<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 3:07 PM
 */
class Recipes extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataRecipe');
        $this->load->model('DataRecipeCategory');
        $this->load->model('DataProductCategory');
        $this->load->model('DataStoryCategory');
        $this->load->model('DataLocation');
        $this->load->model('DataBrand');
        $this->numOfContentsPerPage = 9;
    }

    public function index()
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] =$this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['recipes'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                $this->numOfContentsPerPage,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                null);

        $data['pages'] = $this->DataRecipe->record_count('resep')/$this->numOfContentsPerPage;

        $this->template->set_template('frontend/template');
        $this->template->title = 'Recipes';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/recipes.css");

        $this->template->javascript->add(base_url() . "public/js/recipe-loader.js");

        $this->template->content->view('frontend/partials/recipes',$data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function searchRecipe($page)
    {
        $data['recipes'] = $this->DataRecipe
            ->getRelationshipData(
                $this->numOfContentsPerPage,
                $page*$this->numOfContentsPerPage,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI');

        $this->load->view('frontend/partials/recipe-loaded', $data);
    }

    public function searchRecipeBy()
    {
        $data['recipes'] = $this->DataRecipe
            ->getRelationshipWhereData(
                $this->numOfContentsPerPage,
                $this->uri->segment(3)*$this->numOfContentsPerPage,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                array('resep.ID_RESEP_KATEGORI'=>$this->uri->segment(4)),
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI');

        $this->load->view('frontend/partials/recipe-loaded', $data);
    }

    public function searchRelatedRecipe()
    {
        $data['recipes'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                $this->numOfContentsPerPage,
                $this->uri->segment(3)*$this->numOfContentsPerPage,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                array('resep.KEY_PRODUCT' => $this->uri->segment(4)));

        $this->load->view('frontend/partials/relatedrecipes-loaded', $data);
    }

    public function by($kategoriId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] =$this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['recipes'] = $this->DataRecipe
            ->getRelationshipWhereData(
                $this->numOfContentsPerPage,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                array('resep.ID_RESEP_KATEGORI'=>$kategoriId),
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI');

        $total = $this->DataRecipe
            ->countRelationshipWhereData(
                0,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                array('resep.ID_RESEP_KATEGORI'=>$kategoriId),
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI');

        $data['pages'] = $total/$this->numOfContentsPerPage;

        $data['nama_kategori'] = $this->DataRecipeCategory->getSpecificData('resep_kategori',
            array('ID_RESEP_KATEGORI'=>$kategoriId));

        $this->template->set_template('frontend/template');
        $this->template->title = 'Recipes';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/recipes.css");

        $this->template->javascript->add(base_url() . "public/js/recipebycategory-loader.js");

        $this->template->content->view('frontend/partials/recipes',$data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function details($resepId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] =$this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['resep'] = $this->DataRecipe->getRelationshipSpecificData('resep',
            '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
            'resep_kategori k',
            'resep.ID_RESEP_KATEGORI = k.ID_RESEP_KATEGORI',
            array('resep.ID_RESEP' => $resepId));

        $data['key_product'] = $this->DataRecipe->getRelationshipSpecificData('resep',
        '*, p.FOTO AS PFOTO',
        'produk p',
        'resep.KEY_PRODUCT = p.ID_PRODUK',
        array('resep.ID_RESEP' => $resepId));

        if(empty($data['resep']))
            redirect(base_url());

        $data['related_recipe'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                $this->numOfContentsPerPage,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                array('resep.KEY_PRODUCT' => $data['key_product']->ID_PRODUK));

        $data['pages'] = $this->DataRecipe->countRelatedData('resep', array('resep.KEY_PRODUCT' => $data['key_product']->ID_PRODUK))/$this->numOfContentsPerPage;

        $this->template->set_template('frontend/template');
        $this->template->title = $data['resep']->NAMA_RESEP;

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/recipes.css");
        $this->template->stylesheet->add(base_url() . "public/css/lightbox.css");

        $this->template->javascript->add(base_url()."public/js/lightbox.js");
        $this->template->javascript->add(base_url() . "public/js/printThis.js");
        $this->template->javascript->add(base_url() . "public/js/relatedrecipe-loader.js");

        $this->template->content->view('frontend/partials/recipe-detail', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function generatePdf($resepId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['brands'] =$this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['resep'] = $this->DataRecipe->getRelationshipSpecificData('resep',
            '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
            'resep_kategori k',
            'resep.ID_RESEP_KATEGORI = k.ID_RESEP_KATEGORI',
            array('resep.ID_RESEP' => $resepId));

        $data['key_product'] = $this->DataRecipe->getRelationshipSpecificData('resep',
            '*, p.FOTO AS PFOTO',
            'produk p',
            'resep.KEY_PRODUCT = p.ID_PRODUK',
            array('resep.ID_RESEP' => $resepId));

        if(empty($data['resep']))
            redirect(base_url());

        $data['related_recipe'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                10,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                array('resep.KEY_PRODUCT' => $data['key_product']->ID_PRODUK));

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

        $pdf->WriteHtml($this->load->view('frontend/recipe_pdf',$data,true));
        ob_end_flush();

        $pdf->Output($data['resep']->NAMA_RESEP.'.pdf', 'I');
    }

    public function showPdf()
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['brands'] =$this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['resep'] = $this->DataRecipe->getRelationshipSpecificData('resep',
            '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
            'resep_kategori k',
            'resep.ID_RESEP_KATEGORI = k.ID_RESEP_KATEGORI',
            array('resep.ID_RESEP' => 1));

        $data['key_product'] = $this->DataRecipe->getRelationshipSpecificData('resep',
            '*, p.FOTO AS PFOTO',
            'produk p',
            'resep.KEY_PRODUCT = p.ID_PRODUK',
            array('resep.ID_RESEP' => 1));

        if(empty($data['resep']))
            redirect(base_url());

        $data['related_recipe'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                10,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI',
                array('resep.KEY_PRODUCT' => $data['key_product']->ID_PRODUK));


        $this->load->view('frontend/recipe_pdf',$data);
    }

    public function order($orderId)
    {
        if($orderId==0)
            $this->session->set_userdata('order','DESC');
        else
            $this->session->set_userdata('order','ASC');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}