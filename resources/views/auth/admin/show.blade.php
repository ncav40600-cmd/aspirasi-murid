<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Aspirasi - Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
        }
        .card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }
        .card-header h1 {
            color: #333;
            font-size: 24px;
        }
        .badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        .badge-baru { background: #fee; color: #c33; }
        .badge-diproses { background: #e3f2fd; color: #1976d2; }
        .badge-selesai { background: #e8f5e9; color: #2e7d32; }
        .detail-group {
            margin-bottom: 25px;
        }
        .detail-group h3 {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .detail-group p {
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }
        .detail-group .info-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-back {
            background: #e0e0e0;
            color: #555;
            text-decoration: none;
            display: inline-block;
        }
        .btn-back:hover {
            background: #d0d0d0;
        }
        .btn-proses {
            background: #1976d2;
            color: white;
        }
        .btn-proses:hover {
            background: #1565c0;
            transform: translateY(-2px);
        }
        .btn-selesai {
            background: #2e7d32;
            color: white;
        }
        .btn-selesai:hover {
            background: #256a29;
            transform: translateY(-2px);
        }
        .form-umpan-balik {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }
        .form-umpan-balik textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            min-height: 100px;
            resize: vertical;
        }
        .form-umpan-balik textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
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
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Info Aspirasi -->
        <div class="card">
            <div class="card-header">
                <h1>📝 Aspirasi #{{ $aspirasi->id_aspirasi }}</h1>
                @if($aspirasi->status == 'Baru')
                    <span class="badge badge-baru">Baru</span>
                @elseif($aspirasi->status == 'Diproses')
                    <span class="badge badge-diproses">Diproses</span>
                @else
                    <span class="badge badge-selesai">Selesai</span>
                @endif
            </div>

            <div class="detail-group">
                <h3>Nama Siswa</h3>
                <p class="info-box">{{ $aspirasi->display_name ?? $aspirasi->full_name }}</p>
            </div>

            <div class="detail-group">
                <h3>NIS</h3>
                <p class="info-box">{{ $aspirasi->display_nis ?? $aspirasi->nis }}</p>
            </div>

            <div class="detail-group">
                <h3>Kelas</h3>
                <p class="info-box">{{ $aspirasi->kelas ?? '-' }}</p>
            </div>

            <div class="detail-group">
                <h3>Kategori</h3>
                <p>{{ $aspirasi->nama_kategori }}</p>
            </div>

            <div class="detail-group">
                <h3>Lokasi</h3>
                <p>{{ $aspirasi->lokasi }}</p>
            </div>

            <div class="detail-group">
                <h3>Keterangan</h3>
                <p>{{ $aspirasi->keterangan }}</p>
            </div>

            @if($aspirasi->umpan_balik)
                <div class="detail-group">
                    <h3>💬 Umpan Balik</h3>
                    <p class="info-box">{{ $aspirasi->umpan_balik }}</p>
                </div>
            @endif

            <div class="btn-group">
                <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-back">← Kembali</a>
                
                @if($aspirasi->status == 'Baru')
                    <form action="{{ route('admin.aspirasi.proses', $aspirasi->id_aspirasi) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-proses">🔄 Proses</button>
                    </form>
                @endif

                @if($aspirasi->status == 'Diproses')
                    <form action="{{ route('admin.aspirasi.selesai', $aspirasi->id_aspirasi) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-selesai">✅ Selesai</button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Form Umpan Balik -->
        @if($aspirasi->status != 'Baru')
            <div class="card">
                <h2 style="color: #333; margin-bottom: 20px;">💬 Berikan Umpan Balik</h2>
                <form action="{{ route('admin.aspirasi.umpan-balik', $aspirasi->id_aspirasi) }}" method="POST">
                    @csrf
                    <textarea name="umpan_balik" placeholder="Tulis tanggapan/umpan balik untuk siswa...">{{ old('umpan_balik') }}</textarea>
                    <button type="submit" class="btn-submit">Kirim Umpan Balik</button>
                </form>
            </div>
        @endif
    </div>
</body>
</html>