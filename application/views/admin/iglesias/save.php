
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- jquery validation -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llenar el Formulario</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start  id="Form_save_iglesia" -->
        <form role="form"  id="Form_save_iglesia"  action="<?php echo base_url('admin/iglesia_create') ?>" method="POST" accept-charset="utf-8">
          <div class="card-body">
              <div class="form-group">
                <label >Nombre de la Iglesia</label>
                <input type="text" name="nombre" id="nombre" class="form-control" >
              </div>
              <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" name="estado" id="estado">
                          <option value="Activo">Activo</option>
                          <option value="Desactivado">Desactivado</option>
                        </select>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
      </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">

    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
