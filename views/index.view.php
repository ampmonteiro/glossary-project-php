<h1 class="text-center">
    <?= $data['heading'] ?>
</h1>
hash:
<?php


$pwd = password_hash('123', PASSWORD_DEFAULT);

echo $pwd . '<br>';

$rs = password_verify('123', $pwd);

var_dump($rs);
?>

<form>
    <section class="form-floating mb-3">
        <input name="search" class="form-control" id="search" placeholder="">
        <label for="search">Search term</label>
    </section>
</form>

<table class="table table-striped">
    <?php foreach ($data['items'] as $item) : ?>
        <tr>
            <td>
                <a href="detail.php?term=<?= $item->term ?> ">
                    <?= $item->term; ?>
                </a>
            </td>
            <td>
                <?= $item->definition; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>