<?php

class Provinces_model extends CI_Model
{
    public function getProvinces($id = null)
    {
        if ($id == null) {
            $query = "SELECT provinces_detail.id, provinces.name AS provinces_name, provinces_detail.country_name, provinces_detail.years, provinces_detail.area
                      FROM provinces_detail, provinces
                      WHERE provinces_detail.provinces_id = provinces.id";

            return $this->db->query($query)->result_array();
        } else {
            $query = "SELECT provinces_detail.id, provinces.name AS provinces_name, provinces_detail.country_name, provinces_detail.years, provinces_detail.area
                      FROM provinces_detail, provinces
                      WHERE provinces_detail.provinces_id = provinces.id 
                      AND provinces_detail.id = $id";

            return $this->db->query($query)->row_array();
        }
    }
}
