# -*- coding: utf-8 -*-
import importlib.util
import random
import json

import pickle
import time

import numpy as np
import os

import nltk


import FileAnalysis
import UserInput as elsie
import resourceGathering as rg

from nltk.sentiment.vader import SentimentIntensityAnalyzer

from classification import classification

# reducing words to it's stem, for example work, working, worked, works treats as the same word
from nltk.stem import WordNetLemmatizer

# function to load the model that been created in the training script
from tensorflow.keras.models import load_model


# nltk.download('punkt')
# nltk.download('wordnet')
# nltk.download('omw-1.4')
# nltk.download('vader_lexicon')

os.chdir(os.path.dirname(os.path.realpath(__file__)))
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


print("Hi! How can I help you?")

topicFound = False  # helps to avoid repetition of predictions from the intents.json
readyToSubmit = False  # helps to identify when user accept or not the topic which he wants to look in a text file
# before submitting it
fileSubmitted = False # helps to identify the the user upload the file or not
classifiedMessage = '' # saves the

while True:
    res = ""
    emptyInputResponses = ['Please enter something first... :)',
                           'You did not write anything! Try again!',
                           'Are you joking? I am not so silly, as you may think!',
                           'Oh, man! Seriously?',
                           'Come on! Stop kidding me:(']

    notKnownResponses = ['Sorry?',
                         'Excuse me?',
                         'Pardon?',
                         'Excuse me, could you repeat the question?',
                         'CI’m sorry, I don’t understand. Could you say it again?',
                         'I’m sorry, I didn’t catch that. Would you mind speaking more slowly?',
                         'I’m confused. Could you tell me again?',
                         'I’m sorry, I didn’t understand. Could you repeat a little louder, please?',
                         'I didn’t hear you. Please could you tell me again?']

    m = input(">> ")
    message = m.lower()
    userInput = classification(message)

    if not message:
        print(random.choice(emptyInputResponses))

    else:
        if not topicFound:
            ints = predict_class(message)
            for i in ints:
                if i['intent'] == 'help' and float(i['probability']) > 0.8:
                    topicFound = True
                    classifiedMessage = userInput.classify()
                    res = "Is '" + classifiedMessage + "' what you looking for?"
                    break
                elif float(i['probability']) < 0.8:
                    res = random.choice(notKnownResponses)
                    break
                else:
                    res = get_response(ints, intents)
            print(res)
        else:
            # TODO write predictions if the user ask new questions regarding the file before uploading

            if not readyToSubmit:
                sid = SentimentIntensityAnalyzer()
                sentiment_score = sid.polarity_scores(message)

                if sentiment_score['pos'] > 0.6:
                    readyToSubmit = True
                    if not fileSubmitted:
                        print("Provide the file please")
                        time.sleep(2)
                        print("I got the you file! Thanks")
                        time.sleep(2)
                        print("reading your file.......")
                        time.sleep(2)
                        print("done")
                        time.sleep(1)
                        fileSubmitted = True

                    fileAnalysisResults = FileAnalysis.analyseFile('pdf_files/Individual Neurons.pdf', classifiedMessage)

                    if not fileAnalysisResults:
                        print('Sorry, but I could not find `' + classifiedMessage + '` in your file! Please try again '
                                                                                    'with your '
                                                                                    'search!')
                        topicFound = False
                        readyToSubmit = False
                    else:
                        # will need to return the user's selected topic as a string
                        topic = elsie.main(fileAnalysisResults)
                        print(rg.get_resources(topic))
                        print("Do you need any more help?")
                        topicFound = False
                        readyToSubmit = False

                if sentiment_score['neg'] > 0.6:
                    topicFound = False
                    print('OK, ask me something else again...')
                if sentiment_score['neu'] > 0.6:
                    print('So, yes or no?')

            else:
                topicFound = False
                readyToSubmit = False
