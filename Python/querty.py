#Множества
import random
"""
a='querty'
b=set(a)
c={1,2,3,4,5,6,7,8,9}

#for num in c:
#    print(num)
a=[1,2,3,4,5,6,7,8,9]
e=a.pop(random.randint(0,len(a)))
print (e)
print(a)
"""

a={1,2,3,4,5}
b={3,4,5,6,7}
c=a.update(b)
print(c)
print(a)
print(b)
print()
