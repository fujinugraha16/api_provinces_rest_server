<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Provinces extends REST_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("Provinces_model", "provinces");
    }

    public function index_get()
    {
        $id = $this->get('id');

        if ($id == null) {
            $prov = $this->provinces->getProvinces();
        } else {
            $prov = $this->provinces->getProvinces($id);
        }

        if ($prov) {
            $this->response([
                'status' => TRUE,
                'data' => $prov
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'data not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
