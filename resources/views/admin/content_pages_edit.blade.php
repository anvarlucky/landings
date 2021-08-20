<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('pagesEdit',['page' => $data['id']]), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name', 'Nazvanie:',['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $data['name'], ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('alias', 'Psevdonim:',['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', $data['alias'], ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('text', 'Tekst:',['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $data['text'], ['id'=>'editor','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('old_images', 'Izobrojenie:',['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/img'.$data['images'],'',['class'=>'img-circle img-responsive', 'width' => '30']) !!}
            {!! Form::hidden('old_images', $data['images']) !!} {{-- Oldingi rasm nomi chiqib turishi uchun agar rasm ozgarmasa serverda obratniy turish uchun --}}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('images', 'Izobrojenie:',['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images',['class' => 'filestle','data-buttonText'=>'Viberite fayl','data-button']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs10">
            {!! Form::button('Soxranit', ['class' => 'btn btn-primary', 'type' => 'Submit']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        CKEDITOR.replace('editor');
    </script>
</div>