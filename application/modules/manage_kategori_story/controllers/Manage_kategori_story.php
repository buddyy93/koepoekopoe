<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/14/2017
 * Time: 4:45 PM
 */
class Manage_kategori_story extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataStoryCategory');
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
            $this->initialize_pagination(base_url("manage_kategori_story/index"), 'story_kategori', 'DataStoryCategory', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataStoryCategory
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'story_kategori');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_story/kategori_story', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_kategori_story/search"),
            'story_kategori',
            'DataStoryCategory',
            $this->DataStoryCategory->countSearchData(
                'story_kategori',
                null,
                null,
                'NAMA_STORY_KATEGORI LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataStoryCategory
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'story_kategori',
                null,
                null,
                'NAMA_STORY_KATEGORI LIKE \'%' . $search . '%\' OR EN_NAMA_STORY_KATEGORI LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_kategori_story/kategori_story', $data);
        $this->template->publish();
    }

    public function tambahKategoriStory()
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_story_submit();
            $this->DataStoryCategory->addData('story_kategori', array(
                'NAMA_STORY_KATEGORI' => $this->input->post('nama_kategori_id'),
                'EN_NAMA_STORY_KATEGORI' => $this->input->post('nama_kategori_en'),
                'FOTO'                => $filename
            ));
            redirect(base_url() . 'manage_kategori_story', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_story/tambah_kategori_story');
            $this->template->publish();
        }
    }

    public function deleteKategoriStory($id)
    {
        $this->DataStoryCategory->deleteData('story_kategori', array('ID_story_KATEGORI' => $id));
        redirect(base_url() . 'manage_kategori_story', 'refresh');
    }

    public function editKategoristory($id)
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_story_submit();
            if (isset($filename))
            {
                $this->DataStoryCategory->updateData(array(
                    'NAMA_STORY_KATEGORI' => $this->input->post('nama_kategori_id'),
                    'EN_NAMA_STORY_KATEGORI' => $this->input->post('nama_kategori_en'),
                    'FOTO'                => $filename
                ), array('ID_STORY_KATEGORI' => $id), 'story_kategori');
                redirect(base_url() . 'manage_kategori_story', 'refresh');
            } else
            {
                $this->DataStoryCategory->updateData(array(
                    'NAMA_STORY_KATEGORI' => $this->input->post('nama_kategori_id'),
                    'EN_NAMA_STORY_KATEGORI' => $this->input->post('nama_kategori_en'),
                ), array('ID_STORY_KATEGORI' => $id), 'story_kategori');
                redirect(base_url() . 'manage_kategori_story', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataStoryCategory->getSpecificData('story_kategori', array('ID_STORY_KATEGORI' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori_story/edit_kategori_story', $data);
            $this->template->publish();
        }
    }

    protected function kategori_story_submit()
    {
        $this->form_validation->set_rules('nama_kategori_id', 'Nama Kategori story ID', 'required');
        $this->form_validation->set_rules('nama_kategori_en', 'Nama Kategori story EN', 'required');
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