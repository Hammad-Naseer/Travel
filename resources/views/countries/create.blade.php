<x-dashboard :title="$title">
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            <h6 class="mb-0 text-uppercase">Add Countries Data</h6>
            <hr>
            <div class="card">
            <div class="card-body">
            @include('partials._errors')
            <form class="row g-3" method="post" action="{{route('countries.store')}}">
            @csrf 
            <div class="col-md-6">
            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required autofocus="autofocus" value="{{old('title')}}">
            </div>
            <div class="col-md-6">
            <label class="form-label">Country:</label>
            <select id="country_id" class="form-select mb-3 country" aria-label="Default select example" name="country_id" required> 
            <?php echo country_option_list(); ?>
            </select>
            </div>    
            <div class="col-md-6">
            <label class="form-label">Province:</label>
            <select id="province_id" class="form-select mb-3 province" name="province_id" required>
            <option value="">Select Province</option>
            </select>
            </div> 
            <div class="col-md-6">
            <label class="form-label">City:</label>
            <select id="city_id" class="form-select mb-3 city" name="city_id" required>
            <option value="">Select City</option>
            </select>
            </div> 
            <div class="col-md-12">
            <label class="form-label">Url-Title:</label>
            <input type="text" name="url_title" class="form-control" placeholder="Enter title" required autofocus="autofocus" value="{{old('title')}}">
            </div>
            <div class="col">
            <button type="submit" class="btn btn-primary px-5">Submit</button>
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
                alert(response);
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
    </script>