var hand

function seance(handTmp) {
    if(handTmp != null)
    {
        handTmp.style.backgroundColor = '#FFFFFF';
    }

    hand = handTmp;
    hand.style.backgroundColor = '#DDDDDD';

    setFocus();
}

function setFocus() {
    document.getElementById('submit').focus();
}