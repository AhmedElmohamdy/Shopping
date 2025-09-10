@extends('Shared_Layout.Shared')

@section('Title') Review @endsection


@section('Content')


 {{-- Display all error messages --}}
 @if ($errors->any())
 <div style="color: red;">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif


  
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>@lang('messages.Contact us')</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>@lang('messages.Have you any review?')</h2>
						
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" id="ReviewForm" action="{{route('ContactUs.Save')}}" enctype="multipart/form-data">
							@csrf
							<p>
								
								<input type="text" placeholder=@lang('messages.User Name') name="user_name" id="user_name">
								@if ($errors->has('user_name'))
                                <span style="color: red;">{{ $errors->first('user_name') }}</span>
                            @endif
							<input type="email" placeholder=@lang('messages.Email (e.g., user@example.com)') name="user_email" id="user_email">
							@if ($errors->has('user_email'))
							<span style="color: red;">{{ $errors->first('user_email') }}</span>
						@endif
							</p>
							<p>
								<input type="tel" placeholder=@lang('messages.Phone Number') name="user_phone" id="user_phone">
								@if ($errors->has('user_phone'))
                                <span style="color: red;">{{ $errors->first('user_phone') }}</span>
                            @endif
							</p>
							<p>
								<textarea name="user_message" id="user_message" cols="30" rows="10" placeholder=@lang('messages.Message')></textarea>
								@if ($errors->has('user_message'))
                                <span style="color: red;">{{ $errors->first('user_message') }}</span>
                            @endif
							</p>
							<p><input type="submit" id="submitButton" value=@lang('messages.Submit')></p>

							
							<script>
                                document.getElementById("ReviewForm").addEventListener("submit", function(event) {
                                    event.preventDefault(); // Stop form submission
                                    alert("Review Added Successfully!...Thank You"); 
                                    this.submit(); // Submit the form after showing the message
                                });
                            </script>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- end contact form -->

	

	
@endsection
