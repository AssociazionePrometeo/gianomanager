@include('form.item', [
    'name' => 'user_id',
    'label' => 'Utente',
    'field' => Form::select('user_id', $users)
])

@include('form.item', [
    'name' => 'resource_id',
    'label' => 'Risorsa',
    'field' => Form::select('resource_id', $resources)
])

<div class="form-item">
    <div class="row gutters">
        <div class="col col-6">
            @include('form.item', [
                'name' => 'starts_at',
                'label' => 'Inizio prenotazione',
                'field' => Form::datetime('starts_at', null, ['class' => 'datetimepicker'])
               ])
        </div>
        <div class="col col-6">
            @include('form.item', [
                'name' => 'ends_at',
                'label' => 'Fine prenotazione',
                'field' => Form::datetime('ends_at', null, ['class' => 'datetimepicker'])
               ])
        </div>
    </div>
</div>