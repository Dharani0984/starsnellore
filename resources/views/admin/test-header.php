<!--  <ul class="sidebar-menu">
									<a href="{{ asset('view-service-modules') }}"><li class="header"><i class="fa fa-slack"></i> Labels</li></a>
									@foreach($labels as $label)
									<li class="treeview">
									<a href="#">
									<i class="fa fa-angle-right""></i>
								    <span>{{$label->labels_title}}</span>
									<i class="fa fa-angle-left pull-right"></i></a>
									
											@if (!empty($label->labels_title)) 
											<ul class="treeview-menu">
											@foreach ($label->labels_menus as $menus)
											<li><a href="{{ asset('view_services_menus') }}/{{$menus->id}}"><i class="fa fa-angle-right"></i>{{$menus->labels_title}}</a>


												

											</li>
											@endforeach
											</ul>
											@endif
									</li>
									@endforeach
									</ul> -->