<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Tugas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        a, button {
            display: inline-block;
            padding: 8px 14px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .tambah {
            background: #198754;
            color: white;
            margin-bottom: 20px;
        }

        .edit {
            background: #ffc107;
            color: black;
        }

        .hapus {
            background: #dc3545;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #eee;
        }

        .success {
            background: #d1e7dd;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Daftar Tugas</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tugas.create') }}" class="tambah">
        + Tambah Tugas
    </a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($tugas as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $item->judul }}
                    </td>

                    <td>
                        {{ $item->deskripsi ?? '-' }}
                    </td>

                    <td>
                        {{ $item->status }}
                    </td>

                    <td>

                        <a
                            href="{{ route('tugas.edit', $item->id) }}"
                            class="edit"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('tugas.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus tugas ini?')"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="hapus"
                            >
                                Hapus
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5">
                        Belum ada tugas.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

</div>

</body>
</html>