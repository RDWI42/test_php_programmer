@extends('app')

@section('title', 'Home')
<style>
    .boxtable {
        border-radius: 10px;
        box-shadow: 1px 1px 10px 1px;
        position: relative;
        width: 100%;
        background-color: white
    }
</style>
@section('content')
<div class="container mt-5">
    <div class="row boxtable" style="margin:auto; padding:20px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <h3>List User</h3>
                    <h5>Hello, {{ Auth::user()->email }}</h5>
                </div>
                <div class="col-md-2">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" type="submit" style="float: right">
                            Log Out
                        </button>
                    </form>
                </div>
                <div class="col-md-2">
                    <a href="{{url('/biodata',['id'=> Auth::user()->id])}}" class="btn btn-warning">Biodata</a>
                </div>
            </div>
            <hr>
        </div>
        <div class="table-responsive col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat & Tanggal Lahir</th>
                        <th scope="col">Posisi Yang Dilamar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td scope="row">{{ $data->currentPage() > 1 ? ($data->perPage() *
                            ($data->currentPage() - 1) + $loop->iteration) : $loop->iteration }}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->tempat_lahir}} & {{$item->tgllahir}}</td>
                        <td>{{$item->posisi}}</td>
                        <td>
                            <a href="{{url('/detail', ['id' => $item->id])}}" class="btn btn-warning">Edit</a>
                            <form action="/delete" method="POST">
                                @csrf
                                <input id="id" name="id" hidden value="{{$item->id}}">
                                <button type="submit" class="btn btn-success">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                Total Data : {{$data->total()}}
            </div>
            <div class="col-md-12 mt-2">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection