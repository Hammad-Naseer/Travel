<x-dashboard>
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')
       
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            <h6 class="mb-0 text-uppercase">Edit Services Data</h6>
            <hr>
            <div class="card">
            <div class="card-body">
            @include('partials._errors')
            <form class="row g-3" method="POST" action="{{route('services.update',$service->id)}}">
            @csrf 
            @method('PUT')
            
            <div class="col-md-6">
            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required autofocus="autofocus" value="{{$service->title}}">
            </div>
           
            <div class="col-md-12">
            <label class="form-label">Url-Title:</label>
            <input type="text" name="url_title" class="form-control" placeholder="Enter title" required autofocus="autofocus" value="{{$service->url_title}}">
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
   