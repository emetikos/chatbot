from classification import classification

"""
Creates a a loop to accent a user's input until the user terminates chooses to terminate it
Creates an instance of the classification class
Calls the functions from the classification class
"""
while True:
    user = input("You:")
    if user == "exit":
        break

    si = classification(user)

    si = classification(user)

    si.text_tokenize()
    test = si.classify()
    if test:
        print("is '" + test + "' what you looking for")
    # print("stop words: ", si.clean_stop_words())
    # print(si.text_lemmatizer())

    # print("nouns: ", si.print_nouns())
    #
    # response = si.classify()
    # print("Is " + response + " what you looking for ?")

    #
    # # print(userInput.text_tokenize())
    # # print(" ")
    #
    # userInput.text_lemmatizer()
    # print(" ")
    #
    # userInput.clean_stop_words()
    # print(" ")
    #
    # userInput.print_verbs()
    # print(" ")
    #
    # userInput.print_nouns()
    # print(" ")
    #
    # userInput.print_adjectives()
    # print(" ")
    #
    # userInput.print_chunks()
