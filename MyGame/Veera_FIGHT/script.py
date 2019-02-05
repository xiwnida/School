import pygame, random
pygame.init()

#--------Данные---------
screen_width = 640
screen_height = 512
screen = pygame.display.set_mode([screen_width, screen_height])
pygame.display.set_caption("Сражайся")
pygame.key.set_repeat(2,10)

bg = pygame.image.load('back.jpg')

font = pygame.font.Font(None, 50)
tekst = font.render("ВЫ ПРОИГРАЛИ", 1, [0, 0, 0])

#--------Спрайты игрока---------
player_down = [pygame.image.load('player_down1.png'), pygame.image.load('player_down2.png'), pygame.image.load('player_down3.png')]
player_right = [pygame.image.load('player_right1.png'), pygame.image.load('player_right2.png'), pygame.image.load('player_right3.png')]
player_left = [pygame.image.load('player_left1.png'), pygame.image.load('player_left2.png'), pygame.image.load('player_left3.png')]
player_up = [pygame.image.load('player_up1.png'), pygame.image.load('player_up2.png'), pygame.image.load('player_up3.png')]

player = [player_down, player_right, player_left, player_up]

#--------Первый враг---------
enemy1_down = [pygame.image.load('enemy1_down1.png'), pygame.image.load('enemy1_down2.png'), pygame.image.load('enemy1_down3.png')]
enemy1_right = [pygame.image.load('enemy1_right1.png'), pygame.image.load('enemy1_right2.png'), pygame.image.load('enemy1_right3.png')]
enemy1_left = [pygame.image.load('enemy1_left1.png'), pygame.image.load('enemy1_left2.png'), pygame.image.load('enemy1_left3.png')]
enemy1_up = [pygame.image.load('enemy1_up1.png'), pygame.image.load('enemy1_up2.png'), pygame.image.load('enemy1_up3.png')]

enemy_one = [enemy1_down, enemy1_right, enemy1_left, enemy1_up]

#--------Второй враг---------
enemy2_down = [pygame.image.load('enemy2_down1.png'), pygame.image.load('enemy2_down2.png'), pygame.image.load('enemy2_down3.png')]
enemy2_right = [pygame.image.load('enemy2_right1.png'), pygame.image.load('enemy2_right2.png'), pygame.image.load('enemy2_right3.png')]
enemy2_left = [pygame.image.load('enemy2_left1.png'), pygame.image.load('enemy2_left2.png'), pygame.image.load('enemy2_left3.png')]
enemy2_up = [pygame.image.load('enemy2_up1.png'), pygame.image.load('enemy2_up2.png'), pygame.image.load('enemy2_up3.png')]

enemy_two = [enemy2_down, enemy2_right, enemy2_left, enemy2_up]

#--------Третий враг---------
enemy3_down = [pygame.image.load('enemy3_down1.png'), pygame.image.load('enemy3_down2.png'), pygame.image.load('enemy3_down3.png')]
enemy3_right = [pygame.image.load('enemy3_right1.png'), pygame.image.load('enemy3_right2.png'), pygame.image.load('enemy3_right3.png')]
enemy3_left = [pygame.image.load('enemy3_left1.png'), pygame.image.load('enemy3_left2.png'), pygame.image.load('enemy3_left3.png')]
enemy3_up = [pygame.image.load('enemy3_up1.png'), pygame.image.load('enemy3_up2.png'), pygame.image.load('enemy3_up3.png')]

enemy_three = [enemy3_down, enemy3_right, enemy3_left, enemy3_up]

#--------Спрайты лазера---------
laser_en = [pygame.image.load('laser_en_down.png'), pygame.image.load('laser_en_right.png'), pygame.image.load('laser_en_left.png'), pygame.image.load('laser_en_up.png')]
laser_pl = [pygame.image.load('laser_pl_down.png'), pygame.image.load('laser_pl_right.png'), pygame.image.load('laser_pl_left.png'), pygame.image.load('laser_pl_up.png')]


#--------------Стены------------------
class Wall:
    def __init__(self, x1, y1, x2, y2):  #x1, y1 - верхняя левая точка, x1, y2 - нижняя правая точка
        self.x1 = x1
        self.y1 = y1
        self.x2 = x2
        self.y2 = y2

wall1 = Wall(0, 0, 640, 64)
wall2 = Wall(0, 0, 32, 512)
wall3 = Wall(0, 448, 640, 512)
wall4 = Wall(608, 0, 640, 512)

wall5 = Wall(64, 96, 96, 160)
wall6 = Wall(128, 64, 160, 160)
wall7 = Wall(192, 96, 320, 160)
wall8 = Wall(448, 64, 480, 160)
wall9 = Wall(544, 96, 576, 224)

wall10 = Wall(32, 192, 256, 256)
wall11 = Wall(288, 192, 320, 288)
wall12 = Wall(352, 128, 384, 352)
wall13 = Wall(384, 128, 416, 192)
wall14 = Wall(384, 224, 448, 288)
wall15 = Wall(480, 192, 512, 288)

wall16 = Wall(64, 320, 288, 384)
wall17 = Wall(320, 384, 352, 448)
wall18 = Wall(416, 352, 480, 416)
wall19 = Wall(448, 320, 480, 352)
wall20 = Wall(512, 320, 544, 384)
wall21 = Wall(544, 256, 576, 416)

#---------------Массив со стенами-----------------
walls = [wall1, wall2, wall3, wall4, wall5, wall6, wall7, wall8, wall9, wall10, wall11,
         wall12, wall13, wall14, wall15, wall16, wall17, wall18, wall19, wall20, wall21]

#----------Класс для врагов и игрока------------
class Eye:
    def __init__(self, sprite, direction, x, y, shootSpeed):
        self.sprite = sprite                                #массив изображений
        self.direction = direction                          #текущее направление
        self.shootSpeed = shootSpeed                        #скорость стрельбы (игроком не используется)
        self.shoot=0                                        #счетчик для регулирования частоты выстрелов (игроком не используется)
        self.num = 0                                        #номер спрайта для анимации
        self.image = self.sprite[self.direction][self.num]  #кадр в текущий момент
        self.x = x
        self.y = y
        self.exist = True                                   #если false - исчезает из виду и затем удаляется из массива. Так же отвечает за смерть игрока

    #----------Метод, отвечает за передвижение врага----------
    def move(self):

        #------------Cтолкновения со стенами-----------
        for wall in walls:
            if self.direction == 0 and self.y+32 == wall.y1 and self.x >= wall.x1 and self.x < wall.x2:
                self.turn()
                break
            elif self.direction == 1 and self.x+32 == wall.x1 and self.y >= wall.y1 and self.y < wall.y2:
                self.turn()
                break
            elif self.direction == 2 and self.x == wall.x2 and self.y >= wall.y1 and self.y < wall.y2:
                self.turn()
                break
            elif self.direction == 3 and self.y == wall.y2 and self.x >= wall.x1 and self.x < wall.x2:
                self.turn()
                break
        #----------Если не было - враг двигается в зависимости от направления-----------
        else:
            if self.direction == 0:
                self.y += 16
            elif self.direction == 1:
                self.x += 16
            elif self.direction == 2:
                self.x -= 16
            elif self.direction == 3:
                self.y -= 16
            self.anim()
            
    #--------Метод, поворачивает врага при столкновении со стеной---------
    def turn(self):
        if self.direction == 0 or self.direction == 3:
            self.direction = random.choice([1,2])
            self.move()
        elif self.direction == 1 or self.direction == 2:
            self.direction = random.choice([0,3])
            self.move()
        self.anim()

    #---------Метод, анимация движения---------
    def anim(self):
        if self.num == 0:
            self.num = 1
        elif self.num == 1:
            self.num = 2
        elif self.num == 2:
            self.num = 1
        self.image = self.sprite[self.direction][self.num]

    #-----------Метод, выстреливает лазером и следит за частотой стрельбы-----------
    def shooting(self):
        global lasers

        self.shoot += 1
        if self.shoot == self.shootSpeed:
            lasers.append(Laser(laser_en, self.x, self.y, self.direction))
            self.shoot = 1

class Laser:
    def __init__(self, sprite, x, y, direction):
        self.sprite = sprite
        self.direction = direction
        
        if self.direction == 0:  #Рассчитывает координаты, в зависимости от направления
            self.x = x
            self.y = y+32
        if self.direction == 1:
            self.x = x+32
            self.y = y
        if self.direction == 2:
            self.x = x-32
            self.y = y
        if self.direction == 3:
            self.x = x
            self.y = y-32
            
        self.exist = True  #если false - убирает лазер из виду, и затем удаляет из массива

    #----------Рассчет столкновений и движения-----------
    def move(self):

        check = True

        for wall in walls:

            #------------Проверка столкновений. Лазер уничтожается при столкновении со стеной----------------
            if self.direction == 0:
                if self.y+24 >= wall.y1 and self.y+16 <=wall.y2 and self.x >= wall.x1 and self.x < wall.x2:
                    self.exist = False
                    check = False
                    break
                    
            elif self.direction == 1:
                if self.x+24 >= wall.x1 and self.x+16 <=wall.x2 and self.y >= wall.y1 and self.y < wall.y2:
                    self.exist = False
                    check = False
                    break
                    
            elif self.direction == 2:
                if self.x+8 >= wall.x1 and self.x+16 <=wall.x2 and self.y >= wall.y1 and self.y < wall.y2:
                    self.exist = False
                    check = False
                    break
                    
            elif self.direction == 3:
                if self.y+8 >= wall.y1 and self.y+16 <=wall.y2 and self.x >= wall.x1 and self.x < wall.x2:
                    self.exist = False
                    check = False
                    break

        #-------------Проверка на столкновение лазера врага и игрока-------------
        if abs(laser.x - player.x) <32 and abs(laser.y - player.y) <32 and self.sprite == laser_en:
            self.exist = False
            player.exist = False
            check = False

        #------------Если координаты лазера и врага пересекаются. Так же если лазер принадлежит игроку. Враги не будут убивать друг друга----------------
        for enemy in enemies:
            if abs(self.x - enemy.x) <32 and abs(self.y - enemy.y) <32 and self.sprite == laser_pl:
                self.exist = False
                enemy.exist = False
                check = False
                break

        #---------Если ничего из вышеперечисленного не случилось, лазер двигается----------
        if check:
            if self.direction == 0:
                self.y += 24
            elif self.direction == 1:
                self.x += 24
            elif self.direction == 2:
                self.x -= 24
            elif self.direction == 3:
                self.y -= 24
        
#----------Создаем трех врагов и игрока. Враги идут в массив--------
enemy1 = Eye(enemy_one, 0, 32, 64, 20)
enemy2 = Eye(enemy_two, 0, 576, 64, 25)
enemy3 = Eye(enemy_three, 2, 576, 416, 15)
player = Eye(player, 1, 32, 416, 0)
enemies = [enemy1, enemy2, enemy3]

lasers = [] #Лазеров пока нет
score = 0

running = True

while running:
    screen.blit(bg, (0, 0))
    
    #------------Враги, двигаются, стреляют--------
    if enemies:
        for enemy in enemies:
            if enemy.exist:
                screen.blit(enemy.image, (enemy.x, enemy.y))
                enemy.move()
                enemy.shooting()
                
        #--------Если враг был уничтожен, он удаляется из массива--------
        for enemy in enemies:
            if not enemy.exist:
                enemies.remove(enemy)
                
    #--------Если массив пуст, игрок победил----------
    else:
        tekst = font.render("ВЫ ПОБЕДИЛИ", 1, [0, 0, 0])
        player.end = True
        
        
    #--------Игрок двигается-----------
    screen.blit(player.image, (player.x, player.y))
    player.anim()

    #------------Если игрок был уничтожен, игра проиграна---------
    if not player.exist:
        screen.blit(tekst, (200, 200))
        pygame.display.flip()
        running = False
        pygame.time.wait(2000)

    #----------Если лазеры существуют, они двигаются----------
    if lasers and player.exist:
        for laser in lasers:
            screen.blit(laser.sprite[laser.direction], (laser.x, laser.y))
            laser.move()
            
        #------------Если лазер столкнулся с чем то, он удаляется из массива----------
        for laser in lasers:
            if laser.exist == False:
                lasers.remove(laser)

    
    
    for i in pygame.event.get():
        if i.type == pygame.QUIT:
            running = False

        elif i.type == pygame.KEYDOWN:

            #----------Клавиша ПРОБЕЛ создает лазер игрока----------
            if i.key == pygame.K_SPACE:

                #-----------Проверка. Пока существует лазер игрока, невозможно выстрелить еще раз--------
                for laser in lasers:
                    if laser.sprite == laser_pl and laser.exist:
                        break
                else:
                    lasers.append(Laser(laser_pl, player.x, player.y, player.direction))

            #----------Если игрок сталкивается со стеной, движения не происходит--------------
            if i.key == pygame.K_DOWN:
                player.direction = 0
                for wall in walls:
                    if player.y+32 == wall.y1 and player.x+32 > wall.x1 and player.x < wall.x2:
                        break
                else:
                    player.y +=16
                    
            elif i.key == pygame.K_RIGHT:
                player.direction = 1
                for wall in walls:
                    if player.x+32 == wall.x1 and player.y+32 > wall.y1 and player.y < wall.y2:
                        break
                else:
                    player.x += 16
                    
            elif i.key == pygame.K_LEFT:
                player.direction = 2
                for wall in walls:
                    if player.x == wall.x2 and player.y+32 > wall.y1 and player.y < wall.y2:
                        break
                else:
                    player.x -= 16

            elif i.key == pygame.K_UP:
                player.direction = 3
                for wall in walls:
                    if player.y == wall.y2 and player.x+32 > wall.x1 and player.x < wall.x2:
                        break
                else:
                    player.y -= 16
                    
    #---------Обновить изображение персонажа, чтобы не подлагивал после смены направления-----------
    player.image = player.sprite[player.direction][player.num]
    
    pygame.display.flip()
    pygame.time.delay(40) 

pygame.quit()
