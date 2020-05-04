@extends('layout')
@section('dashboard-content')
    <h1> Create product form</h1>

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('post-post-form') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Post title </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter post title" name="title">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Post Detail </label>
            <textarea name="details" id="editor1"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Select product category </label>
            <select class="form-control" name="subcategory_id">
                <option> Select </option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

   
@stop
