<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Posisi</th>
        <th>Tanggal Lahir</th>
        <th>Umur</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rows as $index => $karyawan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $karyawan->name }}</td>
            <td>{{ $karyawan->email }}</td>
            <td>{{ $karyawan->posisi }}</td>
            <td>{{ $karyawan->dob }}</td>
            <td>{{ $karyawan->age }} Tahun</td>
        </tr>
    @endforeach
    </tbody>
</table>
