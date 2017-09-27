var hand = null;

function seance(handTmp)
{
    if(hand != null)
    {
        hand.style.backgroundColor = '#FFFFFF';
    }

    if(hand == handTmp)
    {
        hand.style.backgroundColor = '#FFFFFF';
    }
    else
    {
        handTmp.style.backgroundColor = '#DDDDDD';
    }
    hand = handTmp;

    setFocus(hand);
}
function setFocus()
{
    var id = 'submit' + hand.id;
    document.getElementById(id).focus();
}