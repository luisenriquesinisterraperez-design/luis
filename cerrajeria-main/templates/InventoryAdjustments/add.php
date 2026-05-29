<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryAdjustment $inventoryAdjustment
 * @var \Cake\Collection\CollectionInterface|string[] $ingredients
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Nuevo Movimiento</h1>
        <p class="text-blue-600 font-bold uppercase text-xs tracking-widest">Registrar baja o ajuste de stock</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="bg-white p-8 rounded-3xl border border-blue-50 shadow-lg max-w-2xl">
    <?= $this->Form->create($inventoryAdjustment) ?>
        <div class="space-y-6">
            <div>
                <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">1. Seleccionar Insumo</label>
                <?= $this->Form->control('ingredient_id', ['options' => $ingredients, 'label' => false, 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-slate-700']) ?>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">2. Tipo de Movimiento</label>
                    <?= $this->Form->select('type', [
                        'baja' => 'SALIDA (Dañado/Vencido) 📉',
                        'ajuste' => 'ENTRADA (Ajuste/Carga) 📈'
                    ], ['class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-black text-xs uppercase']) ?>
                </div>
                <div>
                    <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">3. Cantidad</label>
                    <?= $this->Form->control('quantity', ['label' => false, 'placeholder' => '0.00', 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-black text-slate-800 text-lg']) ?>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">4. Motivo / Razón</label>
                <?= $this->Form->select('reason', [
                    'Vencido' => 'Vencimiento 📅',
                    'Dañado' => 'Mal estado / Dañado ❌',
                    'Robo' => 'Faltante / Robo 🕵️',
                    'Error' => 'Error de conteo ✏️',
                    'Consumo' => 'Consumo interno 🍔',
                    'Ajuste' => 'Ajuste de inventario ⚙️'
                ], ['class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700']) ?>
            </div>

            <div>
                <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">5. Observaciones Adicionales</label>
                <?= $this->Form->control('observations', ['label' => false, 'placeholder' => 'Detalla lo ocurrido...', 'class' => 'w-full p-4 bg-slate-50 border rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all']) ?>
            </div>

            <div class="pt-6 border-t border-slate-50">
                <?= $this->Form->button(__('Confirmar Movimiento'), ['class' => 'w-full bg-slate-900 text-white font-black rounded-2xl py-5 uppercase shadow-lg hover:bg-blue-600 transition-all text-lg tracking-widest']) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
