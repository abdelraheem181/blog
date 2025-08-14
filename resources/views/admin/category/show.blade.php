@extends('admin.theme.default')

@section('title')
    عرض قسم
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">عرض قسم</h1>
        <div class="mb-3">
            <label for="name" class="form-label">اسم القسم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">وصف القسم</label>
            <textarea class="form-control" id="description" name="description" rows="3" readonly>{{ $category->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">الرابط الثابت</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" readonly>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">عودة</a>
    </div>
@endsection
