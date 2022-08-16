<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\reserve;
use Mail;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls = Hall::get();
        return view('website.home',compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('website.reserve');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $data = $request->except('_token');
//        $reserve = new reserve();
////        $reserve->status=$data['status'];
//        $reserve->date_from=$data['date_from'];
//        $reserve->date_to=$data['date_to'];
//        $reserve->time_form=$data['time_form'];
//        $reserve->time_to=$data['time_to'];
////        $reserve->appropriate=$data['appropriate'];
////        $reserve->hall_id=$data['hall_id'];
////        $reserve->customer_id=$data['customer_id'];
//        $reserve->save();
////        reserve::create($request->all());
//        return redirect()->back()->with('message','تم اضافة الحجز بنجاح');
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
        //
    }



    public function searchForm (Request $request) {


        return $request;

        $data = $request->except('_token');
        $records = [];
        if (   isset($data['name']) != '' ) {
            // $records  = Hall::orderBy('id','asc');

            $records = DB::table('halls');
            // if ($data['name'] != ''){
            //     $records = $records->where('name','like','%'.str_replace(' ','%',$data['name']).'%')
            //     ->where('address','like','%'.str_replace(' ','%',$data['name']).'%')
            //     ->where('governorate_id','like','%'.str_replace(' ','%',$data['name']).'%');
            // }
            //     $name=$data['name'];
            //     $records = $records->where('name','like',"%.$name.%");

            $records->where('name','like','%'.str_replace(' ','%',$data['name']).'%')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('governorates')
                      ->whereColumn('governorates.governorate_id', 'halls.id');
            });
            
            $records = $records->get();
            foreach ($records as $datastore) {
                $img_link = Storage::url($datastore->image);
                $datastore->image = $img_link;
            }
        }

        return response()->view('store.search_form',['records'=>$records]);

    }

    public function contact(Request $request)
    {
        $data = $request->except('_token');

        Contact::create($data);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];

        // return $data['name'];
   
      Mail::send(['text'=>'mail', 'data'=>$data], $data, function($message) {
         $message->to('reserveation@gmail.com', 'منصة منساباتي')->subject
            ('رسالة جديدة من نموذج الاتصال');
         $message->from('reserveation@gmail.com','رمزي');
      });

        return redirect('/contact')->with('success', 'تم ارسال رسالتك');
    }


}

