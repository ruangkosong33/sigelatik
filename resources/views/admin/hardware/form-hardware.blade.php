<x-modal size="modal-lg">

    <x-slot name="title">
        Tambah Perangkat Keras
    </x-slot>

    @method('post')

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Nama Server</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nama Server">
            </div>
        </div>
         <div class="col-lg-6">
            <div class="form-group">
                <label for="utilization">Jenis Penggunaan / Web Server, Mail Server</label>
                <input type="text" name="utilization" id="utilization" class="form-control" placeholder="Jenis Penggunaan">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="manage">Pengelola Server</label>
                <input type="text" name="manage" id="manage" class="form-control" placeholder="Pengelola Server">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="location">Lokasi Server</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Lokasi Server">
            </div>
        </div>
    </div>

    <div class="row">
         <div class="col-lg-6">
            <div class="form-group">
                <label for="application">Aplikasi Terinstall</label>
                <input type="text" name="application" id="application" class="form-control" placeholder="Aplikasi Terinstall">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="specific">Spesifikasi</label>
                <input type="text" name="specific" id="specific" class="form-control" placeholder="Spesifikasi">
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
