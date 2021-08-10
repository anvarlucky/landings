<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('pageAdd'),'class' => 'form-horizontal', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('name','Nazvanie', ['class' => 'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name',old('name'), ['class' => 'form-control','placeholder' => 'Nazvanie tekst']) !!}
            </div>
        </div>
    <div class="form-group">
        {!! Form::label('alias','Psevdonim', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias',old('alias'), ['class' => 'form-control','placeholder' => 'Nazvanie psevdonim']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('text','Tekst', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text',old('text'), ['id' => 'editor','class' => 'form-control','placeholder' => 'Tekst']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('images','Izobrojeniya', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText' => 'Viberite izobrojenie']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Soxranit', ['class' => 'btn btn-primary','type' => 'submit']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        CKEDITOR.replace('editor');
    </script>
</div>