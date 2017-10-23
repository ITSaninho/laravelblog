
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif


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

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>

                        <div>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $content->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $content->email }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>

                        <div>
                            <input id="password" type="password" value="{{$content->password}}" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="control-label">Confirm Password</label>

                        <div>
                            <input id="password-confirm" value="{{$content->password}}" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <label for="avatar" class="control-label">Avatar</label>

                        <div>
                            <img src="/data/user/{{$content->email}}/images/{{$content->avatar}}" style="width:120px; height:auto;">
                            <input type="file" name="avatar">
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('public') ? ' has-error' : '' }}">
                        <label for="public" class="control-label">Доступ</label>

                        <div>
                            <select name="public">
                                <option value="1">Активований</option>
                                <option value="0">Заблокований</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Зберегти
                            </button>
                        </div>
                    </div>
                </form>

            @endforeach

                <a href="{{ URL::previous() }}">Назад</a>



                <!--$posts->render()-->



        </div>


