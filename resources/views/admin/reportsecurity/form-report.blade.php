<x-modal size="modal-lg">

    <x-slot name="title">
        Tambah Laporan
    </x-slot>

    @method('post')

    <div class="row">

        <div class="col-lg-12">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Laporan Serangan Keamanan">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="name_opd">Organisasi Perangkat Daerah</label>
                <input type="text" name="name_opd" id="name_opd" class="form-control" placeholder="Nama Organisasi Perangkat Daerah">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label for="body">Deskripsi</label>
                <textarea name="body" class="summernote"></textarea>
            </div>
        </div>

    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
