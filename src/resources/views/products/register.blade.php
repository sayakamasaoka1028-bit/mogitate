@extends('layouts.app')

@section('title', '商品登録')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm mt-4">
                <div class="card-body px-4 py-5">

                    <h4 class="text-center mb-4">商品登録</h4>

                    <form action="/products/register" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- 商品名 --}}
                        <div class="mb-3">
                            <label class="form-label">
                                商品名 <span class="badge bg-danger">必須</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 価格 --}}
                        <div class="mb-3">
                            <label class="form-label">
                                価格 <span class="badge bg-danger">必須</span>
                            </label>
                            <input type="number"
                                   name="price"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ old('price') }}">

                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 商品画像 --}}
                        <div class="mb-3">
                            <label class="form-label">
                                商品画像 <span class="badge bg-danger">必須</span>
                            </label>
                            <input type="file"
                                   name="image"
                                   class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
			<div class="mb-3">
    			<label class="form-label">季節 <span class="text-danger">必須</span></label>
	 @foreach($seasons as $season)
   		        <div class="form-check form-check-inline">
                        <input class="form-check-input"
                          type="checkbox"
                          name="seasons[]"
                          value="{{ $season->id }}"
                      {{ old('season') == $season->id ? 'checked' : '' }}>
              <label class="form-check-label">
            {{ $season->name }}
        </label>
    </div>
@endforeach


    @error('seasons')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

                        {{-- 商品説明 --}}
                        <div class="mb-4">
                            <label class="form-label">
                                商品説明 <span class="badge bg-danger">必須</span>
                            </label>
                            <textarea name="description"
                                      rows="4"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ボタン --}}
                        <div class="d-flex justify-content-center gap-3">
                            <a href="/products" class="btn btn-light px-4 shadow-sm">
                                戻る
                            </a>

                            <button type="submit" class="btn btn-warning px-4 shadow-sm">
                                登録
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection

