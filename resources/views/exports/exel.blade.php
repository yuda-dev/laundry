<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Paket</th>
        <th>Jlaundry</th>
        <th>SPaket</th>
        <th>SPes</th>
        <th>Spemb</th>
        <th>Berat</th>
        <th>GrandTot</th>
        <th>tg.trans</th>
        <th>tg.sels</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach($exel as $key=>$dt)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{str_limit($dt->costumer->kode,'5')}}</td>
        <td>{{$dt->costumer->nama}}</td>
        <td>{{str_limit($dt->paket->nama,'5')}}</td>
        <td>{{str_limit($dt->jlaundry->nama,'5')}}</td>
        <td>{{$dt->status_paket->nama}}</td>
        <td>{{str_limit($dt->status_pesanan->status,'5')}}</td>
        <td>{{$dt->status_pembayaran->status}}</td>
        <td>{{$dt->berat}}</td>
        <td>{{$dt->total}}</td>
        <td>{{date('d F Y', strtotime($dt->created_at))}}</td>
        <td>{{date('d F Y', strtotime($dt->updated_at))}}</td>
    </tr>
    @endforeach
    </tbody>
</table>