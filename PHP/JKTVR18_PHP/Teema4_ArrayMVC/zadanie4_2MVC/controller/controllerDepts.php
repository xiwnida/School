<?php

/**
 * Description of controllerDepts
 *
 * @author pupil
 */
class controllerDepts {
    //put your code here
    //строим меню - отдельная функция
    public static function menu(){
        $DeptList= modelDepts::getDeptList();
        //..........more
        include_once 'view/DeptMenu.php';
        //....
        return $menu;
        
    }



    public static function startSite(){
        
        $menu= controllerDepts::menu();//1
        
        $DeptList= modelDepts::getDeptList();
        
        include_once 'view/viewStart.php';
        
    }
    //--------------1 state
    public static function Dept($deptname){
        $menu= controllerDepts::menu();
        //-------------------right content
        $Dept= modelDepts::getDept($deptname);
        
        include_once 'view/DeptOne.php';//!!!!!!!
    }
 
    
    
    
    
    
    
}//class
