<?php include('../layout/header.php') ?>

<form class="w-50 p-3 mx-auto">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
               aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
            else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
               placeholder="Password">
    </div>
    <button value="Login" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include('../layout/footer.php') ?>

