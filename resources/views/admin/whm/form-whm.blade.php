<x-modal size="modal-lg">

    <x-slot name="title">
        Tambah C-Panel
    </x-slot>

    @method('post')


    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Judul">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="domain">Domain</label>
                <textarea name="domain" class="summernote" class="form-control"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ip">IP</label>
                <input type="text" name="ip" id="ip" class="form-control" placeholder="IP Shared">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
