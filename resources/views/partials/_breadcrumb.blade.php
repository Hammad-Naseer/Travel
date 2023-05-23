@php
$parentURI = \Request::segment(1);
$childURI = \Request::segment(2);
@endphp
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title pe-3">Forms</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-0 p-0">
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i>Home</a>
</li>
@if(!empty(trim ($parentURI) ))
<li class="breadcrumb-item active" aria-current="page">{{ ucwords(parentURI) }}</li>
@endif

@if(!empty(trim ($childURI) ))
<li class="breadcrumb-item active" aria-current="page">{{ ucwords(childURI) }}</li>
@endif
</ol>
</nav>
</div>
</div>
<!--end breadcrumb-->