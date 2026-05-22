<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Editar Producto</h1>
        <p class="text-orange-500 font-bold uppercase text-xs tracking-widest">Actualizar información del menú</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="bg-white p-8 rounded-3xl border border-orange-100 shadow-lg">
    <?= $this->Form->create($product, ['type' => 'file']) ?>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-6">
            <div class="md:col-span-8">
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Nombre del Producto</label>
                <?= $this->Form->control('name', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-slate-700']) ?>
            </div>
            <div class="md:col-span-4">
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Precio ($)</label>
                <?= $this->Form->control('price', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-orange-600']) ?>
            </div>
        </div>
        
        <div class="mb-6">
            <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Descripción / Detalles</label>
            <?= $this->Form->control('description', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all']) ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase mb-2 block">Estado de Disponibilidad</label>
                <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-2xl border">
                    <span class="text-xs font-bold text-slate-600 uppercase">Disponible</span>
                    <label class="switch">
                        <?= $this->Form->checkbox('status', ['label' => false]) ?>
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Imagen (Opcional)</label>
                <?= $this->Form->file('image_file', ['class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all text-xs cursor-pointer']) ?>
            </div>
        </div>
        
        <div class="flex gap-4 pt-6 border-t border-slate-50">
            <?= $this->Form->button(__('Guardar Cambios'), ['class' => 'flex-1 bg-orange-600 text-white font-black rounded-2xl py-4 uppercase shadow-lg hover:bg-orange-700 active:scale-95 transition-all']) ?>
            <?= $this->Form->postLink(__('Eliminar Producto'), ['action' => 'delete', $product->id], ['confirm' => __('¿Estás seguro de eliminar este producto?'), 'class' => 'px-6 bg-red-50 text-red-500 font-bold rounded-2xl py-4 uppercase hover:bg-red-100 transition-all text-xs']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
