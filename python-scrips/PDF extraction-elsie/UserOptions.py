import Question as question

# //import Question as Question

question.test()

# array of question to user
question_topic = [
    "What topic do you need more guidance on?\n (1)Neurons\n (2) Simulated Neurons\n (3) Point Neurons\n"
]

# keyword selection options for user
questions = [
    Question(question_topic[0], "1", "2", "3")
]


# list of questions to ask the user
def run_test(questions):
    pass


def check_question(questions):
    for question in questions:
        answer = input(question.prompt)
    print("You want to know more on" + str(len(questions)))

run_test(questions)





