$idCurrent = null;

function changeColorSeatSit($id) {
    if($idCurrent != null)
    {
        $idCurrent.style.backgroundColor = '#42EEF4';
    }

    $idCurrent = $id;
    $idCurrent.style.backgroundColor = '#00FF00';
}