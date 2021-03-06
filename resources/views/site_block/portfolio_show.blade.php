<!--blog start-->
<br>
<div class="col-lg-9">
    @foreach ($portfolios as $portfolio)
        <div class="blog-item">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="blog-img">
                        <img src="/data/portfolio/{{$portfolio->img}}" alt="{{$portfolio->title}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-sm-10">
                    <h1>
                        <a href="{{ route('post',['post_alias' => $portfolio->id])}}">{{$portfolio->title}}</a>
                    </h1>
                    <p>{{$portfolio->text}}</p>
                </div>
            </div>
        </div>
    @endforeach
        <div class="col-lg-5 col-sm-5 address">
            <section class="contact-infos">
                <h4 class="title custom-font text-black">
                    ADDRESS
                </h4>
                <address>
                    Revox
                    Crossraid, 85/B Cross Street,
                    <br>
                    New York, USA
                    <br>
                    NA1 42SL
                </address>
            </section>
            <section class="contact-infos">
                <h4>
                    TELEPHONE
                </h4>
                <p>
                    <i class="icon-phone">
                    </i>
                    +088-01234567890
                </p>

                <p>
                    <i class="icon-phone">
                    </i>
                    +088-01234567890
                </p>

            </section>
        </div>
        <div class="col-lg-7 col-sm-7 address">
            <h4>
                Drop us a line so that we can hear from you
            </h4>
            <div class="contact-form">
                <form method="post">
                    {{csrf_field()}}
                    @if ( !Auth::user())
                        <div class="field">
                            <label>Name:</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                    @endif

                    <div class="field">
                        <label>Тема: <span>*</span></label>
                        <input type="text" name="subject" class="form-control" />
                    </div>

                    <div class="field">
                        <label>Message: <span>*</span></label>
                        <textarea name="text" class="form-control" ></textarea>
                    </div>

                    <div class="field">
                        <input type="submit" value="Add Comment"/>
                    </div>

                </form>

            </div>
        </div>
</div>