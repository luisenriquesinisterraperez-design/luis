<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDriver $deliveryDriver
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Delivery Drivers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="deliveryDrivers form content">
            <?= $this->Form->create($deliveryDriver) ?>
            <fieldset>
                <legend><?= __('Add Delivery Driver') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('phone');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
