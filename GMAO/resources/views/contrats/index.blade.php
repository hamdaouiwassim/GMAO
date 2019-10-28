@extends('layouts.app')

@section('content')


<!-- WRAPPER -->
<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/">TAVGMAO</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form action="/cm/filter" method="POST" class="navbar-form navbar-left">
                    {{ csrf_field() }} 
					<div class="input-group">
						<input type="text" name="searchcontrat" class="form-control" placeholder="Chercher un contrat...">
						<span class="input-group-btn"><button type="submit" class="btn btn-primary">chercher</button></span>
					</div>
				</form>
				
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
							<li style="display:flex;"><a  class="notification-item"><span class="dot bg-warning"></span>{{ $not->content }}</a><a style="position:relative;float:right;" href="/notification/seen/{{ $not->id }}">Lue</a></li>
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
								@endif
								 <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								
								<li><a href="/setting"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
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
                         <a  href="#subusers" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Utilisateurs</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subusers" class="collapse ">
								<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/user/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
									<li> <a href="/users" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                         </li>
						<li>
                         <a href="#subeqpmt" data-toggle="collapse" class="collapsed"><i class="lnr lnr-laptop-phone"></i> <span>Equipements</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subeqpmt" class="collapse ">
								<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/equipement/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
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
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/di/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
									<li> <a href="/di" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                            </li>
						    <li>
                             <a href="#submp" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-cog"></i> <span>Maintenance preventif</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                             <div id="submp" class="collapse ">
								<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/mp/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
									<li> <a href="/mp" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                             </li>
						    <li>
                            <a href="/pm" class=""><i class="lnr lnr-calendar-full"></i> <span>Plan de maintenance</span></a>
							</li>
							<li>
							<a href="#subcm" class="active" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-license"></i> <span>Contrats maintenance</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                             <div id="subcm" class="collapse ">
								<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/cm/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
									<li> <a href="/cm" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
						</li>

						
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
                            <h3 class="panel-title"><i class="lnr lnr-license"></i> Contrats du maintenance </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">@isset($searchuser) Resultat de recherche pour : <span class="text-primary"> " {{ $searchuser }} "</span> @else Liste des contrats du maintenance @endisset </h3>
								</div>
								<div class="panel-body">
								@if( session()->get( 'adduser' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Utilisateur supprimé avec success 
								</div>
                                @endif
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom</th>
                                                        <th>Societe</th>
														<th>Ordre du travaille</th>
														<th>Cout</th>
														<th>Date du contrat</th>
														@if (Auth::user()->role == "Administrateur")
														<th> Actions </th>
														@endif
														
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($contrats as $contrat)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $contrat->name }}</td>
                                                    <td>{{ $contrat->societe }}</td>
                                                    <td>
														@if ( $contrat->type == "oi")
																@foreach( $interventions as $oi )
																	@if ($oi->id == $contrat->maintenance )
																		{{ $oi->numero }}
																	@endif 
																@endforeach
														@else
																@foreach( $mpreventives  as $mp )
																	@if ($mp->id == $contrat->maintenance )
																		{{ $mp->numero }}
																	@endif 
																@endforeach
														@endif
													</td>
													<td>{{ $contrat->cout }} DT </td>
													<td>{{ $contrat->created_at }}</td>
													@if (Auth::user()->role == "Administrateur")
														<td><a href="/cm/mod/{{ $contrat->id }}" class="btn btn-primary"> Modifier </a> <a class="btn btn-danger" href="/cm/del/{{ $contrat->id }}"> Supprimer </a> </td>
														@endif
                                                </tr>
                                                @endforeach 
                                                </tbody>
                                            </table>
                                      
                                    <!-- END TABLE STRIPED -->
                                </div>
                    	</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><a href="/cm" class="btn btn-primary">Effacer la recherche</a></div>
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
