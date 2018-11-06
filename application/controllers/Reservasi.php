<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipekamar extends CI_Controller {

    function insert_tipe_kamar() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $fasilitas = $this->input->post('fasilitas');
        $ukuran = $this->input->post('ukuran');
        $harga = $this->input->post('harga');

        $this->db->query("INSERT INTO m_tipe_kamar(nama,fasilitas,ukuran,harga) VALUES ('$nama','$fasilitas','$ukuran','$harga')");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal simpan Tipe Kamar';
        } else {
            echo 'Anda berhasil simpan Tipe Kamar';
        }
    }
    
    function update_tipe_kamar() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $fasilitas = $this->input->post('fasilitas');
        $ukuran = $this->input->post('ukuran');
        $harga = $this->input->post('harga');

        $this->db->query("UPDATE m_tipe_kamar SET nama='$nama',fasilitas='$fasilitas',ukuran='$ukuran',harga='$harga' WHERE id='$id'");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal mengganti tipe_kamar';
        } else {
            echo 'Anda berhasil mengganti tipe_kamar';
        }
    }
    
    function delete_tipe_kamar() {
        $id = $this->input->post('id');

        $this->db->query("DELETE FROM m_tipe_kamar WHERE id=$id");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal menghapus profil';
        } else {
            echo 'Anda berhasil menghapus profil';
        }
    }
   function data_tipe_kamar() {
        $query = $this->db->query("SELECT * FROM m_tipe_kamar");
        $json = $query->result();
        echo json_encode($json);
    }

}
