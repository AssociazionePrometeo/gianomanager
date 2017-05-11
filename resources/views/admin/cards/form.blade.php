@include('form.item', [
    'name' => 'id',
    'label' => __('models.card_code'),
    'field' => Form::text('id'),
])

@include('form.item', [
    'name' => 'user_id',
    'label' => trans_choice('models.user', 1),
    'field' => Form::select('user_id', $users, null, ['class' => 'autocomplete']),
])

@include('form.item', [
    'name'  => 'active',
    'label' => __('models.card_enabled'),
    'field' => Form::checkbox('active'),
])
