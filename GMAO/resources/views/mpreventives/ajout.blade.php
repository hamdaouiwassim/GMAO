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
							
						
							<span class="badge bg-danger"> 2 </span>
							 
						</a>
						
						
						<ul class="dropdown-menu notifications">
							<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>jhbzfqsghjq kjjsqhvfiu </a></li>
							<li><a href="/messages" class="more">Ouvrir la boite de messagerie</a></li>
						</ul>
				
						
					</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
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
                         <a href="#subeqpmt"  data-toggle="collapse" class="collapsed"><i class="lnr lnr-laptop-phone"></i> <span>Equipements</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
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
                            <a  href="#subdi" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Demande intervention</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subdi" class="collapse ">
								<ul class="nav">
									<li> <a href="/di/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									<li> <a href="/di" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                            </li>
						    <li>
                             <a class="active" href="#submp" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-cog"></i> <span>Maintenance preventif</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
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
								   <li> <a href="/cm" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
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
							<h3 class="panel-title"><i class="lnr lnr-cog"></i> Gestion des maintenance preventives</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter une maintenance preventif   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'adduser' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Demande  ajouter avec success <a href="/mp" class="btn btn-sm btn-default"> Consulter liste des maintenance preventives </a>
								</div>
                                @endif
                                <form action='/addmp' method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }} 
                                         
                                                            <div class="row">
                                                            
                                                                <div class="col-md-3">
                                                                <label > Identifiant </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" disabled class="form-control" value="{{ 'MP'.uniqid() }}" type="text" >
                                                                <input style="width:100%;margin-bottom:10px;"  class="form-control" value="{{ 'MP'.uniqid() }}" type="hidden" name="numero">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label > Emetteur </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" disabled class="form-control" value="{{ Auth::user()->name }}" type="text" >
                                                                <input  value="{{ Auth::user()->id }}" type="hidden" name="emetteur">
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label > <label>  Machine </label> </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="machine">
                                                                @foreach($equipements as $equipement )
                                                                        
                                                                        <option value="{{ $equipement->id }}">{{ $equipement->name }}</option>
                                                                        
                                                                        
                                                                @endforeach
                                                                </select>
                                                                </div>
                                                              
                                                                <div class="col-md-3">
                                                                <label> Unité de mesure </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="unite_mesure">
                                                                
                                                                        <option >Selectionner l'unite de mesure</option>
                                                                        <option value="Jours">Jours</option>
                                                                        <option value="Mois">Mois</option>
                                                                        
                                                                        
                                            
                                                                </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Intervalle </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" type="number" name="intervalle" class="form-control" >
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Commencé le </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" type="date" name="date_debut" class="form-control" >
                                                                
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Terminé le </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                        <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" type="date" name="date_fin" class="form-control" >
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label> Executeur </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="executeur">
                                                                @foreach($techniciens as $technicien )
                                                                        
                                                                        <option value="{{ $technicien->id }}">{{ $technicien->name }}</option>
                                                                        
                                                                        
                                                                @endforeach
                                                                </select>
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
