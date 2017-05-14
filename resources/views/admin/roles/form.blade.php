<?php
    $options = isset($role) && $role->isProtected() ? ['disabled'] : [];
?>

@include('form.item', [
    'name' => 'id',
    'label' => __('models.identifier'),
    'field' => Form::text('id', null, $options)
])

@include('form.item', [
    'name' => 'name',
    'label' => __('models.name'),
    'field' => Form::text('name')
])


<div class="form-item">
    <label>{{ trans_choice('models.permission', 2) }} @include('form.error', ['field' => 'permissions'])</label>

    <div class="row gutters">
    @foreach(App\Permission::$models as $model)
        <fieldset class="col col-3">
            <legend>{{ trans_choice("models.$model", 2) }}</legend>
            @foreach(App\Permission::model($model) as $permission)
                    <label class="checkbox">
                        {!! Form::checkbox('permissions['.$permission.']', 1, null, $options) !!}
                        {{ __("permissions.$permission") }}
                    </label>
            @endforeach
        </fieldset>
    @endforeach
    </div>
</div>
