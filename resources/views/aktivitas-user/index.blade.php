@extends('layouts.app')

<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&family=Playfair+Display:wght@700&display=swap');

/* ═══════════════════════════════════════
   TOKENS
═══════════════════════════════════════ */
:root {
    --ink:        #0c111d;
    --ink2:       #1a2235;
    --surface:    #ffffff;
    --muted:      #64748b;
    --border:     #e4e9f2;
    --blue:       #2563eb;
    --cyan:       #06b6d4;
    --green:      #10b981;
    --red:        #ef4444;
    --orange:     #f97316;
    --purple:     #8b5cf6;
    --indigo:     #6366f1;
    --mono:       'DM Mono', monospace;
    --sans:       'DM Sans', sans-serif;
}

*, *::before, *::after { box-sizing: border-box; }
body { font-family: var(--sans); }

/* ═══════════════════════════════════════
   PAGE HEADER
═══════════════════════════════════════ */
.act-header {
    background: linear-gradient(135deg, #2563eb 0%, #3b82f6 55%, #06b6d4 100%);
    border-radius: 24px;
    padding: 32px 36px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 16px 50px rgba(37,99,235,.28);
}
.act-header::before {
    content: '';
    position: absolute;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(255,255,255,.14) 0%, transparent 65%);
    top: -200px; right: -100px;
}
.act-header::after {
    content: '';
    position: absolute;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,255,255,.09) 0%, transparent 65%);
    bottom: -150px; left: 80px;
}
.act-header-inner { position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px; }
.act-header-left {}
.act-label {
    display: inline-flex; align-items: center; gap: 7px;
    background: rgba(255,255,255,.2);
    border: 1px solid rgba(255,255,255,.35);
    border-radius: 999px;
    padding: 5px 14px;
    font-size: 10.5px; font-weight: 700;
    letter-spacing: 1.3px; text-transform: uppercase;
    color: #e0f2fe;
    margin-bottom: 12px;
}
.act-title {
    font-family: 'Playfair Display', serif;
    font-size: 30px; font-weight: 700;
    color: #ffffff;
    margin-bottom: 6px;
    line-height: 1.2;
}
.act-subtitle { font-size: 13px; color: rgba(255,255,255,.82); }

/* Stats chips */
.act-stats { display: flex; gap: 10px; flex-wrap: wrap; }
.stat-chip {
    background: rgba(255,255,255,.22);
    border: 1px solid rgba(255,255,255,.35);
    border-radius: 12px;
    padding: 10px 16px;
    text-align: center;
    min-width: 80px;
    backdrop-filter: blur(4px);
}
.stat-chip-num { font-size: 20px; font-weight: 700; color: #fff; line-height: 1; }
.stat-chip-label { font-size: 10px; color: rgba(255,255,255,.78); text-transform: uppercase; letter-spacing: .8px; margin-top: 3px; }

/* ═══════════════════════════════════════
   FILTER BAR
═══════════════════════════════════════ */
.filter-bar {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 14px 20px;
    margin-bottom: 20px;
    display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
    box-shadow: 0 2px 12px rgba(0,0,0,.05);
}
.filter-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px;
    border-radius: 10px;
    font-size: 12.5px; font-weight: 600;
    border: 1.5px solid var(--border);
    background: #f8faff;
    color: var(--muted);
    cursor: pointer;
    transition: all .25s;
}
.filter-btn:hover, .filter-btn.active {
    background: var(--blue);
    color: #fff;
    border-color: var(--blue);
}
.filter-btn.f-created.active { background: var(--green); border-color: var(--green); }
.filter-btn.f-updated.active { background: var(--blue); border-color: var(--blue); }
.filter-btn.f-deleted.active { background: var(--red); border-color: var(--red); }
.filter-btn.f-login.active   { background: var(--purple); border-color: var(--purple); }

.filter-search {
    margin-left: auto;
    display: flex; align-items: center; gap: 8px;
    background: #f1f5f9;
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 13px; color: var(--muted);
    min-width: 200px;
}
.filter-search input {
    border: none; background: transparent;
    outline: none; font-size: 13px;
    color: var(--ink); width: 100%;
    font-family: var(--sans);
}

/* ═══════════════════════════════════════
   TIMELINE
═══════════════════════════════════════ */
.timeline-wrap {
    position: relative;
    padding-left: 28px;
}
.timeline-wrap::before {
    content: '';
    position: absolute;
    top: 0; left: 15px;
    width: 2px; height: 100%;
    background: linear-gradient(to bottom, #6366f1 0%, #06b6d4 50%, rgba(6,182,212,0) 100%);
    border-radius: 2px;
}

/* Activity row */
.act-row {
    display: flex; gap: 18px;
    margin-bottom: 18px;
    cursor: pointer;
    animation: rowIn .4s ease both;
}
@keyframes rowIn {
    from { opacity: 0; transform: translateX(-12px); }
    to   { opacity: 1; transform: translateX(0); }
}

/* Avatar dot on timeline */
.act-avatar {
    width: 44px; height: 44px;
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    color: #fff;
    font-size: 17px;
    box-shadow: 0 8px 24px rgba(0,0,0,.2);
    border: 2px solid rgba(255,255,255,.25);
    position: relative; z-index: 1;
    transition: transform .25s ease;
}
.act-row:hover .act-avatar { transform: scale(1.1); }

/* Card */
.act-card {
    background: #fff;
    border: 1.5px solid var(--border);
    border-radius: 18px;
    padding: 18px 22px;
    flex: 1;
    transition: all .3s ease;
    position: relative;
    overflow: hidden;
}
.act-card::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 4px;
    border-radius: 4px 0 0 4px;
}
.act-row[data-type="created"] .act-card::before { background: var(--green); }
.act-row[data-type="updated"] .act-card::before { background: var(--blue); }
.act-row[data-type="deleted"] .act-card::before { background: var(--red); }
.act-row[data-type="login"]   .act-card::before { background: var(--purple); }
.act-row[data-type="export"]  .act-card::before { background: var(--orange); }

.act-row:hover .act-card {
    transform: translateY(-4px);
    box-shadow: 0 16px 48px rgba(37,99,235,.13);
    border-color: rgba(37,99,235,.2);
}

.act-card-top {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 8px; flex-wrap: wrap;
}

/* Pill badges */
.pill-user {
    display: inline-flex; align-items: center; gap: 5px;
    background: linear-gradient(135deg, #1e3a8a, #1d4ed8);
    color: #fff;
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 12px; font-weight: 600;
}
.pill-action {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 11px; font-weight: 700;
    letter-spacing: .4px; text-transform: uppercase;
}
.pill-created { background: rgba(16,185,129,.12); color: #059669; }
.pill-updated  { background: rgba(37,99,235,.12); color: #1d4ed8; }
.pill-deleted  { background: rgba(239,68,68,.12);  color: #dc2626; }
.pill-login    { background: rgba(139,92,246,.12); color: #7c3aed; }
.pill-export   { background: rgba(249,115,22,.12); color: #ea580c; }

.act-time {
    margin-left: auto;
    font-size: 11.5px; color: var(--muted);
    font-family: var(--mono);
    display: flex; align-items: center; gap: 5px;
}

.act-desc {
    font-size: 13px; color: var(--muted);
    line-height: 1.55;
    margin-bottom: 10px;
}
.act-desc strong { color: var(--ink); }

/* Mini diff preview on card */
.diff-preview {
    display: flex; gap: 6px;
    flex-wrap: wrap;
}
.diff-tag {
    font-family: var(--mono);
    font-size: 10.5px;
    padding: 3px 8px;
    border-radius: 6px;
    display: inline-flex; align-items: center; gap: 4px;
}
.diff-tag.old { background: rgba(239,68,68,.1); color: #dc2626; }
.diff-tag.new { background: rgba(16,185,129,.1); color: #059669; }

/* Click hint */
.view-detail-hint {
    position: absolute; right: 16px; bottom: 14px;
    font-size: 11px; font-weight: 700; color: var(--blue);
    display: flex; align-items: center; gap: 4px;
    opacity: 0; transform: translateX(6px);
    transition: all .3s;
}
.act-row:hover .view-detail-hint { opacity: 1; transform: translateX(0); }

/* Empty */
.empty-state {
    text-align: center; padding: 80px 20px; color: var(--muted);
}
.empty-state i { font-size: 52px; color: #c7d2fe; margin-bottom: 14px; display: block; }

/* ═══════════════════════════════════════
   MODAL SYSTEM
═══════════════════════════════════════ */
.m-overlay {
    display: none;
    position: fixed; inset: 0; z-index: 9000;
    background: rgba(37,99,235,.15);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(10px);
    align-items: center; justify-content: center;
    padding: 16px;
}
.m-overlay.open { display: flex; }

.m-box {
    background: #fff;
    border-radius: 28px;
    width: 100%; max-width: 680px;
    max-height: 92vh;
    display: flex; flex-direction: column;
    box-shadow: 0 30px 80px rgba(37,99,235,.22), 0 4px 20px rgba(0,0,0,.1);
    animation: mIn .38s cubic-bezier(.34,1.56,.64,1);
    overflow: hidden;
}
@keyframes mIn {
    from { opacity: 0; transform: scale(.86) translateY(40px); }
    to   { opacity: 1; transform: scale(1)   translateY(0); }
}

/* Modal header (light blue) */
.m-head {
    background: linear-gradient(135deg, #2563eb 0%, #3b82f6 55%, #06b6d4 100%);
    padding: 28px 32px;
    position: relative;
    overflow: hidden;
    flex-shrink: 0;
}
.m-head::before {
    content: '';
    position: absolute;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,255,255,.15), transparent 65%);
    top: -100px; right: -60px;
}
.m-head-inner { position: relative; z-index: 1; }
.m-close-btn {
    position: absolute; top: 16px; right: 16px; z-index: 10;
    width: 34px; height: 34px;
    border-radius: 50%;
    background: rgba(255,255,255,.2);
    border: 1px solid rgba(255,255,255,.35);
    color: #fff; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
    transition: background .2s;
}
.m-close-btn:hover { background: rgba(255,255,255,.2); }

.m-head-row1 {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 16px;
}
.m-avatar {
    width: 52px; height: 52px;
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 22px;
    border: 2px solid rgba(255,255,255,.2);
}
.m-user-name {
    font-size: 18px; font-weight: 700; color: #fff;
    margin-bottom: 2px;
}
.m-timestamp { font-family: var(--mono); font-size: 11.5px; color: rgba(255,255,255,.5); }
.m-action-pill {
    margin-left: auto;
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 11px; font-weight: 800;
    text-transform: uppercase; letter-spacing: .8px;
}

/* Meta chips row */
.m-meta-row {
    display: flex; gap: 8px; flex-wrap: wrap;
}
.m-meta-chip {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,.2);
    border: 1px solid rgba(255,255,255,.3);
    border-radius: 10px;
    padding: 6px 12px;
    font-size: 12px; color: rgba(255,255,255,.9);
}
.m-meta-chip i { font-size: 11px; color: rgba(255,255,255,.65); }

/* Modal body */
.m-body {
    flex: 1; overflow-y: auto;
    padding: 0;
}
.m-body::-webkit-scrollbar { width: 4px; }
.m-body::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 4px; }

/* Tabs */
.m-tabs {
    display: flex;
    border-bottom: 1px solid var(--border);
    padding: 0 32px;
    background: #fafbff;
}
.m-tab {
    padding: 14px 18px;
    font-size: 13px; font-weight: 600;
    color: var(--muted);
    cursor: pointer;
    border-bottom: 2.5px solid transparent;
    transition: all .2s;
    display: flex; align-items: center; gap: 6px;
    white-space: nowrap;
}
.m-tab:hover { color: var(--ink); }
.m-tab.active { color: var(--blue); border-bottom-color: var(--blue); }

/* Tab panels */
.m-panels { padding: 28px 32px; }
.m-panel { display: none; }
.m-panel.active { display: block; }

/* Section title */
.sec-label {
    font-size: 10px; font-weight: 800;
    letter-spacing: 1.2px; text-transform: uppercase;
    color: var(--blue);
    margin-bottom: 14px;
}

/* DIFF TABLE */
.diff-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-family: var(--mono);
    font-size: 12.5px;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid var(--border);
    margin-bottom: 16px;
}
.diff-table thead th {
    padding: 10px 16px;
    font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;
    color: var(--muted);
    background: #f8faff;
    border-bottom: 1px solid var(--border);
}
.diff-table tbody tr:not(:last-child) td { border-bottom: 1px solid #f1f5f9; }
.diff-table td { padding: 10px 16px; vertical-align: top; }
.diff-table .field-name { color: var(--ink); font-weight: 500; }
.diff-table .val-old { background: rgba(239,68,68,.06); color: #dc2626; }
.diff-table .val-new { background: rgba(16,185,129,.06); color: #059669; }
.diff-table .no-change { color: var(--muted); font-style: italic; font-size: 11px; }

/* Info grid */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 20px;
}
.info-item {
    background: #f8faff;
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 14px 16px;
}
.info-item-label { font-size: 10.5px; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: .8px; margin-bottom: 5px; }
.info-item-val { font-size: 13.5px; font-weight: 600; color: var(--ink); font-family: var(--mono); word-break: break-word; }
.diff-table td { word-break: break-word; }

/* Timeline mini */
.mini-timeline { display: flex; flex-direction: column; gap: 0; }
.mt-item {
    display: flex; gap: 14px; align-items: flex-start;
    padding-bottom: 20px;
    position: relative;
}
.mt-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: 14px; top: 28px;
    width: 2px; bottom: 0;
    background: linear-gradient(to bottom, var(--border), transparent);
}
.mt-dot {
    width: 28px; height: 28px; flex-shrink: 0;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; color: #fff;
    position: relative; z-index: 1;
}
.mt-content { padding-top: 4px; }
.mt-action { font-size: 13px; font-weight: 600; color: var(--ink); }
.mt-time { font-size: 11px; color: var(--muted); font-family: var(--mono); margin-top: 2px; }

/* Modal footer */
.m-foot {
    padding: 18px 32px;
    border-top: 1px solid var(--border);
    background: #fafbff;
    display: flex; align-items: center; justify-content: space-between; gap: 12px;
    flex-shrink: 0;
}
.m-foot-nav { display: flex; gap: 8px; }
.btn-nav {
    width: 36px; height: 36px;
    border-radius: 10px;
    border: 1.5px solid var(--border);
    background: #fff;
    color: var(--muted);
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
    transition: all .2s;
}
.btn-nav:hover:not(:disabled) { background: var(--blue); color: #fff; border-color: var(--blue); }
.btn-nav:disabled { opacity: .35; cursor: not-allowed; }
.btn-close-modal {
    display: inline-flex; align-items: center; gap: 7px;
    background: var(--blue);
    color: #fff;
    padding: 10px 22px;
    border-radius: 12px;
    font-size: 13px; font-weight: 700;
    border: none; cursor: pointer;
    transition: all .25s;
}
.btn-close-modal:hover { background: #1d4ed8; transform: translateY(-1px); }
.foot-info { font-size: 11.5px; color: var(--muted); font-family: var(--mono); }

/* ═══════════════════════════════════════
   PAGINATION AKTIVITAS
═══════════════════════════════════════ */
.activity-pagination {
    margin-top: 22px;
    padding-top: 18px;
    border-top: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    flex-wrap: wrap;
}

.pagination-info {
    font-size: 12.5px;
    color: var(--muted);
    font-weight: 600;
}

.pagination-info strong {
    color: var(--ink);
    font-weight: 800;
}

.pagination-controls {
    display: flex;
    align-items: center;
    gap: 7px;
    flex-wrap: wrap;
}

.page-btn {
    min-width: 36px;
    height: 36px;
    padding: 0 11px;
    border-radius: 10px;
    border: 1.5px solid var(--border);
    background: #fff;
    color: var(--muted);
    font-size: 12.5px;
    font-weight: 700;
    cursor: pointer;
    transition: all .22s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.page-btn:hover:not(:disabled),
.page-btn.active {
    background: var(--blue);
    border-color: var(--blue);
    color: #fff;
    box-shadow: 0 8px 20px rgba(37,99,235,.22);
}

.page-btn:disabled {
    opacity: .45;
    cursor: not-allowed;
    background: #f8fafc;
}

.page-dots {
    min-width: 24px;
    height: 36px;
    color: var(--muted);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
}

@media (max-width: 640px) {
    .m-box { border-radius: 20px; }
    .m-head { padding: 22px 20px; }
    .m-panels { padding: 20px; }
    .m-tabs { padding: 0 16px; }
    .m-foot { padding: 14px 20px; }
    .info-grid { grid-template-columns: 1fr; }
    .act-header { padding: 22px 20px; }
    .act-header-inner { flex-direction: column; align-items: flex-start; }
}

/* Row stagger */
.act-row:nth-child(1)  { animation-delay: .04s; }
.act-row:nth-child(2)  { animation-delay: .08s; }
.act-row:nth-child(3)  { animation-delay: .12s; }
.act-row:nth-child(4)  { animation-delay: .16s; }
.act-row:nth-child(5)  { animation-delay: .20s; }
.act-row:nth-child(6)  { animation-delay: .24s; }
</style>

@section('content')

{{-- ═══════════ PAGE HEADER ═══════════ --}}
@php
    /*
    |--------------------------------------------------------------------------
    | FIX: Hitung stat header menggunakan logika fleksibel (str_contains)
    | agar cocok dengan log aset seperti "ASET CREATED", "ASET UPDATED", dll.
    | Sebelumnya memakai ->where('description','created') yang hanya
    | mencocokkan exact string — menyebabkan hitungan header tidak sinkron
    | dengan jumlah baris yang tampil di timeline.
    |--------------------------------------------------------------------------
    */
    $statCreated = $logs->filter(fn($l) =>
        str_contains(strtolower($l->description), 'created') ||
        str_contains(strtolower($l->description), 'create')  ||
        str_contains(strtolower($l->description), 'tambah')  ||
        str_contains(strtolower($l->description), 'add')
    )->count();

    $statUpdated = $logs->filter(fn($l) =>
        str_contains(strtolower($l->description), 'updated') ||
        str_contains(strtolower($l->description), 'update')  ||
        str_contains(strtolower($l->description), 'ubah')    ||
        str_contains(strtolower($l->description), 'edit')    ||
        str_contains(strtolower($l->description), 'changed')
    )->count();

    $statDeleted = $logs->filter(fn($l) =>
        str_contains(strtolower($l->description), 'deleted') ||
        str_contains(strtolower($l->description), 'delete')  ||
        str_contains(strtolower($l->description), 'hapus')   ||
        str_contains(strtolower($l->description), 'remove')
    )->count();
@endphp

<div class="act-header">
    <div class="act-header-inner">
        <div class="act-header-left">
            <div class="act-label"><i class="fas fa-stream"></i> Audit Trail</div>
            <div class="act-title">Log Aktivitas User</div>
            <div class="act-subtitle">Rekam jejak lengkap setiap aksi pengguna di sistem inventaris</div>
        </div>
        <div class="act-stats">
            <div class="stat-chip">
                <div class="stat-chip-num" id="statTotal">{{ $logs->count() }}</div>
                <div class="stat-chip-label">Total</div>
            </div>
            <div class="stat-chip">
                <div class="stat-chip-num" id="statCreated">{{ $statCreated }}</div>
                <div class="stat-chip-label">Dibuat</div>
            </div>
            <div class="stat-chip">
                <div class="stat-chip-num" id="statUpdated">{{ $statUpdated }}</div>
                <div class="stat-chip-label">Diubah</div>
            </div>
            <div class="stat-chip">
                <div class="stat-chip-num" id="statDeleted">{{ $statDeleted }}</div>
                <div class="stat-chip-label">Dihapus</div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════ FILTER BAR ═══════════ --}}
<div class="filter-bar mb-3">
    <button class="filter-btn active" data-filter="all" onclick="filterLogs(this,'all')">
        <i class="fas fa-list"></i> Semua
    </button>
    <button class="filter-btn f-created" data-filter="created" onclick="filterLogs(this,'created')">
        <i class="fas fa-plus-circle"></i> Dibuat
    </button>
    <button class="filter-btn f-updated" data-filter="updated" onclick="filterLogs(this,'updated')">
        <i class="fas fa-pen"></i> Diubah
    </button>
    <button class="filter-btn f-deleted" data-filter="deleted" onclick="filterLogs(this,'deleted')">
        <i class="fas fa-trash"></i> Dihapus
    </button>

    <div class="filter-search">
        <i class="fas fa-search"></i>
        <input type="text" id="searchInput" placeholder="Cari nama user atau aksi…" oninput="searchLogs(this.value)">
    </div>
</div>

{{-- ═══════════ CARD ═══════════ --}}
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <div class="timeline-wrap" id="timelineWrap">

            @forelse ($logs as $i => $log)

            @php
                $name   = $log->causer->name ?? 'System';
                $email  = $log->causer->email ?? '-';

                $descRaw  = $log->description;
                $descLow  = strtolower($descRaw);

                $exactMap = [
                    'created' => ['icon' => 'fa-plus',         'type' => 'created', 'label' => 'Dibuat'],
                    'updated' => ['icon' => 'fa-pen',          'type' => 'updated', 'label' => 'Diperbarui'],
                    'deleted' => ['icon' => 'fa-trash',        'type' => 'deleted', 'label' => 'Dihapus'],
                    'login'   => ['icon' => 'fa-sign-in-alt',  'type' => 'login',   'label' => 'Login'],
                    'logout'  => ['icon' => 'fa-sign-out-alt', 'type' => 'login',   'label' => 'Logout'],
                    'export'  => ['icon' => 'fa-file-export',  'type' => 'export',  'label' => 'Export'],
                ];

                if (isset($exactMap[$descLow])) {
                    $action = $exactMap[$descLow];
                } elseif (str_contains($descLow, 'created') || str_contains($descLow, 'tambah') || str_contains($descLow, 'create') || str_contains($descLow, 'add')) {
                    $action = ['icon' => 'fa-plus', 'type' => 'created', 'label' => 'Dibuat'];
                } elseif (str_contains($descLow, 'deleted') || str_contains($descLow, 'hapus') || str_contains($descLow, 'delete') || str_contains($descLow, 'remove')) {
                    $action = ['icon' => 'fa-trash', 'type' => 'deleted', 'label' => 'Dihapus'];
                } elseif (str_contains($descLow, 'updated') || str_contains($descLow, 'ubah') || str_contains($descLow, 'update') || str_contains($descLow, 'edit') || str_contains($descLow, 'changed')) {
                    $action = ['icon' => 'fa-pen', 'type' => 'updated', 'label' => 'Diperbarui'];
                } elseif (str_contains($descLow, 'login') || str_contains($descLow, 'logout') || str_contains($descLow, 'masuk') || str_contains($descLow, 'keluar')) {
                    $action = ['icon' => 'fa-sign-in-alt', 'type' => 'login', 'label' => ucwords(strtolower($descRaw))];
                } elseif (str_contains($descLow, 'export') || str_contains($descLow, 'download')) {
                    $action = ['icon' => 'fa-file-export', 'type' => 'export', 'label' => ucwords(strtolower($descRaw))];
                } else {
                    $action = ['icon' => 'fa-info', 'type' => 'updated', 'label' => ucwords(strtolower($descRaw))];
                }

                $palette = ['#6366f1','#22c55e','#0ea5e9','#f97316','#ef4444','#a855f7','#14b8a6','#ec4899'];
                $color   = $palette[crc32($name) % count($palette)];

                $oldData   = $log->changes['old'] ?? [];
                $newData   = $log->changes['attributes'] ?? [];
                $subject   = $log->subject_type ? class_basename($log->subject_type) : '-';
                $subjectId = $log->subject_id ?? '-';

                $subjectLabels = [
                    'Barang'        => 'Data Barang',
                    'Aset'          => 'Data Aset',
                    'Asset'         => 'Data Aset',
                    'DataAset'      => 'Data Aset',
                    'Kategori'      => 'Data Kategori',
                    'User'          => 'Data Pengguna',
                    'Pengguna'      => 'Data Pengguna',
                    'Ruangan'       => 'Data Ruangan',
                    'Lokasi'        => 'Data Lokasi',
                    'Peminjaman'    => 'Data Peminjaman',
                    'Pengembalian'  => 'Data Pengembalian',
                ];

                $subjectLabel = $subjectLabels[$subject] ?? ucwords(str_replace('_', ' ', $subject));
            @endphp

            <div class="act-row"
                 data-type="{{ $action['type'] }}"
                 data-user="{{ $name }}"
                 data-search="{{ strtolower($name . ' ' . $log->description . ' ' . $subjectLabel) }}"
                 data-index="{{ $i }}"
                 onclick="openModal({{ $i }})"
                 data-payload='{
                    "index":    {{ $i }},
                    "name":     {{ json_encode($name) }},
                    "email":    {{ json_encode($email) }},
                    "action":   {{ json_encode($action['label']) }},
                    "type":     {{ json_encode($action['type']) }},
                    "icon":     {{ json_encode($action['icon']) }},
                    "color":    {{ json_encode($color) }},
                    "time":     {{ json_encode($log->created_at->format('d M Y, H:i:s')) }},
                    "timeAgo":  {{ json_encode($log->created_at->diffForHumans()) }},
                    "subject":  {{ json_encode($subjectLabel) }},
                    "subjectId":{{ json_encode((string)$subjectId) }},
                    "old":      {{ json_encode($oldData) }},
                    "new":      {{ json_encode($newData) }}
                 }'
            >
                <div class="act-avatar" style="background: {{ $color }}">
                    <i class="fas {{ $action['icon'] }}"></i>
                </div>

                <div class="act-card">
                    <div class="act-card-top">
                        <span class="pill-user">
                            <i class="fas fa-user" style="font-size:9px; opacity:.7;"></i>
                            {{ $name }}
                        </span>
                        <span class="pill-action pill-{{ $action['type'] }}">
                            {{ $action['label'] }}
                        </span>
                        <span class="act-time">
                            <i class="fas fa-clock" style="font-size:10px"></i>
                            {{ $log->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <p class="act-desc">
                        Aktivitas pada <strong>{{ $subjectLabel }}</strong>
                        @if($subjectId !== '-') <span style="font-family:var(--mono);font-size:11px;color:#94a3b8;">#{{ $subjectId }}</span> @endif
                    </p>

                    @if(count($oldData) > 0 || count($newData) > 0)
                    <div class="diff-preview">
                        @foreach(array_slice($oldData, 0, 2) as $k => $v)
                            <span class="diff-tag old"><i class="fas fa-minus" style="font-size:8px"></i> {{ $k }}</span>
                        @endforeach
                        @foreach(array_slice($newData, 0, 2) as $k => $v)
                            <span class="diff-tag new"><i class="fas fa-plus" style="font-size:8px"></i> {{ $k }}</span>
                        @endforeach
                        @if(count($oldData) > 2 || count($newData) > 2)
                            <span class="diff-tag" style="background:#f1f5f9;color:#64748b">+{{ max(count($oldData),count($newData)) - 2 }} lainnya</span>
                        @endif
                    </div>
                    @endif

                    <div class="view-detail-hint">
                        <i class="fas fa-expand-alt" style="font-size:10px"></i> Lihat Detail
                    </div>
                </div>
            </div>

            @empty
            <div class="empty-state">
                <i class="fas fa-history"></i>
                <h5>Tidak ada aktivitas</h5>
                <p>Belum ada aktivitas user yang tercatat di sistem.</p>
            </div>
            @endforelse

        </div>

        <div class="activity-pagination" id="activityPagination" style="display:none;">
            <div class="pagination-info" id="paginationInfo">
                Menampilkan 0 dari 0 data
            </div>
            <div class="pagination-controls" id="paginationControls"></div>
        </div>

    </div>
</div>


{{-- ═══════════════════════════════════════
     MODAL
═══════════════════════════════════════ --}}
<div class="m-overlay" id="actModal" onclick="handleOverlay(event)">
    <div class="m-box">

        <div class="m-head">
            <button class="m-close-btn" onclick="closeModal()"><i class="fas fa-times"></i></button>
            <div class="m-head-inner">
                <div class="m-head-row1">
                    <div class="m-avatar" id="mAvatar"></div>
                    <div>
                        <div class="m-user-name" id="mUserName"></div>
                        <div class="m-timestamp" id="mTimestamp"></div>
                    </div>
                    <div class="m-action-pill" id="mActionPill"></div>
                </div>
                <div class="m-meta-row" id="mMetaRow"></div>
            </div>
        </div>

        <div class="m-tabs">
            <div class="m-tab active" onclick="switchTab(this,'tab-diff')">
                <i class="fas fa-code-branch"></i> Perubahan
            </div>
            <div class="m-tab" onclick="switchTab(this,'tab-info')">
                <i class="fas fa-info-circle"></i> Informasi
            </div>
        </div>

        <div class="m-body">
            <div class="m-panels">

                <div class="m-panel active" id="tab-diff">
                    <div class="sec-label"><i class="fas fa-exchange-alt"></i> Data Perubahan</div>
                    <div id="diffContent"></div>
                </div>

                <div class="m-panel" id="tab-info">
                    <div class="sec-label"><i class="fas fa-user-circle"></i> Detail Pengguna & Aksi</div>
                    <div class="info-grid" id="infoGrid"></div>
                    <div class="sec-label" style="margin-top:8px"><i class="fas fa-database"></i> Subject</div>
                    <div class="info-grid" id="subjectGrid"></div>
                </div>

            </div>
        </div>

        <div class="m-foot">
            <div class="m-foot-nav">
                <button class="btn-nav" id="btnPrev" onclick="navModal(-1)"><i class="fas fa-chevron-up"></i></button>
                <button class="btn-nav" id="btnNext" onclick="navModal(1)"><i class="fas fa-chevron-down"></i></button>
            </div>
            <span class="foot-info" id="footInfo"></span>
            <button class="btn-close-modal" onclick="closeModal()">
                <i class="fas fa-times-circle"></i> Tutup
            </button>
        </div>

    </div>
</div>


<script>
const rows = Array.from(document.querySelectorAll('.act-row'));
const payloads = rows.map(r => JSON.parse(r.dataset.payload));

let currentIdx = 0;
let currentPage = 1;
const perPage = 10;
let activeFilterType = 'all';
let activeSearchQuery = '';
let filteredRows = [...rows];

/*
|--------------------------------------------------------------------------
| Label Field Bahasa Indonesia
|--------------------------------------------------------------------------
| Tujuannya agar field database seperti nama_aset, lokasi, created_at,
| dan updated_at tidak tampil mentah di halaman log aktivitas.
|--------------------------------------------------------------------------
*/
const FIELD_LABELS = {
    // Umum
    id: 'ID Data',
    kode: 'Kode',
    kode_barang: 'Kode Barang',
    kode_aset: 'Kode Aset',
    nama: 'Nama',
    name: 'Nama',
    email: 'Email',
    username: 'Username',
    password: 'Password',
    role: 'Hak Akses',
    status: 'Status',
    keterangan: 'Keterangan',
    deskripsi: 'Deskripsi',
    catatan: 'Catatan',

    // Barang
    nama_barang: 'Nama Barang',
    barang_id: 'Barang',
    id_barang: 'Barang',
    kategori_id: 'Kategori',
    id_kategori: 'Kategori',
    kategori: 'Kategori',
    merek: 'Merek',
    merk: 'Merek',
    tipe: 'Tipe',
    spesifikasi: 'Spesifikasi',
    stok: 'Stok',
    satuan: 'Satuan',
    harga: 'Harga',
    harga_beli: 'Harga Beli',
    tanggal_beli: 'Tanggal Beli',
    tanggal_pembelian: 'Tanggal Pembelian',

    // Aset
    nama_aset: 'Nama Aset',
    aset_id: 'Aset',
    id_aset: 'Aset',
    kode_inventaris: 'Kode Inventaris',
    nomor_inventaris: 'Nomor Inventaris',
    jumlah: 'Jumlah',
    kondisi: 'Kondisi',
    lokasi: 'Pemegang Aset',
    pemegang: 'Pemegang Aset',
    pemegang_aset: 'Pemegang Aset',
    penanggung_jawab: 'Penanggung Jawab',
    ruangan: 'Ruangan',
    ruangan_id: 'Ruangan',
    id_ruangan: 'Ruangan',
    sumber_dana: 'Sumber Dana',
    tahun_pengadaan: 'Tahun Pengadaan',
    tanggal_pengadaan: 'Tanggal Pengadaan',
    nilai_perolehan: 'Nilai Perolehan',

    // Peminjaman / pengembalian
    peminjam: 'Peminjam',
    peminjam_id: 'Peminjam',
    tanggal_pinjam: 'Tanggal Pinjam',
    tanggal_kembali: 'Tanggal Kembali',
    tanggal_pengembalian: 'Tanggal Pengembalian',

    // Timestamp sistem
    created_at: 'Tanggal Dibuat',
    updated_at: 'Tanggal Diperbarui',
    deleted_at: 'Tanggal Dihapus',
    created_by: 'Dibuat Oleh',
    updated_by: 'Diperbarui Oleh',
    deleted_by: 'Dihapus Oleh'
};

const VALUE_LABELS = {
    baik: 'Baik',
    rusak: 'Rusak',
    rusak_ringan: 'Rusak Ringan',
    rusak_berat: 'Rusak Berat',
    tersedia: 'Tersedia',
    dipakai: 'Dipakai',
    dipinjam: 'Dipinjam',
    dikembalikan: 'Dikembalikan',
    hilang: 'Hilang',
    aktif: 'Aktif',
    nonaktif: 'Nonaktif',
    admin: 'Administrator',
    administrator: 'Administrator',
    user: 'Pengguna',
    siswa: 'Siswa',
    guru: 'Guru'
};

function openModal(idx) {
    currentIdx = idx;
    renderModal(payloads[idx]);
    document.getElementById('actModal').classList.add('open');
    document.body.style.overflow = 'hidden';
    document.querySelectorAll('.m-tab').forEach((t,i) => t.classList.toggle('active', i===0));
    document.querySelectorAll('.m-panel').forEach((p,i) => p.classList.toggle('active', i===0));
}

function closeModal() {
    document.getElementById('actModal').classList.remove('open');
    document.body.style.overflow = '';
}

function handleOverlay(e) {
    if (e.target === document.getElementById('actModal')) closeModal();
}

function navModal(dir) {
    const visibleIndexes = filteredRows.map(row => Number(row.dataset.index));
    const position = visibleIndexes.indexOf(currentIdx);

    let newIdx;

    if (position !== -1) {
        const newPosition = position + dir;
        if (newPosition < 0 || newPosition >= visibleIndexes.length) return;
        newIdx = visibleIndexes[newPosition];
    } else {
        newIdx = currentIdx + dir;
        if (newIdx < 0 || newIdx >= payloads.length) return;
    }

    currentIdx = newIdx;
    renderModal(payloads[currentIdx]);
}

function switchTab(el, panelId) {
    document.querySelectorAll('.m-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.m-panel').forEach(p => p.classList.remove('active'));
    el.classList.add('active');
    document.getElementById(panelId).classList.add('active');
}

function renderModal(d) {
    document.getElementById('mAvatar').innerHTML = `<i class="fas ${d.icon}"></i>`;
    document.getElementById('mAvatar').style.background = d.color;
    document.getElementById('mUserName').textContent = d.name;
    document.getElementById('mTimestamp').textContent = formatValue(d.time, 'created_at');

    const pillColors = {
        created: '#10b981',
        updated: '#2563eb',
        deleted: '#ef4444',
        login: '#8b5cf6',
        export: '#f97316'
    };

    const pill = document.getElementById('mActionPill');
    pill.textContent = d.action;
    pill.style.background = (pillColors[d.type] || '#64748b') + '22';
    pill.style.color = pillColors[d.type] || '#64748b';
    pill.style.border = `1px solid ${pillColors[d.type] || '#64748b'}44`;

    document.getElementById('mMetaRow').innerHTML = `
        <div class="m-meta-chip"><i class="fas fa-envelope"></i>${escHtml(formatValue(d.email, 'email'))}</div>
        <div class="m-meta-chip"><i class="fas fa-clock"></i>${escHtml(formatTimeAgo(d.timeAgo))}</div>
    `;

    const allKeys = [...new Set([...Object.keys(d.old || {}), ...Object.keys(d.new || {})])];

    if (allKeys.length === 0) {
        document.getElementById('diffContent').innerHTML = `
            <div style="text-align:center;padding:40px;color:#94a3b8">
                <i class="fas fa-check-circle" style="font-size:40px;margin-bottom:12px;display:block;color:#86efac"></i>
                <div style="font-weight:600;color:#475569">Tidak ada perubahan data tercatat</div>
                <div style="font-size:12px;margin-top:4px">Aksi ini tidak mengubah field data apapun.</div>
            </div>`;
    } else {
        let tableRows = allKeys.map(k => {
            const oldVal = d.old && d.old[k] !== undefined
                ? escHtml(formatValue(d.old[k], k))
                : '<span class="no-change">Tidak ada data</span>';

            const newVal = d.new && d.new[k] !== undefined
                ? escHtml(formatValue(d.new[k], k))
                : '<span class="no-change">Tidak ada data</span>';

            return `
                <tr>
                    <td class="field-name">${escHtml(fieldLabel(k))}</td>
                    <td class="val-old">${oldVal}</td>
                    <td class="val-new">${newVal}</td>
                </tr>`;
        }).join('');

        document.getElementById('diffContent').innerHTML = `
            <table class="diff-table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th><i class="fas fa-minus" style="color:#ef4444;margin-right:4px"></i> Sebelum</th>
                        <th><i class="fas fa-plus" style="color:#10b981;margin-right:4px"></i> Sesudah</th>
                    </tr>
                </thead>
                <tbody>${tableRows}</tbody>
            </table>
            <div style="font-size:11px;color:#94a3b8;font-family:var(--mono);text-align:right">
                ${allKeys.length} field tercatat
            </div>`;
    }

    document.getElementById('infoGrid').innerHTML = `
        <div class="info-item">
            <div class="info-item-label">Nama Pengguna</div>
            <div class="info-item-val">${escHtml(formatValue(d.name, 'name'))}</div>
        </div>
        <div class="info-item">
            <div class="info-item-label">Email Pengguna</div>
            <div class="info-item-val">${escHtml(formatValue(d.email, 'email'))}</div>
        </div>
        <div class="info-item">
            <div class="info-item-label">Aksi</div>
            <div class="info-item-val">${escHtml(d.action)}</div>
        </div>
        <div class="info-item">
            <div class="info-item-label">Waktu Aksi</div>
            <div class="info-item-val">${escHtml(formatValue(d.time, 'created_at'))}</div>
        </div>
    `;

    document.getElementById('subjectGrid').innerHTML = `
        <div class="info-item">
            <div class="info-item-label">Jenis Data</div>
            <div class="info-item-val">${escHtml(formatValue(d.subject, 'subject'))}</div>
        </div>
        <div class="info-item">
            <div class="info-item-label">ID Data</div>
            <div class="info-item-val">#${escHtml(formatValue(d.subjectId, 'id'))}</div>
        </div>
        <div class="info-item">
            <div class="info-item-label">Tanggal & Jam</div>
            <div class="info-item-val">${escHtml(formatValue(d.time, 'created_at'))}</div>
        </div>
        <div class="info-item">
            <div class="info-item-label">Keterangan Waktu</div>
            <div class="info-item-val">${escHtml(formatTimeAgo(d.timeAgo))}</div>
        </div>
    `;

    const visibleIndexes = filteredRows.map(row => Number(row.dataset.index));
    const visiblePosition = visibleIndexes.indexOf(currentIdx);

    document.getElementById('btnPrev').disabled = visiblePosition <= 0;
    document.getElementById('btnNext').disabled = visiblePosition === -1 || visiblePosition >= visibleIndexes.length - 1;

    if (visiblePosition !== -1) {
        document.getElementById('footInfo').textContent = `${visiblePosition + 1} / ${visibleIndexes.length}`;
    } else {
        document.getElementById('footInfo').textContent = `${currentIdx + 1} / ${payloads.length}`;
    }
}

/* ═══════════════════════════════════════
   PAGINATION LOG AKTIVITAS PER 10 DATA
═══════════════════════════════════════ */
function applyFiltersAndPaginate(resetPage = false) {
    if (resetPage) currentPage = 1;

    filteredRows = rows.filter(row => {
        const matchType = activeFilterType === 'all' || row.dataset.type === activeFilterType;
        const matchSearch = row.dataset.search.includes(activeSearchQuery);
        return matchType && matchSearch;
    });

    const totalPages = Math.max(1, Math.ceil(filteredRows.length / perPage));
    if (currentPage > totalPages) currentPage = totalPages;

    rows.forEach(row => row.style.display = 'none');

    const start = (currentPage - 1) * perPage;
    const end = start + perPage;
    const currentRows = filteredRows.slice(start, end);

    currentRows.forEach(row => row.style.display = 'flex');

    renderPagination(filteredRows.length, start, currentRows.length, totalPages);
}

function renderPagination(totalData, startIndex, currentCount, totalPages) {
    const pagination = document.getElementById('activityPagination');
    const info = document.getElementById('paginationInfo');
    const controls = document.getElementById('paginationControls');

    if (!pagination || !info || !controls) return;

    pagination.style.display = rows.length > 0 ? 'flex' : 'none';

    if (totalData === 0) {
        info.innerHTML = `Menampilkan <strong>0</strong> dari <strong>0</strong> data`;
        controls.innerHTML = '';
        return;
    }

    const from = startIndex + 1;
    const to = startIndex + currentCount;

    info.innerHTML = `Menampilkan <strong>${from}</strong> sampai <strong>${to}</strong> dari <strong>${totalData}</strong> data`;

    let html = `
        <button type="button" class="page-btn" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>
            <i class="fas fa-chevron-left"></i>
        </button>
    `;

    getPageNumbers(currentPage, totalPages).forEach(page => {
        if (page === '...') {
            html += `<span class="page-dots">...</span>`;
        } else {
            html += `
                <button type="button" class="page-btn ${page === currentPage ? 'active' : ''}" onclick="changePage(${page})">
                    ${page}
                </button>
            `;
        }
    });

    html += `
        <button type="button" class="page-btn" onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>
            <i class="fas fa-chevron-right"></i>
        </button>
    `;

    controls.innerHTML = html;
}

function getPageNumbers(current, total) {
    if (total <= 5) {
        return Array.from({ length: total }, (_, i) => i + 1);
    }

    if (current <= 3) {
        return [1, 2, 3, 4, '...', total];
    }

    if (current >= total - 2) {
        return [1, '...', total - 3, total - 2, total - 1, total];
    }

    return [1, '...', current - 1, current, current + 1, '...', total];
}

function changePage(page) {
    const totalPages = Math.max(1, Math.ceil(filteredRows.length / perPage));
    if (page < 1 || page > totalPages) return;

    currentPage = page;
    applyFiltersAndPaginate(false);

    const card = document.getElementById('timelineWrap');
    if (card) {
        card.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function fieldLabel(key) {
    if (!key) return 'Data';
    const cleanKey = String(key).trim();
    return FIELD_LABELS[cleanKey] || toTitleCase(cleanKey.replace(/_/g, ' '));
}

function formatValue(value, key = '') {
    if (value === null || value === undefined || value === '') {
        return 'Tidak ada data';
    }

    if (Array.isArray(value)) {
        return value.length ? value.map(v => formatValue(v, key)).join(', ') : 'Tidak ada data';
    }

    if (typeof value === 'object') {
        return JSON.stringify(value, null, 2);
    }

    if (typeof value === 'boolean' || value === 1 || value === 0 || value === '1' || value === '0') {
        const keyLower = String(key).toLowerCase();
        if (keyLower.includes('status') || keyLower.includes('aktif')) {
            return (value === true || value === 1 || value === '1') ? 'Aktif' : 'Tidak Aktif';
        }
    }

    let text = String(value).trim();

    if (text === '-' || text === 'null' || text === 'undefined') {
        return 'Tidak ada data';
    }

    const lower = text.toLowerCase();
    if (VALUE_LABELS[lower]) {
        return VALUE_LABELS[lower];
    }

    if (isDateLike(text) || isDateKey(key)) {
        return formatIndonesianDate(text);
    }

    if (isMoneyKey(key) && !isNaN(Number(text))) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(Number(text));
    }

    return text;
}

function formatTimeAgo(text) {
    if (!text) return 'Tidak ada data';

    return String(text)
        .replace('seconds ago', 'detik yang lalu')
        .replace('second ago', 'detik yang lalu')
        .replace('minutes ago', 'menit yang lalu')
        .replace('minute ago', 'menit yang lalu')
        .replace('hours ago', 'jam yang lalu')
        .replace('hour ago', 'jam yang lalu')
        .replace('days ago', 'hari yang lalu')
        .replace('day ago', 'hari yang lalu')
        .replace('weeks ago', 'minggu yang lalu')
        .replace('week ago', 'minggu yang lalu')
        .replace('months ago', 'bulan yang lalu')
        .replace('month ago', 'bulan yang lalu')
        .replace('years ago', 'tahun yang lalu')
        .replace('year ago', 'tahun yang lalu')
        .replace('from now', 'dari sekarang')
        .replace('just now', 'baru saja');
}

function isMoneyKey(key) {
    return ['harga', 'harga_beli', 'nilai', 'nilai_perolehan', 'total', 'nominal', 'biaya'].some(k =>
        String(key).toLowerCase().includes(k)
    );
}

function isDateKey(key) {
    return ['tanggal', 'created_at', 'updated_at', 'deleted_at', '_at'].some(k =>
        String(key).toLowerCase().includes(k)
    );
}

function isDateLike(text) {
    return /^\d{4}-\d{2}-\d{2}/.test(text) || /^\d{2}\s[A-Za-z]+\s\d{4}/.test(text);
}

function formatIndonesianDate(text) {
    const months = {
        Jan: 'Januari', Feb: 'Februari', Mar: 'Maret', Apr: 'April',
        May: 'Mei', Jun: 'Juni', Jul: 'Juli', Aug: 'Agustus',
        Sep: 'September', Oct: 'Oktober', Nov: 'November', Dec: 'Desember'
    };

    let formatted = String(text);
    Object.keys(months).forEach(en => {
        formatted = formatted.replace(en, months[en]);
    });

    const dbMatch = formatted.match(/^(\d{4})-(\d{2})-(\d{2})(?:[ T](\d{2}):(\d{2})(?::(\d{2}))?)?/);
    if (dbMatch) {
        const [, y, m, d, hh, mm, ss] = dbMatch;
        const monthNames = [
            '', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        const datePart = `${Number(d)} ${monthNames[Number(m)]} ${y}`;
        const timePart = hh ? `, pukul ${hh}:${mm}${ss ? ':' + ss : ''}` : '';
        return `${datePart}${timePart}`;
    }

    formatted = formatted.replace(',', ', pukul');
    return formatted;
}

function toTitleCase(text) {
    return String(text)
        .split(' ')
        .filter(Boolean)
        .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
        .join(' ');
}

function filterLogs(btn, type) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    activeFilterType = type;
    applyFiltersAndPaginate(true);
}

function searchLogs(q) {
    activeSearchQuery = q.toLowerCase().trim();
    applyFiltersAndPaginate(true);
}

function escHtml(s) {
    return String(s)
        .replace(/&/g,'&amp;')
        .replace(/</g,'&lt;')
        .replace(/>/g,'&gt;')
        .replace(/"/g,'&quot;')
        .replace(/'/g,'&#039;');
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeModal();
    if (e.key === 'ArrowDown') navModal(1);
    if (e.key === 'ArrowUp') navModal(-1);
});

document.addEventListener('DOMContentLoaded', () => {
    applyFiltersAndPaginate(true);
});
</script>

@endsection