@extends('layouts.app');

@section('content')
    <div class="container">

        <a href="{{route('home')}}" class="text-sky-400 font-bold m-auto my-auto">Home</a>


        <div class="min-h-fit">
            <select name="status" id="status">
                <option value="in progress">in progress</option>
                <option value="completed">done</option>
            </select>

            <h2 class="text-2xl font-bold text-green-500 bg-purple-300 p-2 mb-3">
                {{$product->product_name}}
            </h2>
            <p>Number of products is <strong>{{$product->number_of_products}}</strong></p>
            <img src="{{$product->image ? asset('storage/' . $product->image) : ''}} " class="w-full h-min mt-3">
            <h5 class="mt-3 mb-3">{{$product->price}}</h5>

        </div>
        <a href="{{route('product')}}" class="font-bold text-teal-700 mt-5">Back</a>
    </div>
@endsection

