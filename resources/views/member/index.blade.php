@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    {{ $title }}
                    
                    <span class="pull-right">
                            <a class="btn btn-success btn-sm btn-new-user" href="{{ URL::route('member.create') }}">Add Member</a>
                    </span>
                </header>
                <div class="panel-body">
                    
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


@section('style')
    {{ Html::style('assets/data-tables/DT_bootstrap.css') }}

@endsection


@section('script')
    {{ Html::script('assets/data-tables/jquery.dataTables.js') }}
    {{ Html::script('assets/data-tables/DT_bootstrap.js') }}

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            
            $('#example').dataTable({
            });

            function generatePopUpMessage(message, type){
                var message = '<div class="alert alert-'+type+' alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+message+'<br/></div>';
                $('#error').Html('');
                $('#error').Html(message);
                
            }

            
            var password;
            var deleteId;
            var url;
            var dataString;
           /* $(document).on("click", ".deleteBtn", function() {
                var deleteId = $(this).attr('deleteId');
               
                $(".deleteForm").attr("action", url);
            }); */

            // jquery ajax request to delete 
            //$(document).on("click", ".deleteBtn", function()
            var deleteAttemptr = '';
            $(document).on("click", ".deleteBtn", function() {
                   deleteId = $(this).attr('deleteId');

                    deleteAttemptr = $(this).parent().parent();
                    
                    
                    password = $("input#password").val();
                    
                  
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
                                    //$(".carousel-inner").Html(response.data);
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
                                //$("#error").Html(response);
                            }
                        });
            });// end of delete 
        });
    </script>
@endsection