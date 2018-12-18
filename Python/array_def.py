def max_all(*a):
    res=a[0]
    for val in a[1:]:
        if val>res:
            res=val
    return res
"""
import random
n=random.randint(1,15)
array=[random.randint(1,25) for i in range(n)]
print(array)
m=max_all(*array)
print(m)
"""
symbol=max_all('a', 'b','cb')
print(symbol)

import datetime
today=datetime.date.today()
time=datetime.datetime.now()
year=today.year
month=today.month
print(today, time, year, month)
