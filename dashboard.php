
<div class="dashboard">
<body>
<div class="rd-slide-product">
                <div class="container">
                    <div class="row mt-none-30">

                         
                        <div class="col-lg-3 mt-30">
                            <div class="product-category" data-background="assets/img/bg/cat_bg.jpg">
                              <div  class="box1">
                                <h2 class="section-heading mb-25"><span><span>Categories</span></span></h2>
                                <ul class="list-unstyled">
                                  
                                    <!-- test pour client -->

                                    <li class="cat-item">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Client <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="form_client.php">Ajouter un nouveau client</a></li>
    <li><a href="view_client.">Voir les autres Client</a></li>
  </ul>
</li>

<script>
  // Attachez un gestionnaire d'événements pour le clic sur le lien
  document.querySelector('.cat-item .dropdown-toggle').addEventListener('click', function(e) {
    e.preventDefault(); // Empêche le lien de se comporter par défaut (redirection)

    var dropdownMenu = this.nextElementSibling; // Sélectionne le menu déroulant suivant le lien

    if (dropdownMenu.style.display === 'block') {
      dropdownMenu.style.display = 'none'; // Si le menu déroulant est déjà ouvert, le ferme
    } else {
      dropdownMenu.style.display = 'block'; // Sinon, ouvre le menu déroulant
    }
  });
</script>


                                    <!-- test fournisseur-->
                                    
                                    <li class="cat-item1">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fournisseur <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="form_fournisseur.php">Ajouter  Fournisseur</a></li>
    <li><a href="view_fournisseur.php">Afficher Fournisseur</a></li>
  </ul>
</li>
<script>
  // Attachez un gestionnaire d'événements pour le clic sur le lien
  document.querySelector('.cat-item1 .dropdown-toggle').addEventListener('click', function(e) {
    e.preventDefault(); // Empêche le lien de se comporter par défaut (redirection)

    var dropdownMenu = this.nextElementSibling; // Sélectionne le menu déroulant suivant le lien

    if (dropdownMenu.style.display === 'block') {
      dropdownMenu.style.display = 'none'; // Si le menu déroulant est déjà ouvert, le ferme
    } else {
      dropdownMenu.style.display = 'block'; // Sinon, ouvre le menu déroulant
    }
  });
</script>
<!-- fin -->


                                    <!-- test pour les ventes -->
                            
                      

                                    <li class="cat-item8">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
  Vente<span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="form_vente.php">Vendre un Produit</a></li>
    <li><a href="view_vente.php">Afficher les ventes de  Produit</a></li>
  </ul>
</li>

<script>
  // Attachez un gestionnaire d'événements pour le clic sur le lien
  document.querySelector('.cat-item8 .dropdown-toggle').addEventListener('click', function(e) {
    e.preventDefault(); // Empêche le lien de se comporter par défaut (redirection)

    var dropdownMenu = this.nextElementSibling; // Sélectionne le menu déroulant suivant le lien

    if (dropdownMenu.style.display === 'block') {
      dropdownMenu.style.display = 'none'; // Si le menu déroulant est déjà ouvert, le ferme
    } else {
      dropdownMenu.style.display = 'block'; // Sinon, ouvre le menu déroulant
    }
  });
</script>
<!-- fin -->







                                    <!-- test pour les produits -->
                            
                      

                                    <li class="cat-item2">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    Produit <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="form_produit.php">Ajouter  Produit</a></li>
    <li><a href="view_produit.php">Afficher Produit</a></li>
  </ul>
</li>

<script>
  // Attachez un gestionnaire d'événements pour le clic sur le lien
  document.querySelector('.cat-item2 .dropdown-toggle').addEventListener('click', function(e) {
    e.preventDefault(); // Empêche le lien de se comporter par défaut (redirection)

    var dropdownMenu = this.nextElementSibling; // Sélectionne le menu déroulant suivant le lien

    if (dropdownMenu.style.display === 'block') {
      dropdownMenu.style.display = 'none'; // Si le menu déroulant est déjà ouvert, le ferme
    } else {
      dropdownMenu.style.display = 'block'; // Sinon, ouvre le menu déroulant
    }
  });
</script>
</div>
                                </ul>             
                             </div>
                             </body>
<style>
 body {
  background-color: wheat;
 }
 
 </style>


