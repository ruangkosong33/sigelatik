@push('css_vendor')

<!-- summernote -->
<link rel="stylesheet" href="{{asset('bk/plugins/summernote/summernote-bs4.min.css')}}">

@endpush

@push('js_vendor')

<!-- Summernote -->
<script src="{{asset('bk/plugins/summernote/summernote-bs4.min.js')}}"></script>

@endpush

@push('script')
<script>
    $('.summernote').summernote({
        fontNames: [''],
        height: 200,
    });

    $('.note-btn-group.note-fontname').remove();
    setTimeout(() => {
        $('.note-btn-group.note-fontname').remove();
    }, 300);
</script>
@endpush
