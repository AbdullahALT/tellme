<div class="message">
	<div class="bg-light clearfix">		
		<div class="message-content" dir="auto">
			{{$message->content}}
		</div>
		<span class="message-date text-secondary float-right">{{date('Y/m/d h:ia', strtotime($message->created_at))}}</span>
	</div>
		<div class="message-comment bg-light"  dir="auto">
			<form action="{{route('message.comment')}}" method="post" class="d-inline">
				{!!csrf_field()!!}
				<input type="hidden" name="message-id" value="{{$message->id}}">
				<div class="write-comment" id="message-{{$message->id}}" style="display: none">
					<textarea class="form-control" name="comment" rows="3" dir="auto"></textarea>
				</div>
				<button type="submit" class="btn btn-dark btn-sm button-comment" data-id="{{$message->id}}">Comment</button>
				
			</form>
			<button type="button" class="btn btn-danger btn-sm button-delete" data-toggle="modal" data-target="#confirmDelete" 
					data-link="{{route('message.delete', ['id' => $message->id])}}" data-message="{{$message->content}}"> Delete </button>
			{{-- <form action="{{URL::to('/message/delete/' . $message->id)}}" method="post" class="d-inline">
				{!!csrf_field()!!}
				<input type="hidden" name="message-id" value="{{$message->id}}">
				<button class="btn btn-danger btn-sm">Delete</button>
			</form> --}}
		</div>					
</div>