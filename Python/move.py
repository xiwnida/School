import pygame
x = 200
y = 200
x1=100
y1=100
screen_width = 800
screen_height = 600
samm = 50
screen = pygame.display.set_mode([screen_width, screen_height])
running = True
while running:
    screen.fill([0, 127, 255])
    pygame.draw.circle(screen, (255,255,255), [x, y], 25, 0)
    pygame.draw.circle(screen, (255,255,255), [x1, y1], 20, 0)
    pygame.display.flip()
    for i in pygame.event.get():
        if i.type == pygame.QUIT:
            running = False
            # Kui sündmuseks on klahvi allavajutamine...
        elif i.type == pygame.KEYDOWN:
            if i.key == pygame.K_UP:
                if y-samm>=0:
                    y = y - samm
            elif i.key == pygame.K_DOWN:
                if y+samm<=screen_height:
                    y = y + samm
            elif i.key == pygame.K_LEFT:
                if x-samm>=0:
                    x = x - samm
            elif i.key == pygame.K_RIGHT:
                if x+samm<=screen_width:
                    x = x + samm
        elif i.type == pygame.MOUSEMOTION:
            x1,y1 = i.pos
pygame.quit()
