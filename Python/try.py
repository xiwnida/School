a=input("Введите фразу: ")
print("Ваша строка:",a)
b=''
for i in range(3,len(a),3):
    b+=a[i-3:i-1]
b+=a[i:len(a)]
print("Строка без каждого третьего символа:",b)
