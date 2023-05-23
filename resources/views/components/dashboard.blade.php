<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Feb 2023 09:48:03 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="icon" href="{{asset('/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- loader-->
	<link href="{{asset('/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('/assets/js/pace.min.js')}}"></script>
	<!--favicon-->
	<link rel="icon" href="{{asset('/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
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
	<link rel="stylesheet" href="{{asset('/assets/css/header-colors.css')}}" />
	<title>{{ env('APP_NAME')}}</title>
</head>

<!-- @yield('content') -->
        {{ $slot }}

<!-- ///footer -->
<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			
			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
    
<!-- ///footer  end-->
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="{{asset('/assets/js/index.js')}}"></script>
	<script src="{{asset('/assets/plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('/assets/js/form-select2.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('/assets/js/app.js')}}"></script>
	<script src="{{asset('/assets/js/form-text-editor.js')}}"></script>
	<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>

	
</body>


<!-- Mirrored from codervent.com/syndron/demo/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Feb 2023 09:48:41 GMT -->
</html>