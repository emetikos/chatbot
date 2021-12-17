import os
import pandas as pd
import glob
import pdfplumber
import xlsxwriter
# workbook = x

# pdfplumber is used to extract words from pdf docs


# pdfFileObj = open("SavedKeywords.xlsx", "rb")

# get_keyword to take all the keywords needed from pdf doc
# words that come before, after and text being retrieved from the pdf doc  the page keyword is being taken from
# takes keyword form the start value and end value

def get_keyword(start, end, text):
    for i in range(len(start)):
        try:
            field = ((text.split(start[i]))[1].split(end[i])[0])
            return field
        except:
            continue


# create a dataframe whereby common words will be extracted from multiple pdf files
def main() -> object:
    my_dataframe = pd.DataFrame()

    # glob is used to identify all pdf docs., so will iterate through all attached pdf files

    # file location of all pdf docs
    # for loop to extract keyword from every pdf document
    for files in glob.glob("/Users/elsieadjei/PycharmProjects/PDF extraction-elsie/venv/bin/Hello/*.pdf"):
        with pdfplumber.open(files) as pdf:
            page = pdf.pages[0]  # take first page first
            text = page.extract_text()
            text = " ".join(text.split())

            # search for specific keywords within the text
            # all keywords that will be appended into the dataframe

            # keyword 1
            start = ['testing']
            end = ['in']
            keyword1 = get_keyword(start, end, text)

            # keyword 2
            start = ['and']
            end = ['attached']
            keyword2 = get_keyword(start, end, text)

            # kw3
            start = ['']
            end = ['report']
            keyword3 = get_keyword(start, end, text)

            # kw4
            start = ['group']
            end = ['']
            keyword4 = get_keyword(start, end, text)

            # kw5
            start = ['']
            end = ['']
            text = ['project']
            keyword5 = get_keyword(start, end, text)

            # list to run through all the keywords in the text from pdf
            my_list = [keyword1, keyword2, keyword3, keyword4, keyword5]
            #  ['project', 'group', 'interest', 'report', 'submitted']

            my_list = pd.Series(my_list)  # panda series to append words

            # append list as a row of keywords to the dataframe
            my_dataframe = my_dataframe.append(my_list, ignore_index=True)

            print("Keywords from text has been retrieved")

    my_dataframe = my_dataframe.rename(columns={0: 'Keyword 1',
                                                1: 'Keyword 2',
                                                2: 'Keyword 3',
                                                3: 'Keyword 4',
                                                4: 'Keyword 5'})

    # text/excel directory where keywords will be stored
    save_path = ('/Users/elsieadjei/Desktop/SavedKeywords')
    # os.chdir(save_path)

    # dataframe to a textfile or .xlsx file
    my_dataframe.to_excel('SavedKeywords.xlsx', sheet_name='my dataframe')









# if __name__ == '__main__':
#     main()

