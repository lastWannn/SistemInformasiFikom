<?php $title = 'Manajemen Staff & Presence'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Manajemen Presence</h1>
                    <p class="text-slate-400 text-sm mt-1">Pantau kehadiran Kepala Lab dan Staff Laboratorium.</p>
                </div>

                <a href="<?= url('/admin/head-laboran/create') ?>"
                    class="inline-flex items-center gap-2 bg-primary-500 hover:bg-primary-600 text-[#131218] text-sm font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-primary-500/30 transition-all transform hover:-translate-y-0.5 focus:ring-4 focus:ring-primary-500/20">
                    <i class="bi bi-person-plus-fill text-lg"></i>
                    <span>Tambah Staff</span>
                </a>
            </div>

            <?php displayFlash(); ?>

            <div
                class="bg-[#1c1b22] border border-white/10 rounded-2xl shadow-sm overflow-hidden min-h-[600px] flex flex-col">

                <div class="overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-slate-400">
                        <thead class="text-xs text-slate-400 uppercase bg-white/5 border-b border-white/10">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Nama & Jabatan</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Status Kehadiran</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Lokasi Terkini</th>
                                <th scope="col" class="px-6 py-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php if (!empty($headLaboran)): ?>
                            <?php foreach ($headLaboran as $hl): ?>
                            <tr class="group hover:bg-white/5 transition-colors duration-200">

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 rounded-full bg-[#131218] border-2 border-[#1c1b22] shadow-sm overflow-hidden flex-shrink-0 relative">
                                            <?php if (!empty($hl['photo'])): ?>
                                            <img src="<?= e($hl['photo']) ?>" class="w-full h-full object-cover"
                                                alt="<?= e($hl['name']) ?>">
                                            <?php else: ?>
                                            <div
                                                class="w-full h-full flex items-center justify-center text-primary-500 bg-primary-500/10 font-bold text-sm">
                                                <?= strtoupper(substr($hl['name'], 0, 1)) ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div>
                                            <div class="font-bold text-white"><?= e($hl['name']) ?></div>
                                            <div class="flex flex-wrap gap-2 mt-1">
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-[#131218] text-slate-400 border border-white/10">
                                                    <?= e($hl['position']) ?>
                                                </span>
                                                <?php if (!empty($hl['phone'])): ?>
                                                <span class="inline-flex items-center text-[10px] text-emerald-600"
                                                    title="Ada No. WhatsApp">
                                                    <i class="bi bi-whatsapp"></i>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <?php if ($hl['status'] == 'active'): ?>
                                    <div class="flex flex-col items-start gap-1">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            <span class="relative flex h-2 w-2">
                                                <span
                                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                                <span
                                                    class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                            </span>
                                            Hadir / Standby
                                        </span>
                                        <span class="text-[11px] text-slate-400 ml-1">
                                            <i class="bi bi-clock mr-1"></i>Masuk: <?= formatTime($hl['time_in']) ?>
                                        </span>
                                    </div>
                                    <?php else: ?>
                                    <div class="flex flex-col items-start gap-1">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                            Sedang Keluar
                                        </span>
                                        <span class="text-[11px] text-slate-400 ml-1">
                                            <i class="bi bi-box-arrow-in-right mr-1"></i>Kembali:
                                            <span class="font-medium text-slate-300">
                                                <?= !empty($hl['return_time']) ? formatTime($hl['return_time']) : '-' ?>
                                            </span>
                                        </span>
                                    </div>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-2">
                                        <div class="mt-0.5 text-slate-400">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div class="max-w-[200px]">
                                            <div class="text-sm font-medium text-slate-300 mb-0.5">
                                                <?= e($hl['location']) ?>
                                            </div>
                                            <?php if (!empty($hl['notes'])): ?>
                                            <p class="text-xs text-slate-400 italic truncate"
                                                title="<?= e($hl['notes']) ?>">
                                                "<?= e($hl['notes']) ?>"
                                            </p>
                                            <?php else: ?>
                                            <span class="text-xs text-slate-400">- Tidak ada catatan -</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-200">

                                        <a href="<?= url('/admin/head-laboran/' . $hl['id']) ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg text-primary-400 bg-primary-500/10 hover:bg-primary-500/20 hover:scale-105 transition-all border border-transparent hover:border-primary-500/30"
                                            title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="<?= url('/admin/head-laboran/' . $hl['id'] . '/edit') ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg text-amber-400 bg-amber-500/10 hover:bg-amber-500/20 hover:scale-105 transition-all border border-transparent hover:border-amber-500/30"
                                            title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form method="POST"
                                            action="<?= url('/admin/head-laboran/' . $hl['id'] . '/delete') ?>"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus staff ini?')"
                                            class="inline">
                                            <button type="submit"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-rose-400 bg-rose-500/10 hover:bg-rose-500/20 hover:scale-105 transition-all border border-transparent hover:border-rose-500/30"
                                                title="Hapus Staff">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    <div class="flex flex-col items-center justify-center py-20 text-center">
                                        <div
                                            class="w-20 h-20 bg-[#131218] rounded-full flex items-center justify-center text-slate-400 mb-4 border border-white/10">
                                            <i class="bi bi-people text-3xl"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-white">Belum ada Staff</h3>
                                        <p class="text-slate-400 max-w-sm mt-1 mb-6 text-sm">Tambahkan data Kepala
                                            Laboran atau Staff untuk mulai memantau kehadiran.</p>
                                        <a href="<?= url('/admin/head-laboran/create') ?>"
                                            class="text-primary-500 hover:text-primary-400 font-medium hover:underline text-sm flex items-center gap-1">
                                            <i class="bi bi-plus-circle"></i> Tambah Staff Baru
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($headLaboran)): ?>
                <div
                    class="mt-auto border-t border-white/10 bg-[#131218] px-6 py-3 text-xs text-slate-400 flex justify-between items-center">
                    <span>Total Staff: <strong><?= count($headLaboran) ?></strong></span>
                    <span class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Hadir
                        <span class="w-2 h-2 rounded-full bg-rose-500 ml-2"></span> Keluar
                    </span>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>