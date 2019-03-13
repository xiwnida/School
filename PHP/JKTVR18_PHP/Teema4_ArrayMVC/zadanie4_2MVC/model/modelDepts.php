<?php

/**
 * Description of modelDepts
 *
 * @author 
 */
class modelDepts {
    //put your code here
    
    public static function getDeptList(){
        //массив гос-в
        include 'model/DeptArray.php';
        return $Depts;
    }
    
    //----------One country
    public static function getDept($deptname){
        $allDepts= modelDepts::getDeptList();
        foreach ($allDepts as $DeptOne){
            if($DeptOne['deptname']==$deptname){
                return $DeptOne;
                
            }
        }      
    }
    
    
    
    
    
    
    
    
}//class