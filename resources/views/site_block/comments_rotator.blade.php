@foreach($tree as $comment)
    <a class="pull-left">
        <img class="media-object" src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=50" alt="" width="50" height="50" border="0" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
            @if ( $comment->user_id === 1)
                {{$comment->login}}
            @else
                {{$comment->user_id}}
            @endif
            <span>|</span><span>{{$comment->created_at}}</span></h4>
        <p>{{$comment->text}}</p>
        <a id="{{$comment->id}}" href=#>Відповісти</a>
        <hr>
        @if(isset($comment->childs))
            @include('site_block.comments_rotator',['tree'=>$comment->childs])
        @endif

    </div>
@endforeach