/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
package javaapplication42;

import java.util.Scanner;

/**
*
* @author gast3
*/
public class JavaApplication42 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Scanner scan = new Scanner(System.in);
        int zahl1, zahl2, zahl3;
        String hi, na;
        System.out.println("Wie geht es dir?(Gut, Schlecht oder Mittel)");
        hi = scan.nextLine();
        if (hi.equalsIgnoreCase("gut")) {
            System.out.println("FREUT MICH!!!");
            System.out.println("Was willst du machen?  (was aktives oder was gemuetliches)");
            na = scan.nextLine();
            if (na.equalsIgnoreCase("was aktives")) {
                System.out.println("Willst du spielen oder sport machen(spielen oder sport)");
            }
        }
    }

}
