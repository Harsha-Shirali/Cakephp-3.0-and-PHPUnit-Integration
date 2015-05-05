<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Bookmarks Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bookmarksTags index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('bookmark_id') ?></th>
            <th><?= $this->Paginator->sort('tag_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($bookmarksTags as $bookmarksTag): ?>
        <tr>
            <td>
                <?= $bookmarksTag->has('bookmark') ? $this->Html->link($bookmarksTag->bookmark->title, ['controller' => 'Bookmarks', 'action' => 'view', $bookmarksTag->bookmark->id]) : '' ?>
            </td>
            <td>
                <?= $bookmarksTag->has('tag') ? $this->Html->link($bookmarksTag->tag->title, ['controller' => 'Tags', 'action' => 'view', $bookmarksTag->tag->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $bookmarksTag->bookmark_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookmarksTag->bookmark_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookmarksTag->bookmark_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmarksTag->bookmark_id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
