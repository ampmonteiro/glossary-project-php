<form method="post" class="w-50 mx-auto">
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password">
    </div>
    <div class="mt-4">
        <button class="btn btn-primary">login</button>
    </div>
</form>
<p>
    <?php

    if (isset($view_bag['status'])) {
        echo $view_bag['status'];
    }

    ?>
</p>