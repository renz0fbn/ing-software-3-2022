class Ticket():

    # Set basic attributes
    def __init__(self, name, cate):
        self.name, self.cate = name, cate     # Set basic data


    def calculateData(self, hrEx, dlys):    #High order function
        self.setBscSalary()
        self.sethrExSalary(hrEx)
        self.setDlysDiscount(dlys)
        self.setSueldoNeto()

    def setBscSalary(self):
        # Obtener el codigo ascii de categoria, restar 65  y sumar 4 para obtener el valor para calcular las horas extras
        id = 6 - (ord(self.cate) - 65)

        # Los salarios básicos se diferencian por 500, si se le suma 2 al id, ambos números serán divisibles
        self.bscSalary = id * 500
        self.ph = self.bscSalary / 240
    

    def sethrExSalary(self, hrEx):
        self.hrExSalary = self.ph * hrEx


    def setDlysDiscount(self, dlys):
        self.dlysDiscount = dlys / 60 * self.ph


    def setSueldoNeto(self):
        self.netSalary = self.bscSalary + self.hrExSalary - self.dlysDiscount


    # Show data, all at once
    def printTicket(self):
        input('\n\033[93mPresione cualquier tecla para ver su boleta ......\033[0m\n')
        print('***** BOLETA DE PAGO *****\n')
        print(f'NOMBRE:                   {self.name}')
        print(f'CATEGORIA:                {self.cate}')
        print(f'SUELDO BASICO:            S/{self.bscSalary}')
        print(f'DESCUENTO TARDANZAS:      S/{self.dlysDiscount:.2f}')
        print(f'PAGO HORAS EXTRAS:        S/{self.hrExSalary:.2f}')
        print(f'SUELDO NETO:              S/{self.netSalary:.2f}')
        input('\n\033[93\nmBoleta generada con exito, enter para salir ......\033[0m\n')