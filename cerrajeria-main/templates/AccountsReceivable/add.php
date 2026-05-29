<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountsReceivable $accountsReceivable
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Nueva Deuda</h1>
        <p class="text-orange-500 font-bold uppercase text-xs tracking-widest">Registrar saldo pendiente</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="bg-white p-8 rounded-3xl border border-orange-100 shadow-lg max-w-2xl">
    <?= $this->Form->create($accountsReceivable) ?>
        <div class="space-y-6">
            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Cliente</label>
                <?= $this->Form->control('client_id', ['options' => $clients, 'label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-bold text-slate-700']) ?>
            </div>
            
            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Monto de la Deuda ($)</label>
                <?= $this->Form->control('amount', ['label' => false, 'placeholder' => '0.00', 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all font-black text-orange-600']) ?>
            </div>

            <div>
                <label class="text-[10px] font-bold text-slate-400 ml-2 uppercase">Descripción / Concepto</label>
                <?= $this->Form->control('description', ['label' => false, 'placeholder' => 'Ej: Almuerzo del lunes (Sin pagar)', 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-orange-500 transition-all']) ?>
            </div>

            <div class="pt-6 border-t border-slate-50">
                <?= $this->Form->button(__('Registrar Deuda'), ['class' => 'w-full bg-slate-900 text-white font-black rounded-2xl py-4 uppercase shadow-lg hover:bg-slate-800 transition-all tracking-widest']) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
