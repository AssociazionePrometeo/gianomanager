@include('form.item', [
            'name'  => 'name',
            'label' => 'Nome',
            'field' => Form::text('name'),
        ])

@include('form.item', [
    'name'  => 'email',
    'label' => 'Email',
    'field' => Form::email('email'),
])

<?php
$selectedRoles = isset($user) ? $user->roles->pluck('id')->toArray() : null;
?>
@include('form.item', [
    'name' => 'roles',
    'label' => trans_choice('models.role', 2),
    'field' => Form::select('roles[]', $roles, $selectedRoles, [
        'multiple',
        'class' => 'autocomplete',
    ]),
])

@include('form.item', [
    'name'  => 'phone_number',
    'label' => __('models.phone_number'),
    'field' => Form::text('phone_number')
])

@include('form.item', [
    'name'  => 'expires_at',
    'label' => __('models.user_expires_at'),
    'field' => Form::date('expires_at', null, ['class' => 'datepicker']),
])

@include('form.item', [
    'name'  => 'password',
    'label' => __('models.password'),
    'field' => Form::password('password'),
])

@include('form.item', [
    'name'  => 'info',
    'label' => __('models.user_info'),
    'field' => Form::textarea('info'),
])

@include('form.item', [
    'name'  => 'validated',
    'label' => __('models.user_validated'),
    'field' => Form::checkbox('validated'),
])
