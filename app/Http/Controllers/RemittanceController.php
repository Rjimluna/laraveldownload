<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remittance;

class RemittanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remittance = Remittance::all();
        return view('home')->with('remittance', $remittance);
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
        $upload = $request->file('upload_file')->store('upload');
        // echo $request->upload_name;
        $request->validate([
            'upload_name' => 'required',
            'upload_file' => 'required',
            'upload_user_id' => 'required',
        ]);

        $remittance = new Remittance;
        $remittance->file_name = $request->upload_name;
        $remittance->file_path = $upload;
        $remittance->user_id = $request->upload_user_id;

        // Remittance::create($request->all());
        $remittance->save();
        return redirect('/');
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
        $dl = Remittance::find($id);
        // $file = public_path()."./kpi-otif.csv";

        // response()->download($file, "kpi.csv");
        return redirect('/');
        // echo $dl->file_name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
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
