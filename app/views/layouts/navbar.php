<?php
$basePath = rtrim(parse_url(BASE_URL, PHP_URL_PATH), '/');
?>
<nav
    class="fixed bottom-4 md:bottom-6 inset-x-4 sm:inset-x-6 lg:left-1/2 lg:-translate-x-1/2 lg:inset-x-auto lg:w-full lg:max-w-5xl z-50 bg-brand-black/90 backdrop-blur-2xl border border-white/10 rounded-2xl shadow-2xl shadow-black/40 transition-all duration-300">
    <div class="relative flex flex-wrap items-center justify-between mx-auto px-4 md:px-6 py-3">

        <a href="<?= url('/') ?>" class="flex items-center gap-2 group">
            <img src="<?= url('/assets/images/LogoFikom_kuning.png') ?>" alt="Logo FIKOM"
                class="h-8 w-auto object-contain group-hover:scale-105 transition-transform duration-300">

            <span
                class="self-center text-lg font-extrabold tracking-tight text-white group-hover:text-brand-yellow transition-colors">
            
            </span>
        </a>

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            <?php if (isLoggedIn()): ?>
                <div class="flex items-center gap-4">
                    <div class="hidden md:block text-right">
                        <span
                            class="block text-sm font-bold text-white"><?= e(explode(' ', $_SESSION['user_name'] ?? 'User')[0]) ?></span>
                        <span
                            class="block text-[10px] font-bold uppercase tracking-wider text-brand-yellow"><?= getUserRole() ?></span>
                    </div>

                    <button type="button"
                        class="flex text-sm bg-brand-yellow rounded-full md:me-0 focus:ring-4 focus:ring-brand-yellow/30 transition-transform hover:scale-105"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="top">
                        <span class="sr-only">Open user menu</span>
                        <div
                            class="w-9 h-9 rounded-full bg-brand-yellow flex items-center justify-center text-brand-black font-bold border-2 border-brand-black shadow-sm">
                            <?= strtoupper(substr($_SESSION['user_name'] ?? 'U', 0, 1)) ?>
                        </div>
                    </button>
                </div>

                <div class="z-50 hidden mb-4 text-base list-none bg-brand-black/95 divide-y divide-white/10 rounded-xl shadow-xl border border-white/10 min-w-[200px]"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span
                            class="block text-sm text-white font-bold"><?= e($_SESSION['user_name'] ?? 'User') ?></span>
                        <span class="block text-xs text-slate-400 truncate"><?= e($_SESSION['user_email'] ?? '') ?></span>
                    </div>

                    <?php if (getUserRole() == 'admin'): ?>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="<?= url('/admin/dashboard') ?>"
                                    class="block px-4 py-2 text-sm text-white hover:bg-brand-yellow/10 font-bold">
                                    <i class="bi bi-speedometer2 me-2"></i> Ke Dashboard Admin
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>

                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="<?= url('/logout') ?>"
                                class="block px-4 py-2 text-sm text-rose-400 hover:bg-rose-950/20 font-medium">
                                <i class="bi bi-box-arrow-right me-2"></i> Sign out
                            </a>
                        </li>
                    </ul>
                </div>

            <?php endif; ?>

            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-brand-yellow rounded-lg md:hidden hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-brand-yellow/30 ms-2"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-3 font-medium border border-white/10 rounded-xl bg-brand-black/95 md:space-x-6 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">

                <li>
                    <a href="<?= url('/') ?>"
                        class="block py-2 px-3 rounded md:p-0 transition-colors <?= (($_SERVER['REQUEST_URI'] ?? '') == $basePath . '/' || ($_SERVER['REQUEST_URI'] ?? '') == $basePath . '/home') ? 'text-brand-yellow font-bold' : 'text-slate-300 hover:text-brand-yellow' ?>">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= url('/schedule') ?>"
                        class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/schedule') !== false ? 'text-brand-yellow font-bold' : 'text-slate-300 hover:text-brand-yellow' ?>">
                        Jadwal Kuliah
                    </a>
                </li>
                <li>
                    <a href="<?= url('/presence') ?>"
                        class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/presence') !== false ? 'text-brand-yellow font-bold' : 'text-slate-300 hover:text-brand-yellow' ?>">
                        Struktur Senat
                    </a>
                </li>
                <li>
                    <a href="<?= url('/activities') ?>"
                        class="block py-2 px-3 rounded md:p-0 transition-colors <?= (strpos($_SERVER['REQUEST_URI'] ?? '', '/activities') !== false && strpos($_SERVER['REQUEST_URI'] ?? '', '/koordinator/activities') === false && strpos($_SERVER['REQUEST_URI'] ?? '', '/asisten/activities') === false && strpos($_SERVER['REQUEST_URI'] ?? '', '/admin/activities') === false) ? 'text-brand-yellow font-bold' : 'text-slate-300 hover:text-brand-yellow' ?>">
                        Kegiatan
                    </a>
                </li>

                <?php if (isLoggedIn()): ?>
                    <?php $role = getUserRole(); ?>

                    <?php if ($role == 'koordinator'): ?>
                        <li class="hidden md:block w-px h-5 bg-white/20 mx-2"></li>
                        <li>
                            <a href="<?= url('/koordinator/assistant-schedules') ?>"
                                class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/koordinator/assistant-schedules') !== false ? 'text-amber-400 font-bold' : 'text-amber-400 hover:text-amber-300 font-medium' ?>">
                                Piket
                            </a>
                        </li>
                        <li>
                            <a href="<?= url('/koordinator/laboratories') ?>"
                                class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/koordinator/laboratories') !== false ? 'text-amber-400 font-bold' : 'text-amber-400 hover:text-amber-300 font-medium' ?>">
                                Data Lab
                            </a>
                        </li>
                        <li>
                            <a href="<?= url('/koordinator/problems') ?>"
                                class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/koordinator/problems') !== false ? 'text-amber-400 font-bold' : 'text-amber-400 hover:text-amber-300 font-medium' ?>">
                                Permasalahan
                            </a>
                        </li>
                        <li>
                            <a href="<?= url('/koordinator/activities') ?>"
                                class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/koordinator/activities') !== false ? 'text-amber-400 font-bold' : 'text-amber-400 hover:text-amber-300 font-medium' ?>">
                                Kegiatan
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($role == 'asisten'): ?>
                        <li class="hidden md:block w-px h-5 bg-white/20 mx-1"></li>

                        <li>
                            <a href="<?= url('/asisten/jobdesk') ?>"
                                class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/jobdesk') !== false ? 'text-emerald-400 font-bold' : 'text-slate-300 hover:text-emerald-400' ?>">
                                <i class="bi bi-briefcase mr-1"></i> Jobdesk
                            </a>
                        </li>
                        <li>
                            <a href="<?= url('/asisten/problems') ?>"
                                class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/problems') !== false ? 'text-emerald-400 font-bold' : 'text-slate-300 hover:text-emerald-400' ?>">
                                Masalah Lab
                            </a>
                        </li>
                        <li>
                            <a href="<?= url('/asisten/assistant-schedules') ?>"
                                class="block py-2 px-3 rounded md:p-0 transition-colors <?= strpos($_SERVER['REQUEST_URI'] ?? '', '/assistant-schedules') !== false ? 'text-emerald-400 font-bold' : 'text-slate-300 hover:text-emerald-400' ?>">
                                Jadwal Piket
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($role == 'admin'): ?>
                        <li class="hidden md:block w-px h-5 bg-white/20 mx-1"></li>
                        <li>
                            <a href="<?= url('/admin/dashboard') ?>"
                                class="block py-2 px-3 rounded md:p-0 text-brand-black bg-brand-yellow hover:bg-yellow-400 md:bg-brand-yellow md:hover:bg-yellow-400 font-bold transition-colors">
                                <i class="bi bi-shield-lock-fill mr-1"></i> ADMIN PANEL
                            </a>
                        </li>
                    <?php endif; ?>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>