import requests
from bs4 import BeautifulSoup
from googlesearch import search

test_array = {}

# will be replaced by output from other files
answer = "spike neuron"

# search google for the topic parsed from the user's question in the other files


def get_resources(ans):
    links = [""]
    values = {"": 0}
    # retrieves the links
    for j in search(ans, tld="co.in", num=5, stop=5, pause=2):
        # opens each webpage and extracts the main body contents
        req = requests.get(j)
        webpage = req.text
        soup = BeautifulSoup(webpage, "html.parser")
        body = str(soup.find("h1"))
        stripped = body[body.find(">")+1:len(body)-5]
        # counts how times the input appears in the body - currently always returns 0 for some reason
        values[j] = stripped.count(ans)
        # orders the links in the array by how many times the input appears
        for i in links:
            if values.get(i) <= values.get(j):
                links = links[:links.index(i)] + [j] + links[links.index(i):]
                break
    return links[:len(links)-1]


# store the keywords from the question - will need to change so persists between users
test_array[answer] = get_resources(answer)
print(test_array)

# works for the most part, not sure why it doesn't find any instance of the input in the text though
