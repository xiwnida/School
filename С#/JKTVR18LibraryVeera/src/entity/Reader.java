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
public class Reader {
    private Long id;
    private String name;
    private String lastname;
    private int day;
    private int month;
    private int year;

    public Reader() {
    }

    public Reader(Long id, String name, String lastname, int day, int month, int year) {
        this.id = id;
        this.name = name;
        this.lastname = lastname;
        this.day = day;
        this.month = month;
        this.year = year;
    }

    public int getYear() {
        return year;
    }

    public void setYear(int year) {
        this.year = year;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getLastname() {
        return lastname;
    }

    public void setLastname(String lastname) {
        this.lastname = lastname;
    }

    public int getDay() {
        return day;
    }

    public void setDay(int day) {
        this.day = day;
    }

    public int getMonth() {
        return month;
    }

    public void setMonth(int month) {
        this.month = month;
    }

    @Override
    public String toString() {
        return "Reader{" + "id=" + id + ", name=" + name + ", lastname=" + lastname + ", day=" + day + ", month=" + month + ", year=" + year + '}';
    }
    
}
