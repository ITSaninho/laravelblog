<div class="col-sm-9">

    <!-- Form -->
    <form method="post" style="margin-bottom: 30px;">
        {{csrf_field()}}

        <div class="field">
            <input type="hidden" name="whom_id" value="{{$dialog}}">
        </div>


        <div class="field">
            <textarea name="text" class="form-control" ></textarea>
        </div>

        <div class="field">
            <input type="submit" value="Відправити"/>
        </div>

    </form>

    @foreach ($contents as $content)

        @if($content->whom_id == $dialog or $content->user_id == $dialog)
            @if($content->user_id == $dialog)
                <div>
                    <img src="/data/user/{{$content->user->email}}/images/{{$content->user->avatar}}" style="width:50px; height:50px; float: left; margin-right: 15px; border-radius:50%;">
                </div>
                <div>
                    <p style="color: red">Імя: {{$content->user->name}}</p>
                    <p>Час:{{$content->created_at}}</p>
                    <p>{{$content->text}}</p>
                </div>
                <div class="clear" style="outline: #122b40 solid 1px;"></div>
                <hr>
            @else
                <div>
                    @if(!Auth::user()->avatar == 'default.jpg')
                        <img src="/data/user/{{Auth::user()->email}}/images/{{ Auth::user()->avatar }}" style="width:25px; height:25px;  border-radius:50%;">
                    @else
                        <img src="/data/user/default.jpg" style="width:25px; height:25px;  border-radius:50%;">
                    @endif
                </div>
                <div>
                    <p style="color: green">Імя: {{$content->user->name}}</p>
                    <p>Час:{{$content->created_at}}</p>
                    <p>{{$content->text}}</p>
                </div>
                <div class="clear" style="outline: #122b40 solid 1px;"></div>
                <hr>
            @endif
        @endif

    @endforeach

</div>