<!-- Isbn Field -->
<div class="col-sm-12">
    {!! Form::label('isbn', 'Isbn:') !!}
    <p>{{ $livre->isbn }}</p>
</div>

<!-- Titre Field -->
<div class="col-sm-12">
    {!! Form::label('titre', 'Titre:') !!}
    <p>{{ $livre->titre }}</p>
</div>

<!-- Annedition Field -->
<div class="col-sm-12">
    {!! Form::label('annedition', 'Annedition:') !!}
    <p>{{ $livre->annedition }}</p>
</div>

<!-- Prix Field -->
<div class="col-sm-12">
    {!! Form::label('prix', 'Prix:') !!}
    <p>{{ $livre->prix }}</p>
</div>

<!-- Qtestock Field -->
<div class="col-sm-12">
    {!! Form::label('qtestock', 'Qtestock:') !!}
    <p>{{ $livre->qtestock }}</p>
</div>

<!-- Couverture Field -->
<div class="col-sm-12">
    {!! Form::label('couverture', 'Couverture:') !!}
    <p>{{ $livre->couverture }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $livre->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $livre->updated_at }}</p>
</div>

