
import random
"""
array=[]
n=random.randint(2,4)
m=random.randint(3,6)
for i in range(n):
    a=[]
    for j in range(m):
        a.append(random.randint(0,6))
    array.append(a)


for i in range (len(a)):
    print('[', end='')
    for j in range (len(a[i])):
        print(a[i][j], end=', ')
    print(']')

for row in a:
    for item in row:
        print(item, end='')
    print()

max_num=[0]
row=0
col=0
max_q=1
row_last=0
col_last=0
for i in range(len(mas)):
    for j in range(len(mas[i])):
        if max_num==mas[i][j]:
            max_q+=1
            row_last=i
            col_last=j
        if max_num<mas[i][j]:
            max_num=mas[i][j]
            row=i
            col=j
            max_q=1
            row_last=0
            col_last=0
print("Массив:",mas)
print("Наибольший элемент:", max_num)
if max_q>1:
    print("Всего таких же элементов:",max_q)
    print("Строка первого из них:",row,"\nМесто в строке:",col)
    print("Строка последнего из них:",row_last,"\nМесто в строке:",col_last)
else:
    print("Строка:",row,"\nМесто в строке:",col)


n=int(input("Введите количество строк в массиве: "))
a=[]
for i in range(n):
    print("Строка:",i+1)
    row=input("Введите числа через пробел: ").split()
    for i in range(len(row)):
        row[i]=int(row[i])
    a.append(row)
print("Ваш массив:",a)
"""


mas=[]
for i in range(3):
    a=[]
    for j in range(6):
        a.append(random.randint(0,6))
    mas.append(a)
print(mas)




max_num=[[0,0,0]]
for i in range(len(array)):
    for j in range(len(array[i])):
        if max_num[0][0]<array[i][j]:
            max_num=[[0,0,0]]
            max_num[0][0],max_num[0][1],max_num[0][2] = mas[i][j],i,j
        elif max_num[0][0]==array[i][j]:
            max_num.append([array[i][j],i,j])
            
print("Массив:",array)
print("Наибольший элемент:", max_num[0][0])
if len(max_num)>1:
    print("Всего таких же элементов:",len(max_num))
    print("Строка первого из них:",max_num[0][1],"\nМесто в строке:",max_num[0][2])
    print("Строка последнего из них:",max_num[-1][1],"\nМесто в строке:",max_num[-1][2])
else:
    print("Строка:",max_num[0][1],"\nМесто в строке:",max_num[0][2])


#СНЕЖИНКА
n=random.randint(20,25)
while int(n%2)==0:
    n=random.randint(20,25)
two_d=n-1
one_d=0
array=[["."]*n for i in range(n)]
for i in range(n):
    array[i][int((n-1)/2)]="*"
    array[i][two_d]="*"
    array[i][one_d]="*"
    if i==int((n-1)/2):
        for j in range(n):
            array[i][j]="*"
    two_d-=1
    one_d+=1
for i in range(n):
    for j in range(n):
        print(array[i][j],end='')
    print()



n=random.randint(8,9)
array=[[0]*n for i in range(n)]
number=0
for i in range(n):
    for j in range(n):
        number=abs(i-j)
        array[i][j]=number+1
  """
def print_array(a,b):
    for i in range(a):
        for j in range(b):
            print(array[i][j], end=', ')
        print()
            


#Поменять столбцы

def swar_columns(a,i,j):
    for m in range(len(a)):
        var=a[m][i]
        a[m][i]=a[m][j]
        a[m][j]=var
    return a


n=random.randint(5,10)
m=random.randint(5,10)
a=random.randint(0,int(m/2))
b=random.randint(int(m/2)+1,m-1)
array=[]

for i in range(n):
    var=[]
    for j in range(m):
        var.append(random.randint(0,9))
    array.append(var)

print(n,m)
print_array(n,m)
array=swar_columns(array,a,b)
print("А теперь меняем местами столбцы",a,"и",b)
print_array(n,m)
