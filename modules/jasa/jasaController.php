<?php
include_once(__DIR__ . "/jasaService.php");

function getAllJasa()
{
    return getAllJasaService();
}

function getJasaById($id)
{
    return getJasaByIdService($id);
}

// handle create
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tambahJasa'])) {
    $id_user = isset($_POST['idUser']) ? intval($_POST['idUser']) : 0;
    $jenis_jasa = isset($_POST['jenisJasa']) ? $_POST['jenisJasa'] : '';

    // $allowed_jenis_jasa = ['Penyewaan', 'Booking'];
    // if (!in_array($jenis_jasa, $allowed_jenis_jasa)) {
    //     header("Location: ../../views/jasa/index.php?status=invalid_enum");
    //     exit;
    // }
    $result = createJasaService($id_user, $jenis_jasa);

    if ($result) {
        header("Location: ../../views/jasa/index.php?status=success");
        exit;
    } else {
        header("Location: ../../views/jasa/index.php?status=error");
        exit;
    }
}

//handle update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editJasa'])) {
    $id_jasa = intval($_POST['idJasa']);
    $id_user = isset($_POST['idUser']) ? intval($_POST['idUser']) : 0;
    $jenis_jasa = isset($_POST['jenisJasa']) ? $_POST['jenisJasa'] : '';

    // $allowed_jenis_jasa = ['Penyewaan', 'Booking'];
    $result = updateJasaService($id_jasa, $id_user, $jenis_jasa);

    header("Location: ../../views/jasa/index.php?status=" . ($result ? "updated" : "update_failed"));
    exit;
}

// handle delete
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusJasa'])) {
    $id_jasa = intval($_POST['idJasa']);
    $result = deleteJasaService($id_jasa);

    header("Location: ../../views/jasa/index.php?status=" . ($result ? "deleted" : "delete_failed"));
}