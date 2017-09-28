function send(tmp)
{
    var id = tmp.id;
    if(tmp.id.substr(0, 1) == 's')
    {
        id = tmp.id.substring(1);
    }
    window.location.href = 'choseSeat.php?idSeance=' + id;
}