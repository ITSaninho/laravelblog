<!--blog start-->
<br>
<div class="col-lg-9">
    @foreach ($posts as $post)
        <div class="blog-item">
            <div class="row">
                <div class="col-lg-2 col-sm-2">
                    <div class="date-wrap">
                        <span class="date">{{ date('d', strtotime($post->created_at))}}</span>
                        <span class="month">{{ date('m-Y', strtotime($post->created_at))}}</span>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-10">
                    <div class="blog-img">
                        <img src="/data/post/images/{{$post->img}}" alt="{{$post->title}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-sm-2 text-right">
                    <div class="author">
                        By<a href="#"> {{$post->user->name}}</a>
                    </div>

                    <ul class="list-unstyled">
                        <?php
                        $result = array();
                        $result = explode(",", $post->keywords);
                        //print_r($result);
                        for($i=0;$i<4;$i++){
                            echo '<li><a href="javascript:;"><em>'.$result[$i].'</em></a></li>';
                        }
                        ?>
                    </ul>
                    <div class="st-view">
                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:;">views: {{$post->views}}</a>
                            </li>
                            <li>
                                <a href="javascript:;">like: {{$post->likes}}</a>
                            </li>
                            <li>
                                <a href="javascript:;">deslike: {{$post->deslikes}}</a>
                            </li>
                            <li>
                                <a href="javascript:;">comments: {{count($post->comments)}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-10">
                    <h1>
                        <a href="{{ route('post',['post_alias' => $post->id])}}">{{$post->title}}</a>
                    </h1>
                    <p>{{$post->text}}</p>
                    <a href="{{ route('post',['post_alias' => $post->id])}}" class="btn btn-primary">Continue Reading</a>
                </div>
            </div>
        </div>
    @endforeach



        <h3>Comments</h3>
        <div id="comments">
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
        </div>


        <!-- Form -->
        <div id="form-comment">
            <form method="post">
                {{csrf_field()}}
                @if ( Auth::user())
                    <input type="hidden" value={{Auth::user()->id}} name="user_id">
                @else
                    <div class="field">
                        <label>Name:</label>
                        <input type="text" name="login" class="form-control" />
                    </div>
                @endif

                <div class="field">
                    <label>Message: <span>*</span></label>
                    <textarea name="text" class="form-control" ></textarea>
                </div>
                <input type="hidden" value='0' id="parent_id" name="parent_id">
                <input type="hidden" value={{$post->id}} name="post_id">

                <div class="field">
                    <input type="submit" class="btn btn-info" value="Add Comment"/>
                </div>

            </form>

        </div>

</div>

<script>
    var comments=document.getElementById('comments'); //выбираем весь блок div с id=comments
    var ref=comments.getElementsByTagName('a'); //выбираем все ссылки внутри блока comments
    var form=document.getElementById('form-comment'); //выбираем форуму для комментирования
    for( i=0; i<ref.length; i++){

        ref[i].addEventListener('click',answer); //проходимся циклом по колекции ссылок и на каждую вешаем обработчик
    }
    function showRef(){ // функция показывает все ссылки "Ответить"
        for( i=0; i<ref.length; i++){

            ref[i].style.display="inline-block"; //проходимся циклом по колекции ссылок и делаем их видимыми
        }
    }
    function cancel(){ // функция обрабатывает нажание на ссылку "Отменить ответ"
        this.parentNode.removeChild(this); //удаляем ссылку на отмену комментария
        form.parentNode.removeChild(form); //удаляем форму
        comments.appendChild(form); //добавляем форму в конце списка комментариев
        showRef(); //показываем все ссылки "ответить"
        document.getElementById('parent_id').value=0; // обнуляем значение скрытого поля parent_id

    }
    function answer(){
        showRef(); //показываем все ссылки "ответить"
        var parent_id=this.id; //получаем id родительсокго комментария
        this.style.display="none"; //скрываем ссылку "ответить"
        document.getElementById('parent_id').value=parent_id; //в скрытое поле помещаем значение id родительского комменатрия.
        form.parentNode.removeChild(form); // удаляем форму, что бы отобразить ее возле родительского комменатрия
        this.parentNode.appendChild(form); //отображаем форму внутри родительского комментария
        var cancel_answer=document.createElement('a'); //создаем ссылку для отмены ответа
        cancel_answer.href='#'; //сслыка ни на что не ссылается
        cancel_answer.style.color="red"; //задаем цвет ссылки
        cancel_answer.id="cancel_anwer"; //назначаем id для ссылки, что легче потом отбирать
        cancel_answer.appendChild(document.createTextNode('Отменить ответ')); //добавляем текст для ссылки

        this.parentNode.appendChild(cancel_answer); //и добавляем ссылки в конце формы
        cancel_answer.addEventListener('click',cancel); // вешаем обработчик  что бы отменить ответ




    }
</script>