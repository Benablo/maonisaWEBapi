<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Brand', 'Brand:') !!}
    {!! Form::text('Brand', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Prize Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Prize', 'Prize:') !!}
    {!! Form::number('Prize', null, ['class' => 'form-control']) !!}
</div>