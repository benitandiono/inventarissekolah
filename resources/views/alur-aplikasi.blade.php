@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap');

:root {
    --ink:       #0a0e1a;
    --surface:   #ffffff;
    --muted:     #64748b;
    --border:    #e8edf5;
    --blue:      #2563eb;
    --cyan:      #06b6d4;
    --indigo:    #6366f1;
    --radius:    20px;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body { font-family: 'Plus Jakarta Sans', sans-serif; }

a { text-decoration: none !important; }

/* ─── PAGE HEADER ─────────────────────────── */
.ph {
    background: linear-gradient(135deg, #0f1f5c 0%, #1e40af 50%, #0891b2 100%);
    border-radius: 24px;
    padding: 32px 36px;
    color: #fff;
    position: relative;
    overflow: hidden;
    margin-bottom: 24px;
    box-shadow: 0 20px 60px rgba(37,99,235,.3);
}
.ph::after {
    content: '';
    position: absolute;
    width: 380px; height: 380px;
    background: radial-gradient(circle, rgba(255,255,255,.12), transparent 70%);
    top: -120px; right: -100px;
    border-radius: 50%;
}
.ph::before {
    content: '';
    position: absolute;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(6,182,212,.2), transparent 70%);
    bottom: -60px; left: 60px;
    border-radius: 50%;
}
.ph-inner { position: relative; z-index: 1; }
.ph-label {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 999px;
    padding: 5px 14px;
    font-size: 11px; font-weight: 700;
    letter-spacing: 1.2px; text-transform: uppercase;
    color: #a5f3fc;
    margin-bottom: 14px;
}
.ph-title {
    font-family: 'Playfair Display', serif;
    font-size: 34px; font-weight: 700;
    line-height: 1.15;
    letter-spacing: .2px;
    margin-bottom: 10px;
}
.ph-sub {
    font-size: 14px; opacity: .8;
    max-width: 500px; line-height: 1.6;
}

/* ─── OUTER CARD ──────────────────────────── */
.outer-card {
    background: #f8faff;
    border-radius: 28px;
    padding: 40px;
    border: 1px solid #dde6fb;
    box-shadow: 0 4px 30px rgba(37,99,235,.06);
}

/* ─── GRID ───────────────────────────────── */
.step-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
    gap: 20px;
    margin-bottom: 36px;
}

/* ─── STEP CARD (clickable) ──────────────── */
.step-card {
    background: #fff;
    border: 1.5px solid var(--border);
    border-radius: var(--radius);
    padding: 28px 24px 30px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
}
.step-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 60px rgba(37,99,235,.18);
    border-color: rgba(37,99,235,.3);
}
.step-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(37,99,235,.04), rgba(6,182,212,.04));
    opacity: 0;
    transition: opacity .3s;
}
.step-card:hover::before { opacity: 1; }

/* Number badge */
.step-num {
    position: absolute; top: 16px; right: 16px;
    width: 34px; height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    color: #fff;
    font-size: 12px; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 6px 16px rgba(37,99,235,.35);
}

/* Icon box */
.step-icon {
    width: 60px; height: 60px;
    border-radius: 16px;
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    display: flex; align-items: center; justify-content: center;
    font-size: 26px; color: #fff;
    margin-bottom: 18px;
    box-shadow: 0 12px 30px rgba(37,99,235,.3);
    transition: transform .3s ease;
}
.step-card:hover .step-icon { transform: scale(1.08) rotate(4deg); }

.step-title {
    font-size: 16px; font-weight: 800;
    color: var(--ink);
    margin-bottom: 8px;
}
.step-desc {
    font-size: 13px; color: var(--muted);
    line-height: 1.65;
}

/* Click hint */
.step-hint {
    display: inline-flex; align-items: center; gap: 5px;
    margin-top: 14px;
    font-size: 11px; font-weight: 700;
    color: var(--blue);
    letter-spacing: .4px;
    opacity: 0;
    transform: translateY(4px);
    transition: all .3s ease;
}
.step-hint i { font-size: 10px; }
.step-card:hover .step-hint { opacity: 1; transform: translateY(0); }

/* ─── CONNECTOR LINE ──────────────────────── */
.connector-wrap {
    display: flex; align-items: center;
    gap: 0; margin-bottom: 36px;
    padding: 0 4px;
}
.conn-dot {
    width: 12px; height: 12px;
    border-radius: 50%;
    background: var(--blue);
    flex-shrink: 0;
}
.conn-line {
    flex: 1;
    height: 3px;
    background: linear-gradient(90deg, var(--blue), var(--cyan));
    border-radius: 4px;
    position: relative;
    overflow: hidden;
}
.conn-line::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.6), transparent);
    animation: shimmer 2.5s infinite;
}
@keyframes shimmer {
    from { transform: translateX(-100%); }
    to   { transform: translateX(100%);  }
}

/* ─── CTA ROW ─────────────────────────────── */
.cta-row {
    display: flex; align-items: center; justify-content: center;
    gap: 14px; flex-wrap: wrap;
}
.btn-primary-cta {
    display: inline-flex; align-items: center; gap: 9px;
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    color: #fff !important;
    padding: 14px 30px;
    border-radius: 16px;
    font-size: 14px; font-weight: 700;
    box-shadow: 0 16px 40px rgba(37,99,235,.32);
    transition: all .3s ease;
    border: none; cursor: pointer;
}
.btn-primary-cta:hover {
    transform: translateY(-4px);
    box-shadow: 0 26px 60px rgba(37,99,235,.45);
    color: #fff !important;
}
.btn-secondary-cta {
    display: inline-flex; align-items: center; gap: 9px;
    background: transparent;
    color: var(--blue) !important;
    padding: 13px 28px;
    border-radius: 16px;
    font-size: 14px; font-weight: 700;
    border: 2px solid rgba(37,99,235,.25);
    transition: all .3s ease; cursor: pointer;
}
.btn-secondary-cta:hover {
    background: rgba(37,99,235,.06);
    border-color: var(--blue);
    transform: translateY(-2px);
    color: var(--blue) !important;
}

/* ─── FOOTER ──────────────────────────────── */
.alur-footer {
    margin-top: 28px;
    padding-top: 22px;
    border-top: 1px dashed #c7d5f0;
    text-align: center;
    font-size: 13px;
    color: #7c8db5;
}
.alur-footer b { color: var(--ink); }

/* ──────────────────────────────────────────
   MODAL SYSTEM
────────────────────────────────────────── */
.modal-overlay {
    display: none;
    position: fixed; inset: 0; z-index: 9000;
    background: rgba(10,14,26,.55);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    align-items: center; justify-content: center;
    padding: 20px;
}
.modal-overlay.active { display: flex; }

.modal-box {
    background: #fff;
    border-radius: 28px;
    width: 100%; max-width: 560px;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 40px 100px rgba(10,14,26,.3);
    animation: modalIn .35s cubic-bezier(.34,1.56,.64,1);
}
@keyframes modalIn {
    from { opacity: 0; transform: scale(.88) translateY(30px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
}

/* Modal top gradient banner */
.modal-banner {
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    border-radius: 28px 28px 0 0;
    padding: 32px 32px 36px;
    position: relative;
    overflow: hidden;
}
.modal-banner::after {
    content: '';
    position: absolute;
    width: 260px; height: 260px;
    background: rgba(255,255,255,.1);
    border-radius: 50%;
    top: -80px; right: -60px;
}
.modal-banner-inner { position: relative; z-index: 1; }
.modal-step-badge {
    display: inline-block;
    background: rgba(255,255,255,.2);
    border: 1px solid rgba(255,255,255,.35);
    border-radius: 999px;
    padding: 4px 12px;
    font-size: 10px; font-weight: 800;
    letter-spacing: 1px; text-transform: uppercase;
    color: #a5f3fc;
    margin-bottom: 14px;
}
.modal-icon-wrap {
    width: 72px; height: 72px;
    border-radius: 20px;
    background: rgba(255,255,255,.2);
    border: 1.5px solid rgba(255,255,255,.35);
    display: flex; align-items: center; justify-content: center;
    font-size: 32px; color: #fff;
    margin-bottom: 16px;
    backdrop-filter: blur(4px);
}
.modal-title {
    font-family: 'Playfair Display', serif;
    font-size: 24px; font-weight: 700;
    color: #fff;
    margin-bottom: 6px;
    letter-spacing: .2px;
}
.modal-subtitle { font-size: 13px; color: rgba(255,255,255,.8); line-height: 1.6; }

/* Modal body */
.modal-body-inner {
    padding: 30px 32px 36px;
}
.modal-section-title {
    font-size: 11px; font-weight: 800;
    letter-spacing: 1.2px; text-transform: uppercase;
    color: var(--blue);
    margin-bottom: 14px;
}
.detail-list {
    list-style: none;
    display: flex; flex-direction: column; gap: 10px;
    margin-bottom: 24px;
}
.detail-list li {
    display: flex; align-items: flex-start; gap: 12px;
    font-size: 13.5px; color: #374151; line-height: 1.6;
}
.detail-list li .icon-bullet {
    width: 28px; height: 28px; flex-shrink: 0;
    border-radius: 8px;
    background: linear-gradient(135deg, rgba(37,99,235,.12), rgba(6,182,212,.12));
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; color: var(--blue);
}

/* Tip box */
.tip-box {
    background: linear-gradient(135deg, #eff6ff, #ecfeff);
    border: 1px solid #bfdbfe;
    border-left: 4px solid var(--blue);
    border-radius: 12px;
    padding: 14px 16px;
    font-size: 13px; color: #1e40af;
    line-height: 1.6;
    margin-bottom: 24px;
}
.tip-box strong { display: block; margin-bottom: 3px; font-size: 11px; letter-spacing: .8px; text-transform: uppercase; }

/* Modal footer */
.modal-footer-bar {
    display: flex; align-items: center; justify-content: space-between;
    gap: 12px; flex-wrap: wrap;
}
.btn-modal-close {
    background: #f1f5f9;
    color: var(--muted) !important;
    border: none; border-radius: 12px;
    padding: 11px 22px;
    font-size: 13px; font-weight: 700;
    cursor: pointer;
    transition: all .25s;
}
.btn-modal-close:hover { background: #e2e8f0; }
.btn-modal-next {
    background: linear-gradient(135deg, var(--blue), var(--cyan));
    color: #fff !important;
    border: none; border-radius: 12px;
    padding: 11px 22px;
    font-size: 13px; font-weight: 700;
    cursor: pointer;
    box-shadow: 0 8px 24px rgba(37,99,235,.3);
    transition: all .25s;
    display: flex; align-items: center; gap: 7px;
}
.btn-modal-next:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(37,99,235,.4); }

/* Close X */
.modal-close-x {
    position: absolute; top: 14px; right: 14px;
    width: 32px; height: 32px;
    border-radius: 50%;
    background: rgba(255,255,255,.2);
    border: none; cursor: pointer;
    color: #fff; font-size: 14px;
    display: flex; align-items: center; justify-content: center;
    transition: background .2s;
    z-index: 10;
}
.modal-close-x:hover { background: rgba(255,255,255,.35); }

/* Scrollbar in modal */
.modal-box::-webkit-scrollbar { width: 5px; }
.modal-box::-webkit-scrollbar-track { background: transparent; }
.modal-box::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 99px; }

@media (max-width: 600px) {
    .outer-card { padding: 24px 20px; }
    .ph { padding: 24px 22px; }
    .ph-title { font-size: 24px; }
    .modal-body-inner { padding: 22px 22px 28px; }
    .modal-banner { padding: 24px 22px 28px; }
}
.btn-modal-close{
    background: #dc3545;
    color: #ffffff !important; /* paksa teks putih */
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(220,53,69,0.3);
    transition: all 0.25s ease;
}

.btn-modal-close i{
    color: #ffffff !important; /* icon putih */
}

.btn-modal-close:hover{
    background: #bb2d3b;
    color: #ffffff !important;
}
</style>

{{-- PAGE HEADER --}}
<div class="ph mb-4">
    <div class="ph-inner">
        <div class="ph-label"><i class="fas fa-sitemap"></i> Alur Sistem</div>
        <div class="ph-title">Alur Sistem Inventaris Sekolah</div>
        <div class="ph-sub">Klik setiap kartu untuk melihat detail, panduan, dan tips penggunaan tiap tahap sistem.</div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="outer-card">

            {{-- CONNECTOR --}}
            <div class="connector-wrap">
                <div class="conn-dot"></div>
                <div class="conn-line"></div>
                <div class="conn-dot" style="background:var(--cyan)"></div>
            </div>

            {{-- STEP GRID --}}
            <div class="step-grid">

                <div class="step-card" onclick="openModal(0)">
                    <div class="step-num">1</div>
                    <div class="step-icon"><i class="fas fa-warehouse"></i></div>
                    <div class="step-title">Kelola Aset Sekolah</div>
                    <div class="step-desc">Pencatatan aset tetap sekolah seperti Laptop, komputer/PC, proyektor, Printer, dan lainnya.</div>
                    <div class="step-hint"><i class="fas fa-eye"></i> Lihat Detail</div>
                </div>

                <div class="step-card" onclick="openModal(1)">
                    <div class="step-num">2</div>
                    <div class="step-icon"><i class="fas fa-boxes"></i></div>
                    <div class="step-title">Kelola Data Barang</div>
                    <div class="step-desc">Pengelolaan barang habis pakai dengan sistem stok otomatis dan monitoring real-time.</div>
                    <div class="step-hint"><i class="fas fa-eye"></i> Lihat Detail</div>
                </div>

                <div class="step-card" onclick="openModal(2)">
                    <div class="step-num">3</div>
                    <div class="step-icon"><i class="fas fa-handshake"></i></div>
                    <div class="step-title">Kelola Relasi & Mitra</div>
                    <div class="step-desc">Pendataan supplier dan mitra sebagai pendukung proses pengadaan inventaris sekolah.</div>
                    <div class="step-hint"><i class="fas fa-eye"></i> Lihat Detail</div>
                </div>

                <div class="step-card" onclick="openModal(3)">
                    <div class="step-num">4</div>
                    <div class="step-icon"><i class="fas fa-arrow-down"></i></div>
                    <div class="step-title">Kelola Barang Masuk</div>
                    <div class="step-desc">Pencatatan barang masuk untuk menjaga keakuratan stok dan histori pengadaan.</div>
                    <div class="step-hint"><i class="fas fa-eye"></i> Lihat Detail</div>
                </div>

                <div class="step-card" onclick="openModal(4)">
                    <div class="step-num">5</div>
                    <div class="step-icon"><i class="fas fa-arrow-up"></i></div>
                    <div class="step-title">Kelola Barang Keluar</div>
                    <div class="step-desc">Kontrol distribusi barang untuk kebutuhan operasional dengan pencatatan otomatis.</div>
                    <div class="step-hint"><i class="fas fa-eye"></i> Lihat Detail</div>
                </div>

                <div class="step-card" onclick="openModal(5)">
                    <div class="step-num">6</div>
                    <div class="step-icon"><i class="fas fa-chart-line"></i></div>
                    <div class="step-title">Kelola Pelaporan & Monitoring</div>
                    <div class="step-desc">Laporan inventaris lengkap sebagai dasar evaluasi, audit, dan pengambilan keputusan.</div>
                    <div class="step-hint"><i class="fas fa-eye"></i> Lihat Detail</div>
                </div>

            </div>

            {{-- CTA --}}
            <div class="cta-row">
                <a href="/dashboard" class="btn-primary-cta">
                    <i class="fas fa-rocket"></i> Mulai Gunakan Sistem
                </a>
                <button class="btn-secondary-cta" onclick="openModal(0)">
                    <i class="fas fa-play-circle"></i> Lihat Panduan Alur
                </button>
            </div>

            <div class="alur-footer">
                <i class="fas fa-shield-alt text-primary"></i>
                Sistem dirancang dengan konsep <b>Modern, Transparan & Profesional</b> untuk manajemen inventaris sekolah.
            </div>

        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════
     MODAL OVERLAY
═════════════════════════════════════════ --}}
<div class="modal-overlay" id="stepModal" onclick="handleOverlayClick(event)">
    <div class="modal-box" id="modalBox">
        <div class="modal-banner" id="modalBanner">
            <button class="modal-close-x" onclick="closeModal()"><i class="fas fa-times"></i></button>
            <div class="modal-banner-inner">
                <div class="modal-step-badge" id="modalBadge"></div>
                <div class="modal-icon-wrap" id="modalIcon"></div>
                <div class="modal-title" id="modalTitle"></div>
                <div class="modal-subtitle" id="modalSubtitle"></div>
            </div>
        </div>
        <div class="modal-body-inner">
            <div class="modal-section-title">Apa yang dilakukan di tahap ini?</div>
            <ul class="detail-list" id="modalDetails"></ul>
            <div class="tip-box" id="modalTip"></div>
            <div class="modal-footer-bar">
                <button class="btn-modal-close" onclick="closeModal()">
                    <i class="fas fa-times-circle"></i> Tutup
                </button>
                <button class="btn-modal-next" id="modalNextBtn" onclick="goNext()">
                    Langkah Berikutnya <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
const steps = [
  {
    icon: '<i class="fas fa-warehouse"></i>',
    title: 'Kelola  Aset Sekolah',
    subtitle: 'Kelola aset sekolah secara menyeluruh — tambah, cari, edit, hapus, lihat riwayat, dan export laporan aset dalam format PDF dan Excel.',
    details: [
        { icon: 'fas fa-plus-circle', text: 'Tambah aset baru dengan input nama aset, jumlah aset, pemegang aset, lokasi aset, dan unggah gambar aset untuk dokumentasi.' },
        { icon: 'fas fa-search', text: 'Cari aset berdasarkan nama aset, pemegang aset, atau lokasi aset dengan filter pencarian yang mudah.' },
        { icon: 'fas fa-edit', text: 'Menu aksi untuk mengedit data aset, menghapus aset dari sistem, dan melihat detail lengkap setiap aset.' },
        { icon: 'fas fa-history', text: 'Lihat riwayat data aset yang sudah dihapus atau tidak dipakai (aset yang sudah dihapus tidak dapat dipulihkan).' },
        { icon: 'fas fa-file-export', text: 'Export laporan aset dalam format PDF dan Excel untuk kebutuhan arsip dan analisis data.' },
    ],
    tip: '<strong>💡 TIP</strong> Pastikan nama aset dan pemegang aset terisi dengan benar. Upload gambar aset untuk kemudahan identifikasi dan verifikasi kondisi barang secara visual.'
},
 {
    icon: '<i class="fas fa-boxes"></i>',
    title: 'Kelola Data Barang',
    subtitle: 'Kelola data barang dengan sistem bertahap — atur kategori, satuan, kemudian data barang dengan kontrol stok minimal yang akurat.',
    details: [
        { icon: 'fas fa-sitemap', text: 'Tahap 1: Input kategori barang dengan nama kategori, cari berdasarkan nama, serta menu aksi untuk edit dan hapus kategori.' },
        { icon: 'fas fa-balance-scale', text: 'Tahap 2: Input satuan barang dengan nama satuan, cari berdasarkan nama, serta menu aksi untuk edit dan hapus satuan.' },
        { icon: 'fas fa-archive', text: 'Tahap 3: Tambah data barang baru dengan input nama barang, pilih kategori, pilih satuan, stok minimal barang, deskripsi lengkap, dan upload gambar barang untuk dokumentasi visual.' },
        { icon: 'fas fa-search-plus', text: 'Cari dan filter barang berdasarkan nama barang atau kode barang, dengan menu aksi edit, hapus, dan lihat detail barang.' },
    ],
    tip: '<strong>💡 TIP</strong> Selesaikan input kategori dan satuan terlebih dahulu sebelum menambah data barang, agar data kategori dan satuan sudah tersedia untuk dipilih. Tentukan stok minimal barang dengan tepat agar proses pengadaan barang dapat berjalan lancar, dan upload gambar barang untuk kemudahan identifikasi dan verifikasi kondisi barang secara visual.'
},
    {
    icon: '<i class="fas fa-handshake"></i>',
    title: 'Kelola Data Relasi',
    subtitle: 'Kelola data supplier dan data guru & tendik dalam satu tempat untuk pengelolaan relasi yang efisien.',
    details: [
        { icon: 'fas fa-store', text: 'Input data supplier dengan nama toko dan alamat toko, cari berdasarkan nama toko atau alamat toko, serta menu aksi untuk edit dan hapus data supplier dari sistem.' },
        { icon: 'fas fa-users', text: 'Input data guru & tendik dengan nama guru & tendik dan status/jabatan, cari berdasarkan nama guru & tendik atau status/jabatan, serta menu aksi untuk edit dan hapus data guru & tendik dari sistem.' },
        { icon: 'fas fa-search', text: 'Fitur pencarian lengkap untuk supplier berdasarkan nama toko atau alamat toko, dan untuk guru & tendik berdasarkan nama atau status/jabatan.' },
        { icon: 'fas fa-cog', text: 'Menu aksi yang fleksibel memungkinkan pengguna untuk mengedit informasi terbaru atau menghapus data relasi yang sudah tidak digunakan lagi.' },
    ],
    tip: '<strong>💡 TIP</strong> Lengkapi data supplier dan guru & tendik dengan informasi yang akurat dan terbaru untuk memastikan kelancaran proses transaksi pengadaan dan komunikasi internal sekolah.'
},
  {
    icon: '<i class="fas fa-arrow-down"></i>',
    title: 'Kelola Transaksi Barang Masuk',
    subtitle: 'Catat setiap barang yang masuk ke sistem dengan akurat untuk menjaga integritas stok.',
    details: [
        { icon: 'fas fa-plus-square', text: 'Tambah barang masuk dengan pilih nama barang, pilih nama supplier atau toko asal barang, masukkan jumlah barang masuk, dan pilih tanggal barang masuk.' },
        { icon: 'fas fa-barcode', text: 'Sistem otomatis membuat kode barang untuk setiap transaksi masuk, memudahkan identifikasi dan tracking barang di sistem.' },
        { icon: 'fas fa-info-circle', text: 'Informasi stok barang yang tersedia di sistem ditampilkan dalam form untuk memberikan gambaran kondisi stok saat ini.' },
        { icon: 'fas fa-search', text: 'Cari transaksi barang masuk yang sudah dilakukan berdasarkan kode barang, nama barang, atau nama supplier dengan menu aksi hapus transaksi.' },
    ],
    tip: '<strong>💡 TIP</strong> Pastikan nama supplier dan data barang sudah terdaftar terlebih dahulu sebelum melakukan input transaksi barang masuk. Perhatikan jumlah dan tanggal barang masuk untuk memastikan akurasi stok di sistem.'
},
{
    icon: '<i class="fas fa-arrow-up"></i>',
    title: 'Kelola Transaksi Barang Keluar',
    subtitle: 'Kontrol pengeluaran barang ke guru & tendik dengan sistem stok minimal yang terukur.',
    details: [
        { icon: 'fas fa-minus-square', text: 'Tambah barang keluar dengan pilih nama barang, pilih nama guru & tendik yang menggunakan barang, masukkan jumlah barang keluar, dan pilih tanggal barang keluar.' },
        { icon: 'fas fa-barcode', text: 'Sistem otomatis membuat kode transaksi untuk setiap pengeluaran barang, dan menampilkan informasi stok barang tersedia saat ini untuk memudahkan penggunaan atau pengeluaran barang.' },
        { icon: 'fas fa-lock', text: 'Sistem akan mengecek stok minimal barang — barang tidak bisa dikeluarkan apabila jumlah yang diminta akan membuat stok di bawah batas minimal yang sudah ditentukan.' },
        { icon: 'fas fa-search', text: 'Cari transaksi barang keluar yang sudah dilakukan berdasarkan kode transaksi, nama barang, atau nama guru & tendik dengan menu aksi hapus transaksi.' },
    ],
    tip: '<strong>💡 TIP</strong> Perhatikan stok minimal barang yang telah ditetapkan sebelumnya — sistem akan mencegah pengeluaran barang jika akan menyebabkan stok di bawah batas minimal. Pastikan data guru & tendik sudah terdaftar untuk mempermudah pencatatan pemakai barang.'
},
    {
    icon: '<i class="fas fa-chart-line"></i>',
    title: 'Kelola Pelaporan & Monitoring',
    subtitle: 'Kelola tiga sub menu pelaporan untuk monitoring stok barang, barang masuk, dan barang keluar secara menyeluruh.',
    details: [
        { icon: 'fas fa-cubes', text: 'Menu Stok Barang: Export laporan dalam format PDF dan Excel, pilih orientasi kertas Portrait atau Landscape, tampilkan barang berdasarkan nama barang atau kode barang, dan ketahui stok setiap barang yang tersedia di sistem.' },
        { icon: 'fas fa-arrow-down', text: 'Menu Barang Masuk: Export laporan dalam format PDF dan Excel, filter rentang tanggal pelaporan per periode sesuai kebutuhan, dan tampilkan berdasarkan kode transaksi, tanggal masuk, nama barang, atau nama supplier.' },
        { icon: 'fas fa-arrow-up', text: 'Menu Barang Keluar: Export laporan dalam format PDF dan Excel, filter rentang tanggal pelaporan per periode sesuai kebutuhan, dan tampilkan berdasarkan kode transaksi, tanggal keluar, nama barang, atau nama guru & tendik/pemakai barang.' },
        { icon: 'fas fa-print', text: 'Semua laporan siap dicetak dan digunakan untuk keperluan arsip internal, audit, laporan kepala sekolah, dan dinas pendidikan.' },
    ],
    tip: '<strong>💡 TIP</strong> Gunakan fitur filter tanggal dan orientasi kertas untuk menyesuaikan laporan sesuai kebutuhan laporan berkala (harian, mingguan, bulanan, tahunan). Export laporan secara berkala untuk menjaga rekam jejak transaksi dan stok barang.'
}
];

let currentStep = 0;

function openModal(index) {
    currentStep = index;
    renderModal(index);
    document.getElementById('stepModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('stepModal').classList.remove('active');
    document.body.style.overflow = '';
}

function goNext() {
    currentStep = (currentStep + 1) % steps.length;
    renderModal(currentStep);
    // scroll modal to top
    document.getElementById('modalBox').scrollTop = 0;
}

function handleOverlayClick(e) {
    if (e.target === document.getElementById('stepModal')) closeModal();
}

function renderModal(index) {
    const s = steps[index];
    document.getElementById('modalBadge').textContent = `STEP ${index + 1} OF ${steps.length}`;
    document.getElementById('modalIcon').innerHTML = s.icon;
    document.getElementById('modalTitle').textContent = s.title;
    document.getElementById('modalSubtitle').textContent = s.subtitle;

    const detailsEl = document.getElementById('modalDetails');
    detailsEl.innerHTML = s.details.map(d => `
        <li>
            <span class="icon-bullet"><i class="${d.icon}"></i></span>
            ${d.text}
        </li>
    `).join('');

    document.getElementById('modalTip').innerHTML = s.tip;

    const nextBtn = document.getElementById('modalNextBtn');
    if (index === steps.length - 1) {
        nextBtn.innerHTML = '<i class="fas fa-rocket"></i> Mulai Gunakan Sistem';
        nextBtn.onclick = function() { window.location.href = '/dashboard'; };
    } else {
        nextBtn.innerHTML = `Langkah Berikutnya <i class="fas fa-arrow-right"></i>`;
        nextBtn.onclick = goNext;
    }
}

// Keyboard ESC to close
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
</script>

@endsection