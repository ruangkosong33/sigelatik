@extends('layouts.admin.b-master')

@section('title', 'Sub Layanan')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Layanan</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <button onclick="addForm('{{route('layanan.store')}}')"
                    class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                </x-slot>

                <x-table>
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>

    <!-- Form Modal -->
    @include('admin.layanan.form-layanan')
    <!-- End Form Modal -->

@endsection

    <x-toast />

    @include('include.datatable')
    @include('include.summernote')

    @push('script')
    <script>
        let table;

        $(function(){
            table= $('.table').DataTable({
                processing: true,
                autoWidth: false,
                ajax: { url: '{{route('layanan.datas')}}'},
                columns:
                [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', sortable: false, searchable: false},
                    {data: 'title', name: 'title', sortable: false},
                    {data: 'body', name: 'body', sortable: false},
                    {data: 'action', name: 'action'}
                ]
            });
        });

        $('#modal-form form').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            submitForm(this);
        }});

        function addForm(url, title = 'Tambah')
        {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text(title);
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');

            resetForm('#modal-form form');

            $('.summernote').summernote('code', '');
        }

        function editForm(url, title ='Edit')
        {
            $.get(url)
                .done(response => {

                    $('#modal-form').modal('show');
                    $('#modal-form .modal-title').text(title);
                    $('#modal-form form').attr('action', url);
                    $('#modal-form [name=_method]').val('put');

                    resetForm('#modal-form form');

                    if (response.data.image) {
                        const imagePath = '{{ asset('storage/image-team/') }}/' + response.data.image;
                        $('#output').attr('src', imagePath);
                    }

                    loopForm(response.data);
                })
                .fail(errors => {
                    showAlert('Tidak Dapat Menampilkan Data');
                    return;
                });
        }

        function submitForm(originalForm)
        {
            $.post({
                url: $(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
            })
            .done(response => {
                $('#modal-form').modal('hide');
                showAlert(response.message, 'success');
                table.ajax.reload();
                resetForm(originalForm);
                $('#output').attr('src', '');
            })
            .fail(errors => {
                if(errors.status == 422)
                {
                    loopErrors(errors.responseJSON.errors);
                    return;
                }

                showAlert(errors.responseJSON.message, 'danger');
            });
        }

        function deleteData(url)
        {
            if(confirm('Apakah Yakin Data Di Hapus?'))
            {
                $.post(url,{
                    '_method': 'delete'
                })
                .done(response => {
                    showAlert(response.message, 'success');
                    table.ajax.reload()
                })
                .fail(errors => {
                    showAlert('Tidak Dapat Menghapus Data');
                    return;
                });
            }
        }

        function resetForm(selector)
        {
            $(selector)[0].reset();

            $('.select2').trigger('change');
            $('.form-control, .custom-select, .custom-radio, .custom-checkbox, .select2').removeClass('is-invalid');
            $('.invalid-feedback').remove();
        }

        function loopForm(originalForm)
        {
            for (const field in originalForm)
            {
                if ($(`[name=${field}]`).attr('type') !== 'file')
                {
                    if ($(`[name=${field}]`).hasClass('summernote'))
                    {
                        $(`[name=${field}]`).summernote('code', originalForm[field]);
                    }

                    $(`[name=${field}]`).val(originalForm[field]);
                    $('select').trigger('change');
                }
            }
        }

        function loopErrors(errors)
        {
            $('.invalid-feedback').remove();

            if(errors == undefined)
            {
                return;
            }

            for (error in errors) {
                $('[name="' + error + '"]').addClass('is-invalid');

                if ($('[name="' + error + '"]').hasClass('select2')) {
                    $('<span class="error invalid-feedback">' + errors[error] + '</span>')
                        .insertAfter($('[name="' + error + '"]').next());
                } else if ($('[name="' + error + '"]').hasClass('summernote')) {
                    $('<span class="error invalid-feedback">' + errors[error] + '</span>')
                        .insertAfter($('[name="' + error + '"]').next());
                } else {
                    $('<span class="error invalid-feedback">' + errors[error] + '</span>')
                        .insertAfter($('[name="' + error + '"]'));
                }
            }
        }

        function showAlert(message, type)
        {
            let title = '';
            switch(type)
            {
                case 'success':
                    title='Success';
                    break;
                case 'danger':
                    title="Failed";
                    break;
                default:
                    break;
            }
            $(document).Toasts('create',{
                class: `bg-${type}`,
                title: title,
                body: message,
            });

            setTimeout(() => {
                $('.toasts-top-right').remove();
            }, 3000);
        }
    </script>
    @endpush


