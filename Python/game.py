import pygame, sys
pygame.init()
screen = pygame.display.set_mode([800, 600])
pygame.display.set_caption("Animeerimine")
cat2=pygame.image.load('cat1.png')
cat1=pygame.image.load('cat2.png')

picture=cat1
x = 0
y = 100
x2=400
y2=0
x3=0
y3=200


running = True
while running:
        
    for i in pygame.event.get():
        if i.type == pygame.QUIT:
            running = False

    screen.fill([255, 255, 255])
    pygame.draw.circle(screen,(200,0,255),(x,y),50,0)
    pygame.draw.circle(screen,(200,0,255),(x2,y2),50,0)
    screen.blit(picture, (x3, y3))
    pygame.display.flip()
    pygame.time.delay(20)
    if x==0:
        z=5
    elif x==800:
        z=-5
    x+=z
    if y2==0:
        z2=5
    elif y2==600:
        z2=-5
    y2+=z2
    if x3==0:
        picture=cat1
        z3=5
    elif x3==400:
        picture=cat2
        z3=-5
    x3+=z3
        
    
                
pygame.quit()  
