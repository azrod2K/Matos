   <!-- la form du logins -->
   <section class="container-fluid">
       <section class="row justify-content-center">

           <section class="col-12 col-sm-6 col-md-3">
               <form method="POST" action="index.php?uc=login&action=validateLogin" class="form-container ">
                   <h1>Login</h1>
                   <div class="form-group">
                       <label for="mail">mail</label>
                       <input type="text" name="mail" class="form-control" id="mail" aria-describedby="emailHelp">
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