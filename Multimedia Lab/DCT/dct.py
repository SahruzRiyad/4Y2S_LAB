import cv2
import matplotlib.pyplot as plt
import numpy as np

def applyDct(img):
    h,w = img.shape
    transformed_img = np.zeros((h,w))

    for i in range(0,h,16):
        for j in range(0,w,16):
            img_block = img[i:i+16,j:j+16]
            dct_block = cv2.dct(img_block.astype(np.float32))
            transformed_img[i:i+16,j:j+16] = dct_block

    return transformed_img

def applyIDct(img):
    h,w = img.shape
    reconstructed_img = np.zeros((h,w))

    for i in range(0,h,16):
        for j in range(0,w,16):
            img_block = img[i:i+16,j:j+16]
            idct_block = cv2.idct(img_block.astype(np.float32))
            reconstructed_img[i:i+16,j:j+16] = idct_block
    
    return reconstructed_img

img = cv2.imread("/home/riad/Documents/Mutlimedia Practice/DCT/lena.png",0)
transformed_img = applyDct(img)
reconstructed_img = applyIDct(transformed_img)

img_list = [img,transformed_img,reconstructed_img]
img_title= ["Source image","DCT transformed image","Reconstructed image(IDCT)"]

def plot_img(img_list,img_title):
    r,c = 2,2

    for i in range(len(img_list)):
        plt.subplot(r,c,i+1)
        plt.imshow(img_list[i],cmap='gray')
        plt.title(img_title[i])
    
    plt.show()

plot_img(img_list,img_title)