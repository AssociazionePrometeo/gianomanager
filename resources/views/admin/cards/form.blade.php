@include('form.item', [
    'name' => 'id',
    'label' => 'Identificativo',
    'field' => Form::text('id'),
])

@include('form.item', [
    'name' => 'user_id',
    'label' => 'Utente',
    'field' => Form::select('user_id', $users),
])

@include('form.item', [
    'name'  => 'status',
    'label' => 'Attivo',
    'field' => Form::checkbox('status'),
])
