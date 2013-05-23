#import fullhour

def toseconds(time):
	"""str -> int

	Return the time converted to seconds

	Prerequisite: time has to be treated with the
	fullhour function.

	>>> toseconds("00:05:12")
	72
	>>> toseconds("00:15:12")
	912
	"""
	data=time.split(":")

	count=0
	for i in range(len(data)):
		count+=int(data[-i-1])*pow(60,i)
	
	return count

def timediff(time1,time2):
	""" (str,str) -> int
	Return the result of time1 - time2 as a string
	that includes the hour part even if it's not required

	>>> timediff("2:48","1:25")
	"00:01:23"
	>>> timediff("1:55","23:15")
	"negative error"
	"""
	
	#convert time1 to seconds
	time1seconds=toseconds(time1)

	#convert time2 to seconds
	time2seconds=toseconds(time2)

	#return the difference time1-time2
	return(time1seconds-time2seconds)


if __name__ == '__main__':
	print(toseconds("00:05:20"))
	print(toseconds("01:05:20"))
	print(toseconds("5:20"))
	print(toseconds("1:05:20"))
