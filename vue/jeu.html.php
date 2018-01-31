
<html>
    <head>
        <title>Jeu Combat Création personnage</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    </head>
    <header>
        <form >
            <button type="submit" class="btn btn-primary" name="fermer">Détruire Session</button>
        </form>
    </header>
    <body>
        <main role="main" class="container">

            <img src='<?php echo Personnage::IMG . $perso->getImage(); ?>'/>
            <div  value="<?php $perso->getId(); ?>"> <h1><?php echo $perso->getNom(); ?> à l'attaque!!!!</h1> </div> 

            <form method='POST'>   
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><h1>Choisissez un Adversaire:</h1>    </label>

                    <select class="form-control" name="choix" >
                        <?php foreach ($liste as $list):; ?>
                            <option value="<?php
                            echo $list->getId();
                            ?>"><?php
                                        echo $list->getNom();
                                        ?> </option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <form method="POST">
                    <button type="submit" name="go" class="btn btn-black">Attaque!!!</button>
                </form>   


                <?php if (isset($message)): ?>
                    <div class="alert alert-info" >
                        <?php echo $message; ?>
                    <?php endif; ?>
                </div>





            </form>


        </main>


        <footer class="footer">
            <div class="container">


            </div>
        </footer>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity = "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin = "anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </body>
</html>

</body>
</html>
