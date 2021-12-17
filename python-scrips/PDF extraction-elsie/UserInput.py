def questions(questionsList):   # allow it to accept mark's parameters
    for i in questionsList:
        print(i)


    print("[1] Neurons")
    print("[2] Simulated Neurons")
    print("[3] Point Neurons")


questions(list_items)
option = int(input("Which topic do you need help with? "
                   "Please select the corresponding number: "))

while option != 0:
    if option ==1:
        # chosen keyword 1
        print ("You have chosen Neurons")
    elif option == 2:
        # chosen keyword 2
         print("You have chosen Simulated Neurons")
    elif option == 3:
        # chosen keyword 3
        print("You have chosen Point Neurons")
    else:
        print("Please select a topic")

    print()
    questions()
    option = int(input("Select your topic:"))
