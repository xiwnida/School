/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entity;

/**
 *
 * @author melnikov
 */
public class Book {
    private Long id;
    private String title;
    private String author;
    private int year;

    public Book() {
    }

    public Book(Long id, String title, String author, int year) {
        this.id = id;
        this.title = title;
        this.author = author;
        this.year = year;
    }
    
    
    public void setId(Long id) {
        this.id = id;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public void setAuthor(String author) {
        this.author = author;
    }

    public void setYear(int year) {
        this.year = year;
    }

    public Long getId() {
        return id;
    }

    public String getTitle() {
        return title;
    }

    @Override
    public String toString() {
        return "Book{" 
                + "id=" + id 
                + ", title=" + title 
                + ", author=" + author 
                + ", year=" + year 
                + '}';
    }

    public String getAuthor() {
        return author;
    }

    public int getYear() {
        return year;
    }
    
}
