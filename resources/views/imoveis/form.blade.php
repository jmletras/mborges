@if($errors->count())
	<div class="alert alert-danger" role="alert">
		O imóvel não foi gravado porque existem campos mandatórios que não foram preenchidos. Confirme cada campo.
	</div>
@endif

<div class="form-group">
	<label class="control-label" for="tipo_negocio">Tipo de negócio*</label>
	<select name="tipo_negocio" id="tipo_negocio" class="form-control form-control-sm">
			<option value="">Escolha o tipo de negócio</option>
			<option @if((isset($imovel) AND $imovel->tipo_negocio == 'Venda') OR (old('tipo_negocio') == 'Venda')) selected @endif value="Venda">Venda</option>
			<option @if((isset($imovel) AND $imovel->tipo_negocio == 'Arrendamento') OR (old('tipo_negocio') == 'Arrendamento')) selected @endif value="Arrendamento">Arrendamento</option>
	</select>
	@if ($errors->has('tipo_negocio')) <p class="text-danger help-block">{{ $errors->first('tipo_negocio') }}</p> @endif	
</div>

<div class="form-group">
	<label class="control-label" for="natureza">Natureza*</label>
	<select name="natureza" id="natureza" class="form-control form-control-sm">
			<option value="">Escolha a natureza do imóvel</option>			
			<option @if((isset($imovel) AND $imovel->natureza == 'Apartamento') OR (old('natureza') == 'Apartamento')) selected @endif value="Apartamento">Apartamento</option>
			<option @if((isset($imovel) AND $imovel->natureza == 'Armazém') OR (old('natureza') == 'Armazém')) selected @endif value="Armazém">Armazém</option>
			<option @if((isset($imovel) AND $imovel->natureza == 'Escritório') OR (old('natureza') == 'Escritório')) selected @endif value="Escritório">Escritório</option>
			<option @if((isset($imovel) AND $imovel->natureza == 'Espaço comercial') OR (old('natureza') == 'Espaço comercial')) selected @endif value="Espaço comercial">Espaço comercial</option>
			<option @if((isset($imovel) AND $imovel->natureza == 'Garagem') OR (old('natureza') == 'Garagem')) selected @endif value="Garagem">Garagem</option>
			<option @if((isset($imovel) AND $imovel->natureza == 'Loja') OR (old('natureza') == 'Loja')) selected @endif value="Loja">Loja</option>
			<option @if((isset($imovel) AND $imovel->natureza == 'Moradia') OR (old('natureza') == 'Moradia')) selected @endif value="Moradia">Moradia</option>	
			<option @if((isset($imovel) AND $imovel->natureza == 'Prédio') OR (old('natureza') == 'Prédio')) selected @endif value="Prédio">Prédio</option>	
			<option @if((isset($imovel) AND $imovel->natureza == 'Propriedade agrícola') OR (old('natureza') == 'Propriedade agrícola')) selected @endif value="Propriedade agrícola">Propriedade agrícola</option>		
			<option @if((isset($imovel) AND $imovel->natureza == 'Quinta') OR (old('natureza') == 'Quinta')) selected @endif value="Quinta">Quinta</option>			
			<option @if((isset($imovel) AND $imovel->natureza == 'Terreno urbanizável') OR (old('natureza') == 'Terreno urbanizável')) selected @endif value="Terreno urbanizável">Terreno urbanizável</option>
	</select>
	@if ($errors->has('natureza')) <p class="text-danger help-block">{{ $errors->first('natureza') }}</p> @endif	
</div>

<div class="form-group">
	<label class="control-label" for="tipologia">Tipologia</label>
	<select name="tipologia" id="tipologia" class="form-control form-control-sm">
			<option value="">Escolha a tipologia do imóvel</option>
			<option @if((isset($imovel) AND $imovel->tipologia == 'T0') OR (old('tipologia') == 'T0')) selected @endif value="T0">T0</option>
			<option @if((isset($imovel) AND $imovel->tipologia == 'T1') OR (old('tipologia') == 'T1')) selected @endif value="T1">T1</option>
			<option @if((isset($imovel) AND $imovel->tipologia == 'T2') OR (old('tipologia') == 'T2')) selected @endif value="T2">T2</option>
			<option @if((isset($imovel) AND $imovel->tipologia == 'T3') OR (old('tipologia') == 'T3')) selected @endif value="T3">T3</option>
			<option @if((isset($imovel) AND $imovel->tipologia == 'T4') OR (old('tipologia') == 'T4')) selected @endif value="T4">T4</option>
			<option @if((isset($imovel) AND $imovel->tipologia == 'T5') OR (old('tipologia') == 'T5')) selected @endif value="T5">T5</option>
			<option @if((isset($imovel) AND $imovel->tipologia == 'T6') OR (old('tipologia') == 'T6')) selected @endif value="T6">T6</option>
	</select>
	@if ($errors->has('tipologia')) <p class="text-danger help-block">{{ $errors->first('tipologia') }}</p> @endif
</div>



<div class="form-group">
	<label class="control-label" for="estado">Estado*</label>
	<select name="estado" id="estado" class="form-control form-control-sm">
			<option value="">Escolha o estado do imóvel</option>
			<option @if((isset($imovel) AND $imovel->estado == 'Novo') OR (old('estado') == 'Novo')) selected @endif value="Novo">Novo</option>
			<option @if((isset($imovel) AND $imovel->estado == 'Usado') OR (old('estado') == 'Usado')) selected @endif value="Usado">Usado</option>
	</select>
	@if ($errors->has('estado')) <p class="text-danger help-block">{{ $errors->first('estado') }}</p> @endif
</div>

<div class="form-group">
	{{Form::label('area_util', 'Área útil', array('class'=>'control-label'))}}
	{{Form::number('area_util',  isset($imovel) ? $imovel->area_util : null, array('class'=>'form-control'))}}
	@if ($errors->has('area_util')) <p class="text-danger help-block">{{ $errors->first('area_util') }}</p> @endif
</div>

<div class="form-group">
	{{Form::label('area_bruta', 'Área bruta', array('class'=>'control-label'))}}
	{{Form::number('area_bruta', isset($imovel) ? $imovel->area_bruta : null, array('class'=>'form-control'))}}
	@if ($errors->has('area_bruta')) <p class="text-danger help-block">{{ $errors->first('area_bruta') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('area_terreno', 'Área terreno', array('class'=>'control-label'))}}
	{{Form::number('area_terreno',  isset($imovel) ? $imovel->area_terreno : null, array('class'=>'form-control'))}}
	@if ($errors->has('area_terreno')) <p class="text-danger help-block">{{ $errors->first('area_terreno') }}</p> @endif	
</div>

<div class="form-group">
	<label class="control-label" for="localidade">Distrito*</label>		
	<select name="distrito" class="form-control form-control-sm">
		<option value=""> </option>
		@foreach ($distritos as $key => $value)
			<option @if((isset($imovel) AND $imovel->distrito == $value) OR (old('distrito') == $value)) selected @endif value="{{ $value }}">{{ $key }}</option>
		@endforeach
	</select>
	@if ($errors->has('distrito')) <p class="text-danger help-block">{{ $errors->first('distrito') }}</p> @endif
</div>

<div class="form-group">
	<label class="control-label" for="localidade">Concelho*</label>		
	<select name="concelho" class="form-control form-control-sm">
		<option value=""> </option>
		@foreach ($concelhos as $concelho)
			<option @if((isset($imovel) AND $imovel->concelho == $concelho->id) OR (old('concelho') == $concelho->id)) selected @endif value="{{ $concelho->id }}">{{ $concelho->nome_concelho }}</option>
		@endforeach		
	</select>
	@if ($errors->has('concelho')) <p class="text-danger help-block">{{ $errors->first('concelho') }}</p> @endif
</div>

<div class="form-group">
	<label class="control-label" for="localidade">Localidade*</label>		
	<select name="localidade" class="form-control form-control-sm">
		<option value=""> </option>
		@foreach ($localidades as $localidade)
			<option @if((isset($imovel) AND $imovel->localidade == $localidade->id) OR (old('localidade') == $localidade->id)) selected @endif value="{{ $localidade->id }}">{{ $localidade->nome_localidade }}</option>
		@endforeach
	</select>
	@if ($errors->has('localidade')) <p class="text-danger help-block">{{ $errors->first('localidade') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('codigo_postal', 'Código Postal', array('class'=>'control-label'))}}
	{{Form::text('codigo_postal',  isset($imovel) ? $imovel->codigo_postal : null, array('class'=>'form-control'))}}
	@if ($errors->has('codigo_postal')) <p class="text-danger help-block">{{ $errors->first('codigo_postal') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('rua', 'Rua e Porta', array('class'=>'control-label'))}}
	{{Form::text('rua',  isset($imovel) ? $imovel->rua : null, array('class'=>'form-control'))}}
	@if ($errors->has('rua')) <p class="text-danger help-block">{{ $errors->first('rua') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('ano_construcao', 'Ano construção', array('class'=>'control-label'))}}
	{{Form::number('ano_construcao',  isset($imovel) ? $imovel->ano_construcao : null, array('class'=>'form-control'))}}
	@if ($errors->has('ano_construcao')) <p class="text-danger help-block">{{ $errors->first('ano_construcao') }}</p> @endif

</div>

<div class="form-group">
	<label class="control-label" for="categoria_energetica">Categoria energética</label>
	<select name="categoria_energetica" id="categoria_energetica" class="form-control form-control-sm">
			<option value="">Escolha a categoria energética do imóvel</option>
			<option @if((isset($imovel) AND $imovel->categoria_energetica == 'A') OR (old('categoria_energetica') == 'A')) selected @endif value="A">A</option>
			<option @if((isset($imovel) AND $imovel->categoria_energetica == 'B') OR (old('categoria_energetica') == 'B')) selected @endif value="B">B</option>
			<option @if((isset($imovel) AND $imovel->categoria_energetica == 'C') OR (old('categoria_energetica') == 'C')) selected @endif value="C">C</option>
			<option @if((isset($imovel) AND $imovel->categoria_energetica == 'D') OR (old('categoria_energetica') == 'D')) selected @endif value="D">D</option>
			<option @if((isset($imovel) AND $imovel->categoria_energetica == 'E') OR (old('categoria_energetica') == 'E')) selected @endif value="E">E</option>
			<option @if((isset($imovel) AND $imovel->categoria_energetica == 'F') OR (old('categoria_energetica') == 'F')) selected @endif value="F">F</option>
			<option @if((isset($imovel) AND $imovel->categoria_energetica == 'Em Processo') OR (old('categoria_energetica') == 'Em Processo')) selected @endif value="Em Processo">Em Processo</option>
	</select>
	@if ($errors->has('categoria_energetica')) <p class="text-danger help-block">{{ $errors->first('categoria_energetica') }}</p> @endif
</div>

<div class="form-group">
	{{Form::label('referencia', 'Referência', array('class'=>'control-label'))}}
	{{Form::text('referencia',  isset($imovel) ? $imovel->referencia : null, array('class'=>'form-control'))}}
	@if ($errors->has('referencia')) <p class="text-danger help-block">{{ $errors->first('referencia') }}</p> @endif
</div>

<div class="form-group">
	{{Form::label('wc', 'Nº WCs', array('class'=>'control-label'))}}
	{{Form::number('wc',  isset($imovel) ? $imovel->wc : null, array('class'=>'form-control'))}}
	@if ($errors->has('wc')) <p class="text-danger help-block">{{ $errors->first('wc') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('quartos', 'Nº Quartos', array('class'=>'control-label'))}}
	{{Form::number('quartos',  isset($imovel) ? $imovel->quartos : null, array('class'=>'form-control'))}}
	@if ($errors->has('quartos')) <p class="text-danger help-block">{{ $errors->first('quartos') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('garagem', 'Garagem', array('class'=>'control-label'))}}
	<select name="garagem" id="garagem" class="form-control form-control-sm">
		<option value=''></option>
		<option @if((isset($imovel) AND $imovel->garagem == '1') OR (old('garagem') == '1')) selected @endif value="1">Sim</option>
		<option @if((isset($imovel) AND $imovel->garagem == '0') OR (old('garagem') == '0')) selected @endif value="0">Não</option>
	</select>
	@if ($errors->has('garagem')) <p class="text-danger help-block">{{ $errors->first('garagem') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('preco', 'Preço', array('class'=>'control-label'))}}
	{{Form::number('preco',  isset($imovel) ? $imovel->preco : null, array('class'=>'form-control'))}}
	@if ($errors->has('preco')) <p class="text-danger help-block">{{ $errors->first('preco') }}</p> @endif	

</div>

<div class="form-group">
	{{Form::label('descricao', 'Descrição do imóvel', array('class'=>'control-label'))}}
	{{Form::textarea('descricao',  isset($imovel) ? $imovel->descricao : null, array('class'=>'form-control'))}}
	@if ($errors->has('descricao')) <p class="text-danger help-block">{{ $errors->first('descricao') }}</p> @endif	
</div>

<div class="form-group">
	{{Form::label('fotos', 'Adicionar fotos', array('class'=>'control-label'))}}
	<input type="file" name="fotos[]" class="form-control" multiple accept="image/x-png,image/gif,image/jpeg">
	<div class="form-group-btn"> 
        <!--button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Adicionar</button-->
    </div>
	@if ($errors->has('fotos.0')) <p class="text-danger help-block">{{ $errors->first('fotos.0') }}</p> @endif	
</div>

@if(isset($imovel))
	<div class="row col-sm-12 mb-3">

		@foreach($imovel->fotos as $foto)
			<div class="col-sm-3">
				
						<img src="/fotos_imoveis/{{$foto->filename}}" alt="..." style="width:200px;" class="img-thumbnail">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{$foto->id}}" name="apagar_imagem[]" id="defaultCheck1">
							<label class="form-check-label" for="defaultCheck1">
								Apagar imagem
							</label>
						</div>
					
			</div>
		@endforeach
		@if ($errors->has('apagar_imagem')) <p class="text-danger help-block">{{ $errors->first('apagar_imagem') }}</p> @endif	
	</div>	
@endif


<div class='form-group'>
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-success form-control']) !!}
	
</div>

<script>
    $(document).ready(function(){
        $('select[name=distrito]').change(function() {
			
            var url = '{{ url("distrito") }}/' + $(this).val() + '/concelho/';
			
			
            $.get(url, function(data) {
                var select = $('form select[name=concelho]');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>' + value.nome_concelho + '</option>');
                });
            });
        });
    });
</script>

<script>
    
        $('select[name=concelho]').change(function() {
            var url = '{{ url("concelho") }}/' + $(this).val() + '/localidade/';
			
            $.get(url, function(data) {
                var select = $('form select[name=localidade]');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>' + value.nome_localidade + '</option>');
                });
            });
        });
    
</script>

<script>
    $(document).ready(function(){
        $('select[name=localidade]').change(function() {
            var url = '{{ url("localidade") }}/'+ $(this).val() + '/codigo_postal/';
			
            $.get(url, function(data) {
                var select = $('form select[name=id_cod_postal]');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>'+ value.num_cod_postal + '-' + value.ext_cod_postal +' ' + value.desig_postal +'</option>');
                });
            });
        });
    });
</script>
