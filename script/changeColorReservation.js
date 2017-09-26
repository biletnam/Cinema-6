var idCurrent = null;

function changeColorSeatSit(id)
{
    if(idCurrent != null)
    {
        idCurrent.style.backgroundColor = '#42EEF4';
    }
    if(idCurrent == id)
    {
        idCurrent.style.backgroundColor = '#42EEF4';
    }
    else
    {
        id.style.backgroundColor = '#00FF00';
    }

    idCurrent = id;
}