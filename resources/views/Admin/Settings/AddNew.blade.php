@extends('Shared_Layout.SharedAdminView')
@section('Title')
    Add Settings
@endsection


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


    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>@lang('messages.Add Settings')</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" id="CategoryForm" action="{{ route('Settings.Save') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.address') name="address"
                                    id="address">
                                @if ($errors->has('address'))
                                    <span style="color: red;">{{ $errors->first('address') }}</span>
                                @endif
                            </p>

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.addressArInArabic') name="address_ar"
                                    id="address_ar">
                                @if ($errors->has('address_ar'))
                                    <span style="color: red;">{{ $errors->first('address_ar') }}</span>
                                @endif
                            </p>

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.Phone') name="phone"
                                    id="phone">
                                @if ($errors->has('phone'))
                                    <span style="color: red;">{{ $errors->first('phone') }}</span>
                                @endif
                            </p>

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.email') name="email"
                                    id="email">
                                @if ($errors->has('email'))
                                    <span style="color: red;">{{ $errors->first('email') }}</span>
                                @endif
                            </p>

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.facebook_url') name="facebook_url"
                                    id="facebook_url">
                                @if ($errors->has('facebook_url'))
                                    <span style="color: red;">{{ $errors->first('facebook_url') }}</span>
                                @endif
                            </p>
                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.twitter_url') name="twitter_url"
                                    id="twitter_url">
                                @if ($errors->has('twitter_url'))
                                    <span style="color: red;">{{ $errors->first('twitter_url') }}</span>
                                @endif
                            </p>
                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.instagram_url') name="instagram_url"
                                    id="instagram_url">
                                @if ($errors->has('instagram_url'))
                                    <span style="color: red;">{{ $errors->first('instagram_url') }}</span>
                                @endif
                            </p>
                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="text" style="width: 100%" placeholder=@lang('messages.linkedin_url') name="linkedin_url"
                                    id="linkedin_url">
                                @if ($errors->has('linkedin_url'))
                                    <span style="color: red;">{{ $errors->first('linkedin_url') }}</span>
                                @endif
                            </p>

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <textarea style="width: 100%" placeholder=@lang('messages.About us') name="AboutUs" id="AboutUs"></textarea>
                                @if ($errors->has('AboutUs'))
                                    <span style="color: red;">{{ $errors->first('AboutUs') }}</span>
                                @endif
                            </p>

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <textarea style="width: 100%" placeholder=@lang('messages.AboutArUsInArabic') name="AboutUs_ar" id="AboutUs_ar"></textarea>
                                @if ($errors->has('AboutUs_ar'))
                                    <span style="color: red;">{{ $errors->first('AboutUs_ar') }}</span>
                                @endif
                            </p>

                            <p>
                                {{-- name and id should be same of names on DB --}}
                                <input type="file" name="logo" id="logo" class="form-control"
                                    placeholder=@lang('messages.logo')>
                                @if ($errors->has('logo'))
                                    <span style="color: red;">{{ $errors->first('logo') }}</span>
                                @endif

                            </p>

                            <button type="submit" id="submitButton" class="btn btn-success">@lang('messages.Add New')</button>


                            <script>
                                document.getElementById("CategoryForm").addEventListener("submit", function(event) {
                                    event.preventDefault(); // Stop form submission
                                    alert("Category Added Successfully!");
                                    this.submit(); // Submit the form after showing the message
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
