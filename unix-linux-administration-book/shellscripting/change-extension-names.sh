#!/bin/bash
#Find log files and change the extesion from .log to .LOG
find . -type f -name "*.log" | while read fname; do echo mv $fname ${fname/.log/.LOG}; done | bash -x
