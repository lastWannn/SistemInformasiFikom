<?php $title = 'Tambah Kegiatan'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto">

            <div class="flex items-center gap-4 mb-8">
                <a href="<?= url('/admin/activities') ?>"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#1c1b22] border border-white/10 text-slate-400 hover:text-primary-500 hover:border-primary-500 shadow-sm transition-all"
                    title="Kembali ke Daftar">
                    <i class="bi bi-arrow-left text-lg"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Posting Kegiatan Baru</h1>
                    <p class="text-slate-400 text-sm mt-1">Buat artikel berita atau jadwal kegiatan baru.</p>
                </div>
            </div>

            <?php displayFlash(); ?>

            <form method="POST" action="<?= url('/admin/activities/create') ?>" enctype="multipart/form-data">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-lg font-semibold text-white mb-5 pb-4 border-b border-white/5">
                                <i class="bi bi-text-paragraph mr-2 text-primary-500"></i>Konten Utama
                            </h2>

                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-semibold text-white">Judul Kegiatan <span
                                        class="text-rose-500">*</span></label>
                                <input type="text" name="title"
                                    class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all placeholder:text-slate-500"
                                    placeholder="Contoh: Kunjungan Industri ke Jakarta 2024" required>
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
                                        class="w-full ps-11 p-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all font-mono text-xs sm:text-sm placeholder:text-slate-500"
                                        placeholder="https://fikom.umi.ac.id/berita/..." required>
                                </div>
                                <p class="mt-2 text-xs text-slate-400">Masukkan tautan lengkap ke halaman berita atau
                                    blog terkait.</p>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-white">Deskripsi Singkat</label>
                                <textarea name="description" rows="4"
                                    class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all resize-none placeholder:text-slate-500"
                                    placeholder="Tuliskan ringkasan singkat (teaser) untuk ditampilkan di halaman depan dashboard..."></textarea>
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
                                                <option value="news">Berita & Informasi</option>
                                                <option value="announcement">Pengumuman Penting</option>
                                                <option value="achievement">Prestasi & Penghargaan</option>
                                            </optgroup>

                                            <optgroup label="Akademik & Kegiatan">
                                                <option value="praktikum">Praktikum</option>
                                                <option value="seminar">Seminar / Workshop</option>
                                                <option value="lomba">Lomba / Kompetisi</option>
                                                <option value="event">Event / Acara Lab</option>
                                            </optgroup>

                                            <optgroup label="Administrasi">
                                                <option value="recruitment">Open Recruitment</option>
                                                <option value="collaboration">Kerjasama</option>
                                                <option value="other">Lainnya</option>
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
                                            <option value="published" selected>Published (Tayang)</option>
                                            <option value="draft">Draft (Simpan Dulu)</option>
                                            <option value="cancelled">Cancelled (Batal)</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-slate-700">Tanggal
                                        Posting</label>
                                    <input type="date" name="activity_date"
                                        class="w-full px-4 py-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1 space-y-6">

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10">
                            <h2 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Media Gambar
                            </h2>

                            <div class="mb-2">
                                <label
                                    class="flex flex-col items-center justify-center w-full h-48 border-2 border-primary-500/20 border-dashed rounded-xl cursor-pointer bg-primary-500/5 hover:bg-primary-500/10 hover:border-primary-500/40 transition-all group overflow-hidden relative"
                                    id="drop-zone">

                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4"
                                        id="placeholder-content">
                                        <div
                                            class="w-12 h-12 bg-primary-500/10 text-primary-500 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                            <i class="bi bi-cloud-arrow-up text-2xl"></i>
                                        </div>
                                        <p class="mb-1 text-sm font-semibold text-white">Upload Thumbnail</p>
                                        <p class="text-xs text-slate-400">Klik untuk memilih atau drag gambar ke
                                            sini.
                                        </p>
                                    </div>

                                    <img id="image-preview"
                                        class="hidden w-full h-full object-cover absolute inset-0" />

                                    <input name="image_cover_file" type="file" class="hidden" accept="image/*"
                                        onchange="previewImage(this)" />
                                </label>
                            </div>
                            <p class="text-[10px] text-slate-400 text-center">Format: JPG, PNG, WEBP (Max. 2MB)</p>
                        </div>

                        <div class="bg-[#1c1b22] p-6 rounded-2xl shadow-sm border border-white/10 sticky top-4">
                            <h2 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Publikasi
                            </h2>

                            <div class="flex flex-col gap-3">
                                <button type="submit"
                                    class="w-full text-[#131218] bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-500/20 font-bold rounded-xl text-sm px-5 py-3 transition-all shadow-lg shadow-primary-500/30 flex justify-center items-center gap-2 group">
                                    <span>Terbitkan</span>
                                    <i class="bi bi-send group-hover:translate-x-1 transition-transform"></i>
                                </button>

                                <a href="<?= url('/admin/activities') ?>"
                                    class="w-full text-slate-300 bg-[#131218] border border-white/10 hover:bg-[#1c1b22] hover:text-white focus:ring-4 focus:ring-white/5 font-medium rounded-xl text-sm px-5 py-3 text-center transition-all">
                                    Batal
                                </a>
                            </div>
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
                placeholder.classList.add('opacity-0'); // Sembunyikan text placeholder
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>