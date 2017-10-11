@extends('layouts.master')

@section('content')

	@include('partials.profile')

	<div class="row">

		<div id="message-list" class="col-md-12 col-lg-6  order-lg-2 order-md-1 ">
			<h4>Unpublished</h4>
			<hr>
			@if(count($user->messages) == 0)
				<div class="alert alert-secondary">
					There is no messages for you yet! 
				</div>
			@endif
			@foreach($user->messages as $message)
				@if(empty($message->comment))
					<div class="message">
						<div class="bg-light clearfix">		
							<div class="message-content">
								{{$message->content}}
							</div>
							<span class="message-date text-secondary float-right">{{$message->created_at}}</span>
						</div>
						<div class="message-comment bg-light"  >
							<form action="{{route('message.comment')}}" method="post">
								<div class="write-comment" id="message-{{$message->id}}" style="display: none">
									<textarea class="form-control" rows="3"></textarea>
								</div>
								<button class="btn btn-dark btn-sm button-comment" data-id="{{$message->id}}">Comment</button>
							</form>
						</div>					
					</div>
				@endif
			@endforeach
		</div>

		<!--Still Needs Working on-->
		<div id="message-list" class="col-md-12 col-lg-6 order-lg-1 order-md-2">
			<h4>Published</h4>	
			<hr>
			@if(count($user->messages) == 0)
				<div class="alert alert-secondary">
					There is no messages for you yet! 
				</div>
			@endif
			@foreach($user->messages as $message)
				@include('partials.message')
			@endforeach
		</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$(".button-comment").click(function(event){
				//show message with id and hide any other message comment
				// $(".message-comment").each(function(){
				// 	var $id = $(this).attr("data-id");
				// 	var i = "#message-" + $id;
				// 	if($(this).attr("id") === i){
				// 		$(this).show();
				// 	} else {
				// 		$(this).hide();
				// 	}
				// });
				// $(this).hide();
				
				var $id = $(this).attr("data-id");
				var messageId = "#message-" + $id;
				var message = $(messageId);
				if(!message.is(":visible")){
					event.preventDefault();
					$(".write-comment").each(function(){
						if($(this).is(":visible")){
							$(this).hide();
						}
					});
					message.show();
					message.find("textarea").focus();
				}
				
			});
		});
	</script>
@endsection