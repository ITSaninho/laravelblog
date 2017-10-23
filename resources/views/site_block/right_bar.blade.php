<div class="col-lg-3">
    <div class="blog-side-item">
        <div class="category">
            <h3>Категорії</h3>
            <ul class="list-unstyled">
                @foreach ($category as $categoria)
                    <li>
                        <a href="{{ route('category',['category' => $categoria->id])}}"><i class="fa fa-angle-right pr-10"></i>{{$categoria->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="category">
            <h3>Відео</h3>
            <ul class="list-unstyled">
                @foreach ($category as $categoria)
                    <li>
                        <a href="{{ route('video',['category' => $categoria->id])}}"><i class="fa fa-angle-right pr-10"></i>{{$categoria->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="category">
            <h3>Скріпти</h3>
            <ul class="list-unstyled">
                @foreach ($category as $categoria)
                    <li>
                        <a href="{{ route('script',['category' => $categoria->id])}}"><i class="fa fa-angle-right pr-10"></i>{{$categoria->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="category">
            <h3>Сніпети</h3>
            <ul class="list-unstyled">
                @foreach ($category as $categoria)
                    <li>
                        <a href="{{ route('snipet',['category' => $categoria->id])}}"><i class="fa fa-angle-right pr-10"></i>{{$categoria->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="blog-post">
            <h3>
                Найпопулярніші
            </h3>
            @foreach ($populars as $popular)
            <div class="media">
                <a class="pull-left" href="{{ route('post',['id' => $popular->id])}}">
                    <img class=" " style="width: 60px;" src="/data/post/images/{{$popular->img}}" alt="{{$popular->title}}">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">
                        <a href="javascript:;">{{ date('d-m-Y', strtotime($popular->created_at))}}</a>
                    </h5>
                    <p>{{$popular->title}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="blog-post">
            <h3>
                Найбільш сподобались
            </h3>
            @foreach ($more_likes as $likes)
                <div class="media">
                    <a class="pull-left" href="{{ route('post',['id' => $likes->id])}}">
                        <img class=" " style="width: 60px;" src="/data/post/images/{{$likes->img}}" alt="{{$likes->title}}">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">
                            <a href="javascript:;">{{ date('d-m-Y', strtotime($likes->created_at))}}</a>
                        </h5>
                        <p>{{$likes->title}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="tags">
            <h3>
                Tags
            </h3>
            <ul class="tag">
                @foreach ($tags as $tag)
                <li>
                    <a href="{{ route('category',['category' => $likes->id])}}"><i class="fa fa-tags pr-5"></i>{{$tag->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>