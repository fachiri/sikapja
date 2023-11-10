<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Registrasi Kartu Pencari Kerja</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<style>
			* {
				font-size: 11px;
			}

			.table th, .table td {
				border: 1px solid black;
				text-align: center;
			}

			.table th {
				vertical-align: middle;
			}
		</style>
	</head>

	<body>
		<div class="text-center">
			<h5>REGISTRASI KARTU PENCARI KERJA AK1</h5>
			<h5></h5>
		</div>
		<table class="table">
			<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2">TANGGAL PENDAFTARAN</th>
				<th rowspan="2">NOMOR PENDAFTARAN</th>
				<th rowspan="2">NOMOR INDUK KEPENDUDUKAN</th>
				<th rowspan="2">NAMA PEMOHON</th>
				<th rowspan="2">TEMPAT, TANGGAL LAHIR</th>
				<th rowspan="2">UMUR</th>
				<th rowspan="2">JENIS KELAMIN</th>
				<th rowspan="2">STATUS</th>
				<th colspan="2">ALAMAT</th>
				<th rowspan="2">PENDIDIKAN</th>
				<th rowspan="2">TAHUN LULUS</th>
				<th rowspan="2">LAMA LULUS PENDIDIKAN</th>
				<th rowspan="2">NO. TELPON / HP</th>
				<th rowspan="2">LOWONGAN</th>
			</tr>
			<tr>
				<th>DESA / KELURAHAN</th>
				<th>KECAMATAN</th>	
			</tr>
			@foreach ($surat as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->created_at }}</td>
					<td>{{ $item->no_pendaftar }}</td>
					<td>{{ $item->nik }}</td>
					<td>{{ $item->nama_lengkap }}</td>
					<td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
					<td></td>
					<td>{{ $item->jenis_kelamin }}</td>
					<td>{{ $item->status }}</td>
					<td>{{ $item->kel }}</td>
					<td>{{ $item->kec }}</td>
					<td>{{ $item->pendidikan }}</td>
					<td>{{ $item->tahun_lulus }}</td>
					<td></td>
					<td>{{ $item->telp }}</td>
					<td></td>
				</tr>
			@endforeach
		</table>
	</body>

</html>
