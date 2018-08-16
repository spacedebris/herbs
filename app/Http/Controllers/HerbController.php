<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Herb;

class HerbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $herbs = Herb::orderBy('id','DESC')->paginate(5);
        return view('herbs.index',compact('herbs'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('herbs.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'from' => 'required|date',
            'to' => 'required|date|after:from',
            'purpose' => 'required',
            'destination' => 'required',
            'financing' => 'required',
            'advances' => 'required',
        ]);


        Herb::create($request->all());


        return redirect()->route('herbs.index')
                        ->with('success','Herb utworzony');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Herb = Herb::find($id);
        return view('herbs.show',compact('Herb'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Herb = Herb::find($id);
        return view('herbs.edit',compact('Herb'));
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);


        Herb::find($id)->update($request->all());


        return redirect()->route('herbs.index')
                        ->with('success','Herb updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Herb::find($id)->delete();
        return redirect()->route('herbs.index')
                        ->with('success','Herb deleted successfully');
    }
}
