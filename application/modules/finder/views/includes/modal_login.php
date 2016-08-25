<div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login Akun</h4>
      </div>
      <div class="modal-body" id="body-ketentuan">
        <form class="form-inline" method="POST" action="<?=site_url('finder/do_login')?>">
          <div class="form-group">
            <label class="sr-only">Email</label>
            <p class="form-control-static">Email</p>
          </div>
          <div class="form-group">
            <label for="inputPassword2" class="sr-only">Email</label>
            <input type="email" class="form-control" id="inputPassword2" placeholder="Email" name="email" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password" autocomplete="off">
          </div>
          <button type="submit" class="btn btn-primary">Masuk</button>
        </form>
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div-->
    </div>
  </div>
</div>
<script type="text/javascript">
  
</script>