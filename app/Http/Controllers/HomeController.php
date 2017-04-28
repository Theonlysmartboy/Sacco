<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
   public function pdfview(Request $request)
    {
        $members = DB::table("members")->get();
		 $pdf = App::make('dompdf.wrapper');
		  $pdf->loadHTML($members);
		   return $pdf->stream();
       /* $members = DB::table("members")->get();

        view()->share('members',$members);


        if($request->has('download')){
            

            $pdf = \PDF::loadView('member.show',$members);

            return $pdf->download('member.show');
        }
*/
        return view('member.show')->with('title', 'List of All Members');

    }
	
	
}
