@extends('app')

@section('title', 'Biodata')
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
                    <h3>Biodata</h3>
                    <h5>Hello, {{ Auth::user()->email }}</h5>
                </div>
                @if(Auth::user()->level == 'user')
                <div class="col-md-2">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" type="submit" style="float: right">
                            Log Out
                        </button>
                    </form>
                </div>
                @endif
                @if(Auth::user()->level == 'admin')
                <div class="col-md-2">
                    <a href="{{url('/home')}}" class="btn btn-warning">Kembali</a>
                </div>
                @endif
            </div>
            <hr>
        </div>
        <div class="col-md-12">
            <input type="hidden" value="{{$data->id}}" id="id_data">
            <div class="form-group">
                <label for="posisi">Posisi Yang Dilamar</label>
                <p>{{$data->posisi}}</p>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <p>{{$data->nama}}</p>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <p>{{$data->email}}</p>
            </div>

            <div class="form-group">
                <label for="no_ktp">No. KTP</label>
                <p>{{$data->no_ktp}}</p>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir & Tanggal Lahir</label>
                <p>{{$data->tempat_lahir}}, {{$data->tgllahir}}</p>
            </div>

            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <p>{{$data->jk}}</p>
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <p>{{$data->agama}}</p>
            </div>

            <div class="form-group">
                <label for="gd">Golongan Darah</label>
                <p>{{$data->gd}}</p>
            </div>

            <div class="form-group">
                <label for="alamat_ktp">Alamat KTP</label>
                <p>{{$data->alamat_ktp}}</p>
            </div>

            <div class="form-group">
                <label for="alamat_tinggal">Alamat Tinggal</label>
                <p>{{$data->alamat_tinggal}}</p>
            </div>

            <div class="form-group">
                <label for="no_tlp">Nomor Telepon</label>
                <p>{{$data->no_tlp}}</p>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Pendidikan Terakhir</h4>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Jenjang Pendidikan</th>
                        <th>Institusi</th>
                        <th>Jurusan</th>
                        <th>Tahun Lulus</th>
                        <th>IPK</th>
                    </tr>
                </thead>
                <tbody id="table-pendidikan">
                    @foreach($pendidikan as $pendidikanData)
                    <tr>
                        <td>{{$pendidikanData->jenjang}}</td>
                        <td>{{$pendidikanData->institusi}}</td>
                        <td>{{$pendidikanData->jurusan}}</td>
                        <td>{{$pendidikanData->tahun_lulus}}</td>
                        <td>{{$pendidikanData->ipk}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Riwayat Pelatihan</h4>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Kursus / Seminar</th>
                        <th>Sertifikat</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody id="table-riwayat">
                    @foreach($pelatihan as $pelatihanData)
                    <tr>
                        <td>{{$pelatihanData->nama_kursus}}</td>
                        <td>{{$pelatihanData->sertifikat ? 'Ya' : 'Tidak'}}</td>
                        <td>{{$pelatihanData->tahun}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Riwayat Pekerjaan</h4>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Posisi</th>
                        <th>Pendapatan</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody id="table-pekerjaan">
                    @foreach($pekerjaan as $pekerjaanData)
                    <tr>
                        <td>{{$pekerjaanData->nama_perusahaan}}</td>
                        <td>{{$pekerjaanData->posisi}}</td>
                        <td>{{$pekerjaanData->pendapatan}}</td>
                        <td>{{$pekerjaanData->tahun}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="form-group">
                <label for="skill">Skill</label>
                <p>{{$data->skill}}</p>
            </div>

            <div class="form-group">
                <label for="bersedia_diluar_kota">Bersedia Diluar Kota</label>
                <p>{{$data->bersedia_diluar_kota ? 'Ya' : 'Tidak'}}</p>
            </div>

            <div class="form-group">
                <label for="gaji">Gaji yang di harapkan</label>
                <p>{{$data->gaji}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{url('/detail',['id'=>Auth::user()->id])}}" class="btn btn-warning">Edit Data</a>
        </div>
    </div>
</div>
@endsection