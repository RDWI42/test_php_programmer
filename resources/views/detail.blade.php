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
                    <h3>Biodata Detail</h3>
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
                <div class="col-md-2">
                    <a href="{{url('/biodata',['id'=>Auth::user()->id])}}" class="btn btn-warning">Kembali</a>
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
                <input type="text" class="form-control" id="posisi" name="posisi" value="{{$data->posisi}}">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
            </div>

            <div class="form-group">
                <label for="no_ktp">No. KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{$data->no_ktp}}">
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir & Tanggal Lahir</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{$data->tempat_lahir}}">
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" id="tgllahir" name="tgllahir"
                            value="{{$data->tgllahir}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk" value="{{$data->jk}}">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" value="{{$data->agama}}">
            </div>

            <div class="form-group">
                <label for="gd">Golongan Darah</label>
                <input type="text" class="form-control" id="gd" name="gd" value="{{$data->gd}}">
            </div>

            <div class="form-group">
                <label for="alamat_ktp">Alamat KTP</label>
                <textarea class="form-control" id="alamat_ktp" name="alamat_ktp">{{$data->alamat_ktp}}</textarea>
            </div>

            <div class="form-group">
                <label for="alamat_tinggal">Alamat Tinggal</label>
                <textarea class="form-control" id="alamat_tinggal"
                    name="alamat_tinggal">{{$data->alamat_tinggal}}</textarea>
            </div>

            <div class="form-group">
                <label for="no_tlp">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{$data->no_tlp}}">
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Pendidikan Terakhir</h4>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" id="tambah-pendidikan" style="float: right">Tambah</button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenjang">Jenjang Pendidikan</label>
                        <input type="text" class="form-control" id="jenjang" name="jenjang">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="institusi">Institusi</label>
                        <input type="text" class="form-control" id="institusi" name="institusi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ipk">IPK</label>
                        <input type="number" class="form-control" id="ipk" name="ipk" maxlength="3">
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Jenjang Pendidikan</th>
                            <th>Institusi</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-pendidikan">
                        <!-- Data Pendidikan akan ditampilkan di sini -->
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Riwayat Pelatihan</h4>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" id="tambah-riwayat" style="float: right">Tambah</button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_kursus">Nama Kursus / Seminar</label>
                        <input type="text" class="form-control" id="nama_kursus" name="nama_kursus">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sertifikat">Sertifikat</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sertifikat" name="sertifikat">
                            <label class="custom-control-label" for="sertifikat">Sertifikat</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun">
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Kursus / Seminar</th>
                            <th>Sertifikat</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-riwayat">
                        <!-- Data riwayat akan ditampilkan di sini -->
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Riwayat Pekerjaan</h4>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" id="tambah-pekerjaan" style="float: right">Tambah</button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                    </div>

                    <div class="form-group">
                        <label for="posisi_riwayat">Posisi</label>
                        <input type="text" class="form-control" id="posisi_riwayat" name="posisi_riwayat">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pendapatan">Pendapatan</label>
                        <input type="number" class="form-control" id="pendapatan" name="pendapatan">
                    </div>

                    <div class="form-group">
                        <label for="tahun_pekerjaan">Tahun</label>
                        <input type="number" class="form-control" id="tahun_pekerjaan" name="tahun_pekerjaan">
                    </div>
                </div>

            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Posisi</th>
                            <th>Pendapatan</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-pekerjaan">
                        <!-- Data pekerjaan akan ditampilkan di sini -->
                    </tbody>
                </table>
            </div>
            <hr>


            <div class="form-group">
                <label for="skill">Skill</label>
                <textarea class="form-control" name="skill" id="skill">{{$data->skill}}</textarea>
            </div>

            <div class="form-group">
                <label for="bersedia_diluar_kota">Bersedia Diluar Kota</label>
                <input type="checkbox" id="bersedia_diluar_kota" name="bersedia_diluar_kota" value="1"
                    value="{{$data->bersedia_diluar_kota}}">
            </div>

            <div class="form-group">
                <label for="gaji">Gaji yang di harapkan</label>
                <input type="number" class="form-control" id="gaji" name="gaji" value="{{$data->gaji}}">
            </div>

            <button id="saveAll" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    let riwayatPendidikan = [];
    let riwayatPelatihan = [];
    let riwayatPekerjaan = [];

    getAllarray()

    function tambahDataKeTabel(data, tabel) {
        let row = ''
        if(tabel == 'pendidikan'){
            row = `<tr>
                        <td>${data.jenjang }</td>
                        <td>${data.institusi}</td>
                        <td>${data.jurusan}</td>
                        <td>${data.tahun_lulus}</td>
                        <td>${data.ipk}</td>
                        <td><button class="btn btn-danger btn-hapus" data-table="pendidikan" data-id="${data.del_id || ''}">Hapus</button></td>
                    </tr>`;
        }
        if(tabel == 'riwayat'){
            row = `<tr>
                        <td>${data.nama_kursus}</td>
                        <td>${(data.sertifikat ? 'Ya' : 'Tidak')}</td>
                        <td>${data.tahun}</td>
                        <td><button class="btn btn-danger btn-hapus" data-table="riwayat" data-id="${data.del_id || ''}">Hapus</button></td>
                    </tr>`;
        }
        if(tabel == 'pekerjaan'){
            row = `<tr>
                        <td>${data.nama_perusahaan}</td>
                        <td>${data.posisi}</td>
                        <td>${data.pendapatan}</td>
                        <td>${data.tahun}</td>
                        <td><button class="btn btn-danger btn-hapus" data-table="pekerjaan" data-id="${data.del_id || ''}">Hapus</button></td>
                    </tr>`;
        }
        $(`#table-${tabel}`).append(row);
    }

    function resetInput(tabel) {
        if(tabel == 'pendidikan'){
            $('#jenjang').val(null);
            $('#institusi').val(null);
            $('#jurusan').val(null);
            $('#tahun_lulus').val(null);
            $('#ipk').val(null);
        }
        if(tabel == 'riwayat'){
            $('#nama_kursus').val(null);
            $('#sertifikat').prop('checked', false);
            $('#tahun').val(null);
        }
        if(tabel == 'pekerjaan'){
            $('#nama_perusahaan').val(null);
            $('#posisi_riwayat').val(null);
            $('#pendapatan').val(null);
            $('#tahun_pekerjaan').val(null);
        }
    }

    $('#tambah-pendidikan').click(function () {
        let jenjang = $('#jenjang').val();
        let institusi = $('#institusi').val();
        let jurusan = $('#jurusan').val();
        let tahun_lulus = $('#tahun_lulus').val();
        let ipk = $('#ipk').val();

        if (jenjang && institusi && jurusan && tahun_lulus && ipk) {
            let pendidikan = {
                del_id: riwayatPendidikan.length + 1,
                jenjang: jenjang,
                institusi: institusi,
                jurusan: jurusan,
                tahun_lulus: tahun_lulus,
                ipk: ipk
            };
            riwayatPendidikan.push(pendidikan);
            tambahDataKeTabel(pendidikan, 'pendidikan');

            resetInput('pendidikan');
        } else {
            alert('Semua kolom input harus diisi.');
        }
    });

    $('#tambah-riwayat').click(function () {
        let nama_kursus = $('#nama_kursus').val();
        let sertifikat = $('#sertifikat').is(':checked');
        let tahun = $('#tahun').val();

        if (nama_kursus && tahun) {
            let pelatihan = {
                del_id: riwayatPelatihan.length + 1,
                nama_kursus: nama_kursus,
                sertifikat: sertifikat,
                tahun: tahun
            };

            riwayatPelatihan.push(pelatihan);
            tambahDataKeTabel(pelatihan, 'riwayat');

            resetInput('riwayat');
        } else {
            alert('Semua kolom input harus diisi.');
        }
    });

    $('#tambah-pekerjaan').click(function () {
        let nama_perusahaan = $('#nama_perusahaan').val();
        let posisi = $('#posisi_riwayat').val();
        let pendapatan = $('#pendapatan').val();
        let tahun = $('#tahun_pekerjaan').val();

        if (nama_perusahaan && posisi && pendapatan && tahun) {
            let pekerjaan = {
                del_id: riwayatPekerjaan.length + 1,
                nama_perusahaan: nama_perusahaan,
                posisi: posisi,
                pendapatan: pendapatan,
                tahun: tahun
            };

            riwayatPekerjaan.push(pekerjaan);
            tambahDataKeTabel(pekerjaan, 'pekerjaan');

            resetInput('pekerjaan');
        } else {
            alert('Semua kolom input harus diisi.');
        }
    });

    $('body').on('click', '.btn-hapus', function () {
        let id = $(this).data('id');
        let tabel = $(this).data('tabel');

        // Hapus data dari array
        if (tabel === 'pendidikan') {
            riwayatPendidikan = riwayatPendidikan.filter(function (pendidikan) {
                return pendidikan.del_id !== id;
            });
        } else if (tabel === 'riwayat') {
            riwayatPelatihan = riwayatPelatihan.filter(function (pelatihan) {
                return pelatihan.del_id !== id;
            });
        } else if (tabel === 'pekerjaan') {
            riwayatPekerjaan = riwayatPekerjaan.filter(function (pekerjaan) {
                return pekerjaan.del_id !== id;
            });
        }

        $(this).closest('tr').remove();
    });

    function getAllarray(){
        const userId = window.location.pathname.split('/').pop();
        $.ajax({
            url: `/get3Array/${userId}`,
            type: "get",
            cache: false,
            success:function(response){
                riwayatPendidikan = response.pendidikan
                if(riwayatPendidikan.length != 0){
                    riwayatPendidikan.forEach((e,idx) => {
                        e.del_id = idx+1
                        tambahDataKeTabel(e, 'pendidikan');
                    });
                }
                riwayatPelatihan = response.pelatihan
                if(riwayatPelatihan.length != 0){
                    riwayatPelatihan.forEach((e,idx) => {
                        e.del_id = idx+1
                        tambahDataKeTabel(e, 'riwayat');
                    });
                }
                riwayatPekerjaan = response.pekerjaan
                if(riwayatPekerjaan.length != 0){
                    riwayatPekerjaan.forEach((e,idx) => {
                        e.del_id = idx+1
                        tambahDataKeTabel(e, 'pekerjaan');
                    });
                }
            },
            error:function(error){
                alert('error :'+error.responseJSON)
            }

        });
    }

    $('#saveAll').click(function(e){
        e.preventDefault();
        let id = $('#id_data').val();
        let token = $("meta[name='csrf-token']").attr("content");
        let data = {
            posisi: $('#posisi').val(),
            nama: $('#nama').val(),
            email: $('#email').val(),
            no_ktp: $('#no_ktp').val(),
            tempat_lahir: $('#tempat_lahir').val(),
            tgllahir: $('#tgllahir').val(),
            jk: $('#jk').val(),
            agama: $('#agama').val(),
            gd: $('#gd').val(),
            alamat_ktp: $('#alamat_ktp').val(),
            alamat_tinggal: $('#alamat_tinggal').val(),
            no_tlp: $('#no_tlp').val(),
            skill: $('#skill').val(),
            bersedia_diluar_kota: $('#bersedia_diluar_kota').is(':checked') ? '1' : '0',
            gaji: $('#gaji').val(),
        }

        $.ajax({

            url: `/EditUser/${id}`,
            type: "put",
            cache: false,
            data: {
                "id": id,
                "data": data,
                "riwayatPendidikan" : riwayatPendidikan,
                "riwayatPelatihan" : riwayatPelatihan,
                "riwayatPekerjaan" : riwayatPekerjaan,
                "_token": token
            },
            success:function(response){
                if(response.success){
                    alert('Data Berhasil Di update')
                }else{
                    alert('Data Gagal Di update')
                }
            },
            error:function(error){
                alert('error :'+error.responseJSON)
            }

        });
    })

});

</script>