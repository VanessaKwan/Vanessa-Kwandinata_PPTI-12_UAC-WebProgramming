<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-indigo-500 via-blue-500 to-teal-500 h-screen flex justify-center items-center">
    @if (session()->has('notifE'))
        <div id="modalpopupLO" class="fixed w-screen flex justify-center items-center mt-[2vw] z-50">
            <div class="w-[50vw] h-[3vw] flex items-center justify-center text-nunito font-semibold text-[1.3vw] bg-pink-100 rounded-[1vw] border-[#395474] border-[0.2vw]">
                <p class="text-red-500">{{session('notifE')}}</p>
                <svg xmlns="http://www.w3.org/2000/svg" id="hidemodalLO" class="absolute ml-[47vw] w-[1.5vw] h-[1.5vw] cursor-pointer" viewBox="0 0 256 256"><path fill="currentColor" d="M208.49 191.51a12 12 0 0 1-17 17L128 145l-63.51 63.49a12 12 0 0 1-17-17L111 128L47.51 64.49a12 12 0 0 1 17-17L128 111l63.51-63.52a12 12 0 0 1 17 17L145 128Z"/></svg>
            </div>
        </div>

        <script>
            var modal2 = document.getElementById('modalpopupLO');
            var hidemodal2 = document.getElementById('hidemodalLO');

            hidemodal2.addEventListener('click', closePopup2);

            function closePopup2(){
                modal2.style.display="none";
            }

            setTimeout(() => {
                const modal = document.getElementById("modalpopupLO");
                modal.style.display = 'none';
            }, 3000);
        </script>

    @elseif(session()->has('notifS'))
        <div id="modalpopupLI" class="fixed w-screen flex justify-center items-center mt-[2vw] z-50">
            <div class="w-[50vw] h-[3vw] flex items-center justify-center text-nunito font-semibold text-[1.3vw] bg-green-100 rounded-[1vw] border-[#395474] border-[0.2vw]">
                <p class="text-black">{{session('notifS')}}</p>
                <svg xmlns="http://www.w3.org/2000/svg" id="hidemodalLI" class="absolute ml-[47vw] w-[1.5vw] h-[1.5vw] cursor-pointer" viewBox="0 0 256 256"><path fill="currentColor" d="M208.49 191.51a12 12 0 0 1-17 17L128 145l-63.51 63.49a12 12 0 0 1-17-17L111 128L47.51 64.49a12 12 0 0 1 17-17L128 111l63.51-63.52a12 12 0 0 1 17 17L145 128Z"/></svg>
            </div>
        </div>

        <script>
            var modal2 = document.getElementById('modalpopupLI');
            var hidemodal2 = document.getElementById('hidemodalLI');

            hidemodal2.addEventListener('click', closePopup2);

            function closePopup2(){
                modal2.style.display="none";
            }

            setTimeout(() => {
                const modal = document.getElementById("modalpopupLI");
                modal.style.display = 'none';
            }, 3000);
        </script>
    @endif

    <form action="/login" method="POST" autocomplete="on" class="bg-white shadow-md rounded p-8 space-y-6 w-full sm:w-96">
        @csrf
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h2>
        <div class="flex flex-col space-y-1">
            <label for="phone" class="text-sm font-medium text-gray-700">Phone Number</label>
            <input type="phone" id="phone" name="phone" placeholder="Enter your phone number here" required value="{{ old('phone') }}"
                class="px-4 py-3 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:ring-indigo-500 @error('phone') border-red-500 @enderror">
            @error('phone')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col space-y-1">
            <label for="password" class="text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password here" required
                class="px-4 py-3 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:ring-indigo-500 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded w-full">Submit</button>
    </form>
</body>
</html>
