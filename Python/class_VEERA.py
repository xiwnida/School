"""
#1
class Dog:
    age=0
    name=''
    weight=0

layka=Dog()
layka.age=5
layka.name='Bobik'
layka.weight=25

#2
class Person:
    name=''
    callphone=''
    email=''

nina=Person()
nina.name='Nina'
nina.callphone='5553332'
nina.email='nina@mail.ru'

roma=Person()
roma.name='Roma'
roma.callphone='666'

#3
class Bird:
    color=''
    name=''
    breed=''

#4
class Character:
    x=0
    y=0
    name=''
    health=0
    strenght=0

#5
class Person:
    name=''
    money=0

nancy=Person()
nancy.name='Nancy'
nancy.money=100

#6
class Person:
    name=''
    money=0

bob=Person()
bob.name='bob'
print(bob.name, 'has', bob.money, 'dollars')

"""

#Повторение пройденного
#1
class Cat:
    name=''
    color=''
    weight=''

    def meow(self):
        print(cat.name,'says "meow"')

snow=Cat()
snow.name='Снежок'
snow.meow()


#2
class Address:
    name=''
    city=''
    street=''
    house=''

    def printAdress(self):
        print(self.name, 'проживает по адресу:',self.city, self.street, self.house)

my_adress=Address()
my_adress.name='Вера'
my_adress.city='Kohtla-Jarve'
my_adress.street='Raudtee'
my_adress.house='29'

my_adress.printAdress()

#3
class Monster:
    def __init__(self, name, health=100):
        self.name=name
        self.health=health

    def decreaseHealth(self, amount):
        self.health-=amount
        if self.health<=0:
            print('Здоровье монстра "'+ str(self.name)+ '" опустилось до нуля.')
            print(self.name, 'погиб')
        else:
            print('У монстра по имени "'+ str(self.name)+'" осталось '+ str(self.health)+' здоровья.')

skelet=Monster('Скелет', 50)
skelet.decreaseHealth(20)
skelet.decreaseHealth(5)
skelet.decreaseHealth(40)
