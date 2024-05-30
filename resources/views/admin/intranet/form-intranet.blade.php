<x-modal size="modal-lg">

    <x-slot name="title">
        Tambah Jaringan Intranet
    </x-slot>

    @method('post')

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Nama Jaringan</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nama Jaringan">
            </div>
        </div>
         <div class="col-lg-6">
            <div class="form-group">
                <label for="instance">Instansi / OPD Yang di Hubungkan</label>
                <input type="text" name="instance" id="instance" class="form-control" placeholder="Instansi OPD Terhubung">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="type">Jenis Jaringan / FO, Metro, Wireless</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="Jenis Jaringan">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="link">Link State</label>
                <input type="text" name="link" id="link" class="form-control" placeholder="Link State">
            </div>
        </div>
    </div>

    <div class="row">
         <div class="col-lg-6">
            <div class="form-group">
                <label for="bandwith">Bandwith/MB</label>
                <input type="text" name="bandwith" id="bandwith" class="form-control" placeholder="Bandwith/MB">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="download">Download/MB</label>
                <input type="text" name="download" id="download" class="form-control" placeholder="Download/MB">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
           <div class="form-group">
               <label for="uploads">Upload/MB</label>
               <input type="text" name="upload" id="upload" class="form-control" placeholder="Upload/MB">
           </div>
       </div>
       <div class="col-lg-6">
           <div class="form-group">
               <label for="manage">Pengelola Jaringan</label>
               <input type="text" name="manage" id="manage" class="form-control" placeholder="Pengelola Jaringan">
           </div>
       </div>
   </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
