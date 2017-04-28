@extends('admin')
@section('content')
   <style type="text/css">

	table td, table th{

		border:1px solid black;

	}

</style>

<div class="container">


	<br/>

	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>


	<table>

		<thead>
                            <tr>
                                <th>MemberID</th>
                                <th>Full Name</th>
                                <th>BANK</th>
                                <th>ACCOUNT NUMBER</th>
                                <th>GROUP ID</th>
		
		</tr>
		</thead>
		
		 @foreach($datas as $key => $member)
                                <tr> 
									<td>{{ $member->id }}</td>
                                    <td>{{ $member->name }} </td>
                                    <td>{{ $member->bank }}</td>
                                    <td>{{ $member->account_no}}</td>
                                    <td>{{ $member->group_id}}</td>

		</tr>

		@endforeach

	</table>

</div>
@endsection





