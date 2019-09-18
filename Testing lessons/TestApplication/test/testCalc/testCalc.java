
package testCalc;
import calc.Calc;
import org.junit.After;
import org.junit.BeforeClass;
import org.junit.Assert;
import static org.junit.Assert.*;
import org.junit.Test;

public class testCalc {
    private static Calc c;
    @BeforeClass
    public static void RunT(){
        c=new Calc();
    }
    
    @Test
        public void getSumTest()
        {
           
            int tulemus=c.getSum(2,3);
           // if (tulemus!=5) Assert.fail();
           Assert.assertTrue("Viga",tulemus==5);
        }
    @Test
    public void getSubtract(){
        int result=c.getSubtract(5, 2);
        assertEquals(4,c.getSubtract(5,1));
    }
}
