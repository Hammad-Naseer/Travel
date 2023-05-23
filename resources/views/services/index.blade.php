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
                                    @if(count($services) > 0)
                                    @foreach($services as $service)
									<tr>
                                        <td>{{$counter++}}</td>
										<td>{{$service->title}}</td>
										<td>{{$service->url_title}}</td>
										<td>{{date('jS F Y',strtotime($service->created_at))}}</td>
                                        <td><a href="{{route('services.edit',$service->id)}}" class="btn btn-info btn-xs">Edit</a>
                                        <form method="post" action="{{route('services.destroy',$service->id)}}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" href="{{route('services.destroy',$service->id)}}">
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


   
	
