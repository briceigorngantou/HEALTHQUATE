<?php
include "./db_connect.php";
include "./send_email.php";
include "./crypt.php";

if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = encrypt($_POST['firstName']);
    $lastName = encrypt($_POST['firstName']);
    $email = encrypt($_POST['email']);
    $poids = encrypt($_POST['poids']);
    $taille = encrypt($_POST['taille']);
    $ville =  encrypt($_POST['taille']);
    $cp = encrypt($_POST['cp']);

    $sql = "INSERT INTO `contrat` (`id`, `nom`, `prenom`, `poids`, `taille`, `ville`, `zip`, `email`, `prix`)
     VALUES (NULL, '$lastName', '$firstName', '$poids', '$taille', '$ville', '$cp', '$email', NULL)";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $msg = "Nouveau contrat crée avec success. Vous allez bientot recevoir un mail de confirmation";
        header('Location: index.php?msg=' . encrypt($msg));
        // send mail
        $subject = "Demande de Contrat";
        $message = 'Mr(Mme) ' . $firstName . ' ' . $lastName .
            ", nous sommes heureux de vous annoncé que votre demande de contrat a été crée avec success. " .
            "Notre équipe l'examinera puis nous reviendrons vers vous avec une offre dans les prochains jours";

        sendMail($email, $firstName . ' ' . $lastName, $subject, $message);
    } else {
        // echo "Failed: " . mysqli_error($connection);
        $msg = "Oups!! Une erreur c'est produite lors du traitement de votre demande";
        header('Location: index.php?err=' . encrypt($msg));
    }
}
?>

<div class="container">
    <div class="text-center mb-4">
        <h3>Ajouter un nouveau contrat</h3>
        <p class="text-muted">Complétez le formulaire ci-dessous pour ajouter un nouveau contrat</p>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <form action="" method="post" class="form-contract">
        <?php
        if (isset($_GET['msg'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . decrypt($_GET['msg']) . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if (isset($_GET['err'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            ' . decrypt($_GET['err'])  . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <div class="row mb-3">
            <div class="col">
                <label for="firstName" class="form-label">
                    Prénom:
                </label>
                <input id="firstName" type="text" class="form-control" name="firstName" placeholder="John" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="lastName" class="form-label">
                    Nom de famille:
                </label>
                <input id="lastName" type="text" class="form-control" name="lastName" placeholder="Doe" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="email" class="form-label">
                    Email:
                </label>
                <input id="email" type="email" class="form-control" name="email" placeholder="johndoe@example.com" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="poids" class="form-label">
                    Poids (en Kg):
                </label>
                <input id="poids" type="number" class="form-control" name="poids" placeholder="10.23" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="taille" class="form-label">
                    Taille (en m):
                </label>
                <input id="taille" type="number" class="form-control" name="taille" placeholder="1.50" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ville" class="form-label">
                    Ville:
                </label>
                <input id="ville" type="text" class="form-control" name="ville" placeholder="Orléans" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cp" class="form-label">
                    Code Postal:
                </label>
                <input id="cp" type="number" class="form-control" name="cp" placeholder="45100" required>
            </div>
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-success" name="submit">SOUMETTRE</button>
            <a href="index.php" class="btn btn-danger">ANNULER</a>
        </div>
    </form>
</div>