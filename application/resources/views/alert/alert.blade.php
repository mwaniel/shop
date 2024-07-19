@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{Session::get("danger")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get("success")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>
@endif
@if(Session::has('warning'))
<div class="animate">
  <div class="alert alert-warning alert-dismissible border shadow-sm fade show fade" role="alert">{{Session::get("warning")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
  </div>
</div>
@endif
@if(Session::has('errors'))
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{$error}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>
@endforeach
@endif
@if(Session::has('info'))
<div class="animate">
  <div class="alert alert-info alert-dismissible border shadow-sm fade show fade" role="alert">{{Session::get("info")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
  </div>
</div>
@endif