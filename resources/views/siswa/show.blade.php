@extends('layouts.app')

@section('title', 'Detail Aspirasi - Admin')

@section('styles')
<style>
    :root {
        --brand-primary: #6366f1;
        --brand-success: #22c55e;
        --brand-warning: #f59e0b;
        --brand-danger: #ef4444;
        --text-dark: #1e293b;
        --card-border: #e2e8f0;
    }

    body {
        background-color: #f8fafc;
        color: var(--text-dark);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* --- Header Bar --- */
    .action-header-bar {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid var(--card-border);
        border-radius: 20px;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    /* --- Bento Grid --- */
    .bento-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 1.5rem;
    }

    @media (max-width: 992px) {
        .bento-grid { grid-template-columns: 1fr; }
    }

    .bento-card {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: 24px;
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    /* --- Status Pill --- */
    .status-pill {
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        font-weight: 800;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .status-Baru { background: #fee2e2; color: var(--brand-danger); }
    .status-Diproses { background: #fef3c7; color: var(--brand-warning); }
    .status-Selesai { background: #dcfce7; color: var(--brand-success); }

    /* --- Image Handling --- */
    .image-container {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--card-border);
        background: #f1f5f9;
        cursor: zoom-in;
        transition: transform 0.3s ease;
    }
    .image-container:hover { transform: translateY(-5px); }
    .image-container img { width: 100%; height: auto; display: block; }

    /* --- Content Area --- */
    .content-box {
        background: #f8fafc;
        border-radius: 16px;
        padding: 1.5rem;
        border-left: 5px solid var(--brand-primary);
        font-size: 1.1rem;
        line-height: 1.6;
        white-space: pre-line;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f8fafc;
        border-radius: 12px;
        margin-bottom: 0.8rem;
    }

    /* --- Buttons --- */
    .admin-action-btn {
        width: 100%;
        padding: 1rem;
        border-radius: 12px;
        font-weight: 700;
        border: none;
        transition: all 0.2s ease;
        margin-bottom: 0.8rem;
    }
    .btn-process { background: #fff7ed; color: #c2410c; }
    .btn-process:hover { background: #ffedd5; }
    .btn-respond { background: var(--text-dark); color: white; }
    .btn-respond:hover { opacity: 0.9; }
</style>
@endsection

@section('content')
<div class="container py-4">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 p-3">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Header Section --}}
    <div class="action-header-bar">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-light rounded-circle shadow-sm p-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h4 class="mb-0 fw-bold">Detail Aspirasi Siswa</h4>
                <span class="text-muted small">ID Laporan: #ASP-{{ $aspirasi->id_aspirasi }}</span>
            </div>
        </div>
        <div class="status-pill status-{{ $aspirasi->status }}">
            {{ $aspirasi->status }}
        </div>
    </div>

    <div class="bento-grid">
        
        {{-- KOLOM KIRI: Konten Utama --}}
        <div class="bento-card">
            <div class="mb-4">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">
                    <i class="fas fa-tag me-1"></i> {{ $aspirasi->nama_kategori }}
                </span>
            </div>

            <h3 class="fw-bold mb-3">Isi Aspirasi</h3>
            <div class="content-box mb-4">
                {{ $aspirasi->keterangan }}
            </div>

            <h5 class="fw-bold mb-3 mt-5"><i class="fas fa-image me-2 text-muted"></i>Lampiran Foto Bukti</h5>
            
            {{-- Bagian Paling Penting: Menampilkan Foto --}}
            @if(!empty($aspirasi->foto_aspirasi))
                <div class="image-container shadow-sm" data-bs-toggle="modal" data-bs-target="#zoomModal">
                    <img src="{{ asset('storage/aspirasi/' . $aspirasi->foto_aspirasi) }}" 
                         alt="Bukti Kejadian"
                         onerror="this.src='https://placehold.co/800x600?text=File+Fisik+Gambar+Tidak+Ada'">
                </div>
                <p class="text-center mt-3 small text-muted">Klik pada gambar untuk melihat lebih detail</p>
            @else
                <div class="text-center py-5 bg-light rounded-4 border border-dashed">
                    <i class="fas fa-image-slash fa-3x text-muted opacity-25 mb-3"></i>
                    <p class="text-muted fw-bold">Siswa tidak melampirkan foto bukti.</p>
                </div>
            @endif
        </div>

        {{-- KOLOM KANAN: Sidebar Informasi & Aksi --}}
        <div class="d-flex flex-column gap-3">
            
            {{-- Card Aksi --}}
            @if(auth()->check() && auth()->user()->role != 'siswa')
            <div class="bento-card">
                <h5 class="fw-bold mb-4">Aksi Administrasi</h5>
                
                @if($aspirasi->status == 'Baru')
                <form action="{{ route('admin.aspirasi.proses', $aspirasi->id_aspirasi) }}" method="POST">
                    @csrf
                    <button type="submit" class="admin-action-btn btn-process">
                        <i class="fas fa-sync-alt me-2"></i>Tandai Sebagai Diproses
                    </button>
                </form>
                @endif

                <button class="admin-action-btn btn-respond" data-bs-toggle="modal" data-bs-target="#respondModal">
                    <i class="fas fa-comment-dots me-2"></i>
                    {{ $aspirasi->umpan_balik ? 'Ubah Tanggapan' : 'Berikan Tanggapan & Selesaikan' }}
                </button>
            </div>
            @endif

            {{-- Card Data Pelapor --}}
            <div class="bento-card">
                <h5 class="fw-bold mb-4">Informasi Pelapor</h5>

                <div class="meta-item">
                    <i class="fas fa-user-secret text-secondary fs-4"></i>
                    <div>
                        <small class="text-muted d-block">Identitas Pelapor</small>
                        <span class="fw-bold">{{ $aspirasi->is_anonymous ? 'Anonim (disembunyikan)' : 'Terbuka' }}</span>
                    </div>
                </div>

                <div class="meta-item">
                    <i class="fas fa-envelope text-info fs-4"></i>
                    <div>
                        <small class="text-muted d-block">Email Notifikasi</small>
                        <span class="fw-bold text-break">{{ $aspirasi->email_siswa ?? '-' }}</span>
                    </div>
                </div>

                <div class="meta-item">
                    <i class="fas fa-map-marker-alt text-danger fs-4"></i>
                    <div>
                        <small class="text-muted d-block">Lokasi Kejadian</small>
                        <span class="fw-bold">{{ $aspirasi->lokasi }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- MODAL TANGGAPAN --}}
@if(auth()->check() && auth()->user()->role != 'siswa')
<div class="modal fade" id="respondModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 p-4">
                <h5 class="fw-bold mb-0">Berikan Tanggapan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.aspirasi.umpan-balik', $aspirasi->id_aspirasi) }}" method="POST">
                @csrf
                <div class="modal-body p-4 pt-0">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Tulis Pesan Tanggapan</label>
                        <textarea name="umpan_balik" class="form-control rounded-3" rows="6" required 
                                  placeholder="Jelaskan langkah yang diambil sekolah untuk menindaklanjuti laporan ini...">{{ $aspirasi->umpan_balik }}</textarea>
                    </div>
                    <div class="alert alert-info border-0 rounded-3 small">
                        <i class="fas fa-info-circle me-1"></i> Setelah disimpan, status akan berubah menjadi <strong>Selesai</strong> dan email akan otomatis dikirim ke siswa.
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-3 px-4 fw-bold">Kirim & Selesaikan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

{{-- MODAL ZOOM FOTO --}}
@if(!empty($aspirasi->foto_aspirasi))
<div class="modal fade" id="zoomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
                <img src="{{ asset('storage/aspirasi/' . $aspirasi->foto_aspirasi) }}" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</div>
@endif

@endsection