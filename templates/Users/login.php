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

    <div class="flex items-center bg-white border-2 border-slate-200 rounded-2xl focus-within:border-yellow-400 transition-all">
        <span class="pl-5 pr-3 text-yellow-500">
            <i class="fa-solid fa-user text-lg"></i>
        </span>
        <?= $this->Form->text('username', [
            'placeholder' => 'Usuario',
            'class' => 'flex-1 py-4 pr-5 bg-transparent border-none outline-none text-slate-700 font-bold text-sm shadow-none',
            'required' => true
        ]) ?>
    </div>

    <div class="flex items-center bg-white border-2 border-slate-200 rounded-2xl focus-within:border-yellow-400 transition-all">
        <span class="pl-5 pr-3 text-yellow-500">
            <i class="fa-solid fa-lock text-lg"></i>
        </span>
        <?= $this->Form->password('password', [
            'placeholder' => 'Contraseña',
            'class' => 'flex-1 py-4 pr-5 bg-transparent border-none outline-none text-slate-700 font-bold text-sm shadow-none',
            'required' => true
        ]) ?>
    </div>

    <div class="pt-2">
        <?= $this->Form->button('INGRESAR', [
            'class' => 'w-full bg-red-600 text-white py-4 rounded-2xl font-black text-sm hover:bg-yellow-400 hover:text-slate-900 shadow-lg active:scale-[0.98] transition-all uppercase tracking-[0.3em]'
        ]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
