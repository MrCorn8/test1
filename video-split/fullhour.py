def fullhour(time):
	"""(str) -> str

	Returns the same time in string format but
	including the hour section.

	>>> fullhour("1:25")
	"00:01:25"
	>>> fullhout("12:37")
	"00:12:37"
	"""

	data=time.split(":")
	#add 00 where there is no value, like in 0:15 -> 00:0:15
	for i in range(3-len(data)):
		data.insert(0,"00")

	finalist=[]

	for i in range(1,4):
		if len(data[-i])<2:
			finalist.insert(0,"0"+data[-i])
		else:
			finalist.insert(0,data[-i])

	finalstring=""
	for j in finalist:
		finalstring+=j+":"
	return finalstring[:-1]


if __name__=='__main__':
	print(fullhour("5:03"))
	print(fullhour("15:03"))
	print(fullhour("2:25:34"))
