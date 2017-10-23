<div class="col-sm-9">

    <h2><center>Діалоги</center></h2>

    @foreach ($contents as $content)
        @foreach($users as $user)
            @if($content->user_id == Auth::user()->id or $content->whom_id == Auth::user()->id)
                    @if($content->user_id == $user->id or $content->whom_id == $user->id)
                    <div style="padding: 10px;">
                        <div class="field">
                            <div>
                                @if(!Auth::user()->avatar == 'default.jpg')
                                    <img src="/data/user/{{Auth::user()->email}}/images/{{ Auth::user()->avatar }}" style="width:25px; height:25px;  border-radius:50%;">
                                @else
                                    <img src="/data/user/default.jpg" style="width:25px; height:25px;  border-radius:50%;">
                                @endif
                            </div>

                            <div>
                                <p>Імя: {{$user->name}}</p>
                            </div>
                        </div>


                        <p><a href="{{ route('message_dialog',['dialog' => $user->id])}}">{{substr($content->text, 0, 50)}}...</a>
                    </div>
                    <div class="clear"></div>
                    @endif
            @endif
        @endforeach
    @endforeach

</div>