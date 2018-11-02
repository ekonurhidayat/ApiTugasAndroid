<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function login() {
        $response = array();
        $username = $this->input->post("username");
        $passwd = $this->input->post("passwd");
        $query = $this->db->query("SELECT * FROM m_user WHERE username = '$username' AND passwd = '$passwd'");
        $Fields = $query->row();

        if ((empty($username)) || (empty($passwd))) {
            $response = array(
                "success" => 0,
                "message" => "Kolom tidak boleh kosong"
            );
        }
        if (!empty($Fields)) {
            $response = array(
                "success" => 1,
                "message" => "Selamat Datang" . $Fields->nama_user,
                "id_user" => $Fields->id_user,
                "username" => $Fields->username,
                "nama_user" => $Fields->nama_user,
                "passwd" => $Fields->no_hp,
                "no_hp" => $Fields->alamat
            );
        } else {
            $response = array(
                "success" => 0,
                "message" => "Username atau password salah"
            );
        }
        die(json_encode($response));
    }

    function insert_user() {
        $id_user = $this->input->post('id_user');
        $nama_user = $this->input->post('nama_user');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $passwd = $this->input->post('passwd');

        $this->db->query("INSERT INTO m_user(nama_user, username, passwd, no_hp, alamat) VALUES ('$nama_user', '$username', '$passwd', '$no_hp', '$alamat')");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal simpan profil';
        } else {
            echo 'Anda berhasil simpan profil';
        }
    }
    
    function update_user() {
        $id_user = $this->input->post('id_user');
        $nama_user = $this->input->post('nama_user');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $passwd = $this->input->post('passwd');

        $this->db->query("UPDATE m_user SET nama_user='$nama_user', username='$username', passwd='$passwd', no_hp='$no_hp', alamat='$alamat' WHERE id_user='$id_user'");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal mengganti profil';
        } else {
            echo 'Anda berhasil mengganti profil';
        }
    }
    
    function delete_user() {
        $id_user = $this->input->post('id_user');

        $this->db->query("DELETE FROM m_user WHERE id_user=$id_user");

        if ($this->db->trans_status() === FALSE) {
            echo 'Anda gagal menghapus profil';
        } else {
            echo 'Anda berhasil menghapus profil';
        }
    }
   function data_user() {
        $query = $this->db->query("SELECT * FROM m_user");
        $json = $query->result();
        echo json_encode($json);
    }

}
