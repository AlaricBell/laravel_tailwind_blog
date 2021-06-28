@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-4/12 bg-gray-900 p-6 rounded-lg">
      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Enter name" value="{{old('name')}}" class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('name') border-red-500 @enderror">

          @error('name')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="username" class="sr-only">Username</label>
          <input type="text" name="username" id="username" placeholder="Enter username" value="{{old('username')}}" class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('username') border-red-500 @enderror">

          @error('username')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" placeholder="Enter email" value="{{old('email')}}" class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('email') border-red-500 @enderror">

          @error('email')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" id="password" placeholder="Enter password" value="" class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('password') border-red-500 @enderror">

          @error('password')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password_confirm" class="sr-only">Confirm password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation" value="" class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('password_confirmation') border-red-500 @enderror">

          @error('password_confirmation')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="image" class="sr-only">Image upload</label>
          <input type="file" name="image" id="image
          @error('password_confirmation') border-red-500 @enderror">

          @error('image')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="bg-green-300 text-white px-4 py-3 rounded font-medium w-full">Register</button>
      </form>
    </div>
  </div>
@endsection