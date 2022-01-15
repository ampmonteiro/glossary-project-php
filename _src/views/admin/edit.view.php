<h1 class="text-center">
    <?= $title; ?>
</h1>

<form class="w-50 mx-md-auto mt-3" method="post">
    <input type="hidden" name="original-term" value="<?= $item->id; ?>">

    <section class="form-floating mb-3">
        <input class="form-control" name="term" value="<?= $item->term; ?>" id="term" placeholder="">
        <label for="term">Term</label>
    </section>
    <!-- 
        white-space: pre-line to not show spaces before 
            when put textarea value in another line
    -->
    <section class="form-floating mb-3">
        <textarea class="form-control h-50" style="white-space:pre-line;" name="definition" id="def" placeholder=""><?= trim($item->definition); ?></textarea>
        <label for="def">Definition</label> <br>
    </section>

    <section class="w-100 text-center">
        <button class="btn btn-primary p-3 text-center">Save</button>
    </section>

</form>