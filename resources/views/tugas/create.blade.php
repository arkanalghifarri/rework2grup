<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tugas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button, a {
            padding: 9px 15px;
            border-radius: 5px;
            border: none;
            text-decoration: none;
        }

        button {
            background: #198754;
            color: white;
            cursor: pointer;
        }

        a {
            background: #6c757d;
            color: white;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Tugas</h1>

    @if($errors->any())

        <div class="error">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form action="{{ route('tugas.store') }}" method="POST">

        @csrf

        <label>Judul Tugas</label>

        <input
            type="text"
            name="judul"
            value="{{ old('judul') }}"
            placeholder="Masukkan judul tugas"
        >

        <label>Deskripsi</label>

        <textarea
            name="deskripsi"
            rows="5"
            placeholder="Masukkan deskripsi tugas"
        >{{ old('deskripsi') }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="Belum Selesai">
                Belum Selesai
            </option>

            <option value="Sedang Dikerjakan">
                Sedang Dikerjakan
            </option>

            <option value="Selesai">
                Selesai
            </option>

        </select>

        <button type="submit">
            Simpan
        </button>

        <a href="{{ route('tugas.index') }}">
            Kembali
        </a>

    </form>

</div>

</body>
</html>