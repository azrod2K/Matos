   <!-- la form du logins -->
   <section class="container-fluid">
       <?php
        if ($_SESSION['alertMessage']['type'] != null) {
        ?>
           <div class="alert alert-<?= $_SESSION['alertMessage']['type'] ?> alert-dismissible fade show" role="alert">
               <?= $_SESSION['alertMessage']['message'] ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>


       <?php
            $_SESSION['alertMessage'] = [
                "type" => null,
                "message" => null
            ];
        }
        ?>
       <section class="row justify-content-center">
           <section class="col-12 col-sm-6 col-md-3">
               <form method="POST" action="index.php?uc=login&action=validateLogin" class="form-container ">
                   <h1>Login</h1>
                   <div class="form-group">
                       <label for="mail">mail</label>
                       <input type="text" name="email" class="form-control" id="mail" aria-describedby="emailHelp">
                   </div>
                   <div class="form-group">
                       <label for="password">Password</label>
                       <input type="password" name="password" class="form-control" id="password">
                   </div>
                   <a href="index.php?uc=login&action=showRegister">Nouveau ? Créer un compte ici</a>
                   <input type="submit" name="valider" class="btn btn-success btn-block" value="Login">
               </form>
           </section>
       </section>
   </section>