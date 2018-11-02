<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

    function insert_kota() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $this->db->query("INSERT INTO m_kota(nama) VALUES ('$nama')");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal simpan Kota';
        } else {
            echo 'Anda berhasil simpan Kota';
        }
    }
    
    function update_kota() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $this->db->query("UPDATE m_kota SET nama='$nama' WHERE id='$id'");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal mengganti kota';
        } else {
            echo 'Anda berhasil mengganti kota';
        }
    }
    
    function delete_kota() {
        $id = $this->input->post('id');

        $this->db->query("DELETE FROM m_kota WHERE id=$id");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal menghapus profil';
        } else {
            echo 'Anda berhasil menghapus profil';
        }
    }
   function data_kota() {
        $query = $this->db->query("SELECT * FROM m_kota");
        $json = $query->result();
        echo json_encode($json);
    }

}
