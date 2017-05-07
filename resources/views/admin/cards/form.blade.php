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