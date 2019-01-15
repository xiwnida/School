import pygame
import random

#colors
white = (255, 255, 255)
blue = (0, 127, 255)

screen_width = 700
screen_height = 500
snow_size = 5

class Snow:
    def __init__(self):
        self.x = 0
        self.y = 0
        self.new_x=0
        self.change_y = 1
        self.change_x = 1

def make_snow():
    snow = Snow()
    snow.x = random.randrange(snow_size, screen_width-snow_size)
    snow.y = random.randint(-60, 0)
    snow.new_x=random.randint(5,9)

    return snow

def main():
    pygame.init()

    size = [screen_width, screen_height]
    screen = pygame.display.set_mode(size)
    #pygame.image.load('snow.png
 
    pygame.display.set_caption("Let it SNOW")
 
    # Loop until the user clicks the close button.
    done = False
 
    # Used to manage how fast the screen updates
    clock = pygame.time.Clock()
 
    snow_list = []


    while not done:
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                done = True
        snow = make_snow()
        snow_list.append(snow)
                

        for snow in snow_list:
            snow.y+=snow.change_y
            snow.x+=snow.change_x
            snow.new_x+=snow.change_x
            if snow.new_x==10:
                snow.change_x=-1
            if snow.new_x==-10:
                snow.change_x=1
            
        
            if snow.y>screen_height-5:
                snow.change_x=0
                snow.change_y=0
                

        screen.fill(blue)
        for snow in snow_list:
            pygame.draw.circle(screen, white, [snow.x, snow.y], snow_size, 0)

        clock.tick(60)

        pygame.display.flip()

    pygame.quit()

main()
                
