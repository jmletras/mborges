@extends('app')

@section('content')
<!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{$imovel->natureza}} - {{$imovel->tipologia}}
                        </h1>
              <span class="color-text-a">{{$imovel->ref_localidade->nome_localidade}}</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Início</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{url('imoveis')}}">Imóveis</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{$imovel->natureza}} - {{$imovel->tipologia}} 
                </li>
              </ol>
            </nav>
			
          </div>
		  
        </div>
		@if(Auth::user())
		<a class="btn btn-primary btn-sm btn-block mt-3 mb-3" role="button" href="{{ route('imoveis.edit', $imovel->id) }}">Editar imóvel</a>
		@endif
      </div>
    </section><!-- End Intro Single-->
	
	<!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property text-center">
			@foreach($imovel->fotos as $foto)
				<div class="carousel-item-b">
					<img src="/fotos_imoveis/{{$foto->filename}}" alt="">
				</div>
			@endforeach
			  
            </div>
            <div class="row justify-content-between">
			
              <div class="col-md-5 col-lg-4">
			 
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">{{number_format($imovel->preco,2,",",".")}}</h5>
                    </div>
					<div class="card-box-ico">
                      <span class="ion-money font-size-small">€</span>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Detalhes</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Referência:</strong>
                        <span>{{$imovel->referencia}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Localidade:</strong>
                        <span>{{$imovel->ref_localidade->nome_localidade}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Natureza:</strong>
                        <span>{{$imovel->natureza}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Tipo de negócio:</strong>
                        <span>{{$imovel->tipo_negocio}}</span>
                      </li>
					  <li class="d-flex justify-content-between">
                        <strong>Estado:</strong>
                        <span>{{$imovel->estado}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Área:</strong>
                        <span>{{$imovel->area_util }}m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Tipologia:</strong>
                        <span>{{$imovel->tipologia}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Ano de construção:</strong>
                        <span>{{$imovel->ano_construcao}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Categoria energética:</strong>
                        <span>{{$imovel->categoria_energetica}}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
					<div class="text-right mb-3">
					 <button type="button" class="btn btn-primary">
					 <!--a class="text-white" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup"--> 
					 <a class="text-white" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup"> 
					 <i class="fab fa-facebook-f"></i> Partilhe este imóvel </a></button>
					 </div>
                    <div class="title-box-d">
                      <h3 class="title-d">Descrição</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
				  {{$imovel->descricao}}
                  </p>

                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Características</h3> 
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
					<div class="row">
						<div class="col-sm-4">
							<i class="fas fa-bed"></i> Quartos: {{$imovel->quartos}}
						</div>
						<div class="col-sm-4">
							<i class="fas fa-restroom"></i> WC: {{$imovel->wc}}
						</div>
						<div class="col-sm-4">
							<i class="fas fa-warehouse"></i> Garagem: {{$imovel->garagem}}
						</div>
					</div>
            
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contacte-nos</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <!--div class="col-md-6 col-lg-4">
                <img src="assets/img/agent-4.jpg" alt="" class="img-fluid">
              </div-->

              <div class="col-sm-12">
                <div class="property-contact">
                  <form action="{{ url('enviar_contacto')}}" method="post" role="form" class="form-a">
					{{csrf_field()}}
                    <div class="row">
					
						<div class="col-md-12 mb-1">
							<div class="form-group">
								<select name="tipo_contacto" id="tipo_contacto" class="form-control">
									<option value="Mais informações">Mais informações</option>
									<option value="Agendamento visita">Agendar visita ao imóvel</option>
								</select>
							</div>
						</div>
					  
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input name="nome" type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Nome *" required>
						  @if ($errors->has('nome')) <p class="help-block">{{ $errors->first('nome') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input name="email" type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
						  @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea name="mensagem" id="textMessage" class="form-control" placeholder="Comentário *" name="message" cols="45" rows="8" required></textarea>
						  <input type="hidden" name="endereco_imovel" value="{{url('imoveis', $imovel->id)}}">
						  @if ($errors->has('mensagem')) <p class="help-block">{{ $errors->first('mensagem') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-a">Enviar contacto</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->
	
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
			<p>O seu email foi enviado. Entraremos em contacto consigo assim que possível. Obrigado pelo seu contacto.</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<script type="text/javascript">
		@if(Session::has('email-success'))
			$('#modal-success').modal('show');
		@endif
	</script>

@endsection