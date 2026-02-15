@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <h2 class="mb-5 text-center fw-bold">商品登録</h2>
<form action="/products/register" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- 商品名 --}}
            <div class="mb-4">
                <label class="form-label fw-bold">
                    商品名 <span class="badge bg-danger">必須</span>
                </label>

                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}">

                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- 価格 --}}
            <div class="mb-4">
                <label class="form-label fw-bold">
                    価格 <span class="badge bg-danger">必須</span>
                </label>

                <input type="number"
                       name="price"
                       class="form-control @error('price') is-invalid @enderror"
                       value="{{ old('price') }}">

                @error('price')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- 商品画像 --}}
            <div class="mb-4">
                <label class="form-label fw-bold">
                    商品画像 <span class="badge bg-danger">必須</span>
                </label>

                <div class="mb-3">
                    <img id="preview"
                         src="#"
                         style="display:none; max-width:300px; border-radius:10px;">
                </div>

                <input type="file"
                       id="image"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror">

                @error('image')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
{{-- 季節 --}}
<div class="mb-4">
    <label class="form-label fw-bold">
        季節 <span class="badge bg-danger">必須</span>
        <span class="text-danger small ms-2">複数選択可</span>
    </label>

    <div class="d-flex gap-4 mt-2">
        @foreach($seasons as $season)
            <label>
                <input type="checkbox"
                       name="seasons[]"
                       value="{{ $season->id }}"
                       {{ is_array(old('seasons')) && in_array($season->id, old('seasons')) ? 'checked' : '' }}>
                {{ $season->name }}
            </label>
        @endforeach
    </div>

    @error('seasons')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>


                @error('season')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- 商品説明 --}}
            <div class="mb-5">
                <label class="form-label fw-bold">
                    商品説明 <span class="badge bg-danger">必須</span>
                </label>

                <textarea name="description"
                          rows="4"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                @error('description')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- ボタン --}}
            <div class="d-flex justify-content-center gap-4">
                <a href="/products"
                   class="btn btn-secondary px-5 py-2 rounded-3">
                    戻る
                </a>

                <button type="submit"
                        class="btn px-5 py-2 rounded-3"
                        style="background:#f4c430; font-weight:600;">
                    登録
                </button>
            </div>

        </form>

    </div>
</div>

@endsection

