<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b><?php echo APP_NAME ?></b> Dios es Amor</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sessión</p>

      <?php echo form_open('app/ajax_attempt_login', ['class' => 'std-form']);  ?>

      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nombre de usuario o E-mail" name="login_string">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Contraseña" name="login_pass" >
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Recordar Contraseña
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <input type="hidden" id="max_allowed_attempts" value="<?php echo config_item('max_allowed_attempts'); ?>" />
      <input type="hidden" id="mins_on_hold" value="<?php echo (config_item('seconds_on_hold') / 60); ?>" />
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">Olvide Contraseña</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Registrarse</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<script>
  $(document).ready(function() {
    $(document).on('submit', 'form', function(e) {
      $.ajax({
        type: 'post',
        cache: false,
        url: <?php echo base_url('app/ajax_attempt_login')?>,
        data: {
          'login_string': $('[name="login_string"]').val(),
          'login_pass': $('[name="login_pass"]').val(),
          'loginToken':$('[name="token"]').val()
        },
        dataType: 'json',
        success: function(response) {
          $('name="loginToken"').val(response.token);
          console.log(response);
          if (response.status == 1) {
            window.location.href='<?php echo base_url('admin')?>';
          } else if (response.status == 0 && response.on_hold) {
            $('form').hide();
            $('#on-hold-message').show();
            alert('Intentos de inicio de session excesivos.');
          } else if (response.status == 0 && response.count) {
            alert('Login Fallido ' ,'Login Fallido'+response.count+'de'+$('#max_allowed_attempts').val());
          }
        }
      });
      return false;
    });
  });
</script>