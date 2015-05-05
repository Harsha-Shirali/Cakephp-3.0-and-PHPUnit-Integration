<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Bookmarks Tag'), ['action' => 'edit', $bookmarksTag->bookmark_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookmarks Tag'), ['action' => 'delete', $bookmarksTag->bookmark_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmarksTag->bookmark_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmarks Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bookmarksTags view large-10 medium-9 columns">
    <h2><?= h($bookmarksTag->bookmark_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Bookmark') ?></h6>
            <p><?= $bookmarksTag->has('bookmark') ? $this->Html->link($bookmarksTag->bookmark->title, ['controller' => 'Bookmarks', 'action' => 'view', $bookmarksTag->bookmark->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Tag') ?></h6>
            <p><?= $bookmarksTag->has('tag') ? $this->Html->link($bookmarksTag->tag->title, ['controller' => 'Tags', 'action' => 'view', $bookmarksTag->tag->id]) : '' ?></p>
        </div>
    </div>
</div>
