/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function printStud(user){
   //данные одного студента
   //user - набор данных из массива
    var text="";
    text+="<h2>"+user.name+"</h2>";
    //------------------
    if ('photo' in user){
        text+='<img src="images/'+user.photo+'">';
    }else{
        text+='<img src="images/nophoto.jpg">';
    };
    text+='<p>Group: '+user.group+'</p>';
    text+='<p>Age: '+user.age+'</p>';
    text+='<p>Adress: '+user.adress.citi+', '+user.adress.street+', '+user.adress.house+', </p>';
    
    return text;
};

for (var i=0; i<students.length; i++){
    //данные одного студента в виде хтмл файла
    var text=printStud(students[i]);
    var container=document.createElement('div');
    container.className='my';
    container.innerHTML=text;
    document.getElementById('content').appendChild(container);
};