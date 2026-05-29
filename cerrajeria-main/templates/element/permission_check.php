<?php
$color = $color ?? 'blue';
$bgClass = ($color === 'red') ? 'hover:border-red-300' : 'hover:border-blue-300';
$textClass = ($color === 'red') ? 'text-red-700' : 'text-slate-700';
$checkClass = ($color === 'red') ? 'text-red-600' : 'text-blue-600';
?>
<label class="flex items-center justify-between p-3 bg-white rounded-xl border border-slate-200 cursor-pointer <?= $bgClass ?> transition-all shadow-sm">
    <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center">
            <i class="fa-solid <?= $icon ?> text-slate-400 text-xs"></i>
        </div>
        <span class="text-[10px] font-black uppercase <?= $textClass ?>"><?= $label ?></span>
    </div>
    <?= $this->Form->checkbox($field, ['class' => "w-5 h-5 rounded-lg {$checkClass}"]) ?>
</label>
