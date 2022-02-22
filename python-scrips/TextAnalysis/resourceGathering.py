import requests
from bs4 import BeautifulSoup
from googlesearch import search
# import subprocess

test_dict = {'spike neuron': ['https://en.wikipedia.org/wiki/Spiking_neural_network#History', 'https://www.frontiersin.org/articles/10.3389/fnins.2020.00425/full', 'https://www.frontiersin.org/articles/10.3389/fnins.2018.00774/full', 'https://en.wikipedia.org/wiki/Spiking_neural_network', 'https://www.researchgate.net/figure/Comparison-of-deep-spiking-neural-networks-SNNs-to-conventional-deep-neural-networks_fig1_328504662']}

# will be replaced by output from other files
answer = "neuron"

# search google for the topic parsed from the user's question in the other files


def get_resources(ans):
    links = [""]
    values = {"": ""}
    # retrieves the links
    for j in search(ans, tld="co.in", num=20, stop=20, pause=2):
        # opens each webpage and extracts the main body contents
        req = requests.get(j)
        webpage = req.text
        soup = BeautifulSoup(webpage, "html.parser")
        head = soup.find("h1").get_text()
        txt = soup.find_all("p")
        body = [tag.get_text().strip() for tag in txt]
        full_text = head + " " + body
        # stores the full text
        values[j] = full_text
        # stores the links in the array
        links.append(j)

        """  - to be replaced by feedback system to sort by relevance
        # counts how times the input appears in the body
        values[j] = stripped.count(ans)
        # orders the links in the array by how many times the input appears
        empty = True
        for i in links:
            if values.get(j) > values.get(i):
                links.insert(0, j)
                empty = False
                break
        if empty:
            links.append(j)
            """
            
    return (links)
    # test_dict[ans] = links[:len(links)-1]
    # return (test_dict.get(ans))

# print(get_resources(answer))
# print(test_dict)
