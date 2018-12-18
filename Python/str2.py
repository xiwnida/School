#Удалить каждый третий символ строки
"""
a=input("Введите фразу: ")
print("Ваша строка: ", a)

c=''
for i in range (len(a)):
        if i%3!=0 or i==0:
            c=c+a[i]
print("Результат: ", c)
"""
a=input("Введите фразу: ")
print("Ваша строка: ", a)

c=a
for i in range(0,len(a),3):
    print(a[i])
    c=c.replace(a[i], '')
print("Результат: ", a,c)
