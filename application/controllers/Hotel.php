<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {

    function insert_hotel() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $this->db->query("INSERT INTO m_hotel(nama,alamat) VALUES ('$nama','$alamat')");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal simpan Hotel';
        } else {
            echo 'Anda berhasil simpan Hotel';
        }
    }
    
    function update_hotel() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $this->db->query("UPDATE m_hotel SET nama='$nama',alamat='$alamat' WHERE id='$id'");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal mengganti hotel';
        } else {
            echo 'Anda berhasil mengganti hotel';
        }
    }
    
    function delete_hotel() {
        $id = $this->input->post('id');

        $this->db->query("DELETE FROM m_hotel WHERE id=$id");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal menghapus profil';
        } else {
            echo 'Anda berhasil menghapus profil';
        }
    }
   function data_hotel() {
        $query = $this->db->query("SELECT * FROM m_hotel");
        $json = $query->result();
        echo json_encode($json);
    }

}
