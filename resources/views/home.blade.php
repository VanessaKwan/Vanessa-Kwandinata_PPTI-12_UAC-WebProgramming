@extends('layout.master')

@section('title', 'Home')

@section('content')

    @auth
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
    @endauth
@endsection
