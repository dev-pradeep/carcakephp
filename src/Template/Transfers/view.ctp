<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer $transfer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transfer'), ['action' => 'edit', $transfer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transfer'), ['action' => 'delete', $transfer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transfers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transfers view large-9 medium-8 columns content">
    <h3><?= h($transfer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $transfer->has('user') ? $this->Html->link($transfer->user->id, ['controller' => 'Users', 'action' => 'view', $transfer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transfer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($transfer->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transfer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($transfer->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($transfer->date) ?></td>
        </tr>
    </table>
</div>
