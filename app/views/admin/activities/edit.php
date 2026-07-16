<?php $title = 'Edit Kegiatan'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto">

            <div class="flex items-center gap-4 mb-8">
                <a href="<?= url('/admin/activities') ?>"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#1c1b22] border border-white/10 text-slate-400 hover:text-primary-500 hover:border-primary-500 shadow-sm transition-all"
                    title="Kembali">
                    <i class="bi bi-arrow-left text-lg"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Edit Kegiatan</h1>
                    <div class="flex items-center gap-2 text-sm text-slate-400 mt-1">
                        <span>Manajemen Kegiatan</span>
                        <i class="bi bi-chevron-right text-xs"></i>
                        <span class="text-primary-500 font-medium">Edit #<?= $activity['id'] ?></span>
                    </div>
                </div>
            </div>

            <?php displayFlash(); ?>

            <form method="POST" action="<?= url('/admin/activities/' . $activity['id'] . '/edit') ?>"
                enctype="multipart/form-data">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-lg font-semibold text-white mb-5 pb-4 border-b border-white/5">
                                <i class="bi bi-pencil-square mr-2 text-primary-500"></i>Informasi Utama
                            </h2>

                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-semibold text-white">Judul Kegiatan <span
                                        class="text-rose-500">*</span></label>
                                <input type="text" name="title" value="<?= e($activity['title']) ?>"
                                    class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all placeholder:text-slate-500"
                                    placeholder="Masukkan judul kegiatan..." required>
                            </div>

                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-semibold text-white">Link Eksternal (URL)
                                    <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none text-slate-400">
                                        <i class="bi bi-link-45deg text-xl"></i>
                                    </div>
                                    <input type="url" name="link_url"
                                        value="<?= e($activity['link_url'] ?? $activity['link'] ?? '') ?>"
                                        class="w-full ps-11 p-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all font-mono text-xs sm:text-sm placeholder:text-slate-500"
                                        placeholder="https://..." required>
                                </div>
                                <p class="mt-2 text-xs text-slate-400">Pastikan link diawali dengan http:// atau
                                    https://</p>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-white">Deskripsi Singkat</label>
                                <textarea name="description" rows="4"
                                    class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all resize-none placeholder:text-slate-500"
                                    placeholder="Tuliskan ringkasan singkat..."><?= e($activity['description']) ?></textarea>
                            </div>
                        </div>

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-lg font-semibold text-white mb-5 pb-4 border-b border-white/5">
                                <i class="bi bi-sliders mr-2 text-primary-500"></i>Pengaturan
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-white">Kategori</label>
                                    <div class="relative">
                                        <select name="activity_type"
                                            class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block appearance-none transition-all cursor-pointer">
                                            <optgroup label="Publikasi Umum">
                                                <option value="news"
                                                    <?= $activity['activity_type'] == 'news' ? 'selected' : '' ?>>Berita
                                                    & Informasi</option>
                                                <option value="announcement"
                                                    <?= $activity['activity_type'] == 'announcement' ? 'selected' : '' ?>>
                                                    Pengumuman Penting</option>
                                                <option value="achievement"
                                                    <?= $activity['activity_type'] == 'achievement' ? 'selected' : '' ?>>
                                                    Prestasi & Penghargaan</option>
                                            </optgroup>

                                            <optgroup label="Akademik & Kegiatan">
                                                <option value="praktikum"
                                                    <?= $activity['activity_type'] == 'praktikum' ? 'selected' : '' ?>>
                                                    Praktikum</option>
                                                <option value="seminar"
                                                    <?= $activity['activity_type'] == 'seminar' ? 'selected' : '' ?>>
                                                    Seminar / Workshop</option>
                                                <option value="lomba"
                                                    <?= $activity['activity_type'] == 'lomba' ? 'selected' : '' ?>>Lomba
                                                    / Kompetisi</option>
                                                <option value="event"
                                                    <?= $activity['activity_type'] == 'event' ? 'selected' : '' ?>>Event
                                                    / Acara Lab</option>
                                            </optgroup>

                                            <optgroup label="Administrasi">
                                                <option value="recruitment"
                                                    <?= $activity['activity_type'] == 'recruitment' ? 'selected' : '' ?>>
                                                    Open Recruitment</option>
                                                <option value="collaboration"
                                                    <?= $activity['activity_type'] == 'collaboration' ? 'selected' : '' ?>>
                                                    Kerjasama</option>
                                                <option value="other"
                                                    <?= $activity['activity_type'] == 'other' ? 'selected' : '' ?>>
                                                    Lainnya</option>
                                            </optgroup>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-slate-700">Status Publikasi
                                        <span class="text-rose-500">*</span></label>
                                    <div class="relative">
                                        <select name="status"
                                            class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block appearance-none transition-all cursor-pointer">
                                            <option value="published"
                                                <?= ($activity['status'] ?? '') == 'published' ? 'selected' : '' ?>>
                                                Published (Tayang)</option>
                                            <option value="draft"
                                                <?= ($activity['status'] ?? '') == 'draft' ? 'selected' : '' ?>>Draft
                                                (Simpan Dulu)</option>
                                            <option value="cancelled"
                                                <?= ($activity['status'] ?? '') == 'cancelled' ? 'selected' : '' ?>>
                                                Cancelled (Batal)</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-white">Tanggal
                                        Posting</label>
                                    <input type="date" name="activity_date" value="<?= e($activity['activity_date']) ?>"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all"
                                        required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-1 space-y-6">

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Media Gambar</h2>

                            <div class="mb-4">
                                <label class="block mb-2 text-xs font-medium text-slate-400">Cover Saat Ini</label>
                                <?php if (!empty($activity['image_cover'])): ?>
                                <div
                                    class="relative aspect-video rounded-xl overflow-hidden border border-white/10 group shadow-sm">
                                    <?php 
                                            $imgSrc = (strpos($activity['image_cover'], 'http') === 0) 
                                                ? $activity['image_cover'] 
                                                : BASE_URL . $activity['image_cover'];
                                        ?>
                                    <img src="<?= e($imgSrc) ?>"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <p class="text-white text-xs font-mono truncate">
                                            <?= basename($activity['image_cover']) ?></p>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div
                                    class="aspect-video rounded-xl bg-[#131218] border-2 border-dashed border-white/10 flex flex-col items-center justify-center text-slate-500">
                                    <i class="bi bi-image-alt text-3xl mb-2"></i>
                                    <span class="text-xs">Tidak ada gambar</span>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label class="block mb-2 text-xs font-medium text-slate-400">Ganti Gambar
                                    (Opsional)</label>
                                <label
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-primary-500/20 border-dashed rounded-xl cursor-pointer bg-primary-500/5 hover:bg-primary-500/10 hover:border-primary-500/40 transition-all group relative overflow-hidden">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-2"
                                        id="placeholder-content">
                                        <i
                                            class="bi bi-cloud-arrow-up text-2xl text-primary-500/50 group-hover:text-primary-500 mb-2 transition-colors"></i>
                                        <p class="mb-1 text-xs text-slate-400"><span
                                                class="font-semibold text-primary-500">Klik upload</span></p>
                                        <p class="text-[10px] text-slate-500">Max. 2MB</p>
                                    </div>

                                    <img id="image-preview"
                                        class="hidden w-full h-full object-cover absolute inset-0" />

                                    <input name="image_cover_file" type="file" class="hidden" accept="image/*"
                                        onchange="previewImage(this)" />
                                </label>
                            </div>
                        </div>

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10 sticky top-4">
                            <h2 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Aksi</h2>
                            <div class="flex flex-col gap-3">
                                <button type="submit"
                                    class="w-full text-[#131218] bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-500/20 font-bold rounded-xl text-sm px-5 py-3 transition-all shadow-lg shadow-primary-500/30 flex justify-center items-center gap-2 group">
                                    <i class="bi bi-check-lg text-lg"></i>
                                    <span>Simpan Perubahan</span>
                                </button>

                                <a href="<?= url('/admin/activities') ?>"
                                    class="w-full text-slate-300 bg-[#131218] border border-white/10 hover:bg-[#1c1b22] hover:text-white focus:ring-4 focus:ring-white/5 font-medium rounded-xl text-sm px-5 py-3 text-center transition-all">
                                    Batal
                                </a>
                            </div>
                            <p class="text-xs text-slate-500 text-center mt-4">
                                Terakhir diupdate: <br>
                                <span class="font-mono text-slate-400">
                                    <?= !empty($activity['created_at']) ? date('d M Y, H:i', strtotime($activity['created_at'])) : '-' ?>
                                </span>
                            </p>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('placeholder-content');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('opacity-0');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>