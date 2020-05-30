<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$title}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="post" action="{{url('costumer/add')}}">
                    @csrf
                    <div class="card-body">
                    
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control"  name="nama" placeholder="Nama" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Kode Pesanan</label>
                            <input type="text" class="form-control"  name="kode" value="TR-{{ $kode }}" placeholder="Nama" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>ID Member</label>
                            <input type="text" class="form-control"  name="id_member" placeholder="ID Member" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control"  name="email" placeholder="E-mail" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="number" class="form-control"  name="no_hp" placeholder="No Hp">
                        </div>
                        <div class="form-group">
                            <label>Status Paket</label>
                            <select name="status_paket" class="form-control select2">
                                <option>--Pilih--</option>
                                <option value="Jemput"> Jemput</option>
                                <option value="Antar"> Antar Sendiri</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat" rows="5">

                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
