@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

*, *::before, *::after { box-sizing: border-box; }
body, .content-wrapper, .container-fluid { font-family: 'Plus Jakarta Sans', sans-serif !important; }

.db-wrap { padding: 8px 4px; animation: dbFadeIn .5s ease both; }
@keyframes dbFadeIn { from { opacity:0; transform:translateY(14px);} to { opacity:1; transform:translateY(0);} }

/* HEADER */
.dashboard-header {
    position: relative;
    background: linear-gradient(135deg,#4f46e5 0%,#06b6d4 100%);
    border-radius: 20px; padding: 28px 36px; color:#fff;
    margin-bottom: 32px; overflow: hidden;
    box-shadow: 0 8px 32px rgba(79,70,229,.28);
    transition: box-shadow .3s ease;
}
.dashboard-header::before { content:''; position:absolute; top:-60px; right:-60px; width:260px; height:260px; border-radius:50%; background:rgba(255,255,255,.07); pointer-events:none; }
.dashboard-header::after  { content:''; position:absolute; bottom:-80px; right:120px; width:200px; height:200px; border-radius:50%; background:rgba(255,255,255,.05); pointer-events:none; }
.dashboard-header:hover { box-shadow: 0 16px 48px rgba(79,70,229,.38); }

.header-top-row {
    display: flex; align-items: flex-start; justify-content: space-between;
    flex-wrap: wrap; gap: 20px; margin-bottom: 20px;
}
.header-left h1 { font-size:24px; font-weight:800; margin:0 0 4px; letter-spacing:-.3px; }
.header-left p  { font-size:13px; font-weight:500; opacity:.75; margin:0; }

.header-datetime { position:relative; z-index:1; background:rgba(255,255,255,.15); border:1px solid rgba(255,255,255,.25); border-radius:16px; padding:14px 22px; backdrop-filter:blur(12px); text-align:center; min-width:190px; flex-shrink:0; }
.datetime-time { font-size:34px; font-weight:800; line-height:1; letter-spacing:-1px; color:#fff; margin-bottom:5px; font-variant-numeric:tabular-nums; }
.datetime-date { font-size:12px; font-weight:600; color:rgba(255,255,255,.85); letter-spacing:.2px; }
.datetime-day  { display:inline-block; background:rgba(255,255,255,.2); border-radius:99px; padding:2px 10px; font-size:11px; font-weight:700; color:#fff; margin-bottom:5px; text-transform:uppercase; letter-spacing:.8px; }

.header-info-row {
    display: flex; gap: 10px; flex-wrap: wrap; align-items: stretch;
    border-top: 1px solid rgba(255,255,255,.18); padding-top: 16px;
}

/* ══════════════════════════════════════════
   MOTIVASI — UPGRADE PREMIUM
══════════════════════════════════════════ */
.motivasi-card {
    position: relative;
    flex: 1;
    min-width: 280px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 18px;
    padding: 14px 20px;
    backdrop-filter: blur(14px);
    cursor: pointer;
    overflow: hidden;
    transition: background .25s ease, transform .25s ease, box-shadow .25s ease;
    display: flex;
    align-items: center;
    gap: 16px;
    /* shimmer glow animasi */
    box-shadow: 0 0 0 0 rgba(255,255,255,0);
}
.motivasi-card:hover {
    background: rgba(255,255,255,.2);
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(0,0,0,.18);
}
.motivasi-card:active { transform: scale(.98); }

/* Efek shine sweep saat hover */
.motivasi-card::before {
    content: '';
    position: absolute;
    top: 0; left: -75%;
    width: 50%; height: 100%;
    background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.18) 50%, transparent 100%);
    transform: skewX(-20deg);
    transition: left .55s ease;
    pointer-events: none;
}
.motivasi-card:hover::before { left: 130%; }

/* Bulat ikon besar */
.motivasi-icon-wrap {
    flex-shrink: 0;
    width: 52px; height: 52px;
    border-radius: 16px;
    background: rgba(255,255,255,.2);
    border: 1px solid rgba(255,255,255,.3);
    display: flex; align-items: center; justify-content: center;
    font-size: 26px;
    transition: transform .3s cubic-bezier(.34,1.56,.64,1), background .25s ease;
    position: relative; z-index: 1;
}
.motivasi-card:hover .motivasi-icon-wrap {
    background: rgba(255,255,255,.3);
    transform: rotate(-8deg) scale(1.1);
}

/* Konten tengah */
.motivasi-content {
    flex: 1; min-width: 0; position: relative; z-index: 1;
}
.motivasi-tag {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 9px; font-weight: 800;
    color: rgba(255,255,255,.65);
    text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 5px;
}
.motivasi-tag-dot {
    width: 5px; height: 5px; border-radius: 50%;
    background: rgba(255,255,255,.5);
    animation: motivasiPulse 2s ease infinite;
}
@keyframes motivasiPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50%       { opacity: .5; transform: scale(1.4); }
}

/* Teks motivasi utama — dengan animasi fade-slide */
.motivasi-quote {
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    line-height: 1.45;
    letter-spacing: -.1px;
    white-space: normal;
    word-break: break-word;
    overflow: hidden;
    /* pastikan wrap */
    display: block;
    transition: opacity .3s ease, transform .3s ease;
}
.motivasi-quote.fade-out { opacity: 0; transform: translateY(-6px); }
.motivasi-quote.fade-in  { opacity: 1; transform: translateY(0); }

/* Sub info bawah */
.motivasi-meta {
    display: flex; align-items: center; gap: 10px; margin-top: 7px;
    flex-wrap: wrap;
}
.motivasi-counter {
    font-size: 10px; font-weight: 700;
    color: rgba(255,255,255,.55);
    letter-spacing: .3px;
}
.motivasi-dots {
    display: flex; gap: 4px; align-items: center;
}
.motivasi-dot {
    width: 6px; height: 6px; border-radius: 99px;
    background: rgba(255,255,255,.3);
    transition: all .3s ease;
    cursor: pointer;
}
.motivasi-dot.active {
    width: 18px;
    background: #fff;
}

/* Tombol next kanan */
.motivasi-next-btn {
    flex-shrink: 0;
    width: 36px; height: 36px;
    border-radius: 12px;
    background: rgba(255,255,255,.18);
    border: 1px solid rgba(255,255,255,.28);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; color: #fff;
    cursor: pointer;
    transition: all .22s ease;
    position: relative; z-index: 1;
}
.motivasi-next-btn:hover {
    background: rgba(255,255,255,.32);
    transform: translateX(2px);
}

/* Auto-play progress bar */
.motivasi-progress {
    position: absolute;
    bottom: 0; left: 0;
    height: 3px;
    background: rgba(255,255,255,.35);
    border-radius: 0 0 18px 18px;
    width: 0%;
    transition: width linear;
}

/* ── LAMA: hir-pill (tetap, untuk komponen lain jika ada) ── */
.hir-pill {
    display: flex; align-items: center; gap: 9px;
    background: rgba(255,255,255,.13); border: 1px solid rgba(255,255,255,.22);
    border-radius: 14px; padding: 9px 16px; backdrop-filter: blur(8px);
    flex-shrink: 0; transition: background .2s ease, transform .2s ease; cursor: default;
}
.hir-pill:hover { background: rgba(255,255,255,.22); transform: translateY(-2px); }
.hir-pill-icon { font-size: 18px; flex-shrink: 0; }
.hir-pill-text { display: flex; flex-direction: column; gap: 1px; }
.hir-pill-label { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.65); text-transform: uppercase; letter-spacing: .6px; }
.hir-pill-value { font-size: 13px; font-weight: 700; color: #fff; line-height: 1.2; }

/* STAT GRID */
.dashboard-cards { display:grid; grid-template-columns:repeat(5,1fr); gap:20px; margin-bottom:32px; }
@media(max-width:1200px){ .dashboard-cards{ grid-template-columns:repeat(3,1fr);} }
@media(max-width:768px) { .dashboard-cards{ grid-template-columns:repeat(2,1fr);} .dashboard-header{ flex-direction:column; align-items:flex-start;} .header-datetime{ width:100%;} }
@media(max-width:480px) { .dashboard-cards{ grid-template-columns:1fr;} }

.stat-card { position:relative; border-radius:18px; padding:22px 20px 20px; background:#fff; box-shadow:0 2px 12px rgba(15,23,42,.07),0 1px 3px rgba(15,23,42,.05); transition:transform .25s ease,box-shadow .25s ease; overflow:hidden; animation:cardIn .45s ease both; }
.stat-card:nth-child(1){ animation-delay:.06s;} .stat-card:nth-child(2){ animation-delay:.12s;} .stat-card:nth-child(3){ animation-delay:.18s;} .stat-card:nth-child(4){ animation-delay:.24s;} .stat-card:nth-child(5){ animation-delay:.30s;}
@keyframes cardIn { from{opacity:0;transform:translateY(18px);} to{opacity:1;transform:translateY(0);} }
.stat-card:hover { transform:translateY(-6px); box-shadow:0 16px 40px rgba(0,0,0,.11); }
.stat-link {
    display: block;
    text-decoration: none !important;
    color: inherit !important;
    border-radius: 18px;
    outline: none;
}
.stat-link:hover,
.stat-link:focus,
.stat-link:active {
    text-decoration: none !important;
    color: inherit !important;
}
.stat-link:focus-visible .stat-card {
    box-shadow: 0 0 0 4px rgba(79,70,229,.18), 0 16px 40px rgba(0,0,0,.11);
}
.stat-card {
    cursor: pointer;
}
.stat-card .stat-action {
    position: absolute;
    right: 16px;
    top: 16px;
    width: 30px;
    height: 30px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
    background: rgba(255,255,255,.75);
    border: 1px solid rgba(226,232,240,.9);
    opacity: 0;
    transform: translateX(8px);
    transition: all .25s ease;
    z-index: 3;
}
.stat-link:hover .stat-action {
    opacity: 1;
    transform: translateX(0);
    color: var(--grad1);
}
.stat-link:hover .stat-card .stat-icon {
    transform: scale(1.08) rotate(-3deg);
}
.stat-card .stat-hint {
    position: relative;
    z-index: 2;
    margin-top: 10px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 10.5px;
    font-weight: 800;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: .5px;
    opacity: .85;
    transition: color .25s ease;
}
.stat-link:hover .stat-hint {
    color: var(--grad1);
}
.stat-card::before { content:''; position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg,var(--grad1),var(--grad2)); border-radius:18px 18px 0 0; }
.stat-card::after  { content:''; position:absolute; inset:0; background:linear-gradient(145deg,var(--grad1),var(--grad2)); opacity:.04; pointer-events:none; }
.stat-blob { position:absolute; bottom:-20px; right:-20px; width:80px; height:80px; border-radius:50%; background:linear-gradient(135deg,var(--grad1),var(--grad2)); opacity:.08; pointer-events:none; }
.stat-icon { width:52px; height:52px; border-radius:14px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:20px; margin-bottom:16px; background:linear-gradient(135deg,var(--grad1),var(--grad2)); box-shadow:0 6px 16px rgba(0,0,0,.18); flex-shrink:0; }
.stat-title { font-size:12px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:.6px; margin-bottom:6px; }
.stat-value  { font-size:32px; font-weight:800; color:#0f172a; line-height:1; letter-spacing:-1px; }

/* QUICK INFO BAND */
.quick-info-band { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 32px; animation: cardIn .5s ease .32s both; }
@media(max-width:768px){ .quick-info-band{ grid-template-columns:1fr;} }
.qib-card { border-radius: 16px; padding: 18px 20px; background: #fff; box-shadow: 0 2px 12px rgba(15,23,42,.07); border-left: 4px solid var(--qib-color, #4f46e5); display: flex; align-items: center; gap: 14px; transition: transform .2s ease, box-shadow .2s ease; }
.qib-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,.09); }
.qib-icon { width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, var(--qib-color, #4f46e5), var(--qib-color2, #818cf8)); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 18px; flex-shrink: 0; }
.qib-body { flex: 1; min-width: 0; }
.qib-title { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 3px; }
.qib-value { font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1; }
.qib-sub   { font-size: 11px; font-weight: 600; color: #64748b; margin-top: 3px; }
.ratio-bar { height: 6px; background: #f1f5f9; border-radius: 99px; margin-top: 8px; overflow: hidden; }
.ratio-bar-fill { height: 100%; border-radius: 99px; background: linear-gradient(90deg, var(--qib-color, #4f46e5), var(--qib-color2, #818cf8)); transition: width 1.2s cubic-bezier(.4,0,.2,1); width: 0; }

/* PROGRESS NOTE */
.progress-note-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:14px; margin-top:24px; }
.progress-box { border-radius:16px; padding:18px 20px; display:flex; align-items:flex-start; gap:14px; border:none; transition:transform .25s ease,box-shadow .25s ease; overflow:hidden; }
.progress-box:hover { transform:translateY(-4px); box-shadow:0 12px 32px rgba(0,0,0,.10); }
.progress-success { background:linear-gradient(135deg,#dcfce7,#f0fdf4); color:#15803d; box-shadow:0 2px 12px rgba(21,128,61,.10); }
.progress-warning  { background:linear-gradient(135deg,#fef9c3,#fffbeb); color:#b45309; box-shadow:0 2px 12px rgba(180,83,9,.10); }
.progress-danger   { background:linear-gradient(135deg,#fee2e2,#fef2f2); color:#b91c1c; box-shadow:0 2px 12px rgba(185,28,28,.10); }
.progress-icon-wrap { width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; flex-shrink:0; background:rgba(255,255,255,.65); margin-top:2px; }
.progress-text { display:flex; flex-direction:column; gap:3px; }
.progress-label { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.6px; opacity:.65; }
.progress-value { font-size:15px; font-weight:700; line-height:1.3; }

.chart-section { animation:cardIn .5s ease .35s both; }

/* ASET CARD */
.aset-card { border-radius:24px; border:none; overflow:hidden; background:#fff; box-shadow:0 4px 24px rgba(15,23,42,.09),0 1px 4px rgba(15,23,42,.06); animation:cardIn .5s ease .4s both; }
.aset-card-header { background:linear-gradient(135deg,#4f46e5 0%,#06b6d4 100%); color:#fff; padding:20px 28px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:14px; }
.aset-card-header h4 { margin:0; font-size:15px; font-weight:700; letter-spacing:-.2px; }
.view-toggle { display:flex; background:rgba(255,255,255,.15); border:1px solid rgba(255,255,255,.25); border-radius:99px; padding:3px; gap:2px; backdrop-filter:blur(8px); }
.view-toggle-btn { border:none; background:transparent; color:rgba(255,255,255,.75); font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; padding:5px 14px; border-radius:99px; cursor:pointer; transition:all .2s ease; display:flex; align-items:center; gap:5px; }
.view-toggle-btn.active, .view-toggle-btn:hover { background:#fff; color:#4f46e5; }
.aset-card-body { padding:28px; background:#fff; }
.aset-main-layout { display:flex; gap:32px; align-items:flex-start; flex-wrap:wrap; }
.aset-chart-area { flex:0 0 300px; max-width:300px; display:flex; flex-direction:column; align-items:center; gap:12px; }
@media(max-width:768px) { .aset-chart-area{ flex:0 0 100%; max-width:100%;} .aset-main-layout{ flex-direction:column;} }
.donut-center-wrapper { position:relative; width:260px; height:260px; }
.donut-center-wrapper canvas { position:absolute; top:0; left:0; }
.donut-center-label { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; pointer-events:none; transition:all .25s ease; width:130px; }
.donut-center-label .dcl-value { font-size:26px; font-weight:800; color:#0f172a; line-height:1; letter-spacing:-1px; word-break:break-all; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.donut-center-label .dcl-label { font-size:11px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:.6px; margin-top:4px; }
.donut-center-label .dcl-unit  { font-size:12px; font-weight:600; color:#64748b; margin-top:2px; }
.aset-bar-canvas-wrap { display:none; width:100%; }
.aset-bar-canvas-wrap.active { display:block; }
.pie-info-panel { display:none; width:260px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:14px; padding:14px 18px; text-align:center; transition:all .25s ease; box-shadow:0 2px 10px rgba(0,0,0,.06); }
.pie-info-panel.visible { display:block; }
.pip-value { font-size:28px; font-weight:800; color:#0f172a; letter-spacing:-1px; line-height:1; margin-bottom:4px; }
.pip-label { font-size:12px; font-weight:700; color:#475569; margin-bottom:4px; word-break:break-word; line-height:1.4; }
.pip-pct   { display:inline-block; font-size:12px; font-weight:700; color:#fff; background:#4f46e5; border-radius:99px; padding:2px 12px; margin-top:2px; }
.aset-legend-area { flex:1; min-width:220px; display:flex; flex-direction:column; gap:10px; max-height:390px; overflow-y:auto; padding-right:4px; scrollbar-width:thin; scrollbar-color:#e2e8f0 transparent; }
.aset-legend-area::-webkit-scrollbar { width:5px; }
.aset-legend-area::-webkit-scrollbar-track { background:transparent; }
.aset-legend-area::-webkit-scrollbar-thumb { background:#e2e8f0; border-radius:99px; }
.aset-legend-area::-webkit-scrollbar-thumb:hover { background:#cbd5e1; }
.aset-legend-card { display:flex; align-items:center; gap:12px; padding:12px 14px; border-radius:14px; background:#f8fafc; border:1px solid transparent; cursor:pointer; transition:all .22s ease; position:relative; overflow:hidden; min-height:62px; }
.aset-legend-card::before { content:''; position:absolute; left:0; top:0; bottom:0; width:4px; border-radius:4px 0 0 4px; background:var(--lc-color,#ccc); transition:width .2s ease; }
.aset-legend-card:hover, .aset-legend-card.highlighted { background:#fff; border-color:rgba(0,0,0,.07); box-shadow:0 6px 20px rgba(0,0,0,.07); transform:translateX(4px); }
.aset-legend-card:hover::before, .aset-legend-card.highlighted::before { width:6px; }
.lc-dot { width:14px; height:14px; border-radius:50%; background:var(--lc-color,#ccc); flex-shrink:0; box-shadow:0 2px 6px rgba(0,0,0,.18); margin-top:2px; }
.lc-info { flex:1; min-width:0; }
.lc-name { font-size:12px; font-weight:700; color:#334155; white-space:normal; word-break:break-word; line-height:1.35; }
.lc-bar-wrap { height:4px; background:#e2e8f0; border-radius:99px; margin-top:6px; overflow:hidden; }
.lc-bar-fill { height:100%; border-radius:99px; background:var(--lc-color,#ccc); transition:width .8s cubic-bezier(.4,0,.2,1); width:0; }
.lc-right { text-align:right; flex-shrink:0; min-width:52px; }
.lc-value { font-size:15px; font-weight:800; color:#0f172a; line-height:1; letter-spacing:-.3px; }
.aset-controls { display:flex; align-items:center; gap:8px; margin-bottom:16px; flex-wrap:wrap; }
.aset-controls label { font-size:12px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:.5px; margin:0; }
.sort-btn { border:1px solid #e2e8f0; background:#f8fafc; color:#475569; font-family:'Plus Jakarta Sans',sans-serif; font-size:11px; font-weight:700; padding:4px 12px; border-radius:99px; cursor:pointer; transition:all .2s ease; }
.sort-btn:hover, .sort-btn.active { background:#4f46e5; color:#fff; border-color:#4f46e5; }
.aset-search { margin-left:auto; position:relative; }
.aset-search input { border:1px solid #e2e8f0; border-radius:99px; padding:5px 14px 5px 34px; font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:600; color:#334155; outline:none; transition:border-color .2s ease,box-shadow .2s ease; width:160px; background:#f8fafc; }
.aset-search input:focus { border-color:#4f46e5; box-shadow:0 0 0 3px rgba(79,70,229,.1); background:#fff; }
.aset-search-icon { position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:11px; pointer-events:none; }
.aset-tooltip { position:fixed; background:#1e293b; color:#fff; padding:10px 16px; border-radius:12px; font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:600; pointer-events:none; z-index:9999; opacity:0; transition:opacity .15s ease; box-shadow:0 8px 24px rgba(0,0,0,.25); white-space:nowrap; }
.aset-empty { text-align:center; padding:40px; color:#94a3b8; font-size:14px; font-weight:600; display:none; }
.aset-empty i { font-size:32px; display:block; margin-bottom:10px; }
.mt-4 { margin-top:24px !important; }

/* TOAST */
.toast-container { position:fixed; bottom:28px; right:28px; z-index:10000; display:flex; flex-direction:column; gap:10px; }
.toast-item { background:#1e293b; color:#fff; border-radius:14px; padding:12px 18px; font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:600; display:flex; align-items:center; gap:10px; box-shadow:0 8px 28px rgba(0,0,0,.22); animation:toastIn .35s cubic-bezier(.4,0,.2,1) both; max-width:320px; }
.toast-item.toast-out { animation:toastOut .3s ease both; }
@keyframes toastIn  { from{opacity:0;transform:translateX(50px);} to{opacity:1;transform:translateX(0);} }
@keyframes toastOut { from{opacity:1;transform:translateX(0);} to{opacity:0;transform:translateX(50px);} }
.toast-icon { font-size:18px; flex-shrink:0; }
.toast-close { margin-left:auto; cursor:pointer; opacity:.6; font-size:16px; background:none; border:none; color:#fff; padding:0 2px; }
.toast-close:hover { opacity:1; }

/* CHART CARD */
.chart-card { border-radius: 24px; overflow: hidden; background: #fff; box-shadow: 0 4px 28px rgba(15,23,42,.09); animation: cardIn .5s ease .3s both; }
.chart-header { background: linear-gradient(135deg,#4f46e5 0%,#06b6d4 100%); padding: 18px 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
.chart-header-left { display: flex; align-items: center; gap: 10px; }
.chart-header-left h4 { margin: 0; font-size: 15px; font-weight: 700; color: #fff; letter-spacing: -.2px; }
.period-select-wrap { position: relative; display: flex; align-items: center; gap: 10px; }
.period-select-label { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 11px; font-weight: 700; color: rgba(255,255,255,.7); text-transform: uppercase; letter-spacing: .6px; white-space: nowrap; }
.period-select-box { position: relative; display: flex; align-items: center; }
.period-select-box select { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; font-weight: 700; color: #4f46e5; background: #fff; border: none; border-radius: 12px; padding: 8px 38px 8px 14px; outline: none; cursor: pointer; appearance: none; -webkit-appearance: none; box-shadow: 0 4px 14px rgba(0,0,0,.18); transition: all .22s ease; min-width: 160px; }
.period-select-box select:focus { box-shadow: 0 0 0 3px rgba(255,255,255,.4), 0 4px 14px rgba(0,0,0,.18); }
.period-select-arrow { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #4f46e5; font-size: 11px; }
.period-active-badge { display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.3); border-radius: 99px; padding: 5px 14px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 11px; font-weight: 700; color: #fff; letter-spacing: .3px; backdrop-filter: blur(8px); white-space: nowrap; }
.period-active-badge i { font-size: 10px; opacity: .8; }
.chart-toolbar { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; padding: 16px 24px 8px; border-bottom: 1px solid #f1f5f9; }
.chart-toolbar-left  { display: flex; align-items: center; gap: 8px; }
.chart-toolbar-right { display: flex; align-items: center; gap: 8px; }
.legend-badge { display: inline-flex; align-items: center; gap: 6px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 99px; padding: 5px 14px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 700; color: #475569; user-select: none; }
.legend-dot { width: 10px; height: 10px; border-radius: 3px; flex-shrink: 0; }
.chart-type-group { display: flex; gap: 0; border: 1.5px solid #e2e8f0; border-radius: 14px; overflow: hidden; background: #f8fafc; }
.chart-type-btn { display: flex; align-items: center; gap: 6px; padding: 7px 16px; border: none; background: transparent; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 700; color: #94a3b8; cursor: pointer; transition: all .2s ease; border-right: 1.5px solid #e2e8f0; }
.chart-type-btn:last-child { border-right: none; }
.chart-type-btn:hover { background: #f1f5f9; color: #475569; }
.chart-type-btn.active { background: linear-gradient(135deg,#4f46e5,#06b6d4); color: #fff; }
.chart-type-btn .btn-icon { font-size: 14px; }
.chart-action-btn { display: inline-flex; align-items: center; gap: 6px; padding: 7px 16px; border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 700; cursor: pointer; transition: all .22s ease; border: 1.5px solid transparent; text-decoration: none; }
.btn-reset  { background: #f8fafc; color: #64748b; border-color: #e2e8f0; }
.btn-reset:hover { background: #fef9c3; color: #b45309; border-color: #fde68a; transform: rotate(-15deg) scale(1.05); }
.btn-save   { background: linear-gradient(135deg,#10b981,#06b6d4); color: #fff; box-shadow: 0 4px 12px rgba(16,185,129,.25); }
.btn-save:hover  { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(16,185,129,.35); filter: brightness(1.05); }
.btn-pdf    { background: linear-gradient(135deg,#ef4444,#f97316); color: #fff; box-shadow: 0 4px 12px rgba(239,68,68,.25); }
.btn-pdf:hover   { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(239,68,68,.35); filter: brightness(1.05); }
.toolbar-divider { width: 1px; height: 28px; background: #e2e8f0; flex-shrink: 0; }
</style>

<div class="db-wrap">

{{-- HEADER --}}
<div class="dashboard-header">
    <div class="header-top-row">
        <div class="header-left">
           <h1><i class="fas fa-chart-line mr-2"></i>
    Selamat Datang di Halaman
    @if(auth()->user()->role->role === 'superadmin') Super Admin
    @elseif(auth()->user()->role->role === 'admin') Admin
    @elseif(auth()->user()->role->role === 'kepala sekolah') Kepala Sekolah
    @else Pengguna
    @endif
</h1>
{{-- <p style="opacity:.75;font-size:13px;font-weight:500;margin:0;">Aplikasi Inventaris Sekolah</p> --}}
<div style="border-top:1px solid rgba(255,255,255,.25);margin:10px 0 4px;"></div>
<p style="opacity:.85;font-size:13px;font-weight:600;margin:0;">
    <i class="fas fa-user-check mr-1"></i>
    Anda Sedang Login Sebagai
    @if(auth()->user()->role->role === 'superadmin') Super Admin
    @elseif(auth()->user()->role->role === 'admin') Admin
    @elseif(auth()->user()->role->role === 'kepala sekolah') Kepala Sekolah
    @else Pengguna
    @endif
    pada <strong>{{ $globalSetting->nama_instansi ?? 'Aplikasi Inventaris Sekolah' }}</strong>
</p>
        </div>
        <div class="header-datetime">
            <div class="datetime-day" id="hariIni">—</div>
            <div class="datetime-time" id="jamSekarang">00:00:00</div>
            <div class="datetime-date" id="tanggalSekarang">— — —</div>
        </div>
    </div>

    {{-- ══ MOTIVASI — UPGRADE PREMIUM ══ --}}
    <div class="header-info-row">
        <div class="motivasi-card" id="motivasiCard" title="Klik untuk motivasi berikutnya">

            {{-- Ikon besar --}}
            <div class="motivasi-icon-wrap" id="motivasiIconWrap">💡</div>

            {{-- Konten --}}
            <div class="motivasi-content">
                <div class="motivasi-tag">
                    <span class="motivasi-tag-dot"></span>
                    Motivasi Hari Ini
                </div>
                <span class="motivasi-quote" id="motivasiText">Memuat…</span>
                <div class="motivasi-meta">
                    <span class="motivasi-counter" id="motivasiCounter">1 / 10</span>
                    <div class="motivasi-dots" id="motivasiDots"></div>
                </div>
            </div>

            {{-- Tombol next --}}
            <div class="motivasi-next-btn" id="motivasiNextBtn" title="Motivasi berikutnya">
                <i class="fas fa-chevron-right"></i>
            </div>

            {{-- Progress bar auto-play --}}
            <div class="motivasi-progress" id="motivasiProgress"></div>
        </div>
    </div>
</div>

{{-- STATISTIK --}}
<div class="dashboard-cards">

    <a href="{{ url('/barang') }}" class="stat-link" title="Buka halaman Master Barang">
        <div class="stat-card" style="--grad1:#4f46e5;--grad2:#818cf8;">
            <span class="stat-action"><i class="fas fa-arrow-right"></i></span>
            <div class="stat-blob"></div>
            <div class="stat-icon"><i class="fas fa-cubes"></i></div>
            <div class="stat-title">Master Barang</div>
            <div class="stat-value" data-target="{{ $barang }}">0</div>
            <div class="stat-hint"><i class="fas fa-mouse-pointer"></i> Klik untuk membuka</div>
        </div>
    </a>

    <a href="{{ url('/barang-masuk') }}" class="stat-link" title="Buka halaman Barang Masuk">
        <div class="stat-card" style="--grad1:#ef4444;--grad2:#f87171;">
            <span class="stat-action"><i class="fas fa-arrow-right"></i></span>
            <div class="stat-blob"></div>
            <div class="stat-icon"><i class="fas fa-file-import"></i></div>
            <div class="stat-title">Barang Masuk</div>
            <div class="stat-value" data-target="{{ $barangMasuk }}">0</div>
            <div class="stat-hint"><i class="fas fa-mouse-pointer"></i> Klik untuk membuka</div>
        </div>
    </a>

    <a href="{{ url('/barang-keluar') }}" class="stat-link" title="Buka halaman Barang Keluar">
        <div class="stat-card" style="--grad1:#f59e0b;--grad2:#fbbf24;">
            <span class="stat-action"><i class="fas fa-arrow-right"></i></span>
            <div class="stat-blob"></div>
            <div class="stat-icon"><i class="fas fa-file-export"></i></div>
            <div class="stat-title">Barang Keluar</div>
            <div class="stat-value" data-target="{{ $barangKeluar }}">0</div>
            <div class="stat-hint"><i class="fas fa-mouse-pointer"></i> Klik untuk membuka</div>
        </div>
    </a>

    <a href="{{ url('/aset') }}" class="stat-link" title="Buka halaman Jumlah Aset">
        <div class="stat-card" style="--grad1:#06b6d4;--grad2:#22d3ee;">
            <span class="stat-action"><i class="fas fa-arrow-right"></i></span>
            <div class="stat-blob"></div>
            <div class="stat-icon"><i class="fas fa-warehouse"></i></div>
            <div class="stat-title">Jumlah Aset</div>
            <div class="stat-value" data-target="{{ $jumlahAset }}">0</div>
            <div class="stat-hint"><i class="fas fa-mouse-pointer"></i> Klik untuk membuka</div>
        </div>
    </a>

    @if(auth()->user()->role->role === 'superadmin')
        <a href="{{ url('/data-pengguna') }}" class="stat-link" title="Buka halaman Data Pengguna">
            <div class="stat-card" style="--grad1:#10b981;--grad2:#34d399;">
                <span class="stat-action"><i class="fas fa-arrow-right"></i></span>
                <div class="stat-blob"></div>
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-title">Pengguna</div>
                <div class="stat-value" data-target="{{ $user }}">0</div>
                <div class="stat-hint"><i class="fas fa-mouse-pointer"></i> Klik untuk membuka</div>
            </div>
        </a>
    @else
        <div class="stat-card" style="--grad1:#10b981;--grad2:#34d399;">
            <div class="stat-blob"></div>
            <div class="stat-icon"><i class="fas fa-users"></i></div>
            <div class="stat-title">Pengguna</div>
            <div class="stat-value" data-target="{{ $user }}">0</div>
            <div class="stat-hint"><i class="fas fa-lock"></i> Khusus Super Admin</div>
        </div>
    @endif

</div>

{{-- QUICK INFO BAND --}}
<div class="quick-info-band" id="quickInfoBand">
    <div class="qib-card" style="--qib-color:#4f46e5;--qib-color2:#818cf8;">
        <div class="qib-icon"><i class="fas fa-exchange-alt"></i></div>
        <div class="qib-body">
            <div class="qib-title">Rasio Masuk vs Keluar</div>
            <div class="qib-value" id="qibRasio">—</div>
            <div class="qib-sub" id="qibRasioSub">Memuat data…</div>
            <div class="ratio-bar"><div class="ratio-bar-fill" id="qibRasioBar" style="--qib-color:#4f46e5;--qib-color2:#818cf8;"></div></div>
        </div>
    </div>
    <div class="qib-card" style="--qib-color:#06b6d4;--qib-color2:#22d3ee;">
        <div class="qib-icon"><i class="fas fa-trophy"></i></div>
        <div class="qib-body">
            <div class="qib-title">Kategori Aset Terbanyak</div>
            <div class="qib-value" id="qibTopAset">—</div>
            <div class="qib-sub" id="qibTopAsetSub">—</div>
            <div class="ratio-bar"><div class="ratio-bar-fill" id="qibTopAsetBar" style="--qib-color:#06b6d4;--qib-color2:#22d3ee;"></div></div>
        </div>
    </div>
    <div class="qib-card" style="--qib-color:#10b981;--qib-color2:#34d399;">
        <div class="qib-icon"><i class="fas fa-heartbeat"></i></div>
        <div class="qib-body">
            <div class="qib-title">Kesehatan Inventaris</div>
            <div class="qib-value" id="qibHealth">—</div>
            <div class="qib-sub" id="qibHealthSub">—</div>
            <div class="ratio-bar"><div class="ratio-bar-fill" id="qibHealthBar" style="--qib-color:#10b981;--qib-color2:#34d399;"></div></div>
        </div>
    </div>
</div>

{{-- GRAFIK INVENTARIS --}}
<div class="row mt-4 chart-section">
    <div class="col-lg-12">
        <div class="chart-card">
            <div class="chart-header">
                <div class="chart-header-left">
                    <div style="width:36px;height:36px;border-radius:10px;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;font-size:16px;">📊</div>
                    <h4>Grafik Barang Masuk &amp; Keluar</h4>
                </div>
                <div class="period-select-wrap">
                    <span class="period-select-label"><i class="fas fa-calendar-alt" style="margin-right:4px;"></i>Periode</span>
                    <div class="period-select-box">
                        <select id="periodSelect">
                            <option value="all" selected>📅 Semua Data</option>
                            <option value="1">📆 1 Bulan Terakhir</option>
                            <option value="2">📆 2 Bulan Terakhir</option>
                            <option value="3">📆 3 Bulan Terakhir</option>
                            <option value="4">📆 4 Bulan Terakhir</option>
                            <option value="5">📆 5 Bulan Terakhir</option>
                            <option value="6">📆 6 Bulan Terakhir</option>
                            <option value="7">📆 7 Bulan Terakhir</option>
                            <option value="8">📆 8 Bulan Terakhir</option>
                            <option value="9">📆 9 Bulan Terakhir</option>
                            <option value="10">📆 10 Bulan Terakhir</option>
                            <option value="11">📆 11 Bulan Terakhir</option>
                            <option value="12">📆 1 Tahun Terakhir</option>
                        </select>
                        <span class="period-select-arrow"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <span class="period-active-badge" id="periodActiveBadge">
                        <i class="fas fa-check-circle"></i>
                        <span id="periodActiveBadgeText">Semua Data</span>
                    </span>
                </div>
            </div>
            <div class="chart-toolbar">
                <div class="chart-toolbar-left">
                    <span class="legend-badge"><span class="legend-dot" style="background:linear-gradient(135deg,#818cf8,#4f46e5);"></span>Barang Masuk</span>
                    <span class="legend-badge"><span class="legend-dot" style="background:linear-gradient(135deg,#67e8f9,#06b6d4);"></span>Barang Keluar</span>
                </div>
                <div class="chart-toolbar-right">
                    <div class="chart-type-group">
                        <button class="chart-type-btn active" id="btnTypeBar" onclick="switchChartType('bar')"><span class="btn-icon">📊</span> Bar</button>
                        <button class="chart-type-btn" id="btnTypeLine" onclick="switchChartType('line')"><span class="btn-icon">📈</span> Line</button>
                    </div>
                    <div class="toolbar-divider"></div>
                    <button class="chart-action-btn btn-reset" onclick="resetChart()"><span>🔄</span> Reset</button>
                    <button class="chart-action-btn btn-save" onclick="saveChartImage()"><span>🖼️</span> Simpan</button>
                    {{-- <button class="chart-action-btn btn-pdf" onclick="exportPDF()"><span>📄</span> PDF</button> --}}
                </div>
            </div>
            <div class="chart-body" style="padding: 16px 24px 24px; background:#fff;">
                <div id="inventarisChart" style="width: 100%; height: 400px;"></div>
                <div id="progressNote" class="mt-4"></div>
            </div>
        </div>
    </div>
</div>

{{-- GRAFIK ASET --}}
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="aset-card">
            <div class="aset-card-header">
                <h4><i class="fas fa-chart-pie mr-2"></i>Grafik Distribusi Aset</h4>
                <div class="view-toggle" id="asetViewToggle">
                    <button class="view-toggle-btn active" data-view="donut"><i class="fas fa-circle-notch"></i> Donut</button>
                    <button class="view-toggle-btn" data-view="pie"><i class="fas fa-chart-pie"></i> Pie</button>
                    <button class="view-toggle-btn" data-view="bar"><i class="fas fa-bars"></i> Bar</button>
                </div>
            </div>
            <div class="aset-card-body">
                <div class="aset-controls">
                    <label>Urutkan:</label>
                    <button class="sort-btn active" data-sort="default">Default</button>
                    <button class="sort-btn" data-sort="asc">Terkecil ↑</button>
                    <button class="sort-btn" data-sort="desc">Terbesar ↓</button>
                    <div class="aset-search">
                        <i class="fas fa-search aset-search-icon"></i>
                        <input type="text" id="asetSearchInput" placeholder="Cari aset…">
                    </div>
                </div>
                <div class="aset-main-layout">
                    <div class="aset-chart-area" id="asetChartArea">
                        <div class="donut-center-wrapper" id="donutWrapper">
                            <canvas id="asetChartUpgraded" width="260" height="260"></canvas>
                            <div class="donut-center-label" id="donutCenterLabel">
                                <div class="dcl-value" id="dclValue">—</div>
                                <div class="dcl-label" id="dclLabel">Total Aset</div>
                                <div class="dcl-unit"  id="dclUnit"></div>
                            </div>
                        </div>
                        <div class="aset-bar-canvas-wrap" id="asetBarWrap" style="width:300px;">
                            <canvas id="asetBarChart" height="260"></canvas>
                        </div>
                        <div class="pie-info-panel" id="pieInfoPanel">
                            <div class="pip-value" id="pipValue">—</div>
                            <div class="pip-label" id="pipLabel">Hover / klik segmen untuk detail</div>
                            <div class="pip-pct"   id="pipPct"></div>
                        </div>
                    </div>
                    <div class="aset-legend-area" id="asetLegendUpgraded"></div>
                </div>
                <div class="aset-empty" id="asetEmpty">
                    <i class="fas fa-box-open"></i>
                    Tidak ada aset yang cocok
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="toast-container" id="toastContainer"></div>
<div class="aset-tooltip" id="asetTooltip"></div>

@endsection

@push('scripts')


{{-- ===== POPUP LOGIN BERHASIL ===== --}}
@if($showLoginSuccess ?? false)
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userName  = "{{ auth()->user()->name ?? 'Pengguna' }}";
        const userRole  = "{{ ucwords(auth()->user()->role->role ?? 'Pengguna') }}";
        const namaApp   = "{{ $globalSetting->nama_instansi ?? 'Aplikasi Inventaris Sekolah' }}";

        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil!',
            html: `
                <div style="text-align:center;line-height:1.8;">
                    Selamat datang kembali,<br>
                    <strong style="font-size:17px;">${userName}</strong><br>
                    <span style="font-size:13px;color:#64748b;">
                        ${userRole} — ${namaApp}
                    </span>
                </div>
            `,
            confirmButtonColor: '#4f46e5',
            confirmButtonText: 'OK, Lanjutkan',
            timer: 4000,
            timerProgressBar: true,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    });
</script>
@endif

{{-- ... sisa script yang sudah ada (echarts, chartjs, dst) ... --}}



<script src="https://fastly.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

<script>
    const asetData         = @json($asetData);
    const barangMasukData  = @json($barangMasukData);
    const barangKeluarData = @json($barangKeluarData);
    const totalBarang      = {{ $barang ?? 0 }};
    const totalMasukGlobal = {{ $barangMasuk ?? 0 }};
    const totalKeluarGlobal= {{ $barangKeluar ?? 0 }};
</script>

<script>
/* ===== DATETIME ===== */
const namaHari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
const namaBulanPanjang = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
function updateDateTime() {
    const now = new Date();
    document.getElementById('jamSekarang').textContent     = `${String(now.getHours()).padStart(2,'0')}:${String(now.getMinutes()).padStart(2,'0')}:${String(now.getSeconds()).padStart(2,'0')}`;
    document.getElementById('hariIni').textContent         = namaHari[now.getDay()];
    document.getElementById('tanggalSekarang').textContent = `${now.getDate()} ${namaBulanPanjang[now.getMonth()]} ${now.getFullYear()}`;
}
updateDateTime(); setInterval(updateDateTime, 1000);
</script>

<script>
/* ===== TOAST ===== */
function showToast(icon, message, duration = 4000) {
    const container = document.getElementById('toastContainer');
    const el = document.createElement('div');
    el.className = 'toast-item';
    el.innerHTML = `<span class="toast-icon">${icon}</span><span>${message}</span><button class="toast-close" onclick="this.parentElement.remove()">✕</button>`;
    container.appendChild(el);
    setTimeout(() => { el.classList.add('toast-out'); setTimeout(() => el.remove(), 350); }, duration);
}
</script>

<script>
/* ===== COUNT-UP ===== */
function countUp(el, target, duration = 1200) {
    let start = 0;
    const step = target / (duration / 16);
    const timer = setInterval(() => {
        start += step;
        if (start >= target) { el.textContent = target; clearInterval(timer); return; }
        el.textContent = Math.floor(start);
    }, 16);
}
document.querySelectorAll('.stat-value[data-target]').forEach(el => {
    setTimeout(() => countUp(el, parseInt(el.dataset.target) || 0), 400);
});
</script>

<script>
/* ══════════════════════════════════════════════════
   MOTIVASI — UPGRADE PREMIUM
   Fitur: fade-slide animasi, dot navigator, auto-play
   progress bar 8 detik, ikon dinamis per kutipan
══════════════════════════════════════════════════ */
const motivasiList = [
    { icon:'💡', text:'Inventaris rapi, sekolah berprestasi.' },
    { icon:'🎯', text:'Data akurat adalah kunci keputusan terbaik.' },
    { icon:'📦', text:'Satu barang tercatat, satu langkah maju.' },
    { icon:'🚀', text:'Kelola aset hari ini, raih manfaat esok hari.' },
    { icon:'🔍', text:'Transparansi inventaris membangun kepercayaan.' },
    { icon:'✅', text:'Setiap pencatatan adalah bentuk tanggung jawab.' },
    { icon:'📊', text:'Stok terkendali, proses belajar lancar.' },
    { icon:'⭐', text:'Ketelitian kecil membuat perbedaan besar.' },
    { icon:'🗂️', text:'Barang tertata, pikiran pun tenang.' },
    { icon:'💎', text:'Data yang baik lahir dari kebiasaan yang baik.' },
];

const AUTOPLAY_DURATION = 8000; // ms per slide
let motivasiIdx = new Date().getDate() % motivasiList.length;
let motivasiAutoTimer = null;
let motivasiProgressAnim = null;

const elText     = document.getElementById('motivasiText');
const elIcon     = document.getElementById('motivasiIconWrap');
const elCounter  = document.getElementById('motivasiCounter');
const elDots     = document.getElementById('motivasiDots');
const elProgress = document.getElementById('motivasiProgress');

/* Buat dot navigator */
function buildDots() {
    elDots.innerHTML = '';
    motivasiList.forEach((_, i) => {
        const d = document.createElement('span');
        d.className = 'motivasi-dot' + (i === motivasiIdx ? ' active' : '');
        d.addEventListener('click', (e) => { e.stopPropagation(); goToMotivasi(i); });
        elDots.appendChild(d);
    });
}

/* Update tampilan tanpa animasi (init) */
function initMotivasi() {
    const item = motivasiList[motivasiIdx];
    elText.textContent = item.text;
    elIcon.textContent = item.icon;
    elCounter.textContent = `${motivasiIdx + 1} / ${motivasiList.length}`;
    buildDots();
}

/* Pergi ke index tertentu dengan animasi fade-slide */
function goToMotivasi(idx, direction = 'next') {
    /* Fade out */
    elText.classList.add('fade-out');
    elIcon.style.transform = direction === 'next'
        ? 'translateX(10px) scale(.85)'
        : 'translateX(-10px) scale(.85)';
    elIcon.style.opacity = '0';

    setTimeout(() => {
        motivasiIdx = ((idx % motivasiList.length) + motivasiList.length) % motivasiList.length;
        const item = motivasiList[motivasiIdx];

        elText.textContent   = item.text;
        elIcon.textContent   = item.icon;
        elCounter.textContent = `${motivasiIdx + 1} / ${motivasiList.length}`;

        /* Update dots */
        elDots.querySelectorAll('.motivasi-dot').forEach((d, i) => {
            d.classList.toggle('active', i === motivasiIdx);
        });

        /* Fade in */
        elText.classList.remove('fade-out');
        elText.classList.add('fade-in');
        elIcon.style.transform = 'translateX(0) scale(1)';
        elIcon.style.opacity   = '1';
        elIcon.style.transition = 'transform .35s cubic-bezier(.34,1.56,.64,1), opacity .3s ease';

        setTimeout(() => elText.classList.remove('fade-in'), 350);
    }, 220);

    /* Reset + restart progress bar */
    startProgressBar();
}

/* Progress bar animasi */
function startProgressBar() {
    clearTimeout(motivasiAutoTimer);
    cancelAnimationFrame(motivasiProgressAnim);

    elProgress.style.transition = 'none';
    elProgress.style.width = '0%';

    /* Mulai animasi setelah reflow */
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            elProgress.style.transition = `width ${AUTOPLAY_DURATION}ms linear`;
            elProgress.style.width = '100%';
        });
    });

    /* Auto next setelah durasi */
    motivasiAutoTimer = setTimeout(() => {
        goToMotivasi(motivasiIdx + 1, 'next');
    }, AUTOPLAY_DURATION);
}

/* Pause saat hover, lanjut setelah keluar */
document.getElementById('motivasiCard').addEventListener('mouseenter', () => {
    clearTimeout(motivasiAutoTimer);
    /* Pause progress bar: simpan posisi saat ini */
    const computed = getComputedStyle(elProgress).width;
    const pct = parseFloat(computed) / elProgress.parentElement.offsetWidth * 100;
    elProgress.style.transition = 'none';
    elProgress.style.width = pct + '%';
});
document.getElementById('motivasiCard').addEventListener('mouseleave', () => {
    /* Lanjutkan dari posisi saat ini — restart saja */
    startProgressBar();
});

/* Klik card atau tombol next */
document.getElementById('motivasiCard').addEventListener('click', () => {
    goToMotivasi(motivasiIdx + 1, 'next');
    showToast(motivasiList[(motivasiIdx) % motivasiList.length].icon, 'Motivasi diperbarui!', 1800);
});
document.getElementById('motivasiNextBtn').addEventListener('click', (e) => {
    e.stopPropagation();
    goToMotivasi(motivasiIdx + 1, 'next');
    showToast(motivasiList[(motivasiIdx) % motivasiList.length].icon, 'Motivasi diperbarui!', 1800);
});

/* Init */
initMotivasi();
startProgressBar();
</script>

<script>
/* ===== QUICK INFO BAND ===== */
(function buildQuickInfo() {
    const totalM = totalMasukGlobal, totalK = totalKeluarGlobal, total = totalM + totalK || 1;
    const rasioVal = totalM > 0 ? (totalM / total * 100).toFixed(0) : 0;
    document.getElementById('qibRasio').textContent  = `${totalM} : ${totalK}`;
    document.getElementById('qibRasioSub').textContent = `${rasioVal}% proporsi barang masuk`;
    setTimeout(() => { document.getElementById('qibRasioBar').style.width = rasioVal + '%'; }, 600);

    if (asetData && asetData.length) {
        const sorted   = [...asetData].sort((a,b) => b.total - a.total);
        const totalAll = asetData.reduce((s,i)=>s+i.total, 0) || 1;
        const topPct   = (sorted[0].total / totalAll * 100).toFixed(0);
        document.getElementById('qibTopAset').textContent  = sorted[0].nama_aset;
        document.getElementById('qibTopAsetSub').textContent = `${sorted[0].total} unit (${topPct}% dari total)`;
        setTimeout(() => { document.getElementById('qibTopAsetBar').style.width = topPct + '%'; }, 700);
    } else {
        document.getElementById('qibTopAset').textContent  = 'Tidak ada data';
        document.getElementById('qibTopAsetSub').textContent = '—';
    }

    let healthPct, healthLabel;
    if (totalM === 0 && totalK === 0) { healthPct = 100; healthLabel = 'Belum ada transaksi'; }
    else {
        const selisih = totalM - totalK;
        if (selisih >= 0) { healthPct = Math.min(100, 50 + (selisih / (totalM||1)) * 50); healthLabel = selisih > 0 ? '✅ Stok aman & bertambah' : '⚖️ Stok seimbang'; }
        else              { healthPct = Math.max(10, 50 - (Math.abs(selisih) / (totalK||1)) * 40); healthLabel = '⚠️ Stok berkurang, perlu pengadaan'; }
    }
    document.getElementById('qibHealth').textContent  = `${Math.round(healthPct)}%`;
    document.getElementById('qibHealthSub').textContent = healthLabel;
    setTimeout(() => { document.getElementById('qibHealthBar').style.width = healthPct + '%'; }, 800);
})();
</script>

<script>
/* ===== GRAFIK INVENTARIS — ECharts ===== */
const allLabels = [...new Set([
    ...barangMasukData.map(i => i.date),
    ...barangKeluarData.map(i => i.date)
])].sort();

const namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

const periodLabel = {
    'all':'Semua Data','1':'1 Bulan Terakhir','2':'2 Bulan Terakhir','3':'3 Bulan Terakhir',
    '4':'4 Bulan Terakhir','5':'5 Bulan Terakhir','6':'6 Bulan Terakhir','7':'7 Bulan Terakhir',
    '8':'8 Bulan Terakhir','9':'9 Bulan Terakhir','10':'10 Bulan Terakhir',
    '11':'11 Bulan Terakhir','12':'1 Tahun Terakhir'
};

function getDataByPeriod(period) {
    const filtered = period === 'all' ? allLabels : allLabels.slice(-parseInt(period));
    const fmt    = filtered.map(l => { const [y,m] = l.split('-'); return `${namaBulan[parseInt(m)-1]} ${y}`; });
    const masuk  = filtered.map(l => { const f = barangMasukData.find(i=>i.date===l);  return f ? f.total : 0; });
    const keluar = filtered.map(l => { const f = barangKeluarData.find(i=>i.date===l); return f ? f.total : 0; });
    return { labels: filtered, fmt, masuk, keluar };
}

const chartDom        = document.getElementById('inventarisChart');
const inventarisChart = echarts.init(chartDom, null, { renderer:'canvas', useDirtyRect:false });

function buildEChartsOption(fmt, masuk, keluar) {
    return {
        tooltip: { trigger:'axis', backgroundColor:'#1e293b', borderColor:'transparent', textStyle:{ fontFamily:'Plus Jakarta Sans', fontSize:13, color:'#fff' }, axisPointer:{ type:'shadow' } },
        legend: { show:false }, toolbox:{ show:false }, calculable:true,
        grid: { top:20, bottom:50, left:20, right:20, containLabel:true },
        xAxis: [{ type:'category', data:fmt, axisLabel:{ fontFamily:'Plus Jakarta Sans', fontSize:12, color:'#94a3b8', rotate: fmt.length > 8 ? 30 : 0 }, axisTick:{ alignWithLabel:true }, axisLine:{ lineStyle:{ color:'#e2e8f0' } } }],
        yAxis: [{ type:'value', minInterval:1, axisLabel:{ fontFamily:'Plus Jakarta Sans', fontSize:12, color:'#94a3b8' }, splitLine:{ lineStyle:{ color:'rgba(148,163,184,0.15)' } } }],
        series: [
            { name:'Barang Masuk', type:'bar', barMaxWidth:40, itemStyle:{ color: new echarts.graphic.LinearGradient(0,0,0,1,[{offset:0,color:'#818cf8'},{offset:1,color:'#4f46e5'}]), borderRadius:[6,6,0,0] }, emphasis:{ itemStyle:{ color:'#6366f1' } }, data:masuk, markPoint:{ data:[{ type:'max', name:'Tertinggi', itemStyle:{color:'#4f46e5'} },{ type:'min', name:'Terendah', itemStyle:{color:'#a5b4fc'} }], label:{ fontFamily:'Plus Jakarta Sans', fontSize:11 } }, markLine:{ data:[{ type:'average', name:'Rata-rata' }], lineStyle:{ color:'#4f46e5', type:'dashed' }, label:{ fontFamily:'Plus Jakarta Sans', fontSize:11, color:'#4f46e5', formatter: params => 'IN: '+parseFloat(params.value).toFixed(1) } } },
            { name:'Barang Keluar', type:'bar', barMaxWidth:40, itemStyle:{ color: new echarts.graphic.LinearGradient(0,0,0,1,[{offset:0,color:'#67e8f9'},{offset:1,color:'#06b6d4'}]), borderRadius:[6,6,0,0] }, emphasis:{ itemStyle:{ color:'#22d3ee' } }, data:keluar, markPoint:{ data:[{ type:'max', name:'Tertinggi', itemStyle:{color:'#06b6d4'} },{ type:'min', name:'Terendah', itemStyle:{color:'#a5f3fc'} }], label:{ fontFamily:'Plus Jakarta Sans', fontSize:11 } }, markLine:{ data:[{ type:'average', name:'Rata-rata' }], lineStyle:{ color:'#06b6d4', type:'dashed' }, label:{ fontFamily:'Plus Jakarta Sans', fontSize:11, color:'#06b6d4', formatter: params => 'OUT: '+parseFloat(params.value).toFixed(1) } } }
        ]
    };
}

function buildProgressNote(fmt, masuk, keluar) {
    if (!fmt.length) return;
    const last = fmt.length - 1, m = masuk[last], k = keluar[last], s = m - k, bulan = fmt[last];
    const totalM = masuk.reduce((a,b)=>a+b,0), totalK = keluar.reduce((a,b)=>a+b,0);
    let tM='', tK='';
    if (fmt.length >= 2) {
        const dM = m - masuk[last-1];
        tM = dM>0 ? `<span style="font-size:11px;font-weight:600;color:#15803d;">▲ ${dM} dari bulan lalu</span>` : dM<0 ? `<span style="font-size:11px;font-weight:600;color:#b91c1c;">▼ ${Math.abs(dM)} dari bulan lalu</span>` : `<span style="font-size:11px;font-weight:600;color:#b45309;">= Sama seperti bulan lalu</span>`;
        const dK = k - keluar[last-1];
        tK = dK>0 ? `<span style="font-size:11px;font-weight:600;color:#b91c1c;">▲ ${dK} dari bulan lalu</span>` : dK<0 ? `<span style="font-size:11px;font-weight:600;color:#15803d;">▼ ${Math.abs(dK)} dari bulan lalu</span>` : `<span style="font-size:11px;font-weight:600;color:#b45309;">= Sama seperti bulan lalu</span>`;
    }
    let html = `<div class="progress-note-grid">
        <div class="progress-box progress-success"><div class="progress-icon-wrap">📥</div><div class="progress-text"><span class="progress-label">Barang Masuk — ${bulan}</span><span class="progress-value">${m} unit diterima</span>${tM}<span style="font-size:11px;color:#64748b;margin-top:2px;">Total semua periode: <b>${totalM} unit</b></span></div></div>
        <div class="progress-box progress-warning"><div class="progress-icon-wrap">📤</div><div class="progress-text"><span class="progress-label">Barang Keluar — ${bulan}</span><span class="progress-value">${k} unit dikeluarkan</span>${tK}<span style="font-size:11px;color:#64748b;margin-top:2px;">Total semua periode: <b>${totalK} unit</b></span></div></div>`;
    if (s > 0)      html += `<div class="progress-box progress-success"><div class="progress-icon-wrap">✅</div><div class="progress-text"><span class="progress-label">Status Stok — ${bulan}</span><span class="progress-value">Stok bertambah +${s} unit</span><span style="font-size:11px;font-weight:600;color:#15803d;">Barang masuk lebih banyak dari keluar</span><span style="font-size:11px;color:#64748b;margin-top:2px;">Kondisi gudang <b>aman &amp; terkendali</b></span></div></div>`;
    else if (s < 0) html += `<div class="progress-box progress-danger"><div class="progress-icon-wrap">⚠️</div><div class="progress-text"><span class="progress-label">Status Stok — ${bulan}</span><span class="progress-value">Stok berkurang ${s} unit</span><span style="font-size:11px;font-weight:600;color:#b91c1c;">Barang keluar melebihi barang masuk</span><span style="font-size:11px;color:#64748b;margin-top:2px;">Segera lakukan <b>pengadaan barang</b></span></div></div>`;
    else            html += `<div class="progress-box progress-warning"><div class="progress-icon-wrap">⚖️</div><div class="progress-text"><span class="progress-label">Status Stok — ${bulan}</span><span class="progress-value">Stok tidak berubah</span><span style="font-size:11px;font-weight:600;color:#b45309;">Jumlah masuk &amp; keluar seimbang</span><span style="font-size:11px;color:#64748b;margin-top:2px;">Pantau terus ketersediaan stok</span></div></div>`;
    html += `</div>`;
    document.getElementById('progressNote').innerHTML = html;
}

function renderChart(period) {
    const { fmt, masuk, keluar } = getDataByPeriod(period);
    inventarisChart.setOption(buildEChartsOption(fmt, masuk, keluar), true);
    buildProgressNote(fmt, masuk, keluar);
    document.getElementById('periodActiveBadgeText').textContent = periodLabel[period] || 'Semua Data';
}

renderChart('all');

document.getElementById('periodSelect').addEventListener('change', function () {
    renderChart(this.value);
    showToast('📅', `Periode diubah: ${periodLabel[this.value] || 'Semua Data'}`, 2000);
});

let currentChartType = 'bar';
function switchChartType(type) {
    currentChartType = type;
    document.getElementById('btnTypeBar').classList.toggle('active',  type==='bar');
    document.getElementById('btnTypeLine').classList.toggle('active', type==='line');
    const activePeriod = document.getElementById('periodSelect').value;
    const { fmt, masuk, keluar } = getDataByPeriod(activePeriod);
    const opt = buildEChartsOption(fmt, masuk, keluar);
    opt.series.forEach(s => {
        s.type = type;
        if (type === 'line') { s.smooth=true; s.areaStyle={opacity:.15}; s.lineStyle={width:3}; s.symbolSize=8; s.itemStyle={borderWidth:2,borderColor:'#fff'}; delete s.barMaxWidth; }
        else { delete s.smooth; delete s.areaStyle; delete s.lineStyle; delete s.symbolSize; }
    });
    inventarisChart.setOption(opt, true);
    showToast(type==='line'?'📈':'📊', `Tampilan diganti ke ${type==='line'?'Line':'Bar'} Chart`, 2000);
}

function resetChart() {
    currentChartType = 'bar';
    document.getElementById('btnTypeBar').classList.add('active');
    document.getElementById('btnTypeLine').classList.remove('active');
    document.getElementById('periodSelect').value = 'all';
    document.getElementById('periodActiveBadgeText').textContent = 'Semua Data';
    renderChart('all');
    showToast('🔄', 'Grafik berhasil direset!', 2000);
}

function saveChartImage() {
    const url = inventarisChart.getDataURL({ type:'png', pixelRatio:2, backgroundColor:'#fff' });
    const a = document.createElement('a'); a.href = url; a.download = 'grafik-inventaris.png'; a.click();
    showToast('🖼️', 'Gambar grafik berhasil disimpan!', 2500);
}

window.addEventListener('resize', () => inventarisChart.resize());
</script>

<script>
/* ===== EXPORT PDF ===== */
async function imgToBase64(url) {
    try {
        const res = await fetch(url), blob = await res.blob();
        return await new Promise(resolve => { const r=new FileReader(); r.onload=()=>resolve(r.result); r.onerror=()=>resolve(null); r.readAsDataURL(blob); });
    } catch(e) { return null; }
}

async function exportPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({ orientation:'portrait', unit:'mm', format:'a4' });
    const activePeriod = document.getElementById('periodSelect').value;
    const { labels, masuk, keluar } = getDataByPeriod(activePeriod);
    const nb = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const pageW=doc.internal.pageSize.getWidth(), margin=14;
    const tglCetak=new Date().toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric'});
    const logoSekolah=await imgToBase64('/img/logo-sekolah.png'), logoDinas=await imgToBase64('/img/logo-dinas.png');
    const kopTop=18, logoSize=22, kopGarisY=kopTop+logoSize+4;
    doc.setDrawColor(30,58,138); doc.setLineWidth(0.4); doc.line(margin,kopTop-3,pageW-margin,kopTop-3);
    if (logoSekolah) doc.addImage(logoSekolah,'PNG',margin,kopTop,logoSize,logoSize);
    if (logoDinas)   doc.addImage(logoDinas,'PNG',pageW-margin-logoSize,kopTop,logoSize,logoSize);
    const teksStartY=kopTop+5;
    doc.setFont('helvetica','bold'); doc.setFontSize(9.5); doc.setTextColor(30,58,138);
    doc.text('YAYASAN CITIA VIDIA SASANA',pageW/2,teksStartY,{align:'center'});
    doc.setFontSize(15); doc.text('SMKS VIDYA SASANA',pageW/2,teksStartY+7,{align:'center'});
    doc.setFont('helvetica','normal'); doc.setFontSize(8.5); doc.setTextColor(60,60,60);
    doc.text('Jl. Raja Oesman No. 5, Tanjung Balai Karimun',pageW/2,teksStartY+13,{align:'center'});
    doc.text('Telp. (021) 123456  |  Email: smkvidyasasana2023@gmail.com',pageW/2,teksStartY+18,{align:'center'});
    doc.setDrawColor(30,58,138); doc.setLineWidth(1.2); doc.line(margin,kopGarisY,pageW-margin,kopGarisY);
    const judulY=kopGarisY+10;
    doc.setFont('helvetica','bold'); doc.setFontSize(13); doc.setTextColor(30,58,138);
    doc.text('LAPORAN BARANG MASUK DAN KELUAR',pageW/2,judulY,{align:'center'});
    doc.setDrawColor(30,58,138); doc.setLineWidth(0.7); doc.line((pageW-100)/2,judulY+3,(pageW+100)/2,judulY+3);
    doc.setFont('helvetica','normal'); doc.setFontSize(9); doc.setTextColor(100,100,100);
    doc.text(`Tanggal Cetak: ${tglCetak}`,margin,judulY+10);
    const rows=labels.map((l,i)=>{ const [y,m]=l.split('-'); const sel=masuk[i]-keluar[i]; return [String(i+1),`${nb[parseInt(m)-1]} ${y}`,masuk[i],keluar[i],sel>=0?`+${sel}`:`${sel}`]; });
    const totalMasuk=masuk.reduce((a,b)=>a+b,0), totalKeluar=keluar.reduce((a,b)=>a+b,0), totalSelisih=totalMasuk-totalKeluar;
    doc.autoTable({ startY:judulY+16, head:[['No','Bulan','Barang Masuk','Barang Keluar','Selisih']], body:rows, foot:[[{content:'TOTAL',colSpan:2,styles:{halign:'right',fontStyle:'bold'}},totalMasuk,totalKeluar,totalSelisih>=0?`+${totalSelisih}`:`${totalSelisih}`]], showFoot:'lastPage', styles:{ font:'helvetica', fontSize:10, cellPadding:5, overflow:'hidden' }, headStyles:{ fillColor:[30,58,138], textColor:255, fontStyle:'bold', halign:'center' }, footStyles:{ fillColor:[30,58,138], textColor:255, fontStyle:'bold', halign:'center' }, columnStyles:{ 0:{halign:'center',cellWidth:18}, 1:{halign:'left'}, 2:{halign:'center',cellWidth:35}, 3:{halign:'center',cellWidth:35}, 4:{halign:'center',cellWidth:25} }, alternateRowStyles:{ fillColor:[244,246,250] }, margin:{ left:margin, right:margin } });
    const finalY=doc.lastAutoTable.finalY+18, colW=(pageW-margin*2)/2, lineHalf=36, ttdY=finalY+28;
    doc.setFont('helvetica','normal'); doc.setFontSize(10); doc.setTextColor(50,50,50);
    doc.text('Mengetahui,',margin+colW/2,finalY,{align:'center'});
    doc.text('Kepala Sekolah',margin+colW/2,finalY+6,{align:'center'});
    doc.text(`Tanjung Balai Karimun, ${tglCetak}`,margin+colW+colW/2,finalY,{align:'center'});
    doc.text('Waka Sarana dan Prasarana',margin+colW+colW/2,finalY+6,{align:'center'});
    doc.setFont('helvetica','bold'); doc.setFontSize(10);
    doc.text('Nama Kepala Sekolah',margin+colW/2,ttdY,{align:'center'});
    doc.text('Nama Waka',margin+colW+colW/2,ttdY,{align:'center'});
    doc.setDrawColor(80,80,80); doc.setLineWidth(0.3);
    doc.line(margin+colW/2-lineHalf,ttdY+2,margin+colW/2+lineHalf,ttdY+2);
    doc.line(margin+colW+colW/2-lineHalf,ttdY+2,margin+colW+colW/2+lineHalf,ttdY+2);
    doc.setFont('helvetica','normal'); doc.setFontSize(9);
    doc.text('NIP. 1234567890123456',margin+colW/2,ttdY+7,{align:'center'});
    doc.text('NUPTK. 1234567890123456',margin+colW+colW/2,ttdY+7,{align:'center'});
    doc.save('laporan-barang-masuk-keluar.pdf');
}
</script>

<script>
/* ===== GRAFIK ASET (Chart.js) ===== */
(function () {
    const PALETTE = ['#4f46e5','#06b6d4','#10b981','#f59e0b','#ef4444','#8b5cf6','#ec4899','#14b8a6','#f97316','#6366f1','#0ea5e9','#84cc16','#a855f7','#d946ef','#22c55e'];
    const rawLabels=asetData.map(i=>i.nama_aset), rawTotals=asetData.map(i=>i.total);
    let currentView='donut', currentSort='default', searchQuery='', chartInstance=null, barInstance=null;

    function getFilteredData() {
        let indices=rawLabels.map((_,i)=>i);
        if (searchQuery) indices=indices.filter(i=>rawLabels[i].toLowerCase().includes(searchQuery.toLowerCase()));
        if (currentSort==='asc')  indices.sort((a,b)=>rawTotals[a]-rawTotals[b]);
        if (currentSort==='desc') indices.sort((a,b)=>rawTotals[b]-rawTotals[a]);
        return { labels:indices.map(i=>rawLabels[i]), totals:indices.map(i=>rawTotals[i]), colors:indices.map(i=>PALETTE[i%PALETTE.length]) };
    }
    function setDonutCenter(value, label) { document.getElementById('dclValue').textContent=value; document.getElementById('dclLabel').textContent=label; document.getElementById('dclUnit').textContent=''; }
    function syncPanelVisibility() {
        const panel=document.getElementById('pieInfoPanel'), donutLabel=document.getElementById('donutCenterLabel');
        if (currentView==='pie') { panel.classList.add('visible'); donutLabel.style.display='none'; document.getElementById('pipValue').textContent='—'; document.getElementById('pipLabel').textContent='Hover / klik segmen untuk detail'; document.getElementById('pipPct').textContent=''; }
        else if (currentView==='donut') { panel.classList.remove('visible'); donutLabel.style.display='block'; }
        else { panel.classList.remove('visible'); donutLabel.style.display='none'; }
    }
    function renderLegend(data) {
        const container=document.getElementById('asetLegendUpgraded'), total=data.totals.reduce((a,b)=>a+b,0)||1;
        container.innerHTML='';
        const emptyEl=document.getElementById('asetEmpty');
        if (!data.labels.length) { emptyEl.style.display='block'; return; }
        emptyEl.style.display='none';
        data.labels.forEach((label,i)=>{
            const pct=(data.totals[i]/total)*100, pctDisplay=pct>0?`<div style="font-size:10px;font-weight:700;color:#94a3b8;margin-top:2px;">${pct.toFixed(1)}%</div>`:'';
            const card=document.createElement('div'); card.className='aset-legend-card'; card.style.setProperty('--lc-color',data.colors[i]);
            card.innerHTML=`<div class="lc-dot" style="background:${data.colors[i]}"></div><div class="lc-info"><div class="lc-name" title="${label}">${label}</div><div class="lc-bar-wrap"><div class="lc-bar-fill" style="--lc-color:${data.colors[i]}" data-width="${pct}"></div></div></div><div class="lc-right"><div class="lc-value">${data.totals[i]} <small style="font-size:10px;font-weight:600;color:#94a3b8">Unit</small></div>${pctDisplay}</div>`;
            card.addEventListener('mouseenter',()=>highlightSegment(i,data,card));
            card.addEventListener('mouseleave',()=>resetHighlight(data));
            card.addEventListener('click',()=>{ if(currentView==='donut') setDonutCenter(data.totals[i],label); });
            container.appendChild(card);
        });
        requestAnimationFrame(()=>{ container.querySelectorAll('.lc-bar-fill').forEach(bar=>{ bar.style.width=bar.dataset.width+'%'; }); });
    }
    function highlightSegment(idx,data,card) {
        if (chartInstance) { const meta=chartInstance.getDatasetMeta(0); meta.data.forEach((arc,i)=>{ arc.options.offset=i===idx?14:0; }); chartInstance.update('none'); }
        document.querySelectorAll('.aset-legend-card').forEach(c=>c.classList.remove('highlighted'));
        if (card) card.classList.add('highlighted');
        if (currentView==='donut') setDonutCenter(data.totals[idx],data.labels[idx]);
    }
    function resetHighlight(data) {
        if (chartInstance) { const meta=chartInstance.getDatasetMeta(0); meta.data.forEach(arc=>{ arc.options.offset=0; }); chartInstance.update('none'); }
        document.querySelectorAll('.aset-legend-card').forEach(c=>c.classList.remove('highlighted'));
        if (currentView==='donut') setDonutCenter(data.labels.length,'Jenis Aset');
    }
    function renderPieDonut(data,type) {
        document.getElementById('donutWrapper').style.display='flex';
        document.getElementById('asetBarWrap').classList.remove('active');
        syncPanelVisibility();
        const canvasCtx=document.getElementById('asetChartUpgraded').getContext('2d');
        if (chartInstance) { chartInstance.destroy(); chartInstance=null; }
        if (barInstance)   { barInstance.destroy();   barInstance=null; }
        chartInstance=new Chart(canvasCtx,{
            type:type==='donut'?'doughnut':'pie',
            data:{ labels:data.labels, datasets:[{ data:data.totals, backgroundColor:data.colors, borderColor:'#fff', borderWidth:3, hoverOffset:0, offset:data.totals.map(()=>0) }] },
            options:{ responsive:false, cutout:type==='donut'?'65%':'0%', animation:{ animateRotate:true, duration:900, easing:'easeInOutQuart' }, plugins:{ legend:{ display:false }, tooltip:{ enabled:false, external:function(context) {
                const tip=context.tooltip, ttEl=document.getElementById('asetTooltip'), canvas=document.getElementById('asetChartUpgraded');
                if (tip.opacity===0) { ttEl.style.opacity='0'; if(type==='pie'){ document.getElementById('pipValue').textContent='—'; document.getElementById('pipLabel').textContent='Hover / klik segmen untuk detail'; document.getElementById('pipPct').textContent=''; } return; }
                const total=data.totals.reduce((a,b)=>a+b,0)||1, idx=tip.dataPoints[0].dataIndex, pct=((data.totals[idx]/total)*100).toFixed(1);
                if (type==='pie') { document.getElementById('pipValue').textContent=data.totals[idx]+' Unit'; document.getElementById('pipLabel').textContent=data.labels[idx]; const pctEl=document.getElementById('pipPct'); pctEl.textContent=pct+'%'; pctEl.style.background=data.colors[idx]; }
                const rect=canvas.getBoundingClientRect();
                ttEl.innerHTML=`<strong>${data.labels[idx]}</strong><br>${data.totals[idx]} Unit &bull; ${pct}%`;
                ttEl.style.opacity='1'; ttEl.style.left=(rect.left+window.scrollX+tip.caretX)+'px'; ttEl.style.top=(rect.top+window.scrollY+tip.caretY-60)+'px';
            }}}, onHover:function(event,elements){ const cards=document.querySelectorAll('.aset-legend-card'); if(elements.length) highlightSegment(elements[0].index,data,cards[elements[0].index]); else resetHighlight(data); }, onClick:function(event,elements){ if(elements.length&&type==='pie'){ const idx=elements[0].index, total=data.totals.reduce((a,b)=>a+b,0)||1, pct=((data.totals[idx]/total)*100).toFixed(1); document.getElementById('pipValue').textContent=data.totals[idx]+' Unit'; document.getElementById('pipLabel').textContent=data.labels[idx]; const pctEl=document.getElementById('pipPct'); pctEl.textContent=pct+'%'; pctEl.style.background=data.colors[idx]; } } }
        });
        if (type==='donut') setDonutCenter(data.labels.length,'Jenis Aset');
    }
    function renderBar(data) {
        document.getElementById('donutWrapper').style.display='none';
        document.getElementById('asetBarWrap').classList.add('active');
        syncPanelVisibility();
        const barCtx=document.getElementById('asetBarChart').getContext('2d');
        if (barInstance) { barInstance.destroy(); barInstance=null; }
        if (chartInstance) { chartInstance.destroy(); chartInstance=null; }
        barInstance=new Chart(barCtx,{ type:'bar', data:{ labels:data.labels, datasets:[{ label:'Jumlah Unit', data:data.totals, backgroundColor:data.colors, borderRadius:8, borderSkipped:false, barThickness:28 }] }, options:{ indexAxis:'y', responsive:true, animation:{ duration:800, easing:'easeInOutQuart' }, plugins:{ legend:{display:false}, tooltip:{ backgroundColor:'#1e293b', titleFont:{family:'Plus Jakarta Sans',weight:'700',size:13}, bodyFont:{family:'Plus Jakarta Sans',size:12}, padding:12, cornerRadius:10, callbacks:{label:ctx=>` ${ctx.parsed.x} Unit`} } }, scales:{ x:{ beginAtZero:true, ticks:{precision:0,font:{family:'Plus Jakarta Sans',size:11},color:'#94a3b8'}, grid:{color:'rgba(148,163,184,.12)'} }, y:{ ticks:{font:{family:'Plus Jakarta Sans',size:11},color:'#334155'}, grid:{display:false} } } } });
    }
    function renderAll() { const data=getFilteredData(); renderLegend(data); if(currentView==='bar') renderBar(data); else renderPieDonut(data,currentView); }
    if (asetData&&asetData.length) renderAll();
    document.querySelectorAll('.view-toggle-btn').forEach(btn=>{ btn.addEventListener('click',function(){ document.querySelectorAll('.view-toggle-btn').forEach(b=>b.classList.remove('active')); this.classList.add('active'); currentView=this.dataset.view; renderAll(); }); });
    document.querySelectorAll('.sort-btn').forEach(btn=>{ btn.addEventListener('click',function(){ document.querySelectorAll('.sort-btn').forEach(b=>b.classList.remove('active')); this.classList.add('active'); currentSort=this.dataset.sort; renderAll(); }); });
    document.getElementById('asetSearchInput').addEventListener('input',function(){ searchQuery=this.value.trim(); renderAll(); });
    document.getElementById('asetChartUpgraded').addEventListener('mouseleave',()=>{ document.getElementById('asetTooltip').style.opacity='0'; });
})();
</script>

@endpush