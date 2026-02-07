@extends('app')

@section('content')
<!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Adicionar novo imóvel</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Início</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                   <a href="imoveis">Imóveis</a>
                </li>
				<li class="breadcrumb-item active" aria-current="page">
                  Adicionar Imóvel
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
	
	<section class="section-about">
      <div class="container">
	  {!! Form::open(['action' => 'ImovelController@store', 'role'=>'form', 'files' => true, 'class'=>'form-horizontal' , 'enctype'=>'multipart/form-data']) !!}
			@include('imoveis.form', ['submitButtonText' => 'Gravar'])

		{!! Form::close()!!}
	  </div>
    </section>

@endsection