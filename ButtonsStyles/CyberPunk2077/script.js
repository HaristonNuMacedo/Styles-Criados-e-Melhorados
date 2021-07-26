
    function mascaraCel(){
 
        var celular= document.getElementById('floagCel').value;
        if(celular.length==1){
         document.getElementById('floagCel').value ='(' + celular;
        }
        else if (celular.length==3){
         document.getElementById('floagCel').value = celular +')' + ' ';
        }
        else if (celular.length==10){
         document.getElementById('floagCel').value = celular +'-';
        }
     }
     