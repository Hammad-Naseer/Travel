<x-dashboard :title="$title">
<link href="{{asset('/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            <h6 class="mb-0 text-uppercase">Add City Data</h6>
            <hr>
            <div class="card">
            <div class="card-body">
            @include('partials._errors')
            <form class="row g-3" method="post" action="{{route('cities.store')}}">
            @csrf 
            <div class="col-md-6">
            <label class="form-label">Country:</label>
            <select name="country_id" id="country_id" class="single-select mb-3 country form-control" aria-label="Default select example"  required> 
            <option value="">Select Country</option>
            @if(count ($countries) > 0)
            @foreach($countries as $country)
            <option value="{{ $country->country_id }}">{{ $country->title }}</option>
            @endforeach
            @endif
            </select>
            </div>   
            <div class="row">
             @for($row=1; $row<= 4; $row++)
                <div class="col-md-3">
                <label class="form-label">City</label>
                <input type="text" name="title[]" class="form-control" placeholder="Enter City Name " autofocus="autofocus">
                </div>
             @endfor
            </div>
            <div class="addMore">
                
            </div>
            <div class="col">
            <a href="javascript:void(0)" id="add_more_cities" class="btn btn-success">Add More</a>
            <button type="submit" class="btn btn-primary px-5">Submit</button>
            </div>
            </form>
            </div>
            </div>
			</div>
		</div>
    </x-dashboard>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{asset('/assets/plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('/assets/js/form-select2.js')}}"></script>
    <script>
    $("#add_more_cities").click(function() {
        $(".addMore").append('<div class="row"><div class="col-md-3"> <label class="form-label">City</label> <input type="text" name="title[]" class="form-control" placeholder="Enter City Name " autofocus="autofocus"> </div><div class="col-md-3"> <label class="form-label">City</label> <input type="text" name="title[]" class="form-control" placeholder="Enter City Name " autofocus="autofocus"> </div><div class="col-md-3"> <label class="form-label">City</label> <input type="text" name="title[]" class="form-control" placeholder="Enter City Name " autofocus="autofocus"> </div><div class="col-md-3"> <label class="form-label">City</label> <input type="text" name="title[]" class="form-control" placeholder="Enter City Name " autofocus="autofocus"> </div></div>');
    });
    </script>
    