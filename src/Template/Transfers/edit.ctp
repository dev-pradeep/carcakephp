<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer $transfer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transfer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transfers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transfers form large-9 medium-8 columns content">
    <?= $this->Form->create($transfer) ?>
    <fieldset>
        <legend><?= __('Edit Transfer') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('amount');
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
