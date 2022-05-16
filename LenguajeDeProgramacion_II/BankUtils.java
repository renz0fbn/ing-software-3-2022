import java.io.*;
import java.util.Scanner;
import java.util.Arrays;


public class BankUtils {
    static Scanner input = new Scanner(System.in);
    public static void icon()
    {
        // Nombre de la empresa en ascii
        System.out.println("\n\033[35m▄▄    ▄ ▄▄▄▄▄▄▄ ▄     ▄    ▄▄▄▄▄▄▄ ▄▄▄▄▄▄▄ ▄▄▄▄▄▄   ▄▄   ▄▄    ▄▄▄▄▄▄▄ ▄▄▄▄▄▄ ▄▄    ▄ ▄▄▄   ▄ ");
        System.out.println("█  █  █ █       █ █ ▄ █ █  █       █       █   ▄  █ █  █ █  █  █  ▄    █      █  █  █ █   █ █ █");
        System.out.println("█   █▄█ █    ▄▄▄█ ██ ██ █  █    ▄  █    ▄▄▄█  █ █ █ █  █ █  █  █ █▄█   █  ▄   █   █▄█ █   █▄█ █");
        System.out.println("█       █   █▄▄▄█       █  █   █▄█ █   █▄▄▄█   █▄▄█▄█  █▄█  █  █       █ █▄█  █       █      ▄█");
        System.out.println("█  ▄    █    ▄▄▄█       █  █    ▄▄▄█    ▄▄▄█    ▄▄  █       █  █  ▄   ██      █  ▄    █     █▄");
        System.out.println("█ █ █   █   █▄▄▄█   ▄   █  █   █   █   █▄▄▄█   █  █ █       █  █ █▄█   █  ▄   █ █ █   █    ▄  █");
        System.out.println("█▄█  █▄▄█▄▄▄▄▄▄▄█▄▄█ █▄▄█  █▄▄▄█   █▄▄▄▄▄▄▄█▄▄▄█  █▄█▄▄▄▄▄▄▄█  █▄▄▄▄▄▄▄█▄█ █▄▄█▄█  █▄▄█▄▄▄█ █▄█\n\n\u001B[0m");


    }
    public static String nextPass(String prompt){

        // Create the console object
        Console cnsl = System.console();

        // Read password
        // into character array
        char[] ch = cnsl.readPassword("\033[36m"+prompt+"\u001B[0m");

        return String.valueOf(ch);
    }
    public static int nextDni(){
        String d;

        while(true)
        {
            System.out.print("\033[36mD.N.I : \u001B[0m");
            d = input.nextLine();
            // Dni debe cumplir ciertas condiciones
            try {
                Integer.parseInt(d);
                if(d.length() != 8){
                    throw new NumberFormatException();
                }
                break;
            }
            catch (NumberFormatException nfe) {
                System.out.println("\033[31mFormato de D.N.I. incorrecto ...\u001B[0m");
            }

        }
        return Integer.parseInt(d);
    }
    public static int just4 (){
        String tpm;
        int tp;
        // Retorna, si o si, un número entre 1 y 4
        while(true)
        {
            System.out.print("\033[35m\n> \u001B[0m");
            tpm = input.nextLine();
            try {
                tp = Integer.parseInt(tpm);
                if(tp > 4 || tp <= 0 ){
                    throw new NumberFormatException();
                }
                break;
            }
            catch (NumberFormatException nfe) {
                System.out.println("\033[31m\nOpciones permitidas [1, 2, 3, 4]\u001B[0m");
            }

        }
        return tp;
    }

    public static int getInt(String prompt){
        String n;
        // Retorna un número entero
        while(true)
        {
            System.out.print(prompt);
            n = input.nextLine();
            try {
                Integer.parseInt(n);
                break;
            }
            catch (NumberFormatException nfe) {
                System.out.println("\033[31mSolo números\u001B[0m");
            }

        }
        return Integer.parseInt(n);
    }


}



