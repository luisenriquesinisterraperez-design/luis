<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Nuevo Insumo</h1>
        <p class="text-blue-600 font-bold uppercase text-xs tracking-widest">Registrar materia prima en el sistema</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="bg-white p-8 rounded-[2rem] border border-blue-50 shadow-xl max-w-2xl">
    <?= $this->Form->create($ingredient) ?>
        <div class="space-y-6">
            <div>
                <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-[0.1em]">Nombre del Producto (Único)</label>
                <?= $this->Form->control('name', [
                    'label' => false, 
                    'placeholder' => 'Ej: Pan Hamburguesa, Carne Res...',
                    'class' => 'w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-slate-700'
                ]) ?>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-[0.1em]">Stock Inicial</label>
                    <?= $this->Form->control('stock', [
                        'label' => false, 
                        'placeholder' => '0.00',
                        'class' => 'w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-black text-slate-800 text-lg'
                    ]) ?>
                </div>
                <div>
                    <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-[0.1em]">Costo x Unidad ($)</label>
                    <?= $this->Form->control('cost', [
                        'label' => false, 
                        'placeholder' => '0.00',
                        'class' => 'w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-black text-blue-600 text-lg'
                    ]) ?>
                </div>
                <div>
                    <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-[0.1em]">Unidad de Medida</label>
                    <?= $this->Form->select('unit', [
                        'unidades' => 'Unidades (Und)',
                        'gr' => 'Gramos (Gr)',
                        'ml' => 'Mililitros (Ml)',
                        'lb' => 'Libras (Lb)',
                        'kg' => 'Kilos (Kg)',
                        'pq' => 'Paquetes (Pq)'
                    ], [
                        'class' => 'w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700'
                    ]) ?>
                </div>
            </div>

            <div class="p-4 bg-blue-50 rounded-2xl border border-blue-100">
                <p class="text-[10px] text-blue-700 font-bold leading-relaxed italic">
                    <i class="fa-solid fa-circle-info mr-1"></i> 
                    Una vez creado, podrás cargar más mercancía usando el botón rápido "+" en la lista de inventario.
                </p>
            </div>

            <div class="pt-6 border-t border-slate-50">
                <?= $this->Form->button(__('Registrar Producto'), [
                    'class' => 'w-full bg-slate-900 text-white font-black rounded-2xl py-5 uppercase shadow-lg hover:bg-blue-600 transition-all text-lg tracking-widest'
                ]) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
