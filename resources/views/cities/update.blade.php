<x-dashboard>
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')
       
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            <h6 class="mb-0 text-uppercase">Edit City Data</h6>
            <hr>
            <div class="card">
            <div class="card-body">
            @include('partials._errors')
            <form class="row g-3" method="POST" action="{{route('cities.update',$city->city_id)}}">
            @csrf 
            @method('PUT')
            <div class="col-md-6">
            <label class="form-label">Title:</label>
            <input type="text" name="city_title" class="form-control" placeholder="Enter title" required autofocus="autofocus" value="{{$city->city_title}}">
            </div>
            <div class="col-md-6">
            <label class="form-label">Country:</label>
            <select name="country_id" id="country_id" class="single-select mb-3 country form-control" aria-label="Default select example"  required> 
            <option value="">Select Country</option>
            @if(count ($countries) > 0)
            @foreach($countries as $country)
            <option value="{{ $country->country_id }}" {{ $country ->country_id == $city ->city_id ? 'selected="selected"' : ''}}>{{ $country->title }}</option>
            @endforeach
            @endif
            </select>
            </div> 
            <div class="col-md-12">
            <label class="form-label">Url-Title:</label>
            <input type="text" name="url_title" class="form-control" placeholder="Enter title" required autofocus="autofocus" value="{{$city->url_title}}">
            </div>
            
            <div class="col">
            <button type="submit" class="btn btn-primary px-5">update</button>
            </div>
            </form>
            </div>
            </div>
			</div>
		</div>
    </x-dashboard>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        
        $(".country").change(function() 
        {
        var country_id = $(this).val();
        province(country_id);
        });

    $(".province").change(function() {
        var province_id = $(this).val();
        city(province_id);
    });
    function province(country_id) 
    {
        $.ajax({
            method: 'POST',
            headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
                },
            data: {country_id: country_id},
            url:"/get_province",
            dataType: "html",
            
            success: function(response) 
            {
                // alert(response);
                $(".city").html('<select><option>Select City</option></select>');
                $(".location").html('<select><option>Select Location</option></select>');
                $('.province').html(response);
                $("#loading").remove();
            }
        });
    }
    function city(province_id) 
    {
        $.ajax({
            method: 'POST',
            headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
                },
            data: {province_id: province_id},
            url: "/get_city",
            dataType: "html",
            success: function(response) 
            {
                $(".location").html('<select><option>Select Location</option></select>');
                $('.city').html(response);
                $("#loading").remove();
            }
        });
    }
