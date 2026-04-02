<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Aspirasi School'); ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&family=Outfit:wght@300;500;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --zenith-canvas: #ffffff;
            --zenith-bone: #f8fafc;
            --zenith-obsidian: #0f172a;
            --zenith-accent: #6366f1;
            --zenith-border: rgba(0, 0, 0, 0.06);
            --nav-height: 90px;
        }

        body {
            background-color: var(--zenith-canvas);
            background-image: 
                radial-gradient(at 0% 0%, #f1f5f9 0, transparent 40%),
                radial-gradient(at 100% 100%, #f8fafc 0, transparent 40%);
            background-attachment: fixed;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--zenith-obsidian);
            margin-top: var(--nav-height); /* Menjaga konten agar tidak tertutup saat load */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            letter-spacing: -0.01em;
        }

        /* --- Ultra-Transparent Glassmorphism Navbar --- */
        .navbar-spatial {
            /* Transparansi tinggi (0.15) agar objek di bawah terlihat jelas */
            background: rgba(255, 255, 255, 0.15); 
            backdrop-filter: blur(12px) saturate(160%);
            -webkit-backdrop-filter: blur(12px) saturate(160%);
            
            height: 72px;
            width: 94%;
            max-width: 1240px;
            margin: 15px auto;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1050;
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            display: flex;
            align-items: center;
            padding: 0 25px;
            
            /* Bayangan sangat tipis agar tidak menghalangi visual objek */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            
            /* Transisi Smooth & Ringan */
            transition: 
                width 0.6s cubic-bezier(0.23, 1, 0.32, 1),
                margin 0.6s cubic-bezier(0.23, 1, 0.32, 1),
                background 0.5s ease,
                border-radius 0.6s ease;
            will-change: width, margin, background;
        }

        /* Mode Scrolled: Sedikit lebih pekat saat konten lewat di bawahnya */
        .navbar-spatial.scrolled {
            width: 100%;
            margin-top: 0;
            border-radius: 0 0 20px 20px;
            background: rgba(255, 255, 255, 0.75);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        }

        .brand-core {
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            font-size: 1.4rem;
            letter-spacing: -1.5px;
            color: var(--zenith-obsidian);
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .brand-core:hover { opacity: 0.8; }
        .brand-core span { font-weight: 300; color: #94a3b8; }

        /* --- Identity Orbital (Glass Style) --- */
        .identity-orbital {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 5px 5px 5px 15px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .identity-orbital:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.1);
        }

        .avatar-mono {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        /* --- Content Layout --- */
        .content-theatre {
            flex: 1;
            padding: 20px 15px 80px;
            animation: fadeInMove 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeInMove {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- Footer --- */
        footer {
            padding: 60px 0 30px;
            opacity: 0.6;
        }

        .footer-line {
            width: 30px;
            height: 1px;
            background: var(--zenith-obsidian);
            margin: 0 auto 20px;
            opacity: 0.2;
        }

        /* --- Responsivitas --- */
        @media (max-width: 768px) {
            .navbar-spatial {
                width: 90%;
                padding: 0 15px;
                height: 65px;
            }
            .brand-core { font-size: 1.1rem; }
            .user-details { display: none; }
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

    <nav class="navbar-spatial" id="navSpatial">
        <a class="brand-core" href="/">
            ASPIRASI<span>SCHOOL</span>
        </a>

        <div class="ms-auto">
            <?php if(session('user_id')): ?>
            <div class="dropdown">
                <div class="identity-orbital" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-details text-end d-none d-md-block">
                        <div class="fw-800" style="font-size: 0.75rem; line-height: 1; color: var(--zenith-obsidian);"><?php echo e(session('full_name')); ?></div>
                        <div style="font-size: 0.6rem; color: var(--zenith-accent); font-weight: 700; text-transform: uppercase; margin-top: 2px;"><?php echo e(session('role')); ?></div>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(session('full_name'))); ?>&background=6366f1&color=fff&bold=true" class="avatar-mono">
                </div>
                
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-2 mt-2" style="border-radius: 15px; min-width: 200px;">
                    <li class="px-3 py-2 bg-light rounded-3 mb-2 d-md-none">
                        <small class="text-muted d-block" style="font-size: 10px;">USER</small>
                        <div class="fw-bold"><?php echo e(session('full_name')); ?></div>
                    </li>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item text-danger fw-600 rounded-3 py-2">
                                <i class="fas fa-sign-out-alt me-2"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </nav>

    <main class="content-theatre container">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <div class="container text-center">
            <div class="footer-line"></div>
            <div style="font-size: 0.65rem; letter-spacing: 3px; font-weight: 800; color: #94a3b8;">SYSTEM V.2026.1</div>
            <p class="small text-muted mt-2">&copy; <?php echo e(date('Y')); ?> Zenith Design. Smooth Interface.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth Scroll Effect
        const nav = document.getElementById('navSpatial');
        let isScrolled = false;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 30) {
                if (!isScrolled) {
                    nav.classList.add('scrolled');
                    isScrolled = true;
                }
            } else {
                if (isScrolled) {
                    nav.classList.remove('scrolled');
                    isScrolled = false;
                }
            }
        }, { passive: true }); // Passive true untuk performa scrolling yang lebih ringan
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html><?php /**PATH C:\asp\web\resources\views/layouts/app.blade.php ENDPATH**/ ?>