@extends('app')

@section('content')

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Os nossos serviços</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fa fa-euro-sign"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h3 class="title-c">Vender/Arrendar</h3>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
					Venda ou arrende o seu imóvel, fale connosco e o seu imóvel será comercializado pelos melhores profissionais. Registe o seu imóvel.
                </p>
              </div>
              <div class="card-footer-c">
                
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fa fa-home"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Assessoria</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
					Disponibilizamos também assessoria jurídica especializada no setor e ainda serviços de aconselhamentos imobiliários na decisão de compra, venda, permuta, trespasse ou arrendamento.
                </p>
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fa fa-search"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Procura um imóvel</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Se procura um imóvel mas não encontrou o que pretende, contacte-nos e diga-nos quais as suas necessidades. Nós procuramos por si.
                </p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Oportunidades</h2>
              </div>
              <div class="title-link">
                <a href="{{ url('imoveis') }}">Ver todas
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="property-carousel" class="owl-carousel owl-theme">
		@foreach($oportunidades as $imovel)
          <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                @if($imovel->fotos()->count())
					<img src="fotos_imoveis/{{$imovel->fotos()->first()->filename}}" style="min-height:350px;" alt="" class="img-a img-fluid">
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
                        <h4 class="card-info-title">Área bruta</h4>
							<span>{{$imovel->area_bruta}}
							  <sup>2</sup>
							</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Quartos</h4>
                        <span>{{$imovel->quartos}}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">WC</h4>
                        <span>{{$imovel->wc}}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garagem</h4>
                       <span>{{$imovel->garagem}}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach  
        </div>
      </div>
    </section><!-- End Latest Properties Section -->


@endsection