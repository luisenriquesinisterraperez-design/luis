<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Editar Cliente</h1>
        <p class="text-orange-500 font-bold uppercase text-xs tracking-widest">Actualizar información de contacto</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="bg-white p-8 rounded-3xl border border-orange-100 shadow-lg max-w-3xl">
    <?= $this->Form->create($client) ?>
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Nombre Completo</label>
                    <?= $this->Form->control('full_name', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-slate-700']) ?>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Celular / Teléfono</label>
                    <?= $this->Form->control('phone', ['label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-slate-700']) ?>
                </div>
            </div>
            
            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Dirección de Entrega</label>
                <?= $this->Form->control('address', ['label' => false, 'placeholder' => 'Calle, Número, Barrio...', 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all']) ?>
            </div>

            <div class="pt-6 border-t border-slate-50 flex gap-4">
                <?= $this->Form->button(__('Guardar Cambios'), ['class' => 'flex-1 bg-slate-900 text-white font-black rounded-2xl py-4 uppercase shadow-lg hover:bg-slate-800 transition-all']) ?>
                <?= $this->Form->postLink(__('Eliminar Cliente'), ['action' => 'delete', $client->id], ['confirm' => __('¿Eliminar este cliente definitivamente?'), 'class' => 'px-6 bg-red-50 text-red-500 font-bold rounded-2xl py-4 uppercase hover:bg-red-100 transition-all text-xs']) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
