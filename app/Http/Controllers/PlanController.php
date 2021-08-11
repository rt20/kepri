<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Desa;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        
        if($request->ajax()){           
           //Jika request from_date ada value(datanya) maka
           if(!empty($request->from_date))
           {
               //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
               if($request->from_date === $request->to_date){
                   //kita filter tanggalnya sesuai dengan request from_date
                   $plan = Plan::whereDate('date_start','=', $request->from_date)->orderBy('date_start', 'desc');
               }
               else{
                   //kita filter dari tanggal awal ke akhir
                   $plan = Plan::whereBetween('date_start', array($request->from_date, $request->to_date))->orderBy('date_start', 'desc');
               }
           }
           //load data default
           else
           {
                // $plan = Plan::orderBy('id', 'desc');
                $plan = Plan::all();
            }
            return datatables()->of($plan)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  title="Ubah" data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                            // $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" title="Hapus" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);            
        }
        
        return view('plans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desas = Desa::all();

        return view('plans.create', [
            'desas' => $desas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        Plan::create($data);

        return redirect()->route('plan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Plan::where('id',$id)->delete();

        return response()->json($post);
    }
}
