import random
import json
# for serialization
import pickle
import numpy as np
import os

import nltk

# reducing words to it's stem, for example work, working, worked, works treats as the same word
from nltk.stem import WordNetLemmatizer

# function to load the model that been created in the training script
from tensorflow.keras.models import load_model

os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'

# lemmatize individual words
lemmatizer = WordNetLemmatizer()
# reads the content of the json file as text and in the result getting json object
intents = json.loads(open('intents.json').read())
# load all prepared files in the training script
words = pickle.load(open('words.pkl', 'rb'))
classes = pickle.load(open('classes.pkl', 'rb'))
model = load_model('chatbotmodel.h5')


# function for cleaning up the sentences
def clean_up_sentence(sentence):
    sentence_words = nltk.word_tokenize(sentence)
    sentence_words = [lemmatizer.lemmatize(word) for word in sentence_words]
    return sentence_words


# function for getting the bag of words.
def bag_of_words(sentence):
    sentence_words = clean_up_sentence(sentence)
    bag = [0] * len(words)
    for w in sentence_words:
        for i, word in enumerate(words):
            if word == w:
                bag[i] = 1
    return np.array(bag)


# function for predicting the class based on the sentences (result based on a bag of words)
def predict_class(sentence):
    bow = bag_of_words(sentence)
    res = model.predict(np.array([bow]))[0]
    # threshold to avoid too much uncertainty
    ERROR_THRESHOLD = 0.25
    # enumerates all the results
    results = [[i, r] for i, r in enumerate(res) if r > ERROR_THRESHOLD]

    results.sort(key=lambda x: x[1], reverse=True)
    return_list = []
    for r in results:
        return_list.append({'intent': classes[r[0]], 'probability': str(r[1])})
    return return_list


# function for getting a response
def get_response(intents_list, intents_json):
    tag = intents_list[0]['intent']
    list_of_intents = intents_json['intents']
    for i in list_of_intents:
        if i['tag'] == tag:
            result = random.choice(i['responses'])
            break
    return result


# def main(message):
#     ints = predict_class(message)
#     res = get_response(ints, intents)
#     return res


print("Hi! How can I help you?")

while True:
    res = ""
    emptyInputResponses = ['Please enter something first... :)',
                           'You did not write anything! Try again!',
                           'Are you joking? I am not so silly, as you may think!',
                           'Oh, man! Seriously?',
                           'Come on! Stop kidding me:(']
    message = input("")
    if not message:
        print(random.choice(emptyInputResponses))
    else:
        # ##### log questions #######
        text_file = open("Output.txt", "a")
        text_file.write("Question: ")
        text_file.write(message)
        text_file.write("\n")
        text_file.write("Answer: ")
        # ##### log questions #######

        ints = predict_class(message)
        for i in ints:
            print(i)
            if i['intent'] == 'help' and float(i['probability']) > 0.8:
                res = 'found help tag'
                break
            elif float(i['probability']) < 0.8:
                res = 'intent not found'
                break
            else:
                res = get_response(ints, intents)
        print(res)

        # ##### log questions #######
        text_file.write(res)
        text_file.write("\n")
        # ##### log questions #######
