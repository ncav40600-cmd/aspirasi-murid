<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah Aspirasi | Aspirasi Siswa V2</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Lexend:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00e5ff;
            --primary-glow: rgba(0, 229, 255, 0.6);
            --glass-bg: rgba(10, 15, 28, 0.6); 
            --glass-border: rgba(255, 255, 255, 0.12);
        }

        * {
            margin: 0; padding: 0; box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #020817; 
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* BACKGROUND BALANCED */
        .viewport-bg {
            position: fixed;
            inset: 0;
            z-index: -2;
            background: url('<?php echo e(asset("images/newdesain.jpg")); ?>') center/cover no-repeat;
            filter: brightness(0.8) contrast(1.1); 
            animation: kenBurns 40s infinite alternate linear;
        }

        @keyframes kenBurns {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .gradient-overlay {
            position: fixed;
            inset: 0;
            z-index: -1;
            background: radial-gradient(circle at center, transparent 10%, rgba(2, 8, 23, 0.6) 100%);
        }

        /* --- BIG & WIDE AUTH CARD --- */
        .auth-card {
            background: var(--glass-bg);
            backdrop-filter: blur(25px) saturate(200%);
            -webkit-backdrop-filter: blur(25px) saturate(200%);
            border: 1px solid var(--glass-border);
            
            width: 90%;
            /* LEBAR DITINGKATKAN DARI 460px ke 540px */
            max-width: 540px; 
            /* PADDING DIPERLUAS UNTUK KESAN MEWAH */
            padding: 70px 60px;
            
            border-radius: 48px; 
            position: relative;
            box-shadow: 
                0 30px 60px -12px rgba(0, 0, 0, 0.7),
                0 0 0 1px rgba(255, 255, 255, 0.05);
            animation: fadeIn 1.2s cubic-bezier(0.16, 1, 0.3, 1);
            transform-style: preserve-3d;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .brand { text-align: center; margin-bottom: 50px; }

        .brand h1 {
            font-family: 'Lexend', sans-serif;
            font-size: 44px; /* Judul lebih besar mengikuti lebar card */
            letter-spacing: -2.5px;
            margin-bottom: 12px;
            line-height: 1;
        }

        .brand h1 span {
            color: var(--primary);
            text-shadow: 0 0 30px var(--primary-glow);
        }

        .brand p {
            color: rgba(255, 255, 255, 0.65);
            font-size: 17px;
            font-weight: 500;
        }

        .input-group { margin-bottom: 30px; }

        .input-group label {
            display: block;
            font-size: 12px;
            font-weight: 800;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 12px;
            padding-left: 5px;
        }

        .input-field input {
            width: 100%;
            padding: 22px 28px; /* Input lebih lebar dan lega */
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-field input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--primary);
            box-shadow: 0 0 25px rgba(0, 229, 255, 0.2);
            transform: scale(1.01);
        }

        .btn-submit {
            width: 100%;
            padding: 22px;
            border-radius: 20px;
            border: none;
            background: var(--primary);
            color: #020817;
            font-family: 'Lexend', sans-serif;
            font-size: 17px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            margin-top: 15px;
        }

        .btn-submit:hover {
            transform: translateY(-5px);
            background: #ffffff;
            box-shadow: 0 20px 40px rgba(0, 229, 255, 0.4);
        }

        .footer-note {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.3);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 600;
        }

        /* Toast popup custom */
        .toast {
            position: fixed;
            top: 24px;
            left: 24px;
            max-width: 320px;
            padding: 14px 18px;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(0, 229, 255, 0.5);
            backdrop-filter: blur(8px);
            color: #fff;
            font-weight: 700;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.35);
            z-index: 9999;
            transform: translateX(-120%);
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toast.hide {
            transform: translateX(-120%);
            opacity: 0;
        }

        /* Responsif untuk tablet/mobile */
        @media (max-width: 600px) {
            .auth-card {
                padding: 50px 30px;
                border-radius: 35px;
            }
            .brand h1 { font-size: 32px; }
        }
    </style>
</head>
<body>

    <div class="viewport-bg"></div>
    <div class="gradient-overlay"></div>

    <main>
        <div class="auth-card">
            <div class="brand">
                <h1>Aspirasi <span>Siswa.</span></h1>
                <p>Hanya Untuk Mereka Yang Berani Bersuara</p>
            </div>

            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <label>NIS Siswa / Username Admin</label>
                    <div class="input-field">
                        <input type="text" name="login" value="<?php echo e(old('login')); ?>" placeholder="Masukkan NIS untuk siswa atau username admin..." required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Login Sistem
                </button>
            </form>

            <div class="footer-note">
                SEKOLAH ASPIRASI
            </div>
        </div>
    </main>

    <div id="login-toast" class="toast" aria-live="assertive" aria-atomic="true"></div>

    <script>
        const card = document.querySelector('.auth-card');
        document.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.clientX) / 45;
            const yAxis = (window.innerHeight / 2 - e.clientY) / 45;
            card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        function showLoginToast(message) {
            const toast = document.getElementById('login-toast');
            if (!toast) return;
            toast.textContent = 'Login gagal: ' + message;
            toast.classList.add('show');
            toast.classList.remove('hide');

            setTimeout(() => {
                toast.classList.add('hide');
                toast.classList.remove('show');
            }, 3000);
        }
    </script>

    <?php if(session('login_error') || $errors->any()): ?>
        <script>
            const loginErrorText = <?php echo json_encode(session('login_error') ?? $errors->first(), 15, 512) ?>;
            if (loginErrorText) {
                window.addEventListener('DOMContentLoaded', function() {
                    showLoginToast(loginErrorText);
                });
            }
        </script>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\asp\web\resources\views/auth/login.blade.php ENDPATH**/ ?>