<?php

namespace Zent\Thecao\Http\Controllers;

use Zent\Thecao\Models\Thecao;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;

class ThecaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

        $display_name = Module::getDisplayName('thecao');
        View::share('display_name', $display_name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('thecao::backend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thecao::backend.create');
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
            Thecao::create($data);

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
        $thecao = Thecao::find($id);

        return view('thecao::backend.edit', compact('thecao', 'id'));
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
            Thecao::find($data['thecao_id'])->update($data);

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
            Thecao::find($request->id)->delete();

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
        return view('thecao::frontend.index');
    }

    /**
     * DataTables get list thecao
     */
    public static function getListThecao()
    {
        $thecaos = Thecao::orderBy('id', 'desc')->get();

        return DataTables::of($thecaos)
            ->addIndexColumn()
            ->addColumn('action', function ($thecao) {
                $txt = "";

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $thecao->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="' . trans('global.edit') . '"/><i class="fa fa-pencil" aria-hidden="true"></i></button>';
    //                }

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $thecao->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title="' . trans('global.delete') . '"/><i class="fa fa-trash" aria-hidden="true"></i></button>';
    //                }

                return $txt;
            })
            ->editColumn('loaithe', function ($thecao) {
                switch ($thecao->loaithe) {
                    case '1':
                        $loaithe = 'Viettel';
                        break;
                    case '2':
                        $loaithe = 'Mobi';
                        break;
                    case '3':
                        $loaithe = 'Vina';
                        break;
                    default:
                        # code...
                        break;
                }
                return $loaithe;
            })
            ->editColumn('menhgia', function ($thecao) {
                return number_format($thecao->menhgia);
            })
            ->editColumn('status', function ($thecao) {
                return ($thecao->status == 1) ? trans('global.active_icon') : trans('global.deactive_icon');
            })
            ->editColumn('created_at', function ($thecao) {
                return date('H:i | d-m-Y', strtotime($thecao->created_at));
            })
            ->rawColumns(['action','status'])
            ->toJson();
    }
}
