@if (Auth::user()->role == "Technicien")
<script>
	window.location = "/homet";
</script>
@else

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
							@endif
							<span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
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

					<li><a href="/home" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
					<li><a href="/profile"><i class="lnr lnr-user"></i> <span>Compte</span></a></li>
					<li>
						<a href="#subusers" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Utilisateurs</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>

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
						<a href="/pm" class=""><i class="lnr lnr-calendar-full"></i> <span>Plan de maintenance</span></a></li>
					<li>
						<a href="/pm" class=""><i class="lnr lnr-license"></i> <span>Contrat de maintenance</span></a></li>

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



				<div class="row">

					<div class="col-md-7">

						<!-- TASKS -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Liste des maintenances</h3>

							</div>
							<div class="panel-body">
								<ul class="list-unstyled task-list">
									<li>
										<p>Liste des maintenances non consultées <span class="label-percent">{{ $diperc }} %</span></p>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $diperc }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $diperc }}%">
												<span class="sr-only">{{ $diperc }} % Complete</span>
											</div>
										</div>
									</li>
									<li>
										<p> Liste des maintenances refusées <span class="label-percent">{{ $dirperc }} %</span></p>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $dirperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $dirperc }}%">
												<span class="sr-only">{{ $dirperc }} % Complete</span>
											</div>
										</div>
									</li>
									<li>
										<p>Liste des maintenances en cours <span class="label-percent">{{ $diecperc }} %</span></p>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="{{ $diecperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $diecperc }}%">
												<span class="sr-only">Success</span>
											</div>
										</div>
									</li>
									<li>
										<p>Liste des maintenances terminées<span class="label-percent">{{ $ditperc }}%</span></p>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $ditperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $ditperc }}%">
												<span class="sr-only">45% Complete</span>
											</div>
										</div>
									</li>

								</ul>
							</div>
						</div>

						<!-- END TASKS -->
					</div>
					<div class="col-md-5">
						<!-- TIMELINE -->
						<div class="panel panel-scrolling">
							<div class="panel-heading">
								<h3 class="panel-title">Les activitées recents de toute les utilisateurs</h3>

							</div>
							<div class="panel-body">
								<ul class="list-unstyled activity-list">
									@foreach ( $activities as $activity )
									<li>
										@foreach ($users as $user )
										@if ( $user->id == $activity->iduser )
										@if ($user->avatar == NULL )
										<img src=" {{ asset('img/user.png') }}" class="img-circle pull-left avatar" alt="Avatar">
										@else
										<img src="{{ asset('uploads/profile/'.$user->avatar) }}" alt="Avatar" class="img-circle pull-left avatar">
										@endif

										<p> <a href="#">

												{{ $user->name }}
												@endif
												@endforeach
											</a>
											{{ $activity->description }} <span class="timestamp">{{ Carbon\Carbon::parse($activity->created_at)->diffForHumans(Carbon\Carbon::now()) }}</span></p>
									</li>
									@endforeach

								</ul>

							</div>
						</div>
						<!-- END TIMELINE -->
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

@endif