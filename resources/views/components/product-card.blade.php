@props(["product"])
<div class="relative border border-gray-400 rounded-lg p-4 m-4 bg-slate-100 hover:shadow-lg duration:200 overflow-hidden">
    <img class="h-[200px] w-full object-cover" src="{{asset(Storage::url($product->images[0]))}}" alt="{{$product->name}}">
  @if ($product->discount > 0)
        <p class="bg-red-600 px-2 text-white w-fit absolute top-2 right-2">
             Dis. {{$product->discount}}%
        </p>
  @endif
    <div>
        <h3 class="font-bold">{{$product->name}}</h3>
    <p>
        Price: <span class="text-xl">Rs. {{$product->price}}</span>
    </p>
    <a href ="{{route('product',$product->id)}}" class="primary underline">View Details</a>
    </div>
</div>
