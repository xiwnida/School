import pygame, sys
pygame.init() 
 
ekraan = pygame.display.set_mode([800, 600])
pygame.display.set_caption("Pealkiri")
ekraan.fill([255, 255, 255])
pygame.draw.rect(ekraan, [0, 225, 0], [50, 50, 150, 80], 0)
pygame.display.flip() 
 
running = True
while running:
    for i in pygame.event.get():
        if i.type == pygame.QUIT:
            running = False
            pygame.quit() 
