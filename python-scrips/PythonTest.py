# Used to get the variables passed from PHP (located at sys.argv[1])
import sys

import json


JSONEncoder = json.JSONEncoder()
JSONDecoder = json.JSONDecoder()


# Decoded variables passed from PHP
variables = JSONDecoder.decode(sys.argv[1])


# Example dictionary
aDict = {
	"item-1": [1, 2, 3],
	"item-2": "A String",
	"item-3": True,
	"item-4": None,
	"passed-variables": variables
}


# Return the encoded dictionary to PHP
print(JSONEncoder.encode(aDict))