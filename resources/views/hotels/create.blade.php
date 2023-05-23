<link href="{{asset('/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{asset('/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('/assets/css/semi-dark.css')}}" />
    <link href="{{asset('/assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('/assets/css/header-colors.css')}}" />
<x-dashboard :title="$title">
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            <h6 class="mb-0 text-uppercase">Add Hotels Data</h6>
            <hr>
            <div class="card">
            <div class="card-body">
            @include('partials._errors')
            <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('hotels.store')}}">
            @csrf 
            <div class="col-md-12">
            <label class="form-label">Hotel Name:</label>
            <input type="text" name="title" class="form-control" placeholder="Hotel Name" required autofocus="autofocus" value="{{old('title')}}">
            </div>
            <div class="col-md-3">
            <label class="form-label">Country:</label>
            <select name="country_id" id="country_id" onchange="load_cities_country_wise(this.value)" class="form-select mb-3 country" aria-label="Default select example"  required> 
            <option value="">Select Country</option>
            @if(count ($countries) > 0)
            @foreach($countries as $country)
            <option value="{{ $country->country_id }}">{{ $country->title }}</option>
            @endforeach
            @endif
            </select>
            </div> 
            <div class="col-md-3">
            <label class="form-label">City:</label>
            <select name="city_id" id="city_id" class="form-select mb-3 country" aria-label="Default select example"  required> 
            <option value="">Select City</option>
            </select>
            </div>
            <div class="col-md-3">
            <label class="form-label">Rate:</label>
            <select name="ratings" id="rating_id" class="form-select mb-3 country" aria-label="Default select example"  required> 
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            </select>
            </div>
            <div class="col-md-3">
            <label class="form-label">Google Map:</label>
            <textarea type="text" name="google_map" class="form-control" placeholder="" required autofocus="autofocus" value="{{old('title')}}"></textarea>
            </div>
            <label class="form-label">Description:</label>
            <div class="card col-md-8">
					<div class="card-body">
						<h6 class="mb-0 text-uppercase">Form text editor</h6>
						<hr/>
						<h4 class="mb-4">TinyMCE Quick Start Guide</h4>
					
                       
							<textarea id="mytextarea" name="description">Add Description</textarea>
						
					</div>
				</div>

					<!-- <div class="col-md-4">
						<h6 class="mb-0 text-uppercase">Fancy File Upload</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<input id="fancy-file-upload" type="file" name="featured_image" accept=".jpg, .png, image/jpeg, image/png" multiple>
							</div>
						</div>
					</div> -->
                    
                    <div class="col-md-4">
            <label class="form-label">Image:</label>
            <input type="file" name="featured_image" class="form-control" placeholder="Hotel Name" required autofocus="autofocus" value="{{old('title')}}">
            </div>
                    <div class="col-lg-6">
                        <h3 class="bold color-red text-underline">
                            Amenities
                        </h3>
                        <a href="javascript:void(0)" class="btn-primary btn-sm ml-15">
                            <input type="checkbox" id="checkAllAmenities" checked="checked">Check All
                        </a>
                    </div>
                    <div class="col-lg-6">
                    <input type="text" class="form-control pull-right mt-15" size="20" placeholder="Search Amenities" id="search_amenities">
                    </div>
            
            <div class="form-group col-lg-12">
                <ul class="ul-list amenities">
                    @if(count($amenties))
                    @foreach($amenties as $amenity)
                    <li>
                        <input type="checkbox" name="amenity[]" checked="checked" value="{{$amenity->id}}">
                        {{$amenity->title}} 
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-lg-6">
                        <h3 class="bold color-red text-underline">
                            Services
                        </h3>
                        <a href="javascript:void(0)" class="btn-primary btn-sm ml-15">
                            <input type="checkbox" id="checkAllAmenities" checked="checked">Check All
                        </a>
                    </div>
                    <div class="col-lg-6">
                    <input type="text" class="form-control pull-right mt-15" size="20" placeholder="Search Service" id="search_amenities">
                    </div>
            
            <div class="form-group col-lg-12">
                <ul class="ul-list amenities">
                    @if(count($services))
                    @foreach($services as $service)
                    <li>
                        <input type="checkbox" name="service[]" checked="checked" value="{{$service->id}}">
                        {{$service->title}} 
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
             <div class="col-md-6">
             <input type="file" name="images[]" multiple>
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
    <script src="{{asset('/assets/js/form-text-editor.js')}}"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('/../../../../cdn.tiny.cloud/1/invalid-origin/tinymce/5.10.7-133/tinymce.min.js')}}" referrerpolicy="origin">
	</script>
	<script src="{{asset('/assets/js/form-text-editor.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('/assets/js/app.js')}}"></script>
    <script src="{{asset('/assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
	<script src="{{asset('/assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
	<script src="{{asset('/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
	<script src="{{asset('/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
	<script src="{{asset('/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
	<script src="{{asset('/assets/js/form-file-upload.js')}}"></script>
    <script>

        function load_cities_country_wise(country_id){
            if(country_id > 0){
            $.ajax({
            url: "/countries/fetch_cities/"+country_id,
            method: "GET",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(responce){
                $('#city_id').html(responce);
            }
            });
            }

        }

       
    </script>
    