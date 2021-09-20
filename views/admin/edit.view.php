<h1 class="text-center">
    <?= $view_bag['title'] ?>
</h1>

<form method="post">
    <input type="hidden" name="original-term" value="<?= $model->term ?>">
    <section class="mb-3">
        <label for="term">Term</label>
        <br>
        <input name="term" value="<?= $model->term ?>" id="term" placeholder="">
    </section>
    <!-- 
        white-space: pre-line to not show spaces before 
            when put textarea value in another line
    -->
    <section class="mb-3">
        <label for="def">Definition</label> <br>
        <textarea style="white-space:pre-line;" rows="5" cols="20" name="definition" id="def" placeholder="">
            <?= $model->definition ?>        
        </textarea>
    </section>
    <section class="text-center">
        <button class="btn btn-primary">Edit</button>
    </section>
</form>