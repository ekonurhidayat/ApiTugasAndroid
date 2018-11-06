<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {

    function insert_reservasi() {
        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $id_hotel = $this->input->post('id_hotel');
        $id_tipe_kamar = $this->input->post('id_tipe_kamar');
        $durasi = $this->input->post('durasi');
        $cek_in = $this->input->post('cek_in');
        $cek_out = $this->input->post('cek_out');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');

        $this->db->query("INSERT INTO m_reservasi(id_user,id_hotel,id_tipe_kamar,durasi,cek_in,cek_out,harga,keterangan) VALUES ('$id_user','$id_hotel','$id_tipe_kamar','$durasi','$cek_in','$cek_out','$harga','$keterangan')");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal simpan Reservasi';
        } else {
            echo 'Anda berhasil simpan Reservasi';
        }
    }
    
    function update_reservasi() {
        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $id_hotel = $this->input->post('id_hotel');
        $id_tipe_kamar = $this->input->post('id_tipe_kamar');
        $durasi = $this->input->post('durasi');
        $cek_in = $this->input->post('cek_in');
        $cek_out = $this->input->post('cek_out');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');

        $this->db->query("UPDATE m_reservasi SET id_user='$id_user',di_hotel='$id_hotel',id_tipe_kamar='$id_tipe_kamar',durasi='$durasi',cek_in='$cek_in',cek_out='$cek_out',harga='$harga',keterangan='$keterangan' WHERE id='$id'");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal mengganti reservasi';
        } else {
            echo 'Anda berhasil mengganti reservasi';
        }
    }
    
    function delete_reservasi() {
        $id = $this->input->post('id');

        $this->db->query("DELETE FROM m_reservasi WHERE id=$id");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal menghapus profil';
        } else {
            echo 'Anda berhasil menghapus profil';
        }
    }
   function data_reservasi() {
        $query = $this->db->query("SELECT * FROM m_reservasi");
        $json = $query->result();
        echo json_encode($json);
    }

}
