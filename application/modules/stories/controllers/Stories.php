<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 3:07 PM
 */
class Stories extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataStory');
        $this->load->model('DataStoryCategory');
        $this->load->model('DataProductCategory');
        $this->load->model('DataRecipeCategory');
        $this->load->model('DataLocation');
        $this->load->model('DataBrand');
    }


    public function index()
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] =$this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $kategori = $this->DataStoryCategory->getAllData('story_kategori');
        $index = 1;
        foreach ($kategori as $kat)
        {
            $data[('story'.$index)] = $this->DataStory->getAllDataWhere('story',array('ID_STORY_KATEGORI'=>$kat->ID_STORY_KATEGORI));
            $index++;
        }
        $data['kategoris'] = $kategori;
        $data['featured_stories'] = $this->DataStory->getLimitedData(6,0,'story');

        $this->template->set_template('frontend/template');
        $this->template->title = 'Stories';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/stories.css");

        $this->template->content->view('frontend/partials/stories', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }

    public function details($storyId)
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['story_kategori'] = $this->DataStoryCategory->getAllData('story_kategori');
        $data['brands'] =$this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $data['story'] = $this->DataStory->getRelationshipSpecificData('story',
            null,
            'story_kategori k',
            'story.ID_STORY_KATEGORI = k.ID_STORY_KATEGORI',
            array('story.ID_STORY' => $storyId));

        $data['related_stories'] = $this->DataStory
            ->getRelationshipDataOrderBy(
                10,
                0,
                'story',
                '*,k.FOTO AS KFOTO, story.FOTO AS SFOTO',
                'story_kategori k',
                'story.ID_STORY_KATEGORI = k.ID_STORY_KATEGORI',
                array('story.PENULIS' => $data['story']->PENULIS));

        if(empty($data['story']))
            redirect(base_url());

        $this->template->set_template('frontend/template');
        $this->template->title = $data['story']->JUDUL_STORY;

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->stylesheet->add(base_url() . "public/css/stories.css");

        $this->template->content->view('frontend/partials/story-content', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');

        $this->template->publish();
    }
}