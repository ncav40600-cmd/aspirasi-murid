<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Aspirasi - Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .header h1 {
            color: #333;
            font-size: 24px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-logout {
            background: #e74c3c;
        }
        .content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        .table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #555;
        }
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-baru { background: #fee; color: #c33; }
        .badge-diproses { background: #e3f2fd; color: #1976d2; }
        .badge-selesai { background: #e8f5e9; color: #2e7d32; }
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Daftar Semua Aspirasi</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn">← Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Siswa</th>
                        <th>NIS</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aspirasi as $item)
                        <tr>
                            <td>{{ $item->id_aspirasi }}</td>
                            <td>{{ $item->display_name ?? $item->full_name }}</td>
                            <td>{{ $item->display_nis ?? $item->nis }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ Str::limit($item->keterangan, 30) }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>
                                @if($item->status == 'Baru')
                                    <span class="badge badge-baru">Baru</span>
                                @elseif($item->status == 'Diproses')
                                    <span class="badge badge-diproses">Diproses</span>
                                @else
                                    <span class="badge badge-selesai">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.aspirasi.show', $item->id_aspirasi) }}" 
                                   style="color: #667eea; text-decoration: none;">
                                   Lihat
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>
    </div>
</body>
</html>