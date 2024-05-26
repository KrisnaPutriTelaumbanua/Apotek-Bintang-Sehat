<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Posisi</th>
        <th>Tanggal Mulai</th>
    </tr>
    </thead>
    <tbody>
    @php
        $i =1;
    @endphp
    @foreach($rows as $karyawan)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$karyawan->nama}}</td>
            <td>{{$karyawan->email}}</td>
            <td>{{$karyawan->posisi}}</td>
            <td>{{$karyawan->tanggal_mulai}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

