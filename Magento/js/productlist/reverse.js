function reverseEls(elem){
    for (var i=0;i<elem.childNodes.length;i++)
        elem.insertBefore(elem.childNodes[i], elem.firstChild);

}