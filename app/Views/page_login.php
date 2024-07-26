<div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <h4>Đăng nhập</h4>
                    <div class="mb-3">
                      <label for="Email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="Email">
                    </div>
                    <div class="mb-3">
                      <label for="Password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="Password" name="Password">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <button type="submit" class="btn btn-primary">Đăng nhập</button>
                      </div>
                      <div class="col-md-6 text-end" >
                        <a href="<?=APPURL?>user/forgotPass">Quên mật khẩu?</a>
                      </div>
                    </div>
      
                  </form>
            </div>
            <div class="col-md-6"></div>

        </div>
    </div>