@extends('admin')

@section('inline-js')
<script type="text/javascript"> 
	
    $(document).ready(function(){
		      
		
        
		
		$("#project").change(function() {
		$.get('../facility/loadsubcat/' + $(this).val(), function(data) {
			$("#groups").empty();
            $("#groups").append($('<option/>', {text : 'Select Group' }));
            
			
			if (data != null) {
				
				for (var i in data) {
					var f = data[i];
					
						$('#groups').append($('<option/>', { 
        				value: f.id,
        				text : f.name 
    					}));
					}
			}
		});	
		
    });


    }); 
    


 
</script>
@stop

@section('content')
                 <div class="panel-body">
                    {{ Form::open(array('route' => 'member.store', 'class' => 'form-horizontal','files' => true)) }}

                 <div class="form-group">
                        {{ Form::label('project', 'Sub Project', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('project', $pg,null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>


                 <div class="form-group">
                        {{ Form::label('group', 'Group', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('group', $mg,null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>


 
@endsection