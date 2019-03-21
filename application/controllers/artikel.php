<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class artikel extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

function index_get() {
        $id = $this->get('id_artikel');
        if ($id == '') {
            $Artikel = $this->db->get('artikel')->result();
        } else {
            $this->db->where('id_artikel', $id);
            $Artikel = $this->db->get('artikel')->result();
        }
        $this->response($Artikel, 200);
    }


	function index_post() {
        $data = array(
                    'id_daerah'          => $this->post('id_daerah'),
                    'judul'    => $this->post('judul'),
                   	'isi'    => $this->post('isi'),
                   	'tanggal'    => $this->post('tanggal'),
                   	'id_admin'    => $this->post('id_admin'),
                   	'gambar'    => $this->post('gambar')

                );
        $insert = $this->db->insert('artikel', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function index_put() {
        $id = $this->put('id_artikel');
        $data = array(
                    'id_daerah'          => $this->put('id_daerah'),
                    'judul'    => $this->put('judul'),
                   	'isi'    => $this->put('isi'),
                   	'tanggal'    => $this->put('tanggal'),
                   	'id_admin'    => $this->put('id_admin'),
                   	'gambar'    => $this->put('gambar')


                );
        $this->db->where('id_artikel', $id);
        $update = $this->db->update('artikel', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function index_delete() {
        $id = $this->delete('id_artikel');
        $this->db->where('id_artikel', $id);
        $delete = $this->db->delete('artikel');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
