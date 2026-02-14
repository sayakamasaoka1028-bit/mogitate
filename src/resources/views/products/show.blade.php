@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">商品詳細</h2>

    <div class="row">

        {{-- 左：画像 --}}
        <div class="col-md-5 text-center">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="img-fluid rounded"
                     style="max-height:300px;">
            @endif
        </div>

        {{-- 右：情報 --}}
        <div class="col-md-7">

            <div class="mb-3">
                <label class="form-label">商品名</label>
                <input type="text"
                       class="form-control"
                       value="{{ $product->name }}"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">価格</label>
                <input type="text"
                       class="form-control"
                       value="{{ $product->price }}"
                       readonly>
            </div>
	            <div class="mb-3">
                <label>季節：</label>

               @if($product->seasons->isNotEmpty())
                @foreach ($product->seasons as $season)
                   <span class="badge bg-secondary">
                        {{ $season->name }}
                   </span>
                @endforeach
                @else
                   <span>未設定</span>
                @endif


            </div>



            <div class="mb-3">
                <label class="form-label">商品説明</label>
                <textarea class="form-control"
                          rows="4"
                          readonly>{{ $product->description }}</textarea>
            </div>
         <div class="d-flex align-items-center gap-3 mt-4">

           {{-- 戻る --}}
           <a href="/products" class="btn btn-secondary">
             戻る
           </a>

           {{-- 変更 --}}
           <a href="/products/{{ $product->id }}/edit"
             class="btn btn-warning">
             変更
           </a>

         {{-- 削除 --}}
<form action="/products/{{ $product->id }}/delete"
      method="POST"
      onsubmit="return confirm('本当に削除しますか？');"
      class="m-0">
    @csrf
    <button type="submit"
            class="border-0 bg-transparent text-danger fs-4">
        <i class="bi bi-trash-fill"></i>
    </button>
</form>

</div>


    </div>
</div>

@endsection

