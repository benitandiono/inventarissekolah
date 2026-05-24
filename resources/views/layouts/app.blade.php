<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Aplikasi Inventaris Sekolah</title>

<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=3">
<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}?v=3">
<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=3">

<script>
  document.documentElement.style.visibility = 'hidden';
</script>

  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <style>
:root {
  --primary: #2563eb;
  --primary-soft: #e0e7ff;
  --secondary: #06b6d4;
  --bg-main: #f8fafc;
  --bg-card: #ffffff;
  --text-main: #0f172a;
  --text-muted: #64748b;
  --border-soft: #e5e7eb;
}
body { font-family: 'Inter', 'Segoe UI', sans-serif; background: linear-gradient(180deg, #f8fafc, #eef2ff); color: var(--text-main); }
.main-navbar { background: linear-gradient(135deg, #2563eb, #1d4ed8); box-shadow: 0 6px 20px rgba(37,99,235,.35); }
.main-navbar .nav-link, .main-navbar .navbar-brand { color: #ffffff !important; }
.navbar-brand { font-size: 26px; font-weight: 800; letter-spacing: 2px; }
.main-sidebar { background: #ffffff; border-right: 1px solid var(--border-soft); }
.sidebar-brand { padding: 25px 0; }
.sidebar-logo { height: 85px; }
.sidebar-menu .nav-link { margin: 5px 12px; padding: 12px 16px; border-radius: 12px; color: var(--text-muted); font-weight: 500; transition: all .3s ease; }
.sidebar-menu .nav-link i { color: var(--text-muted); }
.sidebar-menu .nav-link:hover { background: var(--primary-soft); color: var(--primary); }
.sidebar-menu .nav-link.active { background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff !important; box-shadow: 0 10px 20px rgba(37,99,235,.35); }
.sidebar-menu .nav-link.active i { color: #fff; }
.menu-header { margin: 18px 20px 8px; font-size: 11px; font-weight: 600; letter-spacing: 1px; color: var(--text-muted); }
.main-content { padding-top: 95px; }
.section { background: transparent; }
.card { background: var(--bg-card); border: none; border-radius: 18px; box-shadow: 0 10px 25px rgba(0,0,0,.08); }
.card-header { background: transparent; border-bottom: 1px solid var(--border-soft); font-weight: 700; }
.card-body { padding: 26px; }
.table { color: var(--text-main); }
.table thead th { border-bottom: 2px solid var(--border-soft); color: var(--text-main); }
.table tbody tr:hover { background: #f1f5f9; }
.btn { border-radius: 12px; font-weight: 600; }
.btn-primary { background: linear-gradient(135deg, #2563eb, #1d4ed8); border: none; }
.btn-primary:hover { opacity: .9; }
.dropdown-menu { border-radius: 14px; box-shadow: 0 15px 30px rgba(0,0,0,.12); }
.main-footer { background: #ffffff; border-top: 1px solid var(--border-soft); color: var(--text-muted); }
</style>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>

  <style>
.card { background: linear-gradient(180deg, #ffffff, #f8fafc); border-radius: 22px; border: 1px solid #e5e7eb; box-shadow: 0 8px 25px rgba(0,0,0,.08), 0 1px 0 rgba(255,255,255,.9) inset; transition: all .35s ease; }
.card:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(37,99,235,.15), 0 1px 0 rgba(255,255,255,1) inset; }
.card-header { padding: 18px 24px; font-size: 15px; font-weight: 700; color: #0f172a; border-bottom: 1px solid #e5e7eb; }
.card-body { padding: 28px; font-size: 14px; }
.card-statistic-1, .card-statistic-2, .card-statistic-3 { border-radius: 24px; overflow: hidden; }
.card-statistic-1 .card-icon, .card-statistic-2 .card-icon, .card-statistic-3 .card-icon { background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff; border-radius: 16px; box-shadow: 0 8px 18px rgba(37,99,235,.35); }
</style>

<style>
.aksi-vertical { display: flex; flex-direction: column; align-items: center; gap: 8px; }
.aksi-btn { width: 42px; height: 42px; border-radius: 10px; display: flex; align-items: center; justify-content: center; padding: 0; }
.btn-view   { background-color: #4fc3f7; color: #fff; }
.btn-edit   { background-color: #ffb74d; color: #fff; }
.btn-reset  { background-color: #4dd0e1; color: #fff; }
.btn-delete { background-color: #ff5252; color: #fff; }
.aksi-btn i { font-size: 16px; }
</style>

<style>
.sidebar-logo { width: 100px; height: 100px; border-radius: 50%; background: #ffffff; padding: 10px; object-fit: contain; box-shadow: 0 6px 18px rgba(37,99,235,.35); display: block; margin: 0 auto; }
</style>

<style>
.card .card-icon, .card-statistic-1 .card-icon, .card-statistic-2 .card-icon, .card-statistic-3 .card-icon { width: 64px; height: 64px; border-radius: 18px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #2563eb, #1d4ed8); box-shadow: 0 10px 25px rgba(37,99,235,.35), inset 0 1px 0 rgba(255,255,255,.35); transition: all .3s ease; }
.card .card-icon i, .card-statistic-1 .card-icon i, .card-statistic-2 .card-icon i, .card-statistic-3 .card-icon i { font-size: 26px; color: #ffffff; }
.card:hover .card-icon { transform: scale(1.08) rotate(-2deg); box-shadow: 0 18px 35px rgba(37,99,235,.45); }
.icon-blue   { background: linear-gradient(135deg, #2563eb, #1d4ed8) !important; }
.icon-green  { background: linear-gradient(135deg, #16a34a, #22c55e) !important; }
.icon-orange { background: linear-gradient(135deg, #f97316, #fb923c) !important; }
.icon-purple { background: linear-gradient(135deg, #7c3aed, #8b5cf6) !important; }
.icon-red    { background: linear-gradient(135deg, #dc2626, #ef4444) !important; }
.main-sidebar { background: linear-gradient(180deg, #ffffff, #f8fafc); border-right: 1px solid #e5e7eb; box-shadow: 4px 0 18px rgba(0,0,0,.06); }
.sidebar-brand { padding: 28px 0 22px; text-align: center; }
.sidebar-logo { width: 92px; height: 92px; border-radius: 50%; background: #fff; padding: 12px; object-fit: contain; box-shadow: 0 10px 26px rgba(37,99,235,.35); }
.sidebar-menu { padding: 8px 0; }
.sidebar-menu li { position: relative; }
.sidebar-menu .nav-link { margin: 6px 14px; padding: 13px 18px; border-radius: 14px; display: flex; align-items: center; gap: 14px; font-size: 14px; font-weight: 600; color: #475569; transition: all .35s ease; }
.sidebar-menu .nav-link i { width: 22px; text-align: center; font-size: 16px; color: #64748b; transition: .35s; }
.sidebar-menu .nav-link:hover { background: linear-gradient(135deg, #e0e7ff, #f0f9ff); color: #2563eb; }
.sidebar-menu .nav-link:hover i { color: #2563eb; transform: scale(1.1); }
.sidebar-menu .nav-link.active { background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff !important; box-shadow: 0 14px 28px rgba(37,99,235,.45); }
.sidebar-menu .nav-link.active i { color: #fff; }
.sidebar-menu .nav-link.active::before { content: ''; position: absolute; left: -14px; top: 50%; transform: translateY(-50%); width: 6px; height: 60%; background: #2563eb; border-radius: 0 8px 8px 0; }
.menu-header { margin: 22px 24px 10px; font-size: 11px; font-weight: 700; letter-spacing: 1.5px; color: #94a3b8; }
.sidebar-menu .dropdown-menu { background: transparent; border: none; padding-left: 12px; }
.sidebar-menu .dropdown-menu .nav-link { margin: 6px 0; padding: 11px 18px; font-size: 13px; border-radius: 12px; background: transparent; }
.sidebar-menu .dropdown-menu .nav-link:hover { background: #eef2ff; }
.sidebar-menu .dropdown-menu .nav-link.active { background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff; }
.sidebar-menu .has-dropdown::after { content: '\f107'; font-family: 'Font Awesome 5 Free'; font-weight: 900; position: absolute; right: 22px; transition: transform .3s; }
.sidebar-menu .has-dropdown.active::after { transform: rotate(180deg); }
</style>

<style>
/* PAGE LOADER — SEMI TRANSPARAN */
#page-loader {
  position: fixed; inset: 0;
  background: rgba(248, 250, 252, 0.45);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  display: flex; align-items: center; justify-content: center;
  z-index: 999999;
  transition: opacity .6s ease, visibility .6s;
  overflow: hidden;
}
#page-loader::before {
  content: '';
  position: absolute; inset: 0;
  background-image:
    radial-gradient(circle at 20% 20%, rgba(37,99,235,0.04) 0%, transparent 50%),
    radial-gradient(circle at 80% 80%, rgba(6,182,212,0.03) 0%, transparent 50%);
  animation: bgShift 4s ease-in-out infinite alternate;
}
#page-loader::after {
  content: '';
  position: absolute; inset: 0;
  background-image: radial-gradient(circle, rgba(37,99,235,0.03) 1px, transparent 1px);
  background-size: 32px 32px;
}
#page-loader.hide { opacity: 0; visibility: hidden; pointer-events: none; }

.loader-content {
  position: relative; z-index: 2;
  text-align: center;
  display: flex; flex-direction: column; align-items: center; gap: 0;
}
.loader-logo-wrapper {
  position: relative; width: 110px; height: 110px; margin-bottom: 28px;
}
.loader-logo {
  width: 80px; height: 80px;
  border-radius: 50%;
  object-fit: contain;
  background: #ffffff;
  padding: 8px;
  position: absolute; top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 4px 24px rgba(37,99,235,0.12), 0 1px 4px rgba(0,0,0,0.06);
  animation: logoPulse 2s ease-in-out infinite;
  z-index: 2;
}
.loader-ring-outer {
  position: absolute; inset: 0;
  border-radius: 50%;
  border: 2.5px solid transparent;
  border-top-color: #2563eb;
  border-right-color: #06b6d4;
  animation: spinOuter 1.2s linear infinite;
}
.loader-ring-inner {
  position: absolute; inset: 10px;
  border-radius: 50%;
  border: 2.5px solid transparent;
  border-bottom-color: #6366f1;
  border-left-color: #2563eb;
  animation: spinInner 0.8s linear infinite reverse;
}
.loader-orbit-dot {
  position: absolute;
  width: 8px; height: 8px;
  background: #2563eb;
  border-radius: 50%;
  top: -4px; left: 50%;
  transform-origin: 0 59px;
  box-shadow: 0 0 8px rgba(37,99,235,0.45);
  animation: orbitDot 1.2s linear infinite;
}
.loader-title {
  font-family: 'Segoe UI', sans-serif;
  font-size: 18px; font-weight: 700;
  color: #1e293b;
  letter-spacing: 2px;
  margin-bottom: 6px;
  animation: fadeInUp 0.8s ease both;
}
.loader-subtitle {
  font-size: 12px;
  color: #64748b;
  letter-spacing: 3px;
  text-transform: uppercase;
  margin-bottom: 28px;
  animation: fadeInUp 0.8s ease 0.1s both;
}
.loader-progress-track {
  width: 200px; height: 3px;
  background: rgba(37,99,235,0.10);
  border-radius: 99px;
  overflow: hidden;
  margin-bottom: 14px;
  animation: fadeInUp 0.8s ease 0.2s both;
}
.loader-progress-fill {
  height: 100%; width: 0%;
  background: linear-gradient(90deg, #2563eb, #06b6d4, #6366f1);
  border-radius: 99px;
  animation: progressFill 2s ease-in-out forwards;
  box-shadow: 0 0 8px rgba(37,99,235,0.25);
}
.loader-status {
  font-size: 11px;
  color: #94a3b8;
  letter-spacing: 1px;
  animation: fadeInUp 0.8s ease 0.3s both;
  min-height: 16px;
}

@keyframes spinOuter  { to { transform: rotate(360deg); } }
@keyframes spinInner  { to { transform: rotate(360deg); } }
@keyframes orbitDot   { to { transform: rotate(360deg); } }
@keyframes logoPulse  {
  0%,100% { box-shadow: 0 4px 24px rgba(37,99,235,0.12), 0 1px 4px rgba(0,0,0,0.06); transform: translate(-50%,-50%) scale(1); }
  50%     { box-shadow: 0 8px 32px rgba(37,99,235,0.20), 0 1px 4px rgba(0,0,0,0.06); transform: translate(-50%,-50%) scale(1.05); }
}
@keyframes bgShift    { from { opacity: 0.9; } to { opacity: 1; } }
@keyframes progressFill { 0%{width:0%} 30%{width:40%} 60%{width:70%} 85%{width:88%} 100%{width:100%} }
@keyframes fadeInUp   { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }
</style>

{{-- ===== MODAL INFO UPDATE — STYLE ===== --}}
@push('head')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@endpush

<style>
/* ===================== MODAL INFO ===================== */
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

#updateModal .modal-content {
    border: none;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(15,23,42,.25);
    font-family: 'Plus Jakarta Sans', sans-serif;
}

#updateModal .modal-header {
    background: linear-gradient(135deg, #4f46e5, #06b6d4);
    border: none;
    padding: 20px 28px;
    position: relative;
    overflow: hidden;
}

#updateModal .modal-header::before {
    content: '';
    position: absolute;
    top: -40px; right: -40px;
    width: 140px; height: 140px;
    border-radius: 50%;
    background: rgba(255,255,255,.07);
    pointer-events: none;
}

#updateModal .modal-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 16px;
    font-weight: 800;
    letter-spacing: -.2px;
}

#updateModal .close {
    color: #fff;
    opacity: .8;
    text-shadow: none;
    font-size: 22px;
}

#updateModal .close:hover { opacity: 1; }

/* DEV CARD */
.dev-card {
    background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
    padding: 24px 28px;
    color: #fff;
    position: relative;
    overflow: hidden;
}
.dev-card::before { content:''; position:absolute; top:-40px; right:-40px; width:160px; height:160px; border-radius:50%; background:rgba(255,255,255,.07); pointer-events:none; }
.dev-card::after  { content:''; position:absolute; bottom:-50px; left:60px; width:120px; height:120px; border-radius:50%; background:rgba(255,255,255,.05); pointer-events:none; }
.dev-avatar { width:52px; height:52px; border-radius:14px; background:rgba(255,255,255,.2); border:2px solid rgba(255,255,255,.3); display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:12px; }
.dev-name { font-size:16px; font-weight:800; margin:0 0 4px; letter-spacing:-.2px; }
.dev-role { font-size:12px; font-weight:600; opacity:.75; margin:0 0 14px; }
.dev-tags { display:flex; flex-wrap:wrap; gap:6px; }
.dev-tag { display:inline-flex; align-items:center; gap:5px; background:rgba(255,255,255,.15); border:1px solid rgba(255,255,255,.2); border-radius:99px; padding:3px 10px; font-size:11px; font-weight:700; backdrop-filter:blur(6px); }
.dev-tag i { font-size:10px; opacity:.85; }

/* CHANGELOG */
.changelog-wrap { padding: 20px 24px 8px; }
.changelog-title { font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:.8px; color:#94a3b8; margin-bottom:14px; display:flex; align-items:center; justify-content:space-between; }
.changelog-count { font-size:11px; font-weight:700; background:#f1f5f9; color:#64748b; border-radius:99px; padding:2px 10px; }

/* SCROLL AREA */
.changelog-scroll {
    max-height: 320px;
    overflow-y: auto;
    padding-right: 4px;
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 #f1f5f9;
}
.changelog-scroll::-webkit-scrollbar { width: 5px; }
.changelog-scroll::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 99px; }
.changelog-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 99px; }
.changelog-scroll::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

.version-card { border:1.5px solid #e2e8f0; border-radius:14px; overflow:hidden; margin-bottom:12px; }
.version-card:last-child { margin-bottom: 4px; }
.version-header { display:flex; align-items:center; gap:10px; padding:12px 16px; background:#f8fafc; border-bottom:1px solid #e2e8f0; }
.version-badge { display:inline-flex; align-items:center; gap:5px; background:linear-gradient(135deg,#4f46e5,#06b6d4); color:#fff; border-radius:99px; padding:3px 10px; font-size:12px; font-weight:800; letter-spacing:-.2px; }
.version-label { font-size:12px; font-weight:700; color:#64748b; }
.version-dot { width:6px; height:6px; border-radius:50%; background:#10b981; margin-left:auto; box-shadow:0 0 0 3px rgba(16,185,129,.2); animation:pulse-dot 2s infinite; }
@keyframes pulse-dot { 0%,100%{box-shadow:0 0 0 3px rgba(16,185,129,.2);} 50%{box-shadow:0 0 0 6px rgba(16,185,129,.08);} }
.version-list { padding:12px 16px; display:flex; flex-direction:column; gap:8px; }
.version-item { display:flex; align-items:flex-start; gap:10px; font-size:13px; font-weight:600; color:#334155; line-height:1.5; }
.version-item-icon { width:22px; height:22px; border-radius:6px; display:flex; align-items:center; justify-content:center; font-size:11px; flex-shrink:0; margin-top:1px; }
.icon-auth   { background:#ede9fe; color:#7c3aed; }
.icon-role   { background:#dbeafe; color:#2563eb; }
.icon-report { background:#fef9c3; color:#b45309; }
.icon-dash   { background:#dcfce7; color:#15803d; }
.icon-crud   { background:#fee2e2; color:#b91c1c; }
.icon-stock  { background:#e0f2fe; color:#0369a1; }
.icon-user   { background:#fce7f3; color:#be185d; }
.icon-reset  { background:#f3f4f6; color:#374151; }

/* MODAL FOOTER */
.modal-info-footer { padding:14px 24px; border-top:1px solid #f1f5f9; display:flex; align-items:center; justify-content:space-between; gap:10px; }
.footer-note { font-size:11px; color:#94a3b8; font-weight:600; }
.btn-tutup { display:inline-flex; align-items:center; gap:6px; padding:8px 20px; border-radius:99px; background:linear-gradient(135deg,#ef4444,#f87171); color:#fff; font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; border:none; cursor:pointer; box-shadow:0 4px 12px rgba(239,68,68,.3); transition:transform .2s ease,box-shadow .2s ease; }
.btn-tutup:hover { transform:translateY(-2px); box-shadow:0 8px 20px rgba(239,68,68,.4); color:#fff; }
</style>

{{-- FORCE FAVICON --}}
<script>
(function() {
    var timestamp = new Date().getTime();
    var link = document.querySelector("link[rel*='icon']") || document.createElement('link');
    link.type = 'image/png'; link.rel = 'shortcut icon';
    link.href = '/favicon.png?t=' + timestamp;
    document.getElementsByTagName('head')[0].appendChild(link);
})();
</script>

{{-- ================= MOBILE RESPONSIVE STYLES ================= --}}
<style>
  /* ==================== MOBILE RESPONSIVE (≤991.98px) ==================== */
  @media (max-width: 991.98px) {
    /* === NAVBAR === */
    .main-navbar {
      padding: 12px 16px;
      height: auto;
    }

    .navbar-brand {
      display: none !important;
    }

    .main-navbar .navbar-brand {
      font-size: 18px;
      letter-spacing: 1px;
      margin-left: 0 !important;
    }

    .main-navbar .form-inline .navbar-nav {
      margin-right: 0 !important;
    }

    .navbar-right {
      margin-right: 0;
    }

    .nav-link-user-pro {
      gap: 8px !important;
    }

    .d-sm-none.d-lg-inline-block {
      display: none !important;
    }

    .avatar-pro-wrapper {
      width: 40px;
      height: 40px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    /* === SIDEBAR DRAWER === */
    .main-sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: 280px;
      height: 100vh;
      z-index: 1040;
      transform: translateX(-100%);
      transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      overflow-y: auto;
      -webkit-overflow-scrolling: touch;
      box-shadow: none;
      border-right: none;
    }

    .main-sidebar.show {
      transform: translateX(0);
      box-shadow: 8px 0 28px rgba(0,0,0,0.15);
    }

    .sidebar-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0);
      z-index: 1035;
      opacity: 0;
      visibility: hidden;
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .sidebar-overlay.show {
      background: rgba(0, 0, 0, 0.5);
      opacity: 1;
      visibility: visible;
    }

    .sidebar-brand {
      padding: 20px 0 16px;
    }

    .sidebar-logo {
      width: 70px;
      height: 70px;
      box-shadow: 0 6px 16px rgba(37,99,235,0.25);
    }

    .sidebar-menu .nav-link {
      margin: 4px 10px;
      padding: 11px 14px;
      gap: 12px;
      font-size: 13px;
    }

    .sidebar-menu .nav-link i {
      width: 20px;
      font-size: 16px;
    }

    .menu-header {
      margin: 16px 16px 8px;
      font-size: 10px;
    }

    /* === MAIN CONTENT === */
    .main-content {
      padding-top: 70px;
      padding-bottom: 80px;
      padding-left: 0;
      padding-right: 0;
    }

    .section-body {
      padding: 16px 12px;
    }

    /* === CARDS & CONTENT === */
    .card {
      border-radius: 16px;
      margin-bottom: 12px;
    }

    .card-header {
      padding: 14px 16px;
      font-size: 14px;
    }

    .card-body {
      padding: 16px;
    }

    /* === TABLE RESPONSIVE === */
    .table-responsive {
      border-radius: 12px;
    }

    .table {
      font-size: 12px;
      margin-bottom: 0;
    }

    .table thead th {
      padding: 10px 8px;
      font-size: 11px;
      font-weight: 700;
    }

    .table tbody td {
      padding: 10px 8px;
      font-size: 12px;
      vertical-align: middle;
    }

    /* === BUTTONS === */
    .btn {
      padding: 8px 14px;
      font-size: 12px;
      border-radius: 10px;
    }

    .btn-sm {
      padding: 6px 10px;
      font-size: 11px;
    }

    .aksi-btn {
      width: 36px;
      height: 36px;
      border-radius: 8px;
    }

    .aksi-btn i {
      font-size: 14px;
    }

    /* === FOOTER === */
    .main-footer {
      padding: 12px 16px;
      font-size: 12px;
      background: #ffffff;
    }

    .footer-left, .footer-right {
      padding: 0;
    }

    /* === CLOSE BUTTON FOR DRAWER === */
    .sidebar-close-btn {
      display: none;
    }

    .sidebar-overlay.show ~ .main-sidebar .sidebar-close-btn {
      display: flex;
    }
  }

  /* ==================== BOTTOM NAVIGATION (≤991.98px) ==================== */
  @media (max-width: 991.98px) {
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: 70px;
      background: linear-gradient(180deg, #ffffff, #f8fafc);
      border-top: 1.5px solid #e5e7eb;
      box-shadow: 0 -8px 25px rgba(0,0,0,0.08);
      z-index: 1030;
      display: flex;
      justify-content: space-around;
      align-items: flex-start;
      padding-top: 8px;
    }

    .bottom-nav-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 4px;
      padding: 6px 0;
      flex: 1;
      text-decoration: none;
      color: #64748b;
      font-size: 11px;
      font-weight: 600;
      transition: all 0.25s ease;
      border-radius: 12px 12px 0 0;
      margin: 0 6px;
    }

    .bottom-nav-item i {
      font-size: 20px;
      color: #94a3b8;
      transition: all 0.25s ease;
    }

    .bottom-nav-item.active {
      color: #2563eb;
      background: linear-gradient(180deg, rgba(229,231,235,0.4), transparent);
    }

    .bottom-nav-item.active i {
      color: #2563eb;
      transform: scale(1.15);
    }

    .bottom-nav-item:active {
      transform: scale(0.95);
    }

    /* === SAFE AREA SUPPORT === */
    @supports (padding: max(0px)) {
      .bottom-nav {
        padding-bottom: max(8px, env(safe-area-inset-bottom));
      }

      .main-content {
        padding-bottom: calc(80px + env(safe-area-inset-bottom));
      }
    }
  }

  /* === EXTRA SMALL DEVICES (≤576px) === */
  @media (max-width: 576px) {
    .main-navbar .navbar-brand {
      font-size: 16px;
      letter-spacing: 0;
    }

    .section-body {
      padding: 12px 10px;
    }

    .card {
      border-radius: 14px;
      margin-bottom: 10px;
    }

    .card-body {
      padding: 14px;
    }

    .table {
      font-size: 11px;
    }

    .table thead th {
      padding: 8px 6px;
      font-size: 10px;
    }

    .table tbody td {
      padding: 8px 6px;
      font-size: 11px;
    }

    .btn {
      padding: 6px 12px;
      font-size: 11px;
    }

    .main-sidebar {
      width: 260px;
    }

    .bottom-nav {
      height: 65px;
      padding-top: 6px;
    }

    .bottom-nav-item {
      font-size: 10px;
      gap: 3px;
    }

    .bottom-nav-item i {
      font-size: 18px;
    }
  }

  /* === TABLET & SMALL LANDSCAPE (577px - 991.98px) === */
  @media (min-width: 577px) and (max-width: 991.98px) {
    .section-body {
      padding: 18px 14px;
    }

    .card {
      border-radius: 18px;
      margin-bottom: 14px;
    }

    .bottom-nav-item {
      font-size: 12px;
    }
  }
</style>

</head>


<body style="visibility: visible;">

<!-- LOADER -->
<div id="page-loader">
  <div class="loader-content">
    <div class="loader-logo-wrapper">
      <div class="loader-ring-outer"></div>
      <div class="loader-ring-inner"></div>
      <div class="loader-orbit-dot"></div>
      <img src="{{ asset('assets/img/logo-sekolah.png') }}" alt="Logo" class="loader-logo">
    </div>
    <div class="loader-title">Loading...</div>
    <div class="loader-subtitle">Mengambil Data...</div>
    <div class="loader-progress-track"><div class="loader-progress-fill"></div></div>
    <div class="loader-status" id="loader-status">Memuat sistem...</div>
  </div>
</div>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg" id="sidebar-toggle-btn"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="navbar-brand text-white ml-3" style="font-size:35px;font-weight:700;letter-spacing:3px;">
            {{ $globalSetting->nama_instansi }}
          </div>
        </form>

<style>
.navbar-right a, .navbar-right a:hover, .navbar-right a:focus { text-decoration: none !important; }
.nav-link-user-pro { display: flex !important; align-items: center !important; gap: 10px; }
.avatar-pro-wrapper { position: relative; width: 46px; height: 46px; border-radius: 50%; padding: 3px; background: linear-gradient(135deg, #2563eb, #06b6d4); display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 25px rgba(0,0,0,0.25); transition: all 0.35s ease; }
.avatar-pro-img { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; border: 2px solid #ffffff; background: #f1f5f9; }
.avatar-pro-wrapper::after { content: ''; position: absolute; bottom: 2px; right: 2px; width: 11px; height: 11px; background: #22c55e; border-radius: 50%; border: 2px solid #fff; }
.nav-link-user-pro:hover .avatar-pro-wrapper { transform: scale(1.08); box-shadow: 0 15px 35px rgba(37,99,235,0.35); }
.dropdown-menu-pro { border: none; border-radius: 18px; padding: 10px; min-width: 250px; box-shadow: 0 25px 60px rgba(15,23,42,0.18); backdrop-filter: blur(10px); }
.dropdown-item-pro { border-radius: 12px; padding: 11px 15px; font-weight: 500; display: flex; align-items: center; gap: 12px; transition: all 0.25s ease; color: #1e293b !important; }
.dropdown-item-pro i { width: 22px; font-size: 16px; }
.dropdown-item-pro:hover { background: linear-gradient(135deg, #2563eb, #06b6d4); color: #fff !important; transform: translateX(4px); }
.dropdown-item-pro:hover i { color: #fff !important; }
.icon-profile { color: #2563eb; } .icon-update { color: #06b6d4; } .icon-flow { color: #6366f1; } .icon-logout { color: #ef4444; }
.nav-link-user .user-name-text { color: #ffffff !important; font-weight: 600; margin-left: 8px; transition: all 0.3s ease; }
.nav-link-user:hover .user-name-text { color: #eaf2ff !important; }
</style>

<ul class="navbar-nav navbar-right">
    <li class="dropdown mr-2"></li>
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user nav-link-user-pro">
            <div class="avatar-pro-wrapper">
                <img alt="avatar"
                     src="{{ auth()->user()->avatar ? asset('storage/avatars/'.auth()->user()->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                     class="avatar-pro-img">
            </div>
            <div class="d-sm-none d-lg-inline-block text-white font-weight-semibold user-name-text">
                Hi, {{ auth()->user()->name }}
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-pro">
            <a href="{{ route('profile.edit') }}" class="dropdown-item-pro">
                <i class="fas fa-user-cog icon-profile"></i><span>Profil Pengguna</span>
            </a>
            <a href="#" class="dropdown-item-pro" data-toggle="modal" data-target="#updateModal">
                <i class="fas fa-bell icon-update"></i><span>Informasi Update</span>
            </a>
            @if (auth()->user()->role->role !== 'kepala sekolah')
            <a href="/alur-aplikasi" class="dropdown-item-pro">
                <i class="fas fa-sitemap icon-flow"></i><span>Alur Aplikasi</span>
            </a>
            @endif
            <div class="dropdown-divider"></div>
            <a class="dropdown-item-pro" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi Keluar',
                        text: 'Apakah Anda yakin ingin keluar?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#2563eb',
                        cancelButtonColor: '#ef4444',
                        confirmButtonText: 'Ya, Keluar',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                    });">
                <i class="fas fa-power-off icon-logout"></i><span>Keluar Aplikasi</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </li>
</ul>

      </nav>

      {{-- SIDEBAR OVERLAY (MOBILE) --}}
      <div class="sidebar-overlay" id="sidebar-overlay"></div>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/"><img src="/assets/img/logo-sekolah.png" alt="Logo Sekolah" class="sidebar-logo"></a>
          </div>
          <ul class="sidebar-menu">

            {{-- ==================== KEPALA SEKOLAH ==================== --}}
            @if (auth()->user()->role->role === 'kepala sekolah')
              <li class="sidebar-item">
                <a class="nav-link {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}" href="/">
                  <i class="fas fa-chart-bar"></i><span class="align-middle">Dashboard</span>
                </a>
              </li>

              {{-- ASET (read-only) --}}
             <li>
  <a class="nav-link {{ Request::is('aset') ? 'active' : '' }}" href="/aset"><i class="fas fa-layer-group"></i><span>Aset Sekolah</span></a>
</li>

              {{-- <li class="menu-header">LAPORAN</li> --}}
              <li><a class="nav-link {{ Request::is('laporan-stok') ? 'active' : '' }}" href="laporan-stok"><i class="fa  fa-boxes"></i><span>Stok Barang</span></a></li>
              <li><a class="nav-link {{ Request::is('laporan-barang-masuk') ? 'active' : '' }}" href="laporan-barang-masuk"><i class="fa fa-arrow-circle-down"></i><span>Barang Masuk</span></a></li>
              <li><a class="nav-link {{ Request::is('laporan-barang-keluar') ? 'active' : '' }}" href="laporan-barang-keluar"><i class="fa fa-arrow-circle-up"></i><span>Barang Keluar</span></a></li>

              {{-- <li class="menu-header">MANAJEMEN USER</li> --}}
              <li><a class="nav-link {{ Request::is('aktivitas-user') ? 'active' : '' }}" href="aktivitas-user"><i class="fa fa-history"></i><span>Aktivitas User</span></a></li>
            @endif

            {{-- ==================== SUPERADMIN ==================== --}}
            @if (auth()->user()->role->role === 'superadmin')
              <li class="sidebar-item">
                <a class="nav-link {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}" href="/">
                  <i class="fas fa-chart-bar"></i><span class="align-middle">Dashboard</span>
                </a>
              </li>
            <li>
  <a class="nav-link {{ Request::is('aset') ? 'active' : '' }}" href="/aset"><i class="fas fa-layer-group"></i><span>Aset Sekolah</span></a></li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('barang') || Request::is('jenis-barang') || Request::is('satuan-barang') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fas fa-cubes"></i><span>Data Barang</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('jenis-barang') ? 'active' : '' }}" href="/jenis-barang"><i class="fas fa-tags"></i> Kategori Barang</a></li>
                  <li><a class="nav-link {{ Request::is('satuan-barang') ? 'active' : '' }}" href="/satuan-barang"><i class="fas fa-balance-scale fa-sm"></i> Satuan Barang</a></li>
                  <li><a class="nav-link {{ Request::is('barang') ? 'active' : '' }}" href="/barang"><i class="fas fa-box-open fa-sm"></i> Nama Barang</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('supplier') || Request::is('customer') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fa fa-building"></i><span>Relasi</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('supplier') ? 'active' : '' }}" href="/supplier"><i class="fas fa-truck fa-sm"></i> Supplier</a></li>
                  <li><a class="nav-link {{ Request::is('customer') ? 'active' : '' }}" href="/customer"><i class="fas fa-user-tie fa-sm"></i> Guru & Tendik</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('barang-masuk') || Request::is('barang-keluar') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fas fa-random"></i><span>Transaksi</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('barang-masuk') ? 'active' : '' }}" href="/barang-masuk"><i class="fas fa-arrow-circle-down"></i> Barang Masuk</a></li>
                  <li><a class="nav-link {{ Request::is('barang-keluar') ? 'active' : '' }}" href="/barang-keluar"><i class="fas fa-arrow-circle-up"></i> Barang Keluar</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('laporan-stok') || Request::is('laporan-barang-masuk') || Request::is('laporan-barang-keluar') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fa fa-file"></i><span>Laporan</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('laporan-stok') ? 'active' : '' }}" href="/laporan-stok"><i class="fas fa-boxes"></i> Stok Barang</a></li>
                  <li><a class="nav-link {{ Request::is('laporan-barang-masuk') ? 'active' : '' }}" href="/laporan-barang-masuk"><i class="fas fa-download"></i> Barang Masuk</a></li>
                  <li><a class="nav-link {{ Request::is('laporan-barang-keluar') ? 'active' : '' }}" href="/laporan-barang-keluar"><i class="fas fa-upload"></i> Barang Keluar</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('data-pengguna') || Request::is('hak-akses') || Request::is('aktivitas-user') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fa fa-users-cog"></i><span>Manajemen</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('data-pengguna') ? 'active' : '' }}" href="/data-pengguna"><i class="fas fa-user fa-sm"></i> Data Pengguna</a></li>
                  <li><a class="nav-link {{ Request::is('hak-akses') ? 'active' : '' }}" href="/hak-akses"><i class="fas fa-user-shield"></i> Hak Akses</a></li>
                  <li><a class="nav-link {{ Request::is('aktivitas-user') ? 'active' : '' }}" href="/aktivitas-user"><i class="fas fa-history"></i> Aktivitas User</a></li>
                </ul>
              </li>
            @endif

            {{-- ==================== ADMIN ==================== --}}
            @if (auth()->user()->role->role === 'admin')
              <li class="sidebar-item">
                <a class="sidebar-link nav-link {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}" href="/">
                  <i class="fas fa-chart-bar"></i><span class="align-middle">Dashboard</span>
                </a>
              </li>

              {{-- ASET — dipindah ke posisi kedua, tepat di bawah Dashboard --}}
             <li> <a class="nav-link {{ Request::is('aset') ? 'active' : '' }}" href="/aset"><i class="fas fa-layer-group"></i><span>Aset Sekolah</span></a> </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('barang') || Request::is('jenis-barang') || Request::is('satuan-barang') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fas fa-cubes"></i><span>Data Barang</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('jenis-barang') ? 'active' : '' }}" href="/jenis-barang"><i class="fas fa-tags fa-sm"></i> Kategori Barang</a></li>
                  <li><a class="nav-link {{ Request::is('satuan-barang') ? 'active' : '' }}" href="/satuan-barang"><i class="fas fa-balance-scale fa-sm"></i> Satuan Barang</a></li>
                  <li><a class="nav-link {{ Request::is('barang') ? 'active' : '' }}" href="/barang"><i class="fas fa-box-open fa-sm"></i> Nama Barang</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('supplier') || Request::is('customer') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fa fa-building"></i><span>Relasi</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('supplier') ? 'active' : '' }}" href="/supplier"><i class="fas fa-truck fa-sm"></i> Supplier</a></li>
                  <li><a class="nav-link {{ Request::is('customer') ? 'active' : '' }}" href="/customer"><i class="fas fa-user-tie fa-sm"></i> Guru & Tendik</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('barang-masuk') || Request::is('barang-keluar') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fas fa-random"></i><span>Transaksi</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('barang-masuk') ? 'active' : '' }}" href="/barang-masuk"><i class="fas fa-arrow-circle-down"></i> Barang Masuk</a></li>
                  <li><a class="nav-link {{ Request::is('barang-keluar') ? 'active' : '' }}" href="/barang-keluar"><i class="fas fa-arrow-circle-up"></i> Barang Keluar</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ Request::is('laporan-stok') || Request::is('laporan-barang-masuk') || Request::is('laporan-barang-keluar') ? 'active' : '' }}" data-toggle="dropdown">
                  <i class="fa fa-file"></i><span>Laporan</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link {{ Request::is('laporan-stok') ? 'active' : '' }}" href="/laporan-stok"><i class="fas fa-boxes"></i> Stok Barang</a></li>
                  <li><a class="nav-link {{ Request::is('laporan-barang-masuk') ? 'active' : '' }}" href="/laporan-barang-masuk"><i class="fas fa-download"></i> Barang Masuk</a></li>
                  <li><a class="nav-link {{ Request::is('laporan-barang-keluar') ? 'active' : '' }}" href="/laporan-barang-keluar"><i class="fas fa-upload"></i> Barang Keluar</a></li>
                </ul>
              </li>
            @endif

          </ul>
        </aside>
      </div>

      {{-- BOTTOM NAVIGATION (MOBILE ONLY) --}}
      <nav class="bottom-nav" id="bottom-nav">
        {{-- KEPALA SEKOLAH --}}
        @if (auth()->user()->role->role === 'kepala sekolah')
          <a href="/" class="bottom-nav-item {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-bar"></i>
            <span>Dashboard</span>
          </a>
          <a href="/aset" class="bottom-nav-item {{ Request::is('aset') ? 'active' : '' }}">
            <i class="fas fa-layer-group"></i>
            <span>Aset</span>
          </a>
          <a href="/laporan-stok" class="bottom-nav-item {{ Request::is('laporan-stok') || Request::is('laporan-barang-masuk') || Request::is('laporan-barang-keluar') ? 'active' : '' }}">
            <i class="fas fa-file"></i>
            <span>Laporan</span>
          </a>
          <a href="/aktivitas-user" class="bottom-nav-item {{ Request::is('aktivitas-user') ? 'active' : '' }}">
            <i class="fas fa-history"></i>
            <span>Aktivitas</span>
          </a>
        @endif

        {{-- SUPERADMIN --}}
        @if (auth()->user()->role->role === 'superadmin')
          <a href="/" class="bottom-nav-item {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-bar"></i>
            <span>Dashboard</span>
          </a>
          <a href="/aset" class="bottom-nav-item {{ Request::is('aset') ? 'active' : '' }}">
            <i class="fas fa-layer-group"></i>
            <span>Aset</span>
          </a>
          <a href="/barang-masuk" class="bottom-nav-item {{ Request::is('barang-masuk') || Request::is('barang-keluar') ? 'active' : '' }}">
            <i class="fas fa-random"></i>
            <span>Transaksi</span>
          </a>
          <a href="/laporan-stok" class="bottom-nav-item {{ Request::is('laporan-stok') || Request::is('laporan-barang-masuk') || Request::is('laporan-barang-keluar') ? 'active' : '' }}">
            <i class="fas fa-file"></i>
            <span>Laporan</span>
          </a>
          <a href="#" class="bottom-nav-item" onclick="openSidebarMenu(event)">
            <i class="fas fa-ellipsis-h"></i>
            <span>Menu</span>
          </a>
        @endif

        {{-- ADMIN --}}
        @if (auth()->user()->role->role === 'admin')
          <a href="/" class="bottom-nav-item {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-bar"></i>
            <span>Dashboard</span>
          </a>
          <a href="/aset" class="bottom-nav-item {{ Request::is('aset') ? 'active' : '' }}">
            <i class="fas fa-layer-group"></i>
            <span>Aset</span>
          </a>
          <a href="/barang-masuk" class="bottom-nav-item {{ Request::is('barang-masuk') || Request::is('barang-keluar') ? 'active' : '' }}">
            <i class="fas fa-random"></i>
            <span>Transaksi</span>
          </a>
          <a href="/laporan-stok" class="bottom-nav-item {{ Request::is('laporan-stok') || Request::is('laporan-barang-masuk') || Request::is('laporan-barang-keluar') ? 'active' : '' }}">
            <i class="fas fa-file"></i>
            <span>Laporan</span>
          </a>
          <a href="#" class="bottom-nav-item" onclick="openSidebarMenu(event)">
            <i class="fas fa-ellipsis-h"></i>
            <span>Menu</span>
          </a>
        @endif
      </nav>

      <div class="main-content">
        <section class="section">
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">Inventaris Sekolah &copy; {{ date('Y') }}</div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>

  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  @include('sweetalert::alert')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>

  @stack('modals')
  @stack('scripts')

  {{-- ================= MOBILE RESPONSIVE SCRIPT ================= --}}
  <script>
    // Deteksi ukuran layar
    function isMobile() {
      return window.innerWidth <= 991.98;
    }

    // Toggle sidebar drawer
    function toggleSidebar() {
      const sidebar = document.querySelector('.main-sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      
      if (isMobile()) {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
      }
    }

    // Buka sidebar dari bottom nav menu
    function openSidebarMenu(e) {
      e.preventDefault();
      toggleSidebar();
    }

    // Close sidebar saat klik overlay
    document.getElementById('sidebar-overlay')?.addEventListener('click', function() {
      const sidebar = document.querySelector('.main-sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      sidebar.classList.remove('show');
      overlay.classList.remove('show');
    });

    // Close sidebar saat klik link
    document.querySelectorAll('.main-sidebar .nav-link:not(.has-dropdown)').forEach(link => {
      link.addEventListener('click', function() {
        if (isMobile()) {
          const sidebar = document.querySelector('.main-sidebar');
          const overlay = document.getElementById('sidebar-overlay');
          sidebar.classList.remove('show');
          overlay.classList.remove('show');
        }
      });
    });

    // Sidebar toggle button
    document.getElementById('sidebar-toggle-btn')?.addEventListener('click', function(e) {
      e.preventDefault();
      toggleSidebar();
    });

    // Dropdown toggle di sidebar mobile
    document.querySelectorAll('.has-dropdown').forEach(item => {
      item.addEventListener('click', function(e) {
        if (isMobile()) {
          e.preventDefault();
          this.classList.toggle('active');
          const menu = this.nextElementSibling;
          if (menu && menu.classList.contains('dropdown-menu')) {
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
          }
        }
      });
    });

    // Prevent sidebar close on dropdown click
    document.querySelectorAll('.sidebar-menu .dropdown-menu .nav-link').forEach(link => {
      link.addEventListener('click', function(e) {
        if (isMobile()) {
          const sidebar = document.querySelector('.main-sidebar');
          const overlay = document.getElementById('sidebar-overlay');
          sidebar.classList.remove('show');
          overlay.classList.remove('show');
        }
      });
    });

    // Handle resize
    window.addEventListener('resize', function() {
      if (!isMobile()) {
        const sidebar = document.querySelector('.main-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
      }
    });

    // Swipe gesture untuk drawer (optional)
    let touchStartX = 0;
    let touchEndX = 0;

    document.addEventListener('touchstart', function(e) {
      touchStartX = e.changedTouches[0].screenX;
    });

    document.addEventListener('touchend', function(e) {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    });

    function handleSwipe() {
      const sidebar = document.querySelector('.main-sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      const swipeThreshold = 50;

      // Swipe from left to open
      if (touchEndX - touchStartX > swipeThreshold && touchStartX < 50 && isMobile()) {
        sidebar.classList.add('show');
        overlay.classList.add('show');
      }

      // Swipe from right to close
      if (touchStartX - touchEndX > swipeThreshold && sidebar.classList.contains('show') && isMobile()) {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
      }
    }
  </script>

  <script>
    $(document).ready(function() {
      var currentPath = window.location.pathname;
      $('.nav-link a[href="' + currentPath + '"]').addClass('active');
    });
  </script>

  <script>
  setInterval(() => {
      fetch('/auth-check').then(res => { if (res.status === 401) location.href = '/login'; });
  }, 5000);
  </script>

  <script>
  (function autoLogoutWatcher() {
      setInterval(function () {
          fetch('/check-session', { method: 'GET', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
          .then(res => res.json())
          .then(data => { if (data.logout === true) { alert('Sesi Anda telah diakhiri oleh sistem.'); window.location.href = '/login'; } })
          .catch(() => {});
      }, 5000);
  })();
  </script>

  <script>
  window.addEventListener('load', function () {
      document.documentElement.style.visibility = 'visible';
  });
  </script>

<!-- ================= MODAL UPDATE SISTEM — UPGRADED ================= -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog"
     aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="border:none;border-radius:22px;overflow:hidden;">

      {{-- HEADER --}}
      <div class="modal-header" style="background:linear-gradient(135deg,#4f46e5,#06b6d4);border:none;padding:20px 28px;">
        <h5 class="modal-title" id="updateModalLabel" style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:16px;color:#fff;">
          <i class="fas fa-sync-alt mr-2"></i> Informasi Update Sistem
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:.85;text-shadow:none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {{-- DEV CARD --}}
      <div class="dev-card">
        <div class="dev-avatar">👨‍💻</div>
        <p class="dev-name">Helyadi Beni Tandiono</p>
        <p class="dev-role">Pengembang Aplikasi</p>
        <div class="dev-tags">
          <span class="dev-tag"><i class="fas fa-code-branch"></i> v1.0 Rilis Awal</span>
          <span class="dev-tag"><i class="fab fa-laravel"></i> Laravel 12.50.0</span>
          <span class="dev-tag"><i class="fas fa-code"></i> PHP 8.3.29</span>
          <span class="dev-tag"><i class="fas fa-database"></i> MySQL</span>
        </div>
      </div>

      {{-- CHANGELOG --}}
      <div class="changelog-wrap">
        <div class="changelog-title">
          <span><i class="fas fa-list-ul mr-1"></i> Riwayat Perubahan</span>
          <span class="changelog-count">1 Versi</span>
        </div>

        <div class="changelog-scroll">

          {{-- V1.0 --}}
          <div class="version-card">
            <div class="version-header">
              <span class="version-badge"><i class="fas fa-tag"></i> v1.0</span>
              <span class="version-label">Rilis Awal</span>
              <span class="version-dot"></span>
            </div>
            <div class="version-list">
              <div class="version-item">
                <div class="version-item-icon icon-design"><i class="fas fa-palette"></i></div>
                Desain aplikasi dengan konsep <b>&nbsp;Modern, Transparan & Profesional&nbsp;</b> untuk manajemen inventaris sekolah
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-session"><i class="fas fa-lock"></i></div>
                Fitur <b>&nbsp;Single Session&nbsp;</b> — satu akun hanya dapat login dari satu perangkat pada saat bersamaan
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-auth"><i class="fas fa-key"></i></div>
                Fitur Reset Password dan Reset Sesi Login pengguna — Super Admin dapat mengelola akses pengguna
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-asset"><i class="fas fa-warehouse"></i></div>
                Manajemen Aset Tetap — input aset baru, riwayat aset terhapus, export laporan PDF dan Excel
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-barang"><i class="fas fa-boxes"></i></div>
                Manajemen Data Barang dengan sistem bertahap — input kategori, satuan, kemudian data barang
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-relasi"><i class="fas fa-handshake"></i></div>
                Kelola Data Relasi — manajemen data supplier dan data guru & tendik untuk relasi bisnis
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-transaksi"><i class="fas fa-exchange-alt"></i></div>
                Transaksi Barang Masuk dan Barang Keluar dengan validasi stok minimal — pencatatan real-time
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-report"><i class="fas fa-chart-line"></i></div>
                Pelaporan & Monitoring — tiga sub menu pelaporan (Stok Barang, Barang Masuk, Barang Keluar)
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-user"><i class="fas fa-users-cog"></i></div>
                Manajemen pengguna dengan berbagai role dan hak akses sesuai tanggung jawab masing-masing
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-validation"><i class="fas fa-check-circle"></i></div>
                Validasi pencegahan inputan data ganda pada asset — sistem mendeteksi asset duplikat secara otomatis
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-validation"><i class="fas fa-shield-alt"></i></div>
                Validasi pencegahan data ganda pada inputan barang — memastikan data kategori, satuan, dan barang unik
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-history"><i class="fas fa-history"></i></div>
                Menu riwayat penghapusan data asset — mencatat semua asset yang sudah dihapus untuk audit trail
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-stock"><i class="fas fa-minus-circle"></i></div>
                Fitur menentukan stok minimal barang — sistem mencegah pengeluaran barang di bawah batas minimal yang ditentukan
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-activity"><i class="fas fa-user-clock"></i></div>
                Menu aktivitas user untuk Super Admin dan Admin — tracking semua aksi pengguna dalam sistem
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-settings"><i class="fas fa-cog"></i></div>
                Fitur custom nama instansi — Super Admin dapat mengubah nama sekolah dan konfigurasi dasar sistem
              </div>
              <div class="version-item">
                <div class="version-item-icon icon-guide"><i class="fas fa-book-open"></i></div>
                Menu alur aplikasi dan panduan penggunaan sistem — membantu pengguna memahami cara kerja setiap fitur
              </div>
            </div>
          </div>

        </div>{{-- /changelog-scroll --}}
      </div>

      {{-- FEEDBACK SECTION --}}
      <div class="feedback-section">
        <div class="feedback-title">
          <i class="fas fa-comments mr-2"></i> Berikan Masukan Anda
        </div>
        <p class="feedback-subtitle">Kami menghargai setiap feedback untuk terus meningkatkan kualitas sistem</p>
        
        <a href="https://forms.gle/R5tuCb3deinJYotQ6" target="_blank" rel="noopener noreferrer" class="btn-feedback-modern">
          <div class="btn-feedback-inner">
            <div class="btn-feedback-icon">
              <i class="fas fa-comment-dots"></i>
            </div>
            <div class="btn-feedback-text">
              <span class="btn-feedback-label">Berikan Feedback</span>
              <span class="btn-feedback-desc">Sampaikan saran dan pengalaman Anda</span>
            </div>
          </div>
          <div class="btn-feedback-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </a>
      </div>

      {{-- FOOTER --}}
      <div class="modal-info-footer">
        <span class="footer-note">
          <i class="fas fa-circle mr-1" style="color:#10b981;font-size:8px;"></i> Sistem berjalan normal
        </span>
        <button type="button" class="btn-tutup" data-dismiss="modal">
          <i class="fas fa-times"></i> Tutup
        </button>
      </div>

    </div>
  </div>
</div>
{{-- ================= END MODAL ================= --}}

<style>
  /* ================= FEEDBACK SECTION ================= */
  .feedback-section {
    padding: 28px 28px;
    background: linear-gradient(135deg, #f0f9ff 0%, #f8fafc 100%);
    border-top: 1px solid #e0e7ff;
  }

  .feedback-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 15px;
    color: #1f2937;
    margin-bottom: 6px;
    display: flex;
    align-items: center;
  }

  .feedback-title i {
    color: #3b82f6;
  }

  .feedback-subtitle {
    font-size: 12px;
    color: #6b7280;
    margin: 0 0 16px 0;
    font-weight: 500;
  }

  /* ================= MODERN FEEDBACK BUTTON ================= */
  .btn-feedback-modern {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 16px 20px;
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    border: none;
    border-radius: 14px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    position: relative;
    overflow: hidden;
  }

  .btn-feedback-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
  }

  .btn-feedback-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
  }

  .btn-feedback-modern:hover::before {
    left: 100%;
  }

  .btn-feedback-modern:active {
    transform: translateY(0);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
  }

  .btn-feedback-inner {
    display: flex;
    align-items: center;
    gap: 14px;
    flex: 1;
  }

  .btn-feedback-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    font-size: 18px;
    color: #fff;
    flex-shrink: 0;
    transition: all 0.3s ease;
  }

  .btn-feedback-modern:hover .btn-feedback-icon {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
  }

  .btn-feedback-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }

  .btn-feedback-label {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 14px;
    color: #fff;
    display: block;
  }

  .btn-feedback-desc {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.85);
    display: block;
  }

  .btn-feedback-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 8px;
    font-size: 14px;
    color: #fff;
    transition: all 0.3s ease;
    flex-shrink: 0;
  }

  .btn-feedback-modern:hover .btn-feedback-arrow {
    background: rgba(255, 255, 255, 0.25);
    transform: translateX(2px);
  }

  /* Responsive Design */
  @media (max-width: 576px) {
    .feedback-section {
      padding: 24px 20px;
    }

    .feedback-title {
      font-size: 14px;
      margin-bottom: 5px;
    }

    .feedback-subtitle {
      font-size: 11px;
      margin-bottom: 14px;
    }

    .btn-feedback-modern {
      padding: 14px 16px;
    }

    .btn-feedback-icon {
      width: 38px;
      height: 38px;
      font-size: 16px;
    }

    .btn-feedback-inner {
      gap: 12px;
    }

    .btn-feedback-label {
      font-size: 13px;
    }

    .btn-feedback-desc {
      font-size: 10px;
    }

    .btn-feedback-arrow {
      width: 28px;
      height: 28px;
      font-size: 12px;
    }
  }

  @media (max-width: 480px) {
    .btn-feedback-modern {
      padding: 12px 14px;
    }

    .btn-feedback-inner {
      gap: 10px;
    }

    .btn-feedback-icon {
      width: 36px;
      height: 36px;
    }

    .btn-feedback-label {
      font-size: 12px;
    }

    .btn-feedback-desc {
      font-size: 9px;
    }

    .btn-feedback-arrow {
      width: 26px;
      height: 26px;
      font-size: 11px;
    }
  }
</style>

<script>
  // Tracking feedback button click
  document.querySelectorAll('.btn-feedback-modern').forEach(btn => {
    btn.addEventListener('click', function(e) {
      console.log('Feedback button clicked:', this.href);
    });
  });
</script>

<script>
const loader   = document.getElementById('page-loader');
const statusEl = document.getElementById('loader-status');
const messages = ['Memuat sistem...','Menyiapkan data...','Menghubungkan database...','Hampir selesai...'];
let msgIndex = 0;
const msgInterval = setInterval(() => {
  msgIndex = (msgIndex + 1) % messages.length;
  if (statusEl) statusEl.textContent = messages[msgIndex];
}, 600);
window.addEventListener('load', function () {
  clearInterval(msgInterval);
  if (statusEl) statusEl.textContent = 'Selesai!';
  setTimeout(() => { loader.classList.add('hide'); }, 500);
});
document.addEventListener('click', function (e) {
  const sidebarLink = e.target.closest('.sidebar-link');
  if (!sidebarLink) return;
  const href = sidebarLink.getAttribute('href');
  if (!href || href === '#' || sidebarLink.hasAttribute('data-toggle') || sidebarLink.getAttribute('target') === '_blank') return;
  loader.classList.remove('hide');
  if (statusEl) statusEl.textContent = 'Memuat halaman...';
});
</script>
</body>
</html>