@include('form.item', [
    'name' => 'name',
    'label' => __('models.name'),
    'field' => Form::text('name'),
])

<div class="form-item">
    <div class="row gutters">
        <div class="col col-6">
            @include('form.item', [
                'name' => 'end_date',
                'label' => __('models.subscription_end_date'),
                'field' => Form::datetime('end_date', null, ['class' => 'datetimepicker'])
               ])
        </div>

    </div>
</div>

@include('form.item', [
    'name'  => 'active',
    'label' => __('models.subscription_enabled'),
    'field' => Form::checkbox('active'),
])
