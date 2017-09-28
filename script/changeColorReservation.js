var arrayChoseSeat = new Array();

function changeColorSeatSit(element, numberSeat)
{

    if(getArray(numberSeat))
    {
        element.style.backgroundColor = "#00FF00";
    }
    else
    {
        element.style.backgroundColor = "#42EEF4";
    }
}

function getArray(id)
{
    for(var i = 0; i < arrayChoseSeat.length; i++)
    {
        if(arrayChoseSeat[i] == id)
        {
            arrayChoseSeat.splice(id, 1);
            return false;
        }
    }
    arrayChoseSeat.push(id);
    return true;
}