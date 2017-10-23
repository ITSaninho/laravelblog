<div class="col-sm-9"><br>
@foreach ($contents as $content)
    <div class="col-sm-9">
        <div class="field">
            <img src="/data/user/{{$content->email}}/images/{{$content->avatar}}" style="width:30%; height:auto; float: left; margin-right: 5px;">
        </div>

        <p style="margin-top: 10px;">Імя: {{$content->name}}</p>
        <p>Email: {{$content->email}}</p>
        <p>Дата реєстрації:{{$content->created_at}}</p>
        <p><a href="{{ route('message_dialog',['dialog' => $content->id])}}">Відправити повідомлення</a></p>
    </div>

@endforeach

{{ $contents->links() }}
</div>