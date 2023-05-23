<x-dashboard :title="$title">
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')

       
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            @include('partials._errors')
            <div class="card">
					<div class="card-body">
                      
						<div class="table-responsive">
							<div class="d-flex justify-content-end mb-4">
								<a class="btn btn-primary" href="{{ URL::to('/employee/pdf') }}">Export PDF</a>&nbsp;
								<a class="btn btn-primary" href="{{ URL::to('/csv_export') }}">CSV File</a>&nbsp;
								<a class="btn btn-primary" href="{{ URL::to('/csv_export') }}">Excel File</a>
							</div>
							
								
							
							<table id="example" class="table table-striped table-bordered">
								
								<thead>
									<tr>
										<th>SR.No</th>
										<th>Title</th>
                                        <th>URL Title</th> 
										<th>Date Added</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    
                                    @php $counter =1 @endphp
                                    @if(count($amenities) > 0)
                                    @foreach($amenities as $amenity)
									<tr>
                                        <td>{{$counter++}}</td>
										<td>{{$amenity->title}}</td>
										<td>{{$amenity->url_title}}</td>
										<td>{{date('jS F Y',strtotime($amenity->created_at))}}</td>
                                        <td><a href="{{route('amenities.edit',$amenity->id)}}" class="btn btn-info btn-xs">Edit</a>
                                        <form method="post" action="{{route('amenities.destroy',$amenity->id)}}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" href="{{route('amenities.destroy',$amenity->id)}}">
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


   
	
