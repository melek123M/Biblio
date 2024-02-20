<!-- Isbn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isbn', 'Isbn:') !!}
    {!! Form::text('isbn', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Titre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', 'Titre:') !!}
    {!! Form::text('titre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Annedition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annedition', 'Annedition:') !!}
    {!! Form::text('annedition', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix', 'Prix:') !!}
    {!! Form::text('prix', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Qtestock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qtestock', 'Qtestock:') !!}
    {!! Form::text('qtestock', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Couverture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('couverture', 'Couverture:') !!}
    {!! Form::text('couverture', null, ['class' => 'form-control', 'required']) !!}
</div>