<x-modal size="modal-lg">

    <x-slot name="title">
        Tambah Virtual Private Server
    </x-slot>

    @method('post')

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Judul">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="date">Tanggal</label>
                <div class="input-group datepicker" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="needs">Kebutuhan</label>
                <textarea name="needs" class="summernote" class="form-control"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ip_public">IP Publik</label>
                <input type="text" name="ip_public" class="form-control" placeholder="IP Publik">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="ip_local">IP Lokal</label>
                <input type="text" name="ip_local" class="form-control" placeholder="IP Lokal">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="storage">Storage/GB</label>
                <input type="text" name="storage" class="form-control" placeholder="Storage/GB">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="core">Core</label>
                <input type="text" name="core" class="form-control" placeholder="Core">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" name="ram" class="form-control" placeholder="Ram">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="port">Port Allow</label>
                <input type="text" name="port" class="form-control" placeholder="Port Allow">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="database">Database</label>
                <input type="text" name="database" class="form-control" placeholder="Database">
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
