<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />

</head>
<body>
    <div class="flex text-[3vw] ml-[1vw] mt-[0.2vw] font-semibold mx-auto">Let's Join ConnectFriend!</div>

    <form action="/register" method="POST" autocomplete="on" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col justify-center align-items-center justify-items-center content-center w-[95%]">
            <input type="text" name="name" placeholder="Enter your name here" class="ml-[2vw] mt-[1vw] h-[3vw]" required value="{{ old('name')}}">

            @error('name')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror

            <div class="ml-[2vw] mt-[1vw]">
                <label class="text-[1.3vw] font-bold" for="male">Gender</label>
                <div class="flex flex-row">
                    <div class="flex items-center">
                        <input type="radio" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} id="male" class="ml-[1vw]">
                        <label class="ml-[0.8vw] text-[1.2vw]" for="male">Male</label>
                    </div>

                    <div class="flex items-center">
                        <input type="radio" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} id="female" class="ml-[1vw]">
                        <label class="ml-[0.8vw] text-[1.2vw]" for="female">Female</label>
                    </div>
                </div>
            </div>
            @error('gender')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror

            <input type="number" name="age" placeholder="Enter your age here" required class="ml-[2vw] mt-[1vw] h-[3vw]" value="{{ old('age')}}">
            @error('age')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror

            <label class="text-[1.3vw] ml-[2vw] font-bold mt-[1vw]" for="job">Job</label>
            <div class="ml-[2.8vw]">
                @foreach ($jobs as $job)
                <input type="checkbox" name="selected_jobs[]" value="{{ $job->id }}" {{ in_array($job->id, old('selected_jobs', [])) ? 'checked' : '' }}> {{ $job->name }}<br>
                @endforeach
            </div>
            @error('selected_jobs[]')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror

            <input type="text" name="username" placeholder="Enter your linkedIn username here" required class="ml-[2vw] mt-[1vw] h-[3vw]" value="{{ old('username')}}">
            @error('username')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror

            <input type="number" name="phone" placeholder="Enter your phone number here" required class="ml-[2vw] mt-[1vw] h-[3vw]" value="{{ old('phone')}}">
            @error('phone')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror

            <input type="file" class="ml-[2vw] mt-[1.5vw]" required accept="image/*" name="photo">

            @error('photo')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror

            <input type="password" name="password" required placeholder="Enter your password here" class="ml-[2vw] mt-[1.5vw] h-[3vw]">
            @error('password')
                <p class="text-red-500 ml-[2vw]">{{ $message }}</p>
            @enderror


            @php
                $price = rand(100000, 125000);
            @endphp
            <p>Registration price : {{$price}}</p>

            <input type="hidden" name="registPrice" value="{{$price}}">

            <button type="submit" class="w-[10vw] h-[3vw] bg-blue-200 mt-[1vw] ml-[83.8vw] rounded-[1vw] hover:bg-blue-400">Submit</button>
        </div>

    </form>

    <a class="text-[1vw] ml-[81vw] text-blue-700" href="/login">Already have an account? Login</a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
