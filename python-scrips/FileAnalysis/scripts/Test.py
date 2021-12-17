import FileAnalysis


def testFileAnalysis(filePath: str, keywords: str) -> None:
    """
    Tests the 'analyseFile()' function in FileAnalysis.py.

    :param filePath: The path of the file to analyse.
    :param keywords: The keyword(s) to find (can be a regular string or a regex string).
    """


    sentences = FileAnalysis.analyseFile(filePath, keywords)

    if sentences != None:
        print("\nSentences containing '{}':".format(keywords))

        # Prints out the 'sentences' containing the keywords
        for sentence in sentences:
            print("  {}".format(sentence))

# testing file
testFilePath1 = "../pdf_files/Cognitive Neural Networks.pdf"
testFilePath2 = "../pdf_files/Individual neurons.pdf"
testFilePath3 = "../pdf_files/Genetic Algorithms.pdf"

testFileAnalysis(testFilePath1, "(ai|artificial intelligence)")
testFileAnalysis(testFilePath1, "(neuron[s]?)")

testFileAnalysis(testFilePath2, "(point neuron[s]?)")
testFileAnalysis(testFilePath2, "(excitatory|excitation)")
testFileAnalysis(testFilePath2, "(weight[s]?)")
testFileAnalysis(testFilePath2, "(rate code[d]?)")

testFileAnalysis(testFilePath3, "(elitism)")
testFileAnalysis(testFilePath3, "(uniform crossover)")
testFileAnalysis(testFilePath3, "(example[s]?)")