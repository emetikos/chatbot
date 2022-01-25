import sys, json

jsonEncoder = json.JSONEncoder()

aDict = {
	"item-1": [1, 2, 3],
	"item-2": "A String",
	"item-3": True,
	"item-4": None,
	"passed-variables": sys.argv
}

print(jsonEncoder.encode(aDict))