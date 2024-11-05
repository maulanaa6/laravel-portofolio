@extends('dashboard.layout')

@section('konten')


    <form action="{{route('skill.update')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">PROGRAMMING LANGGUAGES & TOOLS</label>
            <input
                type="text"
                class="form-control form-control-sm skill"
                name="_language"
                id="judul"
                aria-describedby="helpId"
                placeholder="Programming Language & Tools"
                value="{{get_meta_value('_language')}}"
            />
        </div>
        
        <div class="mb-3">
            <label for="isi" class="form-label">WORKFLOW</label>
            <textarea name="_workflow" id="" cols="" rows="5" class="form-control summernote">
                {{get_meta_value('_workflow')}}
            </textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

@push('child-scripts')
<script>
    $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
                source: [{!! $skill !!}],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
</script>
@endpush