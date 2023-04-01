@extends('layouts.app');

@section('content')
<div class="container">
    <div class="flex items-center h-12 bg-green-500 shadow-lg shadow-sky-700 rounded-3xl hover:bg-green-700 text-white w-24 mb-2">
        <a href="{{route('create')}}" class="btn text-white inline-flex font-semibold">
            New Product
            <span class="w-full resize-y text-2xl">&plus;</span>
        </a>
    </div>
    <a href="{{route('home')}}" class="text-sky-400 font-bold m-auto my-auto">Home</a>

    @if(session()->has('success'))
        <div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-48 py-3 toast-container">
            <p>{{session('success')}}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">


        @foreach($products as $product)
        <div class="card m-2">
            <div class="card-header">
                <h2 class="text-2xl text-green-500">
                    <a href="{{route('show', $product->id)}}">{{$product->product_name}}</a>
                </h2>
            </div>
            <div class="card-body">
                <strong>{{$product->number_of_products}}</strong>
                <img src="{{$product->image ? asset('storage/' . $product->image) : ''}} ">
                <h5>{{$product->price}}</h5>
            </div>
            <div class="flex inline-flex m-auto">
{{--  {{route('product.update', $product->id)}}              --}}
                <a href="{{route('edit', $product->id)}}"
                   class="block italic text-green-500 border-b-2 border-green-400">Edit</a>

                <form method="post" action="/product/{{$product->id}}">

                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 font-semibold hover:text-red-700">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    {{$products->links()}}
</div>
@endsection
