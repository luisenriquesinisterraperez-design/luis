<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adicionale $adicional
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Editar Adicional</h1>
        <p class="text-blue-600 font-bold uppercase text-xs tracking-widest">Modificar nombre o precio</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="max-w-lg mx-auto">
    <div class="bg-white p-8 rounded-3xl border border-blue-100 shadow-lg">
        <?= $this->Form->create($adicional) ?>
        <div class="mb-6">
            <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Nombre</label>
            <?= $this->Form->control('name', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-slate-700']) ?>
        </div>
        <div class="mb-8">
            <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Precio ($)</label>
            <?= $this->Form->control('price', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-blue-600']) ?>
        </div>
        <div class="flex gap-4 pt-6 border-t border-slate-50">
            <?= $this->Form->button(__('Guardar Cambios'), ['class' => 'flex-1 bg-blue-600 text-white font-black rounded-2xl py-4 uppercase shadow-lg hover:bg-blue-700 active:scale-95 transition-all']) ?>
            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $adicional->id], ['confirm' => __('¿Eliminar "{0}"?', $adicional->name), 'class' => 'px-6 bg-red-50 text-red-500 font-bold rounded-2xl py-4 uppercase hover:bg-red-100 transition-all text-xs']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
