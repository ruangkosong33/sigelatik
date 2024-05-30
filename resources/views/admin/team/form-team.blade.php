<x-modal size="modal-md">

    <x-slot name="title">
        Tambah Prioritas
    </x-slot>

    @method('post')

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
            </div>
        </div>

    </div>

    <div class="form-group">
        <label for="image">Gambar</label>
        <input type="file" class="form-control" id="image" name="image"
        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">

    </div>

    <div class="mt-3"><img src="" id="output" width="150"></div>

    <div class="form-group">
        <label for="testimoni">Testimoni</label>
        <textarea name="testimoni" id="testimoni" class="form-control" placeholder="Testimoni"></textarea>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
