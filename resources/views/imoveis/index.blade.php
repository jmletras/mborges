@extends('app')

@section('content')
	    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Os nossos imóveis</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Início</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Imóveis
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
	<section class="property-grid grid">
      <div class="container">	
		@if(Auth::user())
		  
			<a class="btn btn-success btn-sm btn-block mb-3" role="button" href="{{ url('imoveis/create') }}"><i class="fas fa-plus-square"></i> Adicionar novo imóvel</a>
		<br>
		@endif
		<div class="row">
			<div class="col-sm-12">
				@if((isset($_GET["tipo_negocio"]) AND ($_GET["tipo_negocio"] != '')) OR (isset($_GET["localidade"]) AND ($_GET["localidade"] != '')) 
					OR (isset($_GET["quartos"]) AND ($_GET["quartos"] != '')) OR (isset($_GET["garagem"]) AND ($_GET["garagem"] != '')) OR (isset($_GET["garagem"]) AND ($_GET["garagem"] != '' )) 
					OR (isset($_GET["preco"]) AND ($_GET["preco"] != '')))
					<span class="text-muted" > Resultados para a pesquisa efetuada: <b>{{$imoveis->count()}}</b> @if($imoveis->count()==1) imóvel. @else imóveis. @endif</span>
					<a class="btn btn-outline-danger btn-sm" role="button" href="{{ url('imoveis') }}"><i class="fa fa-eraser"></i>Apagar filtros</a>
				@else
					<span class="text-muted" > Resultados: <b>{{$imoveis->total()}}</b> @if($imoveis->total()==1) imóvel. @else imóveis. @endif</span>
				@endif	
			</div>
		</div>
		
		<br>
		
		
		
		
		
		
		
		<div class="row">
			
			<!-- IMOVEL -->
			@foreach($imoveis as $imovel)
			<div class="col-md-4">
				<div class="card-box-a card-shadow">
				  <div class="img-box-a">
				  @if($imovel->fotos()->count())
					<img src="fotos_imoveis/{{$imovel->fotos()->first()->filename}}" style="min-height:350px;" alt="" class="img-a img-fluid">
					@else
					<img src="assets/img/property-1.jpg" alt="" class="img-a img-fluid">
					@endif
				  </div>
				  <div class="card-overlay">
					<div class="card-overlay-a-content">
					  <div class="card-header-a">
						<h3 class="card-title-a">
						  <a href="{{url('imoveis', $imovel->id)}}">{{$imovel->natureza}} - {{$imovel->tipologia}}
							<br /> {{$imovel->ref_localidade->nome_localidade}}</a>
						</h3>
					  </div>
					  <div class="card-body-a">
						<div class="price-box d-flex">
						  <span class="price-a">{{$imovel->tipo_negocio}} | {{number_format($imovel->preco,2,",",".")}} €</span>
						</div>
						<a href="{{url('imoveis', $imovel->id)}}" class="link-a">Ver detalhe
						  <span class="ion-ios-arrow-forward"></span>
						</a>
					  </div>
					  <div class="card-footer-a">
						<ul class="card-info d-flex justify-content-around">
						  <li>
							<h4 class="card-info-title">Área útil</h4>
							@if($imovel->area_util)
							<span>{{$imovel->area_util}}
							  <sup>2</sup>
							</span>
							@else 
								<span>-
									<sup></sup>
								</span>
							@endif
						  </li>
						  <li>
							<h4 class="card-info-title">Quartos</h4>
							<span>{{$imovel->quartos?:'-'}}</span>
						  </li>
						  <li>
							<h4 class="card-info-title">WC</h4>
							<span>{{$imovel->wc?:'-'}}</span>
						  </li>
						  <li>
							<h4 class="card-info-title">Garagem</h4>
							<span>{{$imovel->garagem?:'-'}}</span>
						  </li>
						</ul>
					  </div>
					</div>
					
				  </div>
				  
				</div>
				@if(Auth::user())
					<a class="btn btn-primary btn-sm mb-3" role="button" href="{{ route('imoveis.edit', $imovel->id) }}">Editar imóvel</a>
				@endif
			</div>
		  @endforeach
		</div>
		<div class="row">
          <div class="col-sm-12">
			{{ $imoveis->links() }}
          </div>
        </div>
	 </div>
    </section><!-- End Intro Single-->
	
	<div id="modal-success" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title text-success">Sucesso</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>O imóvel foi criado com sucesso.</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<div id="modal-delete" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title text-success">Sucesso</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>O imóvel foi removido com sucesso.</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<script type="text/javascript">
		@if(Session::has('modal-success'))
			$('#modal-success').modal('show');
		@endif
	</script>
	
	<script type="text/javascript">
		@if(Session::has('modal-delete'))
			$('#modal-delete').modal('show');
		@endif
	</script>
	
@endsection