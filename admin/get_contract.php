<?php
include "../db_connect.php";
include "../crypt.php";

if (isset($_GET['id'])) {
    $contractId = $_GET['id'];
    echo $contractId;
    $sql = "SELECT * FROM contrat WHERE id = $contractId";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
        <div class="modal-header">
            <h4 class="modal-title" id="updatePriceModalLabel">Mise à jour prix</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="text-left mb-4">
                    <p class="text-muted"> Vous êtes sur le point de mettre à jour le prix de
                        la demande de contrat de Mr(Mme) ' . decrypt($row['nom']) . ' ' . decrypt($row['prenom']) . '
                    </p>
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <form method="post" id="updateForm" class="form-contract" action="./index.php">
                    <input type="hidden" id="id" value="' . $row['id'] . '" name="contrat_id">
                    <div class="row mb-3">
                        <label class="form-label" for="price"><strong>Prix : </strong></label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULER</button>
                        <button type="submit" class="btn btn-primary">VALIDER</button>
                    </div>
                </form>
            </div>
        </div>';
    }
    $connection->close();
}
