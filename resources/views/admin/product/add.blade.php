@extends('layouts.admin')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header product-card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body product-card-body">
            <form action ="{{ url('insert-product') }}" method = "POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row_div">
                    <div class="product-field">
                        <select class="form-select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="product-field">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class=product-field>
                        <label for=""> Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="product-field">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="product-field">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class=product-field>
                        <label for=""> Original Price</label>
                        <input type="number" class="form-control"  name="original_price">
                    </div>
                    <div class=product-field>
                        <label for=""> Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <div class=product-field>
                        <label for=""> Tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    <div class=product-field>
                        <label for=""> Quanlity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <div class=product-field>
                        <label for="">Status</label >
                        <input type="checkbox" name="status">
                    </div>
                    <div class=product-field>
                        <label for="">Trending</label >
                        <input type="checkbox" name="trending">
                    </div>

                    <div class="product-field">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="product-field">
                        <label for=""> Meta Keywords </label>
                        <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="product-field">
                        <label for="">Meta Description </label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="input-field">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="btn-submit">
                        <button type="submit " class="cate-btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
