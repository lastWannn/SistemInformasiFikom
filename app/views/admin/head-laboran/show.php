<?php $title = 'Detail Staff'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-5xl mx-auto">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <a href="<?= url('/admin/head-laboran') ?>"
                    class="group inline-flex items-center gap-2 text-slate-400 hover:text-primary-600 transition-colors">
                    <div
                        class="w-8 h-8 rounded-full bg-[#1c1b22] border border-white/10 flex items-center justify-center shadow-sm group-hover:border-primary-500/50 transition-all">
                        <i class="bi bi-arrow-left text-sm"></i>
                    </div>
                    <span class="font-medium text-sm">Kembali ke Daftar</span>
                </a>

                <a href="<?= url('/admin/head-laboran/' . $staff['id'] . '/edit') ?>"
                    class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition-all transform hover:-translate-y-0.5">
                    <i class="bi bi-pencil-square"></i>
                    <span>Edit Data</span>
                </a>
            </div>

            <?php displayFlash(); ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-1">
                    <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 overflow-hidden relative">
                        <div class="h-24 bg-gradient-to-br from-primary-500 to-primary-700"></div>

                        <div class="px-6 pb-8 text-center relative">
                            <div
                                class="w-24 h-24 mx-auto -mt-12 rounded-full border-4 border-[#1c1b22] bg-[#1c1b22] shadow-md overflow-hidden relative z-10">
                                <?php if (!empty($staff['photo'])): ?>
                                    <img src="<?= e($staff['photo']) ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div
                                        class="w-full h-full flex items-center justify-center bg-[#131218] text-slate-400 font-bold text-3xl">
                                        <?= strtoupper(substr($user['name'] ?? 'U', 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mt-4">
                                <h2 class="text-xl font-bold text-white"><?= e($user['name']) ?></h2>
                                <p class="text-primary-500 font-medium text-sm mt-1"><?= e($staff['position']) ?></p>

                                <div class="mt-4 pt-4 border-t border-white/10 space-y-2">
                                    <div class="flex items-center justify-center text-slate-400 text-sm gap-2">
                                        <i class="bi bi-envelope"></i>
                                        <span><?= e($user['email']) ?></span>
                                    </div>
                                    <?php if (!empty($staff['phone'])): ?>
                                        <div class="flex items-center justify-center text-slate-400 text-sm gap-2">
                                            <i class="bi bi-whatsapp text-emerald-500"></i>
                                            <span>+62 <?= e($staff['phone']) ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 overflow-hidden">
                        <div
                            class="px-6 py-4 border-b border-white/10 flex justify-between items-center bg-[#131218]/50">
                            <h3 class="font-bold text-white flex items-center gap-2">
                                <i class="bi bi-activity text-primary-500"></i> Status Kehadiran
                            </h3>
                            <span class="text-xs text-slate-400">Real-time update</span>
                        </div>

                        <div class="p-6">
                            <div class="mb-6">
                                <?php if ($staff['status'] == 'active'): ?>
                                    <div
                                        class="flex items-center p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400">
                                        <div class="relative flex h-3 w-3 mr-4">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-lg">Sedang Hadir / Standby</p>
                                            <p class="text-xs text-emerald-500 mt-0.5">Staff saat ini berada di lokasi dan
                                                siap bertugas.</p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div
                                        class="flex items-center p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400">
                                        <div class="w-3 h-3 rounded-full bg-rose-500 mr-4"></div>
                                        <div>
                                            <p class="font-bold text-lg">Sedang Keluar / Tidak Aktif</p>
                                            <p class="text-xs text-rose-500 mt-0.5">Staff sedang tidak berada di tempat
                                                tugas.</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-blue-500/10 text-blue-400 flex items-center justify-center shrink-0 border border-blue-500/20">
                                        <i class="bi bi-geo-alt-fill text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Lokasi
                                            Terkini</p>
                                        <p class="text-white font-medium mt-1"><?= e($staff['location']) ?></p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-violet-500/10 text-violet-400 flex items-center justify-center shrink-0 border border-violet-500/20">
                                        <i class="bi bi-box-arrow-in-right text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Jam
                                            Masuk</p>
                                        <p class="text-white font-mono font-medium mt-1">
                                            <?= formatTime($staff['time_in']) ?></p>
                                    </div>
                                </div>

                                <?php if ($staff['status'] != 'active'): ?>
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-rose-500/10 text-rose-400 flex items-center justify-center shrink-0 border border-rose-500/20">
                                            <i class="bi bi-clock-history text-lg"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Estimasi
                                                Kembali</p>
                                            <p class="text-rose-500 font-mono font-bold mt-1">
                                                <?= !empty($staff['return_time']) ? formatDate($staff['return_time']) : 'Belum ditentukan' ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 p-6">
                        <p
                            class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3 flex items-center gap-2">
                            <i class="bi bi-sticky"></i> Catatan Status
                        </p>
                        <div class="bg-amber-500/10 rounded-xl p-4 border border-amber-500/20 relative">
                            <i class="bi bi-quote absolute top-2 left-2 text-4xl text-amber-500/20 -z-0"></i>
                            <p class="text-slate-300 italic relative z-10 pl-4">
                                "<?= e($staff['notes'] ?? 'Tidak ada catatan khusus.') ?>"
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>