row=int(input())
col=row
for i in range(row+1):
    for j in range(i):
        print('*', end='')
    print()
