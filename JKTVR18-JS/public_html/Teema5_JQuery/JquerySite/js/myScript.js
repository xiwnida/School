/* 
 * Из массива categories создать menu
 * */
$(document).ready(function(){
    var myLi;
    myLi=document.createElement('li');
    myLi.innerHTML='<a href="#" >All</a>';
    document.getElementById('menu').appendChild(myLi);
    var text;
    for(var i=0;i<categories.length;i++){
        myLi=document.createElement('li');
        text='<a href="#" >'+categories[i]+'</a>';
        myLi.innerHTML=text;
        document.getElementById('menu').appendChild(myLi);
    }
    
    Allpictures();
});

//-----------------------------------Allpictures
function Allpictures(){
    var header='<h2>Favorite Animals</h2>';
    var text='';
    for(var i=0;i<animals.length;i++){
        text+='<div style=float:left;>';
        text+='<img src="images/'+animals[i].image+'" style= "margin:5px;">';
        text+='<p>'+animals[i].name+'</p>';
        text+='</div>';
    }
    $('#content').html(header+text);
};

