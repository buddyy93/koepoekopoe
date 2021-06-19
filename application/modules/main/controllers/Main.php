<?php

class Main extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataProduct');
        $this->load->model('DataRecipe');
        $this->load->model('DataSlider');
        $this->load->model('DataStory');
        $this->load->model('DataSubscriber');
        $this->load->model('DataProductCategory');
        $this->load->model('DataRecipeCategory');
        $this->load->model('DataStoryCategory');
        $this->load->model('DataLocation');
        $this->load->model('DataBrand');
        $this->load->model('DataLike');
    }

    public function index()
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['sliders'] = $this->DataProduct->getAllData('slider');
        $data['products'] = $this->DataProduct->getLimitedData(10, 0, 'produk');
        $data['recipes'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                10,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI');
        $data['stories'] = $this->DataStory->getLimitedData(10,0,'story');

        $this->template->set_template('frontend/template');
        $this->template->title = 'Welcome to KoepoeKoepoe';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('frontend/partials/index', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');
        $this->template->publish();
    }

    public function language($lang)
    {
        $this->session->set_userdata('lang', $lang);
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    public function subscribe()
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false)
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));

        if ($this->form_validation->run() == true)
        {
            if (!$this->DataSubscriber->getSpecificData('subscriber', array('email' => $this->input->post('email'))))
            {
                $this->DataSubscriber->addData('subscriber', array(
                    'email' => $this->input->post('email'),
                ));
            } else
                $this->session->set_flashdata('error', '<h3 class="text-center">Sorry, but the email is already registered in our system</h3>');
        }

        $this->template->set_template('frontend/template');
        $this->template->title = 'Subscription';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('main/subscribe', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->publish();
    }

    public function like($id, $type)
    {
        $exists = $this->DataLike->checkRecord('likes', array(
            'IP_ADDRESS' => $this->input->ip_address(),
            'TYPE'       => $type,
            'TYPE_ID'    => $id
        ));
        if (!$exists)
        {
            $this->DataLike->addData('likes', array(
                'IP_ADDRESS' => $this->input->ip_address(),
                'TYPE'       => $type,
                'TYPE_ID'    => $id
            ));
            $this->DataRecipe->incrementLikeCount($type,array(
                'ID_'.strtoupper($type) => $id
            ));

            echo '<p>Thank you for the love :)</p>';
        } else
            echo '<p>We\'ve received your love :)</p>';
    }


}