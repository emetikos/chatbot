import sys

print("<code><pre>")
print("<br>---------------------------------------")
print("<br>|             Python Test             |")
print("<br>---------------------------------------")
print("<br>Variables Given:")
print("<ul>")
for v in sys.argv:
	print("<li>" + v + "</li>")
print("</ul>")
print("</pre></code>")