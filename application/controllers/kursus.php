<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kursus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KursusModel');
    }

    // Cetak

    public function index()
    {
        $data['title'] = "Dashboard | Kursus";
        $data['kursus'] = $this->KursusModel->get_kursus();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('kursus/kursus_read', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->KursusModel->insert_kursus();
            redirect('kursus');
        } else {
            $data['title'] = "Dashboard | Kursus";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('kursus/kursus_create');
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->KursusModel->update_kursus();
            redirect('kursus');
        } else {
            $data['title'] = "Perbaharui Data Jenis Beasiswa | Kursus";
            $data['kursus'] = $this->KursusModel->get_kursus_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('kursus/kursus_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->KursusModel->delete_kursus($id);
            redirect('kursus');
        }
    }
}
