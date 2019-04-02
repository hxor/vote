{!! Form::model($model, [
    'route' => $model->exists ? ['nominee.update', $model->id] : 'nominee.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Kode</label>
        {!! Form::text('number_id', null, ['class' => 'form-control', 'id' => 'number_id']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Nama</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>

{!! Form::close() !!}
