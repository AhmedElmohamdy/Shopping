@extends('Shared_Layout.SharedAdminView')

@section('Title') Register Success @endsection


@section('Content')
<div class="container text-center mt-5 mb-5">
    <h2 class="text-success">🎉 @lang('messages.Thank You!')</h2>
    <p>@lang('messages.You Reistered successfully.')</p>
    <a href="{{ route('Admin.Home') }}" class="btn btn-primary mt-3">@lang('messages.Back to Home')</a>
</div>
@endsection