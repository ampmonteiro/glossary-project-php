<h1 class="text-center">
    <?= $view_bag['heading'] ?>
</h1>

<form>
    <section class="mb-3">
        <label for="search">Search term:</label>
        <input name="search" class="form-control" id="search" placeholder="">
    </section>
</form>

<table class="table table-striped">
    <?php foreach ($model as $item) : ?>
        <tr>
            <td>
                <a href="detail.php?term=<?= $item->id ?> ">
                    <?= $item->term; ?>
                </a>
            </td>
            <td>
                <?= $item->definition; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>