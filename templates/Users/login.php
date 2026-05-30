<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Flash->render() ?>

<?= $this->Form->create() ?>
<div class="space-y-5">
    <!-- Barra amarilla superior -->
    <div class="bg-yellow-400 rounded-2xl p-4 -mx-2 -mt-2 mb-2">
        <p class="text-slate-900 font-black text-xs uppercase tracking-[0.2em] text-center">Acceso al Sistema</p>
    </div>

    <div>
        <div class="relative">
            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-yellow-500">
                <i class="fa-solid fa-user text-lg"></i>
            </span>
            <?= $this->Form->control('username', [
                'label' => false,
                'placeholder' => 'Usuario',
                'class' => 'w-full pl-14 pr-5 py-4 bg-white border-2 border-slate-200 rounded-2xl outline-none focus:border-yellow-400 transition-all text-slate-700 font-bold text-sm',
                'required' => true
            ]) ?>
        </div>
    </div>

    <div>
        <div class="relative">
            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-yellow-500">
                <i class="fa-solid fa-lock text-lg"></i>
            </span>
            <?= $this->Form->control('password', [
                'label' => false,
                'placeholder' => 'Contraseña',
                'class' => 'w-full pl-14 pr-5 py-4 bg-white border-2 border-slate-200 rounded-2xl outline-none focus:border-yellow-400 transition-all text-slate-700 font-bold text-sm',
                'required' => true,
                'type' => 'password'
            ]) ?>
        </div>
    </div>

    <div class="pt-2">
        <?= $this->Form->button('INGRESAR', [
            'class' => 'w-full bg-red-600 text-white py-4 rounded-2xl font-black text-sm hover:bg-yellow-400 hover:text-slate-900 shadow-lg active:scale-[0.98] transition-all uppercase tracking-[0.3em]'
        ]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
