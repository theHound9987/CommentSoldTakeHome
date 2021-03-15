@extends("layout.basedLayout")

@section("main-content")

    <div>
        @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <div>
            <form method="POST" action="/login">
                @csrf
                <label for="email">Email: </label>
                <input type="email" name="email" value="{{ Request::input("email") ?? ""}}"></br>
                <label for="password">Password:</label>
                <input type="password" name="password"><br>
                <input type="submit">

            </form>
        </div>
    </div>

@endsection
