<h1 class="text-center">
    <?= $view_bag['title'] ?>
</h1>

<form method="post">
    <section class="mb-3">
        <label for="term">Term</label>
        <input name="term" id="term" placeholder="">
    </section>
    <section class="mb-3">
        <label for="def">Definition</label>
        <textarea name="definition" id="def" placeholder=""> </textarea>
    </section>
    <section class="text-center">
        <button class="btn btn-primary ">Create</button>
    </section>

</form>