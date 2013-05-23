import timedifference
import os

#Read file
file=open("movie.txt",'r')
data=file.readlines()

#first line is the name of the file
filename=data[0].strip()
changefilename=filename.split(".")
newfilename=changefilename[0]+".mp4"

#second line is the video bitrate, third line is the audio bitrate
vbitrate=data[1].strip()
abitrate=data[2].strip()

#print(vbitrate)
#print(abitrate)
#last lines are the list of times for the stripping, make the list of commands
commandlist=[]
for i in range(3,len(data)):
	times=data[i].strip().split(",")
#	print("times")
#	print(times)
	offset=timedifference.toseconds(times[0])
	duration=timedifference.timediff(times[1],times[0])
	outputname=newfilename[:-4]+str(i-2)+newfilename[-4:]

#	print("offset= "+str(offset))
#	print("duration= "+str(duration))
	#print("avconv -ss "+str(offset)+" -i \""+str(filename)+"\" -t "+str(duration)+" -acodec libmp3lame -b:a "+str(abitrate)+"k -b:v "+str(vbitrate)+"k \""+outputname+"\"")
	commandlist.append("avconv -ss "+str(offset)+" -i \""+str(filename)+"\" -t "+str(duration)+" -acodec libmp3lame -b:a "+str(abitrate)+"k -b:v "+str(vbitrate)+"k \""+outputname+"\"")

print(commandlist)

#iterate over the list of commands
for command in commandlist:
	os.system(command)
