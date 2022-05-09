 <!-- la form d'ajout  -->
 <div class="container">
     <?php
        ?>
     <div class="row">
         <div class=col-lg-3></div>
         <div class=col-lg-6>
             <div id="ui">
                 <h1 class="text-center">ajout de matériel</h1>
                 <form method="POST" action="index.php?uc=materiel&action=validateAdd" class="form-group text-center">
                     <div class="row">
                         <div class="col-lg-6">
                             <label>marque :</label>
                             <input type="text" name="marque" placeholder="Enter your First name .." class="form-control">
                         </div>
                         <div class="col-lg-4">
                             <label>catégorie :</label>
                             <select name="categorie">
                                 <option value="ordinateur portables">ordinateur portables</option>
                                 <option value="réseau">réseau</option>
                                 <option value="connectiques">connectique</option>
                                 <option value="téléphonie">téléphonie</option>
                                 <option value="périphérique">périphérique</option>
                             </select>
                         </div>
                     </div>
                     <br>
                     <label>images du matériel :</label>
                     <input class="form-control" type="file" id="image" accept="image/*" multiple name="images[]">
                     <br>
                     <label>description :</label>
                     <input type="text" name="description" placeholder="description" class="form-control">
                     <br>
                     <input type="submit" name="valider" value="ajouter" class="btn btn-success btn-block btn-lg">
                 </form>
             </div>
         </div>
         <div class=col-lg-3></div>
     </div>
 </div>