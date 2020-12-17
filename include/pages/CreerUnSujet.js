function loadiframe(){
    frm.document.designMode = 'On';
}

function formatText(bouton){
    var cible = frm.document;

    switch (bouton){
        case 'G' :
            cible.execCommand("bold",false,null);
            break;
        case 'I':
            cible.execCommand("italic",false,null);
            break;
        case 'S':
            cible.execCommand("underline",false,null);
            break;
        case 'Taille':
            var taille = taillePolice.taille.selectedIndex;
            cible.execCommand("fontsize",false,taille);
    }
}