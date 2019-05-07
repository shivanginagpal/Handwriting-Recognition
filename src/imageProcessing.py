import cv2 as cv
import numpy as np
from matplotlib import pyplot as plt
img = cv.imread('test3.jpg',0)
block_size = 9
constant = 2
k = np.ones((5,5),np.uint8)
blur = cv.GaussianBlur(img,(7,7),0)
fnoise=cv.medianBlur(blur,3)
th1 = cv.adaptiveThreshold(fnoise, 255, cv.ADAPTIVE_THRESH_MEAN_C, cv.THRESH_BINARY, block_size, constant)
th2 = cv.adaptiveThreshold (fnoise, 255, cv.ADAPTIVE_THRESH_GAUSSIAN_C, cv.THRESH_BINARY, block_size, constant)
#blu = cv.GaussianBlur(th2,(9,9),0)
fnois=cv.medianBlur(th2,3)
#erosion=cv.erode(fnois, k, iterations=1)
dilation=cv.dilate(fnois, k, iterations=5)
cv.imshow('img',dilation)
cv.waitKey(0)
cv.destroyAllWindows()  
cv.imwrite('t56.png',fnois) 
plt.imshow(th2)
plt.title('image') 
plt.show() 
