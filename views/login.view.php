<form method="post" class="w-50 mx-auto card card-body">
    <div class="form-floating mb-3">
        <input class="form-control" id="email" name="email" placeholder="">
        <label for="email">Email</label>
    </div>
    <div class="form-floating ">
        <input class="form-control" type="password" id="password" name="password" placeholder="">
        <label for="password">Password</label>
    </div>

    <button class="btn btn-primary mt-4 text-center w-100 p-3">login</button>

</form>
<p>
    <?php

    if (isset($view_bag['status'])) {
        echo $view_bag['status'];
    }

    ?>
</p>