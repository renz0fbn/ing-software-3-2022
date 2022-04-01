# Import utils
from src.utils import getName, getCategory, getInt


class employer:
    # Set basic attributes
    def __init__(self):
        print('***** DATOS DE ENTRADA *****\n')
        self.name = getName()
        self.cate = getCategory()
        self.hrEx = getInt('HORAS EXTRAS:               ')
        self.dlys = getInt('TARDANZAS: (minutos)        ')



class ticket():

    # Set basic attributes
    def __init__(self, eply):
        self.name, self.cate = eply.name, eply.cate     # Set basic data

        # Obtener el codigo ascii de categoria, restar 65  y sumar 4 para obtener el valor para calcular las horas extras
        id = 6 - (ord(self.cate) - 65)

        # Los salarios básicos se diferencian por 500, si se le suma 2 al id, ambos números serán divisibles
        self.bscSalary = id * 500
        
        ph = self.bscSalary / 240
        self.hrExSalary = ph * eply.hrEx
        self.dlysDiscount = eply.dlys / 60 * ph
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
