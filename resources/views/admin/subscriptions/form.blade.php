@include('form.item', [
    'name' => 'name',
    'label' => __('models.name'),
    'field' => Form::text('name'),
])

@include('form.item', [
    'name'  => 'active',
    'label' => __('models.subscription_enabled'),
    'field' => Form::checkbox('active'),
])
