@if (session('success'))
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
    <strong>Sucess!</strong>{{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
