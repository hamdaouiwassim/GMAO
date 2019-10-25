
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
                        <li><a href="/homet" class="active"><i class="lnr lnr-home"></i> <span>Ordre du Travaille</span></a></li>
						<li><a href="/profile" ><i class="lnr lnr-user"></i> <span>Compte</span></a></li>
						
               
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
                            <h3 class="panel-title"><i class="lnr lnr-users"></i> Gerer la liste des maintenances </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									
								</div>
								<div class="panel-body">
                                     <br>
                                     <hr>
                                     <h3 class="panel-title"> Liste des ordres du travailles ( demande d'interventions )  </h3>
								     <hr>
                                     <br>
                                     <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th> Numero </th>
                                                        <th> Machine </th>
                                                        <th> Type de panne </th>
                                                        <th> Commentaire </th>
                                                        <th> Priorité </th>
                                                        <th> Date de creation </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach( $ointerventions as $oi )
                                                <?php $i++; ?>
                                                <tr>                                                                                                                                           <tr>
                                                  
                                                    <td> {{ $oi->numero }} </td>
                                                    <td>
                                                    @foreach( $equipements as $eq )
                                                         @if ($eq->id == $oi->idmachine)
                                                             {{ $eq->name }} 
                                                         @endif
                                                    @endforeach </td>
                                                    <td> {{ $oi->type_panne }} </td>
                                                    <td> {{ $oi->commentaire }} </td>
                                                    <td>
                                                    @if ( $oi->priorite == "Normale")
                                                        <span class="label label-info">{{ $oi->priorite }}</span>
                                                    @elseif ( $oi->priorite == "Urgent" )
                                                    <span class="label label-warning">{{ $oi->priorite }}</span>
                                                    @else
                                                    <span class="label label-danger">{{ $oi->priorite }}</span>

                                                    @endif
                                                     </td>
                                                    <td> {{ $oi->created_at }}</td>
                                                    <td><a class='btn btn-primary' href="/otoi/show/{{ $oi->id }}"> <i class="lnr lnr-highlight"></i> Demarrer </a> <a class='btn btn-danger' href="/ot/refus/{{ $oi->id }}"> <i class="lnr lnr-cross-circle"></i> refusé </a></td>
                                                    
                                                </tr>
                                                 @endforeach
                                                </tbody>
                                            </table>
                                     
                                     <hr>
                                     <h3 class="panel-title"> Liste des ordres du travailles ( maintenance preventives )  </h3>
								     <hr>
                                     <br>
                                     <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Numero </th>
                                                        <th> Historiques </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach( $mpreventives as $mp )
                                                <?php $i++; ?>
                                                <tr>                                                                                  
                                                    <td>{{ $i }}</td>
                                                    <td> {{ $mp->numero }} </td>
                                                    <td><a class='btn btn-success' href="/user/1"><i class="lnr lnr-database"></i> Afficher </a></td>
                                                    <td><a class='btn btn-primary' href="/otmp/show/{{ $mp->id }}"><i class="lnr lnr-highlight"></i> Demarrer </a> <a class='btn btn-danger' href="/otmp/refus/{{ $mp->id }}"><i class="lnr lnr-cross-circle"></i> refusé </a></td>
                                                    
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


