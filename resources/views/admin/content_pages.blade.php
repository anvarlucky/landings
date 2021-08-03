<div style="margin:0px 50px 0px 50px">
    @if($pages)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th>Текст</th>
                <th>Дата создания</th>
                <th>Ссылка</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pages as $key => $page)
            <tr>
                <td>{{$page->id}}</td>
                <td>{!! HTML::link(route('pagesEdit',['page' => $page->id]),$page->name,['alt' => $page->name])!!}</td>
                <td>{{$page->alias}}</td>
                <td>{{$page->text}}</td>
                <td>{{$page->created_at}}</td>
                <td>{{$page->created_at}}</td>
                <td>{{$page->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>