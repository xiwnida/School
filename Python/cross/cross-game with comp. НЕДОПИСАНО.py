import pygame, sys
import random
import time
pygame.init()
black = [0, 0, 0]
white = [255, 255, 255]
red = [255, 0, 0]

cross = pygame.image.load("cross.png")
null = pygame.image.load("null.png")
x=0
y=0
games=0
cross_static=0
null_static=0
dead_heat=0
win=False
turn='cross'
first='cross'
cords=[[0,600,600,800],[0,0,200,200],[200,0,400,200],[400,0,600,200],[0,200,200,400],[200,200,400,400],[400,200,600,400],[0,400,200,600],[200,400,400,600],[400,400,600,600]] #Содержит координаты прямоугольников
fields=[0, 1, 2, 3, 4, 5, 6, 7, 8, 9] #содержит значения квадратов
tekst_font = pygame.font.Font(None, 50)
tekst_font2 = pygame.font.Font(None, 30)
tekst = tekst_font.render("Очередь крестов", 1, [204, 0, 0])
again=tekst_font.render("Нажми, чтобы играть еще", 1, [204, 0, 0])
static=tekst_font2.render("Кресты: "+str(cross_static)+ " Нули: "+str(null_static)+" Ничьих: "+str(dead_heat), 1, [204,0,0])

def OpponentTurn():
    global fields
    global cords
    global turn
    global text
    circle=True
    combination=[[1,2,3],[4,5,6],[7,8,9],[1,4,7],[2,5,8],[3,6,9],[1,5,9],[3,5,7]]
    if 'null' not in fields or 'null' in fields:
        while circle:
            var=random.choice(fields)
            
            if var !='cross' and var !='null' and var !=0:
                print(var)
                screen.blit(null, (cords[var][0],cords[var][1]))
                turn='cross'
                fields[var]='null'
                tekst = tekst_font.render("Очередь крестов", 1, [204, 0, 0])
                pygame.draw.rect(screen, white, [10,610,590,790], 0)
                screen.blit(tekst, [150, 670])
                WinControl('null')
                pygame.display.update()
                break
        
            
        

def WinControl(player):
    global fields
    global win
    global first
    global turn
    global tekst
    global cross_static
    global null_static
    global dead_heat
    global games
    
    if fields[1]==fields[2]==fields[3]==player:
        pygame.draw.line(screen, red, [0,100], [600 ,100], 5)
        win=True
    elif fields[4]==fields[5]==fields[6]==player:
        pygame.draw.line(screen, red, [0,300], [600 ,300], 5)
        win=True
    elif fields[7]==fields[8]==fields[9]==player:
        pygame.draw.line(screen, red, [0,500], [600 ,500], 5)
        win=True
    elif fields[1]==fields[4]==fields[7]==player:
        pygame.draw.line(screen, red, [100,0], [100 ,600], 5)
        win=True
    elif fields[2]==fields[5]==fields[8]==player:
        pygame.draw.line(screen, red, [300,0], [300 ,600], 5)
        win=True
    elif fields[3]==fields[6]==fields[9]==player:
        pygame.draw.line(screen, red, [500,0], [500 ,600], 5)
        win=True
    elif fields[1]==fields[5]==fields[9]==player:
        pygame.draw.line(screen, red, [0,0], [600 ,600], 5)
        win=True
    elif fields[3]==fields[5]==fields[7]==player:
        pygame.draw.line(screen, red, [600,0], [0 ,600], 5)
        win=True
    elif games==9:
        tekst = tekst_font.render("Ничья!", 1, [204, 0, 0])
        pygame.draw.rect(screen, white, [10,610,590,790], 0)
        dead_heat+=1
        static=tekst_font2.render("Кресты: "+str(cross_static)+ " Нули: "+str(null_static)+" Ничьих: "+str(dead_heat), 1, [204,0,0])
        screen.blit(tekst, [240, 670])
        screen.blit(again, [90, 720])
        screen.blit(static, [5, 775])
        player=''
        win=True





    if win==True:
        if player=='cross':
            tekst = tekst_font.render("Кресты победили!", 1, [204, 0, 0])
            pygame.draw.rect(screen, white, [10,610,590,790], 0)
            cross_static+=1
            static=tekst_font2.render("Кресты: "+str(cross_static)+ " Нули: "+str(null_static)+" Ничьих: "+str(dead_heat), 1, [204,0,0])
            screen.blit(tekst, [150, 670])
            screen.blit(again, [90, 720])
            screen.blit(static, [5, 775])
            turn='cross'
            tekst = tekst_font.render("Очередь крестов", 1, [204, 0, 0])
            first='cross'
            
        elif player=='null':
            tekst = tekst_font.render("Нули победили!", 1, [204, 0, 0])
            pygame.draw.rect(screen, white, [10,610,590,790], 0)
            null_static+=1
            static=tekst_font2.render("Кресты: "+str(cross_static)+ " Нули: "+str(null_static)+" Ничьих: "+str(dead_heat), 1, [204,0,0])
            screen.blit(tekst, [150, 670])
            screen.blit(again, [90, 720])
            screen.blit(static, [5, 775])
            
            turn='null'
            tekst = tekst_font.render("Очередь нулей", 1, [204, 0, 0])
            first='null'
        else:
            if first=='cross':
                turn='null'
                tekst = tekst_font.render("Очередь нулей", 1, [204, 0, 0])
                first='null'
            elif first=='null':
                turn='cross'
                tekst = tekst_font.render("Очередь крестов", 1, [204, 0, 0])
                first='cross'
        


screen = pygame.display.set_mode([600, 800])
pygame.display.set_caption("cross")
screen.fill(white)
pygame.draw.line(screen, black, [200,0], [200 ,600], 5)
pygame.draw.line(screen, black, [400,0], [400 ,600], 5)
pygame.draw.line(screen, black, [0,0], [600 ,0], 5)
pygame.draw.line(screen, black, [0,200], [600 ,200], 5)
pygame.draw.line(screen, black, [0,400], [600 ,400], 5)
pygame.draw.line(screen, black, [0,600], [600 ,600], 5)
screen.blit(tekst, [150, 670])

pygame.display.flip() 
 
running = True
while running:
    for i in pygame.event.get():
        if i.type == pygame.QUIT:
            running = False
            pygame.quit()
        if win==False:
            if i.type == pygame.MOUSEBUTTONDOWN:
                x, y = i.pos
                print(x,y)
                for j in range(len(cords)):
                    if fields[j]!='cross' and fields[j]!='null' and fields!=0:
                        if x>cords[j][0] and x<cords[j][2]:
                            if y>cords[j][1] and y<cords[j][3]:
                                games+=1
                                if turn=='cross':
                                    screen.blit(cross, (cords[j][0],cords[j][1]))
                                    
                                    turn='null'
                                    fields[j]='cross'
                                    tekst = tekst_font.render("Очередь нулей", 1, [204, 0, 0])
                                    pygame.draw.rect(screen, white, [10,610,590,790], 0)
                                    screen.blit(tekst, [150, 670])
                                    WinControl('cross')
                                    pygame.display.update()
                                    time.sleep(1)
                                    if not win:
                                        OpponentTurn()
                                    
                                elif turn=='null':
                                    OpponentTurn()
                                #    screen.blit(null, (cords[j][0],cords[j][1]))
                                # 
                                #    turn='cross'
                                #    fields[j]='null'
                                #    tekst = tekst_font.render("Очередь крестов", 1, [204, 0, 0])
                                #    pygame.draw.rect(screen, white, [10,610,590,790], 0)
                                #    screen.blit(tekst, [150, 670])
                                #    WinControl('null')
                                #    pygame.display.update()
                                #    print(fields)
        else:
            if i.type == pygame.MOUSEBUTTONDOWN:
                x, y = i.pos
                if y>600 and y<800:
                    screen.fill(white)
                    pygame.draw.line(screen, black, [200,0], [200 ,600], 5)
                    pygame.draw.line(screen, black, [400,0], [400 ,600], 5)
                    pygame.draw.line(screen, black, [0,0], [600 ,0], 5)
                    pygame.draw.line(screen, black, [0,200], [600 ,200], 5)
                    pygame.draw.line(screen, black, [0,400], [600 ,400], 5)
                    pygame.draw.line(screen, black, [0,600], [600 ,600], 5)
                    screen.blit(tekst, [150, 670])
                    fields=[None, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                    win=False
                    pygame.display.flip() 
             
