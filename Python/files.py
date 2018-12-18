"""
fin=open('input.txt','r')

a=fin.readlines() #массив
print(a)

fin=open('input.txt','r')
b=fin.readline() #строка
print(b)

fin=open('input.txt','r')
c=fin.read() #весь файл
print(c)
fin.close()

a=[]
for i in fin.readlines():
    a.append(i.strip()) #удаляет спецсимволы
print(a)

fout=open('output.txt', 'w')
print('Hallo, world!', file=fout)
fout.close()

fout=open('output.txt', 'a')
print('Blah blah blah!', file=fout)
fout.close()

fout=open('output.txt', 'a')
for line in a:
    print(line, file=fout)
fout.close()

fout=open('output.txt', 'a')
for line in a:
    fout.write(line+'\n')
fout.close()
"""

#РАБОТААААА
import random
f1=open('ex.txt','w')
f2=open('ex_answers.txt','w')
f1.close
f2.close


ex_number=int(input("Введите число заданий: "))
num=1
for i in range(ex_number+1):
    do=random.randint(1,4)
    a=random.randint(1,10)
    b=random.randint(1,10)
    if do==2:
        while b>a:
            a=random.randint(1,10)
            b=random.randint(1,10)
    elif do==4:
        while (a/b)-(a//b)!=0:
            a=random.randint(1,10)
            b=random.randint(1,10)
        

    if do==1:
        ex=str(num)+': '+str(a)+' + '+str(b)+' = '
        answer=a+b
    elif do==2:
        ex=str(num)+': '+str(a)+' - '+str(b)+' = '
        answer=a-b
    elif do==3:
        ex=str(num)+': '+str(a)+' * '+str(b)+' = '
        answer=a*b
    elif do==4:
        ex=str(num)+': '+str(a)+' / '+str(b)+' = '
        answer=int(a/b)

    f1=open('ex.txt','a')
    f1.write(ex+'\n')
    f1.close

    f2=open('ex_answers.txt','a')
    f2.write(ex+str(answer)+'\n')
    f2.close

    num+=1

print("Проверьте файлы :)")
