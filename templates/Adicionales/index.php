<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Adicionale> $adicionales
 */
?>
<header class="mb-8">
    <div class="flex items-center gap-4">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase italic">Adicionales</h1>
            <p class="text-blue-600 font-bold uppercase text-xs tracking-widest">Extras y opciones con precio configurable</p>
        </div>
    </div>
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-3xl border border-slate-200 overflow-x-auto shadow-sm">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-black text-slate-900 uppercase text-xs tracking-widest">
                    <i class="fa-solid fa-list-ul text-blue-600 mr-2"></i> Lista de Adicionales
                </h3>
                <?php if (!empty($adicionales)): ?>
                    <span class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full text-[9px] font-black"><?= count($adicionales) ?> items</span>
                <?php endif; ?>
            </div>
            <table class="w-full text-left">
                <thead class="bg-slate-900 text-white text-[9px] uppercase font-bold tracking-[0.2em]">
                    <tr>
                        <th class="p-5">Nombre</th>
                        <th class="p-5 text-center">Precio</th>
                        <th class="p-5 text-right">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm">
                    <?php if (empty($adicionales)): ?>
                        <tr><td colspan="3" class="p-10 text-center">
                            <i class="fa-solid fa-box text-slate-200 text-3xl block mb-3"></i>
                            <span class="text-slate-400 font-black italic text-sm">No hay adicionales configurados</span>
                            <p class="text-[10px] text-slate-300 mt-1">Usa el formulario de la derecha para crear uno</p>
                        </td></tr>
                    <?php else: ?>
                        <?php foreach ($adicionales as $a): ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-5">
                                <div class="font-black text-slate-800 uppercase text-xs"><?= h($a->name) ?></div>
                            </td>
                            <td class="p-5 text-center">
                                <span class="font-black <?= (float)$a->price > 0 ? 'text-green-600' : 'text-slate-400' ?> text-sm">
                                    <?php if ((float)$a->price > 0): ?>
                                        $<?= number_format((float)$a->price, 0) ?>
                                    <?php else: ?>
                                        Gratis
                                    <?php endif; ?>
                                </span>
                            </td>
                            <td class="p-5 text-right">
                                <?= $this->Html->link('<i class="fa-solid fa-pen"></i>', ['action' => 'edit', $a->id], ['escape' => false, 'class' => 'text-blue-400 hover:text-blue-600 mr-3']) ?>
                                <?= $this->Form->postLink('<i class="fa-solid fa-trash-alt"></i>', ['action' => 'delete', $a->id], ['confirm' => __('¿Eliminar "{0}"?', $a->name), 'escape' => false, 'class' => 'text-red-200 hover:text-red-600']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white p-6 rounded-3xl border-2 border-dashed border-blue-200 shadow-sm">
            <h3 class="text-xs font-black uppercase text-slate-400 mb-4 tracking-widest flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-blue-500"></i> Nuevo Adicional
            </h3>
            <?= $this->Form->create(null, ['class' => 'space-y-4']) ?>
                <div>
                    <label class="text-[9px] font-black uppercase text-slate-400 ml-2 mb-1 block">Nombre</label>
                    <?= $this->Form->control('name', [
                        'label' => false,
                        'placeholder' => 'Ej: Lubricante, Instalación...',
                        'class' => 'w-full p-3 bg-slate-50 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-xs'
                    ]) ?>
                </div>
                <div>
                    <label class="text-[9px] font-black uppercase text-slate-400 ml-2 mb-1 block">Precio ($)</label>
                    <?= $this->Form->control('price', [
                        'label' => false,
                        'placeholder' => '0',
                        'default' => 0,
                        'class' => 'w-full p-3 bg-slate-50 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-black text-center text-xs'
                    ]) ?>
                </div>
                <?= $this->Form->button(__('Guardar'), ['class' => 'w-full bg-blue-600 text-white font-black rounded-xl py-3.5 uppercase shadow-lg hover:bg-blue-700 transition-all text-[10px] tracking-widest']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
