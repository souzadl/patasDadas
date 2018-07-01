<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!--<?= $this->Paginator->first(__('first')) ?>-->
        <?= $this->Paginator->prev(__('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next')) ?>
        <!--<?= $this->Paginator->last(__('last')) ?>-->
    </ul>
</nav>