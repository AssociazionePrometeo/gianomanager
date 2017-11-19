@include('form.item', [
    'name' => 'name',
    'label' => __('models.name'),
    'field' => Form::text('name'),
])

@include('form.item', [
    'name'  => 'active',
    'label' => __('models.resource_enabled'),
    'field' => Form::checkbox('active'),
])
