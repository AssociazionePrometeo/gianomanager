@include('form.item', [
    'name' => 'resource_id',
    'label' => trans_choice('models.resource', 1),
    'field' => Form::select('resource_id', $resources)
])

<div class="form-item">
    <div class="row gutters">
        <div class="col col-6">
            @include('form.item', [
                'name' => 'starts_at',
                'label' => __('models.reservation_starts_at'),
                'field' => Form::datetime('starts_at', null, ['class' => 'datetimepicker'])
               ])
        </div>
        <div class="col col-6">
            @include('form.item', [
                'name' => 'ends_at',
                'label' => __('models.reservation_ends_at'),
                'field' => Form::datetime('ends_at', null, ['class' => 'datetimepicker'])
               ])
        </div>
    </div>
</div>
