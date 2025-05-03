<nav class="container flex justify-between items-center py-2 ">
    <div>
        <img class="h-[50px]" src="https://codeit.com.np/storage/01JJ6HWH8RP35HYNCEBFXVYZKF.png" alt="logo">
    </div>
    <div>
        <form action="{{route('compare')}}" method="get" class="bg-slate-300 rounded-lg">
            <input class="w-[300px] border border-gray-400 px-4 py-2 rounded-lg" type="text" name="q" id="">
            <button class ="text-green-800 font-bold py-[6px] px-4 rounded-lg cursor-pointer">Compare</button>
        </form>
    </div>
    <div class="flex gap-2 items-center">
       @if (!Auth::user())
             <a href="{{route('register')}}" class="btn-primary">SignUp</a>
            <a href="{{route('login')}}" class="btn-secondary">Login</a>

        @else

             <form action="{{route('logout')}}  " method="post">
                  @csrf
                 <button class="bg-red-600 text-white px-2 py-1 rounded-lg">Logout</button>

             </form>
       @endif
    </div>
</nav>
