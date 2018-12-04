/* 
 * Из массива categories создать menu
 * */
$(document).ready(function(){
    var myLi;
    myLi=document.createElement('li');
    myLi.innerHTML='<a href="#" onClick="CategoryPictures()" >All</a>';
    document.getElementById('menu').appendChild(myLi);
    var text;
    for(var i=0;i<categories.length;i++){
        myLi=document.createElement('li');
        text='<a href="#" onClick="CategoryPictures(\''+categories[i]+'\')" >'+categories[i]+'</a>';
        myLi.innerHTML=text;
        document.getElementById('menu').appendChild(myLi);
    };
    
    CategoryPictures();
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
    };
    $('#content').html(header+text);
};

//-----------------Picture catigories. category - название категории
function CategoryPictures(category=0){
    var header='<h2>'+category+'</h2>';
    if (category==0) var header='<h2>Favorite Animals</h2>';
    var text='';
    for(var i=0;i<animals.length;i++){
        if (category==animals[i].classname || category==0){
        text+='<div style=float:left;>';
        text+='<img src="images/'+animals[i].image+'" style= "margin:5px;">';
        text+='<p><a href="#" onClick="NamePictures(\''+animals[i].name+'\')">'+animals[i].name+'</a></p>';
        text+='</div>';
        };//if
    };//for
    if (text=='') text='Данных нет';
    $('#content').html(header+text);
};

//--------------------Picture Names.
function NamePictures(name){
    var header='<h2>'+name+'</h2>';
    var text='';
    for(var i=0;i<animals.length;i++){
        if (name==animals[i].name){
        text+='<div style=float:left;>';
        text+='<img src="images/'+animals[i].image+'" style= "margin:5px;">';
        text+='<p><a href="#" onClick="CategoryPictures(\''+animals[i].classname+'\')">Категория: '+animals[i].classname+'</a></p>';
        text+='</div>';
        };//if
    };//for
    $('#content').html(header+text);
};