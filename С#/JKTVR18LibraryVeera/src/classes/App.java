/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package classes;

import entity.Book;
import entity.History;
import entity.Reader;
import java.util.Date;

/**
 *
 * @author melnikov
 */
public class App {
    public void run(){
        Book book = new Book();
        book.setId(1L);
        book.setTitle("Voina i mir");
        book.setAuthor("L.Tolstoy");
        book.setYear(2010);
        System.out.println(book.getId());
        System.out.println(book.getTitle());
        System.out.println(book.getAuthor());
        System.out.println(book.getYear());
        System.out.println("Вывод метода toString(): ");
        System.out.println(book.toString());
        
        Book book2 = new Book(2L, "Otsi i deti", "I.Turgenev", 2011);
        System.out.println(book2.toString());
        
        book.setYear(2012);
        System.out.println(book.toString());
        
        Reader reader = new Reader(1L, "Ivan", "Ivanov", 10, 10, 2000);
        System.out.println(reader.toString());
                
        System.out.println("Выдача книги:");
        History history = new History();
        history.setId(1L);
        history.setBook(book);
        history.setReader(reader);
        history.setTakeOnDate(new Date());
        System.out.println(history.toString());
        System.out.println("Возврат книги:");
        history.setReturnDate(new Date());
        System.out.println(history.toString());
    }
}
