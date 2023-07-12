<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MateriModel');
    
    }



    public function index()
    {
        $data['title'] = "Dashboard | KURSUS";
        $data['materi'] = $this->MateriModel->get_materi();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('materi/materi_read', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->MateriModel->insert_materi();
            redirect('materi');
        } else {
            $data['title'] = "Dashboard | KURSUS";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('materi/materi_create', $data);
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->MateriModel->update_materi();
            redirect('materi');
        } else {
            $data['title'] = "Perbaharui Data Materi | KURSUS";
            $data['materi'] = $this->MateriModel->get_materi_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('materi/materi_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->MateriModel->delete_materi($id);
            redirect('materi');
        }
    }
}
