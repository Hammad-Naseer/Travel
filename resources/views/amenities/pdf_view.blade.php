<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
    <table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SR.No</th>
										<th>Title</th>
                                        <th>URL Title</th> 
										<th>Date Added</th>
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
									</tr>
                                    @endforeach
								@endif
								</tbody>
								
							</table>
    </div>
    
</body>
</html>