@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('pengaturanHalaman.update') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_Halaman_about">
                    <option value="">-pilih-</option>
                    @foreach ($dataHalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_Halaman_about') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- <div class="form-group row">
            <label class="col-sm-2">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_Halaman_interest">
                    <option value="">-pilih-</option>
                    @foreach ($dataHalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_Halaman_interest') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="form-group row">
            <label class="col-sm-2">Award</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_Halaman_award">
                    <option value="">-pilih-</option>
                    @foreach ($dataHalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_Halaman_award') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection