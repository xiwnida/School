

$(document).ready(function(){
    var myLi;
    var text;
    for(var i=0;i<categories.length;i++){
        myLi=document.createElement('li');
        text='<a href="#" onClick="CategoryPictures(\''+categories[i]+'\')" >'+categories[i]+'</a>';
        myLi.innerHTML=text;
        document.getElementById('menu').appendChild(myLi);
    };
    
    //CategoryPictures();
});


function CategoryPictures(category){
    var header='<h2>'+category+'</h2>';
    var text='';
    for(var i=0;i<content.length;i++){
        if (category==content[i].classname){
        text+='<div style=float:left;>';
        text+='<img src="Images/'+content[i].image+'" style= "margin:5px;">';
        text+='</div>';
        };//if
    };//for
    $('#content').html(header+text);
};