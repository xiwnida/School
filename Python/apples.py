import pygame, random, sys
x = 200
y = 200

screen_width = 800
screen_height = 600

white = (255, 255, 255)
blue = (0, 127, 255)
red = (178, 34, 34)
black = (0, 0, 0)

step = 25
score=0

#tekst_font = pygame.font.Font(None, 30)
#tekst = tekst_font.render("Очки: "+str(score), 1, [204, 0, 0])

class Apple:
    def __init__(self):
        self.x=0
        self.y=0
        
def drawApple():
    apple=Apple()
    apple.x=random.randint(0+25, screen_width-25)
    apple.y=random.randint(0+25, screen_height-25)
    
    return apple

apples=[]
for i in range(15):
    apple=drawApple()
    apples.append(apple)
    
screen = pygame.display.set_mode([screen_width, screen_height])
running = True

while running:
    screen.fill([0, 127, 255])
    for apple in apples:
        pygame.draw.circle(screen, red, [apple.x, apple.y], 25, 0)
        pygame.draw.line(screen, black, [apple.x, apple.y], [apple.x+15, apple.y-30], 2)
    pygame.draw.circle(screen, white, [x, y], 25, 0)
    #screen.blit(tekst, [0, 0])
    pygame.display.flip()
    for i in pygame.event.get():
        if i.type == pygame.QUIT:
            running = False
            # Kui sündmuseks on klahvi allavajutamine...
        elif i.type == pygame.KEYDOWN:
            if i.key == pygame.K_UP:
                if y-step>=0:
                    y = y - step
            elif i.key == pygame.K_DOWN:
                if y+step<=screen_height:
                    y = y + step
            elif i.key == pygame.K_LEFT:
                if x-step>=0:
                    x = x - step
            elif i.key == pygame.K_RIGHT:
                if x+step<=screen_width:
                    x = x + step
        for apple in apples:
            if abs(x-apple.x)<25 and abs(y-apple.y)<25:
                apples.remove(apple)
                score+=1
                #tekst = tekst_font.render("Очки: "+str(score), 1, [204, 0, 0])
                
pygame.quit()
