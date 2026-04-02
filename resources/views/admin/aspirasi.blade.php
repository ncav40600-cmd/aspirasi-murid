<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspiration Archive - Admin Crystal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@600;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --aurora-blue: #0ea5e9;
            --aurora-indigo: #6366f1;
            --bg-crystal: #f8fafc;
            --text-deep: #0f172a;
            --text-sub: #64748b;
            --glass-white: rgba(255, 255, 255, 0.8);
            --border-light: rgba(226, 232, 240, 0.8);
        }

        body {
            background-color: var(--bg-crystal);
            background-image: 
                radial-gradient(at 0% 0%, rgba(14, 165, 233, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(99, 102, 241, 0.05) 0px, transparent 50%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-deep);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1440px;
            margin: 0 auto;
        }

        /* --- Header: More Compact & Balanced --- */
        .header-max {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .header-max h1 {
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            font-size: 2.8rem;
            letter-spacing: -2px;
            color: var(--text-deep);
        }

        .header-max h1 span {
            color: var(--aurora-blue);
            font-weight: 500;
        }

        /* --- Buttons: Modern Minimalist --- */
        .btn-crystal {
            padding: 10px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--border-light);
            background: white;
            color: var(--text-deep);
        }

        .btn-crystal:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
        }

        /* --- Glass Panel: High Contrast Table Container --- */
        .glass-panel-max {
            background: white;
            border: 1px solid var(--border-light);
            border-radius: 32px;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        .panel-header {
            padding: 30px 40px;
            border-bottom: 1px solid #f1f5f9;
            background: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* --- Search & Filter: Grouped Look --- */
        .controls {
            display: flex;
            background: #f1f5f9;
            padding: 6px;
            border-radius: 16px;
            gap: 5px;
        }

        .input-max {
            border: none;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            outline: none;
        }

        .search-input { width: 320px; }

        /* --- Table Styling: ANTI-DIZZY MODE --- */
        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        .table-max {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        /* Header table: Fixed & Strong */
        .table-max thead th {
            background: #fafafa;
            padding: 18px 25px;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 800;
            color: var(--text-sub);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            border-bottom: 2px solid #f1f5f9;
        }

        /* Body Rows: Alternating colors for easy tracking */
        .table-max tbody tr {
            border-bottom: 1px solid #f8fafc;
            transition: background 0.2s;
        }

        .table-max tbody tr:nth-child(even) {
            background-color: #fbfcfd;
        }

        .table-max tbody td {
            padding: 16px 25px;
            font-size: 0.92rem;
            color: #334155;
            vertical-align: middle;
        }

        .table-max tr:hover td {
            background: #f0f9ff !important; /* Soft Blue highlight on hover */
        }

        /* ID Cell: High Visibility */
        .id-cell {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            color: var(--aurora-blue);
            background: #f0f9ff;
            border-radius: 8px;
            padding: 4px 10px;
            display: inline-block;
        }

        /* Description: Prevent text explosion */
        .desc-cell {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: var(--text-sub);
            font-size: 0.85rem;
        }

        /* --- Badges: Pill Style --- */
        .badge-max {
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .badge-baru { background: #fee2e2; color: #ef4444; }
        .badge-diproses { background: #e0f2fe; color: #0ea5e9; }
        .badge-selesai { background: #dcfce7; color: #10b981; }
        .badge-ditolak { background: #fee2e2; color: #dc2626; }

        .badge-max::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* Empty state */
        .empty-state {
            padding: 100px;
            text-align: center;
            color: var(--text-sub);
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="header-max">
            <div>
                <h1>Arsip <span>Aspirasi.</span></h1>
                <p style="color: var(--text-sub); font-weight: 600; font-size: 0.9rem;">Manajemen basis data laporan siswa secara real-time.</p>
            </div>
            <div class="nav-buttons">
                <a href="{{ route('admin.dashboard') }}" class="btn-crystal">
                   <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                   Halaman utama
                </a>
            </div>
        </div>

        <div class="glass-panel-max">
            <div class="panel-header">
                <h2 style="font-family: 'Outfit';">Aliran Data</h2>
                <div class="controls">
                    <form method="GET" action="{{ route('admin.aspirasi') }}" id="filterForm">
                        <input type="text" name="search" id="searchInput" class="input-max search-input" placeholder="Cari nama, NIS, atau kategori..." value="{{ request('search') }}">
                        
                        <select name="tahun" class="input-max" onchange="document.getElementById('filterForm').submit()">
                            <option value="">Semua Tahun</option>
                            @php $currentYear = date('Y'); @endphp
                            @for($year = $currentYear; $year >= 2020; $year--)
                                <option value="{{ $year }}" {{ (request('tahun') ?: $currentYear) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                        
                        <select name="bulan" class="input-max" onchange="document.getElementById('filterForm').submit()">
                            <option value="">Semua Bulan</option>
                            @php $currentMonth = date('n'); $selectedMonth = request('bulan') ?: (request('tahun') ? 0 : $currentMonth); @endphp
                            <option value="1" {{ $selectedMonth == '1' ? 'selected' : '' }}>Januari</option>
                            <option value="2" {{ $selectedMonth == '2' ? 'selected' : '' }}>Februari</option>
                            <option value="3" {{ $selectedMonth == '3' ? 'selected' : '' }}>Maret</option>
                            <option value="4" {{ $selectedMonth == '4' ? 'selected' : '' }}>April</option>
                            <option value="5" {{ $selectedMonth == '5' ? 'selected' : '' }}>Mei</option>
                            <option value="6" {{ $selectedMonth == '6' ? 'selected' : '' }}>Juni</option>
                            <option value="7" {{ $selectedMonth == '7' ? 'selected' : '' }}>Juli</option>
                            <option value="8" {{ $selectedMonth == '8' ? 'selected' : '' }}>Agustus</option>
                            <option value="9" {{ $selectedMonth == '9' ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $selectedMonth == '10' ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ $selectedMonth == '11' ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $selectedMonth == '12' ? 'selected' : '' }}>Desember</option>
                        </select>
                        
                        <input type="text" name="tanggal" id="dateFilter" class="input-max" placeholder="YYYY-MM-DD" value="{{ request('tanggal') }}" onchange="validateAndFilterDate(this)" title="Format: YYYY-MM-DD (misal: 2026-03-15)">
                        
                        <select name="status" class="input-max" onchange="document.getElementById('filterForm').submit()">
                            <option value="">Semua Status</option>
                            <option value="Baru" {{ request('status') == 'Baru' ? 'selected' : '' }}>Baru</option>
                            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        
                        <button type="button" onclick="resetFilters()" class="input-max" style="background: #64748b; color: white; border: none; border-radius: 8px; padding: 8px 16px; cursor: pointer;">Reset</button>
                    </form>
                </div>
            </div>

            <div class="table-container">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Ref ID</th>
                            <th>Entitas Siswa</th>
                            <th>NIS</th>
                            <th>Klasifikasi</th>
                            <th>Ringkasan Laporan</th>
                            <th>Tanggal Aspirasi</th>
                            <th>Lokasi</th>
                            <th>Status Aktual</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse($aspirasi as $item)
                        <tr>
                            <td><span class="id-cell">#{{ $item->id_aspirasi }}</span></td>
                            <td style="font-weight: 800; color: var(--text-deep);">{{ $item->display_name ?? $item->full_name }}</td>
                            <td style="font-weight: 600; color: var(--text-sub); font-family: monospace;">{{ $item->display_nis ?? $item->nis }}</td>
                            <td><span style="font-weight: 700; color: var(--aurora-indigo);">{{ $item->nama_kategori }}</span></td>
                            <td><div class="desc-cell" title="{{ $item->keterangan }}">{{ $item->keterangan }}</div></td>
                            <td style="font-weight: 600; white-space: nowrap;">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                            <td style="font-weight: 600;">{{ $item->lokasi }}</td>
                            <td>
                                @php
                                    $statusClass = match($item->status) {
                                        'Baru' => 'badge-baru',
                                        'Diproses' => 'badge-diproses',
                                        'Selesai' => 'badge-selesai',
                                        'Ditolak' => 'badge-ditolak',
                                        default => ''
                                    };
                                @endphp
                                <span class="badge-max {{ $statusClass }}">{{ strtoupper($item->status) }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <p style="font-weight: 700; font-size: 1.1rem;">Belum ada data masuk.</p>
                                    <p style="font-size: 0.9rem;">Sistem siap menerima sinyal aspirasi baru.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function resetFilters() {
            window.location.href = '{{ route("admin.aspirasi") }}';
        }

        // Validate dan filter tanggal dari Katalon atau manual input
        function validateAndFilterDate(inputElement) {
            const value = inputElement.value.trim();
            
            if (!value) {
                // Jika kosong, submit langsung
                document.getElementById('filterForm').submit();
                return;
            }
            
            // Validasi format YYYY-MM-DD
            const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            
            if (dateRegex.test(value)) {
                // Format benar, submit form
                console.log('Valid date format:', value);
                document.getElementById('filterForm').submit();
            } else {
                // Format salah, tampilkan warning
                alert('Format tanggal salah!\nGunakan format: YYYY-MM-DD\nContoh: 2026-03-15');
                inputElement.value = '';
                inputElement.focus();
            }
        }

        // Allow Enter key untuk submit dari text input
        document.addEventListener('DOMContentLoaded', function() {
            const dateFilterInput = document.getElementById('dateFilter');
            
            if (dateFilterInput) {
                dateFilterInput.addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        validateAndFilterDate(this);
                    }
                });
            }

            // Handle form submit with loading indicators
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Show loading overlay or disable form
                    const inputs = form.querySelectorAll('input, select, button');
                    inputs.forEach(input => input.disabled = true);
                    
                    // Optional: Add loading text to submit buttons
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                    }
                });
            });
        });
    </script>
</body>
</html>