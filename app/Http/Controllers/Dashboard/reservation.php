<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\reserve;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;





class reservation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner = auth()->user()->id;

        $records = Hall::orderBy('id','asc');
        if(auth()->user()->role == 'owner'){
            $records = $records->where('owner_id',$owner);
        }
        // $records = $records->where('owner_id',$owner);
        $records = $records->get();

        return view('dashboard.reservation',compact('records'));
    }

    public function reserveStatus($id, $status)
    {
        $reserve = Reserve::find($id);
        if(empty($reserve)){
            return redirect()->back();
        }
        $reserve->status = $status;
        $reserve->save();

        return redirect('/dashboard/reservation')->with('success', 'تم الاعتماد بنجاح');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = $request->except('_token');
        $reserve = new Reserve();
        $reserve->status=$data['status'];
        $reserve->save();
        return redirect()->to('dashboard/governorate')->with('message','تم التعديل  بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
