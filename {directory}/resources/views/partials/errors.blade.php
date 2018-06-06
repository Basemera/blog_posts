@if(count($errors))
<div class-"row">
<div class="col-md-12">
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<p>
{{ $error }}
</p>
@endforeach</ul>
</div>
</div>
</div>
@endif