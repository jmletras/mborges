<div class="form-group">
    <label>Deseja manter anonimato? *</label>
    <select name="is_anonymous" class="form-control">
        <option value="1" {{ old('is_anonymous') == '1' ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ old('is_anonymous') == '0' ? 'selected' : '' }}>Não</option>
    </select>
</div>

<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
</div>

<div class="form-group">
    <label>Assunto *</label>
    <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
    @if ($errors->has('subject'))
        <p class="text-danger">{{ $errors->first('subject') }}</p>
    @endif
</div>

<div class="form-group">
    <label>Descrição *</label>
    <textarea name="description" class="form-control" rows="6">{{ old('description') }}</textarea>
</div>

<div style="display:none">
    <input type="text" name="website">
</div>

{{-- <div class="form-group">
    <label>Anexos</label>
    <input type="file" name="attachments[]" multiple class="form-control">
</div> --}}
