# Import utils
from src.utils import getName, getCategory, getInt


class Employer:
    # Set basic attributes
    def __init__(self):
        print('***** DATOS DE ENTRADA *****\n')
        self.name = getName()
        self.cate = getCategory()
        self.hrEx = getInt('HORAS EXTRAS:               ')
        self.dlys = getInt('TARDANZAS: (minutos)        ')


