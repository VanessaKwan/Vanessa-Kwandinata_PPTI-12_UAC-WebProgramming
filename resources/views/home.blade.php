@extends('layout.master')

@section('title', 'Home')

@section('content')

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

        @guest
            <div class="flex flex-col m-auto w-[80%] h-[60vh] bg-purple-200 mt-[5vw] rounded-[3vw] drop-shadow-md scrollbar-hide">
                    <div class="w-[100%] h-[47vh] mt-[3vw]  overflow overflow overflow-y-auto scrollbar-hide">
                        @foreach ($users as $male)
                            <div class="w-[93%] bg-gray-500 h-[4vw] mx-auto flex mb-[1.5vw] border-[0.2vw] border-cyan-950 rounded-[0.8vw]">
                                <img class="my-auto ml-[0.5vw]" src="{{ asset('storage/' . $male->photo) }}" alt="Photo" style="object-fit: cover; width:3vw; height:3vw; border-radius: 50%;">
                                <div class="h-[2vw] w-[40vw] my-auto text-[1.3vw] ml-[1vw] text-white w-[10vw] flex flex-row">
                                    <p >{{$male->name}} ({{$male->age}})</p>

                                    @foreach ($userJobs as $job)
                                        @if ($job->user_id == $male->id)
                                                @foreach ($jobs as $j)
                                                    @if ($j->id == $job->job_id)
                                                        <p class="opacity-0">..</p>
                                                        <p class="my-auto text-white">- {{$j->name}}</p>
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </div>
                                    <form action="/reqMatch" method="POST" class="flex my-auto w-[5vw] h-[2.5vw] bg-pink-200 ml-[21.2vw] rounded-[0.5vw]">
                                        @csrf

                                        @method('put')
                                        <button class="flex">
                                            <p class="ml-[0.5vw] mt-[0.2vw] text-black font-semibold ">Thumb</p>
                                        </button>
                                        <input type="hidden" name="match" value="{{$male->id}}">
                                    </form>
                                {{-- @endif --}}
                            </div>
                        @endforeach

                    </div>
            </div>
        @endguest

            @php
                $job = null;
            @endphp
            <div class="flex flex-row mt-[2.5vw] w-[100%] h-[3vw] ">
                {{-- <select id="city" name="city_id" required class= "ml-[2vw] h-[3.5vw]" onchange="redirectToCity()">
                    <div id="select-box" class="max-w-[1.8vw] min-w-[1.8vw] max-h-[2.5vw] min-h-[2.5vw] mt-[1vw] border-none">
                        @if ($job != null)
                            <option selected="false" class="hidden" value="">
                                {{$city->name}}
                            </option>
                        @else
                            <option selected="false" class="hidden" value="">
                                Choose a city
                            </option>
                        @endif
                        <option value="0">
                            <p class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Home</p>
                        </option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">
                                <p class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $city->name }}</p>
                            </option>
                        @endforeach
                    </div>
                </select> --}}

                {{-- <script>
                    function redirectToCity() {
                        var selectElement = document.getElementById("city");
                        var selectedValue = selectElement.value;

                        // Assuming you have a mapping of city IDs to their respective URLs
                        var cityUrlMap = {
                            0: "/home",
                            1: "/home/1",
                            2: "/home/2",
                            3: "/home/3",
                            4: "/home/4",
                            5: "/home/5",
                            6: "/home/6",
                            7: "/home/7",
                        };

                        if (selectedValue && cityUrlMap[selectedValue]) {
                            window.location.href = cityUrlMap[selectedValue];
                        }
                    }
                </script> --}}
                @auth
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

                @endauth
            </div>

            @php
                $flag = 0;
            @endphp
            {{-- <p class="mt-[10vw]">{{Auth()->User()}}</p> --}}
            @auth

            <div class="flex flex-col m-auto w-[80%] h-[60vh] bg-purple-200 mt-[1.5vw] rounded-[3vw] drop-shadow-md scrollbar-hide">
                @if (Auth()->User()->gender == 'Female')
                    <div class="w-[100%] h-[47vh] mt-[3vw]  overflow overflow overflow-y-auto scrollbar-hide">
                        @foreach ($males as $male)
                            @foreach ($couplesM as $couple)
                                @if ($couple->manID == $male->id && $couple->requester == Auth()->User()->id)
                                    @php
                                        $flag = 1;
                                    @endphp
                                    @break
                                @elseif ($couple->manID == $male->id)
                                    @php
                                        $flag = 2;
                                    @endphp
                                    @break
                                @else
                                    @php
                                        $flag = 0;
                                    @endphp
                                @endif
                            @endforeach

                            <div class="w-[93%] bg-gray-500 h-[4vw] mx-auto flex mb-[1.5vw] border-[0.2vw] border-cyan-950 rounded-[0.8vw]">
                                <img class="my-auto ml-[0.5vw]" src="{{ asset('storage/' . $male->photo) }}" alt="Photo" style="object-fit: cover; width:3vw; height:3vw; border-radius: 50%;">
                                <div class="h-[2vw] w-[40vw] my-auto text-[1.3vw] ml-[1vw] text-white w-[10vw] flex flex-row">
                                    <p >{{$male->name}} ({{$male->age}})</p>

                                    @foreach ($userJobs as $job)
                                        @if ($job->user_id == $male->id)
                                                @foreach ($jobs as $j)
                                                    @if ($j->id == $job->job_id)
                                                        <p class="opacity-0">..</p>
                                                        <p class="my-auto text-white">- {{$j->name}}</p>
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </div>

                                @if ($flag == 1)
                                    <div class="flex my-auto w-[6vw] h-[2.5vw] bg-blue-200 ml-[20.7vw] rounded-[0.5vw]">
                                        <p class="ml-[0.8vw] mt-[0.2vw] text-black font-semibold ">Waiting</p>
                                    </div>
                                @elseif ($flag == 2)
                                    <form action="/accMatch" method="POST" class="flex my-auto w-[7.5vw] h-[2.5vw] bg-yellow-200 ml-[20vw] rounded-[0.5vw]">
                                        @csrf

                                        @method('put')
                                        <button class="flex">
                                            <p class="ml-[0.6vw] mt-[0.2vw] text-black font-semibold ">Let's Match</p>
                                        </button>
                                        <input type="hidden" name="match" value="{{$male->id}}">
                                    </form>
                                @else
                                    <form action="/reqMatch" method="POST" class="flex my-auto w-[5vw] h-[2.5vw] bg-pink-200 ml-[21.2vw] rounded-[0.5vw]">
                                        @csrf

                                        @method('put')
                                        <button class="flex">
                                            <p class="ml-[0.5vw] mt-[0.2vw] text-black font-semibold ">Thumb</p>
                                        </button>
                                        <input type="hidden" name="match" value="{{$male->id}}">
                                    </form>
                                @endif
                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="w-[100%] h-[47vh] mt-[3vw]  overflow overflow overflow-y-auto scrollbar-hide">
                        @foreach ($females as $female)
                            @foreach ($couplesF as $couple)
                                @if ($couple->womanID == $female->id && $couple->requester == Auth()->User()->id)
                                    @php
                                        $flag = 1;
                                    @endphp
                                    @break
                                @elseif ($couple->womanID == $female->id)
                                    @php
                                        $flag = 2;
                                    @endphp
                                    @break
                                @else
                                    @php
                                        $flag = 0;
                                    @endphp
                                @endif
                            @endforeach


                            <div class="w-[93%] bg-gray-500 h-[4vw] mx-auto flex mb-[1.5vw] border-[0.2vw] border-cyan-950 rounded-[0.8vw]">
                                <img class="my-auto ml-[0.5vw]" src="{{ asset('storage/' . $female->photo) }}" alt="Photo" style="object-fit: cover; width:3vw; height:3vw; border-radius: 50%;">
                                <div class="h-[2vw] w-[40vw] my-auto text-[1.3vw] ml-[1vw] text-white w-[10vw] flex flex-row">
                                    <p >{{$female->name}} ({{$female->age}})</p>

                                    @foreach ($userJobs as $job)
                                        @if ($job->user_id == $female->id)
                                                @foreach ($jobs as $j)
                                                    @if ($j->id == $job->job_id)
                                                        <p class="opacity-0">..</p>
                                                        <p class="my-auto text-white">- {{$j->name}}</p>
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </div>

                                @if ($flag == 1)
                                    <div class="flex my-auto w-[6vw] h-[2.5vw] bg-blue-200 ml-[20.7vw] rounded-[0.5vw]">
                                        <p class="ml-[0.8vw] mt-[0.2vw] text-black font-semibold ">Waiting</p>
                                    </div>
                                @elseif ($flag == 2)
                                <form action="/accMatch" method="POST" class="flex my-auto w-[7.5vw] h-[2.5vw] bg-yellow-200 ml-[20vw] rounded-[0.5vw]">
                                        @csrf

                                        @method('put')
                                        <button class="flex">
                                            <p class="ml-[0.6vw] mt-[0.2vw] text-black font-semibold ">Let's Match</p>
                                        </button>
                                        <input type="hidden" name="match" value="{{$female->id}}">
                                    </form>
                                @else
                                    <form action="/reqMatch" method="POST" class="flex my-auto w-[5vw] h-[2.5vw] bg-pink-200 ml-[21.2vw] rounded-[0.5vw]">
                                        @csrf

                                        @method('put')
                                        <button class="flex">
                                            <p class="ml-[0.5vw] mt-[0.2vw] text-black font-semibold ">Thumb</p>
                                        </button>
                                        <input type="hidden" name="match" value="{{$female->id}}">
                                    </form>
                                @endif
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        @endauth

@endsection
