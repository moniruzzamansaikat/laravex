@extends('layouts.front')

@section('content')
<h1>Upload form</h1>

<form action="/upload" method="POST" enctype="mutipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file" class="mb-2">File</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>
</form>

@endsection