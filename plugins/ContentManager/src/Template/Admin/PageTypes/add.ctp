<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Page Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pageTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($pageType) ?>
    <fieldset>
        <legend><?= __('Add Page Type') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('layout');
            echo $this->Form->input('file_name',['label' => 'File Name (Do not inclued the .ctp extension)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
