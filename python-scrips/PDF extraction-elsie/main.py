import PyPDF2

# open the pdf file
pdfFileObj = open("Hello.pdf", "rb")

# creating an object reader to read file
pdfReader = PyPDF2.PdfFileReader(pdfFileObj)

# print out no. of pages in the file
print("Number of Pages: ",pdfReader.numPages)

pageObj = pdfReader.getPage(0)

# extract all the text from file/doc

print(pageObj.extractText())
pdfFileObj.close()

# for loop to extract each page from the file/doc
p = 0
while p < pdfReader.getNumPages():
    pageinfo = pdfReader.getPage(p)
    print(pageinfo.extractText())
    p = p+1



#  search_keywords=['chatbot', 'testing', 'open']
#     # ['project', 'group', 'interest', 'report', 'submitted']
#
#     for sentence in sentences :
#         lst = []
#         for word in search_keywords: if word in sentence:
#                 lst.append(word);
