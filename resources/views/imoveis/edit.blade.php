@extends('app')

@section('content')
<!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Editar imóvel</h1>
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
                  Editar imóvel
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

<section class="section-about">
     <div class="container">
		{{ Form::open(array('method'=> 'DELETE', 'route' => array('imoveis.destroy', $imovel->id))) }}
		{{ Form::button('<i class="fa fa-trash-alt"></i> Apagar este imóvel', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm mt-3', 'onClick'=>'return confirm("Tem a certeza que deseja apagar este imóvel?");'] )  }}
		{{ Form::close() }}
		<br>
		<form method="post" enctype="multipart/form-data" files="true" action="{{ route('imoveis.update', $imovel->id) }}">
			<div class="table-responsive">
				<input type="hidden" name="_method" value="PATCH">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				@include('imoveis.form', ['submitButtonText' => 'Gravar actualizações'])
			</div>
		{!! Form::close()!!}
		
		{{ Form::open(array('method'=> 'DELETE', 'route' => array('imoveis.destroy', $imovel->id))) }}
		{{ Form::button('<i class="fa fa-trash-alt"></i> Apagar este imóvel', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm mt-3', 'onClick'=>'return confirm("Tem a certeza que deseja apagar este imóvel?");'] )  }}
		{{ Form::close() }}
		
	</div>
 </section>

@endsection