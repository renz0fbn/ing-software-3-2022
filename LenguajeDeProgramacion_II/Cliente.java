import java.util.Objects;

public class Cliente {
    private final int dni;
    private final String nombre, password;
    private int saldo;

    Cliente(int dni, String nombre, String password){
        // Constructor
        this.dni = dni;
        this.nombre = nombre;
        this.password = password;
        this.saldo = 0;
    }
    // Getter methods
    public int getDni() {
        return dni;
    }

    public String getNombre() {
        return nombre;
    }

    public String getPassword() {
        return password;
    }

    public int getSaldo() { return saldo; }

    public boolean setSaldo(int dni, String psw, int saldo){
        if(Objects.equals(psw, this.password) && dni == this.dni) {
            this.saldo = saldo;
            return true;
        }
        return false;
    }
}
