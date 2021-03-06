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
                            {{ Form::text('full_name', null, array('class' => 'form-control',  'placeholder' => 'Full Name', 'required')) }}
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
                            {{ Form::text('nid', null, array('class' => 'form-control', 'placeholder' => '', 'required')) }}
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
                            {{ Form::submit('Add Member', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                
            </section>
        </div>
    </div>
@endsection



@section('style')
    {{ Html::style('css/chosen_dropdown/chosen.css') }}
    {{ Html::style('rename/css/fileinput.min.css') }}
	{{ Html::style('assets/bootstrap-datepicker/css/datepicker.css') }}

@endsection



@section('script')

    {{ Html::script('js/chosen_dropdown/chosen.jquery.min.js') }}
    {{ Html::script('rename/js/plugins/canvas-to-blob.min.js') }}
    {{ Html::script('rename/js/fileinput_locale_<lang>.js') }}
    {{ Html::script('rename/js/fileinput.min.js') }}
    {{ Html::script('assets/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
		

    <script>
    $(document).on('ready', function() {
        $("#input-4").fileinput({showCaption: false});
        /*$("#date").datepicker({
                format: 'yyyy-mm-dd'
            });*/
            $( "#dob" ).datepicker( "setDate", new Date() ); 
    });
    </script>    
    
@endsection
