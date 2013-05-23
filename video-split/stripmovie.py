import timedifference
import os

#INSTRUCTIONS
#This programs reads the file "movie.txt" with the following structure:

#filename_of_the_movie_including_extension
#video bitrate (only numbers)
#audio bitrate (only numbers)
#range of time separated by "," like: 1:25,2:35, one per line

#The file timedifference.py has to be in the same directory


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

#last lines are the list of times for the stripping, make the list of commands
commandlist=[]
for i in range(3,len(data)):
	times=data[i].strip().split(",")
	offset=timedifference.toseconds(times[0])
	duration=timedifference.timediff(times[1],times[0])
	outputname=newfilename[:-4]+str(i-2)+newfilename[-4:]

	commandlist.append("avconv -i \""+str(filename)+"\" -t "+str(duration)+" -ss "+str(offset)+" -acodec libmp3lame -b:a "+str(abitrate)+"k -b:v "+str(vbitrate)+"k \""+outputname+"\"")

#iterate over the list of commands
for command in commandlist:
	os.system(command)
