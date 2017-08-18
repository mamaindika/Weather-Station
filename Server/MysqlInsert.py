#!/usr/bin/python
# e begoli, python connector for mysql
# import MySQL module
import MySQLdb
from datetime import datetime

# connect



def InsertTable(weatherData):
        a, b, c ,d , e, f = weatherData.split("#")
        
        DateAndTime = datetime.now().strftime('%Y-%m-%d %H:%M:%S')     
	db = MySQLdb.connect(host="localhost", user="root", passwd="123",db="WeatherStation")
	# Prepare SQL query to INSERT a record into the database.
	sql = """INSERT INTO weatherData(temp,hmdt,prss,RFall,WndSpeed,WndDir,DateAndTime) VALUES (%s,%s,%s,%s,%s,%s,%s)"""
        
	# create a database cursor
	args = (a,b,c,d,e,f,DateAndTime)
	cursor = db.cursor()
	try :
		# execute SQL select statement
		cursor.execute(sql,args)
		# Commit your changes in the database
		db.commit()
	except :
		# Rollback in case there is any error
		db.rollback()

 	return 
 	
#InsertTable("25.1222#77.1034#101.1123#127.3243#74.234#3")

