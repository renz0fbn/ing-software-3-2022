class Main {
    // Declarar variables
    static int ind, saldo, dni;
    static String nombre, psw;

    public static void main(String[] args) {
        Users.start();      // Crear 5 objetos clientes
        BankUtils.icon();   // Mostrar el nombre de la empresa

            do{
                dni = BankUtils.nextDni();}
            while(!Users.findUser(dni));    // Buscar un dni correcto

            if(Users.checkPwd()){   // La función retorna true si se ingresa la contraseña correcta hasta 3 veces
                System.out.println("\nBienvenido \033[32m"+ nombre+"\u001B[0m");
                Operaciones.showOptions();      // Mostrar opciones
                while(true){
                    int op = Operaciones.start();   // Preguntar por acción
                    Operaciones.main(op);           // Ejecutar operación
                }

            }

    }

}
