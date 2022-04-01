def menu():

    # Start screen with ascii art
    print('\033[94m')
    print('-------------------------------------------------------------------------------')
    print()
    print(' ███████╗███████╗██████╗ ██████╗  ██████╗ ████████╗███████╗██╗  ██╗')
    print(' ██╔════╝██╔════╝██╔══██╗██╔══██╗██╔═══██╗╚══██╔══╝██╔════╝██║ ██╔╝')
    print(' █████╗  █████╗  ██████╔╝██████╔╝██║   ██║   ██║   █████╗  █████╔╝ ')
    print(' ██╔══╝  ██╔══╝  ██╔══██╗██╔══██╗██║   ██║   ██║   ██╔══╝  ██╔═██╗ ')
    print(' ██║     ███████╗██║  ██║██║  ██║╚██████╔╝   ██║   ███████╗██║  ██╗')
    print(' ╚═╝     ╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝    ╚═╝   ╚══════╝╚═╝  ╚═╝')
    print('------------------------------------------------------------------------------')
    print('\033[0m')
    print('Bienvendio !!!\n')


def getName():

    # Get a str with only letters
    while True:
        try:
            name = input('TRABAJADOR:                 ').upper()
            if len(name) == 0:
                raise Exception('\033[91mIngrese un nombre, intente de nuevo ...... \033[0m')
            
            for c in name:
                if not c.isalpha():
                    if c != ' ':
                        raise Exception('\033[91mSolo letras, intente de nuevo .......\033[0m')
            break
        except Exception as e:
            print(e)
    
    return name


def getCategory():

    # Get a char with only the value of A, B or C
    while True:
        try:
            cat = input('CATEGORIA:                  ')
            cat = cat.upper()
            if cat == 'A' or cat == 'B' or cat == 'C':
                break
            raise Exception('\033[91mCategoria incorrecta, intente de nuevo .......\033[0m')
        except Exception as e:
            print(e)
    return cat


def getInt(msg):

    # Prompt for a int with a custom msg
    while True:
        try:
            n = input(msg)
            if not n.isdigit():
                raise ValueError('\033[91mSolo números, intente de nuevo.....\033[0m')
            break
        except Exception as e:
            print(e)
    return int(n)
