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
    'label' => 'Ruoli',
    'field' => Form::select('roles[]', $roles, $selectedRoles, [
        'multiple',
        'class' => 'autocomplete',
    ]),
])

@include('form.item', [
    'name'  => 'phone_number',
    'label' => 'Numero di telefono',
    'field' => Form::text('phone_number')
])

@include('form.item', [
    'name'  => 'expires_at',
    'label' => 'Data di scadenza',
    'field' => Form::date('expires_at', null, ['class' => 'datepicker']),
])

@include('form.item', [
    'name'  => 'password',
    'label' => 'Password',
    'field' => Form::password('password'),
])

@include('form.item', [
    'name'  => 'info',
    'label' => 'Info',
    'field' => Form::textarea('info'),
])

@include('form.item', [
    'name'  => 'active',
    'label' => 'Verificato',
    'field' => Form::checkbox('active'),
])