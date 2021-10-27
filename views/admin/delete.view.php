<h1 class="text-center">
    <?= $data['title'] ?>
</h1>
<p>
    Are you sure you want to delete
    <strong>
        <?= $data['item']->term ?> ?
    </strong>
</p>
<form method="post">
    <input type="hidden" name="term" value="<?= $data['item']->term ?>">

    <section class="text-center">
        <button class="btn btn-warning">Delete</button>
    </section>

</form>