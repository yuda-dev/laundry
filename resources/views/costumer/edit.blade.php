<div class="modal fade" id="editmodal">
    
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
                <form role="form" method="post" action="{{url('paket/add')}}" id="editform">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control"  name="nama" id="nama" placeholder="Nama" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kode Pesanan</label>
                            <input type="text" class="form-control"  name="kode" id="kode" placeholder="Kode Transaksi" readonly>
                        </div>
                        <div class="form-group">
                            <label>ID Member</label>
                            <input type="text" class="form-control"  name="id_member" id="id_member" placeholder="ID Member" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control"  name="email" id="email" placeholder="E-mail" readonly>
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="number" class="form-control"  name="no_hp" id="no_hp" placeholder="No Hp" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" rows="5" readonly>

                            </textarea>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
