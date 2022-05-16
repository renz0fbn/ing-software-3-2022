# Import modules
from src.employer import Employer
from src.ticket import Ticket
from src.utils import menu


def main():
    # Start screen and create two objects
    try:
        menu()
        employer1 = Employer()
        ticke1 = Ticket(employer1.name, employer1.cate)
        ticke1.calculateData(employer1.hrEx, employer1.dlys)
        ticke1.printTicket()


    except KeyboardInterrupt:
        print('\n\033[91mFERROTEK, saliendo en modo seguro. Hasta luego !!!\033[0m')

if __name__ == '__main__':
    main()
    
