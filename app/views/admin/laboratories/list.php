<?php $title = 'Laboratories'; $adminLayout = true; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="admin-layout antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>
    
    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Laboratories</h1>
                    <p class="text-slate-400 text-sm mt-1">Manage computer laboratories and facilities.</p>
                </div>
                
                <a href="<?= url('/admin/laboratories/create') ?>" 
                   class="inline-flex items-center gap-2 bg-primary-500 hover:bg-primary-600 text-[#131218] text-sm font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-primary-500/30 transition-all transform hover:-translate-y-0.5 focus:ring-4 focus:ring-primary-500/20">
                    <i class="bi bi-plus-lg text-lg"></i>
                    <span>Add New Laboratory</span>
                </a>
            </div>
            
            <?php displayFlash(); ?>
            
            <div class="bg-[#1c1b22] border border-white/10 rounded-2xl shadow-sm overflow-hidden min-h-[600px] flex flex-col">
                
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-slate-400">
                        <thead class="text-xs text-slate-400 uppercase bg-white/5 border-b border-white/10">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Laboratory Name</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-1/3">Description</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Location</th>
                                <th scope="col" class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php if (!empty($laboratories)): ?>
                                <?php foreach ($laboratories as $lab): ?>
                                    <tr class="group hover:bg-white/5 transition-colors duration-200">
                                        
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-4">
                                                <div class="w-10 h-10 rounded-lg bg-blue-500/10 text-blue-400 flex items-center justify-center shrink-0 border border-blue-500/20">
                                                    <i class="bi bi-pc-display-horizontal text-xl"></i>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-white"><?= e($lab['lab_name']) ?></div>
                                                    <div class="text-xs text-slate-400 font-mono mt-0.5">ID: #<?= e($lab['id']) ?></div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-slate-400 line-clamp-2 leading-relaxed" title="<?= e($lab['description']) ?>">
                                                <?= e($lab['description']) ?: '<span class="text-slate-400 italic">No description provided</span>' ?>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2 text-slate-300 bg-[#131218] border border-white/10 px-3 py-1.5 rounded-lg w-fit">
                                                <i class="bi bi-geo-alt-fill text-rose-500 text-xs"></i>
                                                <span class="font-medium text-xs"><?= e($lab['location']) ?></span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-200">
                                                
                                                <a href="<?= url('/admin/laboratories/' . $lab['id'] . '/edit') ?>" 
                                                   class="w-8 h-8 flex items-center justify-center rounded-lg text-amber-400 bg-amber-500/10 hover:bg-amber-500/20 hover:scale-105 transition-all border border-transparent hover:border-amber-500/30"
                                                   title="Edit Laboratory">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <form method="POST" action="<?= url('/admin/laboratories/' . $lab['id'] . '/delete') ?>" onsubmit="return confirm('Are you sure you want to delete this laboratory? All associated data might be affected.')" class="inline">
                                                    <button type="submit" 
                                                            class="w-8 h-8 flex items-center justify-center rounded-lg text-rose-400 bg-rose-500/10 hover:bg-rose-500/20 hover:scale-105 transition-all border border-transparent hover:border-rose-500/30"
                                                            title="Delete Laboratory">
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
                                            <div class="w-20 h-20 bg-[#131218] rounded-full flex items-center justify-center text-slate-400 mb-4 border border-white/10">
                                                <i class="bi bi-building-slash text-3xl"></i>
                                            </div>
                                            <h3 class="text-lg font-semibold text-white">No Laboratories Found</h3>
                                            <p class="text-slate-400 max-w-sm mt-1 mb-6 text-sm">You haven't added any laboratories yet. Get started by adding one.</p>
                                            <a href="<?= url('/admin/laboratories/create') ?>" class="text-primary-500 hover:text-primary-400 font-medium hover:underline text-sm flex items-center gap-1">
                                                <i class="bi bi-plus-circle"></i> Add First Laboratory
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if (!empty($laboratories)): ?>
                <div class="mt-auto border-t border-white/10 bg-[#1c1b22] px-6 py-3 text-xs text-slate-400 flex justify-between items-center">
                    <span>Total Labs: <strong class="text-white"><?= count($laboratories) ?></strong></span>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>