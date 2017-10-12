<div class="message">
	<div class="bg-light clearfix">		
		<div class="message-content">
			{{$message->content}}
		</div>
		<span class="message-date text-secondary float-right">{{$message->created_at}}</span>
	</div>
		<div class="message-comment bg-light"  >
			<form action="{{route('message.comment')}}" method="post">
				{!!csrf_field()!!}
				<input type="hidden" name="message-id" value="{{$message->id}}">
				<div class="write-comment" id="message-{{$message->id}}" style="display: none">
					<textarea class="form-control" name="comment" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-dark btn-sm button-comment" data-id="{{$message->id}}">Comment</button>
			</form>
		</div>					
</div>