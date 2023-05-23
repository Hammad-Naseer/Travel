<x-dashboard :title="$title">
<div class="wrapper">
        @include('partials._sideBar')
		<header>
        @include('partials._topBar')
		</header>
		<div class="page-wrapper">
			<div class="page-content">
            <h6 class="mb-0 text-uppercase">Add Services Data</h6>
            <hr>
            <div class="card">
            <div class="card-body">
            @include('partials._errors')
            <form class="row g-3" method="post" action="{{route('services.store')}}">
            @csrf 
            <div class="col-md-6">
            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required autofocus="autofocus" value="{{old('title')}}">
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
    