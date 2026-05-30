<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<header class="mb-8">
    <div class="flex items-center gap-4">
        <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i>', ['controller' => 'Products', 'action' => 'index'], ['escape' => false, 'class' => 'bg-slate-200 text-slate-600 w-10 h-10 rounded-xl flex items-center justify-center hover:bg-slate-300 transition-all']) ?>
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase italic">Salsas: <?= h($product->name) ?></h1>
            <p class="text-orange-500 font-bold uppercase text-xs tracking-widest">Gestiona los extras y opciones adicionales para este producto</p>
        </div>
    </div>
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-6">
        <!-- Tabla de salsas -->
        <div class="bg-white rounded-3xl border border-slate-200 overflow-x-auto shadow-sm">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-black text-slate-900 uppercase text-xs tracking-widest">
                    <i class="fa-solid fa-list-ul text-orange-500 mr-2"></i> Salsas / Extras del Producto
                </h3>
                <?php if (!empty($product->product_salsas)): ?>
                    <span class="bg-orange-100 text-orange-600 px-2 py-0.5 rounded-full text-[9px] font-black"><?= count($product->product_salsas) ?> items</span>
                <?php endif; ?>
            </div>
            <table class="w-full text-left">
                <thead class="bg-slate-900 text-white text-[9px] uppercase font-bold tracking-[0.2em]">
                    <tr>
                        <th class="p-5">Nombre</th>
                        <th class="p-5 text-center">Precio Adicional</th>
                        <th class="p-5 text-right">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm">
                    <?php if (empty($product->product_salsas)): ?>
                        <tr><td colspan="3" class="p-10 text-center">
                            <i class="fa-solid fa-bottle-droplet text-slate-200 text-3xl block mb-3"></i>
                            <span class="text-slate-400 font-black italic text-sm">Este producto no tiene salsas</span>
                            <p class="text-[10px] text-slate-300 mt-1">Usa el formulario de abajo para añadir opciones</p>
                        </td></tr>
                    <?php else: ?>
                        <?php foreach ($product->product_salsas as $salsa): ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-5">
                                <div class="font-black text-slate-800 uppercase text-xs"><?= h($salsa->name) ?></div>
                            </td>
                            <td class="p-5 text-center">
                                <span class="font-black <?= (float)$salsa->price > 0 ? 'text-green-600' : 'text-slate-400' ?> text-sm">
                                    <?php if ((float)$salsa->price > 0): ?>
                                        +$<?= number_format((float)$salsa->price, 0) ?>
                                    <?php else: ?>
                                        Gratis
                                    <?php endif; ?>
                                </span>
                            </td>
                            <td class="p-5 text-right">
                                <?= $this->Form->postLink('<i class="fa-solid fa-trash-alt"></i>', ['action' => 'delete', $salsa->id], ['confirm' => __('¿Eliminar "{0}"?', $salsa->name), 'escape' => false, 'class' => 'text-red-200 hover:text-red-600']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Formulario para añadir salsa -->
        <div class="bg-white p-6 rounded-3xl border-2 border-dashed border-orange-200 shadow-sm">
            <h3 class="text-xs font-black uppercase text-slate-400 mb-4 tracking-widest flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-orange-500"></i> Añadir Salsa / Extra
            </h3>
            <?= $this->Form->create(null, ['class' => 'grid grid-cols-1 md:grid-cols-11 gap-4 items-end']) ?>
                <div class="md:col-span-5">
                    <label class="text-[9px] font-black uppercase text-slate-400 ml-2 mb-1 block">Nombre del Extra</label>
                    <?= $this->Form->control('name', [
                        'label' => false,
                        'placeholder' => 'Ej: Con lubricante, Instalación...',
                        'class' => 'w-full p-3 bg-slate-50 border rounded-xl outline-none focus:ring-2 focus:ring-orange-500 font-bold text-xs'
                    ]) ?>
                </div>
                <div class="md:col-span-4">
                    <label class="text-[9px] font-black uppercase text-slate-400 ml-2 mb-1 block">Precio Adicional ($)</label>
                    <?= $this->Form->control('price', [
                        'label' => false,
                        'placeholder' => '0',
                        'default' => 0,
                        'class' => 'w-full p-3 bg-slate-50 border rounded-xl outline-none focus:ring-2 focus:ring-orange-500 font-black text-center text-xs'
                    ]) ?>
                </div>
                <div class="md:col-span-2">
                    <?= $this->Form->button(__('Añadir'), ['class' => 'w-full bg-orange-600 text-white font-black rounded-xl py-3.5 uppercase shadow-lg hover:bg-orange-700 transition-all text-[10px] tracking-widest']) ?>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <!-- Info / Tips -->
    <div class="space-y-6">
        <div class="bg-slate-900 p-8 rounded-[2.5rem] text-white shadow-2xl relative overflow-hidden">
            <h3 class="text-[10px] font-black uppercase opacity-50 mb-8 tracking-[0.2em] flex items-center gap-2">
                <i class="fa-solid fa-lightbulb text-orange-400"></i> Información
            </h3>
            
            <div class="space-y-6 relative z-10">
                <div class="bg-white/5 rounded-2xl p-5">
                    <i class="fa-solid fa-tag text-orange-400 text-lg block mb-3"></i>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-1">¿Qué son las Salsas?</h4>
                    <p class="text-[11px] text-slate-300 leading-relaxed">
                        Las salsas son opciones adicionales que el cliente puede elegir al comprar este producto.
                    </p>
                </div>
                
                <div class="bg-white/5 rounded-2xl p-5">
                    <i class="fa-solid fa-dollar-sign text-green-400 text-lg block mb-3"></i>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-1">Precio Adicional</h4>
                    <p class="text-[11px] text-slate-300 leading-relaxed">
                        Define un precio extra que se sumará al valor base del producto cuando el cliente seleccione esta opción.
                    </p>
                </div>

                <div class="bg-white/5 rounded-2xl p-5">
                    <i class="fa-solid fa-cart-shopping text-blue-400 text-lg block mb-3"></i>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-1">En Ventas</h4>
                    <p class="text-[11px] text-slate-300 leading-relaxed">
                        Al crear un pedido, podrás seleccionar las salsas disponibles para cada producto.
                    </p>
                </div>
            </div>
            
            <i class="fa-solid fa-bottle-droplet absolute -bottom-10 -right-10 text-[12rem] text-white/5 rotate-12"></i>
        </div>
    </div>
</div>
