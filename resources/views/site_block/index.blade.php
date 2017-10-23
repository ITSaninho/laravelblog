
        <!--blog start-->
        <div class="col-lg-9 ">
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

                <div class="text-center">
                    {{ $posts->links() }}
                </div>

        </div>


        <!--blog end-->