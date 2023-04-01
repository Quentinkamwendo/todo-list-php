@extends('layouts.app')

@section('content')

    <div class="border container">
        <form method="post" action="/product/{{$product->id}}/edit" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="product">Product Name</label>
                <input type="text" name="product_name" id="product" class="form-control" value="{{$product->product_name}}">
            </div>
            <div>
                <label for="number_of_products">Number of Products</label>
                <input type="number" name="number_of_products" id="number_of_products" class="form-control" value="{{$product->number_of_products}}">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control mb-2" value="{{$product->price}}">
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="border border-gray-200 rounded p-2 w-full"
                       value="{{$product->image}}" >
            </div>
            <button type="submit" class="rounded bg-purple-700 text-white hover:bg-indigo-600 w-1/12 h-10">
                Submit</button>
        </form>
    </div>
@endsection
