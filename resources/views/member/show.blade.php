@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                  <h1>{{ $title }}</h1>  
                    
                    <span class="pull-right">
                            <a class="btn btn-success btn-sm btn-new-user" href="../public/add">Add Member</a>
                    </span>
                </header>
                <div class="panel-body">
                    @if(count($members))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th>MemberID</th>
                                <th>Full Name</th>
                                <th>BANK</th>
                                <th>ACCOUNT NUMBER</th>
                                <th>GROUP ID</th>
                               
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->name }} </td>
                                    <td>{{ $member->bank }}</td>
                                    <td>{{ $member->account_no}}</td>
                                    <td>{{ $member->group_id}}</td>
                                    
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-success btn-show" href="{{ URL::route('member.edit', array('id' => $member->id)) }}">Edit</a>
                                        <a href="members/{{$member->id}}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    
                    <span class="pull-right">
                            <a class="btn btn-success btn-sm btn-new-user" href="">Add Address to member</a>
                    </span>
                    @else
                        No Data Found
                    @endif
                </div>
                
            </section>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <span id="error">
                        
                    </span>
                    
                    <h3>Provide Your Password</h3>
                    {{ Form::open(array('route' => array('members'), 'method'=> 'Delete', 'class' => 'deleteForm')) }}
                    <div class="form-group">
                       
                        <div class="col-md-4">
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '','id' => 'password', 'required')) }}
                        </div>
                    </div>
                     <div class="carousel-inner">
                        
                    </div>
                   
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button  type="submit" class="btn btn-success" id="deleteButtonYes">Yes</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


@endsection





@section('script')
    

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            
            $('#example').dataTable({
            });

            function generatePopUpMessage(message, type){
                var message = '<div class="alert alert-'+type+' alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+message+'<br/></div>';
                $('#error').html('');
                $('#error').html(message);
                
            }

            
            var password;
            var deleteId;
            var url;
            var dataString;
           /* $(document).on("click", ".deleteBtn", function() {
                var deleteId = $(this).attr('deleteId');
                var url = "<?php echo URL::route('members'); ?>";
                $(".deleteForm").attr("action", url);
            }); */

            // jquery ajax request to delete 
            //$(document).on("click", ".deleteBtn", function()
            var deleteAttemptr = '';
            $(document).on("click", ".deleteBtn", function() {
                   deleteId = $(this).attr('deleteId');

                    deleteAttemptr = $(this).parent().parent();
                    
                    
                    password = $("input#password").val();
                    
                    url = "<?php echo URL::route('members', false); ?>/"+deleteId;
                    // alert(url);
                    //var token =  $("input[name=_token]").val();
                    dataString = { password : password,
                                    id : deleteId
                                }

               
            }); 
            $("#deleteButtonYes").click(function(e){
                    
                    e.preventDefault();
                    $('form.deleteForm').serialize();
                       $.ajax({
                            type: "delete",
                            url: url,
                            data: $('form.deleteForm').serialize(),
                            success: function(response){

                                if(response.status_code == '201'){
                                 var message = 'Successfull';
                                    
                                    
                                    generatePopUpMessage(response.data, 'success');
                                    //$(".carousel-inner").html(response.data);
                                    // $(this).modal('hide');
                                    //console.log(response);
                                    $("#deleteConfirm").modal('toggle');
                                    deleteAttemptr.hide();               
                                }
                                
                                console.log(response);

                            },
                            error: function($response){
                                var message = 'Something Went Wrong';
                                //var message = "";
                                var response = $response.responseJSON;
                                console.log(response);
                                var obj = response.error;
                                // for (var key in obj) {
                                //     message += obj[key]+"<br>";
                                // }
                                generatePopUpMessage(obj, 'danger');
                                //$("#error").html(response);
                            }
                        });
            });// end of delete 
        });
    </script>
@endsection