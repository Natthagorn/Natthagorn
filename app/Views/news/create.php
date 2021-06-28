<h2><?= esc($title) ?></h2>
<?= \Config\Services::validation()->listErrors() ?>
<a href="/news">Go Back</a>
<hr>
<form action="/news/create" method="post">
    <?= csrf_field() ?>
    <label for="title">Title</label>
    <input type="input" name="title">
    <br>
    <label for="body">Text</label>
    <textarea name="body" id="" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" name="submit" value="Create news item">
</form>