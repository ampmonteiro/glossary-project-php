<h1 class="text-center">
    <?= $view_bag['title'] ?>
</h1>
<p>
    Are you sure you want to delete
    <strong>
        <?= $model->term ?> ?
    </strong>
</p>
<form method="post">
    <input type="hidden" name="term" value="<?= $model->id ?>">

    <section class="text-center">
        <button class="btn btn-warning">Delete</button>
    </section>

</form>