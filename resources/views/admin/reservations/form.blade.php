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
    <label>
        Inizio prenotazione
        @include('form.error', ['field' => 'start_date'])
        @include('form.error', ['field' => 'start_time'])
    </label>
    <div class="row gutters">
        <div class="col col-6">
            {!! Form::date('start_date') !!}
        </div>
        <div class="col col-6">
            {!! Form::time('start_time') !!}
        </div>
    </div>
</div>

<div class="form-item">
    <label>
        Fine prenotazione
        @include('form.error', ['field' => 'end_date'])
        @include('form.error', ['field' => 'end_time'])
    </label>
    <div class="row gutters">
        <div class="col col-6">
            {!! Form::date('end_date') !!}
        </div>
        <div class="col col-6">
            {!! Form::time('end_time') !!}
        </div>
    </div>
</div>