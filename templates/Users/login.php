<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="min-h-screen bg-[#1a1a1a] flex items-center justify-center p-6">
    <div class="w-full max-w-sm">
        <!-- Logo -->
        <div class="text-center mb-10">
            <div class="bg-yellow-400 text-slate-900 w-24 h-24 flex items-center justify-center rounded-[2rem] mx-auto shadow-2xl shadow-yellow-400/30 mb-6">
                <i class="fa-solid fa-burger text-4xl"></i>
            </div>
            <h1 class="text-5xl font-black text-white uppercase tracking-tight leading-none">DAVIRAPID</h1>
            <p class="text-xs font-bold text-yellow-400 tracking-[0.3em] uppercase mt-3">Sistema de Gestión</p>
        </div>

        <!-- Tarjeta -->
        <div class="bg-white rounded-3xl shadow-[0_20px_60px_-12px_rgba(0,0,0,0.5)] overflow-hidden">
            <div class="p-8 pt-10">
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
            </div>
        </div>

        <div class="text-center mt-8">
            <p class="text-[10px] text-slate-600 font-bold tracking-widest">© <?= date('Y') ?> DAVIRAPID</p>
        </div>
    </div>
</div>
