<h1 class="text-center">
    <?= $view_bag['title'] ?>
</h1>

<form class="w-50 mx-md-auto mt-3" method="post">
    <section class="form-floating mb-3">
        <input class="form-control" name="term" id="term" placeholder="">
        <label for="term">Term</label>
    </section>

    <section class="form-floating my-3">
        <textarea class="form-control h-50" style="white-space:pre-line;" name="definition" id="def" placeholder=""></textarea>
        <label for="def">Definition</label>
    </section>

    <section class="w-100 text-center">
        <button class="btn btn-primary ">Create</button>
    </section>
</form>