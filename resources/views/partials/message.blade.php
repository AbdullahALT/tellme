<div class="message bg-light">
		<div class=" clearfix">			
			<div class="message-content" dir="auto">
				{{$message->content}}
			</div>
			<span class="message-date text-secondary float-right">{{date('Y/m/d h:ia', strtotime($message->created_at))}}</span>
		</div>
	<div class="message-comment message-margin bg-white" dir="auto">
		{{$message->comment}}
	</div>
</div>


