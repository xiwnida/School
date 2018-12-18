import random
import time

#ПЕРЕМЕННЫЕ
game_on=True #Пока ТРУ игра работает

words_array=[] #Массив со всеми словами
answer='' #Хранит ответ пользователя
try_quantity=10 #Количество попыток
active_word=[] #Для отображения букв
loose=False
win=False
game_exit=False
points=0 #Общее количество баллов
points_progression=0 #Число, на которое увеличиваются баллы
points_plus=0
guessed_words=0
guessed_letters=0
max_gues_let=0 #Хранит максимальное количество угаданных букв
right_choice=False #Проверка выбора игрока
file='' #Чтобы открыть нужный файл

def answer_check(answer, word): #ответ пользователя, слово
    
    global active_word
    global try_quantity
    global win
    global loose
    global game_exit
    global points
    global points_progression
    global points_plus
    global guessed_letters
    global guessed_words
    global max_gues_let
    answer=answer.upper()
    
    if answer=='ВЫХОД':
        
        print("Спасибо за игру!")
        input("Нажмите любую клавишу")
        game_exit=True
        
    elif len(answer)>1:
        
        if answer==word:
            print("          ВЫ УГАДАЛИ СЛОВО!")
            print("          Это",word,"\n")
            for i in active_word:
                if i=='_':
                    points_plus+=10
            points+=points_plus
            print("          +1 попытка\n")
            print("Вы заработали",points_plus,"баллов за отгадывание слова")
            points_plus=0
            guessed_words+=1
            try_quantity+=1
            win=True
        else:
            print("          К сожалению, вы не угадали.")
            print("          Это было слово:",word)
            loose=True
            game_on=False
            
    else:
 
        if word.find(answer)!=-1:
            if answer not in active_word:
            
                for i in range(len(word)):
                    if answer==word[i]:
                        active_word[i]=answer
                        points_progression+=5
                points+=points_progression

                print("           В точку!")
                print("          +"+str(points_progression)+" баллов")
                guessed_letters+=1
            
                if ('_') not in active_word:
                    print("          +1 попытка\n")
                    print("          ВЫ УГАДАЛИ СЛОВО!")
                    print("          Это",word,"\n")
                    guessed_words+=1
                    try_quantity+=1
                    win=True
            else:
                print("          Эта буква уже открыта!")
                
        else:
            
            print("          Такой буквы нет\n")
            print("          -1 попытка\n")
            
            if max_gues_let<guessed_letters:
                max_gues_let=guessed_letters
            
            guessed_letters=0
            points_progression=0
            try_quantity-=1
            
            if try_quantity==0:
                print("\n=============ВЫ ПРОИГРАЛИ===============\n")
                loose=True
                game_on=False
            

#=========ТЕЛО ИГРЫ=========
print("================ИГРА: УГАДАЙ СЛОВО================\n")

print("Ты получишь тему и увидишь определенное количество букв")
time.sleep(0.5)
print("Твоя задача - отгадать слово")
time.sleep(0.5)
print("Ты можешь написать одну букву или же сразу же слово целиком")
time.sleep(0.5)
print("Но имей в виду: если ты введешь полное слово и не угадаешь - ты проиграл")
time.sleep(0.5)
print('Когда захочешь прервать игру, напиши "Выход"')
time.sleep(0.5)
input("Вперед? (Нажмите любую клавишу)")
while game_on:
    right_choice=False
    words_array=[]
    print("\nВыбери тему из списка (напиши ее)\nЗвери\nПтицы\nРыбы\nНасекомые\nЦветы")
    while not right_choice:
        answer=input("\nТвой выбор: ")
        answer=answer.upper()
        if answer =='ЗВЕРИ':
            file='animals.txt'
            right_choice=True
        elif answer =='ПТИЦЫ':
            file='birds.txt'
            right_choice=True
        elif answer =='РЫБЫ':
            file='fishes.txt'
            right_choice=True
        elif answer =='НАСЕКОМЫЕ':
            file='bugs.txt'
            right_choice=True
        elif answer =='ЦВЕТЫ':
            file='flowers.txt'
            right_choice=True
        else:
            print("Пожалуйста, напиши тему из списка")
    #====ЧИТАЕМ ФАЙЛ И ПЕРЕМЕШИВАЕМ МАССИВ======

    out_file=open(file,'r')
    for i in out_file.readlines():
        words_array.append(i.strip())
    out_file.close()

    random.shuffle(words_array)
    print("\n================ТЕМА: "+str(answer)+"================\n")
    
    for flower in words_array:
        win,loose=False,False
        active_word=['_']*len(flower)
        print("Читы подсказывают:",flower)
        
        while try_quantity!=0:
            print("\n=============УГАДЫВАЙ БУКВУ===============\n")
            print("          Попыток осталось:", try_quantity)
            print("          Ваши баллы:",points)
            
            print("\n           ",end='')
            for symbol in range(len(active_word)):
                print(active_word[symbol],end=' ')
                
            answer=input("\n\nВаш ответ: ")
            print()
            answer_check(answer,flower) #Вызов функции
            time.sleep(1)
            if loose or win or game_exit:
                break
            
        if game_exit:
            game_on=False
            break
        
        if max_gues_let<guessed_letters:
            max_gues_let=guessed_letters

        print("\n\n===============СТАТИСТИКА===============\n")
        time.sleep(0.5)
        print("          У вас всего",points,"баллов")
        time.sleep(0.5)
        print("          Слов угадано:",guessed_words)
        time.sleep(0.5)
        print("          Букв угаданно подряд:",max_gues_let)
        time.sleep(0.5)
        print("\n===============СТАТИСТИКА===============\n")
        if loose:
            break
        input("Нажми любую клавишу")
        print("\n                  =============СЛЕДУЮЩЕЕ СЛОВО===============\n")
    print("Хочешь поиграть еще? (Да/Нет)")
    answer=input()
    answer=answer.upper()
    if answer=='ДА':
        game_on=True
        game_exit=False
    elif answer=="НЕТ":
        game_on=False
    else:
        print("Я сочту это за согласие :)")
        
