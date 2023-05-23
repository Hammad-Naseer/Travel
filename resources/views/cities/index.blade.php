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
                    <h6 class="mb-0 text-uppercase">City Data</h6>
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SR.No</th>
										<th>City Title</th>
										<th>Date Added</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                   
                                    @php $counter =1 @endphp
                                    @if(count($cities) > 0)
                                    @foreach($cities as $city)
									<tr>
                                        <td>{{$counter++}}</td>
										<td>{{$city->city_title}}</td>
										<td>{{date('jS F Y',strtotime($city->created_at))}}</td>
                                        <td><a href="{{route('cities.edit',$city->city_id)}}" class="btn btn-info btn-xs">Edit</a>
                                        <form method="post" action="{{route('cities.destroy',$city->city_id)}}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" href="{{route('cities.destroy',$city->city_id)}}">
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

   
	
