<?php
// Pastikan variabel ada
$lecturers = $lecturers ?? [];
$assistants = $assistants ?? [];
$laboratories = $laboratories ?? [];
$title = 'Buat Jadwal Kuliah';
?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-6xl mx-auto">

            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-4">
                    <a href="<?= url('/admin/schedules') ?>"
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#1c1b22] border border-white/10 text-slate-400 hover:text-primary-500 hover:border-primary-500 shadow-sm transition-all">
                        <i class="bi bi-arrow-left text-lg"></i>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold tracking-tight text-white">Jadwal Kuliah Baru</h1>
                        <p class="text-sm text-slate-400 mt-1">Buat jadwal master dan generate sesi otomatis</p>
                    </div>
                </div>
            </div>

            <?php displayFlash(); ?>

            <form action="<?= url('/admin/schedules/create') ?>" method="POST">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                                <i class="bi bi-journal-bookmark text-primary-500"></i> Detail Mata Kuliah
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-bold text-white">Lokasi
                                        Laboratorium</label>
                                    <select name="laboratory_id"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white"
                                        required>
                                        <option value="">-- Pilih Laboratorium --</option>
                                        <?php foreach ($laboratories as $lab): ?>
                                            <option value="<?= $lab['id'] ?>"><?= $lab['lab_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-bold text-white">Mata Kuliah</label>
                                    <input type="text" name="course"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white placeholder-slate-500"
                                        placeholder="Contoh: Pemrograman Web" required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-bold text-white">Kode Kelas</label>
                                    <input type="text" name="class_code"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white placeholder-slate-500"
                                        placeholder="Contoh: TI-3A" required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-bold text-white">Program Studi</label>
                                    <select name="program_study"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white">
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-bold text-white">Semester</label>
                                    <input type="number" name="semester"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white"
                                        min="1" max="8" value="1" required>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                                <i class="bi bi-people text-primary-500"></i> Dosen & Asisten
                            </h2>

                            <div class="mb-6 p-4 bg-[#131218] rounded-xl border border-white/10">
                                <label class="block mb-3 text-sm font-bold text-white">Dosen Pengampu</label>
                                <div class="flex items-start gap-4">
                                    <div class="shrink-0">
                                        <img id="preview_lecturer"
                                            src="https://ui-avatars.com/api/?name=Dosen&background=131218&color=ffffff"
                                            class="w-14 h-14 rounded-full object-cover border-2 border-white/10 shadow-md">
                                    </div>
                                    <div class="flex-1">
                                        <select name="lecturer_id" id="lecturer_id" onchange="updatePhoto('lecturer')"
                                            class="w-full px-4 py-3 bg-[#1c1b22] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 cursor-pointer text-white">
                                            <option value="" data-image="" data-name="Dosen">-- Pilih Dosen --</option>
                                            <?php if (!empty($lecturers)): ?>
                                                <?php foreach ($lecturers as $dosen): ?>
                                                    <option value="<?= $dosen['id'] ?>"
                                                        data-image="<?= !empty($dosen['image']) ? $dosen['image'] : '' ?>"
                                                        data-name="<?= $dosen['name'] ?>">
                                                        <?= $dosen['name'] ?> (<?= ucfirst($dosen['role_name'] ?? 'User') ?>)
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option disabled>Data Dosen Kosong</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="p-4 bg-[#131218] rounded-xl border border-white/10">
                                    <label class="block mb-3 text-sm font-bold text-white">Asisten 1 (Utama)</label>
                                    <div class="flex items-start gap-3">
                                        <div class="shrink-0">
                                            <img id="preview_asst1"
                                                src="https://ui-avatars.com/api/?name=A1&background=131218&color=ffffff"
                                                class="w-12 h-12 rounded-full object-cover border-2 border-white/10 shadow-md">
                                        </div>
                                        <div class="flex-1">
                                            <select name="assistant_1_id" id="assistant_1_id"
                                                onchange="updatePhoto('assistant_1')"
                                                class="w-full px-3 py-2.5 bg-[#1c1b22] border border-white/10 rounded-xl text-sm text-white">
                                                <option value="" data-image="" data-name="A1">-- Pilih --</option>
                                                <?php foreach ($assistants as $ast): ?>
                                                    <option value="<?= $ast['id'] ?>"
                                                        data-image="<?= !empty($ast['image']) ? $ast['image'] : '' ?>"
                                                        data-name="<?= $ast['name'] ?>">
                                                        <?= $ast['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 bg-[#131218] rounded-xl border border-white/10">
                                    <label class="block mb-3 text-sm font-bold text-white">Asisten 2
                                        (Opsional)</label>
                                    <div class="flex items-start gap-3">
                                        <div class="shrink-0">
                                            <img id="preview_asst2"
                                                src="https://ui-avatars.com/api/?name=A2&background=131218&color=ffffff"
                                                class="w-12 h-12 rounded-full object-cover border-2 border-white/10 shadow-md">
                                        </div>
                                        <div class="flex-1">
                                            <select name="assistant_2_id" id="assistant_2_id"
                                                onchange="updatePhoto('assistant_2')"
                                                class="w-full px-3 py-2.5 bg-[#1c1b22] border border-white/10 rounded-xl text-sm text-white">
                                                <option value="" data-image="" data-name="A2">-- Kosong --</option>
                                                <?php foreach ($assistants as $ast): ?>
                                                    <option value="<?= $ast['id'] ?>"
                                                        data-image="<?= !empty($ast['image']) ? $ast['image'] : '' ?>"
                                                        data-name="<?= $ast['name'] ?>">
                                                        <?= $ast['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                                <i class="bi bi-clock text-primary-500"></i> Waktu & Sesi
                            </h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block mb-2 text-sm font-bold text-white">Tanggal Mulai</label>
                                    <input type="date" id="start_date" name="start_date"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white"
                                        value="<?= isset($start_date) ? $start_date : date('Y-m-d') ?>" required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-bold text-white">Hari</label>
                                    <input type="text" id="day_selector" name="day"
                                        class="w-full px-4 py-3 bg-[#131218]/50 border border-white/10 rounded-xl text-slate-400 cursor-not-allowed"
                                        readonly>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block mb-2 text-sm font-bold text-white">Jam Mulai</label>
                                        <input type="time" name="start_time"
                                            class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white"
                                            required>
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-bold text-white">Jam Selesai</label>
                                        <input type="time" name="end_time"
                                            class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white"
                                            required>
                                    </div>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-bold text-white">Jumlah Pertemuan</label>
                                    <input type="number" name="total_meetings"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500/20 text-white"
                                        value="14" min="1" max="20" required>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full py-3.5 bg-primary-500 hover:bg-primary-600 text-[#131218] font-bold rounded-xl shadow-lg shadow-primary-500/30 transition-all flex items-center justify-center gap-2 transform active:scale-95">
                                <i class="bi bi-magic"></i> Generate Jadwal
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>

<script>
    function updatePhoto(roleKey) {
        let selectId, imgId;
        if (roleKey === 'lecturer') {
            selectId = 'lecturer_id';
            imgId = 'preview_lecturer';
        } else if (roleKey === 'assistant_1') {
            selectId = 'assistant_1_id';
            imgId = 'preview_asst1';
        } else if (roleKey === 'assistant_2') {
            selectId = 'assistant_2_id';
            imgId = 'preview_asst2';
        }

        const select = document.getElementById(selectId);
        const img = document.getElementById(imgId);

        if (select.selectedIndex === -1) return;

        const selectedOption = select.options[select.selectedIndex];
        const photoUrl = selectedOption.getAttribute('data-image');
        const name = selectedOption.getAttribute('data-name') || 'User';

        if (photoUrl && photoUrl.trim() !== '') {
            img.src = photoUrl;
        } else {
            const encodedName = encodeURIComponent(name);
            img.src = `https://ui-avatars.com/api/?name=${encodedName}&background=131218&color=ffffff`;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('start_date');
        const daySelector = document.getElementById('day_selector');
        const daysMap = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        function updateDay() {
            if (startDateInput.value) {
                const date = new Date(startDateInput.value);
                daySelector.value = daysMap[date.getDay()];
            }
        }
        updateDay();
        startDateInput.addEventListener('change', updateDay);
    });
</script>