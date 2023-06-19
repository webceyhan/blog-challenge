<!-- login form -->
<section class="mx-auto w-25">
    <h1>Login</h1>

    <br><br>

    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" autofocus />
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" />
            
            <div id="emailHelp" class="form-text text-danger">
                <?= $error ?? '' ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</section>