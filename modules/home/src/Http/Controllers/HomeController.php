<?php

namespace Zent\Home\Http\Controllers;

use Zent\Home\Models\Home;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;

class HomeController extends Controller
{
    public function __construct()
    {

    }
    public function charge(Request $request){
        dd($request);
    }
   
}
