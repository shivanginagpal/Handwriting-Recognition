#!/usr/bin/python3
# -*- coding: utf-8 -*-

import cv2 as cv
import numpy as np
import matplotlib.pyplot as plt
import sys

filename = sys.argv[1]
#print(filename)
img = cv.imread(filename,0)
block_size = 9
constant = 2
k = np.ones((5,5),np.uint8)
blur = cv.GaussianBlur(img,(7,7),0)
fnoise=cv.medianBlur(blur,3)
th1 = cv.adaptiveThreshold(fnoise, 255, cv.ADAPTIVE_THRESH_MEAN_C, cv.THRESH_BINARY, block_size, constant)
th2 = cv.adaptiveThreshold (fnoise, 255, cv.ADAPTIVE_THRESH_GAUSSIAN_C, cv.THRESH_BINARY, block_size, constant)
blu = cv.GaussianBlur(th2,(5,5),0)
fnois=cv.medianBlur(blu,3)
#erosion=cv.erode(fnois, k, iterations=1)
#dilation=cv.dilate(fnois, k, iterations=10)
#cv.imshow('img',dilation)
#cv.waitKey(0)
#cv.destroyAllWindows(
cv.imwrite('clearimage.png',fnois) 
#plt.imshow(th2)
#plt.title('image') 
#plt.show()    
