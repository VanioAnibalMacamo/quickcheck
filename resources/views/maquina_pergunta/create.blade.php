<form action="{{url('saveMaquinaPergunta')}}"  method="POST">
    @csrf
    <div class="form-group">
        <label for="maquina_id">Máquina:</label>
        <select name="maquina_id" id="maquina_id" class="form-control">
            @foreach ($maquinas as $maquina)
                <option value="{{ $maquina->id }}">{{ $maquina->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="pergunta_ids">Perguntas:</label>
        <select name="pergunta_ids[]" id="pergunta_ids" class="form-control" multiple>
            @foreach ($perguntas as $pergunta)
                <option value="{{ $pergunta->id }}">{{ $pergunta->descricao }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
