public class Cliente {
    private final int dni;
    private final String nombre, password;
    int saldo;

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

}
