
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                {{$error}}
                                @endforeach
                            @endif
                            <form action="{{route('admin.login')}}" method="get">
                                @csrf
                                <input type="text" name="name" id="">
                                <input type="password" name="password" id="">
                                <button type="submit">Submit</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                            </form>
