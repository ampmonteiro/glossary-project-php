<h1 class="text-center">
    <?= $title; ?>
</h1>
<p>
    Are you sure you want to delete
    <strong>
        <?= $item->term; ?> ?
    </strong>
</p>
<form method="post">
    <input type="hidden" name="term" value="<?= $item->id; ?>">

    <section class="text-center">
        <button class="btn btn-warning">Delete</button>
    </section>

</form>