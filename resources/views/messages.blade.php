
@if(Session::has('message'))
<div class="container py-2">
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
</div>
@endif