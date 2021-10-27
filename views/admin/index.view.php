<h1 class="text-center">
    <?= $data['title'] ?>
</h1>
<pre>

</pre>
<section class="my-3 text-right">
    <a href="create.php">Create new term</a>
</section>

<table class="table table-striped">
    <?php foreach ($data['items'] as $item) : ?>
        <tr>
            <td>
                <a href="edit.php?key=<?= $item->term ?>">
                    Edit
                </a>
            </td>
            <td>
                <?= $item->term; ?>
            </td>
            <td>
                <?= $item->definition; ?>
            </td>
            <td>
                <a href="delete.php?key=<?= $item->term ?>">
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>