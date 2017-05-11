@include('form.item', [
    'name' => 'id',
    'label' => 'Identificatore',
    'field' => Form::text('id')
])

@include('form.item', [
    'name' => 'name',
    'label' => 'Nome',
    'field' => Form::text('name')
])


<div class="form-item">
    <label>Permessi @include('form.error', ['field' => 'permissions'])</label>
    <div class="row gutters">
        @foreach($permissions as $permission)
            <div class="col col-3">
                <label class="checkbox">
                    {!! Form::checkbox('permissions['.$permission.']') !!}
                    {{ $permission }}
                </label>
            </div>
        @endforeach
    </div>
</div>
