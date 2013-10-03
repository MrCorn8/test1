#/bin/bash
#This script convert any video to mp4 format. The only parameter required is the extension of the videos that
#we want to convert. The new videos are stored in the directory "videos". It doesn't have problems with
#spaces

#Make the directory if it doesn't exist.
if [ ! -d "videos" ]; then
	mkdir "videos";
fi

IFSORIGINAL=$IFS
IFS=$(echo -en "\n\b")

extension=$1

for i in `ls *$extension`
do
	nombre_original="$i"
	nombre_sin_extension="$(basename $i .$extension)"
	echo ""
	echo "iniciando proceso sobre el archivo $nombre_original"
	echo ""
	nombre_nuevo="$nombre_sin_extension.mp4"
	# THIS IS FOR THE CREATION OF THE MP3 FILE
	#nombre_nuevo="$nombre_sin_extension.mp3"
	sleep 1
	
	# THIS COMMAND REDUCES THE SIZE OF DOWNLOADED MOVIES
	#avconv -i "$nombre_original" -b:a 96k -acodec libfaac -vcodec libx264 -b:v 4500k -ar 44100 -s 1280x720  videos/"$nombre_nuevo"

	#THIS COMMAND REDUCES THE SIZE OF THE MOVIES FILMED WITH MY CAMERA CANON
	#avconv -i "$nombre_original" -b:a 96k -acodec libmp3lame -b:v 5000k -ar 44100  videos/"$nombre_nuevo"
	avconv -i "$nombre_original" -b:a 96k -acodec libfaac -vcodec libx264 -b:v 5000k -ar 44100 -aspect 4:3  videos/"$nombre_nuevo"

	#THIS COMMAND WORKS FINE FOR MY GALAXY ACE.
	#avconv -i "$nombre_original" -b:a 64k -acodec libmp3lame -b:v 300k -ar 44100 -s 480x270 -r 25 videos/"$nombre_nuevo"

	#THIS COMMAND WORKS FINE FOR MY TABLET IVIEW 7"
	#avconv -i "$nombre_original" -b:a 64k -acodec libmp3lame -b:v 600k -ar 44100 -s 640x400 -r 25 videos/"$nombre_nuevo"

	#THIS COMMAND USES THE VIDEO PRODUCED BY MELT AND PREPARE IT FOR YOUTUBE
	#avconv -i "$nombre_original" -b:a 128k -acodec libfaac -vcodec libx264 -b:v 1500k -ar 44100 -aspect 4:3 -deinterlace videos/"$nombre_nuevo"

	#THIS COMMAND MAKE AN MP3 FILE FROM THE VIDEO GIVEN
	#avconv -i "$nombre_original" -b:a 128k -acodec libmp3lame -ar 44100 videos/"$nombre_nuevo"
	# !!!!DON'T FORGET TO CHANGE THE EXTENSION IN THE CORRECT LINE AT THE BEGINING OF THE SCRIPT!!!!

	echo ""
	echo "archivo $nombre_original terminado..."
	echo ""
	sleep 1
done

IFS=$IFSORIGINAL
