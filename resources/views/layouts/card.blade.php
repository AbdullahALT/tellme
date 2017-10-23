@extends('layouts.master')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
            	<div class="card-header">
            		@yield('header')
            	</div>
                <div class="card-body">
                    @yield('body')
                </div>
                <div class="card-footer">@yield('footer')</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script type="text/javascript">
		// if child didn't implement an element, then delete it to prevent showing empty header, body, or footer
		$(document).ready(function(){
			if(isEmpty($('.card-header'))){
				$('.card-header').remove();
			}
			if(isEmpty($('.card-body'))){
				$('.card-body').remove();
			}
			if(isEmpty($('.card-footer'))){
				$('.card-footer').remove();
			}
		});

		function isEmpty(el){
			return $.trim($(el).html()) == '' ;
		}
	</script>
@endsection
