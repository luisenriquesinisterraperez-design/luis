<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Flash->render() ?>

<?= $this->Form->create() ?>
<div class="space-y-6">
    <div>
        <div class="relative">
            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 text-lg">
                <i class="fa-solid fa-user"></i>
            </span>
            <?= $this->Form->control('username', [
                'label' => false,
                'placeholder' => 'Usuario',
                'class' => 'w-full pl-14 pr-5 py-4 bg-slate-100 border-2 border-transparent rounded-2xl outline-none focus:border-red-500 focus:bg-white transition-all text-slate-700 font-bold text-sm',
                'required' => true
            ]) ?>
        </div>
    </div>

    <div>
        <div class="relative">
            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 text-lg">
                <i class="fa-solid fa-lock"></i>
            </span>
            <?= $this->Form->control('password', [
                'label' => false,
                'placeholder' => 'Contraseña',
                'class' => 'w-full pl-14 pr-5 py-4 bg-slate-100 border-2 border-transparent rounded-2xl outline-none focus:border-red-500 focus:bg-white transition-all text-slate-700 font-bold text-sm',
                'required' => true,
                'type' => 'password'
            ]) ?>
        </div>
    </div>

    <div class="pt-2">
        <?= $this->Form->button('<i class="fa-solid fa-arrow-right-to-bracket mr-2"></i> ' . __('INGRESAR'), [
            'escape' => false,
            'class' => 'w-full bg-red-600 text-white py-4 rounded-2xl font-black text-sm hover:bg-red-700 shadow-lg shadow-red-600/30 active:scale-[0.98] transition-all uppercase tracking-widest'
        ]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
