/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function printBook(book){
    var text="";
    //------------------
    text+='<img id="rightimg" src="img/'+book.photo+'" width="150" height="200">';
    text+="<h2>"+book.name+"</h2>";
    text+='<p>Автор: '+book.autor+'</p>';
    text+='<p>Цена: '+book.price+'</p>';
    text+='<p>Описание: '+book.ex+'</p>';
    
    return text;
};

for (var i=0; i<books.length; i++){
    //данные одного студента в виде хтмл файла
    var text=printBook(books[i]);
    var container=document.createElement('div');
    var sec=document.createElement('section');
    sec.className='my';
    sec.innerHTML=text;
    document.getElementById('content').appendChild(container);
    container.appendChild(sec);
};