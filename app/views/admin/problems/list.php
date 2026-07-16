<?php $title = 'Laporan Masalah'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Laporan Masalah</h1>
                    <p class="text-slate-400 text-sm mt-1">Monitoring dan manajemen masalah teknis laboratorium.</p>
                </div>

                <a href="<?= url('/admin/problems/create') ?>"
                    class="inline-flex items-center gap-2 bg-primary-500 hover:bg-primary-600 text-[#131218] text-sm font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-primary-500/30 transition-all transform hover:-translate-y-0.5">
                    <i class="bi bi-plus-lg text-lg"></i>
                    <span>Buat Laporan</span>
                </a>
            </div>

            <?php displayFlash(); ?>

            <?php if (isset($statistics)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

                <div
                    class="bg-[#1c1b22] p-5 rounded-2xl shadow-sm border border-white/10 flex items-center justify-between hover:border-primary-500/50 transition-colors">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Laporan</p>
                        <h3 class="text-2xl font-bold text-white mt-1"><?= $statistics['total'] ?? 0 ?></h3>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#131218] text-primary-500 flex items-center justify-center border border-white/10">
                        <i class="bi bi-folder2-open text-xl"></i>
                    </div>
                </div>

                <div
                    class="bg-[#1c1b22] p-5 rounded-2xl shadow-sm border border-white/10 flex items-center justify-between hover:border-rose-500/50 transition-colors relative overflow-hidden group">
                    <div class="absolute inset-0 bg-rose-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-rose-500 uppercase tracking-wider">Baru (Reported)</p>
                        <h3 class="text-2xl font-bold text-rose-500 mt-1"><?= $statistics['reported'] ?? 0 ?></h3>
                    </div>
                    <div
                        class="relative z-10 w-10 h-10 rounded-xl bg-rose-500/10 text-rose-500 flex items-center justify-center border border-rose-500/20">
                        <i class="bi bi-exclamation-circle-fill text-xl"></i>
                    </div>
                </div>

                <div
                    class="bg-[#1c1b22] p-5 rounded-2xl shadow-sm border border-white/10 flex items-center justify-between hover:border-amber-500/50 transition-colors relative overflow-hidden group">
                    <div class="absolute inset-0 bg-amber-500/5 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-amber-500 uppercase tracking-wider">Diproses</p>
                        <h3 class="text-2xl font-bold text-amber-500 mt-1"><?= $statistics['in_progress'] ?? 0 ?></h3>
                    </div>
                    <div
                        class="relative z-10 w-10 h-10 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center border border-amber-500/20">
                        <i class="bi bi-arrow-repeat text-xl"></i>
                    </div>
                </div>

                <div
                    class="bg-[#1c1b22] p-5 rounded-2xl shadow-sm border border-white/10 flex items-center justify-between hover:border-emerald-500/50 transition-colors relative overflow-hidden group">
                    <div class="absolute inset-0 bg-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-emerald-500 uppercase tracking-wider">Selesai</p>
                        <h3 class="text-2xl font-bold text-emerald-500 mt-1"><?= $statistics['resolved'] ?? 0 ?></h3>
                    </div>
                    <div
                        class="relative z-10 w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center border border-emerald-500/20">
                        <i class="bi bi-check-circle-fill text-xl"></i>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div
                class="bg-[#1c1b22] border border-white/10 rounded-2xl shadow-sm overflow-hidden flex flex-col min-h-[600px]">

                <div class="px-6 py-4 border-b border-white/10 flex flex-wrap gap-2 items-center bg-[#131218]/50">
                    <span class="text-xs font-semibold text-slate-400 uppercase mr-2">Filter Status:</span>
                    <?php
                    $currentStatus = $_GET['status'] ?? '';
                    $btnBase = "px-4 py-1.5 rounded-full text-xs font-medium border transition-all duration-200";
                    $btnInactive = "bg-[#131218] border-white/10 text-slate-400 hover:border-primary-500/30 hover:text-primary-400";
                    ?>

                    <a href="<?= url('/admin/problems') ?>"
                        class="<?= $btnBase ?> <?= $currentStatus == '' ? 'bg-primary-500 border-primary-500 text-[#131218] font-bold' : $btnInactive ?>">
                        Semua
                    </a>
                    <a href="<?= url('/admin/problems?status=reported') ?>"
                        class="<?= $btnBase ?> <?= $currentStatus == 'reported' ? 'bg-rose-500/20 border-rose-500/50 text-rose-400' : $btnInactive ?>">
                        Baru
                    </a>
                    <a href="<?= url('/admin/problems?status=in_progress') ?>"
                        class="<?= $btnBase ?> <?= $currentStatus == 'in_progress' ? 'bg-amber-500/20 border-amber-500/50 text-amber-400' : $btnInactive ?>">
                        Diproses
                    </a>
                    <a href="<?= url('/admin/problems?status=resolved') ?>"
                        class="<?= $btnBase ?> <?= $currentStatus == 'resolved' ? 'bg-emerald-500/20 border-emerald-500/50 text-emerald-400' : $btnInactive ?>">
                        Selesai
                    </a>
                </div>

                <div class="overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-slate-400">
                        <thead class="text-xs text-slate-400 uppercase bg-[#131218]/50 border-b border-white/10">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Lokasi (Lab & PC)</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-1/3">Deskripsi Masalah</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Status</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Pelapor</th>
                                <th scope="col" class="px-6 py-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php if (!empty($problems)): ?>
                            <?php foreach ($problems as $problem): ?>
                            <tr class="group hover:bg-[#131218]/50 transition-colors duration-200">

                                <td class="px-6 py-4 align-top">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="w-9 h-9 rounded-lg bg-blue-500/10 text-blue-400 flex items-center justify-center shrink-0 border border-blue-500/20 mt-1">
                                            <i class="bi bi-pc-display"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-white"><?= e($problem['lab_name']) ?></div>
                                            <div
                                                class="inline-flex items-center gap-1 mt-1 text-xs font-mono bg-[#131218] px-1.5 py-0.5 rounded text-slate-400 border border-white/10">
                                                PC-<?= e($problem['pc_number']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-top">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="text-[10px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-full border 
                                                        <?= strtolower($problem['problem_type']) == 'hardware' ? 'bg-purple-500/10 text-purple-400 border-purple-500/20' : 'bg-cyan-500/10 text-cyan-400 border-cyan-500/20' ?>">
                                                <?= strtoupper($problem['problem_type']) ?>
                                            </span>
                                            <span class="text-xs text-slate-400">#<?= $problem['id'] ?></span>
                                        </div>
                                        <p class="text-slate-400 line-clamp-2 leading-relaxed text-xs sm:text-sm">
                                            <?= e($problem['description']) ?>
                                        </p>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-top">
                                    <?php
                                            $status = strtolower($problem['status']);
                                            $badgeClass = match ($status) {
                                                'reported' => 'bg-rose-500/10 text-rose-400 border-rose-500/20',
                                                'in_progress' => 'bg-amber-500/10 text-amber-400 border-amber-500/20',
                                                'resolved' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                                default => 'bg-slate-500/10 text-slate-400 border-white/10'
                                            };
                                            $icon = match ($status) {
                                                'reported' => 'bi-exclamation-circle',
                                                'in_progress' => 'bi-hourglass-split',
                                                'resolved' => 'bi-check-circle',
                                                default => 'bi-circle'
                                            };
                                            ?>
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium border <?= $badgeClass ?>">
                                        <i class="bi <?= $icon ?>"></i>
                                        <?= ucfirst(str_replace('_', ' ', $status)) ?>
                                    </span>
                                </td>

                                <td class="px-6 py-4 align-top">
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="w-6 h-6 rounded-full bg-[#1c1b22] flex items-center justify-center text-[10px] font-bold text-slate-400 border border-white/10">
                                            <?= strtoupper(substr($problem['reporter_name'], 0, 1)) ?>
                                        </div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-xs font-semibold text-white"><?= e($problem['reporter_name']) ?></span>
                                            <span
                                                class="text-[10px] text-slate-400"><?= date('d M Y', strtotime($problem['reported_at'])) ?></span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-right align-middle">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-200">

                                        <a href="<?= url('/admin/problems/' . $problem['id']) ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg text-primary-500 bg-primary-500/10 hover:bg-primary-500/20 hover:scale-105 transition-all border border-transparent hover:border-primary-500/30"
                                            title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <form method="POST"
                                            action="<?= url('/admin/problems/' . $problem['id'] . '/delete') ?>"
                                            onsubmit="return confirm('Hapus laporan ini? Data tidak bisa dikembalikan.')"
                                            class="inline">
                                            <button type="submit"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-rose-500 bg-rose-500/10 hover:bg-rose-500/20 hover:scale-105 transition-all border border-transparent hover:border-rose-500/30"
                                                title="Hapus Laporan">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="5">
                                    <div class="flex flex-col items-center justify-center py-20 text-center">
                                        <div
                                            class="w-20 h-20 bg-[#131218] rounded-full flex items-center justify-center text-slate-400 mb-4 border border-white/10">
                                            <i class="bi bi-clipboard-check text-3xl"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-white">Tidak Ada Laporan</h3>
                                        <?php if ($currentStatus): ?>
                                        <p class="text-slate-400 max-w-sm mt-1 mb-6 text-sm">Tidak ada laporan dengan
                                            status "<?= ucfirst(str_replace('_', ' ', $currentStatus)) ?>".</p>
                                        <a href="<?= url('/admin/problems') ?>"
                                            class="text-primary-500 hover:underline text-sm">Bersihkan Filter</a>
                                        <?php else: ?>
                                        <p class="text-slate-400 max-w-sm mt-1 text-sm">Bagus! Semua sistem berjalan
                                            lancar.</p>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($problems)): ?>
                <div
                    class="mt-auto border-t border-white/10 bg-[#1c1b22] px-6 py-3 text-xs text-slate-400 flex justify-between items-center">
                    <span>Menampilkan <strong class="text-white"><?= count($problems) ?></strong> laporan</span>
                    <?php if ($currentStatus): ?>
                    <span class="bg-[#131218] px-2 py-0.5 rounded text-slate-400 border border-white/10">Filter:
                        <?= ucfirst($currentStatus) ?></span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>