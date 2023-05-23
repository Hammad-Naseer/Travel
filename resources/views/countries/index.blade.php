<x-dashboard :title="$title">
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')

       
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            @include('partials._errors')
            <form action="{{route('countries.store')}}" method="get" id="locationForm">
            @csrf 
    <div class="row filterContainer">
        <div class="col-lg-4 col-md-4 col-sm-4" data-step="2" data-position='right' data-intro="if you filter location 1st Step select country">
        	<div class="form-group">
        	        <label for="loc_country"><b>Select Country</b></label>
        	        <select name="loc_country" id="loc_country" class="form-control country">
        				<?php echo country_option_list();?>
        			</select>
        			<div class="err_div"></div>
        	</div>	
        </div>	
        <div class="col-lg-4 col-md-4 col-sm-4" data-step="3" data-position='right' data-intro="2nd Step select state">
            <div class="form-group">
                <label for="loc_province"><b>Select Province</b></label>
                <select id="loc_province" class="form-control province" name="loc_province" >
    				<option value="">
                        <?php //echo get_phrase('select_province'); ?>
                          <?php //echo get_phrase('state'); ?>
    				</option>
    			</select>
            </div>    
		 </div>
        <div class="col-lg-4 col-md-4 col-sm-4" data-step="4" data-position='left' data-intro="3rd Step select city">
             <div class="form-group">
                <label for="loc_city"><b>Select City</b></label>  
                <select id="loc_city" class="form-control city" name="loc_city">
    				<option value="">
    					<?php //echo get_phrase('select_city'); ?>
    				</option>
    			</select>
             </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4" data-step="5" data-position='bottom' data-intro="submit button get result">
        	<input type="hidden" name="apply_filter" value="1">		
            <button type="submit"  class="btn btn-primary px-5">filter</button>
			<?php //if ($apply_filter == 1) { ?> 
                <a href="<?php //echo base_url();?>location/location_list"  class="modal_cancel_btn" id="btn_remove" style="padding:5px 5px !important; ">			
    			       <i class="fa fa-remove"></i><?php //echo get_phrase('remove_filter'); ?>
    			</a>
            <?php //} ?>	
        </div>
    </div>	        
</form>
            <div class="card">
					<div class="card-body">
                      
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SR.No</th>
										<th>Title</th>
										<th>Province Title</th>
										<th>City Title</th>
                                        <th>URL Title</th> 
										<th>Date Added</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    <!-- {{print_data($countries)}} -->
                                    @php $counter =1 @endphp
                                    @if(count($countries) > 0)
                                    @foreach($countries as $country)
									<tr>
                                        <td>{{$counter++}}</td>
										<td>{{$country->title}}</td>
										<td>{{$country->province_title}}</td>
										<td>{{$country->city_title}}</td>
										<td>{{$country->url_title}}</td>
										<td>{{date('jS F Y',strtotime($country->created_at))}}</td>
                                        <td><a href="{{route('countries.edit',$country->country_id)}}" class="btn btn-info btn-xs">Edit</a>
                                        <form method="post" action="{{route('countries.destroy',$country->country_id)}}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" href="{{route('countries.destroy',$country->country_id)}}">
                                            Delete
                                            </button>
                                        </form>
                                       </td>
									</tr>
                                    @endforeach
								@endif
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </x-dashboard>
 
   
   
	<!--plugins-->
	
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
            // function filter_function(){
            //     $.ajax({
            //             method: "POST",
            //             headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             },
            // 			data:{loc_country:loc_country,loc_province:loc_province,loc_city:loc_city},
            // 			url: "",
            // 			dataType:"html",
            // 			success: function(response){
            			   
            // 			}
            // 		});
            // }
    </script>
	
