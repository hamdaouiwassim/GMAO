@extends('layouts.app')

@section('content')


<!-- WRAPPER -->
<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html">TAVGMAO</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
			
				
				<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
						<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
							<i class="lnr lnr-envelope"></i>
							
						
							<span class="badge bg-danger"> {{ count($messages) }} </span>
							 
						</a>
						
						
						<ul class="dropdown-menu notifications">
							@foreach($messages as $message)
							<li><a href="/conversation/{{ $message->idsender }}" class="notification-item"><span class="dot bg-warning"></span> 
							@foreach($users as $user)
								@if ( $user->id == $message->idsender)
									{{ $user->name }}	: 
								@endif
							@endforeach
							
							
							<span class="text-danger">" {{ $message->content}} "</span> </a></li>
							@endforeach
							<li><a href="/messages" class="more">Ouvrir la boite de messagerie</a></li>
						</ul>
				
						
					</li>
			
					<li class="dropdown">
						<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
							<i class="lnr lnr-alarm"></i>
							
						@if( count($notifications) > 0 ) 
							<span class="badge bg-danger">{{ count($notifications) }} </span>
							@endif 
						</a>
						
						@if( count($notifications) > 0 ) 
						<ul class="dropdown-menu notifications">
							@foreach ($notifications as $not )
							<li style="display:flex;"><a  class="notification-item"><span class="dot bg-warning"></span>{{ $not->content }}</a><a style="position:relative;float:right;" href="notification/seen/{{ $not->id }}">Lue</a></li>
							@endforeach
							
						</ul>
				
						@endif 		
					</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							@if (Auth::user()->avatar == NULL )
								<img src=" {{ asset('img/user.png') }}" class="img-circle" alt="Avatar">
								@else 
								<img src=" {{ asset('uploads/profile/'.Auth::user()->avatar) }}" class="img-circle" alt="Avatar">	
								@endif <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								
								<li><a href="/profile"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                                        {{ csrf_field() }}
                                                                                </form>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
				<ul class="nav">
                        <li><a href="/home" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="/profile" ><i class="lnr lnr-user"></i> <span>Compte</span></a></li>
						<li>
                         <a  href="#subusers"  data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Utilisateurs</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subusers" class="collapse ">
								<ul class="nav">
									<li> <a href="/user/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									<li> <a href="/users" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                         </li>
						<li>
                         <a href="#subeqpmt" class="active" data-toggle="collapse" class="collapsed"><i class="lnr lnr-laptop-phone"></i> <span>Equipements</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subeqpmt" class="collapse ">
								<ul class="nav">
									<li> <a href="/equipement/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									<li> <a href="/equipements" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                            </li>
							<li>
						<a href="#subdepartments" data-toggle="collapse" class="collapsed"><i class="lnr lnr-store"></i> <span>Departements</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>

						<div id="subdepartments" class="collapse ">
							<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
								<li> <a href="/department/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
								<li> <a href="/departments" class=""><i class="lnr lnr-list"></i> Liste</a></li>

							</ul>
						</div>
					</li>
                            <li>
                            <a href="#subdi" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Demande intervention</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subdi" class="collapse ">
								<ul class="nav">
									<li> <a href="/di/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									<li> <a href="/di" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                            </li>
						    <li>
                             <a href="#submp" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-cog"></i> <span>Maintenance preventif</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                             <div id="submp" class="collapse ">
								<ul class="nav">
									<li> <a href="/mp/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									<li> <a href="/mp" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                             </li>
						    <li>
                            <a href="/pm" class=""><i class="lnr lnr-calendar-full"></i> <span>Plan de maintenance</span></a></li>
							<li>
                            
							<a href="#subcm"  data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-license"></i> <span>Contrats maintenance</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
							<div id="subcm" class="collapse ">
							   <ul class="nav">
							   @if (Auth::user()->role == "Administrateur")
								   <li> <a href="/cm/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
							   @endif
								   <li> <a href="/cm" class=""><i class="lnr lnr-list"></i> Liste</a></li>
								   
							   </ul>
						   </div></li>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des equipements</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter un equipement   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'adduser' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Utilisateur ajouter avec success <a href="/users" class="btn btn-sm btn-default"> Consulter liste des utilisateurs </a>
								</div>
                                @endif
                                <form action='/addequipement' method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }} 
                                         
                                                            <div class="row">
                                                            
                                                                <div class="col-md-3">
                                                                <label > Nom du machine </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper le nom du machine içi" type="text" name="name">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label > Modele du machine</label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper la modele du machine içi" type="text" name="modele">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label > <label> Marque du machine </label> </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper marque du machine içi" type="text" name="marque">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Description du machine </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <textarea style="width:100%;margin-bottom:10px;" class="form-control"  name="description"></textarea>
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Numéro du machine </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="tapper numero du machine içi " type="number" name="numero">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Emplacement du machine </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="tapper l'emplacement du machine içi " type="text" name="emplacement">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Photo du machine </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input style="width:100%;margin-bottom:10px;" class="form-control"  type="file" name="photo">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Documentation du machine </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input style="width:100%;margin-bottom:10px;" class="form-control"  type="file" name="document">
                                                                
                                                                </div>
                                                            </div>
                                                               
                                                           
                                                            
                                      
                                    <!-- END TABLE STRIPED -->
                                </div>
                    	</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><input type="submit" value="Ajouter" class="btn btn-primary"></div></form>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
                            </div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
			<p class="copyright">&copy; 2017 <a href="/" target="_blank">TAVGMAO</a>.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->


@endsection
