public class Operaciones {

    static void showOptions(){
        // Muestra lo que se puede hacer
        System.out.println("Elija la operación que desea realizar: ");
        System.out.println("\033[32m[1]\u001B[0m Deposito");
        System.out.println("\033[32m[2]\u001B[0m Retiro");
        System.out.println("\033[32m[3]\u001B[0m Consulta de Saldo");
        System.out.println("\033[32m[4]\u001B[0m Salir");
    }


    static void main(int t){

        // ejecuta la acción requerida
        if(t==1){Deposito();}
        if(t==2){Retiro();}
        if(t==3){showSaldo();}
        if(t==4){exit();}
    }

    static private void Deposito(){
        showSaldo();
        int n = BankUtils.getInt("\033[36mCuanto desea depositar ? \u001B[0m");
        int newSaldo = Main.saldo + n;
        if(Users.setNewSaldo(newSaldo)){    //Pregunta si es posible la acción
            Main.saldo = newSaldo;          // Actualiza el nuevo saldo
            return;
        }
        System.out.println("\033[31mAlgo salio mal :( \u001B[0m");

    }

    static private void Retiro(){
        showSaldo();
        int n = BankUtils.getInt("\033[36mCuanto desea retirar ? \u001B[0m");
        if(n > Main.saldo){     // Si se retira una mayor cantidad a la del saldo, se corta la acción
            System.out.println("\033[33mNo cuenta con fondos suficiente\n\033[31mAbortando .....\u001B[0m");
            return;
        }
        int newSaldo = Main.saldo - n;
        if(Users.setNewSaldo(newSaldo)){    //Pregunta si es posible la acción
            Main.saldo = newSaldo;          // Actualiza el nuevo saldo
            return;
        }
        System.out.println("\033[31mAlgo salio mal :( \u001B[0m");
    }

    static private void showSaldo(){    // Muestra el saldo
        System.out.println("\n"+Main.nombre+" cuentas con \033[32mS/"+Main.saldo+"\u001B[0m");
    }

    static private void exit(){     // Termina el programa
        System.out.println("\033[32mHasta pronto .....\u001B[0m");
        System.exit(0);
    }
}
