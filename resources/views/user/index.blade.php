@extends('layouts.master')

@section('content')

	@include('partials.profile')

	<div class="row">
		<div id="message-list" class="col-md-12 col-lg-6  order-lg-2 order-md-1 ">
			<h4>Unpublished</h4>
			<hr>
			@if(Session::has('success'))
				<div class="alert alert-success">
					{{Session::get('success')}}
				</div>
			@endif
			@if(count($unpublished) == 0)
				<div class="alert alert-secondary">
					There is no messages for you yet! 
				</div>
			@endif
			@foreach($unpublished as $message)
				@include('partials.unpublished-message')
			@endforeach
		</div>

		<!--Still Needs Working on-->
		<div id="message-list" class="col-md-12 col-lg-6 order-lg-1 order-md-2">
			<h4>Published</h4>	
			<hr>
			@if(count($published) == 0)
				<div class="alert alert-secondary">
					There is no messages for you yet! 
				</div>
			@endif
			@foreach($published as $message)
				@include('partials.message')
			@endforeach
		</div>
	</div>

	<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteTitle" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="confirmDeleteTitle">Confirm Delete</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body" dir="auto">
	        		
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<form method="post" id="deleteForm" class="d-inline">
	        			{!!csrf_field()!!}
	        			<button type="submit" class="btn btn-danger">Delete</button>
	        		</form>
	      		</div>
	    	</div>
	  	</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$(".button-comment").click(function(event){
				
				var $id = "#message-" + $(this).attr("data-id");
				var message = $($id);
				if(!message.is(":visible")){
					event.preventDefault();
					$(".write-comment").each(function(){
						if($(this).is(":visible")){
							$(this).hide();
						}
					});
					message.show();
					message.find("textarea").focus();
					$(this).html("Publish");
				} else {
					event.click();
				}
				
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#confirmDelete').on('show.bs.modal', function(e) {
				
			  	var data = $(e.relatedTarget).data();
			  	$('.modal-body', this).text(data.message);
			  	$('#deleteForm').attr('action', data.link);
			  	
			});

		});
	</script>
@endsection