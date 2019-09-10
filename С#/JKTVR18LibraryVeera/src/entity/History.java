/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entity;

import java.util.Date;

/**
 *
 * @author melnikov
 */
public class History {
    private Long id;
    private Book book;
    private Reader reader;
    private Date takeOnDate;
    private Date returnDate;

    public History() {
    }

    public History(Long id, Book book, Reader reader, Date takeOnDate, Date returnDate) {
        this.id = id;
        this.book = book;
        this.reader = reader;
        this.takeOnDate = takeOnDate;
        this.returnDate = returnDate;
    }

    public Date getReturnDate() {
        return returnDate;
    }

    public void setReturnDate(Date returnDate) {
        this.returnDate = returnDate;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Book getBook() {
        return book;
    }

    public void setBook(Book book) {
        this.book = book;
    }

    public Reader getReader() {
        return reader;
    }

    public void setReader(Reader reader) {
        this.reader = reader;
    }

    public Date getTakeOnDate() {
        return takeOnDate;
    }

    public void setTakeOnDate(Date takeOnDate) {
        this.takeOnDate = takeOnDate;
    }

    @Override
    public String toString() {
        if(returnDate == null){
            return "History{" + "id=" + id 
                + ", book=" + book.getTitle()
                + ", reader=" + reader.getName()
                + " " + reader.getLastname()
                + ", takeOnDate=" + takeOnDate 
                 
                + '}';
        }else{
            return "History{" + "id=" + id 
                + ", book=" + book.getTitle()
                + ", reader=" + reader.getName()
                + " " + reader.getLastname()
                + ", takeOnDate=" + takeOnDate 
                + ", returnDate=" + returnDate 
                + '}';
        }
        
    }
    
    
}
