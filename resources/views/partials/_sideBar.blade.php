@php
$parentURI = \Request::segment(1);
$childURI = \Request::segment(2);
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Travel & Tourism</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="index-2.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
						</li>
						<li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
					<ul>
						<li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
						</li>
						<li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
						</li>
						<li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
						</li>
						<li> <a href="app-contact-list.html"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
						</li>
						<li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
						</li>
						<li> <a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
						</li>
						<li> <a href="app-fullcalender.html"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
						</li>
					</ul>
				</li>
				
				<li class="menu-label">UI Elements</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Widgets</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Hotel</div>
					</a>
					<ul>
						<li class="{($parentURI == 'hotels' and $childURI == 'create') ? 'active' : ''}}"> <a href="{{route('hotels.create')}}"><i class="bx bx-right-arrow-alt"></i>Add</a>
						</li>
						<li class="{{($parentURI == 'hotels' and ($childURI == 'index' or $childURI == '')) ? 'active' : ''}}"> <a href="{{route('hotels.index')}}"><i class="bx bx-right-arrow-alt"></i>All Hotel</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Edit</a>
						</li>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Rooms</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>All Room</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Add Room</a>
						</li>
					
						
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">Visa Application</div>
					</a>
					<ul>
						<li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Add Visa System</a>
						</li>
						<li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>All Visa Application</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">Tours</div>
					</a>
					<ul>
						<li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Add Tours</a>
						</li>
						<li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>All Tours</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Pakages</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
						</div>
						<div class="menu-title">Booking</div>
					</a>
					<ul>
						<li> <a href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Add Booking</a>
						</li>
						<li> <a href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>All Booking</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Testimonials</div>
					</a>
					<ul>
						<li> <a href="table-basic-table.html"><i class="bx bx-right-arrow-alt"></i>Add Testimonials</a>
						</li>
						<li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>All Testimonials</a>
						</li>
						</li>
					</ul>
				</li>
				<li class="menu-label">Pages</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-lock"></i>
						</div>
						<div class="menu-title">Authentication</div>
					</a>
					<ul>
						<li> <a href="{{ route('login')}}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In</a>
						</li>
						<li> <a href="{{ route('register')}}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up</a>
						</li>
						<li> <a href="{{ route('forgot_password')}}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="user-profile.html">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">User Profile</div>
					</a>
				</li>
				<li>
					<a href="timeline.html">
						<div class="parent-icon"> <i class="bx bx-video-recording"></i>
						</div>
						<div class="menu-title">Timeline</div>
					</a>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-error"></i>
						</div>
						<div class="menu-title">Our Teams</div>
					</a>
					<ul>
						<li> <a href="errors-404-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Add Teams</a>
						</li>
						<li> <a href="errors-500-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>All Teams</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="faq.html">
						<div class="parent-icon"><i class="bx bx-help-circle"></i>
						</div>
						<div class="menu-title">FAQ</div>
					</a>
				</li>
				<li>
					<a href="pricing-table.html">
						<div class="parent-icon"><i class="bx bx-diamond"></i>
						</div>
						<div class="menu-title">Pricing</div>
					</a>
				</li>
				<li class="menu-label">Setting & System</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-line-chart"></i>
						</div>
						<div class="menu-title">System Setting</div>
					</a>
					<ul>
						<li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Add Setting</a>
						</li>
						<li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>All Setting</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Users</div>
					</a>
					<ul>
						<li> <a href="map-google-maps.html"><i class="bx bx-right-arrow-alt"></i>All Users</a>
						</li>
						<li> <a href="map-vector-maps.html"><i class="bx bx-right-arrow-alt"></i>Add Users</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Others & logout</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-menu"></i>
						</div>
						<div class="menu-title">Currency</div>
					</a>
					<ul>
						<li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>items</a>
							<ul>
								<li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Currency</a>
									<ul>
										<li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Currency Level</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="{{$parentURI == 'countries' or $parentURI == 'cities'  ? 'active' : ''}}">
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Others</div>
					</a>
					<ul>
						<li class="{{($parentURI == 'countries' and ($childURI == 'index' or $childURI == '')) ? 'active' : ''}}"> <a href="{{route('countries.index')}}"><i class="bx bx-right-arrow-alt"></i>All Countries</a></li>
						<li class="{{($parentURI == 'countries' and $childURI == 'create')  ? 'active' : ''}}"> <a href="{{route('countries.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Country</a></li>
						<li class="{{($parentURI == 'cities' and ($childURI == 'index' or $childURI == '')) ? 'active' : ''}}"> <a href="{{route('cities.index')}}"><i class="bx bx-right-arrow-alt"></i>All Cities	</a></li>
						<li class="{{($parentURI == 'cities' and $childURI == 'create') ? 'active' : ''}}"> <a href="{{route('cities.create')}}"><i class="bx bx-right-arrow-alt"></i>Add City</a></li>
						<li class="{{($parentURI == 'amenities' and ($childURI == 'index' or $childURI == '')) ? 'active' : ''}}"> <a href="{{route('amenities.index')}}"><i class="bx bx-right-arrow-alt"></i>All Amenities</a></li>
						<li class="{{($parentURI == 'amenities' and $childURI == 'create') ? 'active' : ''}}"> <a href="{{route('amenities.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Amenity</a></li>
						<li class="{{($parentURI == 'services' and ($childURI == 'index' or $childURI == '')) ? 'active' : ''}}"> <a href="{{route('services.index')}}"><i class="bx bx-right-arrow-alt"></i>All Service</a></li>
						<li class="{{($parentURI == 'services' and $childURI == 'create') ? 'active' : ''}}"> <a href="{{route('services.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Service</a></li>
						<li class=""> <a href="map-vector-maps.html"><i class="bx bx-right-arrow-alt"></i>All Rules</a></li>
						<li> <a href="map-vector-maps.html"><i class="bx bx-right-arrow-alt"></i>Add Rule</a></li>
						<li class=""> <a href="{{URL::to('/admin/books')}}"><i class="bx bx-right-arrow-alt"></i>Book List</a></li>
						<!-- admin/books -->
					</ul>
				</li>
				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">System Support</div>
					</a>
				</li>
				<li>
					<a href="https://codervent.com/syndron/documentation/index.html" target="_blank">
						<div class="parent-icon"><i class="bx bx-folder"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>