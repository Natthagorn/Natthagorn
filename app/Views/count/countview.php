<h2><?= esc($title) ?></h2>
<?php if (!empty($count) && is_array($count)) : ?>
    <?php foreach ($count as $count_item) : ?>
        <h3><?= esc('link path : ' . $count_item['link_path'] . ', short link : ' . $count_item['short_path']) ?></h3>
        <div class="main">
            <?= esc('times : ' . $count_item['times']) ?>
        </div>
    <?php endforeach; ?>
    <!-- <a href="/count/create">Go to create page</a> -->
    <hr>
<?php else : ?>
    <h3>NO link</h3>
    <p>Unable to find any link count for you.</p>
<?php endif; ?>