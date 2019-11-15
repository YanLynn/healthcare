<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerProfileContoller extends Controller
{
    function index() {

    }

    function getHospitalHistory($local_sto) {
        $query = "SELECT hospital_profiles.* , customers.name, customers.email, customers.phone, townships.township_name, townships.city_id, cities.city_name FROM `hospital_profiles`
                    JOIN customers ON hospital_profiles.customer_id = customers.id
                    JOIN townships ON townships.id = customers.townships_id
                    JOIN cities ON townships.city_id = cities.id
                    WHERE hospital_profiles.id IN (" . $local_sto . ")";
        $hos_histories = DB::select($query);
        foreach($hos_histories as $hos) {
            $fea_arr = explode(",", $hos->special_features);
            $hos->special_features = $fea_arr;
        }
        return $hos_histories;
    }

    function getNursingHistory($local_sto) {
        $query = "SELECT nursing_profiles.*, customers.name, customers.email, customers.phone, townships.township_name, townships.city_id, cities.city_name FROM `nursing_profiles`
                    JOIN customers ON nursing_profiles.customer_id = customers.id
                    JOIN townships ON townships.id = customers.townships_id
                    JOIN cities ON townships.city_id = cities.id
                    WHERE nursing_profiles.id IN (" . $local_sto . ")";
        $nur_histories = DB::select($query);
        foreach($nur_histories as $nur) {
            $fea_arr = explode(",", $nur->special_features);
            $nur->special_features = $fea_arr;
        }
        return $nur_histories;
    }
}
