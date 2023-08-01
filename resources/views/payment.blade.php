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
        @elseif (session()->has('notifF'))
            <div id="modalpopupLI" class="fixed w-screen flex justify-center items-center mt-[2vw] z-50">
                <div class="w-[50vw] h-[10vw] flex items-center justify-center text-nunito font-semibold text-[1.3vw] bg-green-100 rounded-[1vw] border-[#395474] border-[0.2vw]">
                    <p class="text-red-500">{{session('notifF')}}</p>

                    <form action="/overpaid" method="POST" class="w-[50vw] h-[3vw]" autocomplete="on">
                        @csrf
                        <input type="hidden" name="userID" value="{{Auth()->User()->id}}">
                        <input type="hidden" name="rest" value="{{Auth()->User()->minus}}">

                        <button class="w-[4vw] h-[2.5vw] bg-green-400 border-blue-900 border-[0.1vw] rounded-[0.6vw]">
                            Yes
                        </button>
                    </form>

                    <button id="hideModal3"> No </button>
                    <svg xmlns="http://www.w3.org/2000/svg" id="hidemodalLI" class="absolute ml-[47vw] w-[1.5vw] h-[1.5vw] cursor-pointer" viewBox="0 0 256 256"><path fill="currentColor" d="M208.49 191.51a12 12 0 0 1-17 17L128 145l-63.51 63.49a12 12 0 0 1-17-17L111 128L47.51 64.49a12 12 0 0 1 17-17L128 111l63.51-63.52a12 12 0 0 1 17 17L145 128Z"/></svg>
                </div>
            </div>

            <script>
                var modal2 = document.getElementById('modalpopupLI');
                var hidemodal2 = document.getElementById('hidemodalLI');
                var hidemodal3 = document.getElementById('hideModal3');

                hidemodal2.addEventListener('click', closePopup2);
                hidemodal3.addEventListener('click', closePopup3);

                function closePopup2(){
                    modal2.style.display="none";
                }

                function closePopup3(){
                    modal2.style.display="none";
                }
            </script>
        @elseif (session()->has('notifS'))
            <div id="modalpopupLA" class="fixed w-screen flex justify-center items-center mt-[2vw] z-50">
                <div class="w-[50vw] h-[3vw] flex items-center justify-center text-nunito font-semibold text-[1.3vw] bg-green-100 rounded-[1vw] border-[#395474] border-[0.2vw]">
                    <p class="text-black">{{session('notifS')}}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" id="hidemodalLA" class="absolute ml-[47vw] w-[1.5vw] h-[1.5vw] cursor-pointer" viewBox="0 0 256 256"><path fill="currentColor" d="M208.49 191.51a12 12 0 0 1-17 17L128 145l-63.51 63.49a12 12 0 0 1-17-17L111 128L47.51 64.49a12 12 0 0 1 17-17L128 111l63.51-63.52a12 12 0 0 1 17 17L145 128Z"/></svg>
                </div>
            </div>

            <script>
                var modal2 = document.getElementById('modalpopupLA');
                var hidemodal2 = document.getElementById('hidemodalLA');

                hidemodal2.addEventListener('click', closePopup2);

                function closePopup2(){
                    modal2.style.display="none";
                }

                setTimeout(() => {
                    const modal = document.getElementById("modalpopupLA");
                    modal.style.display = 'none';
                }, 3000);
            </script>
        @endif


    <h1 class="text-2xl font-semibold">{{__('pay.judul')}}</h1>

    <div class="flex flex-row mt-[1vw] w-[100%] h-[3vw] ">
        <div class="flex w-[8vw] h-[3vw] bg-yellow-300 rounded-[1vw] ml-[88vw] ">
            <p class="m-auto">{{Auth()->User()->wallet}} coin</p>
        </div>

        <form action="/topup" method="POST">
            @csrf
            @method('put')
            <button class="flex w-[2.5vw] h-[2.5vw] bg-gray-300 rounded-[1vw] mt-[0.3vw] ml-[0.5vw]">
                <p class="m-auto">+</p>
            </button>

            <input type="hidden" name="userID" value="{{Auth()->User()->id}}">
        </form>
    </div>

    <p>Payment price = {{Auth()->User()->registPrice}}</p>

    <form action="/pay" method="POST" class="w-[50vw] h-[3vw]">
        @csrf
        <input class="w-[20vw] h-[3vw] ml-[2vw] mt-[1vw]" type="number" name="payAmount" placeholder="Please input payment amount">
        <input type="hidden" name="userID" value="{{Auth()->User()->id}}">

        <button class="w-[4vw] h-[2.5vw] bg-green-400 border-blue-900 border-[0.1vw] rounded-[0.6vw]">
            Pay
        </button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
