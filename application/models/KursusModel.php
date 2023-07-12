<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KursusModel extends CI_Model
{

    private $tabel = "kursus";
    public function get_kursus()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function insert_kursus()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'durasi' => $this->input->post('durasi')
        ];
        $this->db->insert($this->tabel, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Kursus berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data Kursus gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function get_kursus_byid($id)
    {

        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }

    public function update_kursus()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskprisi'),
            'durasi' => $this->input->post('durasi')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);

        //Notifikasi
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data kursus berhasil diubah");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data kursus gagal diubah!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function delete_kursus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        //Notifikasi
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data kursus berhasil dihapus");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data kursus gagal dihapus!");
            $this->session->set_flashdata('status', false);
        }
    }
}
