<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MateriModel extends CI_Model
{

    private $tabel = "Materi";
    public function get_materi()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function insert_Materi()
    {
        $data = [
            'judul_materi' => $this->input->post('judul_materi'),
            'deskripsi_materi' => $this->input->post('deskripsi_materi'),
            'link' => $this->input->post('link')
        ];
        $this->db->insert($this->tabel, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Materi berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data Materi gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function get_materi_byid($id)
    {

        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }

    public function update_materi(){
        $data = [
            'judul_materi' => $this->input->post('judul_materi'),
            'deskripsi_materi' => $this->input->post('deskprisi_materi'),
            'link' => $this->input->post('link')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);

        //Notifikasi
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Materi berhasil diubah");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data Materi gagal diubah!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function delete_materi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        //Notifikasi
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Materi berhasil dihapus");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data Materi gagal dihapus!");
            $this->session->set_flashdata('status', false);
        }
    }
}
