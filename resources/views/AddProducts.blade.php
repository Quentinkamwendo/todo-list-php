@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{route('product')}}" method="post" enctype="multipart/form-data">
        @if(session()->has('success'))
            <div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-48 py-3">
                <p>{{session('success')}}</p>
            </div>
        @endif
        @csrf
        <div>
            <label for="product">Product Name</label>
            <input type="text" name="product_name" id="product" class="form-control">
        </div>
        <div class="mt-3">
            <label for="number_of_products">Number of Products</label>
            <input type="number" name="number_of_products" id="number_of_products" class="form-control">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control mb-2">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="border border-gray-200 rounded p-2 w-full" >
        </div>
        <button type="submit" class="rounded bg-purple-700 text-white hover:bg-indigo-600 w-1/12 h-10">
            Submit</button>
    </form>
</div>
@endsection
