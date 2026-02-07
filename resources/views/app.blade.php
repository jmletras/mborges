<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>M Borges Imobiliaria</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <!--link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"-->
  <link href="{{ asset('assets/css/font-awesome-all.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
  

  <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>

  <!-- =======================================================
  * Template Name: EstateAgency - v2.1.0
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  @if(isset($metadata))
		<meta property="og:image" content="/fotos_imoveis/{{$metadata}}"/>
		<meta property="og:image:secure_url" content="/fotos_imoveis/{{$metadata}}" />
		<meta property="og:title" content="{{$title}}" />
		<meta property="og:description" content="{{$descricao}}" />
	  
	@endif
	<style>
		.owl-carousel .owl-item img {
		display: block;
		max-width: 100%;
		max-height:800px;
		width: auto;
		height: auto;
		margin: auto;
	}
	</style>
</head>

<body>
	
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v9.0" nonce="1zfeFvK5"></script>

	<!-- ======= Property Search Section ======= -->
	<div class="click-closed"></div>
	<!--/ Form Search Star /-->
		<div class="box-collapse">
			<div class="title-box-d">
				<h3 class="title-d">Procurar imóvel</h3>
			</div>
			<span class="close-box-collapse right-boxed ion-ios-close"></span>
			<div class="box-collapse-wrap form">
				<!--form class="form-a"-->
				{{ Form::open(array('route' => 'imoveis.index', 'method' => 'GET', 'class'=>'form-a')) }}
					<div class="row">
						<!--div class="col-md-12 mb-2">
							<div class="form-group">
								<label for="Type">Palavras chave</label>
								<input type="text" class="form-control form-control-lg form-control-a" placeholder="">
							</div>
						</div-->
						<div class="col-md-6 mb-2">
							<div class="form-group">
								<label for="tipo_negocio">Tipo</label>
								<select name="tipo_negocio" class="form-control form-control-lg form-control-a" id="Type">
									<option value="">Todos</option>
									<option @if( isset($_GET["tipo_negocio"]) AND ($_GET["tipo_negocio"] == "Arrendamento")) selected @endif value="Arrendamento">Arrendamento</option>
									<option @if( isset($_GET["tipo_negocio"]) AND ($_GET["tipo_negocio"] == "Venda")) selected @endif value="Venda">Venda</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 mb-2">
							<div class="form-group">
								<label for="localidade">Localidade</label>
								<select name="localidade" class="form-control form-control-lg form-control-a" id="localidade">
									@if(isset($localidades))
										@foreach($localidades as $key => $value)
											<option @if( isset($_GET["localidade"]) AND ($_GET["localidade"] == $key)) selected @endif value="{{$key}}">{{$value}}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="col-md-6 mb-2">
							<div class="form-group">
							  <label for="quartos">Quartos</label>
							  <select name="quartos" class="form-control form-control-lg form-control-a" id="quartos">
								<option value="">Tudo</option>
								<option @if( isset($_GET["quartos"]) AND ($_GET["quartos"] == "1")) selected @endif value="1">1</option>
								<option @if( isset($_GET["quartos"]) AND ($_GET["quartos"] == "2")) selected @endif value="2">2</option>
								<option @if( isset($_GET["quartos"]) AND ($_GET["quartos"] == "3")) selected @endif value="3">3</option>
								<option @if( isset($_GET["quartos"]) AND ($_GET["quartos"] == "4")) selected @endif value="4">4</option>
								<option @if( isset($_GET["quartos"]) AND ($_GET["quartos"] == "5")) selected @endif value="5">5</option>
							  </select>
							</div>
						</div>
						<div class="col-md-6 mb-2">
							<div class="form-group">
							  <label for="garagem">Garagem</label>
							  <select class="form-control form-control-lg form-control-a" id="garagem">
								<option value="">Tudo</option>
								<option @if( isset($_GET["garagem"]) AND ($_GET["garagem"] == "1")) selected @endif value="1">Sim</option>
								<option @if( isset($_GET["garagem"]) AND ($_GET["garagem"] == "0")) selected @endif value="0">Não</option>
							  </select>
							</div>
						</div>
						<div class="col-md-6 mb-2">
							<div class="form-group">
							  <label for="preco">Preço máx.</label>
							  <select class="form-control form-control-lg form-control-a" id="preco" name="preco">
								<option value="">Tudo</option>
								<option @if( isset($_GET["preco"]) AND ($_GET["preco"] == "50000")) selected @endif value="50000">50.000€</option>
								<option @if( isset($_GET["preco"]) AND ($_GET["preco"] == "100000")) selected @endif value="100000">100.000€</option>
								<option @if( isset($_GET["preco"]) AND ($_GET["preco"] == "150000")) selected @endif value="150000">150.000€</option>
								<option @if( isset($_GET["preco"]) AND ($_GET["preco"] == "200000")) selected @endif value="200000">200.000€</option>
							  </select>
							</div>
						</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-a">Procurar imóveis</button>
					</div>
				</div>
			</form>			
		</div>
	</div><!-- End Property Search Section -->>

	<!-- ======= Header/Navbar ======= -->
	<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
		<div class="container">
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!--a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a-->
			<a href="{{url('/')}}"><img src="{{ asset('assets/img/logo.png')}}" width="200px"/></a>
			<button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
				<span class="fa fa-search" aria-hidden="true"></span>
			</button>
			<div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link {{ (request()->is('/') or request()->is('home')) ? 'active' : ''}}" href="{{ url('/') }}">Início</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request()->is('sobre') ? 'active' : ''}}" href="{{ url('sobre') }}">Quem somos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request()->is('imoveis') ? 'active' : ''}}" href="{{ url('imoveis') }}">Imóveis</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link {{ request()->is('contactos') ? 'active' : ''}}" href="{{ url('contactos') }}">Contactos</a>
					</li>
					
					@if(Auth::user())
						<li class="nav-item">
						<a class="nav-link text-danger" href="{{ route('logout') }}"
											   onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();">
												 {{ __('Sair') }}({{Auth::user()->name}})
										</a>
										<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
											@csrf
										</form>
						</li>
					@endif
					  <!--li class="nav-item">
						<a class="nav-link" href="blog-grid.html">Blog</a>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Pages
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="property-single.html">Property Single</a>
						  <a class="dropdown-item" href="blog-single.html">Blog Single</a>
						  <a class="dropdown-item" href="agents-grid.html">Agents Grid</a>
						  <a class="dropdown-item" href="agent-single.html">Agent Single</a>
						</div>
					  </li-->
					
				</ul>
			</div>
			<button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
				<span class="fa fa-search" aria-hidden="true"></span>
			</button>
		</div>
	</nav><!-- End Header/Navbar -->
	
	@if(request()->is('/') or request()->is('home'))
		<!-- ======= Intro Section ======= -->
		  <div class="intro intro-carousel">
			<div id="carousel" class="owl-carousel owl-theme">
			@if($imoveis)
				@foreach($imoveis as $imovel)
					@if($imovel->fotos()->count())
			
					  <div class="carousel-item-a intro-item bg-image" style="background-image: url(/fotos_imoveis/{{$imovel->fotos()->first()->filename}})">
						<div class="overlay overlay-a"></div>
						<div class="intro-content display-table">
						  <div class="table-cell">
							<div class="container">
							  <div class="row">
								<div class="col-lg-8">
								  <div class="intro-body">
									<p class="intro-title-top">
									
									  <br> </p>
									  <a href="{{url('imoveis', $imovel->id)}}">
									<h1 class="intro-title mb-4">
									
									  <span class="color-b">{{$imovel->natureza}} - {{$imovel->tipologia}} </span> {{$imovel->ref_localidade->nome_localidade}} <br> 
									  </h1> </a>
									<p class="intro-subtitle intro-price">
									  <a href="{{url('imoveis', $imovel->id)}}"><span class="price-a">{{$imovel->tipo_negocio}} | {{number_format($imovel->preco,2,",",".")}} €</span></a>
									</p>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					  @endif
				  @endforeach
			  @endif
			</div>
		  </div><!-- End Intro Section -->
	@endif
	
	<main id="main">
		@yield('content')
	</main><!-- End #main -->

  

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">M. Borges, LDA</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Manuel Paulino Borges - Vest. Unip. Lda. <br>Licença Nº. - 18159<br>NIF - 513 978 690<br>Morada - Rua Dr.ª Emília Salvado Borges 32, 7940-007 Cuba
              </p>
            </div>
            <div class="w-footer-a">
              
            </div>
          </div>
        </div>
		<div class="col-sm-6 col-md-6">
			<div class="widget-a">
				<div class="w-body-a">
					<p class="w-text-a color-text-a">
						<ul class="list-unstyled">
							<li class="color-a">
							  <span class="color-text-a"><i class="far fa-envelope"></i> </span> mborgesimobiliaria@gmail.com</li>
							<li class="color-a">
							  <span class="color-text-a"><i class="fa fa-phone"></i> </span> (+351) 962 548 074</li>
							<li class="color-a">
							  <span class="color-text-a"><i class="fab fa-facebook-square"></i>
								<a href="http://www.facebook.com/mborgesimobiliaria">Mborgesimobiliaria</a>
								</span>   
							  
							 </li>
						  </ul>
						  <div class="fb-like" data-href="http://www.mborgesimobiliaria.pt/" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
					</p>
				</div>
			</div>
		</div>
		
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Início</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Quem somos</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Imóveis</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contactos</a>
              </li>
            </ul>
          </nav>
          <!--div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div-->
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
			
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

    <!-- Vendor JS Files -->
  
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/scrollreveal/scrollreveal.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>