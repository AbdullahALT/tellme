@extends('layouts.master')

@section('content')

	@include('partials.profile')

	<div class="row">
		<div id="message-list" class="col-md-12 col-lg-6  order-lg-2 order-md-1 ">
			<h4>Unpublished</h4>
			<hr>
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
@endsection