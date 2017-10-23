<div class="col-sm-9"><br>

    <!-- start: Post -->
    @foreach ($contents as $content)


        <div class="field">
            <div>
                <img src="/data/user/{{$content->email}}/images/{{$content->avatar}}" style="width:30%; height:auto; float: left; margin-right: 5px;">
                @if(Auth::user()->id == $id)
                    <p><a href="{{route('profile_edit',['id' => Auth::user()->id])}}">Редагувати</a></p>
                    <input type="file" name="avatar">
                @endif
            </div>
        </div>

        <p style="margin-top: 10px;">Імя: {{$content->name}}</p>
        <p>Email: {{$content->email}}</p>
        <p>Дата реєстрації:{{$content->created_at}}</p>

    @endforeach

</div>