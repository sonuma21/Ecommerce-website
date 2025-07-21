@props(["shop_profile"])
<div class="border border-gray-400 p-4 m-4 bg-slate-100 hover:shadow-lg duration-200 rounded-lg overflow-hidden">
    <a href="{{route('home')}}">
        <div>
            <img class="w-full h-[230px]" src="{{asset(Storage::url($shop_profile->photo))}}" alt="{{$shop_profile->shop_name}}">
        </div>
        <div>
            <h3 class="font-bold">{{$shop_profile->shop_name}}</h3>
            <h3>{{$shop_profile->address}}</h3>
        </div>
    </a>
</div>
