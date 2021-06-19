<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 3:07 PM
 */
class Manage_story extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataStory');
        $this->load->model('DataStoryCategory');
        $this->load->model('DataLocation');
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
            $this->initialize_pagination(base_url("manage_story/index"), 'story', 'DataStory', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataStory
                ->getRelationshipData(
                    $this->numOfContentsPerPage,
                    $page,
                    'story',
                    null,
                    'story_kategori',
                    'story_kategori.ID_STORY_KATEGORI = story.ID_STORY_KATEGORI');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_story/story', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_story/search"),
            'story',
            'DataStory',
            $this->DataStory->countSearchData(
                'story',
                'story_kategori',
                'story_kategori.ID_STORY_KATEGORI = story.ID_STORY_KATEGORI',
                'ID_STORY LIKE \'%' . $search . '%\' ' .
                'OR JUDUL_STORY LIKE \'%' . $search . '%\' ' .
                'OR EN_JUDUL_STORY LIKE \'%' . $search . '%\' ')
        );

        $data['datas'] = $this->DataStory
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'story',
                'story_kategori',
                'story.ID_story_KATEGORI = story_kategori.ID_story_KATEGORI',
                'ID_STORY LIKE \'%' . $search . '%\' ' .
                'OR JUDUL_STORY LIKE \'%' . $search . '%\' ' .
                'OR EN_JUDUL_STORY LIKE \'%' . $search . '%\' '
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_story/story', $data);
        $this->template->publish();
    }

    public function tambahStory()
    {
        if ($this->isPost())
        {
            $filename = $this->story_submit();
            $this->DataStory->addData('story', array(
                'CREATED_aT'        => date('Y-m-d', strtotime($this->input->post('waktu'))),
                'PENULIS'           => $this->input->post('penulis'),
                'ID_LOKASI'         => $this->input->post('lokasi'),
                'ID_STORY_KATEGORI' => $this->input->post('kategori'),
                'JUDUL_STORY'       => $this->input->post('judul_id'),
                'EN_JUDUL_STORY'    => $this->input->post('judul_en'),
                'KONTEN_STORY'      => $this->input->post('konten_id'),
                'EN_KONTEN_STORY'   => $this->input->post('konten_en'),
                'FOTO'              => isset($filename) ? $filename : 'null.png',
                'STATUS'            => $this->input->post('status')
            ));
            redirect(base_url() . 'manage_story', 'refresh');
        } else
        {
            $data['myaccount'] = $this->myglobal->getLoggedInUser();
            $data['kategoris'] = $this->DataStoryCategory->getAllData('story_kategori');
            $data['lokasis'] = $this->DataLocation->getAllData('lokasi');
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_story/tambah_story', $data);
            $this->template->publish();
        }
    }

    public function deleteStory($id)
    {
        $this->DataStory->deleteData('story', array('ID_STORY' => $id));
        redirect(base_url() . 'manage_story', 'refresh');
    }

    public function editStory($id)
    {
        if ($this->isPost())
        {
            $filename = $this->story_submit();
            $existing_image = $this->input->post('existing_foto');
            if (isset($filename) && $filename != $existing_image && $existing_image != 'null.png')
                unlink('./uploads/' . $existing_image);
            $this->DataStory->updateData(array(
                'PENULIS'           => $this->input->post('penulis'),
                'ID_LOKASI'         => $this->input->post('lokasi'),
                'ID_STORY_KATEGORI' => $this->input->post('kategori'),
                'JUDUL_STORY'       => $this->input->post('judul_id'),
                'EN_JUDUL_STORY'    => $this->input->post('judul_en'),
                'KONTEN_STORY'      => $this->input->post('konten_id'),
                'EN_KONTEN_STORY'   => $this->input->post('konten_en'),
                'STATUS'            => $this->input->post('status'),
                'FOTO'              => ($filename != $existing_image && isset($filename)) ? $filename : $existing_image
            ), array('ID_STORY' => $id), 'story');
            redirect(base_url() . 'manage_story', 'refresh');
        } else
        {
            $data['myaccount'] = $this->myglobal->getLoggedInUser();
            $data['kategoris'] = $this->DataStoryCategory->getAllData('story_kategori');
            $data['lokasis'] = $this->DataLocation->getAllData('lokasi');
            $data['story'] = $this->DataStory->getSpecificData('story', array('ID_STORY' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_story/edit_story', $data);
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

    protected function story_submit()
    {
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul_id', 'Judul Story', 'required');
        $this->form_validation->set_rules('judul_en', 'Judul Story EN', 'required');
        $this->form_validation->set_rules('konten_id', 'Konten ID', 'required');
        $this->form_validation->set_rules('konten_en', 'Konten EN', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

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