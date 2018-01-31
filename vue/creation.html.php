
<html>
    <head>
        <title>Jeu Combat Création personnage</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    </head>
    <body>
        <main role="main" class="container">
            <form method="POST">

                <?php if (isset($erreur)): ?>
                    <div class="alert alert-danger" >
                        <?php echo $erreur ?>
                    <?php endif; ?>
                </div>

                <?php if (isset($message1)): ?>
                    <div class="alert alert-danger" >
                        <?php echo $message1; ?>
                    <?php endif; ?>
                </div>
                <?php if (isset($message2)): ?>
                    <div class="alert alert-success" >
                        <?php echo $message2; ?>
                    <?php endif; ?>
                </div>
                <label> <h1>Création du personnage:</h1> <input type="text" name="nom"></label>

                <br>
                <button type="submit" name="ok" class="btn btn-warning">Création!!!</button>

                <br/>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><h1>Choisissez un Personnage:</h1>    </label>
                    <select class="form-control" name="liste" >
                        <?php foreach ($liste as $list):; ?>
                            <option value="<?php
                            echo $list->getId();
                            ?>"><?php
                                        echo $list->getNom();
                                        ?> </option>
                        <?php endforeach; ?>

                    </select>
                </div><button type="submit" name="jouer" class="btn btn-black">Let's play!!!</button>


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
