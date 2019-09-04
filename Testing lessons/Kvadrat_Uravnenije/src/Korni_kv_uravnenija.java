
import static java.lang.Math.sqrt;
import java.util.Scanner;


public class Korni_kv_uravnenija { 
   public static boolean isNumeric(String str) 
{ 
    try 
    { //преобразование строки в число 
        double d=Double.parseDouble(str); 
    }//если есть символы, то сработает ошибка формата 
    catch (NumberFormatException bfe) 
    { 
        return false; //возврат, что есть не цифровые символы 
    } 
    return true; //все введенные символы цифровые 
} 
//‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐‐ 
    public static void main(String[] args) { 
         
        Scanner scan = new Scanner(System.in); 
        String s;   //string 
        do 
        { 
            System.out.println("Vvod A ");//teade ekraanile 
            s=scan.next();//sisend klaviatuurilt. Programm ootab stringi  
        }while(isNumeric(s)!=true ); 
                double A=Double.parseDouble(s);  //string ‐> integer
        do 
        { 
            System.out.println("Vvod B ");//teade ekraanile 
            s=scan.next();//sisend klaviatuurilt. Programm ootab stringi  
        }while(isNumeric(s)!=true ); 
                double B=Double.parseDouble(s);  //string ‐> integer
                 
        do 
        { 
            System.out.println("Vvod C ");//teade ekraanile 
            s=scan.next();//sisend klaviatuurilt. Programm ootab stringi  
        }while(isNumeric(s)!=true ); 
                double C=Double.parseDouble(s);  //string ‐> integer
                 
        double D=B*B-4*A*C;
        double x1 = (-B + sqrt(D)/(2*A)); 
        double x2 = (-B - sqrt(D)/(2*A)); 
        if (D>0){
        System.out.println("Ruut juured on: x1= "+x1+" ja x2= "+x2);   //teade ekraanile 
        System.out.print("");  
        }else{
            System.out.println("Уравнение неверно.");
        }
    } 
     
} 