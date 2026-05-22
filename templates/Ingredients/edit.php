<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
 */
?>
<header class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">Editar Insumo</h1>
        <p class="text-blue-600 font-bold uppercase text-xs tracking-widest">Actualizar parámetros de materia prima</p>
    </div>
    <?= $this->Html->link('<i class="fa-solid fa-arrow-left mr-2"></i> Volver', ['action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-slate-300 transition-all']) ?>
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Columna de Edición Principal -->
    <div class="lg:col-span-2">
        <div class="bg-white p-8 rounded-[2rem] border border-blue-50 shadow-xl">
            <h3 class="font-black text-slate-800 uppercase text-sm mb-6 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-blue-500"></i> Información General
            </h3>
            
            <?= $this->Form->create($ingredient) ?>
                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">Nombre del Insumo</label>
                        <?= $this->Form->control('name', [
                            'label' => false, 
                            'class' => 'w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-slate-700'
                        ]) ?>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">Stock Actual</label>
                            <?= $this->Form->control('stock', [
                                'label' => false, 
                                'class' => 'w-full p-4 bg-slate-100 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-black text-slate-500 text-lg',
                                'readonly' => !$isAdmin,
                                'title' => $isAdmin ? '' : 'Para ajustar el stock use el módulo de Ajustes de Inventario'
                            ]) ?>
                            <?php if (!$isAdmin): ?>
                                <p class="text-[9px] text-orange-500 font-bold mt-1 ml-2 italic">Solo lectura. Use Ajustes de Inventario.</p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">Costo x Unidad ($)</label>
                            <?= $this->Form->control('cost', [
                                'label' => false, 
                                'class' => 'w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 transition-all font-black text-blue-600 text-lg'
                            ]) ?>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-400 ml-2 uppercase tracking-widest">Unidad de Medida</label>
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

                    <div class="pt-6 border-t border-slate-50 flex gap-4">
                        <?= $this->Form->button(__('Actualizar Insumo'), [
                            'class' => 'flex-1 bg-slate-900 text-white font-black rounded-2xl py-4 uppercase shadow-lg hover:bg-blue-600 transition-all tracking-widest'
                        ]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $ingredient->id], [
                            'confirm' => __('¿Eliminar definitivamente este insumo?'),
                            'class' => 'px-8 bg-red-50 text-red-500 font-bold rounded-2xl py-4 uppercase hover:bg-red-100 transition-all text-xs'
                        ]) ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <!-- Columna de Uso en Recetas -->
    <div class="space-y-6">
        <div class="bg-slate-900 p-8 rounded-[2rem] text-white shadow-xl">
            <h3 class="text-xs font-black uppercase opacity-50 mb-6 tracking-widest flex items-center gap-2">
                <i class="fa-solid fa-utensils text-blue-400"></i> Uso en Menú
            </h3>
            
            <div class="space-y-4">
                <?php if (empty($ingredient->product_ingredients)): ?>
                    <p class="text-xs text-slate-400 italic">Este insumo no se está usando en ninguna receta actualmente.</p>
                <?php else: ?>
                    <?php foreach ($ingredient->product_ingredients as $pi): ?>
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/10 flex justify-between items-center">
                            <div>
                                <p class="text-xs font-black uppercase"><?= h($pi->product->name) ?></p>
                                <p class="text-[10px] text-blue-400 font-bold">Usa <?= number_format($pi->quantity_required, 2) ?> <?= $ingredient->unit ?></p>
                            </div>
                            <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['controller' => 'ProductIngredients', 'action' => 'recipe', $pi->product_id], ['escape' => false, 'class' => 'text-slate-500 hover:text-white transition-colors']) ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <div class="mt-8 pt-6 border-t border-white/10">
                <p class="text-[10px] text-slate-400 leading-relaxed italic">
                    Cada vez que vendas uno de estos productos, se descontará automáticamente la cantidad indicada del stock de <strong><?= h($ingredient->name) ?></strong>.
                </p>
            </div>
        </div>
    </div>
</div>
