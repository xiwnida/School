/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
                function area(){
                    var n1=document.myForm.t1.value; //читаем данные из формы
                    var n2=document.myForm.t2.value; //читаем данные из формы
                    var s=n1*n2;
                    document.myForm.result.value=s;
                }