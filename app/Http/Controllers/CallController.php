<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Call;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $d=session('d');
      dd($d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //the $id should be updated to the debtors phone no
       $id=session('d');
        $call_history=Call::where('Debtor_id',$id)->get();
        return view('Callhistory',['call_history'=>$call_history]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Call::create([
        'Contact_Type'=>$request->Contact_Type,
        'Contact_Status'=>$request->Contact_Status,
        'reason'=>$request->reason,
        'PTP_amount'=>$request->PTP_amount,
        'PTP_date'=>$request->PTP_date,
        'Call_date'=>$request->Call_date,
        'Debtor_id'=>session('d')

    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
}
