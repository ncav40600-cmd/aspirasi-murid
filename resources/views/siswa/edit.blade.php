<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Aspirasi</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Outfit:wght@900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --primary: #007AFF;
            --accent: #5AC8FA;
            --surface: rgba(255, 255, 255, 0.85);
            --text: #050505;
            --subtext: #6e6e73;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background: #ffffff;
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: auto; /* allow scrolling on small screens */
            padding: 24px; /* give breathing room on mobile */
        }

        /* Animated Background Mesh */
        .mesh-bg {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1;
            background: 
                radial-gradient(circle at 10% 10%, rgba(0, 122, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 90%, rgba(90, 200, 250, 0.05) 0%, transparent 40%);
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.4;
        }

        /* Main Container */
        .singularity-card {
            width: 100%;
            max-width: 760px;
            background: var(--surface);
            backdrop-filter: blur(30px) saturate(180%);
            -webkit-backdrop-filter: blur(30px) saturate(180%);
            border-radius: 28px;
            padding: 48px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow:
                0 30px 80px -20px rgba(0, 0, 0, 0.08),
                inset 0 0 0 1px rgba(255, 255, 255, 0.6);
            transform: translateY(30px);
            opacity: 0;
            margin: 40px auto; /* center with breathing room */
        }

        /* Typography & Header */
        header { text-align: center; margin-bottom: 50px; }
        
        .header-tag {
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 4px;
            color: var(--primary);
            text-transform: uppercase;
            margin-bottom: 15px;
            display: block;
        }

        h1 {
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            font-size: 3.5rem;
            letter-spacing: -3px;
            line-height: 0.85;
            margin-bottom: 20px;
        }

        /* Input Experience */
        .input-group {
            margin-bottom: 35px;
            position: relative;
        }

        .label-style {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--subtext);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .input-zenith {
            width: 100%;
            padding: 20px 25px;
            background: rgba(0, 0, 0, 0.03);
            border: 1.5px solid transparent;
            border-radius: 20px;
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--text);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .input-zenith:focus {
            outline: none;
            background: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgba(0, 122, 255, 0.1);
            transform: scale(1.02);
        }

        textarea.input-zenith { min-height: 150px; resize: none; }

        /* Button Grid */
        .button-stack {
            display: grid;
            grid-template-columns: 1fr 2.5fr;
            gap: 15px;
            margin-top: 50px;
        }

        /* Responsive tweaks */
        @media (max-width: 700px) {
            h1 { font-size: 2.2rem; }
            .singularity-card { padding: 20px; border-radius: 18px; max-width: calc(100% - 32px); }
            .input-zenith { padding: 14px 16px; font-size: 1rem; }
            .button-stack { grid-template-columns: 1fr; gap: 12px; margin-top: 22px; }
            .btn { padding: 14px; border-radius: 14px; }
            header { margin-bottom: 28px; }
        }

        .btn {
            padding: 22px;
            border-radius: 22px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            transition: all 0.5s cubic-bezier(0.2, 1, 0.3, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-discard {
            background: #F2F2F7;
            color: #1D1D1F;
        }

        .btn-discard:hover { background: #E5E5EA; transform: scale(0.96); }

        .btn-commit {
            background: var(--text);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .btn-commit:hover {
            background: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 122, 255, 0.3);
        }

        /* Alert Stylings */
        .error-notif {
            background: #FFF2F2;
            color: #FF3B30;
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            border-left: 4px solid #FF3B30;
        }

        /* Select Custom Arrow */
        select.input-zenith {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%236e6e73' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 25px center;
        }

    </style>
</head>
<body>

    <div class="mesh-bg" id="mesh"></div>
    <div class="orb" id="orb1" style="width: 400px; height: 400px; background: #007AFF; top: -10%; left: -10%;"></div>
    <div class="orb" id="orb2" style="width: 300px; height: 300px; background: #5AC8FA; bottom: -5%; right: 10%;"></div>

    <div class="singularity-card" id="card">
        <header>
            <span class="header-tag">Edit Aspiration</span>
            <h1>Refine<br>Your Vision.</h1>
        </header>

        @if($errors->any())
            <div class="error-notif">
                @foreach($errors->all() as $error)
                    <div style="display:flex; align-items:center; gap:8px;">
                        <i data-lucide="alert-circle" style="width:16px;"></i> {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('siswa.aspirasi.update', $aspirasi->id_aspirasi) }}" method="POST" enctype="multipart/form-data" data-no-loading>
            @csrf
            @method('PUT')
            
            <div class="input-group">
                <label class="label-style"><i data-lucide="layers" style="width:14px;"></i> CATEGORY</label>
                <select name="id_kategori" class="input-zenith" required>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id_kategori }}" {{ $aspirasi->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                            {{ $k->keterangan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <label class="label-style"><i data-lucide="map-pin" style="width:14px;"></i> LOCATION</label>
                <input type="text" name="lokasi" class="input-zenith" value="{{ $aspirasi->lokasi }}" placeholder="Specify location..." required>
            </div>

            <div class="input-group">
                <label class="label-style"><i data-lucide="align-left" style="width:14px;"></i> DESCRIPTION</label>
                <textarea name="keterangan" class="input-zenith" placeholder="Expand your thoughts..." required>{{ $aspirasi->keterangan }}</textarea>
            </div>

            <div class="input-group">
                <label class="label-style"><i data-lucide="user-x" style="width:14px;"></i> ANONIM</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_anonymous" id="isAnonymous" value="1" {{ (isset($aspirasi->is_anonymous) && $aspirasi->is_anonymous) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isAnonymous">
                        Kirim aspirasi ini secara anonim
                    </label>
                </div>
            </div>

            <div class="input-group" id="emailGroup">
                <label class="label-style"><i data-lucide="mail" style="width:14px;"></i> EMAIL</label>
                <input type="email" name="email_siswa" id="emailSiswa" class="input-zenith" value="{{ $aspirasi->email_siswa }}" placeholder="nama@domain.com">
            </div>

            <div class="input-group">
                <label class="label-style"><i data-lucide="image" style="width:14px;"></i> BUKTI FOTO (opsional)</label>

                @if(!empty($aspirasi->foto))
                    <div style="margin-bottom:12px;">
                        <img src="{{ asset('storage/aspirasi/' . $aspirasi->foto) }}" alt="Foto Aspirasi" style="max-width:200px; border-radius:12px; display:block;">
                    </div>
                @endif

                <input type="file" name="foto" accept="image/*" class="input-zenith" style="padding:12px 18px;" />
                <small style="color:#6e6e73; display:block; margin-top:8px;">Unggah foto baru untuk mengganti foto lama.</small>
            </div>

            <div class="button-stack">
                <a href="/siswa/dashboard" class="btn btn-discard">Close</a>
                <button type="submit" class="btn btn-commit">
                    Confirm Vision <i data-lucide="arrow-right" style="width:18px;"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        // Initialize Icons
        lucide.createIcons();

        // GSAP Animations - The Singularity Entrance
        window.onload = () => {
            const tl = gsap.timeline();

            tl.to("#card", {
                duration: 1.5,
                y: 0,
                opacity: 1,
                ease: "expo.out"
            })
            .from(".input-group", {
                duration: 0.8,
                y: 20,
                opacity: 0,
                stagger: 0.1,
                ease: "power3.out"
            }, "-=1");

            // Floating Orbs Animation
            gsap.to("#orb1", {
                duration: 10,
                x: 100,
                y: 50,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
            gsap.to("#orb2", {
                duration: 8,
                x: -80,
                y: -40,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
        };

        // Input Focus Interaction
        document.querySelectorAll('.input-zenith').forEach(el => {
            el.addEventListener('focus', () => {
                gsap.to(el, { scale: 1.02, duration: 0.4, ease: "power2.out" });
            });
            el.addEventListener('blur', () => {
                gsap.to(el, { scale: 1, duration: 0.4, ease: "power2.out" });
            });
        });

        // Handle anonymous checkbox
        const isAnonymousCheckbox = document.getElementById('isAnonymous');
        const emailGroup = document.getElementById('emailGroup');
        const emailInput = document.getElementById('emailSiswa');

        function toggleEmail() {
            if (isAnonymousCheckbox.checked) {
                emailGroup.style.display = 'none';
                emailInput.required = false;
                emailInput.value = '';
            } else {
                emailGroup.style.display = 'block';
                emailInput.required = true;
                if (!emailInput.value) {
                    emailInput.value = '{{ $user->email ?? '' }}';
                }
            }
        }

        isAnonymousCheckbox.addEventListener('change', toggleEmail);
        toggleEmail(); // Initial check

        // Handle form submit with loading indicator
        const form = document.querySelector('form');
        const submitBtn = document.querySelector('.btn-commit');

        form.addEventListener('submit', function(e) {
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
            submitBtn.disabled = true;
            
            // Optional: Disable all inputs
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => input.disabled = true);
        });
    </script>
</body>
</html>