#Программа, определяющая данные по личному коду

import datetime
#=========Переменные==========
ISkod=''
proverka=False
number_q=0
year=0
month=0
day=0
age_year=0
age_month=0
age_day=0
today=datetime.date.today()
today_year=today.year
today_month=today.month
today_day=today.day
today_year_forProverka=str(today_year)[2:4]
print(today_year_forProverka)

#======Ввод личного кода==========
while not proverka: #Чтобы вычислить корректность ввода
    ISkod=input("Введите свой личный код: ")
    
    if ISkod.isdigit()!=True:
        print("Вы ввели некорректный код: пожалуйста, не используйте буквы\n")
    elif len(ISkod)!=11:
        print("Вы ввели некорректный код: в личном коде должно быть 11 цифр\n")
    elif ISkod[0]!='3' and ISkod[0]!='4' and ISkod[0]!='5' and ISkod[0]!='6': #Проверка первой цифры
        print("Вы ввели некорректный код: проверьте первую цифру\n")

    elif ISkod[0]=='5' and ISkod[1:3]>today_year_forProverka or ISkod[0]=='6' and ISkod[1:3]>today_year_forProverka: #Проверка на год
        print("Вы ввели некорректный код: проверьте первые три цифры\n")
    elif ISkod[1:3]>12:
        print("Вы ввели некорректный код: проверьте вторую и третью цифру\n")
    elif ISkod[3:5]>31:
        print("Вы ввели некорректный код: проверьте четвертую и пятую цифру\n")

    else:
        proverka=True
        
        
#====Рассчет данных=======
        
print("\nБлагодарю. Сейчас я проаналиризую ваш личный код и выдам вам ваши данные\n")
if ISkod[0]=='3' or ISkod=='5':
    print("Ваш пол: \tМужской")
else:
    print("Ваш пол: \tЖенский")

#=====Дата рождения====
if ISkod[0]=='3' or ISkod=='4': #Год
    year=int('20'+ISkod[1:3])
else:
    year=int('19'+ISkod[1:3])
month=int(ISkod[3:5])
day=int(ISkod[5:7])
    
birth_data=datetime.date(year,month,day)
print("Дата рождения: \t",birth_data)

#=====Возраст=====

age=today-birth_data
age_year=str(age.days//364)
if age_year[1] == '0' or age_year[1] == '1' or age_year[1] == '2' or age_year[1] == '3' or age_year[1] == '4':
    age_year=age_year+' года'
else:
    age_year=age_year+' лет'

age_days=str(age.days)
if age_days[-1]== '1':
    age_days=age_days+' день'
elif age_days[-1]== '2' or age_days[-1]== '3' or age_days[-1]=='4':
    age_days=age_days+' дня'
else:
    age_days=age_days+' дней'

print("Ваш возраст: \t",age_year, 'или', age_days)

#====День рождения====
birth_today=datetime.date(today_year,month,day)
if today==birth_today:
    print("\nКстати, с днем рождения!")
