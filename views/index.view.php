<h1 class="text-center">
    <?= $heading ?>
</h1>

<form>
    <section class="form-floating mb-3">
        <input name="search" class="form-control" id="search" placeholder="">
        <label for="search">Search term</label>
    </section>
</form>

<table class="table table-striped">
    <?php foreach ($items as $item) : ?>
        <tr>
            <td>
                <a href="/detail?term=<?= $item['term'] ?> ">
                    <?= $item['term']; ?>
                </a>
            </td>
            <td>
                <?= $item['definition']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>