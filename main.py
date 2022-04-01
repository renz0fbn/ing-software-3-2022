# Import modules
from src.classes import employer, ticket
from src.utils import menu


def main():
    # Start screen and create two objects
    try:
        menu()
        employer1 = employer()
        ticke1 = ticket(employer1)
        ticke1.printTicket()

    except KeyboardInterrupt:
        print('\n\033[91mFERROTEK, saliendo en modo seguro. Hasta luego !!!\033[0m')

if __name__ == '__main__':
    main()