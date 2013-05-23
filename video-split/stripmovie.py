import timedifference

#Read file
file=open("movie.txt",'r')
data=file.readlines()

#first line is the video bitrate, second line is the audio bitrate
filename=data[0].strip()
changefilename=filename.split(".")
newfilename=changefilename[0]+".mp4"
#print(newfilename)
vbitrate=data[1].strip()
abitrate=data[2].strip()

#print(vbitrate)
#print(abitrate)
#last lines are the list of times for the stripping
for i in range(3,len(data)):
	times=data[i].strip().split(",")
#	print("times")
#	print(times)
	offset=timedifference.toseconds(times[0])
	duration=timedifference.timediff(times[1],times[0])
	outputname=newfilename[:-4]+str(i-2)+newfilename[-4:]

#	print("offset= "+str(offset))
#	print("duration= "+str(duration))
	print("avconv -ss "+str(offset)+" -i "+str(filename)+" -t "+str(duration)+" -acodec libmp3lame -b:a "+str(abitrate)+"k -b:v "+str(vbitrate)+"k "+outputname)

#iterate over the list of times, write the commands for the stripping
