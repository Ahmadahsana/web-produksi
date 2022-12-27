@extends('dashboard.layout.main')

@section('container')
<div class="card">
  <div class="card-header">
    <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
  </div><!-- end card header -->
{{-- @dd($finishing) --}}
  <div class="card-body">
    
    <form action="/edit_jok" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" value="{{ $jok->order_detail_id }}" name="order_detail_id" class="d-none">
      <input type="text" class="d-none" value="{{ $jok->id }}" name="jok_id">
      <div class="row">
        <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Pilih vendor</label>
          <select class="form-select" aria-label="Default select example" name="vendor">
            <option selected disabled>pilih vendor</option>
            @foreach ($vendor as $v)
            <option value="{{ $v->id }}">{{ $v->nama_vendor }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-4 align-self-end">
          <button type="submit" class="btn btn-primary">Proses jok</button>
          <a href="/jok" class="btn btn-danger">Kembali</a>
        </div>
      </div>
    </form>

  </div>
</div>
@endsection