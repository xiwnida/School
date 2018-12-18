"""
a=[int(s) for s in input().split()]
print("Список принял числовые значения: ",a)

sum_a=0
max_a=a[0]
min_a=a[0]

for i in a:
    if max_a<i:
        max_a=i
    if min_a>i:
        min_a=i
    sum_a+=i
    
print("Максимальное значение:",max_a, "\nМинимальное значение: ",min_a,"\nСумма:",sum_a)


print("\nОбражение сразу к элементу массива")
for i in a:
    print(i, end=' ')

n=5
ar=[input() for i in range(n)]
print(ar)
"""
import random
array=[random.randint(0,15) for i in range(10)]
k=random.randint(1,9)
print("Из массива",array,"мы уберем число",array[k])
for i in range(k, len(array)-1):
    array[i]=array[i+1]
array.pop()
print("Получилось:",array)
