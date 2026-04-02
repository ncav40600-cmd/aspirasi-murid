<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi Siswa | Zenith Mode Premium</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&family=Outfit:wght@300;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bg-canvas: #f8fafc; 
            --pinnacle-white: #ffffff;
            --ocean-primary: #0284c7; 
            --text-obsidian: #0f172a;
            --text-slate: #64748b;
            --border-soft: #e2e8f0;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #ea580c;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; outline: none; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            color: var(--text-obsidian);
            min-height: 100vh;
            background-image: radial-gradient(at 0% 0%, #ffffff 0%, transparent 40%), radial-gradient(at 100% 100%, #e0f2fe 0%, transparent 40%);
            background-attachment: fixed;
            padding-top: 110px;
        }

        .container { max-width: 1280px; margin: 0 auto; padding: 0 25px 50px 25px; }

        /* --- NAVIGATION --- */
        .zenith-nav {
            display: flex; justify-content: space-between; align-items: center;
            background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            padding: 12px 30px; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.5);
            position: fixed; top: 20px; left: 20px; right: 20px; max-width: 1240px; margin: 0 auto; z-index: 2000;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05); transition: 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        }
        .nav-scrolled { background: rgba(255, 255, 255, 0.95); top: 10px; box-shadow: 0 20px 40px rgba(0,0,0,0.06); }
        .brand-pinnacle { font-family: 'Outfit'; font-weight: 900; font-size: 1.5rem; color: var(--ocean-primary); text-decoration: none; letter-spacing: -0.5px; }
        .brand-pinnacle span { color: var(--text-obsidian); font-weight: 300; }

        .user-profile-wrapper {
            display: flex; align-items: center; gap: 12px; padding: 6px 6px 6px 16px;
            background: rgba(255, 255, 255, 0.5); border-radius: 20px; border: 1px solid var(--border-soft); transition: 0.3s;
        }
        .avatar-circle {
            width: 40px; height: 40px; background: linear-gradient(135deg, var(--ocean-primary), #0ea5e9);
            color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-family: 'Outfit', sans-serif; font-weight: 800; border: 2px solid white; box-shadow: 0 4px 10px rgba(2, 132, 199, 0.2);
        }

        /* --- STATS MATRIX --- */
        .stats-matrix { display: grid; grid-template-columns: repeat(5, 1fr); gap: 18px; margin-bottom: 45px; }
        .matrix-card { 
            background: var(--pinnacle-white); padding: 25px; border-radius: 28px; border: 1px solid var(--border-soft); 
            position: relative; overflow: hidden; transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1); 
            opacity: 0; transform: translateY(30px);
        }
        .matrix-card.reveal { opacity: 1; transform: translateY(0); }
        .matrix-card:hover { transform: translateY(-10px); box-shadow: 0 22px 45px -10px rgba(0,0,0,0.08); border-color: var(--ocean-primary); }
        .matrix-label { font-size: 0.7rem; font-weight: 800; color: var(--text-slate); text-transform: uppercase; margin-bottom: 8px; display: block; }
        .matrix-value { font-family: 'Outfit'; font-size: 2.3rem; font-weight: 800; line-height: 1; }

        /* --- TABLE STYLE --- */
        .terminal-window { background: rgba(255, 255, 255, 0.6); border-radius: 32px; padding: 15px; border: 1px solid var(--pinnacle-white); box-shadow: 0 20px 50px rgba(0,0,0,0.04); overflow: hidden; }
        .zenith-table { width: 100%; border-collapse: separate; border-spacing: 0; }
        .zenith-table th { padding: 20px; text-align: left; font-size: 0.75rem; font-weight: 800; color: var(--text-slate); text-transform: uppercase; border-bottom: 1px solid #f1f5f9; }
        .zenith-table td { padding: 20px; font-size: 0.9rem; font-weight: 600; border-bottom: 1px solid #f8fafc; transition: 0.3s; }
        .zenith-table tbody tr:hover td { background: rgba(255, 255, 255, 0.5); color: var(--ocean-primary); }

        /* --- BUTTONS & PILLS --- */
        .btn-pinnacle { background: var(--ocean-primary); color: white; padding: 14px 28px; border-radius: 18px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; font-size: 0.85rem; transition: 0.4s; box-shadow: 0 10px 25px rgba(2, 132, 199, 0.25); }
        .btn-pinnacle:hover { transform: translateY(-4px); box-shadow: 0 15px 30px rgba(2, 132, 199, 0.35); }
        .btn-action { width: 40px; height: 40px; border-radius: 14px; display: inline-flex; align-items: center; justify-content: center; border: 1px solid var(--border-soft); background: white; color: var(--ocean-primary); transition: 0.3s; cursor: pointer; text-decoration: none; }
        .btn-action:hover { transform: scale(1.1) rotate(5deg); background: var(--ocean-primary); color: white; }
        .btn-logout { background: #fff1f2; color: #e11d48; border: none; width: 42px; height: 42px; border-radius: 14px; cursor: pointer; transition: 0.4s; display: flex; align-items: center; justify-content: center; }
        .btn-logout:hover { background: #e11d48; color: white; transform: rotate(90deg); }

        .status-pill { padding: 6px 16px; border-radius: 12px; font-size: 0.75rem; font-weight: 800; }
        .status-baru { background: #fff1f2; color: #e11d48; }
        .status-diproses { background: #e0f2fe; color: #0284c7; }
        .status-selesai { background: #f0fdf4; color: #16a34a; }
        .status-ditolak { background: #fff7ed; color: #ea580c; }

        /* --- FLASH TOAST --- */
        .flash-wrapper { position: fixed; top: 30px; right: 30px; z-index: 9999; pointer-events: none; }
        .flash-toast { pointer-events: auto; min-width: 300px; background: white; border-radius: 20px; padding: 16px; display: flex; align-items: center; gap: 15px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 1px solid var(--border-soft); transform: translateX(120%); transition: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55); }
        .flash-toast.active { transform: translateX(0); }

        @media (max-width: 1100px) { .stats-matrix { grid-template-columns: repeat(3, 1fr); } }
        @media (max-width: 768px) { .stats-matrix { grid-template-columns: repeat(2, 1fr); } body { padding-top: 130px; } }
    </style>
</head>
<body>

@if(session('success'))
<div class="flash-wrapper">
    <div id="zenithToast" class="flash-toast">
        <div style="width: 42px; height: 42px; background: var(--success); color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-check"></i></div>
        <div>
            <p style="font-weight: 800; font-size: 0.9rem;">Berhasil!</p>
            <p style="font-size: 0.8rem; color: var(--text-slate);">{{ session('success') }}</p>
        </div>
    </div>
</div>
@endif

<div id="deleteModal" style="display:none; position:fixed; inset:0; background:rgba(15, 23, 42, 0.4); backdrop-filter:blur(8px); z-index:3000; align-items:center; justify-content:center;">
    <div style="background:white; padding:30px; border-radius:28px; width:90%; max-width:400px; text-align:center; box-shadow:0 25px 50px -12px rgba(0,0,0,0.15); transform:scale(0.9); transition:0.3s;" id="modalContent">
        <div style="width:70px; height:70px; background:#fff1f2; color:var(--danger); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; font-size:1.8rem;"><i class="fa-solid fa-trash-can"></i></div>
        <h3 style="font-family:'Outfit'; font-weight:800; margin-bottom:10px;">Hapus Aspirasi?</h3>
        <p style="color:var(--text-slate); font-size:0.9rem; margin-bottom:25px;">Data ini akan dihapus secara permanen dari sistem kami.</p>
        <div style="display:flex; gap:12px;">
            <button onclick="closeDeleteModal()" style="flex:1; padding:12px; border-radius:15px; border:1px solid var(--border-soft); background:white; font-weight:700; cursor:pointer;">Batal</button>
            <form id="confirmDeleteForm" method="POST" style="flex:1;">
                @csrf
                @method('DELETE')
                <button type="submit" style="width:100%; padding:12px; border-radius:15px; border:none; background:var(--danger); color:white; font-weight:700; cursor:pointer;">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

<nav class="zenith-nav" id="mainNav">
    <a href="/" class="brand-pinnacle">SCHOOL<span>ASPIRATION</span></a>
    <div style="display: flex; align-items: center; gap: 12px;">
        <div class="user-profile-wrapper">
            <div style="text-align: right; line-height: 1.2;">
                <p style="font-weight: 800; font-size: 0.85rem;">{{ session('full_name') }}</p>
                <p style="font-size: 0.65rem; color: var(--ocean-primary); font-weight: 700; text-transform: uppercase;">{{ session('kelas') ?? 'SISWA' }}</p>
            </div>
            <div class="avatar-circle">{{ strtoupper(substr(session('full_name'), 0, 1)) }}</div>
        </div>
        <form action="/logout" method="POST" data-no-loading>
            @csrf
            <button type="submit" class="btn-logout"><i class="fa-solid fa-power-off"></i></button>
        </form>
    </div>
</nav>

<div class="container">
    <div class="stats-matrix">
        <div class="matrix-card">
            <span class="matrix-label">Total</span>
            <div class="matrix-value" data-target="{{ count($aspirasi) }}">0</div>
            <i class="fa-solid fa-layer-group" style="position: absolute; right: -10px; bottom: -10px; font-size: 4rem; opacity: 0.05;"></i>
        </div>
        <div class="matrix-card" style="border-bottom: 4px solid var(--danger);">
            <span class="matrix-label" style="color: var(--danger);">Baru</span>
            <div class="matrix-value" style="color: var(--danger);" data-target="{{ $aspirasi->where('status', 'Baru')->count() }}">0</div>
        </div>
        <div class="matrix-card" style="border-bottom: 4px solid var(--ocean-primary);">
            <span class="matrix-label" style="color: var(--ocean-primary);">Proses</span>
            <div class="matrix-value" style="color: var(--ocean-primary);" data-target="{{ $aspirasi->where('status', 'Diproses')->count() }}">0</div>
        </div>
        <div class="matrix-card" style="border-bottom: 4px solid var(--success);">
            <span class="matrix-label" style="color: var(--success);">Selesai</span>
            <div class="matrix-value" style="color: var(--success);" data-target="{{ $aspirasi->where('status', 'Selesai')->count() }}">0</div>
        </div>
        <div class="matrix-card" style="border-bottom: 4px solid var(--warning);">
            <span class="matrix-label" style="color: var(--warning);">Ditolak</span>
            <div class="matrix-value" style="color: var(--warning);" data-target="{{ $aspirasi->where('status', 'Ditolak')->count() }}">0</div>
        </div>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="font-family: 'Outfit'; font-weight: 800; font-size: 1.8rem; letter-spacing: -1px;">Daftar <span style="font-weight: 300; color: var(--text-slate);">Aspirasi</span></h2>
        <a href="/siswa/aspirasi/create" class="btn-pinnacle"><i class="fa-solid fa-plus-circle"></i> BUAT BARU</a>
    </div>

    <div class="terminal-window">
        <table class="zenith-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th style="text-align: right;">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aspirasi as $item)
                <tr>
                    <td style="font-family: 'Outfit';">#{{ $item->id_aspirasi }}</td>
                    <td><b style="color: var(--ocean-primary)">{{ $item->nama_kategori }}</b></td>
                    <td style="color: var(--text-slate)">{{ Str::limit($item->keterangan, 45) }}</td>
                    <td>
                        @php $st = strtolower($item->status); @endphp
                        <span class="status-pill status-{{ $st }}">{{ ucfirst($item->status) }}</span>
                    </td>
                    <td style="text-align: right;">
                        <div style="display: flex; gap: 10px; justify-content: flex-end;">
                            <a href="{{ route('siswa.aspirasi.show', $item->id_aspirasi) }}" class="btn-action"><i class="fa-solid fa-eye"></i></a>
                            @if($st == 'baru')
                            <a href="{{ route('siswa.aspirasi.edit', $item->id_aspirasi) }}" class="btn-action" style="color: var(--success)"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button onclick="openDeleteModal('{{ route('siswa.aspirasi.destroy', $item->id_aspirasi) }}')" class="btn-action" style="color: var(--danger)"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center; padding:50px; color:var(--text-slate);">Belum ada data aspirasi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    // --- ANIMASI ANGKA ---
    const animateValue = (obj, start, end, duration) => {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            obj.innerHTML = Math.floor(progress * (end - start) + start);
            if (progress < 1) window.requestAnimationFrame(step);
        };
        window.requestAnimationFrame(step);
    };

    // --- MODAL DELETE LOGIC ---
    function openDeleteModal(actionUrl) {
        const modal = document.getElementById('deleteModal');
        const content = document.getElementById('modalContent');
        const form = document.getElementById('confirmDeleteForm');
        form.action = actionUrl;
        modal.style.display = 'flex';
        setTimeout(() => content.style.transform = 'scale(1)', 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const content = document.getElementById('modalContent');
        content.style.transform = 'scale(0.9)';
        setTimeout(() => modal.style.display = 'none', 200);
    }

    // --- INITIALIZATION ---
    document.addEventListener('DOMContentLoaded', () => {
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('mainNav').classList.toggle('nav-scrolled', window.scrollY > 20);
        });

        // Tampilkan Matrix Card satu per satu
        const cards = document.querySelectorAll('.matrix-card');
        cards.forEach((card, i) => {
            setTimeout(() => {
                card.classList.add('reveal');
                const val = card.querySelector('.matrix-value');
                if(val) animateValue(val, 0, parseInt(val.dataset.target) || 0, 1500);
            }, i * 150);
        });

        // Toast Notifikasi
        const toast = document.getElementById('zenithToast');
        if(toast) {
            setTimeout(() => toast.classList.add('active'), 500);
            setTimeout(() => toast.classList.remove('active'), 4500);
        }
    });

    // Close modal if clicked outside
    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) closeDeleteModal();
    }
</script>
</body>
</html>