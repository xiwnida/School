

$(document).ready(function(){
    var myLi;
    var text;
    for(var i=0;i<categories.length;i++){
        myLi=document.createElement('li');
        text='<a href="#" onClick="Category(\''+categories[i]+'\')" >'+categories[i]+'</a>';
        myLi.innerHTML=text;
        document.getElementById('menu').appendChild(myLi);
    };
    
    Category('О кошачьих');
});


function Category(category){
    var header='<h2>'+category+'</h2>';
    var text2='';
    for(var i=0;i<content.length;i++){
        if (category==content[i].classname){
        text2+='<div style="float:left;" ><p>'+content[i].text+'</p>';
        text2+='<img src="'+content[i].image+'" style= "margin:5px; float:right;">';
        text2+='</div>';
        };//if
    };//for
    $('#content').html(header+text2);
};