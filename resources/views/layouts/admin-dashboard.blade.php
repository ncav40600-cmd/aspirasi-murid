<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Zenith Dashboard')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;700;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-body: #f8fafc;
            --bg-sidebar: #ffffff;
            --accent-zenith: #1e293b; /* Slate Deep */
            --text-main: #1e293b;
            --text-muted: #94a3b8;
            --border-soft: #e2e8f0;
            --sidebar-w: 280px;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.02);
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.04), 0 10px 10px -5px rgba(0,0,0,0.02);
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            margin: 0;
            min-height: 100vh;
            background-image: 
                radial-gradient(at 0% 0%, rgba(226, 232, 240, 0.5) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(241, 245, 249, 0.5) 0px, transparent 50%);
        }

        /* --- Sidebar: Neo-Minimalist --- */
        .sidebar {
            width: var(--sidebar-w);
            height: calc(100vh - 40px);
            position: fixed;
            top: 20px; left: 20px;
            background: var(--bg-sidebar);
            border-radius: 30px;
            border: 1px solid var(--border-soft);
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            box-shadow: var(--shadow-lg);
        }

        .sidebar-logo {
            font-family: 'Outfit', sans-serif;
            font-size: 22px;
            font-weight: 900;
            color: var(--accent-zenith);
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.5px;
        }

        .logo-mark {
            width: 38px; height: 38px;
            background: var(--accent-zenith);
            color: #fff;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
            box-shadow: 0 10px 15px -3px rgba(30, 41, 59, 0.2);
        }

        .nav-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 24px 0 12px 12px;
        }

        .nav-link {
            padding: 14px 18px;
            color: #64748b;
            text-decoration: none;
            border-radius: 16px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover {
            color: var(--accent-zenith);
            background: #f1f5f9;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: var(--accent-zenith) !important;
            color: #ffffff !important;
            box-shadow: 0 10px 15px -3px rgba(30, 41, 59, 0.2);
        }

        .nav-link i { font-size: 18px; }

        /* --- Main Layout --- */
        .main-content {
            margin-left: calc(var(--sidebar-w) + 60px);
            padding: 60px 50px 60px 0;
        }

        .page-header .pre-title {
            font-size: 12px;
            font-weight: 800;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 12px;
            display: block;
        }

        .page-header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 3.2rem;
            font-weight: 900;
            color: var(--accent-zenith);
            margin: 0;
            letter-spacing: -2px;
            line-height: 1;
        }

        .page-header h1 span {
            font-weight: 500;
            color: #cbd5e1;
        }

        /* --- Content Card: The Zenith Stage --- */
        .bento-card {
            margin-top: 45px;
            background: #ffffff;
            border: 1px solid var(--border-soft);
            border-radius: 35px;
            padding: 40px;
            min-height: 500px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .bento-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; height: 6px;
            background: linear-gradient(90deg, var(--accent-zenith), #64748b);
        }

        /* --- User Profile Card --- */
        .user-widget {
            margin-top: auto;
            padding: 20px;
            background: #f8fafc;
            border-radius: 24px;
            border: 1px solid var(--border-soft);
        }

        .avatar-circle {
            width: 42px; height: 42px;
            background: #e2e8f0;
            color: var(--accent-zenith);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800;
            font-size: 14px;
            border: 2px solid #fff;
        }

        .btn-logout-zenith {
            width: 100%;
            margin-top: 16px;
            background: #ffffff;
            color: #ef4444;
            border: 1px solid #fee2e2;
            padding: 12px;
            border-radius: 14px;
            font-size: 12px;
            font-weight: 700;
            transition: 0.2s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-logout-zenith:hover {
            background: #ef4444;
            color: #fff;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        /* Smoothing Scroll */
        html { scroll-behavior: smooth; }

        /* Responsive: collapse sidebar into overlay on small screens */
        @media (max-width: 991px) {
            .sidebar { transform: translateX(-110%); transition: transform 0.28s ease; position: fixed; top: 80px; left: 10px; right: auto; width: calc(100% - 20px); height: calc(100vh - 100px); z-index:1300; border-radius: 12px; }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 20px 18px 60px 18px; }
            .admin-topbar { display:flex !important; }
        }

        @media (min-width: 992px) {
            .admin-topbar { display: none !important; }
        }
    </style>
</head>
<body>
    <!-- Mobile topbar: visible on small screens to toggle sidebar -->
    <div class="admin-topbar d-md-none" style="position:fixed;top:10px;left:10px;right:10px;z-index:1200;display:flex;align-items:center;justify-content:space-between;background:#fff;padding:10px 14px;border-radius:12px;box-shadow:0 6px 18px rgba(2,6,23,0.06);border:1px solid rgba(226,232,240,0.6);">
        <div style="display:flex;align-items:center;gap:10px;">
            <button id="sidebarToggle" class="btn btn-sm" style="background:transparent;border:0;color:var(--accent-zenith);font-size:18px;">
                <i class="fas fa-bars"></i>
            </button>
            <div style="font-weight:800;color:var(--accent-zenith);">Admin Control</div>
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
            <form action="{{ route('logout') }}" method="POST" style="margin:0;" data-no-loading>
                @csrf
                <button type="submit" class="btn btn-link text-danger p-0" style="font-weight:700;"><i class="fas fa-power-off"></i></button>
            </form>
        </div>
    </div>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-mark"><i class="fas fa-feather-pointed"></i></div>
            <span>Admin<span style="font-weight: 500; color: #94a3b8;">Control</span></span>
        </div>

        <nav class="nav-menu">
            <p class="nav-label">Overview</p>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-square-poll-vertical"></i>
                <span>Dashboard</span>
            </a>
            
            <p class="nav-label">Management</p>
            <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                <i class="fas fa-shapes"></i>
                <span>Kategori</span>
            </a>
            <a href="{{ route('admin.aspirasi.index') }}" class="nav-link {{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}">
                <i class="fas fa-abstract"></i>
                <span>Laporan Aspirasi</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Pengguna</span>
            </a>
        </nav>

        <div class="user-widget">
            <div class="d-flex align-items-center gap-3">
                <div class="avatar-circle">{{ substr(session('full_name') ?? 'A', 0, 1) }}</div>
                <div style="overflow: hidden;">
                    <div style="font-size: 14px; font-weight: 700; color: var(--accent-zenith); white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                        {{ session('full_name') ?? 'Super Admin' }}
                    </div>
                    <div style="font-size: 10px; color: var(--text-muted); font-weight: 600;">Root Access</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" data-no-loading>
                @csrf
                <button type="submit" class="btn-logout-zenith">
                    <i class="fas fa-power-off me-2"></i> Sign Out
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <header class="page-header">
            <span class="pre-title">Academic Governance</span>
            <h1>Aspirasi <span>Sekolah</span></h1>
        </header>

        <div class="bento-card">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function(){
            const btn = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            function closeSidebar(){
                if(sidebar) sidebar.classList.remove('open');
                const back = document.getElementById('sidebarBackdrop');
                if(back) back.remove();
            }
            function openSidebar(){
                if(sidebar) sidebar.classList.add('open');
                if(!document.getElementById('sidebarBackdrop')){
                    const back = document.createElement('div');
                    back.id = 'sidebarBackdrop';
                    back.style.position = 'fixed';
                    back.style.inset = '0';
                    back.style.background = 'rgba(0,0,0,0.25)';
                    back.style.zIndex = '1200';
                    back.addEventListener('click', closeSidebar);
                    document.body.appendChild(back);
                }
            }
            if(btn){
                btn.addEventListener('click', function(e){
                    e.preventDefault();
                    if(sidebar && sidebar.classList.contains('open')) closeSidebar(); else openSidebar();
                });
            }
            // close on resize to large screens
            window.addEventListener('resize', function(){ if(window.innerWidth >= 992) closeSidebar(); });
        })();
    </script>
    @include('partials.flash')
</body>
</html>