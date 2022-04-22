import java.util.ArrayList;
import java.util.Objects;

public class Users {
     private static final ArrayList<Cliente> users = new ArrayList<>();
    private static void BankUsers(){
        // Crea 5 objetos de manera privada
        users.add(new Cliente(75467114, "Renzo Valentin", "arch2.0"));
        users.add(new Cliente(75967348, "Juan Vizarraga", "duck09"));
        users.add(new Cliente(73487638, "Daniela Carrasco", "joshua"));
        users.add(new Cliente(79638467, "Ariana Benavente", "twenty20"));
        users.add(new Cliente(72568937, "Josue Zegarra", "78uni"));

    }

    public static void start(){
        BankUsers();
    }       // Función padre para crear los objetos

    public static Boolean findUser(int nDni){
        for(int i = 0; i < 5; i++){     // recorre el array para ver si existe usuario con ese Dni
            if(nDni == users.get(i).getDni()){
                Main.ind = i;           // Si encuentra uno, actualiza la variable de la clase main
                return true;
            }
        }
        System.out.println("\033[31mUsuario no encontrado\u001B[0m");
        return false;                   // Si no encuentra uno, retorna falso
    }

    public static Boolean checkPwd(){
        for(int i = 0; i < 3; i++ ){      // Pregunta 3 veces por la contraseña de un usuario
            Main.psw = BankUtils.nextPass("Contraseña: ");
            if(Objects.equals(Main.psw, users.get(Main.ind).getPassword())){
                // Si la contraseña es correcta, actualiza las variables de la clase main
                Main.nombre = users.get(Main.ind).getNombre();
                Main.saldo = users.get(Main.ind).getSaldo();
                return true;
            }
            if(i!=2){System.out.println("\033[33mContraseña incorrecta, pruebe de nuevo\u001B[0m");}
        }
        System.out.println("\033[31mSe han superado los intentos, abortando .....\u001B[0m");
        return false;       // Si las contraseñas no son iguales, retorna falso
    }

    public static Boolean setNewSaldo(int saldo){
        // Si la clase main tiene un dni y contraseña, correctas, se guarda el nuevo saldo, al usuario correspondiente
        if(users.get(Main.ind).setSaldo(Main.dni, Main.psw, saldo)) {
            Main.saldo = saldo;
            return true;
        }
        // Si algo sale mal, retorna falso
        return false;
    }

}
