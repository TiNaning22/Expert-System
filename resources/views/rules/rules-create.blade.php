@extends('layouts-dashboard.main')
@section('content')
<form method="POST" action="/rules">
    @csrf
<div class="row">
   <!-- Left Column: Gejala, MB, MD, and Check -->
    <div class="col-md-6">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Gejala</th>
                <th>MB</th>
                <th>MD</th>
                <th>Check</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($gejala as $g)
                <tr>
                    <td>{{ $g->nama_gejala }}</td>
                    <td>
                        <input type="number" step="0.01" class="form-control" id="mb" name="mb[{{ $g->id }}]" value="0">
                    </td>
                    <td>
                        <input type="number" step="0.01" class="form-control" id="md" name="md[{{ $g->id }}]" value="0">
                    </td>
                    <td>
                        <input type="checkbox" name="gejala_ids[]" value="{{ $g->id }}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Right Column: Kerusakan Selection -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="kerusakan" class="form-label">Pilih Kerusakan</label>
            <select id="kerusakan" name="kerusakan_id" class="form-select">
                @foreach ($kerusakan as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kerusakan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Kerusakan</label>
            <textarea id="deskripsi" class="form-control" rows="5" disabled>{{ $kerusakan->first()->deskripsi ?? 'Pilih kerusakan untuk melihat deskripsi.' }}</textarea>
        </div>
    </div>
</div>

<div class="text-end">
    <button type="submit" class="btn btn-primary">Simpan Rule</button>
</div>
</form>
</div>
@endsection