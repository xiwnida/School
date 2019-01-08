slovar={}

file=open('Value.txt', 'r')
for i in file.readlines():
    key,value=i.split(' ')
    value=value[0:-1]
    slovar[key]=value
file.close()
print(slovar)


print("Переведи слово. С русского или с английского?")
print("Русский - 1. Английский - 2. 3 - выйти")

otvet=input("Ваш выбор: ")
if otvet !='1' and otvet !='2' and otvet !='3':
    run=True
else:
    run=False
while run:
    print("Неизвестная комнанда")
    print("Русский - 1. Английский - 2. Выйти - 3.")
    otvet=input("Ваш выбор: ")
if otvet=='1':
    for russian in slovar:
        print(russian.lower(),' - ', end='')
        otvet=input()
        if otvet.upper()==slovar[russian]:
            print("Верно!")
        else:
            print("Неверно!")
elif otvet=='2':
    for english in slovar:
        print(slovar[english].lower(),' - ', end='')
        otvet=input()
        if otvet.upper()==english:
            print("Верно!")
        else:
            print("Неверно!")
elif otvet=='3':
    pass
print("Игра окончена, до свидания")
