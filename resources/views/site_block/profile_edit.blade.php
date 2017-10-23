<div class="col-sm-9">

    <!-- start: Post -->
    @foreach ($contents as $content)
            <!-- Form -->

    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif


    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST">
        {{ csrf_field() }}

        <div class="field">
            <label for="name" class="control-label">Name</label>

            <div>
                <input id="name" type="text" class="form-control" name="name" value="{{ $content->name }}" required autofocus>
            </div>
        </div>

        <div class="field">
            <label for="password" class="control-label">Password</label>

            <div>
                <input id="password" type="password" class="form-control" name="password">
            </div>
        </div>


        <div class="field">
            <label for="avatar" class="control-label">Avatar</label>

            <div>
                <img src="/data/user/{{$content->email}}/images/{{$content->avatar}}" style="width:120px; height:auto;">
                <input type="file" name="avatar">
            </div>
        </div>

        <div class="field">
            <div>
                <button type="submit" class="btn btn-primary">
                    Зберегти
                </button>
            </div>
        </div>
    </form>

    @endforeach

</div>