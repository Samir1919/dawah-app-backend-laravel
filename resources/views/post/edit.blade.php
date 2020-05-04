@extends('layout')
@section('dashboard-content')
    <h1> Update product form</h1>

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

    <form action="{{ URL::to('post-post-edit-form') }}/{{ $post->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> post name </label>
            <input type="text" class="form-control" value="{{ $post->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="title" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Post Detail </label>
            <textarea name="details" id="editor1" required> {!! $post->details !!}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Select post Subcategory </label>
            <select class="form-control" name="subcategory_id">
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @if($subcategory->id == $post->subcategory_id) selected @endif> {{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


@stop
