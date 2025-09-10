@extends('Shared_Layout.Shared')

@section('Title') Review @endsection


@section('Content')
<div class="container text-center mt-5 mb-5">
    <h2 class="text-success">🎉 @lang('messages.Thank You!')</h2>
    <p>@lang('messages.Your order has been placed successfully.')</p>
    <a href="{{ route('Home.Index') }}" class="btn btn-primary mt-3">@lang('messages.Back to Home')</a>
</div>
@endsection

