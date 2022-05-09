<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Editer le Profil</h1>
      <hr>

      <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
        </div>
      </div>
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>information personnelle</h3>
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Téléphone</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?= $_SESSION['userConnected']['noTel'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Pseudo</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?= $_SESSION['userConnected']['pseudo'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Current Mot de passe</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nouveau mot de passe</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" value="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-8">
              <input class="btn btn-success btn-block btn-lg" type="submit" value="update">
            </div>
          </div>
          </form>
      </div>
  </div>
</div>
<hr>