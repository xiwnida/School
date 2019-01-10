import pygame, sys 
from pygame.locals import * 
pygame.init() 
(windows_width, windows_height, windows_title) = (600, 400, "Simple Figure") 
screen = pygame.display.set_mode((windows_width,windows_height),0,32) 
pygame.display.set_caption(windows_title) 
windows_bgcolor = (255,255,255) 
mainLoop = True 
#initial data here 
while mainLoop: 
 for event in pygame.event.get(): 
  if event.type == QUIT: 
   mainLoop = False 
 screen.fill(windows_bgcolor) 
 #create frame here 
 pygame.display.update() 
pygame.quit() 
#destroy data here 
