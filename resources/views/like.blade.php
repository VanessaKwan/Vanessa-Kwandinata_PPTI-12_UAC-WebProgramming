@extends('layout.master')

@section('title', 'Like')

@section('content')
    <h1 class="mt-[1vw] ml-[1vw] text-[1.5vw] font-semibold">People that requested to match with you</h1>

    @php
        // $showPagination = false;
        $flag = 0;
    @endphp

    @if (Auth()->User()->gender == 'Female')
        <div>
            @if (!$couplesM->count())
                <div class="text-white flex w-[80vw] h-[15vw] bg-black ml-[10vw] mt-[1vw] shadow-lg rounded-[1vw] text-[1.5vw] font-semibold">
                    <p class=" m-auto">There is no one that request to match with u yet</p>
                </div>
            @else
                <div class="grid grid-cols-3 w-[80vw] h-[34vw] bg-black ml-[10vw] mt-[1vw] shadow-lg rounded-[1vw]">
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

                        @if ($flag == 2)
                            <div class="w-[20vw] h-[25vw] rounded overflow-hidden bg-blue-300 mx-auto mt-[2.5vw]">
                                <img class="w-full h-[18vw] m-auto flex" src="{{ asset('storage/' . $male->photo) }}" alt="" style="object-fit: cover;">
                                <div class="flex flex-row">
                                    <div class="px-6 text-blue-900 w-[14vw]">


                                        <div class="font-bold text-xl">{{$male->name}}</div>


                                    </div>

                                    <form action="/accMatch" method="POST" class="flex mt-[3.5vw] w-[5vw] h-[2.5vw] bg-blue-900 rounded-[0.5vw]">
                                        @csrf

                                        @method('put')
                                        <button class="flex">
                                            <p class="ml-[0.7vw] mt-[0.2vw] text-white font-semibold ">Match</p>
                                        </button>
                                        <input type="hidden" name="match" value="{{$male->id}}">
                                    </form>
                                </div>
                            </div>

                        {{-- @php
                            $showPagination = true;
                        @endphp --}}
                    @endif

                @endforeach

                {{-- @if ($showPagination)
                    {{ $couplesM->links('layout.pagination') }}
                    @endif --}}
                </div>
            @endif

        </div>
        @if ($couplesM->count())
            {{ $couplesM->links('layout.pagination') }}
        @endif

    {{-- @else --}}

    @endif


    <h1 class="mt-[5vw] ml-[1vw] text-[1.5vw] font-semibold">Your match(es)</h1>

    @php
        // $showPagination = false;
        $flag = 0;
    @endphp


    @if (Auth()->User()->gender == 'Female')
        <div>
            @if (!$matchedM->count())
                <div class="text-white flex w-[80vw] h-[15vw] bg-black ml-[10vw] mt-[1vw] shadow-lg rounded-[1vw] text-[1.5vw] font-semibold">
                    <p class=" m-auto">No match yet</p>
                </div>
            @else
                <div class="grid grid-cols-3 w-[80vw] h-[34vw] bg-black ml-[10vw] mt-[1vw] shadow-lg rounded-[1vw]">
                    @foreach ($matchedM as $male)
                        @foreach ($couplesMM as $couple)
                            @if ($couple->manID == $male->id)
                                <div class="w-[20vw] h-[25vw] rounded overflow-hidden bg-purple-300 mx-auto mt-[2.5vw]">
                                    <img class="w-full h-[18vw] m-auto flex" src="{{ asset('storage/' . $male->photo) }}" alt="" style="object-fit: cover;">
                                    <div class="flex flex-row">
                                        <div class="px-6 text-violet-900 w-[14vw]">

                                            <div class="font-bold text-xl">{{$male->name}}</div>
                                            <p class="text-base">{{$male->age}}</p>
                                            <div class="flex flex-row">
                                                @foreach ($userJobs as $job)
                                                    @if ($job->user_id == $male->id)
                                                            @foreach ($jobs as $j)
                                                                @if ($j->id == $job->job_id)
                                                                    <p class="opacity-0">..</p>
                                                                    <p class="my-auto text-[0.6vw]">- {{$j->name}}</p>
                                                                @endif
                                                            @endforeach
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @endif
        </div>
        @if ($matchedM->count())
            {{ $couplesMM->links('layout.paginationMatchM') }}
        @endif
    {{-- @else --}}

    @endif

    <h1 class="mt-[5vw] ml-[1vw] text-[1.5vw] font-semibold">The person u've matched (waiting for their response)</h1>

    @php
        $flag = 0;
    @endphp


    @if (Auth()->User()->gender == 'Female')
        <div>
            @if (!$requestedM->count())
                <div class="text-white flex w-[80vw] h-[15vw] bg-black ml-[10vw] mt-[1vw] shadow-lg rounded-[1vw] text-[1.5vw] font-semibold">
                    <p class=" m-auto">There is no one who have make u interested yet</p>
                </div>
            @else
                <div class="grid grid-cols-3 w-[80vw] h-[34vw] bg-black ml-[10vw] mt-[1vw] shadow-lg rounded-[1vw]">
                    @foreach ($males as $male)
                        @foreach ($requestedM as $couple)
                            @if ($couple->manID == $male->id)
                                <div class="w-[20vw] h-[25vw] rounded overflow-hidden bg-pink-300 mx-auto mt-[2.5vw]">
                                    <img class="w-full h-[18vw] m-auto flex" src="{{ asset('storage/' . $male->photo) }}" alt="" style="object-fit: cover;">
                                    <div class="flex flex-row">
                                        <div class="px-6 text-pink-900 w-[14vw]">

                                            <div class="font-bold text-xl">{{$male->name}}</div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @endif
        </div>

        @if ($requestedM->count())
            {{ $requestedM->links('layout.paginationReqM') }}
        @endif
    {{-- @else --}}

    @endif

    <div class="h-[3vw]"></div>

@endsection
