@extends('admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                 
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('members') }}">Members List</a>

					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array( 'class' => 'form-horizontal','files' => true)) }}

        <!-- input for full name-->

                    <div class="form-group">
                        {{ Form::label('full_name', 'Full Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('full_name', $full_name,null, array('class' => 'form-control',  'placeholder' => 'Full Name', 'required')) }}
                        </div>
                    </div>

        <!-- input for Bank -->

                    <div class="form-group">
                        {{ Form::label('bank', 'Bank*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('bank',$bank, null, array('class' => 'form-control', 'placeholder' => 'Bank', 'required')) }}
                        </div>
                    </div>


        

        <!-- input for account number -->           

                    <div class="form-group">
                        {{ Form::label('nid', 'Account Number', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('nid',$account_no,null, array('class' => 'form-control', 'placeholder' => '', 'required')) }}
                        </div>
                    </div>

         <!-- input for sex -->           

                    <div class="form-group">
                        {{ Form::label('sex', 'Sex*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::radio('sex', 'Female', array('class' => 'form-control', 'required')) }} Female<br>
                            {{ Form::radio('sex', 'Male', array('class' => 'form-control', 'required')) }} Male
                        </div>
                    </div>

               

                    
        <!-- input for dateofbirth -->           

                    <div class="form-group">
                        {{ Form::label('dob', 'Date of Birth', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('dob', null, array('class' => 'form-control', 'placeholder' => 'mm/dd/yyyy', 'id' => 'dob')) }}
                        </div>
                    </div>

        <!-- input for marital_status -->           

                    <div class="form-group">
                        {{ Form::label('marital_status', 'Marital Status', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
							{{ Form::radio('marital_status', 'no_choice' ) }} <span> Choose not to disclose</span>
                            {{ Form::radio('marital_status', 'Single', true) }}<span> Single</span><br>
                            {{ Form::radio('marital_status', 'Married' ) }} <span> Married</span>
                        </div>
                    </div>

        <!-- input for phone number-->

                    <div class="form-group">
                        {{ Form::label('contact', 'Contact Number*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('contact', null, array('class' => 'form-control',  'placeholder' => '+254 XXXX XXX XXX', 'required')) }}
                        </div>
                    </div>


        <!-- sub project  -->

                     <div class="form-group">
                        {{ Form::label('sub_project', 'Sub Project', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('sub_project', $pg,null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
         <!-- group  -->

                 <div class="form-group">
                        {{ Form::label('group', 'Group', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('group', $mg,null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
     
        <!-- submit button  -->       

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                
            </section>
        </div>
    </div>
@endsection



@section('script')

<script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
 
    <script>
    $(document).on('ready', function() {
        $("#input-4").fileinput({showCaption: false});
    });
    </script>

    <script>
        $(document).on('ready', function() {
            $("#input-4").click(function(){
                $("#preimg").fadeOut("1000");
                
              //  $("#div2").fadeOut("slow");
             //   $("#div3").fadeOut(3000);
            });
        });
    </script>

@endsection