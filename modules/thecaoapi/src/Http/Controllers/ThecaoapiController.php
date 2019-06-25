<?php

namespace Zent\Thecaoapi\Http\Controllers;

use Zent\Thecaoapi\Models\Thecaoapi;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;


use Zent\Thecaoweb\Models\Thecaoweb;
class ThecaoapiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

        $display_name = Module::getDisplayName('thecaoapi');
        View::share('display_name', $display_name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('thecaoapi::backend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thecaoapi::backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = array();
            parse_str($request->data, $data);
            Thecaoapi::create($data);

            DB::commit();
            return response()->json(['err' => false, 'msg' => trans('global.create_success')]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['err' => true, 'msg' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apiwebs = Thecaoweb::all();
        $thecaoapi = Thecaoapi::find($id);

        return view('thecaoapi::backend.edit', compact('thecaoapi', 'id','apiwebs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = array();
            parse_str($request->data, $data);

            Thecaoapi::find($data['thecaoapi_id'])->update($data);

            DB::commit();
            return response()->json(['err' => false, 'msg' => trans('global.update_success')]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['err' => true, 'msg' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();

        try {
            Thecaoapi::find($request->id)->delete();

            DB::commit();
            return response()->json([ 'err' => false, 'msg' =>  trans('global.delete_success')]);

        } catch (\Exception $e) {
            return response()->json(['err'  =>  true, 'msg' =>  $e->getMessage()]);
        }
    }

    /**
     * Return view front end.
     *
     */
    public function home()
    {
        return view('thecaoapi::frontend.index');
    }
    
    /**
     * DataTables get list thecaoapi
     */
    public static function getListThecaoapi()
    {
        $thecaoapis = Thecaoapi::orderBy('id', 'desc')->get();

        return DataTables::of($thecaoapis)
            ->addIndexColumn()
            ->addColumn('action', function ($thecaoapi) {
                $txt = "";

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $thecaoapi->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="' . trans('global.edit') . '"/><i class="fa fa-pencil" aria-hidden="true"></i></button>';
    //                }

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $thecaoapi->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title="' . trans('global.delete') . '"/><i class="fa fa-trash" aria-hidden="true"></i></button>';
    //                }

                return $txt;
            })
            ->editColumn('loaithe', function ($thecaoapi) {

                $txt = '';
                switch ($thecaoapi->loaithe) {
                    case '1':
                        $txt = 'Viettel';
                        break;
                    case '2':
                        $txt = 'Mobi';
                        break;
                    case '3':
                        $txt = 'Vina';
                        break;
                }
                return $txt;
            })
            ->editColumn('menhgia', function ($thecaoapi) {
                return number_format($thecaoapi->menhgia);
            })
            ->editColumn('api', function ($thecaoapi) {
                $txt = '';
                switch ($thecaoapi->api) {
                    case '1':
                        $txt = 'ThuThe';
                        break;
                    case '2':
                        $txt = 'MuaCard';
                        break;
                    case '3':
                        $txt = 'TrumThe';
                        break;
                }
                return $txt;
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    
}
