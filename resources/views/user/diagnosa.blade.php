@extends('layouts-user.main')
@section('konten')
<div class="container mt-5">
    <h1 class="text-center mb-4">Diagnosa Gejala</h1>
    <form action="{{ route('diagnosa.hasil') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Nama Gejala</th>
                            <th scope="col">Pilih</th>
                            <th scope="col">Tingkat Keyakinan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gejala as $gejala)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gejala->nama_gejala }}</td>
                            <td>
                                <input type="checkbox" name="gejala_ids[]" value="{{ $gejala->id }}" id="gejala_ids{{ $gejala->id }}">
                            </td>
                            <td>
                                <select name="cf_user[{{ $gejala->id }}]" class="form-select" disabled>
                                    <option value="">Pilih tingkat keyakinan</option>
                                    <option value="0">Tidak Yakin (0)</option>
                                    <option value="0.2">Kurang Yakin (0.2)</option>
                                    <option value="0.4">Cukup Yakin (0.4)</option>
                                    <option value="0.6">Yakin (0.6)</option>
                                    <option value="0.8">Sangat Yakin (0.8)</option>
                                    <option value="1">Pasti (1)</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary" type="submit">Lanjutkan Diagnosa</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const select = this.closest('tr').querySelector('select');
            select.disabled = !this.checked;
            if (!this.checked) {
                select.value = '';
            }
        });
    });
});
</script>
@endsection