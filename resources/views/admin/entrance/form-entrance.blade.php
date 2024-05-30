<x-modal size="modal-xl">

    <x-slot name="title">
        Tambah Permohonan Tiket
    </x-slot>

    @method('post')

    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Tiket">
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($category as $categorys)
                    <option value={{$categorys->id}}>{{$categorys->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="priority_id">Prioritas</label>
                <select name="priority_id" id="priority_id" class="form-control">
                    <option disabled selected>Pilih Prioritas</option>
                    @foreach ($priority as $prioritys)
                    <option value={{$prioritys->id}}>{{$prioritys->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="date">Tanggal Permohonan</label>
                <div class="input-group datepicker" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->role == 'admin')
        <div class="col-lg-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                    <option disabled selected>Pilih salah satu</option>
                    <option value="approved">Approved</option>
                    <option value="progress">Progress</option>
                </select>
            </div>
        </div>
        @endif

        <div class="col-lg-6">
            <div class="form-group">
                <label for="file">File Surat</label>
                <input type="file" name="file" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea name="description" class="summernote"></textarea>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
