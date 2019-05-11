# Project-Group-14
Title : Handwriting Recognition
This application is intended to provide web based GUI, using which one can convert their handwritten notes to electronic files. Filtering techniques are used to pre-process the image before it is fed to the tesseract OCR engine. The tesseract engine converts the image to electronic text file.
Final application lets user to download the file as text or pdf, also letting the user to upload the text file directly to their Google drive.

## Tesseract OCR Engine Tool

* Tesseract is an open source text recognizer (OCR) Engine, available under the Apache 2.0 license.

* Tesseract was originally developed at Hewlett-Packard Laboratories Bristol and at Hewlett-Packard Co, Greeley Colorado between 1985 and 1994, with some more changes made in 1996 to port to Windows. In 2005 Tesseract was open sourced by HP. Since 2006 it is developed by Google.

* The existing model  has been trained on about 400000 textlines spanning about 4500 fonts.

* Tesseract uses LSTM Neural Network.


## Limitations

* Recognition of handwritten text in english does not works very well for cursive Handwriting. 
* Accuracy not so good for handwritten text in languages other than english.


## Results
* Image Pre-processing significantly improved image quality(for images with shadow) and O/P for tesseract.
* Interpreted handwritten text for english language for non-connected text with an accuracy of more than 85%.
* Interpreted printed text for other languages(Hindi, Punjabi, Telugu) with almost 100 % accuracy.


## Use Cases
* Students in School/College can scan handwritten notes and edit to add or correct information and finally store it in Cloud as an ebook to be accessible from anywhere
* Tourists/Journalists can take picture of the information about the place they visit and can edit later to write a story or an article
* Companies can eliminate manual entry of Invoices, Purchase Orders or Financial  information into existing systems helps in reducing time and effort 
* Employee Travel receipts for reimbursements
Scan household or grocery receipts for budget planning
* Hotels can scan the identity of the guest instead of the manual entry at the check-in


## Future Enhancements

* Improve the accuracy of the text being converted
* Additional Language support 
* Mobile/Smart Phone App  
* Additional Image input formats
* Highly Scalable architecture based on the usage  

