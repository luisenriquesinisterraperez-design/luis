<?php
/**
 * @var \App\View\AppView $this
 * @var array $report
 * @var iterable $productsWithoutRecipe
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Reporte de Uso de Insumos</h1>
        <p class="text-orange-500 font-bold uppercase text-xs tracking-widest">Stock actual vs. usado en pedidos confirmados</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver al Dashboard', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-100 text-slate-600 px-6 py-3 rounded-2xl font-black text-xs uppercase hover:bg-slate-200 transition-all']) ?>
</header>

<?php if (!empty($productsWithoutRecipe)): ?>
<div class="bg-red-50 border-2 border-red-200 rounded-3xl p-6 mb-6">
    <div class="flex items-center gap-3 mb-3">
        <i class="fa-solid fa-triangle-exclamation text-red-500 text-xl"></i>
        <h3 class="font-black text-red-700 uppercase text-sm">Productos sin receta configurada</h3>
    </div>
    <p class="text-xs text-red-600 font-bold mb-3">
        Estos productos activos no tienen ingredientes asignados. No se descontará inventario al venderlos.
    </p>
    <div class="flex flex-wrap gap-2">
        <?php foreach ($productsWithoutRecipe as $p): ?>
            <span class="bg-white text-red-600 px-3 py-1.5 rounded-xl text-xs font-black border border-red-200">
                #<?= $p->id ?> <?= h($p->name) ?>
            </span>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<div class="bg-white rounded-3xl border border-slate-200 overflow-x-auto shadow-sm mb-6">
    <table class="w-full text-left">
        <thead class="bg-slate-900 text-white text-[9px] uppercase font-bold tracking-[0.2em]">
            <tr>
                <th class="p-5">Insumo</th>
                <th class="p-5 text-center">Stock Actual</th>
                <th class="p-5 text-center">Usado en Pedidos</th>
                <th class="p-5 text-center">Stock Restante</th>
                <th class="p-5 text-center">Unidad</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm">
            <?php if (empty($report)): ?>
                <tr><td colspan="5" class="p-10 text-center text-slate-400 italic">No hay insumos registrados</td></tr>
            <?php else: ?>
                <?php foreach ($report as $r): ?>
                <tr class="hover:bg-slate-50 transition-colors <?= $r['stock_restante'] < 0 ? 'bg-red-50' : '' ?>">
                    <td class="p-5">
                        <div class="font-black text-slate-800 uppercase text-xs"><?= h($r['name']) ?></div>
                    </td>
                    <td class="p-5 text-center font-black <?= $r['current_stock'] <= 0 ? 'text-red-600' : 'text-slate-800' ?>">
                        <?= number_format($r['current_stock'], 1) ?>
                    </td>
                    <td class="p-5 text-center font-bold text-orange-600">
                        <?= number_format($r['total_used'], 1) ?>
                    </td>
                    <td class="p-5 text-center font-black <?= $r['stock_restante'] < 0 ? 'text-red-600' : 'text-green-600' ?>">
                        <?= number_format($r['stock_restante'], 1) ?>
                    </td>
                    <td class="p-5 text-center text-slate-400 font-bold text-[10px] uppercase">
                        <?= h($r['unit']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
