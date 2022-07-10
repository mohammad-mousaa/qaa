@extends('layouts.app')
@section('content')
    <div class="container mt-5">

        {{-- لمعرفة الايرور الموجودة في صفحتتي --}}
        @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <div class="container">
                    <div class="alert alert-danger">
                        {{ $item }}
                    </div>
                </div>
            @endforeach
        @endif

        <h4>
            Create Post
        </h4>
        <form class="row g-3 needs-validation" novalidate action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Discriptions</label>
                <textarea type="text" name="description" class="form-control" style="min-height: 200px" id="validationCustom02"
                    required></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
@endsection
