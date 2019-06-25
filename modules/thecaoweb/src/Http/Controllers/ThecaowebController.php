<?php

namespace Zent\Thecaoweb\Http\Controllers;

use Zent\Thecaoweb\Models\Thecaoweb;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;

class ThecaowebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

        $display_name = Module::getDisplayName('thecaoweb');
        View::share('display_name', $display_name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('thecaoweb::backend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thecaoweb::backend.create');
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
            Thecaoweb::create($data);

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
        $thecaoweb = Thecaoweb::find($id);

        return view('thecaoweb::backend.edit', compact('thecaoweb', 'id'));
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
            Thecaoweb::find($data['thecaoweb_id'])->update($data);

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
            Thecaoweb::find($request->id)->delete();

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
        return view('thecaoweb::frontend.index');
    }

    /**
     * DataTables get list thecaoweb
     */
    public static function getListThecaoweb()
    {
        $thecaowebs = Thecaoweb::orderBy('id', 'desc')->get();

        return DataTables::of($thecaowebs)
            ->addIndexColumn()
            ->addColumn('action', function ($thecaoweb) {
                $txt = "";

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $thecaoweb->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="' . trans('global.edit') . '"/><i class="fa fa-pencil" aria-hidden="true"></i></button>';
    //                }

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $thecaoweb->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title="' . trans('global.delete') . '"/><i class="fa fa-trash" aria-hidden="true"></i></button>';
    //                }

                return $txt;
            })
            ->editColumn('created_at', function ($thecaoweb) {
                return date('H:i | d-m-Y', strtotime($thecaoweb->created_at));
            })
            ->editColumn('content', function ($thecaoweb) {
                return !is_null($thecaoweb->content) ? $thecaoweb->content : trans('global.not_updated');
            })
            ->editColumn('status', function ($thecaoweb) {
                return ($thecaoweb->status == 1) ? trans('global.show') : trans('global.hide');
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
