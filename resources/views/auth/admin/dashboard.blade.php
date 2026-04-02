<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Aspirasi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }
        .stat-card.baru { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); }
        .stat-card.diproses { background: linear-gradient(135deg, #48dbfb 0%, #1e90ff 100%); }
        .stat-card.selesai { background: linear-gradient(135deg, #1dd1a1 0%, #10ac84 100%); }
        .stat-card .number { font-size: 36px; font-weight: bold; margin-bottom: 10px; }
        .stat-card .label { font-size: 14px; opacity: 0.9; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background: #f8f9fa;
            font-weight: 600;
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
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>👨‍💼 Dashboard Admin</h1>
            <div>
                <span style="color: #666;">{{ session('full_name') }}</span>
                <a href="{{ route('logout') }}" class="btn" style="margin-left: 10px; display: inline-block;">Logout</a>
            </div>
        </div>

        @if(session('success'))
            <div style="background: #e8f5e9; color: #2e7d32; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Statistik -->
        <div class="stats">
            <div class="stat-card">
                <div class="number">{{ $total_aspirasi }}</div>
                <div class="label">Total Aspirasi</div>
            </div>
            <div class="stat-card baru">
                <div class="number">{{ $baru }}</div>
                <div class="label">Baru</div>
            </div>
            <div class="stat-card diproses">
                <div class="number">{{ $diproses }}</div>
                <div class="label">Diproses</div>
            </div>
            <div class="stat-card selesai">
                <div class="number">{{ $selesai }}</div>
                <div class="label">Selesai</div>
            </div>
        </div>

        <!-- Aspirasi Terbaru -->
        <h2 style="margin-bottom: 20px; color: #333;">📊 Aspirasi Terbaru</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aspirasi_terbaru as $item)
                    <tr>
                        <td>{{ $item->id_aspirasi }}</td>
                        <td>{{ $item->display_name ?? $item->full_name }}</td>
                        <td>{{ $item->display_nis ?? $item->nis }}</td>
                        <td>{{ $item->nama_kategori }}</td>
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
                            <a href="{{ route('admin.aspirasi.show', $item->id_aspirasi) }}" style="color: #667eea;">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            <a href="{{ route('admin.aspirasi.index') }}" class="btn">Lihat Semua Aspirasi</a>
        </div>
    </div>
</body>
</html>