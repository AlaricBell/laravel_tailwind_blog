<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Document</title>
</head>
<body class="bg-gray-700">
  <nav class="p-6 bg-gray-900 text-green-300 flex justify-between mb-6">
    <ul class="flex items-center">
      <li class="p-3">
        <a href="{{ route('home') }}">Home</a>
      </li>
      <li class="p-3">
        <a href="{{ route('posts') }}">Post</a>
      </li>
    </ul>

    <ul class="flex items-center">
      @auth
          <li class="p-3">
            <a href="{{ route('dashboard', auth()->user()) }}">{{ auth()->user()->name }}</a>
          </li>
          <li>
              <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                  @csrf
                  <button type="submit">Logout</button>
              </form>
          </li>
      @endauth

      @guest
          <li>
              <a href="{{ route('login') }}" class="p-3">Login</a>
          </li>
          <li>
              <a href="{{ route('register') }}" class="p-3">Register</a>
          </li>
      @endguest
  </ul>
  </nav>
  @yield('content')
</body>
</html>