"""
s=input("Введите кучу букв и цифр: ") # Отделяет цифры от букв и создает массив
digits=[]
for symbol in s:
    if '1234567890'.find(symbol) !=-1:
        digits.append(int(symbol))
print(digits)

s=input("Введите кучу букв и цифр: ") # Отделяеб буквы от цифр и создает массив
digits=[]
for symbol in s:
    if 'qwertyuioplkjhgfdsazxcvbnm'.find(symbol) !=-1:
        digits.append(symbol)
print(digits)
s=input("Введите кучу букв и цифр: ") # Отделяет цифры от букв и создает массив
digits=[]
for symbol in s:
    #if '1234567890'.find(symbol) !=-1:
    if symbol.isdigit():
        digits.append(int(symbol))
print(digits)

import random
array=[]
for i in range(10):
    a=random.randint(1,10)
    array.append(a)
print(array)
"""
#5. ЗАДАЧА «БОЛЬШЕ СВОИХ СОСЕДЕЙ»
#Дан список чисел. Определите, сколько в этом списке элементов, которые больше двух своих
#соседей, и выведите количество таких элементов. Крайние элементы списка никогда не
#учитываются, поскольку у них недостаточно соседей.
array=[1,4,7,3,4,8,1,2,7,9,3]
count=0
for i in range (1,len(array)):
    if array[i]>array[i-1] and array[i]>array[i+1]:
        print(array[i])
        count+=1
print(count)
