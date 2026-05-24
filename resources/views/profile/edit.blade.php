@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
* { box-sizing: border-box; }

:root {
    --primary: #2563eb;
    --primary-dark: #1e40af;
    --primary-light: #3b82f6;
    --secondary: #0891b2;
    --accent: #f59e0b;
    --success: #22c55e;
    --danger: #ef4444;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-300: #d1d5db;
    --gray-700: #374151;
    --gray-800: #1f2937;
    --gray-900: #0f172a;
}

.profile-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: linear-gradient(135deg, #f0f9ff 0%, #f3e8ff 50%, #fef3c7 100%);
    min-height: 100vh;
    padding: 40px 24px 60px;
    position: relative;
    overflow: hidden;
}

.profile-page::before {
    content: '';
    position: fixed;
    top: -50%;
    right: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(37, 99, 235, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    z-index: 0;
}

.profile-page::after {
    content: '';
    position: fixed;
    bottom: -30%;
    left: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(8, 145, 178, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    z-index: 0;
}

.profile-wrapper {
    position: relative;
    z-index: 1;
}

/* ═══════════════════ HEADER ═══════════════════ */
.page-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 40px;
    animation: slideInDown 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.page-header-icon {
    width: 70px;
    height: 70px;
    border-radius: 20px;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: white;
    box-shadow: 0 20px 40px rgba(37, 99, 235, 0.35),
                0 0 0 1px rgba(255, 255, 255, 0.5) inset;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.page-header-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    animation: shimmer 3s infinite;
}

.page-header-content {
    flex: 1;
}

.page-header h1 {
    font-size: 32px;
    font-weight: 900;
    color: var(--gray-900);
    margin: 0;
    letter-spacing: -0.5px;
}

.page-header p {
    font-size: 14px;
    color: #94a3b8;
    margin: 8px 0 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.page-header p::before {
    content: '';
    width: 8px;
    height: 8px;
    background: var(--success);
    border-radius: 50%;
    animation: pulse 2s infinite;
}

.badge-online {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 700;
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    color: #16a34a;
    border: 1px solid #86efac;
    box-shadow: 0 8px 16px rgba(34, 197, 94, 0.15);
}

.badge-online .dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--success);
    animation: pulse 1.5s infinite;
}

/* ═══════════════════ CARDS ═══════════════════ */
.pro-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 8px 32px rgba(15, 23, 42, 0.08),
                0 2px 8px rgba(15, 23, 42, 0.04);
    overflow: hidden;
    animation: fadeInUp 0.6s ease both;
    backdrop-filter: blur(10px);
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.pro-card:nth-child(1) { animation-delay: 0.1s; }
.pro-card:nth-child(2) { animation-delay: 0.2s; }
.pro-card:nth-child(3) { animation-delay: 0.3s; }

.pro-card:hover {
    border-color: rgba(37, 99, 235, 0.2);
    box-shadow: 0 12px 48px rgba(15, 23, 42, 0.12),
                0 4px 12px rgba(15, 23, 42, 0.06);
    transform: translateY(-4px);
}

.card-stripe {
    height: 6px;
    background: linear-gradient(90deg, var(--primary), var(--secondary), var(--primary));
    background-size: 200% 100%;
    animation: gradientShift 3s ease infinite;
}

.card-stripe.amber {
    background: linear-gradient(90deg, var(--accent), #f97316, var(--danger));
    background-size: 200% 100%;
    animation: gradientShift 3s ease infinite;
}

/* ═══════════════════ CARD HEADER ═══════════════════ */
.c-head {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 28px 32px 0;
    margin-bottom: 24px;
}

.c-head-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.c-head-icon.blue {
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: var(--primary);
    box-shadow: 0 8px 16px rgba(37, 99, 235, 0.1);
}

.c-head-icon.amber {
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    color: var(--accent);
    box-shadow: 0 8px 16px rgba(245, 158, 11, 0.1);
}

.c-head-icon:hover {
    transform: scale(1.08) rotateZ(5deg);
}

.c-head h3 {
    font-size: 16px;
    font-weight: 800;
    color: var(--gray-900);
    margin: 0;
    letter-spacing: -0.3px;
}

.c-head p {
    font-size: 13px;
    color: #94a3b8;
    margin: 4px 0 0;
}

.c-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
    margin: 0 32px 28px;
}

.c-body {
    padding: 0 32px 32px;
}

/* ═══════════════════ AVATAR SECTION ═══════════════════ */
.avatar-card-inner {
    padding: 40px 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.avatar-wrap {
    position: relative;
    width: 180px;
    height: 260px;
    margin-bottom: 28px;
}

.avatar-wrap img {
    width: 180px;
    height: 260px;
    border-radius: 18px;
    object-fit: cover;
    border: 6px solid white;
    box-shadow: 0 20px 50px rgba(37, 99, 235, 0.25),
                0 0 0 1px rgba(37, 99, 235, 0.1);
    position: relative;
    z-index: 2;
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    cursor: pointer;
}

.avatar-wrap:hover img {
    transform: scale(1.05) rotateZ(1deg);
    box-shadow: 0 30px 60px rgba(37, 99, 235, 0.35),
                0 0 0 1px rgba(37, 99, 235, 0.15);
}

.avatar-ring-wrap {
    position: absolute;
    inset: -8px;
    border-radius: 24px;
    background: conic-gradient(from 0deg, var(--primary), var(--secondary), var(--primary));
    animation: spinGradient 4s linear infinite;
    z-index: 1;
    opacity: 0.8;
}

.avatar-ring-wrap::after {
    content: '';
    position: absolute;
    inset: 6px;
    border-radius: 18px;
    background: white;
}

.avatar-overlay {
    position: absolute;
    inset: 0;
    border-radius: 18px;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.8), rgba(8, 145, 178, 0.8));
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    cursor: pointer;
    z-index: 3;
    color: white;
    font-size: 12px;
    font-weight: 700;
    gap: 6px;
    backdrop-filter: blur(2px);
}

.avatar-overlay i {
    font-size: 28px;
}

.avatar-wrap:hover .avatar-overlay {
    opacity: 1;
}

.user-name {
    font-size: 22px;
    font-weight: 900;
    color: var(--gray-900);
    margin-bottom: 8px;
    text-align: center;
    letter-spacing: -0.3px;
}

.user-role-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #eff6ff, #e0f2fe);
    color: var(--primary);
    border: 1.5px solid #bfdbfe;
    padding: 8px 18px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 800;
    margin-bottom: 28px;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
    transition: all 0.3s ease;
}

.user-role-badge:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.15);
}

/* ═══════════════════ FORM FIELDS ═══════════════════ */
.field-wrap {
    margin-bottom: 22px;
}

.field-label {
    display: block;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--gray-700);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.field-input {
    width: 100%;
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    border: 2px solid var(--gray-200);
    border-radius: 14px;
    padding: 14px 18px;
    font-size: 15px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--gray-900);
    outline: none;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
}

.field-input:focus {
    border-color: var(--primary);
    background: white;
    box-shadow: 0 0 0 5px rgba(37, 99, 235, 0.1),
                0 4px 16px rgba(37, 99, 235, 0.15);
    transform: translateY(-1px);
}

.field-input::placeholder {
    color: #cbd5e1;
}

.input-eye-wrap {
    position: relative;
}

.input-eye-wrap .field-input {
    padding-right: 50px;
}

.eye-btn {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: #cbd5e1;
    transition: all 0.3s ease;
    padding: 6px;
    font-size: 18px;
}

.eye-btn:hover {
    color: var(--primary);
    transform: translateY(-50%) scale(1.1);
}

.strength-track {
    height: 6px;
    background: var(--gray-200);
    border-radius: 99px;
    margin-top: 10px;
    overflow: hidden;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
}

.strength-fill {
    height: 100%;
    border-radius: 99px;
    width: 0;
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    box-shadow: 0 0 12px;
}

.strength-fill.weak {
    width: 33%;
    background: linear-gradient(90deg, var(--danger), #f87171);
    box-shadow: 0 0 12px rgba(239, 68, 68, 0.4);
}

.strength-fill.medium {
    width: 66%;
    background: linear-gradient(90deg, var(--accent), #fbbf24);
    box-shadow: 0 0 12px rgba(245, 158, 11, 0.4);
}

.strength-fill.strong {
    width: 100%;
    background: linear-gradient(90deg, var(--success), #4ade80);
    box-shadow: 0 0 12px rgba(34, 197, 94, 0.4);
}

.strength-hint {
    font-size: 12px;
    margin-top: 8px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.strength-hint.weak {
    color: var(--danger);
}

.strength-hint.medium {
    color: var(--accent);
}

.strength-hint.strong {
    color: var(--success);
    display: flex;
    align-items: center;
    gap: 4px;
}

/* ═══════════════════ BUTTONS ═══════════════════ */
.btn-pro {
    border: none;
    border-radius: 14px;
    padding: 14px 24px;
    font-size: 14px;
    font-weight: 800;
    font-family: 'Plus Jakarta Sans', sans-serif;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
    letter-spacing: 0.3px;
}

.btn-pro::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.btn-pro:hover::before {
    left: 100%;
}

.btn-pro:hover {
    transform: translateY(-3px) scale(1.02);
}

.btn-pro:active {
    transform: translateY(-1px) scale(0.98);
}

.btn-pro:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}

.btn-blue {
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    color: white;
    box-shadow: 0 12px 32px rgba(37, 99, 235, 0.35);
    width: 100%;
}

.btn-blue:hover {
    box-shadow: 0 20px 48px rgba(37, 99, 235, 0.45);
}

.btn-cyan {
    background: linear-gradient(135deg, var(--secondary), #0ea5e9);
    color: white;
    box-shadow: 0 12px 32px rgba(8, 145, 178, 0.35);
    width: 100%;
}

.btn-cyan:hover {
    box-shadow: 0 20px 48px rgba(8, 145, 178, 0.45);
}

.btn-amber {
    background: linear-gradient(135deg, var(--accent), #fbbf24);
    color: white;
    box-shadow: 0 12px 32px rgba(245, 158, 11, 0.35);
    width: 100%;
}

.btn-amber:hover {
    box-shadow: 0 20px 48px rgba(245, 158, 11, 0.45);
}

.btn-outline {
    background: white;
    border: 2px solid var(--gray-200);
    color: var(--gray-700);
    width: 100%;
}

.btn-outline:hover {
    border-color: var(--primary);
    color: var(--primary);
    background: linear-gradient(135deg, #eff6ff, #e0f2fe);
    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.1);
}

/* ═══════════════════ ANIMATIONS ═══════════════════ */
@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%) translateY(-100%) rotate(45deg);
    }
    100% {
        transform: translateX(100%) translateY(100%) rotate(45deg);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

@keyframes spinGradient {
    to {
        transform: rotate(360deg);
    }
}

@keyframes gradientShift {
    0%, 100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

/* ═══════════════════ RESPONSIVE ═══════════════════ */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        text-align: center;
        gap: 16px;
    }

    .page-header h1 {
        font-size: 24px;
    }

    .badge-online {
        width: 100%;
        justify-content: center;
    }

    .c-head, .c-body, .c-divider {
        padding-left: 20px;
        padding-right: 20px;
    }

    .avatar-card-inner {
        padding: 28px 20px;
    }

    .btn-pro {
        width: 100%;
    }
}
</style>

<div class="profile-page">
    <div class="profile-wrapper" style="max-width:1120px;margin:0 auto">

        {{-- HEADER --}}
        <div class="page-header">
            <div class="page-header-icon">
                <i class="bi bi-person-gear"></i>
            </div>
            <div class="page-header-content">
                <h1>Pengaturan Profil</h1>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <span class="badge-online">
                <span class="dot"></span> Online
            </span>
        </div>

        <div class="row">

            {{-- KOLOM KIRI --}}
            <div class="col-lg-4 mb-4">

                {{-- CARD FOTO PROFIL --}}
                <div class="pro-card">
                    <div class="card-stripe"></div>
                    <div class="avatar-card-inner">

                        <div class="avatar-wrap" onclick="document.getElementById('avatar').click()">
                            <div class="avatar-ring-wrap"></div>
                            <img id="avatarPreview"
     src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
     alt="Avatar">
                            <div class="avatar-overlay">
                                <i class="bi bi-camera-fill"></i>
                                <span>Ganti Foto</span>
                            </div>
                        </div>

                        <div class="user-name">{{ $user->name }}</div>
                        <div class="user-role-badge">
                            <i class="bi bi-patch-check-fill"></i>
                            {{ ucfirst(auth()->user()->role->role ?? 'User') }}
                        </div>

                        <form id="updateAvatar" enctype="multipart/form-data" style="width:100%">
                            @csrf
                            @method('put')
                            <input type="file" id="avatar" name="avatar"
                                   accept="image/png,image/jpeg" hidden>

                            <button type="button"
                                    onclick="document.getElementById('avatar').click()"
                                    class="btn-pro btn-outline mb-3">
                                <i class="bi bi-image"></i> Pilih Foto
                            </button>

                            <button type="submit" id="btnUploadAvatar"
                                    class="btn-pro btn-cyan" disabled>
                                <i class="bi bi-cloud-upload"></i> Upload Foto
                            </button>

                            <p style="font-size:11px;color:#94a3b8;text-align:center;margin-top:12px;margin-bottom:0;letter-spacing:0.5px;">
                                📷 JPG / PNG · Maks 10 MB
                            </p>
                        </form>

                    </div>
                </div>

                {{-- CARD PENGATURAN INSTANSI — hanya superadmin --}}
                @if($isSuperAdmin)
                <div class="pro-card mt-4">
                    <div class="card-stripe"></div>
                    <div style="padding:28px 32px;">
                        <div style="display:flex;align-items:center;gap:14px;margin-bottom:18px;">
                            <div class="c-head-icon blue">
                                <i class="bi bi-building-gear"></i>
                            </div>
                            <div>
                                <div style="font-size:16px;font-weight:800;color:var(--gray-900);margin:0;">Pengaturan Sekolah</div>
                                <div style="font-size:12px;color:#94a3b8;margin:4px 0 0;">Data sekolah & TTD PDF</div>
                            </div>
                        </div>
                        <button type="button" class="btn-pro btn-blue"
                                data-toggle="modal" data-target="#modalInstansi">
                            <i class="bi bi-gear"></i> Kelola
                        </button>
                    </div>
                </div>
                @endif

            </div>

            {{-- KOLOM KANAN --}}
            <div class="col-lg-8">

                {{-- INFO AKUN --}}
                <div class="pro-card mb-4">
                    <div class="card-stripe"></div>
                    <div class="c-head">
                        <div class="c-head-icon blue"><i class="bi bi-person-fill"></i></div>
                        <div>
                            <h3>Informasi Akun</h3>
                            <p>Perbarui nama dan email anda</p>
                        </div>
                    </div>
                    <div class="c-divider"></div>
                    <div class="c-body">
                        <form id="updateProfile">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-wrap">
                                        <label class="field-label"><i class="bi bi-person"></i>Nama Pengguna</label>
                                        <input type="text" class="field-input" id="name"
                                               value="{{ $user->name }}" placeholder="Nama kamu...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-wrap">
                                        <label class="field-label"><i class="bi bi-envelope"></i>Email Aktif</label>
                                        <input type="email" class="field-input" id="email"
                                               value="{{ $user->email }}" placeholder="email@domain.com">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-pro btn-blue">
                                <i class="bi bi-floppy2-fill"></i> Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>

                {{-- KEAMANAN --}}
                <div class="pro-card">
                    <div class="card-stripe amber"></div>
                    <div class="c-head">
                        <div class="c-head-icon amber"><i class="bi bi-shield-lock-fill"></i></div>
                        <div>
                            <h3>Keamanan Akun</h3>
                            <p>Ganti password secara berkala</p>
                        </div>
                    </div>
                    <div class="c-divider"></div>
                    <div class="c-body">
                        <form id="ubahPassword">
                            @csrf

                            <div class="field-wrap">
                                <label class="field-label"><i class="bi bi-key"></i>Password Lama</label>
                                <div class="input-eye-wrap">
                                    <input type="password" class="field-input" id="current_password"
                                           placeholder="Masukkan password lama">
                                    <button type="button" class="eye-btn" data-target="current_password">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-wrap">
                                        <label class="field-label"><i class="bi bi-lock"></i>Password Baru</label>
                                        <div class="input-eye-wrap">
                                            <input type="password" class="field-input" id="passwordNew"
                                                   placeholder="Min. 8 karakter">
                                            <button type="button" class="eye-btn" data-target="passwordNew">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        <div class="strength-track">
                                            <div class="strength-fill" id="strengthFill"></div>
                                        </div>
                                        <div class="strength-hint" id="strengthHint"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-wrap">
                                        <label class="field-label"><i class="bi bi-lock-fill"></i>Konfirmasi Password</label>
                                        <div class="input-eye-wrap">
                                            <input type="password" class="field-input" id="konfirmasiPassword"
                                                   placeholder="Ulangi password baru">
                                            <button type="button" class="eye-btn" data-target="konfirmasiPassword">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn-pro btn-amber">
                                <i class="bi bi-shield-check"></i> Update Password
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')

{{-- ═══════════════════ MODAL PENGATURAN INSTANSI ═══════════════════ --}}
@if($isSuperAdmin)
<div class="modal fade" id="modalInstansi" tabindex="-1" role="dialog"
     aria-labelledby="modalInstansiLabel" aria-hidden="true"
     style="font-family:'Plus Jakarta Sans',sans-serif;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:24px;border:none;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.25);">

            {{-- Header --}}
            <div style="background:linear-gradient(135deg,#2563eb,#3b82f6);padding:28px;display:flex;align-items:center;gap:16px;position:relative;overflow:hidden;">
                <div style="position:absolute;top:-50%;right:-10%;width:300px;height:300px;background:radial-gradient(circle,rgba(255,255,255,0.1),transparent);border-radius:50%;"></div>
                <div style="width:48px;height:48px;border-radius:14px;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;font-size:24px;color:#fff;flex-shrink:0;position:relative;z-index:1;">
                    <i class="bi bi-building-gear"></i>
                </div>
                <div style="flex:1;position:relative;z-index:1;">
                    <h5 id="modalInstansiLabel" style="margin:0;color:#fff;font-weight:900;font-size:18px;letter-spacing:-0.3px;">
                        Pengaturan Instansi
                    </h5>
                    <p style="margin:6px 0 0;color:rgba(255,255,255,.8);font-size:12px;">
                        Kelola Data Sekolah & TTD Laporan PDF
                    </p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="color:#fff;opacity:.9;text-shadow:none;font-size:28px;background:none;border:none;padding:0;line-height:1;position:relative;z-index:1;transition:all 0.3s ease;" onmouseover="this.style.transform='scale(1.1) rotate(90deg)'" onmouseout="this.style.transform='scale(1) rotate(0deg)'">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- Body --}}
            <div class="modal-body" style="padding:32px;">
                <form id="updateSetting">
                    @csrf
                    @method('patch')

                    <div class="field-wrap">
                        <label class="field-label"><i class="bi bi-building"></i>Nama Sekolah</label>
                        <input type="text" class="field-input" id="nama_instansi"
                               value="{{ $setting->nama_instansi ?? '' }}"
                               placeholder="Nama instansi...">
                    </div>

                    <div style="height:2px;background:linear-gradient(90deg,transparent,#e2e8f0,transparent);margin:28px 0;"></div>
                    <p style="font-size:11px;font-weight:900;text-transform:uppercase;letter-spacing:1.5px;color:#94a3b8;margin-bottom:18px;">
                        <i class="bi bi-pen"></i> Kolom Tanda Tangan
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-wrap">
                                <label class="field-label"><i class="bi bi-person-badge"></i>Kepala Sekolah</label>
                                <input type="text" class="field-input" id="nama_kepsek"
                                       value="{{ $setting->nama_kepsek ?? '' }}"
                                       placeholder="Nama kepala sekolah...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-wrap">
                                <label class="field-label"><i class="bi bi-card-text"></i>NIP/NUPTK</label>
                                <input type="text" class="field-input" id="nip_kepsek"
                                       value="{{ $setting->nip_kepsek ?? '' }}"
                                       placeholder="NIP kepala sekolah...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-wrap">
                                <label class="field-label"><i class="bi bi-person-badge"></i>Waka Sarpras</label>
                                <input type="text" class="field-input" id="nama_waka"
                                       value="{{ $setting->nama_waka ?? '' }}"
                                       placeholder="Nama waka sarpras...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-wrap">
                                <label class="field-label"><i class="bi bi-card-text"></i>NIP/NUPTK</label>
                                <input type="text" class="field-input" id="nuptk_waka"
                                       value="{{ $setting->nuptk_waka ?? '' }}"
                                       placeholder="NUPTK waka sarpras...">
                            </div>
                        </div>
                    </div>

                    <div style="display:flex;gap:12px;margin-top:28px;">
                        <button type="button" class="btn-pro" data-dismiss="modal"
                                style="width:auto;padding:12px 28px;background:linear-gradient(135deg,#ef4444,#f87171);color:#fff;box-shadow:0 8px 20px rgba(239,68,68,.3);">
                            <i class="bi bi-x-lg"></i> Batal
                        </button>
                        <button type="submit" class="btn-pro btn-blue" style="flex:1;">
                            <i class="bi bi-building-check"></i> Simpan Pengaturan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function () {

    // ── TOGGLE PASSWORD ──
    $(document).on('click', '.eye-btn', function () {
        let id = $(this).data('target');
        let inp = $('#' + id);
        let icon = $(this).find('i');
        if (inp.attr('type') === 'password') {
            inp.attr('type', 'text');
            icon.removeClass('bi-eye').addClass('bi-eye-slash');
        } else {
            inp.attr('type', 'password');
            icon.removeClass('bi-eye-slash').addClass('bi-eye');
        }
    });

    // ── PASSWORD STRENGTH ──
    $('#passwordNew').on('input', function () {
        let v = $(this).val();
        let fill = $('#strengthFill').removeClass('weak medium strong');
        let hint = $('#strengthHint').removeClass('weak medium strong');
        if (!v) { hint.text(''); return; }
        let score = 0;
        if (v.length >= 8) score++;
        if (/[A-Z]/.test(v)) score++;
        if (/[0-9]/.test(v)) score++;
        if (/[^A-Za-z0-9]/.test(v)) score++;
        if (score <= 1) { fill.addClass('weak'); hint.addClass('weak').text('Lemah'); }
        else if (score <= 3) { fill.addClass('medium'); hint.addClass('medium').text('Sedang'); }
        else { fill.addClass('strong'); hint.addClass('strong').html('Kuat ✓'); }
    });

    // ── PREVIEW AVATAR ──
    $('#avatar').on('change', function () {
        if (!this.files[0]) return;
        $('#avatarPreview').attr('src', URL.createObjectURL(this.files[0]));
        $('#btnUploadAvatar').prop('disabled', false);
    });

    // ── UPLOAD AVATAR ──
    $('#updateAvatar').submit(function (e) {
        e.preventDefault();
        let file = $('#avatar')[0].files[0];
        if (!file) { Swal.fire('Peringatan', 'Pilih foto terlebih dahulu', 'warning'); return; }
        if (file.size > 10 * 1024 * 1024) { Swal.fire('Gagal', 'Ukuran maksimal 10 MB', 'error'); return; }
        let btn = $('#btnUploadAvatar');
        btn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Mengupload...');
        $.ajax({
            url: '/profile/avatar', type: 'POST',
            data: new FormData(this), contentType: false, processData: false,
            success: function (res) {
                Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, timer: 2000, showConfirmButton: false })
                    .then(() => location.reload());
            },
            error: function () {
                Swal.fire('Gagal', 'Upload gagal, coba lagi', 'error');
                btn.prop('disabled', false).html('<i class="bi bi-cloud-upload"></i> Upload Foto');
            }
        });
    });

    // ── UPDATE PROFILE ──
    $('#updateProfile').submit(function (e) {
        e.preventDefault();
        let btn = $(this).find('[type=submit]');
        btn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Menyimpan...');
        $.post('/pengaturan', {
            name: $('#name').val(), email: $('#email').val(),
            _token: $("meta[name='csrf-token']").attr('content'), _method: 'PATCH'
        }, function (res) {
            Swal.fire({ icon: 'success', title: 'Tersimpan!', text: res.message, timer: 2000, showConfirmButton: false });
        }).always(() => btn.prop('disabled', false).html('<i class="bi bi-floppy2-fill"></i> Simpan Perubahan'));
    });

    // ── UPDATE SETTING INSTANSI ──
    $('#updateSetting').submit(function (e) {
        e.preventDefault();
        let btn = $(this).find('[type=submit]');
        btn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Menyimpan...');
        $.post('/update-setting', {
            nama_instansi : $('#nama_instansi').val(),
            nama_kepsek   : $('#nama_kepsek').val(),
            nip_kepsek    : $('#nip_kepsek').val(),
            nama_waka     : $('#nama_waka').val(),
            nuptk_waka    : $('#nuptk_waka').val(),
            _token        : $("meta[name='csrf-token']").attr('content'),
            _method       : 'PATCH'
        }, function (res) {
            Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, timer: 2000, showConfirmButton: false })
                .then(() => {
                    $('#modalInstansi').modal('hide');
                    location.reload();
                });
        }).fail(function (xhr) {
            Swal.fire('Gagal', xhr.responseJSON?.message ?? 'Terjadi kesalahan', 'error');
            btn.prop('disabled', false).html('<i class="bi bi-building-check"></i> Simpan Pengaturan');
        });
    });

    // ── UBAH PASSWORD ──
    $('#ubahPassword').submit(function (e) {
        e.preventDefault();
        let newPw = $('#passwordNew').val(), confirmPw = $('#konfirmasiPassword').val();
        if (newPw !== confirmPw) { Swal.fire('Gagal', 'Konfirmasi password tidak cocok!', 'error'); return; }
        if (newPw.length < 8) { Swal.fire('Peringatan', 'Password minimal 8 karakter', 'warning'); return; }
        let btn = $(this).find('[type=submit]');
        btn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Memperbarui...');
        $.post('/ubah-password', {
            current_password: $('#current_password').val(),
            passwordNew: newPw, konfirmasiPassword: confirmPw,
            _token: $("meta[name='csrf-token']").attr('content')
        }, function (res) {
            Swal.fire({ icon: 'success', title: 'Password Diperbarui!', text: res.message, timer: 2000, showConfirmButton: false });
            $('#ubahPassword')[0].reset();
            $('#strengthFill').css('width','0').removeClass('weak medium strong');
            $('#strengthHint').text('');
        }).always(() => btn.prop('disabled', false).html('<i class="bi bi-shield-check"></i> Update Password'));
    });

});
</script>
@endpush