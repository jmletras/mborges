@extends('app')

@section('content')
	    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Contactos</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Início</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Contactos
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
	
    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 section-t8">
            <div class="row">
              <div class="col-md-7">
                <form action="{{ url('enviar_contacto')}}" method="post" role="form">
				{{csrf_field()}}
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="nome" class="form-control form-control-lg form-control-a" placeholder="Nome" data-rule="minlen:4" required data-msg="Por favor introduza o seu nome.">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Email" data-rule="email" required data-msg="Por favor introduza um endereço de email válido.">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="assunto" class="form-control form-control-lg form-control-a" placeholder="Assunto" data-rule="minlen:4" required data-msg="Por favor introduza o assunto.">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="mensagem" class="form-control" name="message" cols="45" rows="8" data-rule="required" required data-msg="Por favor introduza a sua mensagem." placeholder="Mensagem"></textarea>
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <!--div class="mb-3">
                        <div class="loading ">A processar</div>
                        <div class="error-message"></div>
                        <div class="sent-message">A sua mensagem foi enviada. Muito obrigado!</div>
                      </div-->
                    </div>

                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-a">Enviar mensagem</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="ion-ios-paper-plane"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Fale conosco</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">Email.
                        <span class="color-a">mborgesimobiliaria@gmail.com</span>
                      </p>
                      <p class="mb-1">Telefone.
                        <span class="color-a">(+351) 962 548 074</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="ion-ios-pin"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Estamos em</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">
                        Rua Dr. Emília Salvado Borges 32<br>7940-007 Cuba
                        
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box">
                  <div class="icon-box-icon">
                    <span class="ion-ios-redo"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Redes sociais</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-facebook" aria-hidden="true"></i>  <a href="www.facebook.com/mborgesimobiliaria">facebook.com/mborgesimobiliaria</a>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->
	
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