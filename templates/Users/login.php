<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="min-h-screen bg-[#1a1a1a] flex items-center justify-center p-6 relative overflow-hidden">
    <!-- Línea superior roja -->
    <div class="absolute top-0 left-0 w-full h-1.5 bg-red-600"></div>

    <div class="w-full max-w-sm relative">
        <!-- Logo y marca -->
        <div class="text-center mb-10">
            <div class="bg-yellow-400 text-slate-900 w-20 h-20 flex items-center justify-center rounded-2xl mx-auto shadow-2xl shadow-yellow-400/30 mb-6 transform -rotate-6">
                <i class="fa-solid fa-burger text-3xl"></i>
            </div>
            <h1 class="text-4xl font-black text-white uppercase tracking-tight leading-none">DAVIRAPID<span class="text-yellow-400">.</span></h1>
            <p class="text-[10px] font-bold text-red-400 tracking-[0.4em] uppercase mt-3">Sistema de Gestión</p>
        </div>

        <!-- Tarjeta blanca -->
        <div class="bg-white rounded-2xl shadow-2xl shadow-black/40 overflow-hidden">
            <div class="h-1 bg-gradient-to-r from-red-600 via-yellow-400 to-red-600"></div>
            <div class="p-8">
                <?= $this->Flash->render() ?>

                <?= $this->Form->create() ?>
                <div class="space-y-5">
                    <div>
                        <label class="text-[10px] font-bold text-slate-400 uppercase ml-1 mb-2 block tracking-wider">Usuario</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <?= $this->Form->control('username', [
                                'label' => false,
                                'placeholder' => 'Ingrese su usuario',
                                'class' => 'w-full pl-11 p-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all text-slate-700 font-bold text-sm',
                                'required' => true
                            ]) ?>
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-bold text-slate-400 uppercase ml-1 mb-2 block tracking-wider">Contraseña</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <?= $this->Form->control('password', [
                                'label' => false,
                                'placeholder' => 'Ingrese su contraseña',
                                'class' => 'w-full pl-11 p-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all text-slate-700 font-bold text-sm',
                                'required' => true,
                                'type' => 'password'
                            ]) ?>
                        </div>
                    </div>

                    <div class="pt-2">
                        <?= $this->Form->button(__('ENTRAR'), [
                            'class' => 'w-full bg-red-600 text-white py-4 rounded-xl font-black hover:bg-yellow-400 hover:text-slate-900 shadow-lg shadow-red-600/30 active:scale-[0.98] transition-all uppercase tracking-widest text-sm'
                        ]) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>

        <div class="text-center mt-8">
            <p class="text-[9px] text-slate-600 font-bold uppercase tracking-widest">© <?= date('Y') ?> DAVIRAPID</p>
        </div>
    </div>
</div>
