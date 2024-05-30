<x-modal size="modal-md">

    <x-slot name="title">
        Tambah Link Thumbnail
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

    <div class="form-group">
        <label for="image">Gambar</label>
        <input type="file" class="form-control" id="image" name="image"
        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">

    </div>

    <div class="mt-3"><img src="" id="output" width="150"></div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" placeholder="URL">
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
