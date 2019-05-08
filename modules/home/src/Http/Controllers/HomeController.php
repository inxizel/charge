<?php

namespace Zent\Home\Http\Controllers;

use Zent\Home\Models\Home;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;

use Zent\Thecao\Models\Thecao;
use GuzzleHttp\Client;
use Validator;

class HomeController extends Controller
{
    public function __construct()
    {

    }
    public function charge(Request $request){

        //Validate request
        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'menhgia' => 'required|numeric',
            'serial' => 'required|numeric',
            'mathe' => 'required|numeric|unique:thecaos',
        ]);
        if ($validator->fails()) {
            return json_encode(array('err' => true, 'msg' => 'validate'));
        }

        // Save to db
        $thecao['uid'] = $request->uid;
        $thecao['loaithe'] = $request->loaithe;
        $thecao['menhgia'] = $request->menhgia;
        $thecao['serial'] = $request->serial;
        $thecao['mathe'] = $request->mathe;
        
        $create = Thecao::create($thecao);
        // Send web charging
        $client = new Client();
        $res = $this->charge_thuthe(
            $thecao['loaithe'],
            $thecao['menhgia'],
            $thecao['serial'], 
            $thecao['mathe']
        );
        // Update database



        
        return $res;
    }

    public function charge_thuthe($type, $amount,$seri, $pin){
        $client = new Client();

        $user_id = '161';
        switch ($type){
            case 1:
                $type_thuthe = 1;
                break;
            case 2:
                $type_thuthe = 2;
                break;
            case 4:
                $type_thuthe = 3;
                break;
            default:
                break;
        }
        $url = 'http://thuthe.com/home/api_nap_cham/'.$user_id.'/'.$seri.'/'.$pin.'/'.$type_thuthe.'/'.$amount;
        $response = $client->request('GET', $url);
        $res = $response->getBody()->getContents();
        return $res;
    }
   
}
