<!DOCTYPE html>
<html>

<head>

    <title>Laporan Absensi</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,
        th,
        td{
            border:1px solid black;
        }

        th,
        td{
            padding:8px;
            text-align:left;
        }

        h2{
            text-align:center;
        }

    </style>

</head>

<body>

<h2>

LAPORAN ABSENSI MAHASASISWA

</h2>

<table>

<thead>

<tr>

<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Kelas</th>
<th>Tanggal</th>
<th>Jam</th>
<th>Status</th>

</tr>

</thead>

<tbody>

@foreach($absensi as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->mahasiswa->nim }}</td>

<td>{{ $item->mahasiswa->nama }}</td>

<td>{{ $item->mahasiswa->kelas->nama }}</td>

<td>{{ $item->tanggal }}</td>

<td>{{ $item->jam }}</td>

<td>{{ ucfirst($item->status) }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>