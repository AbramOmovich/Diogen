<?php

namespace App\Http\Controllers;

use App\City;
use App\Currency;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(Request $request){
        $region_id = $request->input('region_id',false);

        if($region_id) {
            $cities = City::where('region_id',$region_id)->get();
        }
        echo json_encode( $cities,true);
    }

    public function test(){
        dump(unserialize( file_get_contents('citiesSeeder')));
    }
}
