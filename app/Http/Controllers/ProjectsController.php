<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$mg = [ 
			 'Friends' => 'Friends',
			 'Good Samaritan' => 'Good Samaritan',
			 'Jadwar' => 'Jadwar',
			 'Jubilee' => 'Jubilee',
			 'Kajulu' => 'Kajulu',
			 'Manyien Ber' => 'Manyien Ber',
			 'Oywa' => 'Oywa',
			 'Timatek' => 'Timatek',
			 'Tumaini' => 'Tumaini',
			 'Umoja' => 'Umoja',
			 'Urudi' => 'Urudi',
			 'Ushirika' => 'Ushirika',
			 'Wise king' => 'Wise king'
		];
		$pg = [ 
			 'Kisumu' => 'Kisumu',
			 'Kel' => 'Kel',
			 'Bondo' => 'Bondo',
			 'Rarieda' => 'Rarieda',
			 'Nya'=>'Nya'
		];
		
      return view('member.groups')->with('mg', $mg)->with('pg', $pg);
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
