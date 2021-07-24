<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Datatables\ScheduleDataTable;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if($request->ajax()){           
            //Jika request from_date ada value(datanya) maka
            // if(!empty($request->from_date))
            // {
                //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
                // if($request->from_date === $request->to_date){
                    //kita filter tanggalnya sesuai dengan request from_date
                    // $schedule = Schedule::whereDate('date_start','=', $request->from_date)->get();
                // }
                // else{
                    //kita filter dari tanggal awal ke akhir
                    // $schedule = Schedule::whereBetween('date_start', array($request->from_date, $request->to_date))->get();
                // }                
            // }
            //load data default
            // else
            // {
                // $schedule = Schedule::all();
        //     }
        //     return datatables()->of($schedule)
        //                 ->addColumn('action', function($data){
        //                     $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
        //                     $button .= '&nbsp;&nbsp;';
        //                     $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
        //                     return $button;
        //                 })
        //                 ->rawColumns(['action'])
        //                 ->addIndexColumn()
        //                 ->make(true);            
        // }
        
        if (request()->search) {
            $data = Schedule::where('agenda', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
        $data = Schedule::orderBy('date_start', 'desc')->paginate(10);
        }
        return view('schedules.index', compact('data'));
       
    }

    public function ubah()
    {
        $schedule = Schedule::orderBy('date_start', 'desc')->paginate(10);
    
        return view ('schedules.ubah',[
            'schedule' => $schedule
    ]);
    }

    public function datajson()
	{
		return Datatables::of(Schedule::all())->make(true);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
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
        if(!empty($request->attachment))
        {
            $data['attachment'] = $request->file('attachment')->store(
                'assets/attachment','public'
            );
            Schedule::create($data);
        }else{
            Schedule::create($data);
        }    
     
        # Tampilin flash message
        flash('Selamat data telah berhasil ditambahkan')->success();
        
        return redirect()->route('schedules.ubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);

        return view ('schedules.show',[
            'schedule' => $schedule
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit',[
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $data = $request->all();
        // if(!empty($request->attachment))
        // {
        //     $data['attachment'] = $request->file('attachment')->store(
        //         'assets/attachment','public'
        //     );
        //     Schedule::create($data);
        // }else{
        //     Schedule::create($data);
        // }    

        if($request->file('attachment'))
        {
            $data['attachment'] = $request->file('attachment')->store('assets/attachment', 'public');
            $schedule->update($data);
        }

        $schedule->update($data);

        // if($request->hasfile('attachment'))

        // {   
    
        // $data['attachment'] = $request->file('attachment')->store(
        //             'assets/attachment','public'
        //         );
        //         $schedule->update($data);
        // }
    
        // dd($data['attachment']);
    
      
        // $schedule->update($data);

        // if(!empty($request->attachment))
        // {
        //     $data['attachment'] = $request->file('attachment')->update(
        //         'assets/attachment','public'
        //     );
           
        //     $schedule->update($data);
        // }else{
        //     $schedule->update($data);
        // }


        // if($request->attachment === ""){
        //     $schedule->update($data);
        // }
        // else{
        //     $data['attachment'] = $request->file('attachment')->store(
        //         'assets/attachment','public'
        //     );
        //     dd($data);
        //     $schedule->update($data);
        // }           
        
        // if ($request->hasFile('file')) {
        //     $data['attachment'] = $request->file('attachment')->store(
        //         'assets/attachment','public'
        //     );
        //     $schedule->update($data);
        // }
        // $schedule->update($data);

        flash('Selamat data telah berhasil diupdate')->success();

        return redirect()->route('schedules.ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        flash('Data telah berhasil dihapus')->error();

        return redirect()->route('schedules.ubah');
    }
}
