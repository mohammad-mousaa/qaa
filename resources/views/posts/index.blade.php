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

        {{-- الرسائل القادمة من الكونترولر كنجاح بلأخضر --}}
        @if ($msg = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show my-3">
                {{ $msg }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- الرسائل القادمة من الكونترولر كنجاح بلأحمر --}}
        @if ($msg = Session::get('success-delete'))
            <div class="alert alert-danger alert-dismissible fade show my-3">
                {{ $msg }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <h4 class="d-inline">All Posts</h4>
        <a href="{{ route('posts.create') }}" class="btn btn-success float-end"> Create Post</a>

        @php
            $i = 0;
        @endphp

        {{-- التحقق ان كان هنالك بوستات ام لا --}}
        @if ($posts->count() > 0)
            <table class="table table-hover mt-3">
                <thead class="table-dark">
                    <tr>

                        <th scope="col">Number</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td> {{ $item->title }}</td>
                            <td> {{ $item->created_at->diffForhumans() }}</td>
                            {{-- title  تمثل اسم العمود في قاعدة البيانات --}}

                            <td class=" justify-content-between">

                                <a href="{{ route('posts.show', $item->id) }}"
                                    class="col d-inline-block mx-3 btn btn-success">Show</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-danger alert-dismissible fade show mt-3">
                No post in Database
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
@endsection
