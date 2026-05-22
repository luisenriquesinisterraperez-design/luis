<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDriver $deliveryDriver
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Editar Repartidor</h1>
        <p class="text-orange-500 font-bold uppercase text-xs tracking-widest">Actualizar datos del equipo</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="bg-white p-8 rounded-3xl border border-orange-100 shadow-lg max-w-2xl">
    <?= $this->Form->create($deliveryDriver) ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Nombre</label>
                <?= $this->Form->control('name', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-slate-700']) ?>
            </div>
            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Apellido</label>
                <?= $this->Form->control('last_name', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-slate-700']) ?>
            </div>
        </div>
        
        <div class="mb-8">
            <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Celular / WhatsApp</label>
            <?= $this->Form->control('phone', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-slate-700']) ?>
        </div>

        <div class="pt-6 border-t border-slate-50 flex gap-4">
            <?= $this->Form->button(__('Guardar Cambios'), ['class' => 'flex-1 bg-slate-900 text-white font-black rounded-2xl py-4 uppercase shadow-lg hover:bg-slate-800 transition-all']) ?>
            <?= $this->Form->postLink(__('Dar de Baja'), ['action' => 'delete', $deliveryDriver->id], ['confirm' => __('¿Eliminar repartidor?'), 'class' => 'px-6 bg-red-50 text-red-500 font-bold rounded-2xl py-4 uppercase hover:bg-red-100 transition-all text-xs']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
