import cv2 as cv
import numpy as np
from matplotlib import pyplot as plt
img = cv.imread('test3.jpg',0)
# global thresholding
ret1,th1 = cv.threshold(img,0,255,cv.THRESH_BINARY)
# Otsu's thresholding
ret2,th2 = cv.threshold(img,0,255,cv.THRESH_BINARY+cv.THRESH_OTSU)
# Otsu's thresholding after Gaussian filtering
blur = cv.GaussianBlur(img,(5,5),0)
ret3,th3 = cv.threshold(blur,0,255,cv.THRESH_BINARY+cv.THRESH_OTSU)
# plot all the images and their histograms
#cv.imshow('img',th3)
fnoise=cv.medianBlur(th3,3)
cv.imshow('img',fnoise)
cv.waitKey(0)
cv.destroyAllWindows()  
cv.imwrite('t3.png',th3) 
plt.imshow(th3)
plt.title('image') 
plt.show()
