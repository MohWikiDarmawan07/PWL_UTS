@extends('barangs.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Barang
            </div>
            <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form method="post" action="{{ route('barang.update', $Barang->id_barang) }}" id="myForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_barang">id_barang</label>
            <input type="id_barang" name="id_barang" class="form-control" id="id_barang" aria-describedby="id_barang" value="{{$Barang->id_barang}}">
        </div>
        <div class="form-group">
            <label for="kode_barang">kode_barang</label>
            <input type="kode_barang" name="kode_barang" class="form-control" id="kode_barang" aria-describedby="kode_barang" value="{{$Barang->kode_barang}}" >
        </div>
        <div class="form-group">
            <label for="nama_barang">nama_barang</label>
            <input type="nama_barang" name="nama_barang" class="form-control" id="nama_barang" aria-describedby="nama_barang" value="{{$Barang->nama_barang}}">
        </div>
        <div class="form-group">
            <label for="kategori_barang">kategori_barang</label>
            <input type="kategori_barang" name="kategori_barang" class="form-control" id="kategori_barang" aria-describedby="kategori_barang" value="{{$Barang->kategori_barang}}">
        </div>
        <div class="form-group">
            <label for="harga">harga</label>
            <input type="harga" name="harga" class="form-control" id="harga" aria-describedby="harga" value="{{$Barang->harga}}">
        </div>
        <div class="form-group">
            <label for="qty">qty</label>
            <input type="qty" name="qty" class="form-control" id="qty" aria-describedby="qty" value="{{$Barang->qty}}">
        </div> 
        <button type="submit" class="btn btn-primary">Submit</button>        </form>
    </div>
    </div>
    </div>
</div>
@endsection