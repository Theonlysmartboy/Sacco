<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Redirect;
class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$mg = [ 
			 'Select Group' => 'Select Group',
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
			 'Select Sub Project' => 'Select Sub Project',
			 'Kisumu' => 'Kisumu',
			 'Eldoret' => 'Eldoret',
			 'Bondo' => 'Bondo',
			 'Rarieda' => 'Rarieda',
			 'Nyamasaria'=>'Nyamasaria'
		];
		$bank=[
			'Select Bank'=>'Select Bank',
			'Equity Bank'=>'Equity Bank',
			'KCB'=>'KCB',
			'National Bank'=>'National bank',
			'Co-Operative Bank'=>'Co-operative Bank'
			
		];
		/*
       return view('add')->with('title', 'Add a Member')->with('mg', $mg)->with('pg', $pg)->with('bank','$bank');
		*/
	return view('member.add')->with('title', 'Add a Member')->with('mg', $mg)->with('pg', $pg)->with('bank',$bank);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $members = Member::all();
		return View('member.show')
						->with('title', 'List of All Members')
						->with('members', $members);
		
    }

   
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
	
		$member = new Member();
		$member->name = $request->full_name;
		$member->bank = $request->bank;
		$member->account_no = $request->nid;
		$member->group_id = $request->group;
		$member-> save(); 
		
			if($member->save()){

			

				return Redirect::route('member.index')->with('success',"New Member Added Successfully");
			} else {
				return Redirect::route('member.index')->with('error',"Something went wrong.Try again");
			}
		

		
	}
  /**  public function store(Request $request)
    {
        //
    }
	*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
	{
     
		try{
			$mg = [ 
			 'Select Group' => 'Select Group',
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
			 'Select Sub Project' => 'Select Sub Project',
			 'Kisumu' => 'Kisumu',
			 'Eldoret' => 'Eldoret',
			 'Bondo' => 'Bondo',
			 'Rarieda' => 'Rarieda',
			 'Nyamasaria'=>'Nyamasaria'
		];
		$bank=[
			'Select Bank'=>'Select Bank',
			'Equity Bank'=>'Equity Bank',
			'KCB'=>'KCB',
			'National Bank'=>'National bank',
			'Co-Operative Bank'=>'Co-operative Bank'
			
		];
		
			$member = Member::find($id);
			$user_id = $member->id;
			
			$full_name = $member->name;
			$account_no=$member->account_no;
			
			return View('member.edit')
						->with('full_name',$full_name)
						->with('title','Edit member Info')
						->with('bank', $bank)
						->with('mg', $mg)
				        ->with('pg', $pg)
						->with('account_no', $account_no);
					
		}catch(Exception $ex){
			return Redirect::route('member.add')->with('error','Something went wrong.Try Again.');
		}
	}

	public function update($id)
	{
		$rules = [
					'first_name'      => 'required',
					'last_name'       => 'required',
					'email'           => 'required',
					'national_id'     => 'required',
					'birth_date'      => 'required',
					'member_group'     => 'required',
					'sex'             => 'required',
					'marital_status'  => 'required'		
				];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}
		//return $id;
		
		// get the previous photo link 
		 $img_link = Profile::find($id)->photo;


		if(Input::hasFile('img_link')) {
			$file = Input::file('img_link');

			$destination = public_path().'/uploads/photos/';
			$filename = time().'_'.$file->getClientOriginalName();
			$file->move($destination, $filename);
			$img_link = '/uploads/photos/'.$filename;
		}
		
		$user = User::find($data['user_id']);
		
		$user->email = $data['email'];
		if($user->save()){
			$user_id = $user->id;
			$profile = Profile::find($id); // passed from edit.blade.php
			$profile->user_id = $user_id;
			$profile->first_name = $data['first_name'];
			$profile->last_name = $data['last_name'];
			$profile->national_id = $data['national_id'];
			$profile->sex = $data['sex'];
			$profile->blood_group = $data['member_group'];
			$profile->birth_date = $data['birth_date'];
			$profile->marital_status= $data['marital_status'];
			$profile->phone = $data['phone'];
			$profile->photo = $img_link;

			if($profile->save()){
				return Redirect::route('member.index')->with('success',"member Profile Updated Successfully");
			} else {
				return Redirect::route('member.index')->with('error',"Something went wrong.Try again");
			}
		} else {
			return Redirect::route('member.index')->with('error',"Something went wrong.Try again");
		}
		
	}

	public function destroy($id)
	{

		$allInput = Input::all();
		$data = Input::get('password');
		$rules['password'] = 'required';
		$validator = Validator::make($allInput,$rules);

		if($validator->fails()){
			return $this->errorResponse("Password Required", 400);
		}

		if(Hash::check($data,Auth::user()->password)) {
			// return 'succes';
			$user_id = Member::find($id);
			User::destroy($user_id);

			return $this->response('Member Deleted Successfully.', 201);
		} else {
			return $this->errorResponse('Password did not match', 400);
		}
	}

	public function search() {
		$id = Input::get('id');
		if(is_numeric($id)) {
			if(!User::where('memberID', $id)->exists()) {
				return Redirect::route('dashboard')->withErrors('The member ID you provided does not exist. Please, Search with a valid ID');
			}
			$status = User::where('memberID', $id)->first(); // $d is member id here
			$id = User::where('memberID', $id)->pluck('id'); // this is user id 
		} else {
			$profile= Profile::where('first_name', 'LIKE', '%'.$id.'%')->orWhere('last_name', 'LIKE', '%'.$id.'%')->first();
			if(!$profile){
				return Redirect::route('dashboard')->withErrors('The member Name you provided does not exist. Please, Search with a valid Name');
			}
			$id = $profile->user_id;
			$status = User::find($id);
		}
		
		$salary = Helper::calculation($id);
		return View('member.show')
						->with('status', $status);
	}


	// code for json response to 
	private function response($message, $status = 200){
		return Response::json([
						'data' => $message,
						'status_code' => $status
						
					],$status);
	}
	private function errorResponse($message, $status = 400){
		return Response::json([
						'error' => $message,
						'status_code' => $status
						
					], $status);
	}


}
